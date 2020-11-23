<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinigameVongxoayDoithuong */

$this->title = 'Create Minigame Vongxoay Doithuong';
$this->params['breadcrumbs'][] = ['label' => 'Minigame Vongxoay Doithuongs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-doithuong-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
