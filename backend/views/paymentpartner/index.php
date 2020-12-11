<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaymentPartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-partner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payment Partner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            [
				'attribute' => 'status',
				'format'	=> 'raw',
				'value'		=> function($model){
                    if($model->status == 1){
                         $html = "<span class='m-switch m-switch--success'>
                            <label>
                                <input type='checkbox' checked='checked' name=''/>
                                <span></span>
                            </label>
                        </span>";
                    }else{
                        $html = "<span class='m-switch m-switch--success'>
                        <label>
                            <input type='checkbox' name=''/>
                            <span></span>
                        </label>
                    </span>";     
                    }    
                    return $html;
					
				}
			],  
            'create_time:datetime',
            //'update_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
