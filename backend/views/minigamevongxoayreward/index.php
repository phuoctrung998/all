<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MinigameVongxoayRewardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minigame Vongxoay Rewards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-reward-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Minigame Vongxoay Reward', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'images',
            'quote',
            'percent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
