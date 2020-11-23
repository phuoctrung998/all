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
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<section class="event-box float-left">
  <div class="container">
	<div class="row">
	  <div class="col-sm-12">
		<div class="event-container">
		  <div class="event-box-title">
			<div class="title-img">
			  <img src="<?=$styleUrl?>/images/giftcode.png" alt="Sự Kiện">
			</div>
		
		  </div>
		  <div class="event-box-content">
			<div class="giftcode-container">
			  <form class="form-horizontal">
				
				
				
			  </form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>