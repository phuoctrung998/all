<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MembersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-index">
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
									
								</div>
							</div>
				<div class="m-portlet__body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			'member_id',
            'member_username',
            'member_fullname',
            'member_email:email',
            'member_phone',
            //'member_birthday',
            //'member_registerday',
            //'member_codeauthencation',
            //'member_authentication',
            'member_block',
            //'member_description:ntext',
            //'member_ip',
            //'member_coderesetpass',
            //'member_getgiftcode',
            //'member_giftcode',
            //'member_logintime',
            //'member_loginserverslug',
            'member_xu',
            //'member_is_gift',
            //'member_gift',
            //'member_2usd',
            //'member_ogames_id',
            //'member_facebook_url:url',

            [	
						'class' 	=> 'yii\grid\ActionColumn',
						'headerOptions' => ['style' => 'width:100px'],
						'header'	=>'Action',
						'template' 	=> '{update} {playnow}',
						'buttons'	=> [
							'update' 		=> function ($url, $model, $key) {
								//return Html::a('&nbsp;<span class="glyphicon flaticon-paper-plane"></span>', ['update', 'id'=>$model["member_id"]]);
								return Html::a('<i class="fa 	fa-edit"></i>', ['update', 'id'=>$model["member_id"]], ['class' => 'btn btn-info m-btn m-btn--icon m-btn--icon-only']);
							},
							'playnow' 		=> function ($url, $model, $key) {
								$sign 	= md5('vtpcorp@123'.$model["member_username"]);
								$url 	= '/play-one-user?username='.$model["member_username"].'&sign='.$sign;
								return '<a target="_blank" href="'.$url.'" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only"> <i class="fa 	fa-youtube-play"></i> </a>';
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
