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
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<section class="event-box float-left">
            <div class="container">
                <div>
                    <div class="event-box-title title-news">
                    <div class="title-text ">
                        
                      <h2><img src="<?=$styleUrl?>/images/title-tintuc.png"></h2>
                    </div>
                    </div>
                    <div class="event-box-content">
             
                        <div class="news-list">
                            <?php 
                                echo ListView::widget([
                                    'dataProvider' 	=> $dataProvider,
                                    'itemOptions' 	=> ['class' => 'column-item all'],
                                    'layout' 		=> "{items}",
                                    'itemView' 		=> function ($model, $key, $index, $widget) {
                                        return $this->render('__item_news',['model' => $model]);
                                    },
                                ]);	
                            ?>
                        </div>
                    </div>
                
                    <?php
                        echo LinkPager::widget ( [
                            'id'						=> 'my-pager',
                            'pagination' 				=> $pages ,
                            'activePageCssClass'	 	=> 'current' ,
                            'prevPageLabel' 			=> '<i class="nc-icon-outline arrows-1_minimal-left" aria-hidden="true"></i>',
                            'lastPageLabel'				=> '<i class="nc-icon-outline arrows-1_double-right" aria-hidden="true"></i>',
                            'nextPageLabel' 			=> '<i class="nc-icon-outline arrows-1_minimal-right" aria-hidden="true"></i>',
                            'maxButtonCount'=>8,
                            'disableCurrentPageButton' 	=> true,
                            'maxButtonCount' 			=> 5 ,
                            'options' => [
                                'class' => 'list-inline'
                            ],
                            'linkContainerOptions' => ['class' => 'list-inline-item']
                        ] );
                    ?>
                    <div class="clear"></div>
                </div>
            </div>
		</section>
     