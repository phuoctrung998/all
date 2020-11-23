<?php
use yii\helpers\Url;
use yii\widgets\ListView;
$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
?>

<section class='menu'>
        <div class='zindex'>
            <div class="container">
                <div class='logo pc'><a href='index.html'><img src='<?=$styleUrl?>/images/logo.png'></a></div>
                <div class="pc menu-pc">
                    <div>
                        <ul>
                            <li class="img_hv active"><a href='/'>
                                <img src="<?=$styleUrl?>/images/menu-01.png" alt="">
                                <img src="<?=$styleUrl?>/images/menu-01-hv.png" alt="">
                            </a></li>
                            <li class="img_hv"><a href='/chuyen-muc/tin-tuc'>
                                <img src="<?=$styleUrl?>/images/menu-02.png" alt="">
                                <img src="<?=$styleUrl?>/images/menu-02-hv.png" alt="">
                            </a></li>
                            <li class="img_hv"><a href='/chuyen-muc/su-kien'>
                                <img src="<?=$styleUrl?>/images/sukien1.png" alt="">
                                <img src="<?=$styleUrl?>/images/sukien2.png" alt="">
                            </a></li>
                            <li class="img_hv"><a href='#'>
                                <img src="<?=$styleUrl?>/images/menu-04.png" alt="">
                                <img src="<?=$styleUrl?>/images/menu-04-hv.png" alt="">
                            </a></li>
                            <li class="img_hv"><a href='#'>
                                <img src="<?=$styleUrl?>/images/menu-05.png" alt="">
                                <img src="<?=$styleUrl?>/images/menu-05-hv.png" alt="">
                            </a></li>
                            <li class="img_hv"><a target="blank" href='https://www.facebook.com/SieuXayda.MangaPlay'>
                                <img src="<?=$styleUrl?>/images/menu-06.png" alt="">
                                <img src="<?=$styleUrl?>/images/menu-06-hv.png" alt="">
                            </a></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="mb menu-mb">
                    <div id="toolbar">
                        <a class="open-left"  href="javacript:void(0)"><span></span><span></span><span></span></a>
                    </div>
                    <div id='menu-left--mb'>
                        <div class="menu-left-logo"><a href='./index.html'></a></div>
                        <div class='menu-left-close'><i class="fas fa-times"></i></div>
                        <div>
                            <ul class="menu-left-list" >
                                <li class='active'><a href="./index.html">Trang Chủ</a></li>
                                <li><a href="/chuyen-muc/tin-tuc">Tin Tức</a></li>
                                <li><a href="#">Sự Kiện</a></li>
                                <li><a href="#">Nạp Thẻ</a></li>
                                <li><a href="#">Thư Viện</a></li>
                                <li><a href="https://www.facebook.com/SieuXayda.MangaPlay">Fanpage</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Giftcode -->
                    <div class="menu-btn">
                        <ul>
                            <li><a><img src="<?=$styleUrl?>/images/menuTop-giftcode.png" alt=""></a></li>
                            <li><a><img src="<?=$styleUrl?>/images/menuTop-fanpage.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="menu-info">

                        <?php if(!Yii::$app->user->isGuest){?>
                            <div class="ava float-left"><img src="<?=$styleUrl?>/images/avatar.png"></div>
                            <div class="float-left">
                                <div class="name">Hello: <?=Yii::$app->user->identity->member_username?></div>
                                <div class="info"><a  href="/thong-tin-tai-khoan"> Thông tin tài khoản </a> | 
                                
                                <a href="javascript:;" class="btnHomeLogout">Thoát</a></div>
                            </div>
                        <?php } ?>

                        <?php if(!Yii::$app->user->isGuest){?>
                            <div class="info-login pc">
                                <div class="ava float-left"><img src="<?=$styleUrl?>/images/avatar.png"></div>
                                    <div class="float-left">
                                        
                                            <li>
                                            <b style="color:white"> Hello: <?=Yii::$app->user->identity->member_username?> </b> <br>
                                                <a href="/thong-tin-tai-khoan" class="mobile-menu-pop">
                                                
                                                    Thông tin tài khoản 
                                                </a>
                                                |
                                                <a href="javascript:;" class="btnHomeLogout"> Thoát !</a>
                                            </li>
                                        
                                    </div>                  
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
    </section>