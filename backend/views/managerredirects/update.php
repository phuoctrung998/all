<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerRedirects */

$this->title = 'Cập nhật chuyển hướng User: ';
$this->params['breadcrumbs'][] = ['label' => 'Manager Redirects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manager-redirects-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
