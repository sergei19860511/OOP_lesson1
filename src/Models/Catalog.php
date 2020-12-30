<?php

namespace MyApp\Models;

use MyApp\DB;

class Catalog extends BaseModel
{
	public static function getGoodsByIds(array $ids)
	{
		if (!count($ids)) {
			return [];
		}
		return self::db()
		->getLink()
		->query('SELECT * FROM goods WHERE id_good IN ('.implode(',', $ids).')')
		->fetchAll(\PDO::FETCH_ASSOC);
	}

	public static function getGoodsByCategory($id)
	{
		return self::db()
		->getLink()
		->query('SELECT * FROM goods WHERE category_id =' .(int) $id)
		->fetchAll(\PDO::FETCH_ASSOC);
	}

	public static function getGoodsById($id)
    {
      return self::db()
			->getLink()
			->query('SELECT * FROM goods WHERE id_good =' .(int) $id)
			->fetch(\PDO::FETCH_ASSOC);
    }

	public static function getCategoryById($id)
	{
		return self::db()->getById('categories', $id);
	}

	public static function getCategories()
	{
		return self::db()->getTableData('categories');
	}
}
