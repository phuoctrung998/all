<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemsConfig */

$this->title = 'Update Systems Config: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Systems Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="systems-config-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
