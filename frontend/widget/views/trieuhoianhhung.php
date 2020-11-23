<?php
use yii\helpers\Url;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/teaser';
?>
<div class="lxn">
	<div class="info">
		<?php 
		if(!Yii::$app->user->isGuest){
		?>
		Xin chào: <span style="color:red"><?=Yii::$app->user->identity->member_username?></span> <a href="javascript:;" class="teaser-logout">Thoát</a> <br />
		Sách triệu hồi hiện có: <span data-play='<?=$num_luotchoi?>' id="minigame-thah-luotchoi"><?=$num_luotchoi?></span> <br />
		<br/>
		<?php  }else{ ?>
		Xin chào <span style="color:red">Thông Linh Sư</span><br />
		Hãy <span style="color:red"><a class="mangaplay-pop-dkyn" href="javascript:;">đăng nhập</a></span> nhận lượt chơi<br/>
		<br/>
		<?php } ?>
	</div>
	<div class="th-game">
		<img src="<?=$styleUrl?>/images/thewhell.png" alt="TRIỆU HỒI">
		<img src="<?=$styleUrl?>/images/thewhell_hover.png" alt="TRIỆU HỒI">
	</div>
	<div class="th-result">
		<span class="th-result-success" style="display: none;">Bạn triệu hồi được anh hùng <span id="th-result-success-ah">xx</span>!</span>
		<span class="th-result-fail" style="display: none;">Ma pháp trận xảy ra biến cố, thuật triệu hồi thất bại!</span>
	</div>
	<div class="th-start">
		<a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/th_start.png" alt="TRIỆU HỒI" /></a>
	</div>
</div>