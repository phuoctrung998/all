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
use frontend\widget\ListServersWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use yii\grid\GridView;

$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
$style 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>


<section class="event-box float-left">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="event-container">
  <div class="event-box-title">
  <div class="title-img">
			<img src="<?=$styleUrl?>/images/account.png" alt="THÔNG TIN TÀI KHOẢN">
			</div>
	
  </div>
  <!-- begin content -->
  <div class="event-box-content">
	<div class="account-container">
	  <?=$this->render('_acount_left')?>
	  <div class="account-content">
		
		<form class="form-horizontal" id="form-updateInfoUser">
		  <div class="form-group">
			<label class="col-lg-3 col-sm-4 control-label">Tên đăng nhập: </label>
			<div class="col-lg-9 col-sm-8">
			  <input type="text" class="form-control" readonly placeholder="Tên đang nhập" 
			  value="<?=Yii::$app->user->identity->member_username?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-lg-3 col-sm-4 control-label">Họ và Tên: </label>
			<div class="col-lg-9 col-sm-8">
			  <input type="text" class="form-control" id="member_fullname" placeholder="Họ và Tên" value="<?=Yii::$app->user->identity->member_fullname?>">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-lg-3 col-sm-4 control-label">SĐT đăng nhập:</label>
			<div class="col-lg-9 col-sm-8">
			  <input type="text" class="form-control" id="member_phone" placeholder="Số điện thoại" value="<?=Yii::$app->user->identity->member_phone?>">
			  <a href="">*Liên hệ admin để thay đổi</a>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-6 col-sm-6">
			  <button id="btn-updateInfoUser" type="button" class="btn btn-default">Cập Nhật</button>
			</div>
		  </div>
		</form>
	  </div>
                </div>
              </div>
		  <!-- end content -->
		</div>
	  </div>
	</div>
  </div>
</section>