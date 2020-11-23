<?php
use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\ListView;
use frontend\widget\LeftApp;
use frontend\widget\MostDownloadByType;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div class="apps-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 pd-r-5 search-page">
				<div class="row">
					<div class="col-lg-12 mg-bt-10 d-flex justify-content-between align-items-center">
						<h1 class="main-title fs-20 text-primary"><?=$model->name?></h1>
					</div><!--.col-lg-12-->
				</div><!--.row-->
				<div class="page-content">
					<div class="columns-6">
							<?php 
								echo ListView::widget([
									'dataProvider' => $dataProvider,
									'itemOptions' => ['class' => 'column-item'],
									'layout' => "{items}",
									'itemView' => function ($model, $key, $index, $widget) {
										return $this->render('__item_app',['model' => $model]);
									},
								]);	
							?>
						</div><!--.lists-app-->

				</div><!--.page-content-->
			</div><!--.col-lg-8-->
			<div class="col-lg-4 right-sidebar">
				<div class="widget widget-apps">
					<h2 class="widget-title sub-title">Most Downloaded Apps</h2>
					<?=MostDownloadByType::widget(['type_id' => 1,'limit' => 5])?>
				</div><!--.widget-->
				<div class="widget widget-apps">
					<h2 class="widget-title sub-title">Most Downloaded Games</h2>
					<?=MostDownloadByType::widget(['type_id' => 2,'limit' => 5])?>
				</div><!--.widget-->
			</div><!--.col-lg-4-->
		</div><!--.row-->
	</div><!--.container-->
	</div><!--.apps-area-->