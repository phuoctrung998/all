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
$styleUrl 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<div id="container-fluid background" class="container-fluid  pageServer p-0" style="background-color: #f3f3f3;">
    <div class="background-detail">
      <!-- code here -->
      <div class="fullscreen-bg__mainTop cloud d-flex">
         <div class="clouds"></div>
          <div class="logoTop btn-popupVideo cursor">
            <img src="<?=$styleUrl?>/assets/images/background/logo.png" alt="logo" width="430" style="z-index: 99999">
          </div>
          <div class="la_1"></div>
                <div class="la_2"></div>
                <div class="la_3"></div>
                <div class="la_4"></div>
                <div class="la_5"></div>
                <div class="la_6"></div>
                <div class="la_7"></div>  
        </div>
      <!-- top -->
      <div class="top">
		<!-- Menu Top -->
			<?= $this->render('/layouts/_menu_header') ?>	
		<!-- End Menu Top -->
        <!-- Video -->

      <!-- End Video -->
      </div>
      <!-- main -->
      <div class="main d-flex position-component">
        <!-- left -->
        <div class="left">
          <div class=''>
              <?= $this->render('/layouts/_left_choingay') ?>
          </div>
          <!-- end left -->
        </div>
        <!-- middle -->
        <div class="middle">
          <div class="detail-mid__background">
            <div class="form-body">
				<div class="form-body__img"></div>
				<div class="form-body__Server">
				  <?php foreach($new_servers as $sv){?>
					
						<div class="btn-mainServer cursor">
							<a href="/may-chu/<?=$sv->server_slug?>"
								class="server_play"
								server_slug="<?=$sv->server_slug?>" server_status="<?=$sv->server_status?>" server_name="<?=$sv->server_name?>"
							>
								<span class='serverText'><?=$sv->server_name?></span>
							</a>
						</div>
					
				  <?php } ?>
				</div>
				<div class="form-body__img"></div>
				<!--  -->
				  <div class="listserver-container">
						<?=ListServersWidget::widget()?>
				  </div>
				<!--  -->
        </div>
		<!-- footer -->
          <?= $this->render('/layouts/_footer') ?>
        <!-- right -->
        <?= $this->render('/layouts/_right_scroll') ?>
      </div>
      <!-- end main -->

      <!-- end top  -->
      <!-- end popup -->
      <!-- end code -->
    </div>
  </div>
 </div>
</div> 