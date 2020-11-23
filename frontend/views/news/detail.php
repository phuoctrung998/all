
<?php


/* @var $this \yii\web\View */
/* @var $content string */
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
	<div class="row">
	  <div class="col-sm-12">
		<div class="event-container">
		  <div class="event-box-title">
			<div class="title-img">
				
			<?php if($model->post_title == 2){ ?>
				<h2><img src="<?=$styleUrl?>/images/title-tintuc.png"></h2>
			<?php } elseif( $model->post_title == 3){ ?>
				<h2><img src="<?=$styleUrl?>/images/title-sk.png"></h2>
			<?php } ?>
			</div>
			
		  </div>
			<div class="event-box-content" style="width:78%">
				<h4>
					<?=$model->post_title?>
					<span style="font-size:20px"><?=date('d.m.Y', strtotime($model->post_datetime))?></span>
				</h4>
				<?=$model->post_content?>
			</div>
			<div class="box-relate" style="width:78%">
				<div class="box-relate-title">
				<h5>CÁC TIN LIÊN QUAN</h5>
				</div>
				<ul class="event-relate">
				<?php foreach($relatedPosts as $post){?>
					<li>
						<a href="/<?=$post->post_slug?>"><?=$post->post_title?> <span>
						<?=date('d-m', strtotime($post->post_datetime))?></span></a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	  </div>
	</div>
  </div>
</section>