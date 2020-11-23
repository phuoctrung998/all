<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\widgets\ListView;
use frontend\widget\MostDownloadByType;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div class="apps-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 pd-r-5 search-page mg-t-40">
				<div class="row">
					<div class="col-lg-12 mg-bt-40 d-flex justify-content-between align-items-center">
						<h2 class="main-title fs-20 mg-bt-0 text-primary">Search results for: <?=$textSearch?></h2>
						<nav class="menu-filter">
							<ul class="list-inline">
								<li class="list-inline-item"><a href="" data-filter=".app">Apps</a></li>
								<li class="list-inline-item"><a href="" data-filter=".games">Games</a></li>
								<li class="list-inline-item active"><a href="" data-filter=".all">All</a></li>
							</ul>
						</nav><!--.menu-filter-->
					</div><!--.col-lg-12-->
				</div><!--.row-->
				<div class="row mg-bt-10">
					<div class="col-lg-12">
						<div class="lists-app columns-1">
							<div class="content-filter">
								<?php 
									echo ListView::widget([
										'dataProvider' => $dataProvider,
										'itemOptions' => ['class' => 'column-item all'],
										'layout' => "{items}",
										'itemView' => function ($model, $key, $index, $widget) {
											return $this->render('__item_search_app',['model' => $model]);
										},
									]);	
								?>
							</div><!--.content-filter-->
						</div><!--.lists-app-->
					</div><!--.col-lg-12-->
				</div><!--.row-->
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