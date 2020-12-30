<?php
namespace MyApp\Controllers;

use MyApp\Auth;
use MyApp\Models\Catalog;
use MyApp\Models\Users;
use MyApp\Models\History;
use MyApp\Models\Orders;


class UsersController extends AbstractController
{
    public function actionIndex()
    {
    	$user = Auth::getUser();
//print_r($user['role']);
    	if(!$user) {
    		$this->redirect('/users/login');
    	}

    	$this->render('/users/index.twig', [
            'history' => History::getLast($user['id_user']),
        ]);
    }

    public function actionRegistration()
    {
        $error = null;
        $regUser = null;

        if (isset($_POST['login_user'], $_POST['pass_user'])) {
            if(!Users::getUserData($_POST['login_user'])) {
                Users::addUser($_POST['login_user'], $_POST['pass_user']);
                $regUser = true;
            } else {
                $error = true;
            }
        }
        $this->render('/users/registration.twig', [
            'error' => $error,
            'regUser' => $regUser,
        ]);
    }

    public function actionOrder()
    {
        $user = Auth::getUser();

        if(!$user) {
            $this->redirect('/login');
        }

        $error = false;

        $basket = Auth::getBasket();
        Orders::createOrder($user['id_user'], $basket);
        Auth::clearBasket();

        if (empty($basket['goods'])) {
            $error = true;
        }

        $this->render('/users/success.twig',[
            'error' => $error,
        ]);
    }

    public function actionBasket()
    {
        $basket = Auth::getBasket();
        $ids = array_keys($basket['goods']);
        $goods = Catalog::getGoodsByIds($ids);

        $sum = 0;
        foreach($goods as $k => $v) {
            $goods[$k]['count'] = $basket['goods'][$v['id_good']];
            $sum += $goods[$k]['sum'] = $v['price_good'] * $goods[$k]['count'];
        }

        $this->render('users/basket.twig',[
            'goods' => $goods,
            'sum' => $sum,
        ]);
    }

    public function actionLogin()
    {
        $error = null;

        if (isset($_POST['login_user'], $_POST['pass_user'])) {
            if (Users::check($_POST['login_user'], $_POST['pass_user'])) {
                Auth::login($_POST['login_user']);
                $this->redirect('/users');
            } else {
                $error = true;
            }
        }

        $this->render('/users/login.twig', [
            'error' => $error,
        ]);
    }

    public function actionLogout()
    {
    	Auth::logOut();
    	$this->redirect('/users/login');
    }
}

