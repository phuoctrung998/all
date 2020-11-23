<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinigameVongxoayReward */

$this->title = 'Create Minigame Vongxoay Reward';
$this->params['breadcrumbs'][] = ['label' => 'Minigame Vongxoay Rewards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-reward-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
