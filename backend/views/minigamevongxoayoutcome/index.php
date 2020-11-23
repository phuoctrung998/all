<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MinigameVongxoayOutcomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minigame Vongxoay Outcomes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minigame-vongxoay-outcome-index">

  
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute' => 'member_username',
				'label'		=> 'Thành viên',
				'value' 	=> 'member.member_username'
			],
			[
				'attribute' => 'reward_id',
				'label'	=> 'Phần thưởng',
				'format' => 'html',
				//'filter'=> false,
				'value'		=> function($model){
					if($model->reward_id == 1){
						return 'Ngọc rồng I';
					}elseif($model->reward_id == 2){
						return 'Ngọc rồng II';
					}elseif($model->reward_id == 3){
						return 'Ngọc rồng III';
					}elseif($model->reward_id == 4){
						return 'Ngọc rồng IV';
					}elseif($model->reward_id == 5){
						return 'Ngọc rồng V';
					}elseif($model->reward_id == 6){
						return 'Ngọc rồng VI';
					}elseif($model->reward_id == 7){
						return 'Ngọc rồng VII';
					}
				}
			],
            'create_time',

           
        ],
    ]); ?>
</div>
