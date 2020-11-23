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
<section class="event-box">
  <div class="container">
	<div class="row">
	  <div class="col-sm-12">
		<div class="event-container">
		  <div class="event-box-title">
			<div class="title-img">
			  <img src="<?=$styleUrl?>/images/icon_card.png" alt="GIFTCODE">
			</div>
			<div class="title-text">
			  <h2>GIFTCODE TRIỆU HỒI ÂM DƯƠNG</h2>
			</div>
		  </div>
		  <div class="event-box-content">
			<div class="giftcode-container">
			  <form class="form-horizontal">
				
				
				<div class="form-group">
					<span class="col-sm-12 control-label" style="text-align: center;">
						<strong>Kim Cương tích lũy nạp của bạn : </strong><strong style="color:red"><?=number_format($total)?></strong>
						<br/>
						Kim cương tích lũy chỉ được tính khi đã nạp vào game.
					</span>
				</div>
				<div class="form-group">
				  <label class="col-sm-4 control-label">Tích nạp 2000</label>
				  <div class="col-sm-8">
					<?php if(empty($code_2000_nhan)){?>
						<input type="text" class="form-control" readonly value="Bạn cần <?=$kccan2000?> Kim Cương nữa để nhận code">
					<?php }else{ ?>
						<input type="text" class="form-control" value="<?=$code_2000_nhan->giftcode?>">
					<?php } ?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-4 control-label">Tích nạp 5000</label>
				  <div class="col-sm-8">
					<?php if(empty($code_5000_nhan)){?>
						<input type="text" class="form-control" readonly value="Bạn cần <?=$kccan5000?> Kim Cương nữa để nhận code">
					<?php }else{ ?>
						<input type="text" class="form-control" value="<?=$code_5000_nhan->giftcode?>">
					<?php } ?>
				  </div>
				</div>
				
			  </form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>