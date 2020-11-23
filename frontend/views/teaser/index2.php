<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\base\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widget\LeftServersWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\models\GlobalModel;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= 'https://cdn.mangaplay.vn/tutienh5/style/teaser2';
$globalModel = new GlobalModel();
$redirectUrl = $globalModel->RedirectPage('teaser',3);
if($redirectUrl != ""){
	$url_choingay = $redirectUrl;
}else{
	$url_choingay = 'https://tutienh5.com/may-chu';
}
?>
<?php $this->beginPage() ?>
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
   <title>Phàm Nhân Tu Tiên | Cực phẩm tiên hiệp 2019. Tặng VIP 5 + 100.000 Vàng</title>
   <meta name="description" content="Cực Phẩm Tiên Hiệp 2019 Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí VIP 5 + 100.000 Vàng Luôn." />
			<?= Html::csrfMetaTags() ?>
			<?php $this->head() ?>
    <meta name="viewport" content="initial-scale=1, media=orientation:portrait, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <link href='<?=$styleUrl?>/css/onepage-scroll.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/style.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/animate.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/respon.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/flipclock.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/mayla.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/slickmodal.min.css' rel='stylesheet' type='text/css'>
    <link href='<?=$styleUrl?>/css/jquery.bxslider.css' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/png" href="<?=$styleUrl?>/images/32x32.png"/>
    <link rel="stylesheet" media="all and (orientation:portrait)" href="<?=$styleUrl?>/css/respon.css">
	<meta name="google-signin-client_id" content="396007536042-b0flp68msb2ockudj7rojld4cvci2hju.apps.googleusercontent.com">
	<!-- social -->
	<meta property="fb:app_id"  content="2448961692002911" /> 
	<meta property="og:title" content="Cực phẩm tiên hiệp 2019. Tặng VIP 5 + 100.000 Vàng" />
	<meta property="og:description" content="Cực Phẩm Tiên Hiệp 2019 Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí VIP 5 + 100.000 Vàng Luôn." />
	<meta property="og:image" content="https://tutienh5.com/style/teaser2/images/sharefb-min.jpg"/>
	<?php 
		$arrayCoverFb = array(
			'https://tutienh5.com/style/teaser2/images/sharefb2-min.jpg',
			'https://tutienh5.com/style/teaser2/images/sharefb-min.jpg',
		);
	?>
	
	<!-- Facebook Pixel Code -->
		<script>
		  !function(f,b,e,v,n,t,s)
		  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		  n.queue=[];t=b.createElement(e);t.async=!0;
		  t.src=v;s=b.getElementsByTagName(e)[0];
		  s.parentNode.insertBefore(t,s)}(window, document,'script',
		  'https://connect.facebook.net/en_US/fbevents.js');
		  fbq('init', '928732427468850');
		  fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		  src="https://www.facebook.com/tr?id=928732427468850&ev=PageView&noscript=1"
		/></noscript>
	<!-- End Facebook Pixel Code -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143308424-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-143308424-1');
	</script>
	
	<script>
	(function() {
	  var ta = document.createElement('script'); ta.type = 'text/javascript'; ta.async = true;
	  ta.src = document.location.protocol + '//' + 'static.bytedance.com/pixel/sdk.js?sdkid=BKASGEU8QSTSDCAV2HSG';
	  var s = document.getElementsByTagName('script')[0];
	  s.parentNode.insertBefore(ta, s);
	})();
	</script>
