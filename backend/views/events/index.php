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
<?php  echo $this->render('_search', ['model' => $model]); ?>
<div class="transaction-index">
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Danh sách tiêu Kim Cương theo ngày
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],
		   [
				'attribute' => 'member_username',
				'label'		=> 'Thành viên',
				'value'		=> function($model){
					return $model['member_username'];
				}
				
		   ],
		   [
				'attribute' => 'xu',
				'label'		=> 'KC tiêu',
				'value'		=> function($model){
					return number_format($model['xu']);
				}
				
		   ],
        ],
    ]); ?>
</div>
</div>
	</div>
</div>
</div>
