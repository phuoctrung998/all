<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TblSettings */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-settings-view">

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
            'site_title',
            'site_description',
            'social_google',
            'social_fanpage',
            'social_googleplus',
            'social_youtube',
            'site_address',
            'site_phone',
            'site_fax',
            'site_email:email',
            'site_sort_about',
            'id',
        ],
    ]) ?>

</div>
