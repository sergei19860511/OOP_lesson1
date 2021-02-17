<?php

namespace MyApp;

use MyApp\Models\Users;

class Auth
{
	 public static function getBasket()
    {
        self::initBasket();

        return $_SESSION['basket'];
    }

    public static function addToBasket($id)
    {
        self::initBasket();

        $_SESSION['basket']['count']++;
        $_SESSION['basket']['goods'][$id]++;
    }

    public static function clearBasket()
    {
        self::initBasket(true);
    }

    private static function initBasket($force = false)
    {
        if ($force || empty($_SESSION['basket'])) {
            $_SESSION['basket'] = [
                'count' => 0,
                'goods' => [],
            ];
        }
    }

	public static function getUser()
	{
		return $_SESSION['user'];
	}

	public static function login($login_user)
	{
        $user = Users::getUserData($login_user);
		$_SESSION['user'] = $user;
        $_SESSION['user']['role'] = Users::getRole($user['id_user']);
	}

    public static function hasRole(int $role): bool
    {
        if (empty($_SESSION['user']['role'])) {
            return false;
        }

        return in_array($role, $_SESSION['user']['role']);
    }

	public static function logOut()
	{
		$_SESSION['user'] = null;
		self::clearBasket();
	}
}