<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SystemsConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="systems-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

	<?php 
		$arrayDataType = array(
			'int' 			=> 'Int',
			'string'		=> 'String',
			'text'			=> 'Text',
			'textEditor'	=> 'Text with Editor',
			'json'			=> 'Json',
		);
	?>
    <?= $form->field($model, 'data_type')->dropdownList($arrayDataType,['prompt' => '-- Chọn kiểu dữ liệu --']) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
