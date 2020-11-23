<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mkt */

$this->title = 'Update Mkt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mkts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
