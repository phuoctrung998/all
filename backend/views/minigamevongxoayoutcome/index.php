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
				'attribute' => 'name',
				'label'	=> 'Ngọc rồng',
				'format' => 'html',
				//'filter'=> false,
				
			],
			
            'create_time',

           
        ],
    ]); ?>
</div>
