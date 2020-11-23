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
use frontend\widget\TeaserPopupLoginWidget;
use frontend\widget\MinigameVongXoayWidget;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/vongxoay';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vòng Quay Phượng Hoàng</title>
	<?= Html::csrfMetaTags() ?>
	<meta name="title" content="Chuẩn 100% Game ANIME NHẬT BẢN" />
	<meta name="description" content="Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!" />
	<meta property="fb:app_id"  content="347423116197650" /> 
	<meta property="og:title" content="Chuẩn 100% Game ANIME NHẬT BẢN" />
	<meta property="og:description" content="Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!" />
	<meta property="og:image" content="https://www.thonglinhsuh5.com/style/pc/images/sharefb.jpg"/>
	<link rel="shortcut icon" id="favicon" href="https://www.thonglinhsuh5.com/style/pc/images/32-x-32.png">
	<meta name="author" content="MangaPlay">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link href="<?=$styleUrl?>/assets/css/animate.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleUrl?>/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleUrl?>/assets/css/keyframes.css" rel="stylesheet" type="text/css"
	<link href="<?=$styleUrl?>/assets/css/slick.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleUrl?>/assets/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="google-signin-client_id" content="396007536042-b0flp68msb2ockudj7rojld4cvci2hju.apps.googleusercontent.com">
	<script>
	window.fbAsyncInit = function() {
	  //FB JavaScript SDK configuration and setup
	  FB.init({
		appId      : '347423116197650', // FB App ID
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true,  // parse XFBML
		version    : 'v3.3' // use graph api version 2.8
	  });
	};
	</script>
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
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143308424-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-143308424-2');
	</script>
