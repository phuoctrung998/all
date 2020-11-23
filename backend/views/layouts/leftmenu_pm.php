 <?php 
 use yii\helpers\Url;
 use yii\helpers\Html;
 use backend\assets\AppAsset;
 
$user_id 		= Yii::$app->user->identity->id;
$objUserRole 	=  \Yii::$app->authManager->getRolesByUser($user_id);
$userRole 		= key($objUserRole);
 ?>
 <div 
	id="m_ver_menu" 
	class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
	m-menu-vertical="1"
	m-menu-scrollable="0" m-menu-dropdown-timeout="500" >
	<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
		<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
			<a  href="/admin" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-line-graph"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Dashboard
						</span>
						<span class="m-menu__link-badge">
							<span class="m-badge m-badge--danger">
								2
							</span>
						</span>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__section">
			<h4 class="m-menu__section-text">
				Components
			</h4>
			<i class="m-menu__section-icon flaticon-more-v3"></i>
		</li>
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('categories/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-layers"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Chuyên mục bài viết
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('posts/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Bài viết
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('sliders/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Sliders
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('servers/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Máy chủ
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('transaction/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Giao dịch
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
			
			<div class="m-menu__submenu " m-hidden-height="160" style="">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
				
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('transaction/index'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Danh sách giao dịch
							</span>
						</a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('gm/index'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Giao dịch Xu
							</span>
						</a>
					</li>

					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('gm/gold'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Giao dịch Vàng GM
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		
		
		
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('mkt/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Report
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a  href="#" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							TOP
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
			<div class="m-menu__submenu " m-hidden-height="160" style="">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('events/napthe'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Danh sách top nạp thẻ
							</span>
						</a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('events/index'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Danh sách top tiêu vàng
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		
		
		<li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-text">
					Minigame Vòng Xoay
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu " m-hidden-height="160" style="">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('minigamevongxoayreward/index'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Phần thưởng
							</span>
						</a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('minigamevongxoayoutcome/index'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Kết quả
							</span>
						</a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('minigamevongxoayoutcome/topphuonghoang'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Top Phượng Hoàng
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('members/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Thành viên
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('giftcodetype/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Loại giftcode
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Import Giftcode
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
			<div class="m-menu__submenu " m-hidden-height="160" style="">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('giftcode/index'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Nhập Giftcode
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		
		<li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
			<a href="javascript:;" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-text">
					GM Tool
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu " m-hidden-height="160" style="">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<!--
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('gm/addgold'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Add Vàng
							</span>
						</a>
					</li>
					-->
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('gm/addxu'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Add Ví
							</span>
						</a>
					</li>
					<li class="m-menu__item " aria-haspopup="true">
						<a href="<?= Yii::$app->urlManager->createAbsoluteUrl('gm/truxu'); ?>" class="m-menu__link ">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Trừ Xu
							</span>
						</a>
					</li>
				</ul>
			</div>
		</li>
		
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('managerredirects/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Cấu hình redirects
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('systemsconfigvalue/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Cấu hình hệ thống
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
			<a  href="<?= Yii::$app->urlManager->createAbsoluteUrl('systemsconfig/index'); ?>" class="m-menu__link ">
				<i class="m-menu__link-icon flaticon-share"></i>
				<span class="m-menu__link-title">
					<span class="m-menu__link-wrap">
						<span class="m-menu__link-text">
							Thêm cấu hình
						</span>
						<i class="m-menu__ver-arrow la la-angle-right"></i>
					</span>
				</span>
			</a>
		</li>
		
		
		
		
		
	</ul>
</div>