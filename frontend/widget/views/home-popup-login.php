<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/teaser';
$style 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
?>
<div class="pop-login">
	<div class="pop-login-close">
		<a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/close.png" alt="" /></a>
	</div>
	<ul class="login-menu">
		<li class="active"><a href="javascript:void(0);">ĐĂNG NHẬP</a></li>
		<li><a href="javascript:void(0);">ĐĂNG KÝ</a></li>
	</ul>
	<div class="login-box">
		<div class="tab active mangaplay-pop-login">
			<input type="text" name="username" id="username" placeholder="Tên đăng nhập" />
			<input type="password" name="password" id="password" placeholder="Mật khẩu" />
			<div class="login-submit btnDangnhap">
				<a href="javascript:;">				
					<img src="<?=$style?>/images/pop-btn-start.png" alt="" />
				
				</a>
			</div>
		</div>
		<div class="tab mangaplay-pop-register">
			<input type="text" 	name="username" id="username" class="username" placeholder="Tên đăng nhập" />
			<input type="password" name="password" id="password" class="password" placeholder="Mật khẩu" />
			<input type="password" name="repassword" id="repassword" class="repassword" placeholder="Nhập lại mật khẩu" />
			<div class="login-submit btnDangky">
				<a href="javascript:;">
					<img src="<?=$style?>/images/pop-btn-start.png" alt="" />
					
				</a>
			</div>
		</div>
	</div>
	<ul class="social">
		<li>Bạn có thể đăng nhập bằng:</li>
		<li>
			<a href="javascript:;" id="btnHomeDangnhapGG">
				<img src="<?=$style?>/images/gm.png" alt="" />
			</a>
		</li>
		<li><a href="javascript:;"  onClick="FBLogin();"><img src="<?=$style?>/images/fb.png" alt="" /></a></li>
	</ul>
</div>