<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ManagerRedirectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-redirects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'teaser_login_flag_newserver') ?>

    <?= $form->field($model, 'teaser_login_flag_playnearserver') ?>

    <?= $form->field($model, 'teaser_login_flag_customurl') ?>

    <?= $form->field($model, 'teaser_login_customurl') ?>

    <?php // echo $form->field($model, 'teaser_register_flag_newserver') ?>

    <?php // echo $form->field($model, 'teaser_register_flag_customurl') ?>

    <?php // echo $form->field($model, 'teaser_register_customurl') ?>

    <?php // echo $form->field($model, 'homepage_flag_login_newserver') ?>

    <?php // echo $form->field($model, 'homepage_flag_login_playnearserver') ?>

    <?php // echo $form->field($model, 'homepage_login_flag_customurl') ?>

    <?php // echo $form->field($model, 'homepage_login_customurl') ?>

    <?php // echo $form->field($model, 'homepage_register_flag_newserver') ?>

    <?php // echo $form->field($model, 'homepage_register_flag_customurl') ?>

    <?php // echo $form->field($model, 'homepage_register_customurl') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
