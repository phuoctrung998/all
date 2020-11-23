<?php 
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use yii\base\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widget\LeftServersWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/m_trangchu';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<section class="news-area">
			<div class="top-title">
				<span>TIN TỨC</span>
			</div>
			<ul class="news-list">
				<?php 
					echo ListView::widget([
						'dataProvider' => $dataProvider,
						'itemOptions' => ['class' => 'column-item all'],
						'layout' => "{items}",
						'itemView' => function ($model, $key, $index, $widget) {
							return $this->render('__m_item_news',['model' => $model]);
						},
					]);	
				?>
			</ul>
			<ul class="paging">
               <?php
				echo LinkPager::widget ( [
					'id'=>'my-pager',
					'pagination' 				=> $pages ,
					'activePageCssClass'	 	=> 'active' ,
					'options' => [
						'class' => 'list-inline'
					],
					'linkContainerOptions' => ['class' => 'list-inline-item']
				] );
			?>
            </ul>
		</section>