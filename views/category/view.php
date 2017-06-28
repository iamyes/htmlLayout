<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use app\components\MenuWidget;
/* @var $this yii\web\View */

?>

<div class="banner">
  <div class="banner-content">
    <img src="//images/b/1.jpg" alt="">
  </div>
</div>
<div class="main-container shop-with-banner left-slidebar">
  <div class="container">
    <div class="shop-banner">
      <img src="/images/slides/slider-cat2.jpg" alt="">
    </div>
    <div class="breadcrumbs style2">
            <a href="#">Home</a>
            <span>Categories_Leftsidebar</span>
        </div>
    <div class="row">
      <div class="main-content col-sm-8 col-md-9">
        <div class="shop-top">
          <div class="shop-top-left">
              <span class="woocommerce-result-count">Showing <?= $pages->offset; ?>-<?= $pages->limit; ?> of <?= $pages->totalCount; ?> results</span>
          </div>
          <div class="shop-top-right">
            <div class="name_sort">Сортировать: <?= $order;?>
              <ul class="order_sort">
                <?php foreach($order_p as $key => $value): ?>
                  <?php if($value[0] == $order) continue; ?>
                  <a href="<?= Url::to(['category/view', 'id' => $category->id, 'order' => $key]) ?>"><?=$value[0]; ?></a><br>
                <?php endforeach; ?>
              </ul>
              <span class="glyphicon glyphicon-chevron-down"></span>
            </div>
            <div class="orderby-wapper display-products">
                <span class="label-filter">SHOW:</span>
                  <?php Pjax::begin(); ?>
                    <form class="orderby" method="GET" name="page_count">
                      <input type="hidden" name="id" value="<?= $_GET['id'];?>">
                      <input class="num_pagination" type="text" name="page_c">
                      <input type="submit" name="form_send" value="" id="send_sort" class="glyphicon glyphicon-search">
                    </form>
                  <?php Pjax::end(); ?>
                
            </div>

            <div class="show-grid-list">
              <span class="label-filter">VIEW:</span>
              <?php Pjax::begin(); ?>
                <a class="show_list <?php if($_GET['display'] == 'grid') echo 'active' ?>" href="<?= Url::to(['category/view', 'id' => $category->id, 'display' => 'grid']) ?>"><i class="fa fa-th"></i></a>
                <a class="show_list <?php if($_GET['display'] == 'list') echo 'active' ?>" href="<?= Url::to(['category/view', 'id' => $category->id, 'display' => 'list']) ?>"><i class="fa fa-list"></i></a>
              <?php Pjax::end(); ?>
            </div>
          </div>
        </div>
      <?php if(!empty($products)):?>
        <?php if($switch_view == 'grid'): ?>
        <ul id="container_main" class="product-list-grid desktop-columns-3 tablet-columns-2 mobile-columns-1 row flex-flow">
          <?php foreach($products as $product): ?>
          <?php $mainImg = $product->getImage(); ?>
            <li class="product-item style4 col-sm-6 col-md-4">
              <div class="product-inner">
                <div class="product-thumb has-back-image">
                  <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= Html::img($mainImg->getUrl('270x270')) ?></a>
                  <a class="back-image" href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= Html::img($mainImg->getUrl('270x270')) ?></a>
                  <div class="gorup-button">
                    <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                    <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                    <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                  </div>
                  <div class="add-cart-wapper">
                    <a href="#" class="button add_to_cart_button add-to-cart count-cart" data-id="<?= $product->id ?>">ADD TO CART</a>
                  </div>
                </div>
                <div class="product-info">
                  <h3 class="product-name"><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name?></a></h3>
                  <span class="price">
                    <ins>£<?= $product->price?></ins>
                  </span>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <?php else: ?>
          <ul id="container_main" class="product-list product-list-grid">
            <?php foreach($products as $product): ?>
              <?php $mainImg = $product->getImage(); ?>
                <li class="product-item list row">                      
                    <div class="product-thumb col-sm-4">
                        <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= Html::img($mainImg->getUrl('270x270')) ?></a>                            
                    </div>
                    <div class="product-info col-sm-8">
                        <h3 class="product-name"><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name?></a></h3>
                        <span class="price">
                            <ins>£<?= $product->price?></ins>
                        </span>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="available">Available: <span>Instock</span></div>
                        <div class="short-descript">
                            <p><?= $product->anons?></p>
                        </div>
                        <div class="gorup-button">
                            <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="button add-to-cart" class="button">ADD TO CART</a>
                            <a class="quick-view" href="#"><i class="fa fa-search"></i></a>
                            <a class="compare" href="#"><i class="fa fa-exchange"></i></a>                                      
                            <a class="wishlist" href="#"><i class="fa fa-heart"></i></a>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
                </ul>
        <?php endif; ?>
        <?php echo LinkPager::widget([
            'pagination' => $pages,
            'options' => [
              'class' => 'navigation',
              
            ]
        ]); ?>
      <?php else: ?>
        <h2>Здесь товара пока нет</h2>
      <?php endif; ?>
        
      </div>
      <div class="col-sm-4 col-md-3 sidebar"> 
                <!-- Product category -->
                <div class="widget widget_product_categories">
                    <h2 class="widget-title">Categories</h2>
                    <ul class="product-categories" id="accordion">
                      <?= MenuWidget::widget(['tpl' => 'categories']) ?> 
                    </ul>
                    <!-- <ul class="product-categories">
                        <li><a href="#">Sunglasses</a><span class="count-item">(25)</span></li>
                        <li><a href="#">Watches</a><span class="count-item">(23)</span></li>
                        <li class="current-cat"><a href="#">Jewelry</a><span class="count-item">(9)</span></li>
                        <li><a href="#">Hats, Scraves & Gloves</a><span class="count-item">(12)</span></li>
                        <li><a href="#">Underwear & Socks</a><span class="count-item">(48)</span></li>
                        <li><a href="#">Grooming</a><span class="count-item">(6)</span></li>
                        <li><a href="#">Belts</a><span class="count-item">(18)</span></li>
                    </ul> -->
                </div>
                <!-- ./Product category -->
                 <!-- Filter price -->
                <div class="widget widget_price_filter">
                    <h2 class="widget-title">PRICES</h2>
                    <div class="price_slider_wrapper">
                        <div class="amount-range-price">Price: $<?= $minItem ?> - $<?= $maxItem ?></div>
                        <div data-label-reasult="price:" data-min="0" data-max="<?= $maxPrice ?>" data-unit="$" class="slider-range-price" data-value-min="<?= $minItem ?>" data-value-max="<?= $maxItem ?>"></div>
                        <a data-currentid="<?= $_GET['id'] ?>" id="filtr_button" href="<?= Url::to(['category/view', 'id' => $category->id, 'min_value' => $_GET['min_value']]) ?>">Filter NOW</a>
                    </div>
                </div>
                
                 <div class="widget widget_recent_product">
                    <h2 class="widget-title">Новинки</h2>
                    
                    
                    <ul class="product-categories">
                      <?php foreach($news as $new): ?>
                        <li>
                          <div class="product-info">
                            <h3 class="product-name"><a href="<?= Url::to(['product/view', 'id' => $new['id']]) ?>"><?= $new['name'] ?></a></h3>
                              <span class="price">
                                <ins>£<?= $new['price'] ?></ins>
                                <del>£<?= $new['old_price'] ?></del>
                              </span>                                 
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                </div>
                
          </div>
    </div>
  </div>
</div>