<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinigameVongxoayDoithuong */

$this->title = 'Update Minigame Vongxoay Doithuong: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Minigame Vongxoay Doithuongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="minigame-vongxoay-doithuong-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
