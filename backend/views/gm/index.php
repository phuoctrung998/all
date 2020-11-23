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
				'label'	=> 'Tài khoản',
				'attribute' => 'member_username',
				'value' => 'members.member_username'
			],
			'trans_id',
			[
				'attribute' => 'xu',
				'value'		=> function($model){
					if(!empty($model->xu)){
						return number_format($model->xu);
					}
				}
				
			],
            
			[
				'attribute' => 'status',
				'value'		=> function($model){
					if($model->status == 1){
						return 'Thành công';
					}
					else{
						return 'Thất bại';
					}
				}
				
			],
			[
				'attribute' => 'type',
				'format'	=> 'html',
				'value'		=> function($model){
					if($model->type == 1){
						return '<span class="m-badge m-badge--warning m-badge--wide"> Nạp </span>';
					}else{
						return '<span class="m-badge m-badge--accent m-badge--wide"> Tiêu </span>';
					}
				}
				
			],
			[
				'attribute' => 'is_gm',
				'value'		=> function($model){
					if($model->is_gm == 1){
						return 'GM';
					}
					else{
						return 'nạp thường';
					}
				}
				
			],
			'desc',
			[
				'attribute' => 'gm_description',
				'value'		=> function($model){
					return $model->gm_description;
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

