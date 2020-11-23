<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ManagerRedirectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manager Redirects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-redirects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Manager Redirects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'teaser_login_flag_newserver',
            'teaser_login_flag_playnearserver',
            'teaser_login_flag_customurl',
            'teaser_login_customurl',
            //'teaser_register_flag_newserver',
            //'teaser_register_flag_customurl',
            //'teaser_register_customurl',
            //'homepage_flag_login_newserver',
            //'homepage_flag_login_playnearserver',
            //'homepage_login_flag_customurl',
            //'homepage_login_customurl',
            //'homepage_register_flag_newserver',
            //'homepage_register_flag_customurl',
            //'homepage_register_customurl',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
