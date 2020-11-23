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
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<html lang="en"><head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="title" content="Chuẩn 100% Game ANIME NHẬT BẢN" />
<meta name="description" content="Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!" />
<meta property="fb:app_id"  content="347423116197650" /> 
<meta property="og:title" content="Chuẩn 100% Game ANIME NHẬT BẢN" />
<meta property="og:description" content="Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!" />
<meta property="og:image" content="<?=$styleUrl?>/images/sharefb.jpg"/>
<link rel="shortcut icon" id="favicon" href="<?=$styleUrl?>/images/32-x-32.png">
<meta name="author" content="MangaPlay">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143308424-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143308424-2');
</script>
<style>
	#PlayFrame{
		float: right;
		margin: -7px;
		padding: 0;
		overflow: hidden;
		border: none;
		background: #000;
	}
	<?php if($error==true){?>
	body {
	 background-image: url("https://thonglinhsuh5.com/style/common/images/load-game-PC.png");
	 background-color: #cccccc;
	}
	.jconfirm .jconfirm-holder{
		    max-width: 500px;
			margin: 0 auto;
	}
	<?php }?>
</style>

<link rel="stylesheet" href="/style/playgame/css/floating.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<body style="">
	<!--<div class="floating">
		<div class="floating__icon">
			<img src="/style/playgame/images/logo.png" style="max-width: 100%">
		</div>
		<div class="floating__content">
			<a class="icons-ft-home" href="#" target="_blank"></a>
			<a class="icons-ft-naptien" href="#" target="_blank"></a>
			<a class="icons-ft-sukien" href="su-kien_1423.html" target="_blank"></a>
			<a class="icons-ft-fanpage" href="#" target="_blank"></a>
			<a class="icons-ft-thoat" href="#"></a>
		</div>
	</div>-->
	<!-- Iframe -->
	<?php if($error==false){?>
		<iframe style="width:100%;height:100%" frameBorder="0" wmode="Opaque"framespacing="0" border="0" scrolling="no" src="<?=$url_playgame?>" id="PlayFrame">
		</iframe>
	<?php }?>
	<script src="/style/playgame/js/jquery-1.10.2.min.js"></script>
	<script src="/style/playgame/js/floating.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#PlayFrame').css({
				'width': $(window).width(),
				'height': $(window).height()
			});
		});
	</script>
	<?php if($error==true){?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
			$.confirm({
				title: 'Thông Linh Sư!',
				content: 'Máy chủ đang cập nhật vui lòng quay lại sau!',
				buttons: {
					alphabet: {
						text: 'Quay về trang chủ',
						action: function(){
							window.location.replace("https://thonglinhsuh5.com");
						}
					}
				}
			});
		});
	</script>
	<?php }?>
</body>
</html>