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
<div class="col-md-4">
   <!--begin::Portlet-->
   <div class="m-portlet m-portlet--tab">
      <div class="m-portlet__head">
         <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
               <span class="m-portlet__head-icon m--hide">
               <i class="la la-gear"></i>
               </span>
               <h3 class="m-portlet__head-text">
                  CẬP NHẬT TRẠNG THÁI TOÀN BỘ MÁY CHỦ
               </h3>
            </div>
         </div>
      </div>
      <!--begin::Form-->
      <?php $form = ActiveForm::begin(
        [
            'action' => ['servers/updateall'],
            'options' => [
                'class' => 'm-form m-form--fit m-form--label-align-right'
             ]
        ]
    ); ?>
         <div class="m-portlet__body">
            
            <div class="form-group m-form__group">
               <label for="exampleSelect1">
				Trạng thái
               </label>
               <select class="form-control m-input" name="status" id="exampleSelect1">
					<option value="99"> 
						Trạng thái máy chủ
					</option>
					<option value="1" selected="">Mở</option>
					<option value="2">Bảo trì</option>
					<option value="3">Đông người</option>
					<option value="4">Đầy</option>
					<option value="0">Đóng</option>
               </select>
            </div>
         </div>
		 
          <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions">
               <button type="submit" class="btn btn-primary">
               Cập nhật
               </button>
            </div>
         </div>
      <?php ActiveForm::end(); ?>
      <!--end::Form-->
   </div>
   <!--end::Portlet-->
 
   <!--end::Portlet-->
</div>
</div>
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Danh sách máy chủ
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									 <?= Html::a('<span>
													<i class="fa fa-gamepad"></i>
													<span>
														Thêm mới máy chủ
													</span>
												</span>', ['create'], ['class' => 'btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill']) ?>
								</div>
							</div>
				<div class="m-portlet__body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           
            'server_name',
			[
				'attribute' => 'server_index',
				'label'		=> 'Mã máy chủ (index)',
				'value'		=> function($model){
					return $model->server_index;
				}
			],
			[
				'attribute' => 'server_status',
				'format'	=> 'html',
				'value'		=> function($model){
					if ($model->server_status==1){
						return "<span class='btn btn-success btn-sm'>Mở</span>";
					}elseif($model->server_status==2){
						return "<span class='btn btn-warning m-btn--wide'>Bảo trì</span>";
					}elseif($model->server_status==3){
						return "<span class='btn btn-danger m-btn--wide'>Đông người</span>";
					}elseif($model->server_status==4){
						return "<span class='btn btn-danger m-btn--wide'>Đầy</span>";
					}else{
						return "<span class='btn btn-metal m-btn--wide'>Đóng</span>";
					}
				}
			],
			
            //'server_linklogingame',
            //'server_linkpayment',
            //'server_link1',
            //'server_link2',
            //'server_link3',
            //'server_hot',
            //'server_promotion',
            [
				'attribute' => 'server_is_timer',
				'value'		=> function($model){
					if($model->server_is_timer == 1){
						return 'Có hẹn giờ';
					}else{
						return 'Không hẹn giờ';
					}
				}
				
			],
            'server_timer',
			'server_slug',
            //'server_label',

             [	
						'class' 	=> 'yii\grid\ActionColumn',
						'headerOptions' => ['style' => 'width:100px'],
						'header'	=>'Action',
						'template' 	=> '{update}',
									
			],
        ],
    ]); ?>
</div>
</div>
	</div>
</div>
</div>

