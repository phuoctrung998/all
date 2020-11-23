<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sliders */

$this->title = 'Thêm mới slider';
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
