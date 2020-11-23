<?php 
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div class="app-item-second">
	<div class="app-thumbnail">
		<a href="/<?=$model->slug?>/<?=$model->vid?>"><img src="<?=$baseUrl?>/uploads/<?=$model->images?>"></a>
	</div><!--.app-thumbnail-->
	<div class="app-info">
		<h3><a href="/<?=$model->slug?>/<?=$model->vid?>"><?=$model->name?></a></h3>
		<?php if(isset($model->publisher)){?>
		<p class="category"><?=$model->publisher->name?></p>
		<?php } ?>
		<div class="info-bottom d-flex justify-content-between">
			<?php if(isset($model->lastedVersion)){?>
			<span class="version"><?=$model->lastedVersion->version_name?></span>
			<?php }?>
			<a href="/<?=$model->slug?>/<?=$model->vid?>/versions"><i class="nc-icon-outline arrows-2_square-download"></i></a>
		</div>
	</div><!--.app-info-->
</div><!--.app-item-->