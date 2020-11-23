<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
	<div class="col-lg-12">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__body">
				<?php $form = ActiveForm::begin([
					'action' => ['index'],
					'method' => 'get',
				]); ?>
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="form-group m-form__group">
									<label for="exampleSelect1">
										Ngày giao dịch
									</label>
								<div class="input-daterange input-group" id="m_datepicker_5">
									<input type="text" value="<?=$model->begin_time?>" class="form-control m-input" name="begin_time">
									<div class="input-group-append">
										<span class="input-group-text">
											Đến
										</span>
									</div>
									<input type="text" value="<?=$model->end_time?>" class="form-control" name="end_time">
								</div>
								</div>
							</div>
							<!--
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="form-group m-form__group">
									<label for="exampleSelect1">
										Máy chủ
									</label>
									<select class="form-control m-input" id="exampleSelect1">
										<option>
											1
										</option>
										<option>
											2
										</option>
									</select>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="form-group m-form__group">
									<label for="exampleSelect1">
										Loại nạp
									</label>
									<select class="form-control m-input" id="exampleSelect1">
										<option>
											Nạp vàng
										</option>
										<option>
											Nạp xu
										</option>
									</select>
								</div>
							</div>
							-->
						</div>
					</div>	
				<div class="form-group">
					<?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
					<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
				</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
<script>
var BootstrapDatepicker = {
    init: function() {
        $("#m_datepicker_5").datepicker({
			format: 'yyyy/mm/dd',
			todayBtn: "linked",
			
            todayHighlight: !0,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        })
    }
};
jQuery(document).ready(function() {
    BootstrapDatepicker.init()
});
</script>