</head>
<body>
	<!-- set login -->
	<?php 
		$loginFlag = (Yii::$app->user->isGuest) ? 0 : 1;
	?>	
	<input type="hidden" id="loginFlag" value="<?=$loginFlag?>">
	<!-- end set login -->
  <div class="wrapper">
    <div class="box-game">
        <!--  -->
        <div class="menu">
            <img src="<?=$styleUrl?>/images/mobile/menu/logo.png" width="125">
            <a class="btn-popupGiftcodeTb"><img src="<?=$styleUrl?>/images/mobile/menu/btn1.png" width="190" ></a>
            <a class="btn-popupDangnhap"><img src="<?=$styleUrl?>/images/mobile/menu/btn2.png" width="190"></a>
            
            <a><img src="<?=$styleUrl?>/images/mobile/menu/ractangle.png" width="46"></a>
            <a><img src="<?=$styleUrl?>/images/mobile/menu/facebook.png" width="46"></a>
        </div>
        <!-- end -->
        <!-- menu bottom mobile -->
		<?php if(Yii::$app->user->isGuest){?>
        <div class="menu-mb" style="display: none">
            <img src="<?=$styleUrl?>/images/mobile/menu/logo.png" width="125">
            <a class="btn-popupDangnhapMb btn-popupDangnhap">
				<img src="<?=$styleUrl?>/images/mobile/btn-play-android.png" width="100%">
			</a>
			<a class="btn-popupDangnhapMb btn-popupDangnhap">
				<img src="<?=$styleUrl?>/images/mobile/btn-play-ios.png" width="100%">
			</a>
			<a class="btn-popupGiftcodeMb">
				<img src="<?=$styleUrl?>/images/mobile/menu/mb-giftcode.png" width="100%">
			</a>
        </div>
		<?php }else{?>
		<div class="menu-mb" style="display: none">
            <img src="<?=$styleUrl?>/images/mobile/menu/logo.png" width="125">
            <a href="<?=$url_choingay?>" class="btn-popupDangnhapMb">
				<img src="<?=$styleUrl?>/images/mobile/btn-play-android.png" width="100%">
			</a>
			<a href="<?=$url_choingay?>" class="btn-popupDangnhapMb">
				<img src="<?=$styleUrl?>/images/mobile/btn-play-ios.png" width="100%">
			</a>
			<a class="btn-popupGiftcodeMb">
				<img src="<?=$styleUrl?>/images/mobile/menu/mb-giftcode.png" width="100%">
			</a>
        </div>
		<?php } ?>
        <!-- end menu mobile -->
        <img class="black" src="<?=$styleUrl?>/images/mobile/menu/bg.png" style="z-index: 5">
    </div>

    <audio preload="auto" id="audio" autoplay loop="loop">
        <source src="<?=$styleUrl?>/music.mp3" type="audio/mpeg">
    </audio>
    <div class="imgAudio">
        <img id="mute" src="<?=$styleUrl?>/images/speaker.png" width="53" class="audioPlay">
        <img id="unmute" src="<?=$styleUrl?>/images/mute.png" width="53" style="display: none" class="audioMute">
    </div>
    
    <div class="right">
        <div class="bg-right">
			<?php if(Yii::$app->user->isGuest){?>
            <a class="btn-popupDangnhap">
				<img src="<?=$styleUrl?>/images/right/choingay-h.png" width="130" class="btnChoingayDefaul">
			</a>
			<?php } else{?>
			<a href="<?=$url_choingay?>">
				<img src="<?=$styleUrl?>/images/right/choingay-h.png" width="130" class="btnChoingayDefaul">
			</a>
			<?php } ?>
            <a target="_blank" href="https://www.facebook.com/groups/1115885905211160/
