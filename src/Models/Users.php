<?php

namespace MyApp\Models;

class Users extends BaseModel
{

	const ROLE_ADMIN = 1;
	const ROLE_CONT = 2;

	public static function getRole($usersId)
	{
		$rows = self::db()->getLink()
		->query('SELECT * FROM users_role WHERE id_user='.(int)$usersId)
		->fetchAll(\PDO::FETCH_ASSOC);

		$roles = [];

		foreach ($rows as $row) {
			$roles[]= $row['user_role'];
		}

		return $roles;
	}

	public static function check($login_user, $pass_user)
	{
		$user = self::getUserData($login_user);
		if (!$user) {
			return false;
		}
		return password_verify($pass_user, $user['pass_user']);
	}

	public static function getUserData($login_user)
	{
		$stmt = self::db()->getLink()->prepare('SELECT * FROM users WHERE login_user=:login LIMIT 1');
		$stmt->bindParam('login', $login_user, \PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}

	public static function addUser($login_user, $pass_user)
	{
		$hach = password_hash($pass_user, PASSWORD_DEFAULT);

		$stmt = self::db()->getLink()->prepare('INSERT INTO users SET login_user=:login, pass_user=:pass');
		$stmt->bindParam('login', $login_user, \PDO::PARAM_STR);
		$stmt->bindParam('pass', $hach, \PDO::PARAM_STR);
		$stmt->execute();
	}
}