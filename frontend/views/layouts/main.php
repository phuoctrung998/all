<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\base\View;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widget\LeftServersWidget;
use frontend\widget\HomePopupLoginWidget;
use frontend\widget\PopupPageWidget;
use frontend\models\SystemConfigModel;
use frontend\models\GlobalModel;
use frontend\models\ServerModel;
use frontend\widget\HeaderWidget;
use frontend\widget\FooterWidget;
use frontend\widget\ContentWidget;


$baseUrl 		= Yii::getAlias('@webDomain');
$styleUrl 		= Yii::getAlias('@webDomain').'/style/sieuxayda';
$style   		= Yii::getAlias('@webDomain').'/style/pc';
$styleCommonUrl = Yii::getAlias('@webDomain').'/style/common';
$modelSystemConfig 			= new SystemConfigModel();
$system_status_gameopen 	= $modelSystemConfig->getSystemConfigByCode('system_status_gameopen');
$url_choingay 		= '';
$globalModel 		= new GlobalModel();


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sieu Xayda">
    <link rel="shortcut icon" id="favicon" href="<?=$styleUrl?>/images/logo.png">
    <title>Siêu Xay Da</title>

    <!-- Fontawesome -->
    <link href="<?=$styleUrl?>/css/all.css" rel="stylesheet">
    <script src="<?=$styleUrl?>/js/all.js"></script>

    <!-- Framework core CSS -->
    <link href="<?=$styleUrl?>/css/animate.css" rel="stylesheet">
    <link href="<?=$styleUrl?>/css/keyframes.css" rel="stylesheet">
    <link href="<?=$styleUrl?>/css/slick.css" rel="stylesheet">
    <!-- Custom core CSS -->
    <link href="<?=$styleUrl?>/css/detail.css" rel="stylesheet">
    <link href="<?=$styleUrl?>/css/style.css" rel="stylesheet">
    <link href="<?=$styleUrl?>/css/responsive.css" rel="stylesheet">
    <link href="<?=$styleUrl?>/css/all.css" rel="stylesheet">
    <script src="<?=$styleUrl?>/js/all.js"></script>

    <!-- Framework core CSS -->
    <link href="<?=$style?>/css/animate.css" rel="stylesheet">
    <link href="<?=$style?>/css/keyframes.css" rel="stylesheet">
   
    <!-- Custom core CSS -->
    <link href="<?=$style?>/css/detail.css" rel="stylesheet">
    <link href="<?=$style?>/css/style.css" rel="stylesheet">
    <!--  <link href="<?=$style?>/css/responsive.css" rel="stylesheet"> -->
</head>
            

