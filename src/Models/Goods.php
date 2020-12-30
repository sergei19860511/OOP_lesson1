<?php

namespace MyApp\Models;

use MyApp\App;


class Goods
{
	public static function add($name_good, $price_good)
	{
		$stmt = \MyApp\App::instance()->getDB()->getLink()
		->prepare('INSERT INTO goods SET name_good=:name, price_good=:price');
		$stmt->bindParam('name', $name_good, \PDO::PARAM_STR);
		$stmt->bindParam('price', $price_good, \PDO::PARAM_INT);
		$stmt->execute();
	}
	

	public static function getAll()
	{
		return App::instance()->getDB()->getTableData('goods');
	}
}