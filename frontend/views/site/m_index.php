<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\base\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\widget\LeftServersWidget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= 'https://cdn.mangaplay.vn/tutienh5/style/m_trangchu';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
?>
<!-- body content -->
  
  <section class="banner-bottom">
	 <div class="title">
		<h2>Tin Tổng Hợp</h2>
	 </div>
	 <ul class="banner-slide owl-carousel owl-loaded owl-drag">
		<div class="owl-stage-outer">
		   <div class="owl-stage" style="transform: translate3d(-2485px, 0px, 0px); transition: all 0.25s ease 0s; width: 3905px;">
			  <?php foreach($tinmoi as $val){
				$title 		= word_limit($val->post_title,50);
				$images 	= 	'/uploads/'.$val->post_featured_image;
				$link_event =   '/'.$val->post_slug;
				$datepost 	= 	date('d-m-Y', strtotime($val->post_datetime));
				$url = 'javascript:;';
				if($val->post_metadesc != ""){
					$url = trim($val->post_metadesc);
				}
			  ?>
			  <div class="owl-item cloned" style="width: 355px;">
				 <li>
					<a alt="<?=$title?>" href="<?=$url?>">
						<img src="<?=$images?>">
					</a>
				 </li>
			  </div>
			  <?php } ?>
		   </div>
		</div>
	 </ul>
  </section>
  <!-- tin tuc -->
  <section class="tab-container">
			<ul class="menu-tab">
				<li class="active">TIN TỨC</li>
				<li>SỰ KIỆN</li>
				<li>CẨM NANG</li>
				<li>TÂN THỦ</li>
			</ul>
			<style>
			.content .text {
				overflow: hidden;
				text-overflow: ellipsis;
				color: #757676;
				font-size: 13px;
				display: -webkit-box;
				line-height: 16px;
				margin-bottom: 5px;
				max-height: 15px;
				-webkit-line-clamp: 2;
				-webkit-box-orient: vertical;
				color: #757676;
				font-size: 13px;
			}
			.content h5{
				margin-bottom:5px!important;
			}
			</style>
			<div class="content-tab">
				<div class="inner">
					<ul class="news-list">
						<?php 
						if(!empty($tintuc)){
						foreach($tintuc as $i => $val){
							$title 		= word_limit($val->post_title,50);
							$link_event =   '/'.$val->post_slug;
							$datepost 	= 	date('d-m-Y', strtotime($val->post_datetime));
							$images 	= 	'/uploads/'.$val->post_featured_image;
							$content 	= 	word_limit($val->post_content,100);	
						?>
						<li>
							<div class="image">
								<a title="<?php echo $title ?>" href="<?=$link_event?>">
									<img width='108px' src="<?=$images?>" alt="<?php echo $title ?>">
								</a>
							</div>
							
							<div class="content">
								<h5>
									<a title="<?php echo $title ?>" href="<?=$link_event?>"><?php echo $title ?></a>
								</h5>
								<!--<div  class='text'><?=$content?></div>-->
								<div class="time">
									<?php echo $datepost ?>
								</div>
								
							</div>
						</li>
						<?php } } ?>
					</ul>
					<div class="more">
						<a href="/chuyen-muc/tin-tuc">Xem Thêm</a>
					</div>
				</div>
				<div class="inner">
					<ul class="news-list">
						<?php 
						if(!empty($sukien)){
						foreach($sukien as $i => $val){
							$title 		= word_limit($val->post_title,50);
							$link_event =   '/'.$val->post_slug;
							$datepost 	= 	date('d-m-Y', strtotime($val->post_datetime));
							$images 	= 	'/uploads/'.$val->post_featured_image;
							$content 	= 	word_limit($val->post_content,100);		
						?>
						<li>
							<div class="image">
								<a title="<?php echo $title ?>" href="<?=$link_event?>">
									<img width='108px' src="<?=$images?>" alt="<?php echo $title ?>">
								</a>
							</div>
							<div class="content">
								<h5>
									<a title="<?php echo $title ?>" href="<?=$link_event?>"><?php echo $title ?></a>
								</h5>
								<div class="time">
									<?php echo $datepost ?>
								</div>
							</div>
						</li>
						<?php } } ?>
					</ul>
					<div class="more">
						<a href="/chuyen-muc/su-kien">Xem Thêm</a>
					</div>
				</div>
				<div class="inner">
					<ul class="news-list">
						<?php 
						if(!empty($camnang)){
						foreach($camnang as $i => $val){
							$title 		= word_limit($val->post_title,50);
							$link_event =   '/'.$val->post_slug;
							$datepost 	= 	date('d-m-Y', strtotime($val->post_datetime));
							$images 	= 	'/uploads/'.$val->post_featured_image;
							$content 	= 	word_limit($val->post_content,100);	
						?>
						<li>
							<div class="image">
								<a title="<?php echo $title ?>" href="<?=$link_event?>">
									<img width='108px' src="<?=$images?>" alt="<?php echo $title ?>">
								</a>
							</div>
							<div class="content">
								<h5>
									<a title="<?php echo $title ?>" href="<?=$link_event?>"><?php echo $title ?></a>
								</h5>
								<div class="time">
									<?php echo $datepost ?>
								</div>
							</div>
						</li>
						<?php } } ?>
					</ul>
					<div class="more">
						<a href="/chuyen-muc/cam-nang">Xem Thêm</a>
					</div>
				</div>
				<div class="inner">
					<ul class="news-list">
						<?php 
						if(!empty($tanthu)){
						foreach($tanthu as $i => $val){
							$title 		= word_limit($val->post_title,50);
							$link_event =   '/'.$val->post_slug;
							$datepost 	= 	date('d-m-Y', strtotime($val->post_datetime));
							$images 	= 	'/uploads/'.$val->post_featured_image;
							$content 	= 	word_limit($val->post_content,100);		
						?>
						<li>
							<div class="image">
								<a title="<?php echo $title ?>" href="<?=$link_event?>">
									<img width='108px' src="<?=$images?>" alt="<?php echo $title ?>">
								</a>
							</div>
							<div class="content">
								<h5>
									<a title="<?php echo $title ?>" href="<?=$link_event?>"><?php echo $title ?></a>
								</h5>
								<div class="time">
									<?php echo $datepost ?>
								</div>
							</div>
						</li>
						<?php } } ?>
					</ul>
					<div class="more">
						<a href="/chuyen-muc/tan-thu">Xem Thêm</a>
					</div>
				</div>
			</div>
		</section>
  <!-- end tin tuc -->
  <section class="video-area">
			<div class="title">
				<h2>Video Đặc Sắc</h2>
			</div>
			<ul class="video-list owl-carousel">
				<li>
					<div class="video-box text-center">
			            <a class="fancybox slider" data-type="iframe" href="https://www.youtube.com/embed/AcBk23_IYjY?autoplay=1&controls=0&loop=1&playlist=AcBk23_IYjY&amp;showinfo=0">
			              <img src="<?=$styleUrl?>/images/hinhgame01.jpg" alt="">
			              <span class="icon-play"><img src="<?=$styleUrl?>/images/play.png" alt=""></span>
			            </a>
			         </div>
				</li>
			</ul>
		</section>