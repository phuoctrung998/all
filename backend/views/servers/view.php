<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Servers */

$this->title = $model->server_id;
$this->params['breadcrumbs'][] = ['label' => 'Servers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="servers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->server_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->server_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'server_id',
            'server_index',
            'server_name',
            'server_status',
            'server_slug',
            'server_linklogingame',
            'server_linkpayment',
            'server_link1',
            'server_link2',
            'server_link3',
            'server_hot',
            'server_promotion',
            'server_is_timer:datetime',
            'server_timer',
            'server_label',
        ],
    ]) ?>

</div>
