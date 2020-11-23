<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Members */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'member_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_birthday')->textInput() ?>

    <?= $form->field($model, 'member_registerday')->textInput() ?>

    <?= $form->field($model, 'member_codeauthencation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_authentication')->textInput() ?>

	<?= $form->field($model, 'member_block')->dropdownList([
					'0' => 'Khóa',
					'1' => 'Hoạt động'
				]) ?>

    <?= $form->field($model, 'member_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'member_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_coderesetpass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_getgiftcode')->textInput() ?>

    <?= $form->field($model, 'member_giftcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_logintime')->textInput() ?>

    <?= $form->field($model, 'member_loginserverslug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_xu')->textInput() ?>

    <?= $form->field($model, 'member_is_gift')->textInput() ?>

    <?= $form->field($model, 'member_gift')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_2usd')->textInput() ?>

    <?= $form->field($model, 'member_ogames_id')->textInput() ?>

    <?= $form->field($model, 'member_facebook_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
