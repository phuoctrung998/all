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
		  <div class="event-box-content">
			<div class="account-container">
			  <?=$this->render('_acount_left')?>
			  <div class="account-content">
				<style>
					#lichsugiaodich table thead tr th a{
						color:white;
					}
				</style>
				<?php 
					echo GridView::widget([
						'id' => 'lichsugiaodich',
						'dataProvider' => $lichsugiaodichProvider,
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
							[
								'attribute' => 'member_id',
								'format'	=> 'html',
								'value'		=> function($model){
									return $model->member->member_username;
								}
							],
							'trans_serial',
							[
								'attribute' => 'trans_moneyreal',
								'value'		=> function($model){
									return number_format($model->trans_moneyreal);
								}
							],
							[
								'attribute' => 'trans_status',
								'format'	=> 'html',
								'value'		=> function($model){
									if($model->trans_status == 1){
										return 'Success';
									}else{
										return 'Fail';
									}
								}
							],
							'trans_desc',
						],
					]);
				?>
				
				
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>