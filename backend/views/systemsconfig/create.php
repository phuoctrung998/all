<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemsConfig */

$this->title = 'Create Systems Config';
$this->params['breadcrumbs'][] = ['label' => 'Systems Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systems-config-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
