<?php
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */
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
<div class="posts-form">
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
							NỘI DUNG APP
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				<?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>
				
				<?= $form->field($model, 'post_slug')->textInput(['maxlength' => true]) ?>

				<?= $form->field($model, 'post_content')->textarea(['rows' => 10,'id'=>'ck_editor']) ?>
				
				<?= $form->field($model, 'post_metakey')->textarea(['rows' => 4]) ?>

				<?= $form->field($model, 'post_metadesc')->textarea(['rows' => 4]) ?>

				<?= $form->field($model, 'post_datetime')->textInput() ?>
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
				<?= $form->field($model, 'is_timer')->dropdownList([
					'0' => 'Không hẹn giờ',
					'1' => 'Hẹn giờ'
				]) ?>

				<?= $form->field($model, 'timer')->textInput() ?>
				
				<?= $form->field($model, 'is_hot')->dropdownList([
					'0' => 'Thường',
					'1' => 'Hot'
				]) ?>
				</div>
			</div>	
		</div>
		
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							CHUYÊN MỤC
						</h3>
					</div>
				</div>
			</div>
			
		
			<div class="m-portlet__body">
				<!--begin::Section-->
				<div class="m-section">
					<div class="m-section__content">
						<!-- danh muc -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#m_tabs_apps_1">
									DANH MỤC APPS
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="m_tabs_apps_1" role="tabpanel">
								<div class="col-9">
									<div class="m-checkbox-list">
										<?php foreach($categories as $t => $cate){?>
										<label class="m-checkbox">
											<input name="Posts[post_cat_id]" <?php if(!$model->isNewRecord){if($model->post_cat_id == $cate->cat_id){ echo 'checked'; }} ?> value="<?=$cate->cat_id?>" type="radio">
												<?=$cate->cat_name?>
											<span></span>
										</label>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<!-- danh muc -->
					</div>
				</div>
				<!--end::Section-->
			</div>
		</div>
		<!--end::Portlet-->
		
		<!-- anh dai dien -->
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
								<img id="blah" src="<?=Yii::getAlias('@webDomain').$model->post_featured_image?>" alt="your image" />
								<?php }?>	
							<br/><br/>
							<input name="Posts[post_featured_image]" type='file' onchange="readURL(this);" />
						</div>
					</div>
				</div>	
			</div>
		</div>
		<!-- end anh dai dien -->
		<!-- END ACTION -->
	</div>
    <?php ActiveForm::end(); ?>

</div>
<?php 
$browseUrl = '/admin/libs/ckfinder/ckfinder.html';
$uploadUrl = '/admin/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$js = <<<JS
CKEDITOR.replace( 'ck_editor',{
	filebrowserBrowseUrl: '$browseUrl',
	filebrowserUploadUrl: '$uploadUrl'
});
JS;
$this->registerJs($js,View::POS_READY);
?>
