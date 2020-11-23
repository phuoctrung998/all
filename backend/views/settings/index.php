<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TblSettingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-settings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Settings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'site_title',
            'site_description',
            'social_google',
            'social_fanpage',
            'social_googleplus',
            // 'social_youtube',
            // 'site_address',
            // 'site_phone',
            // 'site_fax',
            // 'site_email:email',
            // 'site_sort_about',
            // 'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
