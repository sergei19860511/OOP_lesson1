<?php
namespace MyApp\Controllers;

use MyApp\Auth;
use MyApp\Models\Users;
use MyApp\Models\History;

class UsersController extends AbstractController
{
    public function actionIndex()
    {
    	$user = Auth::getUser();

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

