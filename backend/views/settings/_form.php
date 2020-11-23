<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use wadeshuler\ckeditor\widgets\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\TblSettings */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$jsReadUrl = <<<JS
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('.preview-image-wrapper').removeClass('hidden');
                $('.preview-image').attr('src', e.target.result).show();
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }

JS;
$this->registerJs($jsReadUrl,View::POS_END);
$baseUrlProdUpload = Yii::$app->params['webDomain'].'uploads/contents/';
?>
<div class="tbl-post-form box">

				<?php $form = ActiveForm::begin(); ?>
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#activity" data-toggle="tab">Tổng quát</a></li>
						<li><a href="#seo" data-toggle="tab">Hệ thông Email</a></li>
					</ul>
					<div class="tab-content">
						<div class="active tab-pane" id="activity">
							<div class="row">
								<div class="box-body">
								<?= $form->field($model, 'site_title')->textInput(['maxlength' => true]) ?>
								
													<div class="col-md-12">
														<div class="preview-image-wrapper<?= !$model->isNewRecord && $model->logo ? '' : ' hidden' ?>">
															<?php
															if(!$model->isNewRecord && $model->logo)
															{
																$urlImg = $baseUrlProdUpload.$model->logo;
															} 
															else
															{
																$urlImg = "#";
															}
															
															echo Html::img(
																$urlImg,
																[
																	'class' => 'preview-image img-thumbnail',
																	'style' => !$model->isNewRecord && $model->logo ? 'max-width:150px' : 'display:none'
																]
															); ?>
														</div>
													
														<?= $form->field(
															$model,
															'logo')->fileInput(['onchange' => 'readURL(this);']); ?> 
													</div> 
								
								<?= $form->field($model, 'site_description')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'social_google')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'social_fanpage')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'social_googleplus')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'social_youtube')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'site_address')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'site_phone')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'site_fax')->textInput(['maxlength' => true]) ?>

								<?= $form->field($model, 'site_email')->textInput(['maxlength' => true]) ?>
								
								<div class="form-group"> 
									<a href="<?=$baseUrlProdUpload.$model->brochure?>" target="_blank">
										<?=$model->brochure?>
									</a>
								</div>
								
								<?= $form->field($model,'brochure')->fileInput(); ?> 

								<?= $form->field($model, 'site_sort_about')->textArea(["rows"=>5]) ?>
								</div>
							</div>
						</div><!-- /.tab-content -->
						
						<div class="tab-pane" id="seo">
							<?= $form->field($model, 'site_email_host_smtp')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'site_email_username')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'site_email_passwords')->textInput(['maxlength' => true]) ?>
							
							<?= $form->field($model, 'site_email_port')->textInput(['maxlength' => true]) ?>
							
							<?= $form->field($model, 'site_email_support')->textInput(['maxlength' => true]) ?>
								
							<?= $form->field($model, 'site_email_tieude')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'site_email_body')->widget(CKEditor::className()) ?>	

							<?= $form->field($model, 'site_email_success')->widget(CKEditor::className()) ?>	
						</div><!-- /.tab-pane -->
					</div><!-- /.nav-tabs-custom -->
				</div>
				<div class="box-body">
					<div class="form-group">
						<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					</div>
				</div>
				<?php ActiveForm::end(); ?>
				
</div>