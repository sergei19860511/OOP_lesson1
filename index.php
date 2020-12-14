<?php

require_once 'vendor/autoload.php';
require 'DB.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

	$loadSize = 3;

if (isset($_GET['from'])) {
	$goods = DB::getInstance()->getTableDataPart(DB::TABLE_GOODS, $_GET['from'], $loadSize);
	$count = DB::getInstance()->getTableDataCount(DB::TABLE_GOODS);
	$last = end($goods);


	$hide = false;
	if ($last['id_good'] >= $count) {
		$hide = true;
	}
	echo $twig->render('goods.twig',[
		'items' => $goods,
		'hide' => $hide,
	]);
	exit;
}

echo $twig->render('index.twig', [
	'loadSize' => $loadSize,
]);
