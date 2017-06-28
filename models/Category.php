<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord{
	
	public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

	public static function tableName(){
		return 'category';
	}

	public function getProducts(){
		return $this->hasMany(Product::className(), ['category_id' => 'id']);
	}

	public static function goodsToPage($page_c){
		if($page_c == 0){
			$page_c = 9;
		}
		return $page_c;
	}

	public static function maxPrice($max_value, $maxPrice){
		if(!$maxPrice){
			$max_value = $maxPrice;
		}
		return $max_value;
	}
/*Обработка аякс данных для фильтра цены*/
	public static function ajaxPriceData($min_value, $max_value){
		$result_value = array();
		if($min_value){
			$min_value = "&min_value=" . $min_value;
			$result_value['min_value'] = $min_value;
		}else{
			$min_value = "&min_value=0";
			$result_value['min_value'] = $max_value;
		}
		if($max_value){
			$max_val = "&max_value=" . $max_value;
			$result_value['max_value'] = $max_val;
		}else{
			$max_value = $maxPrice;
			$result_value['max_value'] = $max_value;
		}

		$result_value = json_encode($result_value);
		return $result_value;
	}
/*Обработка аякс данных для фильтра цены*/

/*Фильтр цены*/
	public static function filterPrice($id, $getMinParam, $getMaxParam, $order_sort){
		$result = (new \yii\db\Query())->select(['id'])->from('category')->where(['parent_id' => $id])->all();
		if($getMinParam || $getMaxParam){
			//$max_value = Category::maxPrice($max_value, $maxPrice);
			$result = (new \yii\db\Query())->select(['id'])->from('category')->where(['parent_id' => $id])->all();
			
			if($result){
				foreach($result as $value){
					$items[] = $value['id'];
				}
				$query = Product::find()
				    ->where(['category_id' => $items, 'visible' => 1])
				    ->andWhere(['>', 'price', $getMinParam])
				    ->andWhere(['<', 'price',  $getMaxParam])
				    ->orderBy($order_sort);

			}else{
				$query = Product::find()
				    ->where(['category_id' => $id, 'visible' => 1])
				    ->andWhere(['>', 'price', $getMinParam])
				    ->andWhere(['<', 'price',  $getMaxParam])
				    ->orderBy($order_sort);
			}
		}else{

			

			$result = (new \yii\db\Query())->select(['id'])->from('category')->where(['parent_id' => $id])->all();
			if($result){
			
				foreach($result as $value){
					$items[] = $value['id'];
				}
				$query = Product::find()
				    ->where(['category_id' => $items, 'visible' => 1])
				    ->orderBy($order_sort);
			}else{
				$query = Product::find()->where(['category_id' => $id, 'visible' => 1])->orderBy($order_sort);
			}
		}
		return $query;
	}
	/*Фильтр цены*/
}

?>