<?php

namespace MyApp\Controllers;
use MyApp\Models\Goods;

class CatalogController extends AbstractController
{
	public function actionIndex()
	{
		$this->render('goods.twig', [
			'goods' => Goods::getAll(),
		]);
	}

	public function actionAdd()
	{
		Goods::add($_POST['name_good'], $_POST['price_good']);
		$this->redirect('\catalog');
	}
}
