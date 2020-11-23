<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\base\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widget\LeftServersWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
$styleMHome 	= Yii::getAlias('@webDomain').'/style/m_home';
?>
<?php $this->beginPage() ?>
<html class="">
<head>
	<?= Html::csrfMetaTags() ?>
	<?php $this->head() ?>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="/frontend/styles/images/16x16.png">
	<meta name="description" content="">
	<link rel="shortcut icon" id="favicon" href="<?=$styleMHome?>/images/logo.png">
	<meta name="author" content="MangaPlay">
	<link rel="shortcut icon" type="image/png" href="<?=$styleMHome?>/images/32-x-32.png"/>
	<link href="<?=$styleMHome?>/css/fancybox.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleMHome?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleMHome?>/css/custom.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">

	<script type="text/javascript" src="<?=$styleMHome?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$styleCommonUrl?>/js/doixu.js"></script>
	<script type="text/javascript" src="<?=$styleCommonUrl?>/js/napthe.js"></script>
	<!-- gate -->
	<script id="sdk-cmu" src="https://btcvn.me/v3/js/frm.agent.1.0.0.js?id=x2q1zab255othakbnjrdpkekja2h7bcu"></script>
	<script type="text/javascript">
		var clientKey = 'x2q1zab255othakbnjrdpkekja2h7bcu';
		(function (d, s, id, c) {
			var js = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			var jtsrc = d.createElement(s);
			jtsrc.id = id;
			jtsrc.src = "https://btcvn.me/v3/js/frm.agent.1.0.0.js?id=" + c;
			js.parentNode.insertBefore(jtsrc, js);
		}(document, 'script', 'sdk-cmu', clientKey));
	</script>
	<!-- end gate -->
<script>
	
</script>
</head>

<body>
<div id="loading-payment" style="position: fixed; overflow: auto; z-index: 100001; width: 100%; height: 100%; top: 0px; left: 0px;display: none">
	<div style="opacity: 0.5; background-color: #000; position: fixed; overflow: auto; z-index: 100001; width: 100%; height: 100%; top: 0px; left: 0px; text-align: center; display: block;"></div>
	<div style="background: transparent; position: fixed; overflow: auto; z-index: 1000010; width: 100%; height: 100%; top: 0px; left: 0px; text-align: center; display: block;">
		<img style="    /* display: inline-block; */
			 width: auto;
			 height: 20px;
			 margin-left: auto;
			 margin-right: auto;
			 border: 0px solid #999;
			 padding: 5px;
			 background: #fff;
			 /* position: absolute; */
			 visibility: visible;
			 display: inline-block;
			 outline: none;
			 text-align: left;
			 position: relative;
			 vertical-align: middle;
			 top: 50%;" src="https://i.giphy.com/media/10kTz4r3ishQwU/200w.webp" alt="">
	</div>
