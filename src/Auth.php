<?php

namespace MyApp;

use MyApp\Models\Users;

class Auth
{
	public static function getUser()
	{
		return $_SESSION['user'];
	}

	public static function login($login_user)
	{
		$_SESSION['user'] = Users::getUserData($login_user);
	}

	public static function logOut()
	{
		$_SESSION['user'] = null;
	}
}