<?php

namespace MyApp\Models;


class Orders extends BaseModel
{
	public const STATUS_NEW = 1;
	public const STATUS_PROGRESS = 2;
	public const STATUS_REJECTED = 3;
	public const STATUS_DONE = 4;
	public static $statuses = [
		self::STATUS_NEW => 'новый',
		self::STATUS_PROGRESS => 'в процессе',
		self::STATUS_REJECTED => 'отменён',
		self::STATUS_DONE => 'выполнен',
	];

	public const TABLE = 'orders';

	public static function setStatus($id, $status)
    {
        self::db()->getLink()->exec('UPDATE ' . self::TABLE. ' SET status=' . (int)$status . ' WHERE id=' . (int)$id);
    }

	public static function getAll()
	{
		$rows = self::db()->getLink()
		->query('SELECT orders.id,orders.date_order,orders.status,
			orders_goods.id_good,orders_goods.price_good,orders_goods.`count`,
			users.login_user,goods.name_good,goods.category_id 
			FROM `orders`
			JOIN orders_goods ON orders.id=orders_goods.orders_id
			JOIN users ON orders.id_user=users.id_user
			JOIN goods ON orders_goods.id_good=goods.id_good
			ORDER BY orders.date_order DESC')
		->fetchAll(\PDO::FETCH_ASSOC);

		$orders = [];
		foreach($rows as $row) {
			$id = $row['id'];
			if (!isset($orders[$id])) {
				$orders[$id] = [
					'date_order' => $row['date_order'],
					'status' => $row['status'],
					'login_user' => $row['login_user'],
					'sum' => 0,
					'goods' => [],
				];
			}

			$sum = $row['price_good'] * $row['count'];
			$orders[$id]['goods'][] = [
					'id_good' => $row['id_good'],
					'price_good' => $row['price_good'],
					'count' => $row['count'],
					'name_good' => $row['name_good'],
					'category_id' => $row['category_id'],
					'sum' => $sum,
				];
				$orders[$id]['sum'] += $sum;
		}
		return $orders;
	}

	public static function createOrder($userId, $basket)
	{
		$goodsIds = $basket['goods'];

		if (empty($goodsIds)) {
			return;
		}
		self::db()->getLink()
		->exec('INSERT INTO ' . self::TABLE. ' SET id_user=' . (int)$userId . ', status=' . self::STATUS_NEW);

		$orderId = self::db()->getLink()->lastInsertId();

		$goods = Catalog::getGoodsByIds(array_keys($goodsIds));
		foreach($goods as $good) {
			self::db()->getLink()->exec(
				'INSERT INTO orders_goods SET orders_id ='.$orderId.',id_good='
				.$good['id_good'].',price_good='.$good['price_good'].',`count`='
				.$goodsIds[$good['id_good']]);
		}
 	}
}
