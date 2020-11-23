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
<section class="news-single">
	<div class="top-title">
		<span>TIN TỨC</span>
	</div>
	<div class="news-single-content">
		<h1><?php echo strtoupper($model->post_title); ?></h1>
		<div class="time">
			<?= date('d/m/Y', strtotime($model->post_datetime));?>
		</div>
		<div class='news-single-detail-content'><?=$model->post_content?></div>
		</div>
	</div>
</section>

<section class="news-area">
	<div class="top-title">
		<span>TIN TỨC LIÊN QUAN</span>
	</div>
	<ul class="news-list">
		 <?php
			foreach ($relatedPosts as $post){
		?>
		<li>
			<div class="image">
				<a title="<?=$post->post_title?>" href="/<?=$post->post_slug?>">
					<img width='108px' src="/uploads/<?=$post->post_featured_image?>" alt="<?=$post->post_title?>">
				</a>
			</div>
			<div class="content">
				<h5>
					<a title="<?=$post->post_title?>" href="/<?=$post->post_slug?>"><?=$post->post_title?></a>
				</h5>
				<div class="time">
					<?= date('d/m/Y', strtotime($post->post_datetime));?>
				</div>
			</div>
		</li>
		<?php } ?>
	</ul>
</section>