<?php 
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div class="app-item">
	<div class="app-thumbnail">
		<a href="/<?=$model->app->slug?>/<?=$model->app->vid?>">
			<img alt="" src="<?=$baseUrl?>/uploads/<?=$model->app->images?>">
		</a>
	</div><!--.app-thumbnail-->
	<div class="app-info">
		<h3><a href="/<?=$model->app->slug?>/<?=$model->app->vid?>"><?=$model->app->name?></a></h3>
		<div class="info-bottom d-flex justify-content-between">
			<span class="rating"><i class="fa fa-star" aria-hidden="true"></i>4.5</span>
			<?php if($model->app->lastedVersion){?>
			<span class="size"><?=$model->app->lastedVersion->version_name?></span>
			<?php }?>
		</div>
	</div><!--.app-info-->
</div><!--.column-item-->