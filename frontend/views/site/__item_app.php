<?php 
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div class="app-item">
	<div class="app-thumbnail">
		<a href="/<?=$model->slug?>/<?=$model->vid?>"><img src="<?=$baseUrl?>/uploads/<?=$model->images?>"></a>
	</div><!--.app-thumbnail-->
	<div class="app-info">
		<h3><a href="/<?=$model->slug?>/<?=$model->vid?>"><?=$model->name?></a></h3>
		<div class="info-bottom d-flex justify-content-between">
			<span class="rating"><i class="fa fa-star" aria-hidden="true"></i>4.5</span>
			<?php if(isset($model->lastedVersion)){?>
			<span class="size"><?=$model->lastedVersion->version_file_size?></span>
			<?php } ?>
		</div>
	</div><!--.app-info-->
</div><!--.column-item-->