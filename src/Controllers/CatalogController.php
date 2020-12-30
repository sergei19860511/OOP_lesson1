<?php

namespace MyApp\Controllers;

use MyApp\Auth;
use MyApp\Models\Goods;
use MyApp\Models\Catalog;


class CatalogController extends AbstractController
{
	public function beforeAction()
	{
		if (isset($_GET['addGood'])) {
			Auth::addToBasket($_GET['addGood']);
			//$uri = explode('?', $_SERVER['REQUEST_URI']);
			$this->redirect($_SERVER['REDIRECT_URL']);
			//print_r($_SERVER['REDIRECT_URL']);
		}
		return true;
	}

	public function actionIndex()
	{
		$this->render('/catalog/index.twig', [
			'categories' => Catalog::getCategories(),
		]);
	}

	public function actionCategory($params)
	{
		$categoryId = array_shift($params);
		$category = Catalog::getCategoryById($categoryId);

		$this->render('catalog/category.twig',[
			'category' => $category,
			'goods' => Catalog::getGoodsByCategory($categoryId),
		]);

	}

	public function actionGood($params)
	{
		[$categoryId, $id] = $params;

		$category = Catalog::getCategoryById($categoryId);

		$this->render('/catalog/good.twig',[
			'category' => $category,
			'good' => Catalog::getGoodsById($id),
		]);
	}
		
	

	public function actionAdd()
	{
		Goods::add($_POST['name_good'], $_POST['price_good']);
		$this->redirect('\catalog');
	}
}
