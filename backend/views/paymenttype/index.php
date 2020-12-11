<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaymentTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Types';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="payment-type-index">

<!--
<div>
    <label class="col-3 col-form-label">
        Success
    </label>
    
    <div class="col-3">
        <span class="m-switch m-switch--success">
            <label>
                <input type="checkbox" checked="checked" name="">
                <span></span>
            </label>
        </span>
    </div>
</div>
-->

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payment Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
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
                                <input type='checkbox'  checked='checked' name='toggle' id='toggle'/>
                                <span></span>
                            </label>
                        </span>";
                    }else{
                        $html = "<span class='m-switch m-switch--success'>
                        <label>
                            <input type='checkbox'  name=''/>
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
    <?php Pjax::end(); ?>
</div>
