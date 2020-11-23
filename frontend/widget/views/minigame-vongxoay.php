<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/vongxoay';
?>
<input type="hidden" value="<?=$num_luotchoi?>" id="minigame_input_vongxoay_luotchoi">
<input type='hidden' value='<?=$member_point?>' id="minigame_input_vongxoay_point">	
<div class="vongxoay-img" id="vongxoaytichdiem">
	<img src="<?=$styleUrl?>/assets/images/vongquay.png"> 
	<img src="<?=$styleUrl?>/assets/images/vongquay2.png" alt="" id="img_quay"> 
	
	<?php if(!Yii::$app->user->isGuest){?>
		<a href="javascript: void(0)" onclick="quay();" class="nut-vongquay">
			<img src="<?=$styleUrl?>/assets/images/btn-quay.png">
		</a>
	<?php }else{ ?>
		<a href="javascript: void(0)" class="nut-vongquay mangaplay-pop-dkyn">
			<img src="<?=$styleUrl?>/assets/images/btn-quay.png">
		</a>
	<?php } ?>
	<img src="<?=$styleUrl?>/assets/images/star.png" class='star1'>
	<img src="<?=$styleUrl?>/assets/images/star2.png" class='star2'>
</div>
<!-- vòng xoay -->
<!--
<section class="top-three" id="a03">
	<div class="zindex">

		<div class="title03 wow">
			<img src="<?=$styleUrl?>/images/title03.png" alt="Tam Quốc Thủ Thành">
		</div>
		<div class="vq-box">
			<img src="<?=$styleUrl?>/images/bg_vq.png" alt="Tam Quốc Thủ Thành" />
			<div class=" vq-boxvongxoay-img" id="vongxoaytichdiem">
				<img style="transform: rotate(-17deg);" src="<?=$styleUrl?>/images/vq.png" alt="" id="img_quay">
				<?php if(!Yii::$app->user->isGuest){?>
				<a href="javascript: void(0)" onclick="quay();" class="nut-vongquay">
					<img src="<?=$styleUrl?>/images/quay.png">
				</a>
				<?php }else{ ?>
					<a href="javascript: void(0)" class="nut-vongquay mangaplay-pop-dkyn">
					<img src="<?=$styleUrl?>/images/quay.png">
				</a>
				<?php } ?>
			</div>
		</div>

		<div class="top-three-box">
			<div class="three-box-turn">
				<span class="minigame_vongxoay_luotchoi"><?=$num_luotchoi?></span>
				<input type="hidden" value="<?=$num_luotchoi?>" id="minigame_input_vongxoay_luotchoi">
				<input type='hidden' value='<?=$member_point?>' id="minigame_input_vongxoay_point">	
			</div>
			<div class="three-box-ul">
				<ul>
					<li>
						<img src="<?=$styleUrl?>/images/vq_total.png" alt="Tam Quốc Thủ Thành" />
						<p>Tổng Điểm<br /><span class="minigame_vongxoay_point"><?=number_format($member_point)?></span></p>
					</li>
					<li class="shop-gift"><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/vq_gift.png" alt="Tam Quốc Thủ Thành" /></a></li>
					<li>
						<a class="minigame-share-fb" href="javascript:;">
							<img src="<?=$styleUrl?>/images/share_facebook.png" alt="Tam Quốc Thủ Thành" />
						</a>
					</li>
				</ul>
				<ul>
					<li class="vq-help-click">
						<a href="javascript:void(0);">
							<img src="<?=$styleUrl?>/images/vq_help.png" alt="Tam Quốc Thủ Thành" />
						</a>
					</li>
					<li>Dùng <span class="minigame_vongxoay_point"><?=number_format($member_point)?></span> điểm để đổi tướng<br />
					<span class="text-red"><u>Gợi ý:</u> share Facebook để thêm lượt quay</span></li>
					<li class="vq-bxh">
						<a href="javascript:void(0);">
							<img src="<?=$styleUrl?>/images/vq_top.png" alt="Tam Quốc Thủ Thành" />
						</a>
					</li>
				</ul>
			</div>
		</div>


	</div>
</section>
 -->