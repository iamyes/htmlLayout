<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">
	
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



    <?php echo $form->field($model, 'image')->widget(InputFile::className(), [
	    'language'      => 'ru',
	    'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
	    'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
	    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
	    'options'       => ['class' => 'form-control'],
	    'buttonOptions' => ['class' => 'btn btn-default'],
	    'multiple'      => false       // возможность выбора нескольких файлов
	]); ?>
	
	
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
