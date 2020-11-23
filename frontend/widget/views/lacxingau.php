<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/teaser';
?>
<div class="lxn">
	<div class="info">
		<?php 
		if(!Yii::$app->user->isGuest){
		?>
		Xin chào: <span style="color:red"><?=Yii::$app->user->identity->member_username?></span> <a href="javascript:;" class="teaser-logout">Thoát</a><br />
		Tổng lượt lắc xí ngầu : <span data-play='<?=$num_luotchoi?>' id="minigame-lac-luotchoi"><?=$num_luotchoi?></span> lượt<br />
		Thêm lượt : <div style="display:inline"><a class="minigame-share-fb" href="javascript:;" ><img style="height: 23px;margin-bottom: 2px;" src="<?=$styleUrl?>/images/share_fb.png"></a></div>
		<?php  }else{ ?>
		Xin chào <span style="color:red">Thông Linh Sư</span><br />
		Hãy <span style="color:red"><a class="mangaplay-pop-dkyn" href="javascript:;">đăng nhập</a></span> nhận lượt chơi<br/>
		Thêm lượt : <div style="display:inline"><a class="minigame-share-fb" href="javascript:;" ><img style="height: 23px;margin-bottom: 2px;" src="<?=$styleUrl?>/images/share_fb.png"></a></div>
		
		<?php } ?>
	</div>
	<div class="tx-ct">
		<p>
			<input type="radio" id="test1" value="tai" name="minigame-radio" checked>
			<label for="test1"><img src="<?=$styleUrl?>/images/tai.png" alt="TÀI" /></label>
		</p>
		<p>
			<input type="radio" id="test2" value="xiu" name="minigame-radio">
			<label for="test2"><img src="<?=$styleUrl?>/images/xiu.png" alt="Xỉu" /></label>
		</p>
	</div>
	<div class="lxn-help">
		<a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/help.png" alt="HƯỚNG DẪN" /></a>
	</div>
	<div class="lxn-game">
		<div class="lxn-top">
			<img src="<?=$styleUrl?>/images/dice.png" alt="LẮC XÌ NGẦU">
			<div class="lxn-result">
				<img class="active" src="<?=$styleUrl?>/images/1.png" alt="LẮC XÌ NGẦU">
				<img src="<?=$styleUrl?>/images/2.png" alt="LẮC XÌ NGẦU">
				<img src="<?=$styleUrl?>/images/3.png" alt="LẮC XÌ NGẦU">
				<img src="<?=$styleUrl?>/images/4.png" alt="LẮC XÌ NGẦU">
				<img src="<?=$styleUrl?>/images/5.png" alt="LẮC XÌ NGẦU">
				<img src="<?=$styleUrl?>/images/6.png" alt="LẮC XÌ NGẦU">
			</div>
		</div>
	</div>
	<div class="lxn-start">
		<a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/lxn_start.png" alt="LẮC XÌ NGẦU" /></a>
	</div>
</div>