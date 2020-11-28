<?php

class User {
	public $name;
	public $email;

	public function InfoUser() {
		$this->name = $name;
		$this->email = $email;
	}
}

$user = new User('Сергей', 'sergei_kupriynov@mail.ru');
$user->InfoUser;