<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\components\SliderWidget;
/* @var $this yii\web\View */


?>

<div class="container">

    <!-- Home slide -->
    <div class="home-slide1 owl-carousel nav-style1" data-items="1" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true">
        <?= SliderWidget::widget() ?>
    </div>
    <h1 style="text-align: center; padding-top: 15px;">Хиты продаж</h1>
    
    <!-- ./Home slide -->

    <?php if(!empty($hits)): ?>
    <div class="margin-top-40">
        <div class="row">
       
            <!--<div class="col-sm-12 col-md-6 margin-bottom-30 111">
                <a class="banner-opacity" href=""><img></a>
                
            </div>-->
          
          
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <?php $c = 0; foreach($hits as $hit): ?>
                    <?php $mainImg = $hit->getImage(); ?>
                        <?php if($c % 9 == 0): ?>
                           <div class="col-sm-12 col-md-6 margin-bottom-30">
                                <a class="banner-opacity" href="<?=Url::to(['product/view', 'id' => $hit->id]) ?>"><?= Html::img($mainImg->getUrl('570x570')) ?></a>
                            </div>
                          <?php $c++; ?>
                        <?php else: ?> 

                            <?php if($c % 9 == 1 || $c % 9 == 5): ?>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                            <?php endif; ?>

                            <div class="col-sm-6">
                            <a href="<?=Url::to(['product/view', 'id' => $hit->id]) ?>" class="banner-product">
                                <?= Html::img($mainImg->getUrl('270x270')) ?>
                                <h3 class="text"><?=$hit->name ?></h3>
                                <span class="price">£<?=$hit->price ?></span>
                            </a>
                            </div> 

                            <?php if($c % 9 == 4 || $c % 9 == 8): ?>
                                </div>
                            </div>
                            <?php endif; ?>                         
                           <?php $c++; ?>
                        <?php endif; ?>
                        
                        <!-- <div class="col-sm-3 cloth">
                            <a class="banner-product" href="<?=Url::to(['product/view', 'id' => $hit->id]) ?>">
                               <?= Html::img($mainImg->getUrl('270x270')) ?>
                                <h3 class="text"><?=$hit->name ?></h3>
                                <span class="price">£<?=$hit->price ?></span>
                            </a>
                        </div> -->
                    <?php $i++; ?>
                    <?php if($i % 4 == 0): ?>
                        <!-- <div class="clearfix"></div> -->
                    <?php endif; ?> 
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

    <?php endif; ?>

</div>