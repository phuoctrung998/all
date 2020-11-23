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
$globalModel = new GlobalModel();
$redirectUrl = $globalModel->RedirectPage('homepage',3);
if($redirectUrl != ""){
	$url_choingay = $redirectUrl;
}else{
	$url_choingay = 'https://tutienh5.com/may-chu';
}
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= '/style/m_trangchu';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<?php $this->beginPage() ?>
<html class="">
   <head>
      <meta charset="utf-8">
         <title><?= Html::encode($this->title) ?></title>
			<?= Html::csrfMetaTags() ?>
			<?php $this->head() ?>
    <meta property="fb:app_id"  content="2448961692002911" /> 
	<meta property="og:title" content="Cực phẩm tiên hiệp 2019. Tặng VIP 5 + 100.000 Vàng" />
	<meta property="og:description" content="Cực Phẩm Tiên Hiệp 2019 Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí VIP 5 + 100.000 Vàng Luôn." />
	<meta property="og:image" content="https://tutienh5.com/style/teaser2/images/sharefb-min.jpg"/>
	<link rel="shortcut icon" type="image/png" href="https://cdn.mangaplay.vn/tutienh5/style/teaser2/images/32x32.png"/>
    <!-- Custom css -->
	
		<link href="<?=$styleUrl?>/css/fancybox.css" rel="stylesheet" type="text/css">
		<link href="<?=$styleUrl?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
		<link href="<?=$styleUrl?>/css/custom.css" rel="stylesheet" type="text/css">
		<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	  
		<script type="text/javascript" src="<?=$styleUrl?>/js/jquery.min.js"></script>
		<script src="https://cdn.mangaplay.vn/tutienh5/style/pc/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=$styleCommonUrl?>/js/napthe.js"></script>
		<script src="<?=$styleCommonUrl?>/js/doixu.js"></script>
		<script src="<?=$styleCommonUrl?>/js/common.js"></script>
      <script type="text/javascript">
         var clientKey = 'x2q1zab255othakbnjrdpkekja2h7bcu';
         (function (d, s, id, c) {
         	var js = d.getElementsByTagName(s)[0];
         	if (d.getElementById(id)) {
         		return;
         	}
         	var jtsrc = d.createElement(s);
         	jtsrc.id = id;
         	jtsrc.src = "https://btcvn.me/v3/js/frm.agent.1.0.0.js?id=" + c;
         	js.parentNode.insertBefore(jtsrc, js);
         }(document, 'script', 'sdk-cmu', clientKey));
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
      <style type="text/css">.fancybox-margin{margin-right:0px;}</style>
   </head>
   <body>
      <div id="hidpopup" style="display: none;"></div>
      <div class="fpop-login" style="display: none;">
         <div class="pop-login-close">
            <a href="javascript:void(0);"></a>
         </div>
         <ul class="login-menu">
            <li class="active"><a href="javascript:void(0);">Đăng nhập</a></li>
            <li><a href="javascript:void(0);">Đăng ký</a></li>
         </ul>
         <div class="login-box">
            <div class="tab pop-login active">
               <input type="text" name="username" id="username" placeholder="Tên đăng nhập">
               <input type="password" name="password" id="password" placeholder="Mật khẩu">
               <div class="login-submit">
                  <a href="javascript:;" class="btnDangnhap">
                  <img src="<?=$styleUrl?>/images/start.png" alt="">
                  <img src="<?=$styleUrl?>/images/start.png" alt="">
                  </a>
               </div>
            </div>
            <div class="tab pop-register">
               <input type="text" name="username" id="username" class="username" placeholder="Tên đăng nhập">
               <input type="password" name="password" id="password" class="password" placeholder="Mật khẩu">
               <input type="password" name="repassword" id="repassword" class="input-nhaplaimkMb repassword" placeholder="Nhập lại mật khẩu">
               <div class="login-submit">
                  <a href="javascript:;" class="btnDangky">
                  <img src="<?=$styleUrl?>/images/start.png" alt="">
                  <img src="<?=$styleUrl?>/images/start.png" alt="">
                  </a>
               </div>
            </div>
         </div>
         <ul class="social">
            <li>
				<a id="btnGoogleSignin" href="javascript:;"><img src="<?=$styleUrl?>/images/gplus.png" alt=""></a>
			</li>
            <li><a onClick="FBLogin();" href="javascript:;"><img src="<?=$styleUrl?>/images/fb.png" alt=""></a></li>
         </ul>
      </div>
      <header id="header" class="header">
         <div class="header-wrap">
            <div class="btn-menu">
               <span></span>
            </div>
            <!-- //mobile menu button -->
			<?php if(Yii::$app->user->isGuest){?>
            <div class="account">
               <div class="info">
                  <div class="name" style="margin-top: 8px;">
                     <a href="javascript:;" onclick="ShowMLogin()">Đăng nhập</a> / <a href="javascript:;" onclick="ShowMLogin()">Đăng ký</a>
                  </div>
               </div>
            </div>
			<?php }else{?>
			<!-- logged -->
			<div class="account">
				<div class="image">
					<img src="<?=$styleUrl?>/images/avartar.png" alt="">
				</div>
				<div class="info">
					<div class="name">
						<a href="javascript:;"><?=Yii::$app->user->identity->member_username?></a>
					</div>
					<ul>
						
						<li>
							<a href="/thong-tin-tai-khoan">Thông tin tài khoản</a>
						</li>
						<li>
							<a class="btnHomeLogout" href="javascript:;">Thoát</a>
						</li>
					</ul>
				</div>
			</div>
			<?php }?>
			<!-- end logged -->
            <ul class="box-canvas">
               <li>
                  <a target="_blank" href="/teaser">
					<img src="<?=$styleUrl?>/images/giftcode.png" alt="">
                  </a>
               </li>
               <li>
                  <a target="_blank" href="https://www.facebook.com/phamnhantutien.H5/">
                  <img src="<?=$styleUrl?>/images/facebook.png" alt="">
                  </a>
               </li>
            </ul>
         </div>
         <!-- /.header-wrap -->
      </header>
      <nav id="mainnav-mobi" class="mainnav">
         <span>x</span>
         <ul class="menu">
            <li><a href="/" class="active">Trang Chủ</a></li>
            <li><a href="/chuyen-muc/tin-tuc" title="Tin Tức">Tin Tức</a></li>
            <li><a href="/chuyen-muc/su-kien" title="Sự Kiện">Sự Kiện</a></li>
            <li><a href="/chuyen-muc/cam-nang" title="Cẩm Nang">Cẩm Nang</a></li>
            <li><a href="/chuyen-muc/tan-thu" title="Hướng Dẫn">Đặc sắc</a></li>
            <li><a target="_blank" href="https://www.facebook.com/phamnhantutien.H5/" title="Hỗ Trợ">Hỗ Trợ</a></li>
         </ul>
         <!-- /.menu -->
      </nav>
      <!-- /#mainnav -->
	  <section class="banner-area">
	 <div class="logo">
		<a href="/">
		<img src="<?=$styleUrl?>/images/logo.png" alt="">
		</a>
	 </div>
	 <div class="banner-container">
		<figure>
		   <img src="<?=$styleUrl?>/images/banner.png" alt="">
		</figure>
		<div class="image-up">
		   <img src="<?=$styleUrl?>/images/title.png" alt="">
		</div>
	 </div>
  </section>
	  <section class="box-game">
		 <div class="image">
			<img src="<?=$styleUrl?>/images/avartar_big.png" alt="">
		 </div>
		 <div class="box-content">
			<div class="slogan">
			   <img src="<?=$styleUrl?>/images/slogan.png" alt="">
			</div>
			<ul class="list-game">
			   <?php if(Yii::$app->user->isGuest){?>
			   <li>
				  <a href="javascript:void(0);" onclick="ShowMLogin()">
				  <img width="114px" src="<?=$styleUrl?>/images/choingay.png" alt="">
				  </a>
			   </li>
			   <?php }else{?>
			   <li>
				  <a href="<?=$url_choingay?>">
				  <img src="<?=$styleUrl?>/images/choingay.png" alt="">
				  </a>
			   </li>
			   <?php }?>
			   <li>
				  <a href="/nap-the">
				  <img src="<?=$styleUrl?>/images/card.png" alt="">
				  </a>
			   </li>
			</ul>
		 </div>
	  </section>
		<?=$content?>
		<!--
	<section class="box-game" style="bottom: 0px; position: fixed;">
			<div class="image">
			</div>
			<div class="box-content">
				
				<ul class="list-game">
					<li>
						<a href="#">
							<img class="boxgame-choingay openSlickModal-1" src="images/menubottom/choingay.png" alt="">
						</a>
					</li>
					<li>
						<a href="nap-the.html">
							<img class="boxgame-napthe" src="images/menubottom/napthe.png" alt="">
						</a>
					</li>
					<li>
						<a href="#">
							<img class="boxgame-giftcode" src="images/menubottom/giftcode.png" alt="">
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<img class="boxgame-facebook" src="images/menubottom/facebook.png" alt="">
						</a>
					</li>
				</ul>
			</div>
		</section>	-->
      <footer id="footer" class="text-center">
         <div class="logo-ft">
            <a href="/">
            <img src="<?=$styleUrl?>/images/logo.png" alt="">
            </a>
         </div>
         <p><a href="/">Game Phàm Nhân Tu Tiên H5</a> - Hội tụ tinh hoa tiên hiệp</p>
         <p>Bản quyền thuộc về <a href="javascript:;">MangaPlay</a> độc quyền phát hành tại Việt Nam</p>
      </footer>
      <script type="text/javascript" src="<?=$styleUrl?>/js/owl.carousel.js"></script>
	  <script type="text/javascript" src="<?=$styleUrl?>/js/jquery.liquidcarousel.min.js"></script>
      <script type="text/javascript" src="<?=$styleUrl?>/js/jquery.fancybox.js"></script>
      <script type="text/javascript" src="<?=$styleUrl?>/js/main.js"></script>
	 
	  <script type="text/javascript" src="https://tutienh5.com/style/common/js/mainsite.js"></script>
		<script src="https://apis.google.com/js/api:client.js"></script>
		<script>
			startAppMobile();
		</script>

   </body>
</html>