<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SettingImportantValues */

$this->title = 'Cập nhật: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cấu hình', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'cập nhật';
?>
<div class="setting-important-values-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
