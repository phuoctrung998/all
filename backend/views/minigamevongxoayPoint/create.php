<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinigameVongxoayPoint */

$this->title = 'Create Minigame Vongxoay Point';
$this->params['breadcrumbs'][] = ['label' => 'Minigame Vongxoay Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-point-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
