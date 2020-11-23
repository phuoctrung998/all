<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SettingImportantValuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cài đặt';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-important-values-index">
    <p>
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'code',
            'code_values',
            'create_time:datetime',
            // 'update_time:datetime',

            [	
					'class' 	=> 'yii\grid\ActionColumn',
					'header'	=>'Action',
					'template' 	=> '{update}',
					'buttons'	=> [
						'update' 		=> function ($url, $model, $key) {
								return Html::a('&nbsp;<span class="glyphicon fa fa-edit"></span>', ['update', 'id'=>$model["id"]]);
						},
					]
									
			],
        ],
    ]); ?>
</div>
