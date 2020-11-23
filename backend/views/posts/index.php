<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bài viết';
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
									 <?= Html::a('<span>
													<i class="fa fa-gamepad"></i>
													<span>
														Thêm mới bài viết
													</span>
												</span>', ['create'], ['class' => 'btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill']) ?>
								</div>
							</div>
				<div class="m-portlet__body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute' => 'post_featured_image',
				'format'	=> 'html',
				'value'		=> function($model){
					return '<img width="100px" src ='.Yii::getAlias('@webDomain').'/uploads/'. $model->post_featured_image.'>';
				}
			],
			'post_title',
			[
				'attribute' => 'cat_name',
				'value'		=> function($model){
					if(!empty($model->cat)){
						return $model->cat->cat_name;
					}
					else{
						return 'Chưa chọn danh mục';
					}
				}
				
			],
            'post_datetime',
			[
				'attribute' => 'is_hot',
				'value'		=> function($model){
					if($model->is_hot == 0){
						return 'Thường';
					}
					else{
						return 'Hot';
					}
				}
				
			],
            //'post_content:ntext',
            //'post_datetime',
            //'post_related_id',
            //'post_slug',
            //'post_options',
            //'post_metakey:ntext',
            //'post_metadesc:ntext',
            //'is_timer:datetime',
            //'timer',
			
			[	
						'class' 	=> 'yii\grid\ActionColumn',
						'headerOptions' => ['style' => 'width:160px'],
						'header'	=>'Action',
						'template' 	=> '{update} {views} {delete}',
						'buttons'	=> [
							'update' 		=> function ($url, $model, $key) {
								return Html::a('<i class="fa 	fa-edit"></i>', ['update', 'id'=>$model["post_id"]], ['class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only']);
							},
							'views' 		=> function ($url, $model, $key) {
								$url 	= '/'.$model["post_slug"];
								return '<a target="_blank" href="'.$url.'" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only"> <i class="fa fa-youtube-play"></i> </a>';
							},
							'delete' => function($url, $model){
								return Html::a('<i class="flaticon-delete-2"></i>', ['delete', 'id' => $model->post_id], [
									'class' => 'btn btn-danger m-btn m-btn--icon m-btn--icon-only',
									'data' => [
										'confirm' => 'Bạn chắc chắn muốn xóa bài viết này ?',
										'method' => 'post',
									],
								]);
							}
							
						]
									
			],
        ],
    ]); ?>
</div>
</div>
	</div>
</div>
</div>
