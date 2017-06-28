<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

?>

<?php  

$mainImg = $product->getImage();
$gallery = $product->getImages();

?>

<div class="product-details-full">                            
  <div class="container">
      <div class="row">
          <div class="col-md-7 col-lg-7 col-sm-12">
              <div class="product-detail-image">
                  <div class="thumbnails">
                  <?php foreach ($gallery as $img): ?>
                      <a data-url="images/products/10_slide1.png" class="active" href="#"><?= Html::img($img->getUrl('150x150')) ?></a>
                  <?php endforeach; ?>
                  </div>
                  <div class="main-image-wapper">
                      <?= Html::img($mainImg->getUrl('510x510')) ?>
                  </div>

              </div>
          </div>
          <div class="col-md-5 col-lg-5 col-sm-12">
              <div class="product-details-right">
                  <div class="breadcrumbs">
                        <a href="#">Home</a>
                         <a href="#">Sneaker</a>
                        <span>Readwing Shoes 875 MOC</span>
                  </div>
                  <h3 class="product-name"><?= $product->name ?></h3>
                  <div class="rating">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <span class="count-review">( 2 <span>Reviews</span> )</span>
                  </div>
                  <span class="price">
                      <ins><?= $product->price ?></ins>
                      <del><?= $product->old_price ?></del>
                  </span>

                  <div class="short-descript">
                      <p><?= $product->content ?></p>
                      <p>-dark green</p>
                      <p>-polyester / virgin wool / nylon</p>
                      <p>-made in italy</p>
                      <p>-model is 186 cm and wears size 48 = m</p>
                  </div>  
                  <form class="cart" enctype="multipart/form-data" method="post">
                      <div class="quantity">
                          <span>Quantity</span>
                          <input type="text" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" id="qty">
                      </div>
                      <a class="wishlist button" href="#"><i class="fa fa-heart-o"></i></a>
                      <a class="button button-add-cart add-to-cart count-cart" data-id="<?= $product->id ?>" data-quantity="1"  href="#">Add to cart</a>
                  </form>  
              </div>
          </div>
      </div>
    </div>
</div>
<div class="container">                        
    <div class="tab-details-product padding-40-60">
        <ul class="box-tabs nav-tab">
            <li class="active"><a data-toggle="tab" href="#tab-1">DESCRIPTION</a></li>
            <li><a data-toggle="tab" href="#tab-2">ADDITIONAL INFORMATION</a></li>
        </ul>
        <div class="tab-container">
              <div id="tab-1" class="tab-panel active">
                <p>Lorem ipsum dolor sit amet isse potenti sesquam ante aliquet lacusemper elit. Cras neque nulla convallis non comodo.</p>
                <ul>
                    <li>Soft-touch jersey</li>
                    <li>Crew neck </li>
                    <li>Logo print</li>
                    <li>Regular fit - true to size</li>                                                    
                </ul>
                <ul>
                    <li>Machine wash</li>
                    <li>100% Cotton</li>
                    <li>Our model wears a size Medium and is 185.5cm/6'1" tall</li>                                                   
                </ul>
            </div>
            <div id="tab-2" class="tab-panel">
                <p>Quisque sodales sodales lacus pharetra bibendum. Etiam commodo non velit ac rhoncus. Mauris euismod purus sem, ac adipiscing quam laoreet et. Praesent vulputate ornare sem vel scelerisque. Ut dictum augue non erat lacinia, sed lobortis elit gravida. Proin ante massa, ornare accumsan ultricies et, posuere sit amet magna. Praesent dignissim, enim sed malesuada luctus, arcu sapien sodales sapien, ut placerat eros nunc vel est. Donec tristique mi turpis, et sodales nibh gravida eu. Etiam odio risus, porttitor non lacus id, rhoncus tempus tortor. Curabitur tincidunt molestie turpis, ut luctus nibh sollicitudin vel. Sed vel luctus nisi, at mattis metus. Aenean ultricies dolor est, a congue ante dapibus varius. Nulla at auctor nunc. Curabitur accumsan feugiat felis ut pretium. Praesent semper semper nisi, eu cursus augue.</p>
            </div>     
        </div>  
    </div> 

    <div class="upsell-products">
        <div class="section-title text-center"><h3>UPSELL PRODUCTS</h3> </div>
         <ul class="owl-carousel" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}' data-autoplay="true" data-loop="true" data-items="4" data-dots="false" data-nav="false" data-margin="30">
          <?php foreach($hits as $hit): ?>
            <?php $mainImg = $hit->getImage(); ?>
              <li class="product-item">
                  <div class="product-inner">
                      <div class="product-thumb">
                          <a href="<?=Url::to(['product/view', 'id' => $hit->id]) ?>"><?= Html::img($mainImg->getUrl('270x270')) ?></a>
                          <div class="gorup-button">
                            <a href="#" class="wishlist"><i class="fa fa-heart"></i></a>
                            <a href="#" class="compare"><i class="fa fa-exchange"></i></a>
                            <a href="#" class="quick-view"><i class="fa fa-search"></i></a>
                          </div>
                      </div>
                      <div class="product-info">
                          <h3 class="product-name"><a href="<?=Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name ?></a></h3>
                          <span class="price">
                              <ins><?= $hit->price ?></ins>
                              <del><?= $hit->old_price ?></del>
                          </span>
                          <a href="#" class="button">ADD TO CART</a>
                      </div>
                  </div>
              </li>
          <?php endforeach; ?>  
        </ul>   
    </div> 
