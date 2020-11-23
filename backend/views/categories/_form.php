<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_parent_id')->textInput() ?>

    <?= $form->field($model, 'cat_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_metakey')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cat_metadesc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
