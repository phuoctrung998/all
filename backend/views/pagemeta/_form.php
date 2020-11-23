<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widget\PageMetaContent;
/* @var $this yii\web\View */
/* @var $model common\models\PageMeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-meta-form">
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
<div class="row">
    <?php $form = ActiveForm::begin([
		'options' => [
            'style' => 'width: 100%;',
			'class' => 'row'
        ],
		'encodeErrorSummary' => false,	
	]); ?>
	<div class="col-lg-8">
	<div class="m-portlet">
			<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											NỘI DUNG
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

				<?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								ĐA NGÔN NGỮ
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<!-- mutil languages -->
					<?php 
						$model->isNewRecord ? $mode  = 0 : $mode = 1;
					?>
					<?php 
					if($model->isNewRecord){	
						echo PageMetaContent::widget(['mode' => $mode]);
					}
					else{
						echo PageMetaContent::widget(['mode' => $mode, 'cate_id' => $model->id]);
					}
					?>
				</div>
    

    
</div>
			<!--end::Portlet-->
	</div>
	
	<div class="col-md-4">
		
		<!-- ACTION -->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__body">
				<div class="col-sm-12">
					<div class="m-form__group form-group">
						<div class="m-radio-inline">
							<button type="submit" class="btn btn-success btn-lg btn-block">
								Cập nhật
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END ACTION -->
		
		
	</div>	
	<?php ActiveForm::end(); ?>
	</div>
</div>
