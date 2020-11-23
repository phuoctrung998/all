<?php
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SystemsConfigValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="systems-config-value-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="form-group field-systemsconfig-name required has-success">
		<label class="control-label" for="systemsconfig-name">Tên cấu hình</label>
		<input type="text" readonly class="form-control" value="<?=$model->config->name?>" maxlength="255" aria-required="true" aria-invalid="false">

		<div class="help-block"></div>
	</div>
	
	<?= $form->field($model, 'systems_config_id')->hiddenInput(['value'=> $model->config->id])->label(false); ?>
	
	<?php if($model->config->data_type == 'string'){?>
		<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
	<?php }elseif($model->config->data_type == 'int'){ ?>
		<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
	<?php }elseif($model->config->data_type == 'text'){ ?>
		<?= $form->field($model, 'value')->textarea(['rows' => 10]) ?>
	<?php }elseif($model->config->data_type == 'textEditor'){ ?>
		<?= $form->field($model, 'value')->textarea(['rows' => 10,'id'=>'ck_editor']) ?>	
	<?php }elseif($model->config->data_type == 'json'){ ?>
		<?php 
			$arrayDataType 	= json_decode($model->config->data);
			$arrayData 		= array();
			foreach($arrayDataType as $t => $val){
				array_push($arrayData,$val);
			}
		?>
		<?= $form->field($model, 'value')->dropdownList($arrayDataType,['prompt' => '-- Chọn giá trị --']) ?>		
	<?php } ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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