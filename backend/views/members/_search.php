<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MembersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'member_id') ?>

    <?= $form->field($model, 'member_code') ?>

    <?= $form->field($model, 'member_username') ?>

    <?= $form->field($model, 'member_password') ?>

    <?= $form->field($model, 'member_fullname') ?>

    <?php // echo $form->field($model, 'member_email') ?>

    <?php // echo $form->field($model, 'member_phone') ?>

    <?php // echo $form->field($model, 'member_birthday') ?>

    <?php // echo $form->field($model, 'member_registerday') ?>

    <?php // echo $form->field($model, 'member_codeauthencation') ?>

    <?php // echo $form->field($model, 'member_authentication') ?>

    <?php // echo $form->field($model, 'member_block') ?>

    <?php // echo $form->field($model, 'member_description') ?>

    <?php // echo $form->field($model, 'member_ip') ?>

    <?php // echo $form->field($model, 'member_coderesetpass') ?>

    <?php // echo $form->field($model, 'member_getgiftcode') ?>

    <?php // echo $form->field($model, 'member_giftcode') ?>

    <?php // echo $form->field($model, 'member_logintime') ?>

    <?php // echo $form->field($model, 'member_loginserverslug') ?>

    <?php // echo $form->field($model, 'member_xu') ?>

    <?php // echo $form->field($model, 'member_is_gift') ?>

    <?php // echo $form->field($model, 'member_gift') ?>

    <?php // echo $form->field($model, 'member_2usd') ?>

    <?php // echo $form->field($model, 'member_ogames_id') ?>

    <?php // echo $form->field($model, 'member_facebook_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
