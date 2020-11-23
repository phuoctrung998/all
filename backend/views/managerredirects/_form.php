<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerRedirects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-index">

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

<?php $form = ActiveForm::begin(['errorCssClass' => 'm--font-danger m--font-boldest']); ?>

<div class="row">
	<div class="col-md-6">
	<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													TEASER
												</h3>
											</div>
										</div>
									</div>
				<div class="m-portlet__body">
					
				<div class="m-form__group form-group">
					<div class="m-checkbox-list">
						
						 <?=
							$form->field($model, 'teaser_login_type')
								->radioList(
									$model->arrayTeaserLoginType, 
									[
										'onclick' 	=> "if($('#managerredirects-teaser_login_type input:radio:checked').val() == 3){ $('#managerredirects-teaser_login_customurl').prop('disabled', false); }else{ $('#managerredirects-teaser_login_customurl').prop('disabled', true);} ",
										'item' => function($index, $label, $name, $checked, $value) {
											$colorLabel = 'brand';
											if($value == 3){
												$colorLabel = 'warning';
											}
											$rbChecked = ($checked == 1) ? "checked" : "";
											$return = '<label class="m-radio m-radio--check-bold m-radio--state-'.$colorLabel.'">';
											$return .= '<input type="radio" '.$rbChecked.' name="' . $name . '" value="' . $value . '" tabindex="3">';
											$return .= ucwords($label).'<span></span>';
											$return .= '</label>';

											return $return;
										}
									]
								)
							->label("<b>Loại chuyển hướng khi đăng nhập</b>");
						?>
					</div>
				</div>
				<?php 
					$teaser_login_customurl_disable = ($model->teaser_login_type == 3) ? false : true;
				?>
				<?= $form->field($model, 'teaser_login_customurl')->textInput(['disabled' => $teaser_login_customurl_disable]) ?>
				
				<div class="m-form__group form-group">
				   <div class="m-checkbox-list">
						
						
						<?=
							$form->field($model, 'teaser_register_type')
								->radioList(
									$model->arrayTeaserRegisterType,
									[
										'onclick' 	=> "if($('#managerredirects-teaser_register_type input:radio:checked').val() == 2){ $('#managerredirects-teaser_register_customurl').prop('disabled', false); }else{ $('#managerredirects-teaser_register_customurl').prop('disabled', true);} ",
										'item' => function($index, $label, $name, $checked, $value) {
											$colorLabel = 'brand';
											if($value == 2){
												$colorLabel = 'warning';
											}
											$rbChecked = ($checked == 1) ? "checked" : "";
											$return = '<label class="m-radio m-radio--check-bold m-radio--state-'.$colorLabel.'">';
											$return .= '<input type="radio" '.$rbChecked.' name="' . $name . '" value="' . $value . '" tabindex="3">';
											$return .= ucwords($label).'<span></span>';
											$return .= '</label>';
											return $return;
										}
									]
								)
							->label("<b>Loại chuyển hướng khi đăng ký</b>");
						?>
				   </div>
				   
				</div>
				<?php 
					$teaser_register_customurl_disable = ($model->teaser_register_type == 2) ? false : true;
				?>
				<?= $form->field($model, 'teaser_register_customurl')->textInput(['disabled' => $teaser_register_customurl_disable]) ?>
				
				
				<?php 
				echo $form->field($model, 'teaser_choingay_customurl', [
					'template' => '
						<label>
							{label}
						</label>
						<div class="input-group m-input-group m-input-group--air">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i style="color:red" class="la la-qq"></i>
								</span>
							</div>
							{input}
						</div>
					',
				]);
			 ?>
				</div>
			</div>	
	</div>
	<div class="col-md-6">
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							HOMEPAGE
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				
				<div class="m-form__group form-group">
				   <div class="m-checkbox-list">
					
						<?=
							$form->field($model, 'homepage_login_type')
								->radioList(
									$model->arrayHomepageLoginType,
									[
										'onclick' 	=> "if($('#managerredirects-homepage_login_type input:radio:checked').val() == 3){ $('#managerredirects-homepage_login_customurl').prop('disabled', false); }else{ $('#managerredirects-homepage_login_customurl').prop('disabled', true);} ",
										'item' => function($index, $label, $name, $checked, $value) {
											$colorLabel = 'brand';
											if($value == 3){
												$colorLabel = 'warning';
											}
											$rbChecked = ($checked == 1) ? "checked" : "";
											$return = '<label class="m-radio m-radio--check-bold m-radio--state-'.$colorLabel.'">';
											$return .= '<input type="radio" '.$rbChecked.' name="' . $name . '" value="' . $value . '" tabindex="3">';
											$return .= ucwords($label).'<span></span>';
											$return .= '</label>';

											return $return;
										}
									]
								)
							->label("<b>Loại chuyển hướng khi đăng nhập</b>");
						?>
				   </div>
				</div>
				<?php 
					$homepage_login_customurl_disable = ($model->homepage_login_type == 3) ? false : true;
				?>
				<?= $form->field($model, 'homepage_login_customurl')->textInput(['disabled' => $homepage_login_customurl_disable]) ?>
				
				
				
				<div class="m-form__group form-group">
				   <div class="m-checkbox-list">
						<?=
							$form->field($model, 'homepage_register_type')
								->radioList(
									$model->arrayHomepageRegisterType,
									[
										'onclick' 	=> "if($('#managerredirects-homepage_register_type input:radio:checked').val() == 2){ $('#managerredirects-homepage_register_customurl').prop('disabled', false); }else{ $('#managerredirects-homepage_register_customurl').prop('disabled', true);} ",
										'item' => function($index, $label, $name, $checked, $value) {
											$colorLabel = 'brand';
											if($value == 2){
												$colorLabel = 'warning';
											}
											$rbChecked = ($checked == 1) ? "checked" : "";
											$return = '<label class="m-radio m-radio--check-bold m-radio--state-'.$colorLabel.'">';
											$return .= '<input type="radio" '.$rbChecked.' name="' . $name . '" value="' . $value . '" tabindex="3">';
											$return .= ucwords($label).'<span></span>';
											$return .= '</label>';

											return $return;
										}
									]
								)
							->label("<b>Loại chuyển hướng khi đăng ký</b>");
						?>
				   </div>
				   
				</div>
				<?php 
					$homepage_register_customurl_disable = ($model->homepage_register_type == 2) ? false : true;
				?>
				<?= $form->field($model, 'homepage_register_customurl')->textInput(['disabled' => $homepage_register_customurl_disable]) ?>
			
				
				<?php 
				echo $form->field($model, 'homepage_choingay_customurl', [
					'template' => '
						<label>
							{label}
						</label>
						<div class="input-group m-input-group m-input-group--air">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i style="color:red" class="la la-qq"></i>
								</span>
							</div>
							{input}
						</div>
					',
				]);
			 ?>
			</div>
		</div>
	</div>
	
	
	<div class="col-md-6">
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
							<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							LANDING
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body">
				
				<div class="m-form__group form-group">
				   <div class="m-checkbox-list">
					 
					<?=
							$form->field($model, 'landing_login_type')
								->radioList(
									$model->arrayLandingLoginType,
									[
										'onclick' 	=> "if($('#managerredirects-landing_login_type input:radio:checked').val() == 3){ $('#managerredirects-landing_login_customurl').prop('disabled', false); }else{ $('#managerredirects-landing_login_customurl').prop('disabled', true);} ",
										'item' => function($index, $label, $name, $checked, $value) {
											$colorLabel = 'brand';
											if($value == 3){
												$colorLabel = 'warning';
											}
											$rbChecked = ($checked == 1) ? "checked" : "";
											$return = '<label class="m-radio m-radio--check-bold m-radio--state-'.$colorLabel.'">';
											$return .= '<input type="radio" '.$rbChecked.' name="' . $name . '" value="' . $value . '" tabindex="3">';
											$return .= ucwords($label).'<span></span>';
											$return .= '</label>';

											return $return;
										}
									]
								)
							->label("<b>Loại chuyển hướng khi đăng nhập</b>");
						?>
				   </div>
				</div>
				<?php 
					$landing_login_customurl_disable = ($model->landing_login_type == 3) ? false : true;
				?>
				<?= $form->field($model, 'landing_login_customurl')->textInput(['disabled' => $landing_login_customurl_disable]) ?>
				
				
				<div class="m-form__group form-group">
				   <div class="m-checkbox-list">
					<?=
							$form->field($model, 'landing_register_type')
								->radioList(
									$model->arrayLandingRegisterType,
									[
										'onclick' 	=> "if($('#managerredirects-landing_register_type input:radio:checked').val() == 2){ $('#managerredirects-landing_register_customurl').prop('disabled', false); }else{ $('#managerredirects-landing_register_customurl').prop('disabled', true);} ",
										'item' => function($index, $label, $name, $checked, $value) {
											$colorLabel = 'brand';
											if($value == 2){
												$colorLabel = 'warning';
											}
											$rbChecked = ($checked == 1) ? "checked" : "";
											$return = '<label class="m-radio m-radio--check-bold m-radio--state-'.$colorLabel.'">';
											$return .= '<input type="radio" '.$rbChecked.' name="' . $name . '" value="' . $value . '" tabindex="3">';
											$return .= ucwords($label).'<span></span>';
											$return .= '</label>';

											return $return;
										}
									]
								)
							->label("<b>Loại chuyển hướng khi đăng ký</b>");
						?>
				   </div>
				   
				</div>
				<?php 
					$landing_register_customurl_disable = ($model->landing_register_type == 2) ? false : true;
				?>
				<?= $form->field($model, 'landing_register_customurl')->textInput(['disabled' => $landing_register_customurl_disable]) ?>
			
				
				<?php 
				echo $form->field($model, 'landing_choingay_customurl', [
					'template' => '
						<label>
							{label}
						</label>
						<div class="input-group m-input-group m-input-group--air">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i style="color:red" class="la la-qq"></i>
								</span>
							</div>
							{input}
						</div>
					',
				]);
			 ?>
			</div>
		</div>
	</div>
	<div class="col-md-12">
    <div class="form-group">
        <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-success']) ?>
    </div>
	</div>
</div>
    <?php ActiveForm::end(); ?>


</div>