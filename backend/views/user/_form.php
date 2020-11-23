<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'username')->label('Tài khoản')?>
				
	<?= $form->field($model, 'email') ?>

	<?= $form->field($model, 'password')->passwordInput()->label('New password') ?>
	
	<?= $form->field($model, 'repassword')->passwordInput()->label('New password repeat') ?>
	<?= $form->field($model, 'status')
				->radioList(array(
					1 => 'Hoạt động', 
					0 => 'Đã khóa'
				),['separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'])
				->label('Trạng thái'); ?>

    <div class="form-group">
        <?= Html::submitButton('Hoàn tất', ['class' =>  'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
