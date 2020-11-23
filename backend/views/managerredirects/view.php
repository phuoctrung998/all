<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerRedirects */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Manager Redirects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manager-redirects-view">

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
            'teaser_login_flag_newserver',
            'teaser_login_flag_playnearserver',
            'teaser_login_flag_customurl',
            'teaser_login_customurl',
            'teaser_register_flag_newserver',
            'teaser_register_flag_customurl',
            'teaser_register_customurl',
            'homepage_flag_login_newserver',
            'homepage_flag_login_playnearserver',
            'homepage_login_flag_customurl',
            'homepage_login_customurl',
            'homepage_register_flag_newserver',
            'homepage_register_flag_customurl',
            'homepage_register_customurl',
        ],
    ]) ?>

</div>
