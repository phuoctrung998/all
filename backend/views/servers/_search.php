<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ServersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'server_id') ?>

    <?= $form->field($model, 'server_index') ?>

    <?= $form->field($model, 'server_name') ?>

    <?= $form->field($model, 'server_status') ?>

    <?= $form->field($model, 'server_slug') ?>

    <?php // echo $form->field($model, 'server_linklogingame') ?>

    <?php // echo $form->field($model, 'server_linkpayment') ?>

    <?php // echo $form->field($model, 'server_link1') ?>

    <?php // echo $form->field($model, 'server_link2') ?>

    <?php // echo $form->field($model, 'server_link3') ?>

    <?php // echo $form->field($model, 'server_hot') ?>

    <?php // echo $form->field($model, 'server_promotion') ?>

    <?php // echo $form->field($model, 'server_is_timer') ?>

    <?php // echo $form->field($model, 'server_timer') ?>

    <?php // echo $form->field($model, 'server_label') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
