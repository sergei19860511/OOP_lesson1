<?php

class User {
	public $name;
	protected $email;

	public function __construct($name, $email){
		$this->name=$name;
		$this->email=$email;
	}

	public function info(){
		echo 'имя:' .$this->name. ' емайл: '. $this->email. '<br>';
	}
}

