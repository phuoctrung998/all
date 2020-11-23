<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemsConfigValue */

$this->title = 'Cập nhật cấu hình: ' . $model->config->name;
$this->params['breadcrumbs'][] = ['label' => 'Cấu hình hệ thống', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->systems_config_id, 'url' => ['view', 'id' => $model->config->name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="systems-config-value-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
