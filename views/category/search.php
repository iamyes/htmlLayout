<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

?>

<div class="banner">
  <div class="banner-content">
    <img src="//images/b/1.jpg" alt="">
  </div>
</div>
<div class="main-container no-slidebar">
  <div class="container">
    <div class="row">
      <div class="main-content col-sm-12">
        <div class="shop-top">
          <div class="shop-top-left">
            <div class="breadcrumbs">
                        <a href="#">Home</a>
                        <span>Categories Leftsidebar</span>
                    </div>
          </div>
          <div class="shop-top-right">
            <span class="woocommerce-result-count">Showing 1-10 of 53 results</span>
            <div class="orderby-wapper">
                        <select class="orderby">
                            <option value="">SORT BY NEWNESS</option>
                            <option value="">Short by price</option>
                        </select>
                      </div>
                      <div class="show-grid-list">
                            <span class="label-filter">VIEW:</span>
                            <a class="show-grid" href="#"><i class="fa fa-th"></i></a>
                            <a class="show-list active" href="#"><i class="fa fa-list"></i></a>
                        </div>
          </div>
        </div>
<?php if(!empty($products)): ?>

        <ul class="product-list-grid desktop-columns-2 tablet-columns-2 mobile-columns-1 row">
  <?php foreach($products as $product): ?>
          <li class="product-item col-sm-6">
            <div class="product-inner">
              <div class="product-thumb has-back-image">
                <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= Html::img("@web/images/image/{$product->img}") ?></a>
                                <a class="back-image" href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= Html::img("@web/images/image/{$product->img}") ?></a>
                <div class="gorup-button">
                  <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                  <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                  <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                </div>
              </div>
              <div class="product-info">
                <h3 class="product-name"><a href="#"><?= $product->name?></a></h3>
                <span class="price">
                  <ins>£<?= $product->price?></ins>
                  <del>£<?= $product->old_price?></del>
                </span>
                <a href="#" class="button">ADD TO CART</a>
              </div>
            </div>
          </li>
  <?php endforeach; ?>
         
        </ul>
<?php echo LinkPager::widget([
    'pagination' => $pages,
]); ?>
<?php else: ?>
  <h2>По запросу ничего не найдено</h2>
<?php endif; ?>
        <!--<div class="navigation">
                    <ul>
                        <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                    </ul>
                </div>
      </div>-->
    </div>
  </div>
</div>