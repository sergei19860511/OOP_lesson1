<?php

namespace MyApp;

use MyApp\Controllers\IndexController;
use MyApp\Models\History;

class App
{
    private static $instance;
    private $config;
    private $db;

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getDB(): DB
    {
    	return $this->db;
    }

    public function run()
    {

        session_start();

    	$this->db = new DB($this->config['db']);

        if($user = Auth::getUser()) {
            History::add($user['id_user'], $_SERVER['REQUEST_URI']);
        }

        [$uri] = explode('?', $_SERVER['REQUEST_URI']);
        //[$controllerName, $actionName, $param] = explode('/', trim($uri, '/'));

        $router = new Router(App::instance()->getConfig()['routing']);
        if (false === $rout = $router->parse($uri)) {
            $controllerName = 'index';
            $actionName = 'error';
            $params = [];
        } else {
            [$controllerName, $actionName, $params] = $rout;
        }
        

        $controllerClass = 'MyApp\Controllers\\' . ucfirst($controllerName) . 'Controller';
        $actionMethod = 'action' . ucfirst($actionName);

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass;
            if (method_exists($controller, $actionMethod)) {
                if ($controller->beforeAction()) {
                    $controller->$actionMethod($params);
                }
                $controller->afterAction();
                return;
            }
        }

        (new IndexController())->actionError();
    }

    public function setConfig($config): void
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
