<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GiftcodeTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loại Giftcode';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giftcode-type-index">
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Danh sách loại Giftcode
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									 <?= Html::a('<span>
													<i class="fa fa-gamepad"></i>
													<span>
														Thêm mới loại Giftcode
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
            'name',
            'code',
            [
				'attribute' => 'status',
				'value'		=> function($model){
					if ($model->status==1){
						return "Mở";
					}else{
						return "Đóng";
					}
				}
			],
            'create_time:datetime',
            //'update_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
	</div>
</div>
</div>

