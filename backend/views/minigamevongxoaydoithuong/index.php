<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MinigameVongxoayDoithuongSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minigame Vongxoay Doithuongs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-doithuong-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Minigame Vongxoay Doithuong', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'member_id',
            'point',
            'award_id',
            'create_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
