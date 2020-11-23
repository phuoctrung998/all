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
		
		<form class="form-horizontal" id="form-updatepassworduser">
		  <div class="form-group">
			<label class="col-lg-4 col-sm-5 control-label">Mật khẩu hiện tại: </label>
			<div class="col-lg-8 col-sm-7">
			  <input type="password" class="form-control"   id="oldpassword" placeholder="Mật khẩu hiện tại">
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-lg-4 col-sm-5 control-label">Mật khẩu mới:</label>
			<div class="col-lg-8 col-sm-7">
			  <input type="password" class="form-control"   id="password" placeholder="Mật khẩu mới">
			  <p class="control-label"><small>*(Ít nhất chứa 6 ký tư - khuyến nghị nên tránh những mật khẩu dễ đoán)</small></p>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-lg-4 col-sm-5 control-label">Nhập lại mật khẩu mới:</label>
			<div class="col-lg-8 col-sm-7">
			  <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu mới">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-6 col-sm-6">
			  <button type="button" id="btn-updatePasswordUser" class="btn btn-default">Cập Nhật</button>
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