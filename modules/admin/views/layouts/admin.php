<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\AdminAsset;
use app\components\MenuWidget;
use yii\helpers\Url;
use yii\bootstrap\Modal;

AppAsset::register($this);
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Админка | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
</head>
<body class="home">
<?php $this->beginBody() ?>
<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
	<div class="box-inner">
		<span class="close-menu"><span class="icon pe-7s-close"></span></span>
	</div>
</div>
<div id="header-ontop" class="is-sticky"></div>

<!-- Header -->
<header id="header" class="header style1">
	<div class="top-header">
		<div class="container">
			<div class="inner">
				<div class="main-menu-wapper">
					<div class="row">
						<div class="col-sm-8">
							<ul class="boutique-nav main-menu clone-main-menu">  
							                                  
								<li class="active menu-item-has-children item-megamenu">
									<a href="<?= Url::to(['category/index']) ?>">Категории</a>
								</li>
								<li class="active menu-item-has-children item-megamenu">
									<a href="<?= Url::to(['order/index']) ?>">Заказы</a>
								</li>
								<li class="active menu-item-has-children item-megamenu">
									<a href="<?= Url::to(['product/index']) ?>">Товары</a>
								</li>
								<li class="active menu-item-has-children item-megamenu">
									<a href="<?= Url::to(['slider/index']) ?>">Слайдер</a>
								</li>
								<li class="active menu-item-has-children item-megamenu">
									<a href="<?= Url::to(['reviews/index']) ?>">Отзывы</a>
								</li>
							</ul>
						</div>
						<div class="col-sm-4">
							<span class="mobile-navigation"><i class="fa fa-bars"></i></span>
							<div class="box-control">
								<form  class="box-search" method="get" action="<?= Url::to(['category/search']) ?>">
									<input type="text" class="search" placeholder="Search here..." name="<?= Html::encode('q'); ?>">
									<button class="button-search"><span class="pe-7s-search"></span></button>
								</form>
								<div class="box-settings">
	                                <span class="icon pe-7s-config"></span>
	                                <div class="settings-wrapper">
	                                    <div class="setting-content">
	                                        <div class="setting-option">
	                                            <ul>
	                                                <li><a href="<?= Url::to(['/admin']) ?>"><i class="icon-heart icons"></i><span>Админ панель</span></a></li>
	                                                 <?php if(!Yii::$app->user->isGuest): ?>
	                                                	<li><a href="<?= Url::to(['/site/logout']) ?>"><i class="icon-heart icons"></i><span><?= Yii::$app->user->identity['username'] ?> (Выход)</span></a></li>
	                                                <?php endif; ?>
	                                            </ul>
	                                        </div>
	                                	</div>
	                            	</div>
								</div>
                        	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="main-header">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-3">
					<div class="logo">
						<a href="<?= Url::home(); ?>"><?= Html::img("@web/images/logos/1.png", ['alt' => 'Наш логотип']) ?></a>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-9">
					<ul class="category-menu">
						<!-- <li>
							<a href="#">
							<img src="/images/categorys/1.png" alt="">
							Clothing
							</a>
						</li>
						<li>
							<a href="#">
							<img src="/images/categorys/2.png" alt="">
							Sneakers
							</a>
						</li>
						<li>
							<a href="#">
							<img src="/images/categorys/3.png" alt="">
							Accessories
							</a>
						</li>
						<li>
							<a href="#">
							<img src="/images/categorys/4.png" alt="">
							Handbags
							</a>
						</li>
						<li class="mini-cart">
							<a class="cart-link" href="#" onclick="getCart()">
								<img src="/images/categorys/5.png" alt="">
								My cart
								
							</a>
							
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- ./Header -->

<div class="container">
	<?php if(Yii::$app->session->hasFlash('success')): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dissmis="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo Yii::$app->session->getFlash('success'); ?>
		</div>
	<?php endif; ?>
	
	<?= $content ?>

</div>


	<footer class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row flex-flow">
					<div class="col-sm-12 col-md-4 footer-sidebar">
						<div class="widget contact-info">
							<span class="text-primary PlayfairDisplay">Talk to Us Now !</span>
							<h3 class="widget-title">Contact Us</h3>
							<div class="content">
								<p class="address">5701 Outlets at Tejon Pkwy, Tejon ranch CA 93203 UK.</p>
								<p class="phone"><i class="fa fa-phone"></i> (+800) 6868 2268</p>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4 footer-sidebar">
						<div class="widget our-service">
							<span class="text-primary PlayfairDisplay">Talk to Us Now !</span>
							<h3 class="widget-title">OUR SERVICES</h3>
							<div class="content">
								<ul>
									<li><a href="#">About us</a></li>
									<li><a href="#">Order History</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Custom Service</a></li>
									<li><a href="#">Terms & Condition</a></li>
									<li><a href="#">Order History</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4 footer-sidebar">
						<div class="widget widget_social">
							<span class="text-primary PlayfairDisplay">Talk to Us Now !</span>
							<h3 class="widget-title">FOLLOW US</h3>
							<div class="content">
								<div class="social">
			                        <a href="#"><i class="fa fa-facebook"></i></a>
			                        <a href="#"><i class="fa fa-twitter"></i></a>
			                        <a href="#"><i class="fa fa-google-plus"></i></a>
			                        <a href="#"><i class="fa fa-instagram"></i></a>
			                        <a href="#"><i class="fa fa-pinterest"></i></a>
			                    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
			<div class="payment">
				<div class="head"><span>We Accept</span><span class="PlayfairDisplay">Online Payment Be Secured</span></div>
				<div class="list">
					<a href="#" class="item"><img src="/images/payments/1.png" alt=""></a>
					<a href="#" class="item"><img src="/images/payments/2.png" alt=""></a>
					<a href="#" class="item"><img src="/images/payments/3.png" alt=""></a>
					<a href="#" class="item"><img src="/images/payments/4.png" alt=""></a>
				</div>
			</div>
			</div>
		</div>
	</footer>
	<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>

	

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>