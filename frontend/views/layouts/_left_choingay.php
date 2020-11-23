<?php

/* @var $this yii\web\View */
use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;
use frontend\widget\TrendWidget;
use frontend\widget\CateByType;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\widget\LeftServersWidget;
use frontend\widget\LeftSlider;
use frontend\models\GlobalModel;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style/pc';

$globalModel = new GlobalModel();
$redirectUrl = $globalModel->RedirectPage('homepage',3);
if($redirectUrl != ""){
	$url_choingay = $redirectUrl;
}else{
	$url_choingay = 'https://tutienh5.com/may-chu';
}
?>
<!-- button choi ngay -->
<?php if(Yii::$app->user->isGuest){?>
<div class="btn-choingay openSlickModal-1 btnHomeChoingay">
	<div class="left-Layer1001 cursor" style="display:block;">
		<img  src="<?=$styleUrl?>/assets/images/lef/choingay.png" alt="" style=" height: 215px; width: 320px">
	</div>
	<div class="left-Layer1008 cursor" style="display:none;">
		<img  src="<?=$styleUrl?>/assets/images/lef/choingay-hover.png"  alt="" >
	</div>
</div>
<?php }else{?>
<div class="btn-choingay openSlickModal-1">
	<div class="left-Layer1001 cursor" style="display:block;">
		<a href="<?=$url_choingay?>">
			<img  src="<?=$styleUrl?>/assets/images/lef/choingay.png" alt="" style=" height: 215px; width: 320px">
		</a>
	</div>
	<div class="left-Layer1008 cursor" style="display:none;">
		<a href="<?=$url_choingay?>">
			<img  src="<?=$styleUrl?>/assets/images/lef/choingay-hover.png"  alt="" >
		</a>
	</div>
</div>
<?php }?>
<!-- dang ky nap the -->
<div class="dk-nt">
	<div id="dangky" class="dangky cursor btnHomeChoingay">
		<a class="dangky-defaul "style="display: block;">
			<img class="" src="<?=$styleUrl?>/assets/images/lef/dangky.png" alt=""> 
		</a>
		<a class="dangky-event" style="display: none;">
			<img class="" src="<?=$styleUrl?>/assets/images/lef/dangky-h.png" alt="" >
		</a>
	</div>

	<div id="napthe" class="napthe cursor">
		<a class="napthe-defaul" style="display: block;" href="/nap-the"> 
			<img class="" src="<?=$styleUrl?>/assets/images/lef/napthe.png" alt="" style=""> 
		</a>
		<a class="napthe-event" style="display: none;"  href="/nap-the">
			<img class="" src="<?=$styleUrl?>/assets/images/lef/napthe-h.png" alt="">
		</a>
	</div>
</div>
<!-- end dang ky nap the -->
<!-- dang nhap -->
<?php if(Yii::$app->user->isGuest){?>
<div class="dangnhap ml-3">
	<div class="input-dangnhap" id="formLoginHome">
		<input placeholder="Tên tài khoản" id="username" type="text"  >
		<input placeholder="Mật khẩu" id="password" type="password">
	</div>

	<div class="btn-dangnhap btnHomeDangnhap">
		<div class="dangnhap-defaul cursor" style="display: block"><img src="<?=$styleUrl?>/assets/images/lef/dangnhap.png"></div>
		<div class="dangnhap-event cursor"style="display: none"><img src="<?=$styleUrl?>/assets/images/lef/dangnhap-h.png" ></div>
	</div>
	
	<div class="fb-gm">
		<ul>
			<li class="cursor"><a><img src="<?=$styleUrl?>/assets/images/lef/dangnhapbang.png"></a></li>
			<li class="cursor"><a href="javascript:;" onClick="FBLogin();"><img src="<?=$styleUrl?>/assets/images/lef/fb.png"></a></li>
			<li class="cursor"><a href="javascript:;" class="btnGoogleSignin" id="btnGoogleSignin"><img src="<?=$styleUrl?>/assets/images/lef/gm.png"></a></li>
			<li class="btnQuenmk cursor openSlickModal-3">
				<a><img class="" src="<?=$styleUrl?>/assets/images/lef/forgot.png"alt=""style="background-size: 24px 24px;height: 24px;"></a>
			</li>
		</ul>
	</div>
	
</div>
<?php }else{?>
<div class="left-box">
	<li style="display:none" class="cursor">
		<a href="javascript:;" class="btnGoogleSignin" id="btnGoogleSignin">
			<img src="<?=$styleUrl?>/assets/images/lef/gm.png">
		</a>
	</li>
	<div class="info-user">
		<p>
			<span class="w-user">Xin chào: <?=Yii::$app->user->identity->member_username?></span>
			<a class="btnHomeLogout" href="javascript:;">[thoát]</a>
		</p>
		<p>
			Xu của bạn : <?=Yii::$app->user->identity->member_xu?> <a target="_blank" href="/nap-the">Đổi xu</a>
		</p>
		<p>
			<a target="_blank" href="/thong-tin-tai-khoan">Thông tin tài khoản</a>|<a target="_blank" href="/thong-tin-tai-khoan">Đổi mật khẩu</a>
		</p>
	</div>
</div>
<?php }?>
<div style="clear:both"></div>
<!-- end dang nhap -->
<!-- danh sach may chu server -->
<?php //LeftServersWidget::widget() ?>
<!-- end danh sach may chu server -->
<!-- slide img -->
<div style="clear:both">
	<br/><br/>
</div>

<?=LeftSlider::widget()?>

<!-- end slide img -->
<div class="left-box">
	<div class="conten_fp"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fphamnhantutien.H5%2F&tabs&width=255&height=312&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="255" height="312" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></div>

</div>