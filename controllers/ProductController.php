<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use app\models\Reviews;
use yii\data\Pagination;
use yii\web\HttpException;
use Yii;

class ProductController extends AppController{

	public function actionView(){
		$id = Yii::$app->request->get('id');
		$product = Product::findOne($id);

		if(empty($product)){
			throw new HttpException(404, "Такого товара нет");
		}
		$reviews = new Reviews();
		if ($reviews->load(Yii::$app->request->post())){
			$reviews->date = date("Y-m-d");
			if ($reviews->save()) {
	            Yii::$app->session->setFlash('success', "Отзыв добавлен");

	            $c = Yii::$app->mailer->compose()
	            ->setFrom('admin1@example.php')
			    ->setTo('admin@example.php')
			    ->setSubject('На сайте новый отзыв')
			    ->setHtmlBody($reviews->content)
			    ->send();
			    return $this->refresh();
	            //return $this->redirect(['view', 'id' => $reviews->id]);
	        }else{
	        	Yii::$app->session->setFlash('error', "Отзыв добавить не удалось");
	        }
        }
        $reviews_respons = Reviews::find()->where(['active' => '1'])->orderBy('id')->all();

        if(Yii::$app->request->isAjax){
			$session = Yii::$app->session;
			$session->open();
			return $_SESSION['cart.qty'];
		}

		$hits = Product::find()->where(['hit' => '1', 'visible' => 1])->limit(6)->all();
		$this->setMeta('Магазин одежды | '. $product->name, $product->keywords, $product->description);
		return $this->render('view', compact('product', 'hits', 'reviews', 'reviews_respons'));
	}

}