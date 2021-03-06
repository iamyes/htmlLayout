<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории (меню)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{attachments}',
                'buttons' => [
                    'attachments' => function ($url,$model) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-folder-open"></span>', 
                    $url);
                    },
                ]
                
                        
            ],
            [
                'attribute' => 'parent_id',
                'value' => function($data){
                    return $data->category->name ? $data->category->name : 'Самостоятльная категория';
                },
            ],
            //'parent_id',
            'name',
            'keywords',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
