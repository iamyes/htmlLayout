<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use yii\data\Pagination;
use Yii;

class CategoryController extends AppController{

	public function actionIndex(){
		$hits = Product::find()->where(['hit' => '1'])->all();
		$this->setMeta('Магазин одежды');
		//debug($allProduct);
		return $this->render('index', compact('hits'));
	}

	public function actionView(){
		$id = (int)Yii::$app->request->get('id');

		/*Количество товаров на страницу*/
		$page_c = (int)Yii::$app->request->get('page_c');
		$goodsToPage = Category::goodsToPage($page_c);
		/*Количество товаров на страницу*/
		
		$category = Category::findOne($id);
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');
		//$products = Product::find()->where(['category_id' => $id])->all();
		/*Сортировка в категориях*/
		$order_p = array(
	        'pricea' => array('от дешевых к дорогим', 'price ASC'),
	        'priced' => array('от дорогих к дешевым', 'price DESC'),
	        'namea' => array('от А до Я', 'name ASC'),
	        'named' => array('от Я до А', 'name DESC')
	    );

	    $sort = Yii::$app->request->get('order');
	    if(array_key_exists($sort, $order_p)){
	    	$order = $order_p[$sort][0];
	    	$order_sort = $order_p[$sort][1];
	    }else{
	    	$order = $order_p['namea'][0];
            $order_sort = $order_p['namea'][1];
	    }
	    /*Сортировка в категориях*/

	    /*Переключение видов отображения*/
	    $display = Yii::$app->request->get('display');
	    if($display == null){
	    	$switch_view = 'grid';
	    }else{
	    	$switch_view = $display;
	    }
	    /*Переключение видов отображения*/

		/*Получение максимальной цены для фильтра цены*/
		$maxPrice = (new \yii\db\Query())->select(['price'])->from('product')->max('price');
		$maxItem = $_GET['max_value'] ? $_GET['max_value'] : $maxPrice;
		$minItem = $_GET['min_value'] ? $_GET['min_value'] : 0;
		/*Получение максимальной цены для фильтра цены*/

		/*Фильтр цены*/
		if(\Yii::$app->request->isAjax){
			$min_value = (int)Yii::$app->request->get('min_value');
			$max_value = (int)Yii::$app->request->get('max_value');
			
			return Category::ajaxPriceData($min_value, $max_value);
		}
		$query = Category::filterPrice($id, $_GET['min_value'], $_GET['max_value'], $order_sort);

		/*Фильтр цены*/	
		$news = (new \yii\db\Query())->select(['id', 'name', 'price', 'old_price'])->from('product')->limit(3)->orderBy('id DESC')->all();
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => $goodsToPage, 'forcePageParam' => false, 'pageSizeParam' => false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		$this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
		return $this->render('view', compact('products', 'pages', 'category', 'order', 'order_p', 'switch_view', 'maxPrice', 'maxItem', 'minItem', 'news'));
	}

	public function actionSearch(){
		$q = trim(Yii::$app->request->get('q'));
		$this->setMeta('Магазин одежды | Поиск: '. $q);
		if(!$q)
			return $this->render('search');
		$query = Product::find()->where(['like', 'name', $q]);
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'forcePageParam' => false, 'pageSizeParam' => false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		return $this->render('search', compact('products', 'pages', 'q'));
	}

	

}

?>