<?php 
use yii\helpers\Html;
use yii\helpers\Url;
$baseUrl = Yii::getAlias('@webDomain');
?>
<li>
	<div class="app-item-second">
		<div class="app-thumbnail">
			<a title="<?=$model->name?>" href="/<?=$model->slug?>/<?=$model->vid?>"><img alt="<?=$model->name?>" src="<?=$baseUrl?>/uploads/<?=$model->images?>"></a>
		</div><!--.app-thumbnail-->
		<div class="app-info">
			<h3><a title="<?=$model->name?>" href="/<?=$model->slug?>/<?=$model->vid?>"><?=$model->name?></a></h3>
			<?php if(isset($model->indexPublisher->publisher)){?>
				<p class="category"><?=$model->indexPublisher->publisher->name?></p>
			<?php }?>
			<div class="info-bottom d-flex justify-content-between">
				<?php if(isset($model->lastedVersion)){?>
					<span class="size"><?=$model->lastedVersion->version_file_size?></span>
				<?php } ?>
				<a title="<?=$model->name?>" href="/<?=$model->slug?>/<?=$model->vid?>"><i class="nc-icon-outline arrows-2_square-download"></i></a>
			</div>
		</div><!--.app-info-->
	</div><!--.app-item-->
</li>