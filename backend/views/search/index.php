<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tìm kiếm';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
	
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Top tìm kiếm
										</h3>
									</div>
								</div>
							</div>
				<div class="m-portlet__body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Từ khóa</th>
                    <th>Lượt tìm kiếm</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php foreach($dataSearch->getModels() as $key => $model){?>
					<tr>
						<td><a href="javascript:;"><?=$key?></a></td>
						<td><?=$model["text_search"]?></td>
						<td><span class="label label-success"><?=$model["count_record"]?></span></td>
					</tr>
					<?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
        </div></div></div>
	
<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
				<!-- review --> 
				<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Danh sách từ khóa tìm kiếm
										</h3>
									</div>
								</div>
							</div>
				<div class="m-portlet__body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'text_search',
            'ip',
            'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
				</div>
			</div>	
		</div>
	</div>	
</section>