<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MinigameVongxoayOutcome */

$this->title = 'Create Minigame Vongxoay Outcome';
$this->params['breadcrumbs'][] = ['label' => 'Minigame Vongxoay Outcomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-outcome-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
