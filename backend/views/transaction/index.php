<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Members;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Giao dịch';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="transaction-index">
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Danh sách giao dịch
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
           'trans_id',
		   [
				'attribute' => 'trans_status',
				'label'	=> 'Trạng thái',
				'format' => 'html',
				//'filter'=> false,
				'value'		=> function($model){
					if($model->trans_status == 1){
						return '<span class="m-badge  m-badge--success m-badge--wide">Success</span>';
					}else{
						return '<span class="m-badge  m-badge--danger m-badge--wide">False</span>';
					}
				}
			],
			'server_id',
			[
				'attribute' => 'member_username',
				'label'		=> 'Thành viên',
				'value' 	=> 'member.member_username'
			],
            'trans_type',
			'trans_serial',
            'trans_code',
			[
				'attribute' => 'trans_time',
				//'filter' => \yii\jui\DatePicker::widget(['language' => 'ru', 'dateFormat' => 'dd-MM-yyyy']),
				 'value' => 'trans_time'
			],
			'trans_money',
			'trans_moneyreal',
			[
				'attribute' => 'trans_loainap',
				'value'		=> function($model){
					if($model->trans_loainap == 1){
						return 'Nạp vàng';
					}elseif($model->trans_loainap == 2){
						return 'Nạp ví';
					}
				}
			],
			'trans_partner',
            //'trans_money',
            //'trans_moneyreal',
            //'trans_time',
			[
				'attribute' => 'member_id',
				'label'	=> 'Xu',
				'filter'=> false,
				'value'		=> function($model){
					return number_format($model->member->member_xu);
				}
			],
			'trans_compensation',
			[
				'attribute' => 'trans_desc',
				'format' => 'raw',
				'value'		=> function($model){
					if($model->trans_desc != ''){
					return '<button type="button" class="btn btn-warning" 
					data-offset="20px 20px" data-toggle="m-tooltip" 
					data-placement="top" title="'.$model->trans_desc.'"> Mô tả </button>';
					}
				}				
			],
			
            //'trans_status',
            //'trans_compensation',
            //'trans_compensation_time',
            //'trans_devices',
			[	
						'class' 	=> 'yii\grid\ActionColumn',
						'headerOptions' => ['style' => 'width:100px'],
						'header'	=>'Action',
						'template' 	=> '{update}',
						'buttons'	=> [
							'update' 		=> function ($url, $model, $key) {
								return Html::a('<i class="fa 	fa-edit"></i>', ['update', 'id'=>$model["trans_id"]], ['class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only']);
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
