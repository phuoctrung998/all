<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Máy chủ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servers-index">


<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
	<!-- review --> 
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					DANH SÁCH GIAO DỊCH
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
				'attribute' => 'member_username',
				'format'	=> 'html',
				'value'		=> function($model){
					if(!empty($model->member_username)){
						return $model->member_username;
					}else{
						return '';
					}
				}
			],
			[
				'attribute' => 'member_gold',
				'value'		=> function($model){
					if(!empty($model->member_gold)){
						return number_format($model->member_gold);
					}
				}
				
			],
			[
				'attribute' => 'server_index',
				'value'		=> function($model){
					if($model->server_index != ''){
						return $model->server_index;
					}else{
						return '';
					}
				}
				
			],
			[
				'attribute' => 'description',
				'value'		=> function($model){
					return $model->description;
				}
				
			],
			'create_time',
        ],
    ]); ?>
	</div>
</div>
	</div>
</div>
</div>

