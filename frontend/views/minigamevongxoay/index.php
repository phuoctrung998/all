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
use frontend\widget\LacxingauWidget;
use frontend\widget\TeaserPopupLoginWidget;
use frontend\widget\TrieuHoiAnhHungWidget;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/vongxoay';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Game Thông Linh Sư</title>
	<meta name="title" content="Chuẩn 100% Game ANIME NHẬT BẢN" />
	<meta name="description" content="Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!" />
	<meta property="fb:app_id"  content="347423116197650" /> 
	<meta property="og:title" content="Chuẩn 100% Game ANIME NHẬT BẢN" />
	<meta property="og:description" content="Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!" />
	<meta property="og:image" content="<?=$styleUrl?>/images/sharefb.jpg"/>
	<link rel="shortcut icon" id="favicon" href="<?=$styleUrl?>/images/logo.png">
	<meta name="author" content="MangaPlay">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link href="<?=$styleUrl?>/assets/css/animate.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleUrl?>/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleUrl?>/assets/css/keyframes.css" rel="stylesheet" type="text/css"
	<link href="<?=$styleUrl?>/assets/css/slick.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleUrl?>/assets/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="google-signin-client_id" content="396007536042-b0flp68msb2ockudj7rojld4cvci2hju.apps.googleusercontent.com">
	<script>
	window.fbAsyncInit = function() {
	  //FB JavaScript SDK configuration and setup
	  FB.init({
		appId      : '347423116197650', // FB App ID
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true,  // parse XFBML
		version    : 'v3.3' // use graph api version 2.8
	  });
	};
	</script>
	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '928732427468850');
	  fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	  src="https://www.facebook.com/tr?id=928732427468850&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143308424-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-143308424-2');
	</script>
