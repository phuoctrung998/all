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
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
$style 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<body class="bg_detail">
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
		  <div class="event-box-content">
			<div class="account-container">
			  <?=$this->render('_acount_left')?>
			  <div class="account-content"><br><br>
				<form class="form-horizontal">
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>Tên đăng nhập: </label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <label class="control-label"><?=$infoMember->member_username?></label>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>Xu:</label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <p class="control-label"><?=number_format($infoMember->member_xu)?></p>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>Họ và Tên:</label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <p class="control-label"><?=$infoMember->member_fullname?></p>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>SDT đăng nhập:</label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <p class="control-label"><?=$infoMember->member_phone?></p>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>Mật khẩu cấp 1:</label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <p class="control-label">*********</p>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>Mật khẩu cấp 2:</label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <p class="control-label">*********</p>
					</div>
				  </div>
				  <div class="form-group">
					<label class="col-lg-3 col-sm-4 col-xs-4 control-label"><strong>Tình trạng:</label></strong>
					<div class="col-lg-9 col-sm-8 col-xs-8">
					  <p class="control-label"><span><?=($infoMember->member_block == 1)? 'Hoạt động' : 'Khóa'?></span></p>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>