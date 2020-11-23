<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PostsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'post_id') ?>

    <?= $form->field($model, 'post_title') ?>

    <?= $form->field($model, 'post_featured_image') ?>

    <?= $form->field($model, 'post_author') ?>

    <?= $form->field($model, 'post_cat_id') ?>

    <?php // echo $form->field($model, 'post_content') ?>

    <?php // echo $form->field($model, 'post_datetime') ?>

    <?php // echo $form->field($model, 'post_related_id') ?>

    <?php // echo $form->field($model, 'post_slug') ?>

    <?php // echo $form->field($model, 'post_options') ?>

    <?php // echo $form->field($model, 'post_metakey') ?>

    <?php // echo $form->field($model, 'post_metadesc') ?>

    <?php // echo $form->field($model, 'is_timer') ?>

    <?php // echo $form->field($model, 'timer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