</head>
<body>
	<?php 
	$loginFlag = (Yii::$app->user->isGuest) ? 0 : 1;
	?>	
	<input type="hidden" id="loginFlag" value="<?=$loginFlag?>">
	<?php if(Yii::$app->user->isGuest){ ?>
	<input type="hidden" id="minigameUrlShare" value="<?=$baseUrl?>/teaser">
	<?php }else{?>
	<input type="hidden" id="minigameUrlShare" value="<?=$baseUrl?>/teaser?uid=<?=Yii::$app->user->identity->member_id?>">
	<?php }?>
	
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
	<div id="hidpopup"></div>
	
    <div class="mask"></div>
	<!-- <div class="vongxoay-img" id="vongxoaytichdiem">
        <img style="transform: rotate(-17deg);" src="vongquay.png" alt="" id="img_quay">
        <a href="javascript: void(0)" onclick="quay();" class="nut-vongquay"><img src="nut-vongquay.png"></a>
	</div> -->
	<!-- <p id="ketqua"></p> -->
    <main>
        <section class="block-content">
            <nav>
                <ul>
					<li class='text-home'><a href='https://thonglinhsuh5.com/'>Trang Chủ</a></li>
					<li class='icon-home'><a href='https://thonglinhsuh5.com/'><i class="fas fa-home"></i></a></li>
                    <li class='btn-popup-thele'><a href='javascript:void(0)'>Thể Lệ</a></li>
                    <li class='btn-popup-bxh'><a href='javascript:void(0)'>BXH</a></li>
					<li class='btn-popup-doiqua'><a href='javascript:void(0)'>Đổi Quà</a></li>
					<li class='btn-popup-login'><a href='javascript:void(0)'>Đăng nhập</a></li>
                </ul>
            </nav>
            <div class="logo wow fadeInUp"><img src="<?=$styleUrl?>/assets/images/LOGO.png"></div>
            <div class="title wow zoomIn"><img src="<?=$styleUrl?>/assets/images/title.png"></div>
            <div class='main-content'>
					<div class="nhanvat01 wow bounceInLeft"><img src="<?=$styleUrl?>/assets/images/nv1.png"></div>
					<div class="vongxoay-img" id="vongxoaytichdiem">
						<img src="<?=$styleUrl?>/assets/images/vongquay.png"> 
						<img src="<?=$styleUrl?>/assets/images/vongquay2.png" alt="" id="img_quay"> 
						<a href="javascript: void(0)" onclick="quay();" class="nut-vongquay">
							<img src="<?=$styleUrl?>/assets/images/btn-quay.png">
						</a>
						<img src="<?=$styleUrl?>/assets/images/star.png" class='star1'>
						<img src="<?=$styleUrl?>/assets/images/star2.png" class='star2'>
					</div>
					<div class="nhanvat02 wow bounceInRight"><img src="<?=$styleUrl?>/assets/images/nv2.png"></div>
					<div class='button-luotquay'>
						<p>Chào Mừng: ngorung16</p>
						<ul>
							<li class='button-01'><a href='javascript:void(0)'>Số lần quay: 3</a></li>
							<li class='button-02'><a href='javascript:void(0)'>Số lần quay: 3</a></li>
						</ul>
					</div>
					<div class='img-duck'>
						<div><img src="<?=$styleUrl?>/assets/images/duck3.png"></div>
						<div><img src="<?=$styleUrl?>/assets/images/duck1.png"></div>
					</div>
					
            </div>
        </section>
    </main>
	<!-- Begin: Popup -->
	
	<div class="popup">
		<?=TeaserPopupLoginWidget::widget()?>
		<!-- begin: popup ket qua -->
		<div class='popup-ketqua'>
			<div  class='bg-ketqua'>
				<span id="ketqua"></span>
				<div class="close-kq"></div>
			</div>
		</div>
		<!-- end: popup ket qua -->
		<!-- begin: popup the le -->
		<div class="popup-thele">
			<div class="bg">
				<div class="close"><img src="<?=$styleUrl?>/assets/images/close.png"></div>
				<div class="desc">
					<h3>What is Lorem Ipsum?</h3><br>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					<br><br>
					<h3>Why do we use it?</h3><br>
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
					<br><br>
					<h3>Where does it come from?</h3><br>
					Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.<br><br>
					The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
					<br><br>
					<h3>Where can I get some?</h3><br>
					There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
				</div>
			</div>
		</div>
		<!-- end: popup the le -->
		<!-- begin: popup bxh -->
		<div class="popup-bxh">
			<div class="bg">
				<div class="close"><img src="<?=$styleUrl?>/assets/images/close.png"></div>
				<div class="desc">
						<p>Xin Chào: ngorung16</p>
						<p>Tổng số điểm Vòng quay Phượng Hoàng: 1024</p>
						<div class='popup-title'><img src='<?=$styleUrl?>/assets/images/bxh.png'></div>
						<div class='desc row mt-4'>
							<div class='col-6'>
								<h3><img src='<?=$styleUrl?>/assets/images/textbxh.png'></h3>
								<div class="img-tongdiem mt-4"><img src="<?=$styleUrl?>/assets/images/tongdiem.png"></div>
								<table class="">
									<tr>
										<td>01</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>02</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>03</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>04</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>05</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>06</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>07</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>08</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>09</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
									<tr>
										<td>10</td>
										<td>Thỏ Bảy Màu</td>
										<td>1200</td>
									</tr>
								</table>
							</div>
							<div class='lace m-3'><img src="<?=$styleUrl?>/assets/images/lace.png"></div>
							<div class='col-6'>
									<h3><img src='<?=$styleUrl?>/assets/images/textbxh.png'></h3>
									<div class="img-tongdiem mt-4"><img src="<?=$styleUrl?>/assets/images/tongdiem.png"></div>
									<table class="">
										<tr>
											<td>01</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>02</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>03</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>04</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>05</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>06</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>07</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>08</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>09</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
										<tr>
											<td>10</td>
											<td>Thỏ Bảy Màu</td>
											<td>1200</td>
										</tr>
									</table>
							</div>
						</div>
				</div>
			</div>
		</div>
		<!-- end: popup bxh -->
		<!-- begin: popup doi qua -->
		<div class="popup-doiqua">
			<div class="bg">
				<div class="close"><img src="<?=$styleUrl?>/assets/images/close.png"></div>
				<div class="desc">
						<p>Xin Chào: ngorung16</p>
						<p>Tổng số điểm Vòng quay Phượng Hoàng: 1024</p>
						<div class='popup-title'><img src='<?=$styleUrl?>/assets/images/doiqua.png'></div>
						<div class='content row'>
							<ul>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/socap.png">
									<div class='btn-doicode btn-popup-giftcode'><a href='javascript:void(0)'>Đổi code</a></div>
								</a></li>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/trungcap.png">
									<div class='btn-doicode btn-popup-giftcode'><a href='javascript:void(0)'>Đổi code</a></div>
								</a></li>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/caocap.png">
									<div class='btn-doicode btn-popup-giftcode'><a href='javascript:void(0)'>Đổi code</a></div>
								</a></li>
								<li><a href='javascript:void(0)'>
									<img src="<?=$styleUrl?>/assets/images/sieucap.png">
									<div class='btn-doicode btn-popup-giftcode'><a href='javascript:void(0)'>Đổi code</a></div>
								</a></li>
							</ul>
						</div>
				</div>
			</div>
		</div>
		<!-- end popup doi qua -->
		<!-- begin: popup gift code -->
		<div class="popup-giftcode">
			<div class='bg-giftcode'>
				<input value="KENHTHONGLINHSU">
				<button><span><img src="<?=$styleUrl?>/assets/images/coppy.png"></span></button>
				<div class='close-giftcode'></div>
			</div>
		</div>
		<!-- end: popup gift code -->
		<!-- begin: popup chua dang ky -->
		<div class='popup-warning'>
			<div class='bg-warning'>
				<p>Bạn chưa <span>đăng nhập</span>!</p>
				<div class='close-warning'><img src="<?=$styleUrl?>/assets/images/close.png"></div>
			</div>
		</div>
		<!-- end: popup chua dang ky -->
		
	</div>
	
	<script type="text/javascript" src="<?=$styleUrl?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/all.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/slick.min.js" ></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/tilt.jquery.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?=$styleUrl?>/assets/js/custom.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/main.js"></script>
	<script src="https://apis.google.com/js/api:client.js"></script>
	<!-- End: Popup -->
   	<script type="text/javascript">
   		var hieu_ung = {
			'el': '#img_quay',
			'stop_point': null,
			'interval_id': null,
			'stop_index': {
				1:[0],//Cong 2 diem
				2:[45], // Cong 1 diem
				3:[90],  //Phuong hoang
				4:[135], //Cong 2 diem
				5:[180],  //Cong 5 diem
				6:[225], //Cong 1 diem
				7:[270], //Phuong hoang
				8:[315] //Them luot
			}, 
			'rotate_count': 5,
			'old_point' : {
				'check' : false,
				'value_old' : null,
				'value_new' : null
			},
			'play': function()
			{
				if (!this.stop_point)
					return;
				
				if(this.old_point.value_old == null){
					this.old_point.value_old = this.old_point.value_new;
				}
				
				$(this).css('-webkit-transform', 'rotate('+this.old_point.value_old+'deg)');
				$(this).css('-moz-transform', 'rotate('+this.old_point.value_old+'deg)');
				$(this).css('transform', 'rotate('+this.old_point.value_old+'deg)');
				//console.log('Giá trị v_old : ' + this.old_point.value_old);

				var v_old = this.old_point.value_old ;
				var v_stop = this.stop_point;
				var element = this.el;
				var v_this = this;

					$(this.el).animate({  transform: v_stop }, {
					    step: function(now,fx) {
							fx.start = v_old;
							if(now >= v_old){
								$(this).css('-webkit-transform','rotate('+now+'deg)'); 
								$(this).css('-moz-transform','rotate('+now+'deg)');
								$(this).css('transform','rotate('+now+'deg)');
							}
					    },
					    duration: 5000
					}, 'ease-out'
					);
				//},0)
				
			},
			'stop': function ()
			{
				$(this.el).stop();
			},
			'setStopPoint': function(params)
			{
				if(this.stop_point != null){
					this.old_point.check = true;
				}
				var arr_point = this.stop_index[params.coupon_id];

				// Biến tác động quay đến ô nào
				var valueArrPoint = arr_point[Math.floor(Math.random() * arr_point.length)];

				console.log('Giá trị tọa độ : ' + valueArrPoint);

				this.stop_point = this.rotate_count*360 + valueArrPoint;

				if(this.old_point.check){
					this.old_point.value_old = this.old_point.value_new;
					this.old_point.value_new = valueArrPoint;

				}else{
					this.old_point.value_old = 0;
					this.old_point.value_new = valueArrPoint;
				} 
			}
		};
   	</script>
	<script type="text/javascript">
   		function random(){
				var random = Math.floor(Math.random() * 100) + 1;
				var name = 0;
				if(random <= 5){
					name = 1;
				}
				else if(random > 5 && random <= 6){
					name = 2;
				}
				else if(random > 10 && random <= 12){
					name = 3;
				}
				else if(random > 12 && random <= 30){
					name = 4;
				}
				else if(random > 30 && random <= 40){
					name = 5;
				}
				else if(random > 40 && random <= 60){
					name = 6;
				}
				else if(random > 60 && random <=80){
					name = 7;
				}
				else if(random > 80 && random <= 100){
					name = 8;
				}
				return name;
		};
        var isBusying = false;
        function quay() {
            if (!isBusying) {
                //$('#img_quay').addClass('unlimit');
                isBusying = true;
                var response = {
					"Successfully": true,
					"Status": null,
					"GiftPart": {
						"Id": 0,
						"Point": 45,
						// Trả về giá trị random từ 1 tới 10
						// "Name": Math.floor(Math.random() * 10) + 1, 
						// Trả về giá trị cố định (ở đây đang set trả về giá trị thứ 5)
 						"Name": random(),
						"Label": "45",
						"Frequency": 0,
						"CampaignId": null
				  	},
				  	"TotalPoint": 0
				}
                setTimeout(function(){
                	if(1 == 1){ 
                		if (response.Successfully) {
                            hieu_ung.setStopPoint({ 'coupon_id': response.GiftPart.Name });
                            //$('#img_quay').removeClass('unlimit');
                            $('#ketqua').html('.');
                            hieu_ung.play();
                            //setTimeout(function () { alert("Chúc mừng bạn đã được tích " + response.Data.Name + " điểm vào tài khoản."); isBusying = false; }, 9000);
                            setTimeout(function () {
                                isBusying = false;
								var messageResult = 'Bạn nhận được ';
                                switch(response.GiftPart.Name){
                                	case 1:
                                		messageResult = messageResult + 'Cộng 2 Điểm';
                                		break;
                                	case 2:
                                		messageResult = messageResult + 'Thêm Lượt';
                                		break;
                                	case 3:
                                		messageResult = messageResult + 'Phượng Hoàng';
                                		break;
                                	case 4:
                                		messageResult = messageResult + 'Cộng 1 Điểm';
                                		break;
                                	case 5:
                                		messageResult = messageResult + 'Cộng 5 Điểm';
                                		break;
                                	case 6:
                                		messageResult = messageResult + 'Cộng 2 Điểm';
                                		break;
                                	case 7:
                                		messageResult = messageResult + 'Phượng Hoàng';
                                		break;
                                	case 8:
                                		messageResult = messageResult + 'Cộng 1 Điểm';
                                		break;
                                	default :
                                		messageResult = 'Error!';
                                		break;
                                }
								$('#ketqua').html(messageResult);
								$('.mask').fadeIn();
								$('.popup-ketqua').fadeIn(.5);

							}, 5000);
                        } else {
                            var messageResult = "Không thành công!";
                            // if (response.Status === "Campaign_DoAction_BeLimitedMaximumPlayInDay") {
                            //     messageResult = "<p>Hôm nay bạn đã tham gia vòng quay may mắn</p> <p class='strong-title'>Vui lòng quay lại sau</p>";
							// }							
                            $('#ketqua').html(messageResult);
							isBusying = false;
                        }
                	}else{
                		isBusying = false;
                	}
                },0)
            }
        }
	</script>
	<script type="text/javascript">
		var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 200,
            mobile: true,
            live: true
        });
        wow.init();
		$(document).ready(function() {
			events();
			$('.bg-giftcode button').click(function() {
				$(this).prev("input").focus();
				$(this).prev("input").select();
				document.execCommand('copy');
			});
		});
	</script>
	<script type="text/javascript">
	   $.ajaxSetup({
		  data: <?= \yii\helpers\Json::encode([
			  \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
		  ]) ?>
	  });
	  
	  startApp();
	</script>
</body>
</html>