<?php

class UserBacket extends User{
	public $goods;
	private $payGoods;

	public function __construct($name, $email, $goods, $payGoods){
		$this->goods = $goods;
		$this->payGoods = $payGoods;
		parent::__construct($name,$email);
	}

	public function infoGoods(){
 echo 'имя: ' .$this->name. ' емайл: '. $this->email. ' мои товары: '.$this->goods. ' купленные товары: '.$this->payGoods.'<br>';
	}
}


?>