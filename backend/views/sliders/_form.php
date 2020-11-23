<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sliders */
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
<div class="sliders-form">

    <?php $form = ActiveForm::begin([
		'options' => [
			'enctype' => 'multipart/form-data'
		],
		'encodeErrorSummary' => false,	
	]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__body">
				<div class="m-section">
							<style>
							.image-avatar img{
							  max-width:180px;
							}
							</style>
						<div class="m-section__content image-avatar">
							<div class="col-sm-12">
									<?php 
										if($model->isNewRecord){
									?>
									<img id="blah" src="http://placehold.it/180" alt="your image" />
									<?php }else{ ?>
									<img id="blah" src="<?=Yii::getAlias('@webDomain').'/uploads/'.$model->images?>" alt="your image" />
									<?php }?>	
								<br/><br/>
								<input name="Sliders[images]" type='file' onchange="readURL(this);" />
							</div>
						</div>
				</div>	
			</div>
		</div>
		<!-- end anh dai dien -->
	<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'status')->dropdownList([
		'1' => 'Mở',
		'0' => 'Đóng'
	]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