">
				<img src="<?=$styleUrl?>/images/right/congdong.png" width="100" class="congdongDefaul">
			</a>
            <a target="_blank" href="https://www.facebook.com/phamnhantutien.H5/">
				<img src="<?=$styleUrl?>/images/right/fanpage.png" width="90" class="fanpageDefaul">
			</a>
            <a href="/">
				<img src="<?=$styleUrl?>/images/right/trangchu.png" width="95" class="trangchuDefaul">
			</a>
        </div>
    </div>
	<div class="rightmb">
		<div>
			<a href="/">
				<img src="<?=$styleUrl?>/images/mobile/menu/ractangle.png" style="width:35px" width="35px">
			</a>
		</div>
		<div>
			<a target="_blank" href="https://www.facebook.com/phamnhantutien.H5/">
				<img src="<?=$styleUrl?>/images/mobile/menu/facebook.png" style="width:35px" width="35px">
			</a>
		</div>
	</div>
    <div class="logos">
        <img src="<?=$styleUrl?>/images/logo.png" class="responsive" width="295">
    </div>
   <div class="beta">
        <img src="<?=$styleUrl?>/images/closebeta.png" class="responsive" width="309">
    </div>
    <div class="left">
        <nav id="menu-nav">
            <ul class="onepage-pagination">
              <li><a class="btn-gt" id="1" href="#1" data-index="1">
                <img id="gioithieu" src="<?=$styleUrl?>/images/left/gioithieu.png" class="gioithieu responsive" width="111">
            </a></li>
              <li><a class="btn-tn" id="2" href="#2" data-index="2">
                  <img id="tinhnang" src="<?=$styleUrl?>/images/left/tinhnang.png" class="tinhnang responsive" width="83">
              </a></li>
              <li><a class="btn-tl" id="3" href="#3" data-index="3">
                <img id="timeline" src="<?=$styleUrl?>/images/left/timeline.png" class="timeline responsive" width="83">
              </a></li>
            </ul>
        </nav>
    </div>
    <div class="mouse">
        <img src="<?=$styleUrl?>/images/mouse.png" alt="">
    </div>
    <div class="gift-code btn-popupGiftcode">
        <img src="<?=$styleUrl?>/images/left/giftcode.png" alt="">
    </div>
    <div class="main main-pc">
        <section class="page1">
            <div class="clouds_one"></div>
            <div class="clouds_two"></div>
            <div class="clouds_three"></div>
            <div class="la_1"></div>
            <div class="la_2"></div>
            <div class="la_3"></div>
            <div class="la_4"></div>
            <div class="la_5"></div>
            <div class="la_6"></div>
            <div class="la_7"></div>
            <center>
                <!-- slogan -->
                <div class="wrap-page1">
                    
                    <div class="slogan-ani open-sm ">
                        <div class="slogan animated zoomIn">
                            <img src="<?=$styleUrl?>/images/slogan.png" id="slogan-img" class="btn-popupVideo responsive" width="100%">
                        </div>
                    </div>
                    <!-- / slogan -->
                    <div class="wrap-nhanvat">
                        <div id="nhanvat1" class="nhanvat1 animated fadeInRight" style="animation-delay: 500ms; z-index: 99">
                            <img src="<?=$styleUrl?>/images/page1/nv1.png" class="responsive" > 
                        </div>

                        <div id="nhanvat2" class="nhanvat2 animated fadeInLeft " style="animation-delay: 500ms; z-index: 99">
                            <img src="<?=$styleUrl?>/images/page1/nv2.png" class="responsive">
                        </div>
                        <div id="nhanvat3" class="nhanvat3 animated zoomIn" style="animation-delay: 250ms;z-index: 99">
                            <img src="<?=$styleUrl?>/images/page1/nv3.png" class="responsive">
                        </div>
                    </div>
                </div>
            </center>
        </section>
        
        <section class="page2">
            <div class="clouds_one"></div>
            <div class="clouds_two"></div>
            <div class="clouds_three"></div>
            <div class="la_1"></div>
            <div class="la_2"></div>
            <div class="la_3"></div>
            <div class="la_4"></div>
            <div class="la_5"></div>
            <div class="la_6"></div>
            <div class="la_7"></div>
            <!-- pc -->
            <div class="wrap-page2 page2-pc" style="display: block">
                <div class="slidePage2 slider1">
                    <div class="slide"><img src="<?=$styleUrl?>/images/tinhnang/s1.png" width="1920"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/tinhnang/s2.png" width="1920"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/tinhnang/s3.png" width="1920"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/tinhnang/s4.png" width="1920"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/tinhnang/s5.png" width="1920"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/tinhnang/s6.png" width="1920"></div>
                </div>  
            </div> 
            <!-- end pc -->
            <!-- tb -->
            <div class="wrap-page2 page2-tb" style="display: none">
                <div class="slidePage2 slider1">
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/s1.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/s2.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/s3.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/s4.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/s5.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/s6.png" width="100%"></div>
                </div>
            </div>  
            <!-- end tb -->
            <!-- mb -->
            <div class="wrap-page2 page2-mb" style="display: none">
                <div class="slidePage2 slider1">
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/1.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/2.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/3.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/4.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/5.png" width="100%"></div>
                    <div class="slide"><img src="<?=$styleUrl?>/images/mobile/page2/6.png" width="100%"></div>
                </div>
            </div>  
         
            <!-- end mb -->
        </section>

        <section class="page3">
            <div class="clouds_one"></div>
            <div class="clouds_two"></div>
            <div class="clouds_three"></div>
            <div class="la_1"></div>
            <div class="la_2"></div>
            <div class="la_3"></div>
            <div class="la_4"></div>
            <div class="la_5"></div>
            <div class="la_6"></div>
            <div class="la_7"></div>
            <!-- pc -->
            
                <!-- trang thai chua dat -->
            <div id="page3-pc" class="wrap-page3" style="display: block">
                    <div class="nhanvat-page3 responsive">
                        <img src="<?=$styleUrl?>/images/page3/bg.png" width="100%">
                        <ul class="timecount" id="countdown">
                        <li class="days">00</li>
                        <li class="hours">00</li>
                        <li class="minutes">00</li>
                        <li class="seconds">00</li>
                    </ul>
                    <div class="page3-menu" class="responsive">
                        <img src="<?=$styleUrl?>/images/icon.png" alt="" class="responsive  icon-product" width="469">
                        <div class="page3-btn" class="responsive">
                            <!-- d1  -->
							<?php if($num_share<1000){?>
                            <div id='d1' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/s1k.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d1' class='fb-done' ><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhancode.png" data-id="1" class="nhancode cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d2 -->
							<?php if($num_share<2000){?>
                            <div id='d2' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/s2k.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d2' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhancode.png" data-id="2" class="nhancode cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d3 -->
							<?php if($num_share<5000){?>
                            <div id='d3' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/s5k.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d3' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept.png" alt="" class=" cursor responsive" width="156" >
                                <img src="<?=$styleUrl?>/images/page3/nhancode.png" data-id="3" class="nhancode cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d4 -->
							<?php if($num_share<8000){?>
                            <div id='d4' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/tuong2.png" alt="" class="cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d4' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept-tuong2.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhantuong.png" data-id="4" class="nhantuong cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d5 -->
							<?php if($num_share<10000){?>
                            <div id='d5' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/tuong1.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d5' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept-tuong1.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhantuong.png" data-id="5" class="nhantuong cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <div class='btn-FootPage3'>
                                <img src="<?=$styleUrl?>/images/page3/like.png" alt="" class="btnLike cursor responsive" width="36">
                                <div class='btn-luotshare'><span>Đã Đạt <?=number_format($num_share)?> Lượt</span></div>
                                <div class="share-fa">
									<img src="<?=$styleUrl?>/images/page3/share1.png" alt="" class="btnShare cursor responsive" width="42">
								</div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
            </div>
            <!-- end trang thai chua dat -->
            
            <!-- end pc -->
            <!-- mb -->
            <div class='page3-mb' style="display: none">
                <div  class="wrap-page3" >
                    <div class="nhanvat-page3 responsive">
                        <img src="<?=$styleUrl?>/images/mobile/page3/bg-img.png" width="1190px" class='bg-page3__tb'>
                        <img src="<?=$styleUrl?>/images/mobile/page3/bg1.png" width="1190px" class='bg-page3__mb'>
                        <div  class="timecount-custom responsive">
                            <ul class="timecount" id="countdown">
                                <li class="days">00</li>
                                <li class="hours">00</li>
                                <li class="minutes">00</li>
                                <li class="seconds">00</li>
                            </ul>
                        </div>
                        <div class="page3-menu" class="responsive">
                        <img src="<?=$styleUrl?>/images/icon.png" alt="" class="responsive  icon-product" width="42%" style="margin: -9% 3.5%; width: 53%!important">
                        <div class="page3-btn" class="responsive">
                           <!-- d1  -->
							<?php if($num_share<1000){?>
                            <div id='d1' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/s1k.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d1' class='fb-done' ><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhancode.png" data-id="1" class="nhancode cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d2 -->
							<?php if($num_share<2000){?>
                            <div id='d2' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/s2k.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d2' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhancode.png" data-id="2" class="nhancode cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d3 -->
							<?php if($num_share<5000){?>
                            <div id='d3' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/s5k.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d3' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept.png" alt="" class=" cursor responsive" width="156" >
                                <img src="<?=$styleUrl?>/images/page3/nhancode.png" data-id="3" class="nhancode cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d4 -->
							<?php if($num_share<8000){?>
                            <div id='d4' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/tuong2.png" alt="" class="cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d4' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept-tuong2.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhantuong.png" data-id="4" class="nhantuong cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- d5 -->
							<?php if($num_share<10000){?>
                            <div id='d5' class='fb-wait'>
                                <img src="<?=$styleUrl?>/images/page3/tuong1.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/share.png" alt="" class="share-fa sharecode cursor responsive" width="122">
                            </div>
							<?php }else{ ?>
                            <div id='d5' class='fb-done'><!-- active -->
                                <img src="<?=$styleUrl?>/images/page3/accept-tuong1.png" alt="" class=" cursor responsive" width="156">
                                <img src="<?=$styleUrl?>/images/page3/nhantuong.png" data-id="5" class="nhantuong cursor responsive" width="122">
                            </div>
							<?php } ?>
                            <!-- button -->
                            <div class='btn-FootPage3__mb'>
                                <img src="<?=$styleUrl?>/images/page3/like.png" alt="" class="btnLike cursor responsive" width="36">
                                <div class='btn-luotshare'><span>Đã Đạt <?=number_format($num_share)?> Lượt</span></div>
                                <div class="share-fa"><img src="<?=$styleUrl?>/images/page3/share1.png" alt="" class="btnShare cursor responsive" width="42"></div>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                    
                    
                </div>
            </div>
                
            <!-- end mb -->
        </section>
    </div>
</div>
<!-- popup utube -->
<div id="ytVideo" data-sm-init="true" style="width: 100%; height: 100%"></div>


<!-- Popup dang nhap pc-->

<div class="popupDangnhapPc alert-1-2 popup" data-sm-init="true">
    <div class="popupDangnhap-image">
        <div class="popupDangnhap-background__textButton">
			<ul>
				<li id="btn-dangnhap" class="cursor">
					<a href="javascript:;" class="active"></a>
				</li>
				 <!--style="margin: 0 10px;"--> 
				<li id="popupDangnhapPc-line"><img src="<?=$styleUrl?>/images/popup/line.png"></li>
				<li id="btn-dangky" class="cursor">
					<a href="javascript:;"></a>
				</li>
			</ul>
        </div>
        <div class="pop-login" >
			<form action="/ajax-login" >
				<div class="popupDangnhap-background__input">
					<input type="text" name="username" id="username" placeholder="Tên đăng nhập">
					<input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
				</div>
				<div class="popupDangnhap-btnDangnhap btnDangnhap">
					<div class="popup-btndangnhap cursor">
						<img src="<?=$styleUrl?>/images/popup/btn-dangnhap.png">
					</div>
					<div class="popup-btndangnhapH cursor" style="display: none">
						<img src="<?=$styleUrl?>/images/popup/btn-dangnhap-h.png" >
					</div>
				</div>
			</form>
		</div>
		
		<div class="pop-register" style="display:none">
			<form action="/ajax-register" >
				<div class="popupDangnhap-background__input">
					<input type="text" 	   name="username" id="username" class="username"	placeholder="Tên đăng nhập">
					<input type="password" name="password" id="password" class="password"	placeholder="Nhập mật khẩu">
					<input type="password" name="repassword" id="repassword" class="input-nhaplaimkMb repassword"	placeholder="Nhập lại mật khẩu">
				</div>
				<div class="popupDangnhap-btnDangnhap btnDangky">
					<div class="popup-btndangnhap cursor">
						<img src="<?=$styleUrl?>/images/popup/btn-dangky.png">
					</div>
					<div class="popup-btndangnhapH cursor" style="display: none">
						<img src="<?=$styleUrl?>/images/popup/btn-dangky-h.png" >
					</div>
				</div>
			</form>
		</div>
        <div class="popupDangnhap-dangnhapbang">
            <ul>
				<li style="float: left; position: relative;top: 2px;left: -5px;">
					<img src="<?=$styleUrl?>/images/popup/dangnhapbang.png">&ensp;
				</li>
				<li style="float: left;margin-right:5px" class="cursor">
					<a href="javascript:;" onClick="FBLogin();"><img src="<?=$styleUrl?>/images/popup/fb.png"></a>
				</li>
				<li style="float: left;"  class="cursor">
					<a href="javascript:;" id="my-signin2">
						<img src="<?=$styleUrl?>/images/popup/gg.png">
					</a>
				</li>
            </ul>
        </div>
                    
    </div>
</div>


<!-- popup gift code pc -->
<div class="popup-nhapsdt">
	<div class='popup-nhapsdt-content'>
			<?php 
			if(isset(Yii::$app->user->identity->member_phone)){
			?>
			<input name="txtMemberPhonenumber" class="txtMemberPhonenumber" type="text" value="<?=Yii::$app->user->identity->member_phone?>">
			<?php }else{?>
			<input name="txtMemberPhonenumber" class="txtMemberPhonenumber" type="text">
			<?php } ?>
			<div class="teaser-updateMemberPhonenumber">
			</div>
		<div class="popup-nhapsdt-close"></div>
	</div>
</div>


<!-- thong bao openbeta -->
<div class='popup-openbeta-thongbao'>
	<div class='popup-openbeta-thongbao-content'>
		<div class='popup-openbeta-thongbao-detail'><img src='<?=$styleUrl?>/images/ramatopenbeta.jpg'></div>
		<div class="btn-openbeta-thongbao-close"></div>
	</div>
</div>


<!-- popup gift code pc -->
<div class="popup-giftcode">
	<div class='popup-giftcode-content'>
			<input name="txtMemberGiftcode" class="txtMemberGiftcode" id="txtMemberGiftcode" type="text" value="PHANNHANTUTIEN H5">
		<div class="popup-giftcode-close"></div>
	</div>
</div>

<!-- end popup gift code -->
<div style='<?=(Yii::$app->user->isGuest) ? "display:none" : ""; ?>' class="logged-user" id="logged-user" > 
	<div style="position: fixed; top: 0px; left: 0px;z-index: 49999; height: 25px; background-repeat: no-repeat;">
		<p style="padding:0;margin:5px 0px">
			<span id="logged-username" style="color:#1f1f1f; font-size:14px">
				<?php 
					if(!Yii::$app->user->isGuest){
						echo 'Xin chào : '. \Yii::$app->user->identity->member_username. '! <a href="javascript:;" style="color:#1f1f1f; font-size:14px" class="teaser-logout"> Thoát </a>';
					}
				?>
			</span>
		</p>
	</div>
</div>

<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.onepage-scroll.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.velocity.min.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/start.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/countdown.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.transit.min.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/script.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/flipclock.min.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/event.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.slickmodal.js"></script>
<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/main.js"></script>
<script src="https://www.youtube.com/player_api"></script>
<script src="https://apis.google.com/js/api:client.js"></script>
<script type="text/javascript">
    var slideIndex = 1;
    cursor();
    slidePage2();
    btnHover();
	dangNhap();
    popupDangnhapMb();
    popupvideo();
    btn();
	startApp();
    var clock;
    var ytVideo;
    function onYouTubePlayerAPIReady () {
       ytVideo = new YT.Player('ytVideo', {
          videoId: 'AcBk23_IYjY' // Insert your YouTube video ID here
       });
    }
    $(document).ready(function() {
        var clock;
        clock = $('.clock').FlipClock({
            clockFace: 'DailyCounter',
            autoStart: false,
            callbacks: {
                stop: function() {
                    $('.message').html('The clock has stopped!')
                }
            }
        });
        clock.setTime(220880);
        clock.setCountdown(true);
        clock.start();

    }); 

    var slider = $('.slider1').bxSlider({
            minSlides: 1,
            infiniteLoop: true,
            moveSlides: 1,
            hideControlOnEnd: true,
            auto: true,
            slideMargin: 2,
            pager:true,
        });

    $('.bx-prev').css('display','none');
    $('.bx-next').css('display','none');

    var vid = document.getElementById("audio");
    $("#unmute").click(function(){
        vid.muted = false;
    })
    $("#mute").click(function(){
        vid.muted = true;
    })
    $("#slogan-img").click(function(){
        vid.pause(); 
    })
    $(".sm-button").click(function(){
        vid.play(); 
    })

</script>
<script type="text/javascript">
   $.ajaxSetup({
	  data: <?= \yii\helpers\Json::encode([
		  \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
	  ]) ?>
  });
</script>
</body>
</html>

