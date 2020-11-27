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
use frontend\widget\DieuUocRongThanWidget;
use frontend\widget\LeftServersWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\widget\LacxingauWidget;
use frontend\widget\TeaserPopupLoginWidget;
use frontend\widget\TrieuHoiAnhHungWidget;
use frontend\widget\HomePopupLoginWidget;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleTeaser 	= Yii::getAlias('@webDomain').'/style/teaser';
$style	 		= Yii::getAlias('@webDomain').'/style/pc';
$styleUrl		= Yii::getAlias('@webDomain').'/style/sieuxayda';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Siêu Xay Da </title>
	<meta name="title" content="Siêu Xay Da" />
	<meta name="description" content="Siêu Xay Da" />

	<link rel="shortcut icon" id="favicon" href="<?=$styleUrl?>/images/logo.png">
	<meta name="author" content="">
	<link href="<?=$styleTeaser?>/css/slick.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleTeaser?>/css/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleTeaser?>/css/animate.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleTeaser?>/css/keyframes.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleTeaser?>/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?=$styleTeaser?>/css/responsive.css" rel="stylesheet" type="text/css">
	
	
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
	
</head>

<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
	<div id="mask"></div>

	<main>
		
		<!-- Begin: Defaul -->
		
		<div class="top img_hv cus pc" id="return-to-top">
			<img src="<?=$styleTeaser?>/images/top.png" alt="">
			<img src="<?=$styleTeaser?>/images/top-hv.png" alt="">
		</div>
		<div class="gift-code pc">
			<div class="effect01">
				<img src="<?=$styleTeaser?>/images/nhan_code.png" alt="Siêu Xay Da">
			</div>
		</div>
		<audio controls class="audio-xoay">
			<source src="<?=$styleTeaser?>/xoay.mp3" type="audio/mpeg">
		</audio>
		<audio controls class="audio-popup">
				<source src="<?=$styleTeaser?>/popup.mp3" type="audio/mpeg">
		</audio>
		<audio autoplay loop="" id="audio_autoplay" class="audio-game" >
			<source src="<?=$styleTeaser?>/music.mp3" type="audio/mpeg">
		</audio>
		<!-- End: Defaul -->

		<!-- Begin: Info Login -->
		
		<div class='info-login'>
			<?php if(!Yii::$app->user->isGuest){?>
					<p>
						<img src="<?=$styleTeaser?>/images/avatar.png">
						<span>
						Hello: <?=Yii::$app->user->identity->member_username?>
						<a href="javascript:;" class="btnHomeLogout"> Thoát !</a>
						</span>
					</p>
				<?php } else{ ?>
					<p>
						<img src="<?=$styleTeaser?>/images/avatar.png">
						<span>
						Hello: Guest
						
						</span>
					</p>

			<?php } ?>
			<div class='volume'>
				<div id="volume-play" class="volume-phone"  style="display: none;">
					<a  href="javascript:void(0);">
						<img src="<?=$styleTeaser?>/images/icon_volume_hover.png" alt="Siêu Xay Da">
					</a>
				</div>
				<div id="volume-stop" class="volume-phone">
					<a href="javascript:void(0);">
						<img src="<?=$styleTeaser?>/images/icon_volume.png" alt="Siêu Xay Da">
					</a>
				</div>
			</div>
		</div>
	
		<!-- End: Info Login -->

		<!-- Begin: Menu Left -->
		
		<div class='effect-left pc'>
			<div class="menu-left">
				<ul>
					<li><a id="left1" href="#p01" class='img_hv active'>
						<img src="<?=$styleTeaser?>/images/ml-p1.png" alt="Siêu Xay Da">
						<img src="<?=$styleTeaser?>/images/ml-p1-hv.png" alt="Siêu Xay Da">
					</a></li>
					<li><a id="left2" href="#p02" class='img_hv'>
						<img src="<?=$styleTeaser?>/images/ml-p2.png" alt="Siêu Xay Da">
						<img src="<?=$styleTeaser?>/images/ml-p2-hv.png" alt="Siêu Xay Da">
					</a></li>
					<li><a id="left3" href="#p03" class='img_hv'>
						<img src="<?=$styleTeaser?>/images/ml-p3.png" alt="Siêu Xay Da">
						<img src="<?=$styleTeaser?>/images/ml-p3-hv.png" alt="Siêu Xay Da">
					</a></li>
					<li><a id="left4" href="#p04" class='img_hv'>
						<img src="<?=$styleTeaser?>/images/ml-p4.png"alt="Siêu Xay Da">
						<img src="<?=$styleTeaser?>/images/ml-p4-hv.png"alt="Siêu Xay Da">
					</a></li>
					<li><a id="left5" href="#p05" class='img_hv'>
						<img src="<?=$styleTeaser?>/images/ml-p5.png"alt="Siêu Xay Da">
						<img src="<?=$styleTeaser?>/images/ml-p5-hv.png"alt="Siêu Xay Da">
					</a></li>
				</ul>
			</div>
		</div>
		<!-- End: Menu Left -->

		<!-- Begin: Menu Right -->
		<div class='effect-right pc'>
			<div class="menu-right">
				<div class='mr-aside'>
					<?php if(!Yii::$app->user->isGuest){ ?>
							<a class="" target="blank" href="https://www.facebook.com/SieuXayda.MangaPlay">
								<img src="<?=$styleTeaser?>/images/mr-play.gif" alt="">
							</a>

						<?php } else{ ?>

							<div class="mr-top btn-login btn-login">
								<img src="<?=$styleTeaser?>/images/mr-play.gif" alt="">
							</div>
					<?php } ?>

					<div class='mr-menu'>
						<ul>
							<li>
								<a target="_blank" href="http://sieuxayda.vn/" class='img_hv'>
									<img src="<?=$styleTeaser?>/images/mr-home.png" alt="Siêu Xay Da">
									<img src="<?=$styleTeaser?>/images/mr-home-hv.png" alt="Siêu Xay Da">
								</a>
							</li>
							<li>
								<a target="_blank" href="https://www.facebook.com/SieuXayda.MangaPlay" class='img_hv'>
									<img src="<?=$styleTeaser?>/images/mr-fanpage.png" alt="Siêu Xay Da">
									<img src="<?=$styleTeaser?>/images/mr-fanpage-hv.png" alt="Siêu Xay Da">
								</a>
							</li>
							<li>
								<a target="_blank" href="https://bit.ly/3j5VgGz" class='img_hv'>
									<img src="<?=$styleTeaser?>/images/mr-group.png" alt="Siêu Xay Da">
									<img src="<?=$styleTeaser?>/images/mr-group-hv.png" alt="Siêu Xay Da">
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="mr-bottom btn-nhancode">
					<div class="img_hv cus">
						<img src="<?=$styleTeaser?>/images/test.png" alt="">
						<img src="<?=$styleTeaser?>/images/test-hv.png" alt="">
					</div>
				</div>
			</div>
		</div>
		<!-- End: Menu Right -->
		
		<!-- Begin: Page01 Info -->
		<section class="page01-info" id="p01">
			
			<div class="zindex">
				<div class="mb"><img src="<?=$styleTeaser?>/images/bg-01-mb.jpg" alt="" ></div>
				<video autoplay="" muted="" loop="" class="top-one-video pc">
					<source src="<?=$styleTeaser?>/intro.mp4" type="video/mp4" >
				</video>
				<!-- Button press video trailer -->
				
				<div class='btn-trailer cus'></div>
				<?php if(!Yii::$app->user->isGuest){?>
						<div class="mb">
					
							<a class="" target="blank" href="https://www.facebook.com/SieuXayda.MangaPlay">
								<img src="<?=$styleTeaser?>/images/p1_choingay.png" alt="">
							</a>
						</div>
					<?php } else{ ?>
						<div class="mb p1-play-hv btn-login">
							<img src="<?=$styleTeaser?>/images/p1_choingay.png" alt="">
					
						</div>
				<?php } ?>

			</div>
		</section>
		<!-- End: Page01 Info -->
		
		<!-- Begin: Page02 -->
		<section class="page02 " id="p02">
			<div class="mouse pc"><img src="<?=$styleTeaser?>/images/mouse.png" alt=""></div>
			<div class="wow title">
				<img src="<?=$styleTeaser?>/images/p2-title.png" alt="Siêu Xay Da">
			</div>
			  
			<div class="page02-list wow fadeInUp">
				<ul>
					<li class="btn-tuong1 effect02"><a href="javascript:void(0)" class="img_hv">
						<img src="<?=$styleTeaser?>/images/p2-tuong1.png" alt="">
						<img src="<?=$styleTeaser?>/images/p2-tuong1-hv.png" alt="">
					</a></li>
					<li class="btn-tuong2 effect02"><a href="javascript:void(0)" class="img_hv">
						<img src="<?=$styleTeaser?>/images/p2-tuong2.png" alt="">
						<img src="<?=$styleTeaser?>/images/p2-tuong2-hv.png" alt="">
					</a></li>
					<li class="btn-tuong3 effect02"><a href="javascript:void(0)" class="img_hv">
						<img src="<?=$styleTeaser?>/images/p2-tuong3.png" alt="">
						<img src="<?=$styleTeaser?>/images/p2-tuong3-hv.png" alt="">
					</a></li>
				</ul>
			</div>
			
			<div class='clear'></div>
			
		</section>
		<!-- End: Page02 -->

		<!-- Begin: Page03 -->
		<section class="page03" id="p03">
			<div class="zindex">
				<div class="wow title">
					<img src="<?=$styleTeaser?>/images/p3-title.png" alt="Siêu Xay Da">
				</div>
				<div class="zindex wow fadeInDown">
					<div>
						<ul class="slide-phucloi">
							<li class="btn-page3-01">
								<img src="<?=$styleTeaser?>/images/p3-img01.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-02">
								<img src="<?=$styleTeaser?>/images/p3-img02.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-03">
								<img src="<?=$styleTeaser?>/images/p3-img03.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-04">
								<img src="<?=$styleTeaser?>/images/p3-img04.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-05">
								<img src="<?=$styleTeaser?>/images/p3-img05.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-06">
								<img src="<?=$styleTeaser?>/images/p3-img06.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-07">
								<img src="<?=$styleTeaser?>/images/p3-img07.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
							<li class="btn-page3-08">
								<img src="<?=$styleTeaser?>/images/p3-img08.png" alt="">
								<div class="img_hv">
									<img src="<?=$styleTeaser?>/images/p3-btn.png" alt="">
									<img src="<?=$styleTeaser?>/images/p3-btn-hv.png" alt="">
								</div>
							</li>
						</ul>
					</div>
					<div class='clear'></div>
				</div>
			</div>
		</section>
		<!-- End: Page03  -->

		<!-- Begin: Page04  -->
		<section class="page04" id="p04">
			<div class="zindex">
				<div class="wow title">
					<img src="<?=$styleTeaser?>/images/p4-title.png" alt="Siêu Xay Da">
				</div>

				<?php if(!Yii::$app->user->isGuest){?>
				<?=DieuUocRongThanWidget::widget(['member_id' => Yii::$app->user->identity->member_id])?>	
				<?php }else{?>
				<?=DieuUocRongThanWidget::widget()?>	
				<?php } ?>
				
				<div class='clear'></div>
			</div>
		</section>
		
		<!-- End: Page04  -->

		<!-- Begin: Page05 Timeline -->
		<section class="page05-timeline" id="p05">
			<div class="zindex">
				
				<div class="p5-date wow fadeIn btn-nhancode">
					<a href="javascript:void(0)">
						<img src="<?=$styleTeaser?>/images/p5-date.png" alt="">
					</a>
				<div class="p5_figure1 effect02 wow fadeIn"><img src="<?=$styleTeaser?>/images/p5-figure.png" alt=""></div>
				</div>
				
				<div id="clock"></div>

				<div class="box-timeline">
					<div class="timeline-share pc">
						<p><a href=""><img src="<?=$styleTeaser?>/images/p5-txt.png" alt="Siêu Xay Da" /></a></p>
					</div>
					<div class="timeline-get">
						<ul>
							<li class="active btn-datmoc"><a href="javascript:void(0);">
								<div class="p5-tooltip">
									<img src="<?=$styleTeaser?>/images/tooltip.png" alt="">
								</div>
								<div class="p5-box">
									<img src="<?=$styleTeaser?>/images/p5-box1-c.png" alt="Siêu Xay Da" />
									<img src="<?=$styleTeaser?>/images/p5-box1-d.png" alt="Siêu Xay Da" />
								</div>
							</a></li>
							<li class="active btn-datmoc"><a href="javascript:void(0);">
								<div class="p5-tooltip">
									<img src="<?=$styleTeaser?>/images/tooltip.png" alt="">
								</div>
								<div class="p5-box">
									<img src="<?=$styleTeaser?>/images/p5-box2-c.png" alt="Siêu Xay Da" />
									<img src="<?=$styleTeaser?>/images/p5-box2-d.png" alt="Siêu Xay Da" />
								</div>
							</a></li>
							<li class="btn-chua-datmoc"><a href="javascript:void(0);">
								<div class="p5-tooltip">
									<img src="<?=$styleTeaser?>/images/tooltip.png" alt="">
								</div>
								<div class="p5-box">
									<img src="<?=$styleTeaser?>/images/p5-box3-c.png" alt="Siêu Xay Da" />
									<img src="<?=$styleTeaser?>/images/p5-box3-d.png" alt="Siêu Xay Da" />
								</div>
							</a></li>
							<li class="btn-chua-datmoc"><a href="javascript:void(0);">
								<div class="p5-tooltip">
									<img src="<?=$styleTeaser?>/images/tooltip.png" alt="">
								</div>
								<div class="p5-box">
									<img src="<?=$styleTeaser?>/images/p5-box4-c.png" alt="Siêu Xay Da" />
									<img src="<?=$styleTeaser?>/images/p5-box4-d.png" alt="Siêu Xay Da" />
								</div>
							</a></li>
						</ul>
						<div class="timeline-water">
							<img src="<?=$styleTeaser?>/images/p5-line-active.png" alt="Siêu Xay Da" />
							<div class="timeline-water-active"></div>
						</div>

						
					</div>
				</div>
			</div>
		</section>
		<!-- End: Page05 Timeline -->
		<!-- Begin: Footer -->
		<div class="footer">
					
			<div class="container-footer">
				
				<div class="logo-manga">
					<img src="<?=$styleTeaser?>/images/logo-manga.png" alt=""> 
				</div>
				<div>
					<h2>Siêu Xay Da</h2>
					<p>
						©2020 Bản quyền trò chơi thuộc về MangaPlay<br>
						MangaPlay chính thức phát hành tại Việt Nam<br>
						Địa chỉ : Tòa nhà SABAY, 288 Phạm Văn Hai, phường 5, quận Tân Bình, TPHCM.
					</p>
				</div>
				
				
			</div>
		</div>
		<!-- End: Footer -->
	</main>


