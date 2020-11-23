<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TblSettingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-settings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'site_title') ?>

    <?= $form->field($model, 'site_description') ?>

    <?= $form->field($model, 'social_google') ?>

    <?= $form->field($model, 'social_fanpage') ?>

    <?= $form->field($model, 'social_googleplus') ?>

    <?php // echo $form->field($model, 'social_youtube') ?>

    <?php // echo $form->field($model, 'site_address') ?>

    <?php // echo $form->field($model, 'site_phone') ?>

    <?php // echo $form->field($model, 'site_fax') ?>

    <?php // echo $form->field($model, 'site_email') ?>

    <?php // echo $form->field($model, 'site_sort_about') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
