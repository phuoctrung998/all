<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TblSettings */

$this->title = 'Cấu hình: ';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-settings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