</div> <!--END CONTAINER-->                                             



<div class="box-list-reviews">
  <div class="container">  
    <div class="row">
      <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="box-review">
          <h4 class="title-border"><span class="text">Отзывы клиентов</span><span class="subtext">( <?= count($reviews_respons); ?> Reviews )</span></h4>
          <ol class="commentlist">
            <?php foreach($reviews_respons as $respons): ?>
              <li class="comment">
                  <div class="comment_container">
                      <div class="comment-info">
                          <div class="meta">
                            <span class="author"><?= $respons->title; ?></span>
                            <span class="date"><?= $respons->date; ?></span>
                          </div>
                      </div>
                      <div class="comment-text">
                          <div class="comment-content"><?= $respons->content; ?></div>
                      </div>
                  </div>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="box-review form-review">
            <h4 class="title-border"><span class="text">Добавить отзыв</span></h4>
            <?php $form = ActiveForm::begin(['id' => 'form-input-example', 'options' => ['class' => 'reviews']]); ?>
              <?= $form->field($reviews, 'title')->textInput(['placeholder' => 'Ваше имя'])->label(false); ?>
              <?= $form->field($reviews, 'email')->textInput(['placeholder' => 'Ваша почта'])->label(false); ?>
              <?= $form->field($reviews, 'content')->textarea(['rows' => 2, 'cols' => 4, 'placeholder' => 'Ваш отзыв'])->label(false); ?>
              <div class="form-group">
                <?= Html::submitButton('Добавить отзыв', ['class' => 'button submit']) ?>
              </div>
            <?php ActiveForm::end();?>
            <?php if(Yii::$app->session->hasFlash('success')): ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dissmis="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
              </div>
            <?php endif; ?>
            <?php if(Yii::$app->session->hasFlash('error')): ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dissmis="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
              </div>
            <?php endif; ?>
            
        </div>
      </div>
    </div>
  </div>
</div>     
                       
<div class="margin-top-60 margin-bottom-30">  
    <div class="container">  
        <div class="row">
          <div class="col-sm-12 col-md-4">
              <div class="element-icon style2">
                <div class="icon"><i class="flaticon flaticon-origami28"></i></div>
                <div class="content">
                  <h4 class="title">FREE SHIPPING WORLD WIDE</h4>
                </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-4">
              <div class="element-icon style2">
                <div class="icon"><i class="flaticon flaticon-curvearrows9"></i></div>
                <div class="content">
                  <h4 class="title">MONEY BACK GUARANTEE</h4>
                </div>
              </div>
          </div>
          <div class="col-sm-12 col-md-4">
              <div class="element-icon style2">
                <div class="icon"><i class="flaticon flaticon-headphones54"></i></div>
                <div class="content">
                  <h4 class="title">ONLINE SUPPORT 24/7</h4>
                </div>
              </div>
          </div>
        </div>
    </div>  
</div>