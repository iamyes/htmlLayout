<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                }
            ],
            'name',
            //'content:ntext',
            'price',
            // 'old_price',
            // 'keywords',
            // 'description',
            // 'img',
            [
                'attribute' => 'hit',
                'contentOptions' =>function ($data){
                    if($data->hit == 1){
                        $query_data = 0;
                    }else{
                        $query_data = 1;
                    }
                    return ['data-hit' => $query_data, 'data-id' => $data->id, 'class' => 'click_hit'];
                },
                'value' => function($data){
                    if(!$data->hit){ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-danger glyphicon glyphicon-remove']);
                    }else{ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-success glyphicon glyphicon-ok']);
                    }
                    return $result; 
                },
                'format' => 'html',
            ],
            // 'hit',
            [
                'attribute' => 'new',
                'contentOptions' =>function ($data){
                    if($data->new == 1){
                        $query_data = 0;
                    }else{
                        $query_data = 1;
                    }
                    return ['data-new' => $query_data, 'data-id' => $data->id, 'class' => 'click_new'];
                },
                'value' => function($data){
                    if(!$data->new){ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-danger glyphicon glyphicon-remove']);
                    }else{ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-success glyphicon glyphicon-ok']);
                    }
                    return $result; 
                },
                'format' => 'html',
            ],
            // 'new',
            [
                'attribute' => 'sale',
                'contentOptions' =>function ($data){
                    if($data->sale == 1){
                        $query_data = 0;
                    }else{
                        $query_data = 1;
                    }
                    return ['data-sale' => $query_data, 'data-id' => $data->id, 'class' => 'click_sale'];
                },
                'value' => function($data){
                    if(!$data->sale){ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-danger glyphicon glyphicon-remove']);
                    }else{ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-success glyphicon glyphicon-ok']);
                    }
                    return $result; 
                },
                'format' => 'html',
            ],
            // 'sale',
            [
                'attribute' => 'visible',
                'contentOptions' =>function ($data){
                    if($data->visible == 1){
                        $query_data = 0;
                    }else{
                        $query_data = 1;
                    }
                    return ['data-visible' => $query_data, 'data-id' => $data->id, 'class' => 'click_visible'];
                },
                'value' => function($data){
                    if(!$data->visible){ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-danger glyphicon glyphicon-remove']);
                    }else{ 
                        $result = Html::a('', ['product/index'], ['class' => 'text-success glyphicon glyphicon-ok']);
                    }
                    return $result; 
                },
                'format' => 'html',
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