<!-- ------ Begin: Popup ------ -->
<!-- Begin: popup login -->
<?=HomePopupLoginWidget::widget()?>
<!-- End: popup login -->

<!-- Begin: Login Effect -->
<div class='effect-login pc'>
	<img src='<?=$styleTeaser?>/images/login-1.png' alt="Naruto Tốc Chiến" class='effect-login1'>
	<img src='<?=$styleTeaser?>/images/login-2.png' alt="Naruto Tốc Chiến" class='effect-login2'>
	<img src='<?=$styleTeaser?>/images/login-3.png' alt="Naruto Tốc Chiến" class='effect-login3'>
	<img src='<?=$styleTeaser?>/images/login-4.png' alt="Naruto Tốc Chiến" class='effect-login4'>
</div>
<!-- End: Login Effect -->
	
	<!-- Begin: Popup Defaul -->
	<div class="popup-defaul">
		<div class="close-popup"></div>
		<div class="content-popup">
			<p>Chúc Mừng Bạn đã đổi quà thành công</p>
		</div>
	</div>
	<!-- End: Popup Defaul -->
	
	<!-- Begin: Nhap SDT NHAN CODE -->
	<div class="popup-nhancode">
		<div class="close-popup"></div>
		<div class="content-popup nhancode-01">
			<div>Bước 1: Click Để Like Fanpage.</div>
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSieuXayda.MangaPlay%2F%3Fepa%3DSEARCH_BOX&tabs=timeline&width=200&height=70&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" width="200" height="70" style="border:none;overflow:hidden; " scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			<div>Bước 2: Nhập SĐT Để Nhận GiftCode.</div>
			<div><span>Giftcode được gửi qua sđt</span></div>
			<input placeholder="Nhập số điện thoại">
			<div class='img_hv nhancode-btn btn-guicode cus'>
				<img src='<?=$styleTeaser?>/images/nhancode-btn.png'  alt="Siêu Xay Da">
				<img src='<?=$styleTeaser?>/images/nhancode-btn-hv.png'  alt="Siêu Xay Da">
			</div>
		</div>
		<div class="content-popup nhancode-02">
			<div>GiftCode sẽ gửi vào sdt của Anh Hùng
				<br>trước ngày ra mắt game
				<br><br>Xin Cảm Ơn….
			</div>
		</div>
	</div>
	<!-- End: Nhap SDT NHAN CODE -->

	<!-- begin: popup ket qua -->
	<div class='popup-ketqua'>
		<div class='bg-ketqua'>
			
			<span id="ketqua"></span>
			<span id="ketqua-img"></span>
			<div class="close-kq"></div>
		</div>
	</div>
	<!-- end: popup ket qua -->

	<!-- Begin: popup page 02 -->
	<div class="popup-tuong popup-tuong01">
		<div class="close-popup">
			<img src="<?=$styleTeaser?>/images/p-close.png" alt="" class="mb">
		</div>
		<div class="content-popup">
			<div class="float-left figure-info">
				<h2><img src="<?=$styleTeaser?>/images/info-figure1-name.png" alt=""></h2>
				<div class="mb-4 ml-15"><img src="<?=$styleTeaser?>/images/info-figure1-txt.png"  alt=""></div>
				<div class="mb-4 p2-gif"><img src="<?=$styleTeaser?>/images/info-figure-gif1.png"  alt=""></div>
				<div class="figure-line mb-4"><img src="<?=$styleTeaser?>/images/info-figure1-line.png"  alt=""></div>
				<div class="icon-figure ">
					<ul>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon1.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon2.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon3.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon4.png"></a></li>
					</ul>
				</div>
			</div>
			<div class="float-left figure">
				<img src="<?=$styleTeaser?>/images/info-figure1.png" alt="">
			</div>
		</div>
	</div>
	<div class="popup-tuong popup-tuong02">
		<div class="close-popup"><img src="<?=$styleTeaser?>/images/p-close.png" alt="" class="mb"></div>
		<div class="content-popup">
			<div class="float-left figure-info">
				<h2><img src="<?=$styleTeaser?>/images/info-figure2-name.png" alt=""></h2>
				<div class="mb-4 ml-15"><img src="<?=$styleTeaser?>/images/info-figure2-txt.png"  alt=""></div>
				<div class="mb-4 p2-gif"><img src="<?=$styleTeaser?>/images/info-figure-gif2.png"  alt=""></div>
				<div class="figure-line mb-4"><img src="<?=$styleTeaser?>/images/info-figure1-line.png"  alt=""></div>
				<div class="icon-figure ">
					<ul>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon1.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon1.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon1.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon4.png"></a></li>
					</ul>
				</div>
			</div>
			<div class="float-left figure">
				<img src="<?=$styleTeaser?>/images/info-figure1.png" alt="">
			</div>
		</div>
	</div>
	<div class="popup-tuong popup-tuong03">
		<div class="close-popup"><img src="<?=$styleTeaser?>/images/p-close.png" alt="" class="mb"></div>
		<div class="content-popup">
			<div class="float-left figure-info">
				<h2><img src="<?=$styleTeaser?>/images/info-figure3-name.png" alt=""></h2>
				<div class="mb-4 ml-15"><img src="<?=$styleTeaser?>/images/info-figure3-txt.png"  alt=""></div>
				<div class="mb-4 p2-gif"><img src="<?=$styleTeaser?>/images/info-figure-gif3.png"  alt=""></div>
				<div class="figure-line mb-4"><img src="<?=$styleTeaser?>/images/info-figure1-line.png"  alt=""></div>
				<div class="icon-figure ">
					<ul>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon1.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon1.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon2.png"></a></li>
						<li><a><img src="<?=$styleTeaser?>/images/info-figure-icon3.png"></a></li>
					</ul>
				</div>
			</div>
			<div class="float-left figure">
				<img src="<?=$styleTeaser?>/images/info-figure1.png" alt="">
			</div>
		</div>
	</div>
	<!-- End: popup page 02 -->

	<!-- Begin: popup page 03 -->
	<div class="popup-page03-01 popup-page02">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 1</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						<br></br>
				<h1>Why do we use it?</h1>
				It is a long established fact that a reader will be distracted bthe readable content of a page when looking at its layout. The poinof using Lorem Ipsum is that it has a more-or-less normadistribution of letters, as opposed to using 'Content here, contenhere', making it look like readable English. Many desktop publishinpackages and web page editors now use Lorem Ipsum as their defaulmodel text, and a search for 'lorem ipsum' will uncover many wesites still in their infancy. Various versions have evolved over thyears, sometimes by accident, sometimes on purpose (injected humouand the like).
				<br></br>
				<h1>Where does it come from?</h1>
				Contrary to popular belief, Lorem Ipsum is not simply random textIt has roots in a piece of classical Latin literature from 45 BCmaking it over 2000 years old. Richard McClintock, a Latin professoat Hampden-Sydney College in Virginia, looked up one of the morobscure Latin words, consectetur, from a Lorem Ipsum passage, angoing through the cites of the word in classical literaturediscovered the undoubtable source. Lorem Ipsum comes from sections 10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremeof Good and Evil) by Cicero, written in 45 BC. This book is treatise on the theory of ethics, very popular during thRenaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor siamet..", comes from a line in section 1.10.32.
				<br></br>
				The standard chunk of Lorem Ipsum used since the 1500s is reproducebelow for those interested. Sections 1.10.32 and 1.10.33 from "dFinibus Bonorum et Malorum" by Cicero are also reproduced in theiexact original form, accompanied by English versions from the 191translation by H. Rackham.
			</p>
		</div>
	</div>
	<div class="popup-page03-02 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 2</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<div class="popup-page03-03 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 3</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<div class="popup-page03-04 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 4</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<div class="popup-page03-05 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 5</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<div class="popup-page03-06 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 6</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<div class="popup-page03-07 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 7</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<div class="popup-page03-08 popup-page02 ">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<h1>Popup 8</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
			</p>
		</div>
	</div>
	<!-- End: popup page 03 -->

	<!-- Begin: Popups for page 04 -->
	<div class="popup-page04">
		<div class="close-popup img_hv">
			<img src="<?=$styleTeaser?>/images/close.png" alt="">
			<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
		</div>
		<div class="content-popup">
			<ul class="popup-menu pc">
				<li><a href="javascript:void(0);" class="img_hv">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn1.png" alt="">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn1-hv.png" alt="">
				</a></li>
				<li class="active"><a href="javascript:void(0);"class="img_hv">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn2.png" alt="">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn2-hv.png" alt="">
				</a></li>
				<li><a href="javascript:void(0);"class="img_hv">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn3.png" alt="">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn3-hv.png" alt="">
				</a></li>
				<li><a href="javascript:void(0);"class="img_hv">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn4.png" alt="">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn4-hv.png" alt="">
				</a></li>
				<li><a href="javascript:void(0);"class="img_hv">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn5.png" alt="">
					<img src="<?=$styleTeaser?>/images/p4-menu-btn5-hv.png" alt="">
				</a></li>
			</ul>
		
			<div class="popup-box">
				<!--  Tab doi code -->
				<div class="tab ">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-doicode.png"></div>
					<div class="content-doiqua">
					<?php if(!Yii::$app->user->isGuest){?>	
						<ul>
							<div>
								<?php
								$stt1=0; 								
								foreach($ngoc1 as $t => $tt){ $stt1++ ?>
								<?php }?>

								<?php
								$stt2=0; 
								foreach($ngoc2 as $t => $tt){ $stt2++ ?>
								<?php }?>

								<?php
								$stt3=0; 
								foreach($ngoc3 as $t => $tt){ $stt3++ ?>
								<?php }?>

								<?php
								$stt4=0; 
								foreach($ngoc4 as $t => $tt){ $stt4++ ?>
								<?php }?>

								<?php
								$stt5=0; 
								foreach($ngoc5 as $t => $tt){ $stt5++ ?>
								<?php }?>

								<?php
								$stt6=0; 
								foreach($ngoc6 as $t => $tt){ $stt6++ ?>
								<?php }?>

								<?php								
								$stt7=0;
								foreach($ngoc7 as $t => $tt){ $stt7++ ?>
								<?php }?>

								<?php 
								$tong= $stt1 + $stt2 + $stt3 + $stt4 + $stt5 + $stt6 + $stt7; 
								?>
							</div>			
								

							<!-- code minigame 1 -->
							<li class="minigame-doicode" data-id='1'>
								<?php if ($tong <= 10 && $tong != 0 ) { ?>
									
									<div class="dc-img">	
										<img src="<?=$styleTeaser?>/images/p4-doicode01.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
									<?php } else{ ?>
									<div class="dc-img btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-doicode01.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
								<?php } ?>
							</li>
									
													
							<li class="minigame-doicode" data-id='2'>
								<?php if($tong <= 15 && $tong >= 10 ) { ?>
									
									<div class="dc-img">
										<img src="<?=$styleTeaser?>/images/p4-doicode02.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
									<?php } else{ ?>
									<div class="dc-img btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-doicode02.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
								<?php } ?>
							</li>

							
							<li class="minigame-doicode" data-id='3'>
								<?php if($tong <= 20 && $tong >= 15 ) { ?>
									
									<div class="dc-img">
										<img src="<?=$styleTeaser?>/images/p4-doicode03.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
									<?php } else{ ?>
									<div class="dc-img btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-doicode03.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
								<?php } ?>
							</li>
							
																		
							<li class="minigame-doicode" data-id='4'>
								<?php if($tong <= 25 && $tong >= 20) { ?>
									
									<div class="dc-img">
										<img src="<?=$styleTeaser?>/images/p4-doicode04.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
									<?php } else{ ?>
									<div class="dc-img btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-doicode04.png" alt="">
										<div class="dc-tooltip"> 
											<img src="<?=$styleTeaser?>/images/p4-tooltip.png" alt="">
										</div>
									</div>
									<div class="img_hv btn-change-code btn-chua-datmoc">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode.png" alt="">
										<img src="<?=$styleTeaser?>/images/p4-btn-doicode-hv.png" alt="">
									
									</div>
								<?php } ?>
							</li>
							
							
						</ul>
						<?php } ?>
					</div>
					
				</div>
				<!-- Tab Code cua Ban -->
				<div class="tab">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-yourcode.png"></div>
					<div class="content-table">
						<table>
							<tbody>
								<tr>
									<th width="30%">STT</th>
									<th width="50%">Tên Code</th>
									<th width="20%">Mã Code</th>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							
			
							</tbody>
						</table>
					</div>
				</div>
				<!-- Tab Le The -->
				<div class="tab active">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-thele.png"></div>
					<div class="content-popup">
						<h1>Thể lệ</h1>
					</div>
				</div>
				<!-- Tab Tui Ngoc -->
				<?php if(!Yii::$app->user->isGuest){ ?>

				<div class="tab">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-tuingoc.png"></div>
					<div class="content-doiqua number-doiqua">
						<ul>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc1.png" alt="">
								
								<div class="tn-number"><?=$stt1?></div>
								
								
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc2.png" alt="">
								
								<div class="tn-number"><?=$stt2?></div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc3.png" alt="">
								
								<div class="tn-number"><?=$stt3?></div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc4.png" alt="">
								
								<div class="tn-number"><?=$stt4?></div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc5.png" alt="">
								
								<div class="tn-number"><?=$stt5?></div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc6.png" alt="">
								
								<div class="tn-number"><?=$stt6?></div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc7.png" alt="">
								
								<div class="tn-number"><?=$stt7?></div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Tab Lich Su  -->
				<div class="tab">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-lichsu.png"></div>
					<div class="content-table">
						<table>
							<tbody>
								<tr >
									<th width="30%">STT</th>
									<th width="50%">Phần thưởng</th>
									<th width="20%">Thời gian</th>
								</tr>
								<?php
								$stt=0; 
								foreach($lichsu as $t => $tt){ ++$stt ?>
								<tr>									
										<td><?=$stt?></td>
										<td><?=$tt->name?></td>
										<td><?=$tt->create_time?></td>									
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>

				<?php } else{ ?>
				<!-- Tab Tui Ngoc -->
				<div class="tab">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-tuingoc.png"></div>
					<div class="content-doiqua number-doiqua">
						<ul>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc1.png" alt="">
								<div class="tn-number">0</div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc2.png" alt="">
								<div class="tn-number">0</div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc3.png" alt="">
								<div class="tn-number">0</div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc4.png" alt="">
								<div class="tn-number">0</div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc5.png" alt="">
								<div class="tn-number">0</div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc6.png" alt="">
								<div class="tn-number">0</div>
							</li>
							<li>
								<img src="<?=$styleTeaser?>/images/ngoc7.png" alt="">
								<div class="tn-number">0</div>
							</li>
						</ul>
						
					</div>
				</div>
				<!-- Tab Lich Su  -->
				<div class="tab">
					<div class="title-popup"><img src="<?=$styleTeaser?>/images/pop3-title-lichsu.png"></div>
					<div class="content-table">
						<table>
							<tbody>
								<tr >
									<th width="30%">STT</th>
									<th width="50%">Phần thưởng</th>
									<th width="20%">Thời gian</th>
								</tr>
							
								
							</tbody>
						</table>
					</div>
				</div>

				<?php } ?>
			</div>
		</div>
	</div>
	<!-- End: Popups for page 04 -->
	<div class="popup-defaul pop-giftcode">
		<div class="close-popup"></div>
		<div class="content-popup">
			<p>Code của bạn là</p>
			<p class="label-code">
				
				<center><span style="color:white;font-size:25px" type="text" id="giftcode-text"></span></center>
			
				
			</p>
		</div>
	</div>
	<!-- Begin: Popups for page 05 -->
	<div class="popup-defaul popup-datmoc">
		<div class="close-popup"></div>
		<div class="content-popup">
			<p>Code của bạn là</p>
			<p class="label-code">
				<input type="text" value=""  readonly class='input-res'> 
				<button><span class="img_hv">
					<img src="<?=$styleTeaser?>/images/btn-coppy.png" alt="">
					<img src="<?=$styleTeaser?>/images/btn-coppy-hv.png" alt=""></span>
				</button>
			</p>
		</div>
	</div>

	<div class="popup-defaul popup-chua-datmoc">
		<div class="close-popup"></div>
		<div class="content-popup">
			<p>Chưa đủ điều kiện nhận Giftcode</p>
		</div>
	</div>
	<!-- End: Popups for page 05 -->

	<!-- Begin: Popup Trailer -->
	<div class="video-bg show-sb">
		<div class="video-game">
			<div>
				<div class="video-close img_hv">
					<img src="<?=$styleTeaser?>/images/close.png" alt="">
					<img src="<?=$styleTeaser?>/images/close-hv.png" alt="">
				</div>
				<div class="video_embed-responsive video_embed-responsive-16by9">
					<iframe id='video_popup-youtube-player' width="100%" height="580px" src="https://www.youtube.com/embed/neAxD0ecNh0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<!-- End: Popup Trailer -->
	<div>

	</div>
<!-- ------ End: Popup ------ -->

	<script src="<?=$styleUrl?>/js/carousel.js"></script>
	<script src="<?=$styleUrl?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=$styleUrl?>/js/parallax.js"></script>
	<script src="<?=$styleUrl?>/js/jquery.min.js"></script>
	<script src="<?=$styleUrl?>/js/slick.min.js"></script>
	<script src="<?=$styleUrl?>/js/main.js"></script>
	<script src="<?=$styleUrl?>/js/wow.min.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/minigame.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/napthe.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/doixu.js"></script>
	<script type="text/javascript" src="<?=$baseUrl?>/style/common/js/mainsite.js"></script>
	<script src="https://apis.google.com/js/api:client.js"></script>
	
	<!-- gate -->
		
	<!-- end gate -->
	
	<script type="text/javascript" src="<?=$styleTeaser?>/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="<?=$styleTeaser?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="<?=$styleTeaser?>/js/slick.min.js"></script>
	<script type="text/javascript" src="<?=$styleTeaser?>/js/wow.min.js"></script>

	<script type="text/javascript" src="<?=$styleTeaser?>/js/custom.js"></script>
	


	<script type="text/javascript" src="<?=$styleTeaser?>/js/jquery.countdown.min.js"></script>
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>