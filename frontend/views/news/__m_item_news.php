<li>
    <div class="image">
        <a href="/<?=$model->post_slug?>">
            <img width="108px" src="<?=Yii::getAlias('@webDomain')?>/uploads/<?=$model->post_featured_image?>" alt="<?=$model->post_title?>">
        </a>
    </div>
    <div class="content">
        <h5>
			 <a title="Chuỗi Sự Kiện Nhận Vàng Hấp Dẫn" href="/<?=$model->post_slug?>"><?=$model->post_title?></a>
		</h5>
		<div class="time"><?=date('d.m.Y', strtotime($model->post_datetime))?></div>
    </div>
</li>