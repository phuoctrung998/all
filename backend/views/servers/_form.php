<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Servers */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
	<div class="col-lg-12">
		<?php if (Yii::$app->session->hasFlash('success')): ?>
			<div class="alert alert-success alert-dismissable">
				 <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				 <h4><i class="icon fa fa-check"></i>Success!</h4>
				 <?= Yii::$app->session->getFlash('success') ?>
			</div>
		<?php endif; ?>
		<?php if (Yii::$app->session->hasFlash('error')): ?>
			<div class="alert alert-danger alert-dismissable">
				 <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				 <h4><i class="icon fa fa-check"></i>Errors!</h4>
				 <?= Yii::$app->session->getFlash('error') ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<div class="servers-form">
	
	<?php $form = ActiveForm::begin([
		'options' => [
			'style' => 'width: 100%;',
			'class' => 'row',
			'enctype' => 'multipart/form-data'
		],
		'encodeErrorSummary' => false,	
	]); ?>
	<div class="col-lg-8">
	
		<!--begin::Portlet-->
			<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								MÁY CHỦ
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<?= $form->field($model, 'server_index')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_name')->textInput(['maxlength' => true]) ?>
					
					<?= $form->field($model, 'server_label')->textInput(['maxlength' => true]) ?>
					
					

					<?= $form->field($model, 'server_slug')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_linklogingame')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_linkpayment')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_link1')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_link2')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_link3')->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'server_hot')->dropdownList([
						'0' => 'Thường',
						'1' => 'Hot',
					]) ?>

					<?= $form->field($model, 'server_hot')->dropdownList([
						'0' => 'Không',
						'1' => 'Có',
					]) ?>

					
				</div>
			</div>
	</div>
	<div class="col-md-4">
		<!-- ACTION -->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__body">
				<div class="col-sm-12">
					<div class="m-form__group form-group">
						<div class="m-radio-inline">
							<button type="submit" class="btn btn-success btn-lg btn-block">
								Đăng bài
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__body">
				<div class="col-sm-12">
					<?= $form->field($model, 'server_is_timer')->dropdownList([
						'0' => 'Không hẹn giờ',
						'1' => 'Hẹn giờ',
					]) ?>

					<?= $form->field($model, 'server_timer')->textInput() ?>
					
					<?= $form->field($model, 'server_status')->dropdownList([
						'1' => 'Mở',
						'2' => 'Bảo trì',
						'3' => 'Đông người',
						'4' => 'Đầy',
						'0' => 'Đóng',
					]) ?>
				</div>
			</div>	
		</div>		
	</div>
    <?php ActiveForm::end(); ?>

</div>
