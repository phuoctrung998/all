<div class="item">
	<div class="item-img">
		<a title="<?=$model->post_title?>" href="/<?=$model->post_slug?>">
			<img src="<?=Yii::getAlias('@webDomain')?>/uploads/<?=$model->post_featured_image?>" alt="<?=$model->post_title?>">
		</a>
	</div>
	<div class="item-content">
		<h3>
			<a title="<?=$model->post_title?>" href="/<?=$model->post_slug?>">
				<?=$model->post_title?><br>

				<span style="color:black;font-size:10px;">  <?=date('d/m/Y', strtotime($model->post_datetime))?></span>
			</a>
		</h3>
		<?php 
				$quote = word_limit($model->post_content,180);
		?>
	  <p><?=strip_tags($quote);?></p>
	</div>
</div>