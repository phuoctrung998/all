<?php
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= '/style/m_trangchu';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<section class="server-area">

			
			<div class="top-title">
				<?php if(!Yii::$app->user->isGuest){?>
					<input type="hidden" value="<?=Yii::$app->user->identity->member_username?>" id="txtMemberLoged">
						<div class="top-title">
						Chào đạo hữu: <span><?=Yii::$app->user->identity->member_username?></span> 
					</div>
				<?php }else{ ?>
					<div class="top-title">
						Chào đạo hữu!
					</div>
				<?php } ?>
			</div>
			
			<div class="card-container">
				<div class="card-content" id="card-content" style="display:block">
					<div class="inner choose-card-container" style="display: block;">
						<ul class="choose-card choose-memberinfo ">
							<li class="active">
								Thông tin tài khoản
							</li>
							<li class="">
								Đổi mật khẩu
							</li>
						</ul>
						<div class="content-tab-card">
							<div class="inner-child " style="">
								<form id="form-updateInfoUser">
								<div class="step">
									<div class="input-form">
										<label>TÀI KHOẢN</label>
										<input type="text" readonly  value="<?=Yii::$app->user->identity->member_username?>" placeholder="Nhập tên đăng nhập">
									</div>
									<div class="input-form">
										<label>HỌ TÊN</label>
										<input type="text" value="<?=Yii::$app->user->identity->member_fullname?>" id="member_fullname" placeholder="Họ và tên">
									</div>
									<div class="input-form">
										<label>SỐ ĐIỆN THOẠI</label>
										<input type="text" <?php if(Yii::$app->user->identity->member_phone){ echo 'readonly'; }?>  id="member_phone"  value="<?=Yii::$app->user->identity->member_phone?>" placeholder="Nhập số điện thoại">
									</div>
									<div class="btn-submit text-center">
										<button id="btn-updateInfoUser" class="" type="button">Cập nhật</button>
									</div>
								</div>
								</form>
							</div>
							<div id="nc-gate" class="inner-child" style="display: none;">
								<form id="form-updatepassworduser">
									
									<div class="input-form">
										<label>MẬT KHẨU MỚI</label>
										<input type="password" id="password" placeholder="Nhập mật khẩu mới">
									</div>
									<div class="input-form">
										<label>NHẬP LẠI MẬT KHẨU</label>
										<input type="password" id="repassword" placeholder="Nhập lại mật khẩu mới">
									</div>
									<div class="input-form">
										<label>MẬT KHẨU HIỆN TẠI</label>
										 <input type="password" id="oldpassword" placeholder="Nhập mật khẩu hiện tại">
									</div>
									<div class="btn-submit text-center">
										<button id="btn-updatePasswordUser" type="button">Cập nhật</button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
				<div class="doixu-content" id="doixu-content" style="display:none">
					<!-- content doi xu -->
					<div class="inner-child">
						<form action="" id="f-nc-doixu">

							<div class="input-form" id="slxu">
								<label>XU CỦA BẠN</label>
								<input type="text" class="textinput" value="20,100" readonly="" placeholder="20,100">
								<input type="hidden" id="memberxu" value="20100" class="textinput" placeholder="Xu cần đổi">
							</div>

							<div class="input-form">
								<label>CHỌN MÁY CHỦ</label>
								<select id="sltserver" class="textinput">
									<option value="0">Chọn máy chủ</option>
									<option value="20">
										Thiên Nam S20 </option>
									<option value="19">
										Thiên Nam S19 </option>
									<option value="18">
										Thiên Nam S18 </option>
									<option value="17">
										Thiên Nam S17 </option>
									<option value="16">
										Thiên Nam S16 </option>
									<option value="15">
										Thiên Nam S15 </option>
									<option value="14">
										Thiên Nam S14 </option>
									<option value="13">
										Thiên Nam S13 </option>
									<option value="12">
										Thiên Nam S12 </option>
									<option value="11">
										Thiên Nam S11 </option>
									<option value="10">
										Thiên Nam S10 </option>
									<option value="9">
										Thiên Nam S9 </option>
									<option value="8">
										Thiên Nam S8 </option>
									<option value="7">
										Thiên Nam S7 </option>
									<option value="6">
										Thiên Nam S6 </option>
									<option value="5">
										Thiên Nam S5 </option>
									<option value="4">
										Thiên Nam S4 </option>
									<option value="3">
										Thiên Nam S3 </option>
									<option value="2">
										Thiên Nam S2 </option>
									<option value="1">
										Thiên Nam S1 </option>
								</select>
							</div>

							<div class="input-form">
								<label>GÓI NẠP</label>
								<select id="sltloainap" onchange="changedoixu('f-nc-doixu')" class="textinput">
									<option value="0">Chọn gói nạp</option>
									<option value="1">Nạp vàng vào game</option>
									<option value="2">Nạp thẻ tháng</option>
									<option value="3">Nạp thẻ vĩnh viễn</option>
								</select>
							</div>

							<div class="input-form" id="slxu">
								<label>XU CẦN ĐỔI</label>
								<select id="xucharge" name="xucharge" class="textinput">
									<option value="0">Chọn số xu cần đổi</option>
									<option value="5000">5.000</option>
									<option value="10000">10.000</option>
									<option value="20000">20.000</option>
									<option value="50000">50.000</option>
									<option value="100000">100.000</option>
									<option value="200000">200.000</option>
									<option value="300000">300.000</option>
									<option value="500000">500.000</option>
									<option value="1000000">1.000.000</option>
									<option value="2000000">2.000.000</option>
									<option value="5000000">5.000.000</option>
									<option value="10000000">10.000.000</option>
								</select>
							</div>

							<div class="btn-submit text-center">
								<button type="button" onclick="return validateDoixu('f-nc-doixu')">NẠP THẺ</button>
							</div>
						</form>
					</div>
					<!-- end content doi xu -->
				</div>
			</div>		   
</section>