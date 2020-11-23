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
					'action' => ['napthe'],
					'method' => 'get',
				]); ?>
						<div class="form-group m-form__group row">
							<div class="col-lg-6">
								<div class="form-group m-form__group">
									<label for="exampleInputEmail1">
										Từ ngày
									</label>
									<div class="input-group m-input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fa flaticon-calendar-1 m--font-danger"></i>
											</span>
										</div>
										<input type="text" name="begin_time" class="form-control m-input" value="<?=$begin_time?>"  id="m_datepicker_begin">
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group m-form__group">
									<label for="exampleInputEmail1">
										Đến ngày
									</label>
									<div class="input-group m-input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fa flaticon-calendar-1 m--font-danger"></i>
											</span>
										</div>
										<input type="text" name="end_time" id="m_datepicker_end" class="form-control m-input" value="<?=$end_time?>" aria-describedby="basic-addon1">
									</div>
								</div>
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
        $("#m_datepicker_begin").datepicker({
			format: 'yyyy-mm-dd',
			todayBtn: "linked",
            todayHighlight: !0,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }),
		$("#m_datepicker_end").datepicker({
			format: 'yyyy-mm-dd',
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