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
?>
<section class="event-box">
  <div class="container">
	<div class="row">
	  <div class="col-sm-12">
		<div class="event-container">
		  <div class="event-box-title">
			<div class="title-img">
			  <img src="<?=$styleUrl?>/images/icon_card.png" alt="NẠP THẺ">
			</div>
			<div class="title-text">
			  <h2>NẠP THẺ</h2>
			</div>
		  </div>
		  <div class="event-box-content">
			<div class="card-box">
			  <?php if(!Yii::$app->user->isGuest){ ?>
			  <div class="card-info">
				Xin chào: <?=Yii::$app->user->identity->member_username?> [<a href="/logout" class="quit-button">thoát</a>]<br />
				Xu của bạn : <?php echo ($infoMember->member_xu >0) ? number_format($infoMember->member_xu) : 0?> Đổi xu<br />
				<a href="/thong-tin-tai-khoan">Thông tin tài khoản</a> 
			  </div>
			  <?php }else{ ?>
			  <div class="card-info">
				Xin chào: Khách!<br />
				Xu của bạn : <?php echo ($infoMember->member_xu >0) ? number_format($infoMember->member_xu) : 0?><br />
			  </div>
			  <?php } ?>
			  <div class="card-button">
				<ul>
					<li>
						<a href="javascript:void(0);">
							<img src="<?=$styleUrl?>/images/icon_xu.png" alt="Nạp Xu" />
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<img src="<?=$styleUrl?>/images/icon_dola.png" alt="Đổi Xu" />
						</a>
					</li>
				</ul>
			  </div>
			  <div class="card-tab-box">
				<div class="tab-box active">
				  <div class="card-brand">
					<ul>
					  <li class="active"><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/card01.png" alt="Viettel" /></a></li>
					  <li><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/card02.png" alt="Mobiphone" /></a></li>
					  <li><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/card03.png" alt="Vinaphone" /></a></li>
					  <li><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/card04.png" alt="Gate" /></a></li>
					  <li><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/card05.png" alt="Momo" /></a></li>
					  <li><a href="javascript:void(0);"><img src="<?=$styleUrl?>/images/card06.png" alt="Paypal" /></a></li>
					</ul>
				  </div>
				  <div class="card-title">
					<h3>ĐIỀN THÔNG TIN THẺ NẠP</h3>
				  </div>
				  <div class="card-rate">
					<div class="card-form">
					  <div class="tab active">
						<?php 
							if(!empty($dataPaymentViettel)){
						?>
						<form class="form-horizontal" id="f-nc-viettel">
						  <input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentViettel['payment_partner_code']?>'>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI NẠP</label>
							<div class="col-lg-6 col-sm-8">
								<select onchange="changeloainap('f-nc-viettel')" class="stlLoainap textinput form-control" id="stlLoainap">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
						  </div>
						  <div class="form-group two-col_sltserver">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MÁY CHỦ ĐỂ NẠP</label>
							<div class="col-lg-6 col-sm-8">
								<select id="sltserver" class="textinput form-control">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI THẺ</label>
							<div class="col-lg-6 col-sm-8">
								<select id="card_type" class="textinput form-control">
									<option value="<?=$dataPaymentViettel['code']?>">Viettel</option>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP SỐ SERI</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" class="form-control" id="card_seri" placeholder="Seri thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP MÃ THẺ</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" class="form-control" id="card_code" placeholder="Mã thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MỆNH GIÁ</label>
							<div class="col-lg-6 col-sm-8">
								<select id="card_amount" class="textinput form-control">
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
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-6 col-sm-6">
							  <button type="button" onclick="return validateFormTelcosPayment('f-nc-viettel')" class="btn btn-default">Nạp Ngay</button>
							</div>
						  </div>
						</form>
						<?php }else{ ?>
							<div style='text-align:center;font-weight:bold'> 
								Bảo trì nạp thẻ Viettel vui lòng quay lại sau 
							</div>
						<?php } ?>	
					  </div>
					  <div class="tab">
						<?php 
							if(!empty($dataPaymentMobi)){
						?>     
						<form class="form-horizontal" id="f-nc-mobiphone">
						 <input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentMobi['payment_partner_code']?>'>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI NẠP</label>
							<div class="col-lg-6 col-sm-8">
							  <select onchange="changeloainap('f-nc-mobiphone')" class="stlLoainap textinput form-control" id="stlLoainap">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
							  </select>
							</div>
						  </div>
						  <div class="form-group two-col_sltserver">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MÁY CHỦ ĐỂ NẠP</label>
							<div class="col-lg-6 col-sm-8">
							  <select id="sltserver" class="textinput form-control">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI THẺ</label>
							<div class="col-lg-6 col-sm-8">
								<select id="card_type" class="textinput form-control">
									<option value="<?=$dataPaymentMobi['code']?>">Mobiphone</option>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP SỐ SERI</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" id="card_seri" class="form-control" placeholder="Seri thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP MÃ THẺ</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" id="card_code" class="form-control" placeholder="Mã thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MỆNH GIÁ</label>
							<div class="col-lg-6 col-sm-8">
								<select id="card_amount" class="textinput form-control">
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
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-6 col-sm-6">
							  <button type="button" onclick="return validateFormTelcosPayment('f-nc-mobiphone')" class="btn btn-default">Nạp Ngay</button>
							</div>
						  </div>
						</form>
						<?php }else{ ?>
							<div style='text-align:center;font-weight:bold'> 
								Bảo trì nạp thẻ Mobiphone vui lòng quay lại sau 
							</div>
						<?php } ?>
					  </div>
					  <div class="tab">
						<?php 
							if(!empty($dataPaymentVina)){
						?>   
						<form class="form-horizontal" id="f-nc-vinaphone">
							<input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentVina['payment_partner_code']?>'>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI NẠP</label>
							<div class="col-lg-6 col-sm-8">
								<select onchange="changeloainap('f-nc-vinaphone')" id="stlLoainap" class="stlLoainap textinput form-control">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
						  </div>
						  <div class="form-group two-col_sltserver">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MÁY CHỦ ĐỂ NẠP</label>
							<div class="col-lg-6 col-sm-8">
								<select id="sltserver" class="textinput form-control">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI THẺ</label>
							<div class="col-lg-6 col-sm-8">
								<select id="card_type" class="textinput form-control">
									<option value="<?=$dataPaymentVina['code']?>">Vinaphone</option>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP SỐ SERI</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" class="form-control" id="card_seri" placeholder="Seri thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP MÃ THẺ</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" class="form-control" id="card_code" placeholder="Mã thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MỆNH GIÁ</label>
							<div class="col-lg-6 col-sm-8">
								<select id="card_amount" class="textinput form-control">
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
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-6 col-sm-6">
							  <button type="button" class="btn btn-default">Nạp Ngay</button>
							</div>
						  </div>
						</form>
						<?php }else{ ?>
							<div style='text-align:center;font-weight:bold'> 
								Bảo trì nạp thẻ Vinaphone vui lòng quay lại sau 
							</div>
						<?php } ?>
					  </div>
					  <div class="tab">
						<?php 
								if(!empty($dataPaymentGate)){
						 ?> 
						<form class="form-horizontal" id="f-nc-gate">
							<input type="hidden" id="payment_partner" class="textinput" value='<?=$dataPaymentGate['payment_partner_code']?>'>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">LOẠI NẠP</label>
							<div class="col-lg-6 col-sm-8">
								<select onchange="changeloainap('f-nc-gate')" id="stlLoainap" class="stlLoainap textinput form-control">
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp xu vào ví</option>
								</select>
							</div>
						  </div>
						  <div class="form-group two-col_sltserver">
							<label class="col-lg-6 col-sm-4 control-label">CHỌN MÁY CHỦ ĐỂ NẠP</label>
							<div class="col-lg-6 col-sm-8">
								<select class="form-control" id="sltserver" class="textinput form-control">
									<option value="0">Chọn máy chủ</option>
									<?php
									foreach($list_servers as $sv){
										?>
										<option value="<?php echo $sv->server_id?>">
											<?php echo $sv->server_name?>
										</option>
									<?php
									}
									?>
								</select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP SỐ SERI</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" id="serial" class="form-control" placeholder="Seri thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-lg-6 col-sm-4 control-label">NHẬP MÃ THẺ</label>
							<div class="col-lg-6 col-sm-8">
							  <input type="text" id="pin" class="form-control" placeholder="Mã thẻ">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-6 col-sm-6">
							  <button onclick="return validateFormVTPPaymentGate('f-nc-gate')" type="submit" class="btn btn-default">Nạp Ngay</button>
							</div>
						  </div>
						</form>
						<?php }else{ ?>
							<div style='text-align:center;font-weight:bold'> Bảo trì nạp thẻ Gate vui lòng quay lại sau </div>
						<?php } ?>
					  </div>
					  <div class="tab">
						<div class="momo-card">
						  <h4>HƯỚNG DẪN NẠP THẺ BẰNG MOMO</h4>
						  <p>
							BƯỚC 1: CHUYỂN KHOẢN VÀO VÍ MOMO THEO VÍ: <span>0934697738</span>.<br />
							NỘI DUNG CHUYỂN KHOẢN: THÔNG LINH SƯ - TÀI KHOẢN, SERVER ĐANG CHƠI.<br />
							BƯỚC 2: NHẮN FANPAGE ADMIN GAME <span><a target="_blank" href="https://www.facebook.com/thonglinhsu.H5/">FANPAGE THÔNG LINH SƯ</a></span>.
						  </p>
						</div>
					  </div>
					  <div class="tab">
						<div class="momo-card">
						  <h4>TOP UP BY PAYPAL AS BELOW</h4>
						  <p>
							<strong>STEP 1</strong>: SEND MONEY FOR PAYPAL ACCOUNT: <span>TRAMNGUYENVIET@GMAIL.COM</span>.<br />
							NỘI DUNG CHUYỂN KHOẢN: THÔNG LINH SƯ - TÀI KHOẢN, SERVER ĐANG CHƠI.<br />
							<strong>STEP 2</strong>: THEN, CHATTING WITH ME BY FACEBOOK ( MESSAGE )<br />
							RATE: 10 USD = 1300 Diamon , 50 USD = 6500 Diamon
							<table style="border:1px black solid" class="table table-bordered">
								<tbody>
									<tr>
										<td>1$  = 20,000</td>    <td>100</td>    <td>130</td>
									</tr>
									<tr>		
										<td>10$ = 200,000</td>    <td>1000</td>    <td>1300</td>
									</tr>
									<tr>		
										<td>50$ = 1,000,000</td>   <td> 5000</td>    <td>6500</td>
									</tr>
								</tbody>
							</table>	
						  </p>
						  <p>LINK <a target="_blank" href="https://www.facebook.com/thonglinhsu.H5/">FANPAGE THÔNG LINH SƯ</a></p>
						</div>
					  </div>
					</div>
					<div class="card-table">
					  <h3>Tỉ giá  quy đổi thẻ</h3>
					  <table class="table table-bordered">
						 <tbody>
							<tr>
							  <td>Mệnh Giá</td>
							  <td>Số Xu</td>
							  <td>Kim Cương</td>
							</tr>
							<tr>
							  <td>Momo  10.000 vnd</td>
							  <td>60</td>
							  <td>60</td>
							</tr>
							<tr>
							  <td>Ngân hàng  10.000 vnd</td>
							  <td>60</td>
							  <td>60</td>
							</tr>
							<tr>
								<td>10.000</td><td>50</td><td>50</td>
							</tr>
							<tr>
								<td>20.000</td><td>100</td><td>100</td>
							</tr>
							<tr>
								<td>50.000</td><td>250</td><td>250</td>
							</tr>
							<tr>
								<td>100.000</td><td>500</td><td>500</td>
							</tr>
							<tr>
								<td>200.000</td><td>1000</td><td>1000</td>
							</tr>
							<tr>
								<td>500.000</td><td>2500</td><td>2500</td>
							</tr>	
							<!--
							<tr>
							  <td colspan="2" class="text-center">Chỉ chấp nhận thẻ viettel từ 50k trở lên</td>
							  <td>&nbsp;</td>
							</tr>
							<tr>
							  <td colspan="2" class="text-center">Vina. Mobile chỉ chấp nhận thẻ 20k trở lên</td>
							  <td>&nbsp;</td>
							</tr>
							-->
						 </tbody>
					  </table>
					</div>
				  </div>
				</div>
				<div class="tab-box">
				  <div class="tab-box-dola">
					<h3>Lưu ý : Chuyển xu vào game ít nhất là 50 xu</h3>
					<div class="dola-form">
					  <form class="form-horizontal" id="f-nc-doixu">
						<div class="form-group">
						  <label for="xu" class="col-lg-6 col-sm-5 control-label">XU CỦA BẠN</label>
						  <div class="col-lg-6 col-sm-7">
							<input type="text" class="form-control" id="xu" readonly value="<?php echo ($infoMember->member_xu >0) ? number_format($infoMember->member_xu) : 0?>">
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-lg-6 col-sm-5 control-label">CHỌN MÁY CHỦ ĐỂ NẠP XU</label>
						  <div class="col-lg-6 col-sm-7">
							<select class="form-control" id="sltserver" class="textinput">
								<option value="0">Chọn máy chủ</option>
								<?php
								foreach($list_servers as $sv){
									?>
									<option value="<?php echo $sv->server_id?>">
										<?php echo $sv->server_name?>
									</option>
								<?php
								}
								?>
							</select>
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-lg-6 col-sm-5 control-label">GÓI NẠP</label>
						  <div class="col-lg-6 col-sm-7">
							<select class="form-control" id="sltloainap" onchange="changedoixu('f-nc-doixu')" class="textinput">
								<option selected value="1">Nạp vàng vào game</option>
							</select>
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-lg-6 col-sm-5 control-label">XU CẦN ĐỔI</label>
						  <div class="col-lg-6 col-sm-7">
							<select class="form-control" id="xucharge" name="xucharge"  class="textinput">
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
						</div>
						<div class="form-group">
						  <div class="col-sm-offset-6 col-sm-6">
							<button type="button" onclick="return validateDoixu('f-nc-doixu')" class="btn btn-default">Xác Nhận</button>
						  </div>
						</div>
					  </form>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>