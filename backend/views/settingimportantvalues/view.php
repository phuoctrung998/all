<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SettingImportantValues */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Setting Important Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-important-values-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'title',
            'code',
            'code_values',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