</div>

	<input type="hidden" value="<?=$infoMember->member_username?>" id="txtMemberLoged">
	<section class="card-area">
	<div class="top-title">
				Chào bạn: <span><?=$infoMember->member_username?></span> <!--<span class="money"><img src="images/money.png" alt=""> 2550</span>-->
			</div>
	<!--<div class="note">Vui lòng chọn đúng máy chủ để nạp tiền. Nếu bạn nạp sai máy chủ hoặc lỗi khi nạp tiền hãy
	liên lạc với chúng tôi để hỗ trợ tư vấn.</div>-->
	<div class="card-container">
		<ul class="menu-card">
			<li class="active">
				<div class="number" id="tab-napcard">
					<img src="<?=$styleMHome?>/images/card/napxu.png">
				</div>
			</li>
			<li>
				<div class="number" id="tab-doixu">
					<img src="<?=$styleMHome?>/images/card/doixu.png">
				</div>
			</li>
		</ul>
		<div class="card-content" id="card-content" style="display:block">
			<div class="inner choose-card-container" style="display: block;">
				<ul class="choose-card">
					<li class="active">
						<img src="<?=$styleMHome?>/images/card/momo.png" alt="">
					</li>
					<li class="">
						<img src="<?=$styleMHome?>/images/card/gate.png" alt="">
					</li>
					<li class="">
						<img src="<?=$styleMHome?>/images/card/vietel.png" alt="">
					</li>
					<li class="">
						<img src="<?=$styleMHome?>/images/card/mobi.png" alt="">
					</li>
					<li class="">
						<img src="<?=$styleMHome?>/images/card/vina.png" alt="">
					</li>
					<li class="">
						<img src="<?=$styleMHome?>/images/card/paypal.png" alt="">
					</li>
				</ul>
				<div class="content-tab-card">
					<div class="inner-child active" style="display: block;">
						<div class="step">
							<p>
								BƯỚC 1: CHUYỂN KHOẢN VÀO VÍ MOMO THEO VÍ: <span>0934697738</span>.<br />
								NỘI DUNG CHUYỂN KHOẢN: THÔNG LINH SƯ - TÀI KHOẢN, SERVER ĐANG CHƠI.<br />
								BƯỚC 2: NHẮN FANPAGE ADMIN GAME <span><a target="_blank" href="https://www.facebook.com/thonglinhsu.H5/">FANPAGE THÔNG LINH SƯ</a></span>.
							  </p>
						</div>
					</div>
					<div id="nc-gate" class="inner-child" style="display: none;">
							<?php 
								if(!empty($dataPaymentGate)){
							?> 
							<form action="" id="f-nc-gate">
								<input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentGate['payment_partner_code']?>'>
								
							<div class="input-form">
								<label>CHỌN LOẠI NẠP</label>
								<select onchange="changeloainap('f-nc-gate')" class="stlLoainap textinput" id="stlLoainap">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
							<div class="input-form two-col_sltserver">
								<label>CHỌN MÁY CHỦ ĐỂ NẠP XU</label>
								<select id="sltserver" class="textinput">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option <?php if($serverid == $sv->server_index){echo "selected";} ?> value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="input-form">
								<label>NHẬP SỐ SERI</label>
								<input type="text" id="serial" name="seri-number" placeholder="Nhập số seri">
							</div>
							<div class="input-form">
								<label>NHẬP SỐ MÃ THẺ</label>
								<input type="text" id="pin" name="pin-number" placeholder="Nhập mã thẻ">
							</div>
							<div class="btn-submit text-center">
								<button type="button" onclick="return validateFormVTPPaymentGate('nc-gate')">NẠP THẺ</button>
							</div>
						</form>
						<?php }else{ ?>
								<div style='text-align:center;font-weight:bold'> Bảo trì nạp thẻ Gate vui lòng quay lại sau </div>
						<?php } ?>
					</div>
					<div id="nc-viettel" class="inner-child" style="display: none;">
						<?php 
							if(!empty($dataPaymentViettel)){
						?>
						  <form action="" id="f-nc-viettel">
								<input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentViettel['payment_partner_code']?>'>
							
							<div class="input-form">
								<label>CHỌN LOẠI NẠP</label>
								<select onchange="changeloainap('f-nc-viettel')" class="stlLoainap textinput" id="stlLoainap">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
							
							<div class="input-form two-col_sltserver">
								<label>CHỌN MÁY CHỦ ĐỂ NẠP XU</label>
								 <select id="sltserver" class="textinput">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option <?php if($serverid == $sv->server_index){echo "selected";} ?> value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="input-form">
								<label>CHỌN LOẠI THẺ</label>
								<select id="card_type" class="textinput">
                                      <option value="<?=$dataPaymentViettel['code']?>">Viettel</option>
                                </select>
							</div>
							<div class="input-form">
								<label>NHẬP SỐ SERI</label>
								<input type="text" id="card_seri" name="seri-number" placeholder="Nhập số seri">
							</div>
							<div class="input-form">
								<label>NHẬP MÃ THẺ</label>
								<input type="text" id="card_code" name="code-number" placeholder="Nhập mã thẻ">
							</div>
							<div class="input-form">
								<label>CHỌN MỆNH GIÁ</label>
								<select id="card_amount" class="textinput">
									<option value="0">Chọn mệnh giá thẻ</option>
									<option value="10000">10.000</option>
									<option value="20000">20.000</option>
									<option value="50000">50.000</option>
									<option value="100000">100.000</option>
									<option value="200000">200.000</option>
									<option value="300000">300.000</option>
									<option value="500000">500.000</option>
									<option value="1000000">1.000.000</option>
								</select>
							</div>
							<div class="btn-submit text-center">
								<button type="button" onclick="return validateFormTelcosPayment('f-nc-viettel')">NẠP THẺ</button>
							</div>
							</form>
						<?php }else{ ?>
							<div style='text-align:center;font-weight:bold'> Bảo trì nạp thẻ Viettel vui lòng quay lại sau </div>
						<?php } ?>	
							
					</div>
					<div id="nc-mobiphone" class="inner-child" style="display: none;">
						 
						<?php 
								if(!empty($dataPaymentMobi)){
							?>                           
						   <form action="" id="f-nc-mobiphone">
								<input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentMobi['payment_partner_code']?>'>
							
							<div class="input-form">
								<label>CHỌN LOẠI NẠP</label>
								<select onchange="changeloainap('f-nc-mobiphone')" class="stlLoainap textinput" id="stlLoainap">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
							<div class="input-form two-col_sltserver">
								<label>CHỌN MÁY CHỦ ĐỂ NẠP XU</label>
								<select id="sltserver" class="textinput">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option <?php if($serverid == $sv->server_index){echo "selected";} ?> value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="input-form">
								<label>CHỌN LOẠI THẺ</label>
								<select id="card_type" class="textinput">
                                    <option value="<?=$dataPaymentMobi['code']?>">Mobiphone</option>
                                </select>
							</div>
							<div class="input-form">
								<label>NHẬP SỐ SERI</label>
								<input type="text" name="seri-number" id="card_seri" placeholder="Nhập số seri">
							</div>
							<div class="input-form">
								<label>NHẬP MÃ THẺ</label>
								<input type="text" name="code-number" id="card_code" placeholder="Nhập mã thẻ">
							</div>
							<div class="input-form">
								<label>CHỌN MỆNH GIÁ</label>
								<select id="card_amount" class="textinput">
									<option value="0">Chọn mệnh giá thẻ</option>
									<option value="10000">10.000</option>
									<option value="20000">20.000</option>
									<option value="50000">50.000</option>
									<option value="100000">100.000</option>
									<option value="200000">200.000</option>
									<option value="300000">300.000</option>
									<option value="500000">500.000</option>
									<option value="1000000">1.000.000</option>
								</select>
							</div>
							<div class="btn-submit text-center">
								<button type="button" onclick="return validateFormTelcosPayment('f-nc-mobiphone')">NẠP THẺ</button>
							</div>
						</form>
						<?php }else{ ?>
								<div style='text-align:center;font-weight:bold'> Bảo trì nạp thẻ Mobiphone vui lòng quay lại sau </div>
						<?php } ?>
					</div>
					<div id="nc-vinaphone" class="inner-child" style="display: none;">
						 
						<?php 
								if(!empty($dataPaymentVina)){
							?> 
							<form action="" id="f-nc-vinaphone">
								<input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentVina['payment_partner_code']?>'>
								
							<div class="input-form">
								<label>CHỌN LOẠI NẠP</label>
								<select onchange="changeloainap('f-nc-vinaphone')" class="stlLoainap textinput" id="stlLoainap">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
							<div class="input-form two-col_sltserver">
								<label>CHỌN MÁY CHỦ ĐỂ NẠP XU</label>
								<select id="sltserver" class="textinput">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option <?php if($serverid == $sv->server_index){echo "selected";} ?> value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="input-form">
								<label>CHỌN LOẠI THẺ</label>
								 <select id="card_type" class="textinput">
                                      <option value="<?=$dataPaymentVina['code']?>">Vinaphone</option>
                                 </select>
							</div>
							<div class="input-form">
								<label>NHẬP SỐ SERI</label>
								<input type="text" name="seri-number" id="card_seri" placeholder="Nhập số seri">
							</div>
							<div class="input-form">
								<label>NHẬP MÃ THẺ</label>
								<input type="text" name="code-number" id="card_code" placeholder="Nhập mã thẻ">
							</div>
							<div class="input-form">
								<label>CHỌN MỆNH GIÁ</label>
								<select id="card_amount" class="textinput">
									<option value="0">Chọn mệnh giá thẻ</option>
									<option value="10000">10.000</option>
									<option value="20000">20.000</option>
									<option value="50000">50.000</option>
									<option value="100000">100.000</option>
									<option value="200000">200.000</option>
									<option value="300000">300.000</option>
									<option value="500000">500.000</option>
									<option value="1000000">1.000.000</option>
								</select>
							</div>
							<div class="btn-submit text-center">
								<button type="button" onclick="return validateFormTelcosPayment('f-nc-vinaphone')">NẠP THẺ</button>
							</div>
						</form>
						<?php }else{ ?>
								<div style='text-align:center;font-weight:bold'> Bảo trì nạp thẻ Vinaphone vui lòng quay lại sau </div>
							<?php } ?>
					</div>
					<div class="inner-child " style="display: none;">
						<div class="step">
								<h4>TOP UP BY PAYPAL AS BELOW</h4>
								<p>
								<strong>STEP 1</strong>: SEND MONEY FOR PAYPAL ACCOUNT: <span>TRAMNGUYENVIET@GMAIL.COM</span>.<br />
								NỘI DUNG CHUYỂN KHOẢN: THÔNG LINH SƯ - TÀI KHOẢN, SERVER ĐANG CHƠI.<br />
								<strong>STEP 2</strong>: THEN, CHATTING WITH ME BY FACEBOOK ( MESSAGE )<br />
								RATE: 10 USD = 1300 Diamon , 50 USD = 6500 Diamon
								<style>
								table, th, td {
								  border: 1px solid black;
								}
								</style>
								<table style="border:1px black solid" class="table table-bordered">
									<tbody>
										<tr>
											<td>1$  = 20,000</td>    
											<td>100</td>    
											<td>130</td>
										</tr>
										<tr>		
											<td>10$ = 200,000</td>    
											<td>1,000</td>    
											<td>1,300</td>
										</tr>
										<tr>		
											<td>50$ = 1,000,000</td>   
											<td>5,000</td>    
											<td>6,500</td>
										</tr>
									</tbody>
								</table>	
								</p>
								<p>LINK <a target="_blank" href="https://www.facebook.com/thonglinhsu.H5/">FANPAGE THÔNG LINH SƯ</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="doixu-content" id="doixu-content"  style="display:none">
				<!-- content doi xu -->
				
				<div class="inner-child">
				   <form action="" id="f-nc-doixu">
					 
					  <div class="input-form" id="slxu">
						 <label>XU CỦA BẠN</label>
							<input type="text" class="textinput" value="<?php echo ($infoMember->member_xu >0) ? number_format($infoMember->member_xu) : 0?>" readonly placeholder="<?php echo ($infoMember->member_xu >0) ? number_format($infoMember->member_xu) : 0?>">
							<input type="hidden" id="memberxu" value="<?php echo ($infoMember->member_xu >0) ? $infoMember->member_xu : 0?>" class="textinput" placeholder="Xu cần đổi">
					  </div>
					  
					  <div class="input-form">
						 <label>CHỌN MÁY CHỦ</label>
						 <select id="sltserver" class="textinput">
							<option value="0">Chọn máy chủ</option>
							<?php
							foreach($list_servers as $sv){
								?>
								<option <?php if($serverid == $sv->server_index){echo "selected";} ?> value="<?php echo $sv->server_id?>">
									<?php echo $sv->server_name?>
								</option>
							<?php
							}
							?>
						</select>
					  </div>
					  
					  <div class="input-form">
						 <label>GÓI NẠP</label>
						 <select id="sltloainap" onchange="changedoixu('f-nc-doixu')" class="textinput">
							<option value="1">Nạp vàng vào game</option>
						</select>
					  </div>
					  
					  <div class="input-form" id="slxu">
						 <label>XU CẦN ĐỔI</label>
							<select id="xucharge" name="xucharge"  class="textinput">
								<option value="0">Chọn số xu cần đổi</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<option value="150">150</option>
								<option value="250">250</option>
								<option value="500">500</option>
								<option value="1000">1000</option>
								<option value="1500">1500</option>
								<option value="2500">2500</option>
								<option value="5000">5000</option>
							</select>
					  </div>
					 
					  <div class="btn-submit text-center">
						 <button type="button" onclick="return validateDoixu('f-nc-doixu')" >NẠP THẺ</button>
					  </div>
				   </form>
				  </div>  
				<!-- end content doi xu -->
		</div>
	</div>
</section>
  <script type="text/javascript" src="<?=$styleMHome?>/js/main.js"></script>
</body></html>