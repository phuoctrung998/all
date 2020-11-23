<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Members */

$this->title = $model->member_id;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="members-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->member_id], [
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
            'member_id',
            'member_code',
            'member_username',
            'member_password',
            'member_fullname',
            'member_email:email',
            'member_phone',
            'member_birthday',
            'member_registerday',
            'member_codeauthencation',
            'member_authentication',
            'member_block',
            'member_description:ntext',
            'member_ip',
            'member_coderesetpass',
            'member_getgiftcode',
            'member_giftcode',
            'member_logintime',
            'member_loginserverslug',
            'member_xu',
            'member_is_gift',
            'member_gift',
            'member_2usd',
            'member_ogames_id',
            'member_facebook_url:url',
        ],
    ]) ?>

</div>
