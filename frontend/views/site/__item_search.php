<?php 
use yii\helpers\Html;
use yii\helpers\Url;
$baseUrl = Yii::getAlias('@webDomain');
?>
<div class="app-item-second">
	<div class="app-thumbnail">
		<a href="/<?=$model['slug']?>/<?=$model['vid']?>"><img alt="" src="<?=$baseUrl?>/uploads/<?=$model['images']?>"></a>
	</div><!--.app-thumbnail-->
	<div class="app-info">
		<h3><a href="/<?=$model['slug']?>/<?=$model['vid']?>"><?=$model['name']?></a></h3>
		<p>PLAYERUNKNOWN'S BATTLEGROUNDS goes mobile - the original Battle Royale game is now available on your device!</p>
		<p class="category">MnM SOFT</p>
		<div class="info-bottom d-flex justify-content-between">
			<span class="version">1.2.1</span>
			<a href="/<?=$model['slug']?>/<?=$model['vid']?>"><i class="nc-icon-outline arrows-2_square-download"></i></a>
		</div>
	</div><!--.app-info-->
</div><!--.app-item-->