</head>
<body>
	<?php 
	$loginFlag = (Yii::$app->user->isGuest) ? 0 : 1;
	?>	
	<input type="hidden" id="loginFlag" value="<?=$loginFlag?>">
	<?php if(Yii::$app->user->isGuest){ ?>
	<input type="hidden" id="minigameUrlShare" value="<?=$baseUrl?>/teaser">
	<?php }else{?>
	<input type="hidden" id="minigameUrlShare" value="<?=$baseUrl?>/teaser?uid=<?=Yii::$app->user->identity->member_id?>">
	<?php }?>
	
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
	<div id="hidpopup"></div>
	
    <div class="mask"></div>
	<!-- <div class="vongxoay-img" id="vongxoaytichdiem">
        <img style="transform: rotate(-17deg);" src="vongquay.png" alt="" id="img_quay">
        <a href="javascript: void(0)" onclick="quay();" class="nut-vongquay"><img src="nut-vongquay.png"></a>
	</div> -->
	<!-- <p id="ketqua"></p> -->
    <main>
        <section class="block-content">
            <nav>
                <ul>
					<li class='text-home'><a href='https://thonglinhsuh5.com/'>Trang Chủ</a></li>
					<li class='icon-home'><a href='https://thonglinhsuh5.com/'><i class="fas fa-home"></i></a></li>
                    <li class='btn-popup-thele'><a href='javascript:void(0)'>Thể Lệ</a></li>
                    <li class='btn-popup-bxh'><a href='javascript:void(0)'>BXH</a></li>
					<?php if(Yii::$app->user->isGuest){?>
						<li class='btn-popup-login'><a href='javascript:void(0)'>Đăng nhập</a></li>
					<?php }else {?>
						<li class='btn-popup-doiqua'><a href='javascript:void(0)'>Đổi Quà</a></li>
					<?php } ?>
                </ul>
            </nav>
            <div class="logo wow fadeInUp"><img src="<?=$styleUrl?>/assets/images/LOGO.png"></div>
            <div class="title wow zoomIn"><img src="<?=$styleUrl?>/assets/images/title.png"></div>
            <div class='main-content'>
					<div class="nhanvat01 wow bounceInLeft"><img src="<?=$styleUrl?>/assets/images/nv1.png"></div>
					<!-- vòng xoay -->	
					<?php if(!Yii::$app->user->isGuest){?>
						<?=MinigameVongXoayWidget::widget(['member_id' => Yii::$app->user->identity->member_id])?>
					<?php }else{?>
						<?=MinigameVongXoayWidget::widget()?>
					<?php } ?>
					<!-- end vòng xoay -->	
					<div class="nhanvat02 wow bounceInRight"><img src="<?=$styleUrl?>/assets/images/nv2.png"></div>
					<?php if(Yii::$app->user->isGuest){?>
					<div class='button-luotquay' style="bottom: 50px;z-index:999">
						<p style="color: #fff; text-transform: uppercase; font-weight: 600, font-size: 15px;">
							Linh sư hãy <a style="color:red" class='btn-popup-login' href='javascript:;'>Đăng nhập</a> để tham gia vòng quay!
						</p>	
					</div>
					<?php }else {?>
					<div class='button-luotquay'>
						<p>Xin chào: <?=Yii::$app->user->identity->member_username?>!</p>
						<ul>
							<li class='button-01'>
								<a href='javascript:void(0)'>Số lần quay: 
									<span class="minigame_vongquay_luotchoi"><?=$num_luotchoi?></span>
								</a>
							</li>
							<li class='button-02'>
								<a href='javascript:void(0)'>Số điểm của bạn: 
									<span class="minigame_vongquay_point">
										<?=$member_point?>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<?php } ?>
					<div class='img-duck'>
						<div><img src="<?=$styleUrl?>/assets/images/duck3.png"></div>
						<div><img src="<?=$styleUrl?>/assets/images/duck1.png"></div>
					</div>
            </div>
        </section>
    </main>
	<!-- Begin: Popup -->
	
	<div class="popup">
		<?=TeaserPopupLoginWidget::widget()?>
		<!-- begin: popup ket qua -->
		<div class='popup-ketqua'>
			<div  class='bg-ketqua'>
				<span id="ketqua"></span>
				<div class="close-kq"></div>
			</div>
		</div>
		<!-- end: popup ket qua -->
		
		<!-- begin: popup default -->
		<div class='popup-default'>
			<div  class='bg-default'>
				<span id="dfketqua"></span>
				<div class="close-default"></div>
			</div>
		</div>
		<!-- end: popup default -->
		
		<!-- begin: popup the le -->
		<div class="popup-thele">
			<div class="bg">
				<div class="close"><img src="<?=$styleUrl?>/assets/images/close.png"></div>
				<div class="desc">
					<?=$thele_vongquay?>
				</div>
			</div>
		</div>
		<!-- end: popup the le -->
		<!-- begin: popup bxh -->
		<div class="popup-bxh">
			<div class="bg">
				<div class="close"><img src="<?=$styleUrl?>/assets/images/close.png"></div>
				<div class="desc">
						<?php if(!Yii::$app->user->isGuest){?>
						<p>Xin chào: <?=Yii::$app->user->identity->member_username?></p>
						<p>Phượng Vũ: <span class="minigame_vongquay_longphuonghoang">
							<?=$result_member_longphuonghoang?></span></p>
						<?php } ?>
						<div class='popup-title'><img src='<?=$styleUrl?>/assets/images/bxh.png'></div>
						<div class='desc row mt-4'>
							<div class='col-3'></div>
							<div class='col-6'>
									<h3><img src='<?=$styleUrl?>/assets/images/textbxh.png'></h3>
									<div class="img-tongdiem mt-4"><img src="<?=$styleUrl?>/assets/images/tongdiem.png"></div>
									<table class="">
										<?php foreach($bxhTopDiem as $t => $mem){?>
										<tr>
											<td><?=$t+1?></td>
											<td><?=substr($mem['member_username'],0,-3)?>***</td>
											<td><?=$mem['point']?></td>
										</tr>
										<?php } ?>
									</table>
							</div>
							<div class='col-3'></div>
						</div>
				</div>
			</div>
		</div>
		<!-- end: popup bxh -->
		<!-- begin: popup doi qua -->
		<div class="popup-doiqua">
			<div class="bg">
				<div class="close"><img src="<?=$styleUrl?>/assets/images/close.png"></div>
				<div class="desc">
						<?php if(!Yii::$app->user->isGuest){?>
						<p>Xin Chào: <?=Yii::$app->user->identity->member_username?></p>
						<p>Tổng số điểm của bạn: <?=$member_point?></p>
						<?php } ?>
						<div class='popup-title'><img src='<?=$styleUrl?>/assets/images/doiqua.png'></div>
						<div class='content row'>
							<ul>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/socap.png">
									<div  class='btn-doicode'>
										<a class="active btn-doicodephuonghoang" data-id="1" href='javascript:void(0)'>Đổi code</a>
									</div>
								</a></li>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/trungcap.png">
									<div  class='btn-doicode btn-popup-giftcode' >
										<a class="active btn-doicodephuonghoang" href='javascript:void(0)' data-id="2">Đổi code</a>
									</div>
								</a></li>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/caocap.png">
									<div  class='btn-doicode' >
										<a class="active btn-doicodephuonghoang" href='javascript:void(0)' data-id="3">Đổi code</a>
									</div>
								</a></li>
								<li>
									<a href='javascript:void(0)'>
										<img src="<?=$styleUrl?>/assets/images/sieucap.png">
										<div  class='btn-doicode' >
											<a class="active btn-doicodephuonghoang" href='javascript:void(0)' data-id="4">Đổi code</a>
										</div>
									</a>
								</li>
							</ul>
						</div>
				</div>
			</div>
		</div>
		<!-- end popup doi qua -->
		<!-- begin: popup gift code -->
		<div class="popup-giftcode">
			<div class='bg-giftcode'>
				<input id="vongquay-value-code" value="KENHTHONGLINHSU">
				<button onclick="copyCode()"><span><img src="<?=$styleUrl?>/assets/images/coppy.png"></span></button>
				<div class='close-giftcode'></div>
			</div>
		</div>
		<!-- end: popup gift code -->
		<!-- begin: popup chua dang ky -->
		<div class='popup-warning'>
			<div class='bg-warning'>
				<p>Bạn chưa <span>đăng nhập</span>!</p>
				<div class='close-warning'><img src="<?=$styleUrl?>/assets/images/close.png"></div>
			</div>
		</div>
		<!-- end: popup chua dang ky -->
		
	</div>
	
	<script type="text/javascript" src="<?=$styleUrl?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/all.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/slick.min.js" ></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/tilt.jquery.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/custom.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/main_landing.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/minigame_vongxoay.js"></script>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<!-- End: Popup -->
	<script type="text/javascript">
		var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 200,
            mobile: true,
            live: true
        });
        wow.init();
		$(document).ready(function() {
			events();
			$('.bg-giftcode button').click(function() {
				$(this).prev("input").focus();
				$(this).prev("input").select();
				document.execCommand('copy');
			});
		});
	</script>
	<script type="text/javascript">
	   $.ajaxSetup({
		  data: <?= \yii\helpers\Json::encode([
			  \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
		  ]) ?>
	  });
	  
	  startApp();
	</script>
</body>
</html>