<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Servers */

$this->title = 'Cập nhật máy chủ: '.$model->server_name;
$this->params['breadcrumbs'][] = ['label' => 'Máy chủ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->server_id, 'url' => ['view', 'id' => $model->server_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="servers-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
