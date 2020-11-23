<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Members */

$this->title = 'Update Members: ' . $model->member_id;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_id, 'url' => ['view', 'id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="members-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
