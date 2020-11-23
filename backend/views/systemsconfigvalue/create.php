<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemsConfigValue */

$this->title = 'Create Systems Config Value';
$this->params['breadcrumbs'][] = ['label' => 'Systems Config Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systems-config-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
