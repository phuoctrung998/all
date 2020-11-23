<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Transaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'server_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'trans_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_money')->textInput() ?>

    <?= $form->field($model, 'trans_moneyreal')->textInput() ?>

    <?= $form->field($model, 'trans_time')->textInput() ?>

    <?= $form->field($model, 'trans_desc')->textarea(['rows' => 6]) ?>

	

    <?= $form->field($model, 'trans_compensation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_compensation_time')->textInput() ?>

    <?= $form->field($model, 'trans_partner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_devices')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trans_loainap')->textInput() ?>
	
	<?= $form->field($model, 'trans_status')->dropdownList([
					'0' => 'Thất bại',
					'1' => 'Thành công'
				]) ?>
				
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
