<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chuyên mục bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Danh sách chuyên mục
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									 <?= Html::a('<span>
													<i class="fa fa-gamepad"></i>
													<span>
														Thêm mới chuyên mục
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
            'cat_name',
            [
				'attribute' => 'cat_parent_id',
				'value'		=> function($model){
					if(!empty($model->cat)){
						return $model->cat->cat_name;
					}
					else{
						return 'Danh mục gốc';
					}
				}
				
			],
            'cat_slug',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
	</div>
</div>
</div>
