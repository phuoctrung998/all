<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleTeaser 		= Yii::getAlias('@webDomain').'/style/teaser';
?>
                <div class="wow fadeInUp">
					<div class="zindex">
						<div>
							<img src='<?=$styleTeaser?>/images/p4-figure01.png' class='pc p4-figureleft title ani-up-down01'>
							<img src='<?=$styleTeaser?>/images/p4-figure02.png' class='pc p4-figureright title ani-up-down02'>
                        </div>
                        
						<div class='p-minigame'>
							<div  class='bg-minigame'>
								<img src="<?=$styleTeaser?>/images/bg-p3-house.png" alt="">
							</div>
							<!-- Image -->
							<div class="dragon ">
								<div class="effect-pulse">
									<img src="<?=$styleTeaser?>/images/p3-dargon.png" alt="">
								</div>
							</div>
							<div class="ngoc">
								<img src="<?=$styleTeaser?>/images/p4-ngoc.png" alt="">
                            </div>

                            <!-- Confirm login -->
							
					
							
                            <?php 
                                if(!Yii::$app->user->isGuest || $num_luotchoi > 0 ){
                            ?>
                                <div class="btn-trieuhoi cus" ><a href="javascript:void(0)">
                                    <div class="img_hv">
                                        <img src="<?=$styleTeaser?>/images/p4-play.png" alt="">
                                        <img src="<?=$styleTeaser?>/images/p4-play-hv.png" alt="">	
                                    </div>
									</a>
                                    <div class="turn"><a href="javascript:void(0)">
										
                                        Còn <span><?=$num_luotchoi?></span> lượt
                                        </a>
                                    </div>                              
                                </div>


                            <?php  }else{ ?>
                                
                                <div class="btn-login-trieuhoi">
                                    <div class="menu-mb-button btn-login">
                                    <div class="img_hv">
                                        <img src="<?=$styleTeaser?>/images/p4-play.png" alt="">
                                        <img src="<?=$styleTeaser?>/images/p4-play-hv.png" alt="">	
                                    </div>

                                    <div class="turn"><a href="">
										 <span>Đâng nhập</span> 
                                        </a>
                                    </div>           
                                    </div>
                                </div>

                            <?php } ?>
							<!-- ===== -->
		
							
							<!-- ===== -->
							<div class='p4_main_content'>
								<!-- Menu  -->
								<div class="p4-menu_tab">
									<ul class="ul-tab pc">
										<li class="active menu_tab_game btn-doicode"><a href="javascript:void(0);" class="img_hv">
											<img src="<?=$styleTeaser?>/images/p4-btn1.png" alt="Siêu Xay Da">
											<img src="<?=$styleTeaser?>/images/p4-btn1-hv.png" alt="Siêu Xay Da">
										</a></li>
										<li class="btn-demo"><a href="javascript:void(0);" class="img_hv">
											<img src="<?=$styleTeaser?>/images/p4-btn5.png" alt="Siêu Xay Da">
											<img src="<?=$styleTeaser?>/images/p4-btn5-hv.png" alt="Siêu Xay Da">
										</a></li>
										
										<li class="btn-thele"><a href="javascript:void(0);" class="img_hv">
											<img src="<?=$styleTeaser?>/images/p4-btn3.png" alt="Siêu Xay Da">
											<img src="<?=$styleTeaser?>/images/p4-btn3-hv.png" alt="Siêu Xay Da">
										</a></li>
										<li class="btn-tuingoc"><a href="javascript:void(0);" class="img_hv">
											<img src="<?=$styleTeaser?>/images/p4-btn2.png" alt="Siêu Xay Da">
											<img src="<?=$styleTeaser?>/images/p4-btn2-hv.png" alt="Siêu Xay Da">
										</a></li>
										
										<li class="btn-lichsu"><a href="javascript:void(0);" class="img_hv">
											<img src="<?=$styleTeaser?>/images/p4-btn4.png" alt="Siêu Xay Da">
											<img src="<?=$styleTeaser?>/images/p4-btn4-hv.png" alt="Siêu Xay Da">
										</a></li>
									</ul>
									<ul class="ul-tab mb">
										<li class="active menu_tab_game btn-doicode"><a href="javascript:void(0);" class="img_hv">
											<div>Đổi Code</div>
										</a></li>
										<li class="btn-demo"><a href="javascript:void(0);" class="img_hv">
											<div>Code Của Bạn</div>
										</a></li>
										
										<li class="btn-thele"><a href="javascript:void(0);" class="img_hv">
											<div>Thế Lệ</div>
										</a></li>
										<li class="btn-tuingoc"><a href="javascript:void(0);" class="img_hv">
											<div>Túi Ngọc</div>
										</a></li>
										
										<li class="btn-lichsu"><a href="javascript:void(0);" class="img_hv">
											<div>Lịch Sử</div>
										</a></li>
									</ul>
								</div>
								 <!-- Game -->
								<video muted="" id='vid-trieuhoi'>
									<source src="<?=$styleTeaser?>/trieuhoi.mp4" type="video/mp4" >
								</video>
								</div>
							</div>
						</div>
					</div>
				</div>