<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SystemsConfigValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cấu hình hệ thống';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Danh sách bài viết
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
								</div>
							</div>
				<div class="m-portlet__body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute' => 'systems_config_id',
				'label'		=> 'Tên cấu hình',
				'value'		=> function($model){
					return $model->config->name;
				}
			],
			[
				'attribute' => 'systems_config_id',
				'label'		=> 'Mã',
				'value'		=> function($model){
					return $model->config->code;
				}
			],
			[
				'attribute' => 'value',
				'label'		=> 'Giá trị',
				'value'		=> function($model){
					if($model->config->data_type == 'string'){
						return $model->value;
					}elseif($model->config->data_type == 'int'){
						return $model->value;
					}elseif($model->config->data_type == 'text'){
						return '';
					}elseif($model->config->data_type == 'json'){
						$arrayDataType 	= json_decode($model->config->data);
						foreach($arrayDataType as $t => $val){
							if($t == $model->value){
								return $val;
							}
						}
					}	
				}
			],

            [	
						'class' 	=> 'yii\grid\ActionColumn',
						'headerOptions' => ['style' => 'width:100px'],
						'header'	=>'Action',
						'template' 	=> '{update}',
						'buttons'	=> [
							'update' 		=> function ($url, $model, $key) {
								//return Html::a('&nbsp;<span class="glyphicon flaticon-paper-plane"></span>', ['update', 'id'=>$model["member_id"]]);
								return Html::a('<i class="fa 	fa-edit"></i>', ['update', 'id'=>$model["systems_config_id"]], ['class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only']);
							},
						]
									
			],
        ],
    ]); ?>
</div>
</div>
	</div>
</div>
</div>