<body>
<?php $this->beginBody() ?>

            <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
                <div id="mask"></div>
                
                <!-- mobile -->
                <div class="menu_mb_bottom mb">
                        <div class="menu-mb-logo btn-login">
                            <img src="<?=$styleUrl?>/images/mb_play.png" alt="Siêu Xay Da">
                        </div>

                        

                        <div class="menu-mb-right">
                            <div class="menu-mb-title">
                                <img src="<?=$styleUrl?>/images/mb_txt.png" alt="Siêu Xay Da">
                            </div>
                            <!-- mobile menu bottom -->
                            <ul>
                                <?php if(!Yii::$app->user->isGuest){ ?>

                                    <li class="">
                                        <a class="" target="blank" href="https://www.facebook.com/SieuXayda.MangaPlay">
                                            <img src="<?=$styleUrl?>/images/mb_android.png" alt="Siêu Xay Da">
                                        </a>
                                    </li>

                                <?php } else{ ?>

                                    <li class="menu-mb-button btn-login">
                                        <a class="" href="javascript:void(0);">
                                            <img src="<?=$styleUrl?>/images/mb_android.png" alt="Siêu Xay Da">
                                        </a>
                                    </li>

                                <?php } ?>

                                    <li class="menu-mb-button btn-login">
                                        <a class="" href="javascript:void(0);">
                                            <img src="<?=$styleUrl?>/images/mb_ios.png" alt="Siêu Xay Da">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn-code" href="javascript:;">
                                        <img src="<?=$styleUrl?>/images/mb_gift-code.png" alt="Siêu Xay Da">
                                        </a>
                                    </li>
                            </ul>
                            <!-- end mobile menu bottom -->
                        </div>
                </div>
                <!-- mobile -->

            <!-- Begin: Menu Right for PC -->
                
            <!-- End: Menu Right for PC -->
            <!-- ============================ -->
            <!-- Begin: Menu -->

            <!-- Meunu Header -->
                <?=HeaderWidget::widget()?>
            <!--End header -->

                
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
            <!-- End: Menu -->
            <!-- ============================ -->
            <!-- Begin: Main Menu PC-->
            <section class='wrapper'>

                <div class='zindex' >
                    <div class="container row main-page">
                        
                        <div class="video">
                            <div class="cus play-video"></div>
                        </div>
                        <section>
                            <!-- Begin: Figure intro -->
                            <div class="mb sizeanimate " ><img src="<?=$styleUrl?>/images/slogan-mb.png" alt="" ></div>
                            <div class="figure-intro pc">
                                <div class="">
                                    <div class="figure-intro1 figure-img ">
                                        <img src="<?=$styleUrl?>/images/slogan01.png" alt="" class="sizeanimate">
                                    </div>
                                    <div class="figure-intro2 figure-img">
                                        <img src="<?=$styleUrl?>/images/slogan02.png" alt="" >
                                    </div>
                                    <div class="figure-intro3 figure-img " >
                                        <img src="<?=$styleUrl?>/images/slogan03.png" alt="" class="ani-up">
                                    </div>
                                    <div class="figure-intro4 figure-img">
                                        <img src="<?=$styleUrl?>/images/slogan04.png" alt="" class="ani-up02">
                                    </div>
                                    <div class="figure-intro5 figure-img">
                                        <img src="<?=$styleUrl?>/images/slogan05.png" alt="">
                                    </div>
                                </div>
                            </div>
                             <!-- Begin: main Menu MB -->
                            <div class="main-menu-mb mb">
                                <div class="zindex">
                                    <div class="">
                                        <ul>
                                            <li><a href="javascript:void(0)"><img src="<?=$styleUrl?>/images/mb-block01.png" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img src="<?=$styleUrl?>/images/mb-block02.png" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img src="<?=$styleUrl?>/images/mb-block03.png" alt=""></a></li>
                                            <li><a href="javascript:void(0)"><img src="<?=$styleUrl?>/images/mb-block04.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                       
                        </section>
            
                        <?=$content?>
                        
                    </div>
                </div>
            </section>
           
            <!-- End: Content Here -->
            <!-- ============================ -->
            <!-- Begin: Footer -->
            <?=FooterWidget::widget()?>
            <!-- End: Footer -->

            <!-- ============================ -->

            <!-- Begin: Popup -->
            <!-- Begin: popup login -->

                <?=HomePopupLoginWidget::widget()?>

            <!-- End: popup login -->

            <!-- Begin: Login Effect -->
            <div class='effect-login pc'>
                <img src='<?=$styleUrl?>/images/login-1.png' alt="" class='effect-login1'>
                <img src='<?=$styleUrl?>/images/login-2.png' alt="" class='effect-login2'>
                <img src='<?=$styleUrl?>/images/login-3.png' alt="" class='effect-login3'>
                <img src='<?=$styleUrl?>/images/login-4.png' alt="" class='effect-login4'>
            </div>
            <!-- End: Login Effect -->
                
            <!-- Begin: Popup Trailer -->
            <div class="video-bg show-sb">
                    <div class="video-game">
                        <div>
                            <div class="video-close img_hv">
                                <img src="<?=$styleUrl?>/images/close.png" alt="">
                                <img src="<?=$styleUrl?>/images/close-hv.png" alt="">
                            </div>
                            <div class="video_embed-responsive video_embed-responsive-16by9">
                                <iframe id='video_popup-youtube-player' width="100%" height="580px" src="https://www.youtube.com/embed/neAxD0ecNh0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End: Popup Trailer -->

            <div class="popup-defaul">
                <div class="close-popup"></div>
                <div class="content-popup">
                    <p>Popup Thông Báo</p>
                </div>
            </div>
            <!-- End: Popup Defaul -->
            <!-- Begin Popup Block 04 -->

            <?=PopupPageWidget::widget()?>
            

                <script src="<?=$style?>/js/jquery.min.js"></script>
                <script src="<?=$style?>/js/bootstrap.min.js"></script>
                <script src="<?=$style?>/js/wow.min.js"></script>
                <script src="<?=$style?>/js/slick.min.js"></script>
                <script src="<?=$style?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
                <script src="<?=$style?>/js/imageMapResizer.min.js"></script>
                <script src="<?=$style?>/js/main.js"></script>
                <script src="<?=$styleCommonUrl?>/js/napthe.js"></script>
                <script src="<?=$styleCommonUrl?>/js/doixu.js"></script>
                <script type="text/javascript" src="<?=$baseUrl?>/style/common/js/mainsite.js"></script>
                <script src="https://apis.google.com/js/api:client.js"></script>
                
                <!-- gate -->
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
                    startApp();
                </script>
                <script type="text/javascript">
                    $.ajaxSetup({
                    data: {"_csrf":"UW5aQVlXY0MWCRBxDiMQKCkYIygBOi4OYgkoeGsWTi8WFGsbKhIGEg=="}	      
                    });
                </script>



                <script src="<?=$styleUrl?>/js/carousel.js"></script>
                <script src="<?=$styleUrl?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
                <script src="<?=$styleUrl?>/js/parallax.js"></script>
                <script src="<?=$styleUrl?>/js/jquery.min.js"></script>
                <script src="<?=$styleUrl?>/js/slick.min.js"></script>
                <script src="<?=$styleUrl?>/js/main.js"></script>
                <script src="<?=$styleUrl?>/js/wow.min.js"></script>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>