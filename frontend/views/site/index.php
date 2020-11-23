<?php

/* @var $this yii\web\View */
use frontend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;
use frontend\widget\TrendWidget;
use frontend\widget\CateByType;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\widget\LeftServersWidget;
use frontend\widget\HomeSlider;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style/sieuxayda';
$style   	= Yii::getAlias('@webDomain').'/style/pc';
?>

<section>
            <div class='effect-right pc'>
                        <div class="menu-right">
                            <div class='mr-aside'>
                                
                            <?php if(!Yii::$app->user->isGuest){ ?>

                                <div class="">
                                    <a target="blank" href="https://www.facebook.com/SieuXayda.MangaPlay">
                                        <img  src="<?=$styleUrl?>/images/mr-card.gif" alt="Siêu Xay Da">
                                    </a>
                                </div>

                            <?php } else{ ?>
                                <div class="mr-top btn-login">
                                    <img  src="<?=$styleUrl?>/images/mr-card.gif" alt="Siêu Xay Da">
                                </div>
                            <?php } ?>
                              

                                <div class='mr-menu'>
                                
                                        <ul>
                                           
                                            <li>
                                                <a target="_blank" href="#" class='img_hv'>
                                                    <img src="<?=$styleUrl?>/images/mr-nt.png" alt="Siêu Xay Da">
                                                    <img src="<?=$styleUrl?>/images/mr-nt-hv.png" alt="Siêu Xay Da">
                                                </a>
                                            </li>
                                            <?php if(!Yii::$app->user->isGuest){ ?>
                                                <li>
                                                    <a target="_blank" href="/gift-code" class='img_hv'>
                                                        <img src="<?=$styleUrl?>/images/mr-and.png" alt="Siêu Xay Da">
                                                        <img src="<?=$styleUrl?>/images/mr-and-hv.png" alt="Siêu Xay Da">
                                                    </a>
                                                </li>
                                            <?php } else{ ?>
                                                <li>
                                                <a  href="#" class='img_hv btn-login'>
                                                    <img src="<?=$styleUrl?>/images/mr-and.png" alt="Siêu Xay Da">
                                                    <img src="<?=$styleUrl?>/images/mr-and-hv.png" alt="Siêu Xay Da">
                                                </a>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                    <div class="m-4"><img src="<?=$styleUrl?>/images/mr-txt.png" alt=""></div>
                                    <div class="mr-main-server"><a href="javascript:void(0)">NgocRong50</a></div>
                                    <div class="mr-server">
                                        <ul>
                                         
                                        <?php foreach($server as $t => $tt){
                                        ?>

                                                <li><a href="javascript:void(0)"><?=$tt->server_name?></a></li>
                                                
                                        <?php }?>
                                    
                                        </ul>
                                    </div>
                                    <div><img src="<?=$styleUrl?>/images/mr-seemore.png" alt=""></div>
                                </div>
                            
                                
                                
                            </div>
                            
                        </div>
            </div>
 
            <div class="col-sm-12">
                <div class="block01-news">
                    <div class="block-slide ">
                        <ul class="slide-news">
                            
                            <?php if(!empty($slides)){?>
                                <?php foreach($slides as $slide){?>
                                <div>
                                    <a <?php 
                                        if($slide->url != ''){
                                            echo 'href="'.$slide->url.'" target="_blank"';
                                        }else{
                                            echo 'href="javascript:;"';
                                        }
                                    ?>>
                                        <img src="<?=$baseUrl?>/uploads/<?=$slide->images?>" alt="Siêu Xayda">
                                    </a>	
                                </div>
                            <?php } } ?>

                        </ul>
                        

                    </div>
                    <div class="block-news">
                        <div class='tab-menu'>
                            <ul>
                                <li class="active">
                                    <span> 
                                        <img src="<?=$styleUrl?>/images/icon_01.png" alt="" class="d-none-pc">Nổi bật
                                    </span>
                                </li>
                                <li>
                                    
                                    <span>
                                        <img src="<?=$styleUrl?>/images/icon_02.png" alt="" class="d-none-pc">Tin tức
                                    </span>
                                </li>

                                <li>
                                    <span> 
                                        <img src="<?=$styleUrl?>/images/icon_03.png" alt="" class="d-none-pc">Sự kiện
                                    </span>
                                </li>
                                <li>
                                
                                    <span>
                                        <img src="<?=$styleUrl?>/images/icon_04.png" alt="" class="d-none-pc">Cẩm nang
                                    </span>
                                </li>
                            </ul>
                            <div class="menu-plus"></div>
                        </div>
                        
                        <div class='content-tab'>
                            <!-- Tin Tuc -->
                            <div class='tab active tab-huongdan'>
                                                                
                                        <?php foreach($noibat as $t => $tt){
                                            ?>
                                            <div class="block-image pc">
                                                <a href="/<?=$tt->post_slug?>">
                                                    <div class="pic float-left">
                                                        <img style="width:135px;height:90px" src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>" alt="">
                                                    </div>
                                                    <div class="detail float-left">
                                                        <?=ucfirst(strtolower(word_limit($tt->post_title,60)))?><br/>
                                                        
                                                        <div class="see_more"><a href="/<?=$tt->post_slug?>">Xem Thêm</a></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </a> 
                                            </div>
                                        <?php break; }?>    
                                        <?php foreach($noibat as $t => $tt){
                                            ?>
                                            <div class='block-content custom_new_mb mt-9'>
                                                <a href="/<?=$tt->post_slug?>">
                                                    <span>Nổi bật</span>

                                                    <div class="pic float-left mb">
                                                        <img src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>">
                                                    </div>

                                                    
                                                    <div class="tab-event-right">
                                                        <p><?=ucfirst(strtolower(word_limit($tt->post_title,60)))?></p>
                                                        <p class='date'><?=date('d/m/Y', strtotime($tt->post_datetime))?></p>
                                                    </div>
                                                    <div class="clear"></div>

                                                </a>
                                            </div>

                                        <?php }?>

                                    
                                                                            
                            </div>
                            <!-- Sự Kiện -->
                            <div class='tab tab-huongdan'>
                                    
                                        <?php foreach($tintuc as $t => $tt){
                                            ?>
                                            <div class="block-image pc">
                                                <a href="/<?=$tt->post_slug?>">
                                                    <div class="pic float-left">
                                                        <img style="width:135px;height:90px" src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>" alt="">
                                                    </div>
                                                    <div class="detail float-left">
                                                        <?=ucfirst(strtolower(word_limit($tt->post_title,60)))?><br/>
                                                        
                                                        <div class="see_more"><a href="/<?=$tt->post_slug?>">Xem Thêm</a></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </a> 
                                            </div>
                                        <?php break; }?>    
                                        <?php foreach($tintuc as $t => $tt){
                                                ?>

                                                <div class='block-content custom_new_mb mt-9'>
                                                <a href="/<?=$tt->post_slug?>">
                                                <span>Tin tức</span>

                                                    <div class="pic float-left mb">
                                                        <img src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>">
                                                    </div>

                                                    
                                                    <div class="tab-event-right">
                                                        <p><?=ucfirst(strtolower(word_limit($tt->post_title,60)))?></p>
                                                        <p class='date'><?=date('d/m/Y', strtotime($tt->post_datetime))?></p>
                                                    </div>
                                                    <div class="clear"></div>

                                                </a>
                                                </div>

                                            <?php }?>

                                
                                    
                                    
                            </div>
                            <!-- Tinh Nang -->
                            <div class='tab tab-huongdan'>
                                    
                                        <?php foreach($sukien as $t => $tt){
                                            ?>
                                            <div class="block-image pc">
                                                <a href="/<?=$tt->post_slug?>">
                                                    <div class="pic float-left">
                                                        <img style="width:135px;height:90px" src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>" alt="">
                                                    </div>
                                                    <div class="detail float-left">
                                                        <?=ucfirst(strtolower(word_limit($tt->post_title,60)))?><br/>
                                                        
                                                        <div class="see_more"><a href="/<?=$tt->post_slug?>">Xem Thêm</a></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </a> 
                                            </div>
                                        <?php break; }?>    
                                        <?php foreach($sukien as $t => $tt){
                                                ?>

                                                <div class='block-content custom_new_mb mt-9'>
                                                <a href="/<?=$tt->post_slug?>">
                                                <span>Sự kiện</span>

                                                    <div class="pic float-left mb">
                                                        <img src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>">
                                                    </div>

                                                    
                                                    <div class="tab-event-right">
                                                        <p><?=ucfirst(strtolower(word_limit($tt->post_title,60)))?></p>
                                                        <p class='date'><?=date('d/m/Y', strtotime($tt->post_datetime))?></p>
                                                    </div>
                                                    <div class="clear"></div>

                                                </a>
                                                </div>

                                        <?php }?>

                                    
                                    
                                
                            </div>
                            <!-- Huong Dan -->
                            <div class='tab tab-huongdan'>
                                
                                        <?php foreach($camnang as $t => $tt){
                                            ?>
                                            <div class="block-image pc">
                                                <a href="/<?=$tt->post_slug?>">
                                                    <div class="pic float-left">
                                                        <img style="width:135px;height:90px" src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>" alt="">
                                                    </div>
                                                    <div class="detail float-left">
                                                        <?=ucfirst(strtolower(word_limit($tt->post_title,60)))?><br/>
                                                        
                                                        <div class="see_more"><a href="/<?=$tt->post_slug?>">Xem Thêm</a></div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </a> 
                                            </div>
                                        <?php break; }?>    
                                        <?php foreach($camnang as $t => $tt){
                                                ?>

                                                <div class='block-content custom_new_mb mt-9'>
                                                <a href="/<?=$tt->post_slug?>">
                                                <span>Cẩm nang</span>

                                                    <div class="pic float-left mb">
                                                        <img src="<?=$baseUrl?>/uploads/<?=$tt->post_featured_image?>">
                                                    </div>

                                                    
                                                    <div class="tab-event-right">
                                                        <p><?=ucfirst(strtolower(word_limit($tt->post_title,60)))?></p>
                                                        <p class='date'><?=date('d/m/Y', strtotime($tt->post_datetime))?></p>
                                                    </div>
                                                    <div class="clear"></div>

                                                </a>
                                                </div>

                                        <?php }?>
                                
                                    
                            </div>
                        </div> 
                        <div class="seemore-mb mb"><a href="#">Xem Thêm</a></div>
                        
                    </div>
                    <div class="clear"></div>
                </div>	
            </div>
</section>

<section>
<div class="block02">
                    <div class="title pc"><img src="<?=$styleUrl?>/images/title-nv.png" alt=""></div>
                    <div class="block02-bg">
                        <div class="float-left menu-tab_figure">
                            <ul class="slide-menu slide-menu-pc pc">
                                <li data-togge='block-skill-1' class="active"><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon1-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon1.png" alt="Nhân Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-2' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon2-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon2.png" alt="Nhân Tộc" >
                                </a></li>
    
                                <li data-togge='block-skill-3' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon3-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon3.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-4'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon4-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon4.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-5'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon5-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon5.png" alt="Ma Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-6'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon6-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon6.png" alt="Ma Tộc">
                                </a></li>
                                <li data-togge='block-skill-7'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon7-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon7.png" alt="Nhân Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-8' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon8-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon8.png" alt="Nhân Tộc" >
                                </a></li>
    
                                <li data-togge='block-skill-9' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon9-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon9.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-10'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon10-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon10.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-11'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon11-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon11.png" alt="Ma Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-12'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon12-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon12.png" alt="Ma Tộc">
                                </a></li>
                                <li data-togge='block-skill-13'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon13-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon13.png" alt="Ma Tộc">
                                </a></li>
                            </ul>
                            <ul class="slide-menu mb slide-menu-mb">
                                <li data-togge='block-skill-1' class="active"><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon1-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon1.png" alt="Nhân Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-2' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon2-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon2.png" alt="Nhân Tộc" >
                                </a></li>
    
                                <li data-togge='block-skill-3' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon3-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon3.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-4'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon4-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon4.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-5'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon5-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon5.png" alt="Ma Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-6'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon6-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon6.png" alt="Ma Tộc">
                                </a></li>
                                <li data-togge='block-skill-7'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon7-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon7.png" alt="Nhân Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-8' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon8-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon8.png" alt="Nhân Tộc" >
                                </a></li>
    
                                <li data-togge='block-skill-9' ><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon9-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon9.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-10'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon10-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon10.png" alt="Tiên Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-11'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon11-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon11.png" alt="Ma Tộc">
                                </a></li>
    
                                <li data-togge='block-skill-12'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon12-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon12.png" alt="Ma Tộc">
                                </a></li>
                                <li data-togge='block-skill-13'><a href="javascript:void(0);" class="img_hv">
                                    <img src="<?=$styleUrl?>/images/nv-icon13-hv.png" alt="Nhân Tộc">
                                    <img src="<?=$styleUrl?>/images/nv-icon13.png" alt="Ma Tộc">
                                </a></li>
                            </ul>
                        </div>
                        <div class="float-left content_figure">
                            <div id="block-skill-1" class="block-skill active">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 1</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure1.png"> </div>
                            </div>
                            <div id="block-skill-2" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 2</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure2.png"> </div>
                            
                            </div>
                            <div id="block-skill-3" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 3</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure3.png"> </div>
                            </div>
                            <div id="block-skill-4" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 4</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure4.png"> </div>
                            </div>
                            <div id="block-skill-5" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 5</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure5.png"> </div>
                            </div>
                            <div id="block-skill-6" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 6</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure6.png"> </div>
                            </div>
                            <div id="block-skill-7" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 7</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure7.png"> </div>
                            </div>
                            <div id="block-skill-8" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 8</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure8.png"> </div>
                            </div>
                            <div id="block-skill-9" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 9</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure9.png"> </div>
                            </div>
                            <div id="block-skill-10" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 10</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure10.png"> </div>
                            </div>
                            <div id="block-skill-11" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 11</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure11.png"> </div>
                            </div>
                            <div id="block-skill-12" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 12</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure12.png"> </div>
                            </div>
                            <div id="block-skill-13" class="block-skill">
                                <div class="ani-skill pc">
                                    <div  class="ani-skill-width"><img src="<?=$styleUrl?>/images/s1-slide.png"></div>
                                </div>
                                <div class="slide02-gioithieu">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-gt.png"></h3>
                                    <p>Cách chơi của game đơn giản, dễ hiểu khi người chơi lựa chọn một trong ba chủng tộc (Saiyan, Majin, Android) để làm nhân vật chính, sau đó thu thập các chiến binh để có một đội hình phù hợp nhất tham gia vào các phụ bản chiến đấu</p>
                                </div>
                                <div class="slide02-dokho">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-dk.png"></h3>
                                    <p>Bộ quốc phòng Nhan Vat 13</p>
                                </div>
                                <div class="slide02-skill">
                                    <h3><img src="<?=$styleUrl?>/images/slide02-kn.png"></h3>
                                    <ul>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill01.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill02.png" alt=""></li>
                                        <li><img src="<?=$styleUrl?>/images/nv01-skill03.png" alt=""></li>
                                    </ul>
                                </div>
    
                                <div class="ani-figure"><img src="<?=$styleUrl?>/images/nv-figure13.png"> </div>
                            </div>
                        </div>
                        <div class="three-figure-effect mb">
                            <div id="TL_cn">
                                <div>
                                <img src="<?=$styleUrl?>/images/ps04.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps05.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps06.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps07.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps08.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps09.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps10.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps11.png">
                                </div>
                                <div style="display: none;">
                                    <img src="<?=$styleUrl?>/images/ps01.png">
                                </div>
                                <div style="display: block; opacity: 0.245479;">
                                    <img src="<?=$styleUrl?>/images/ps02.png">
                                </div>
                                <div style="display: block; opacity: 0.993844;">
                                    <img src="<?=$styleUrl?>/images/ps03.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

</section>

<section>
<div class="block03 pc">
                            <div class="title pc"><img src="<?=$styleUrl?>/images/title-ds.png" alt=""></div>
                            <div>
                                <div class="block03-slide">
                                    <div class="slide-box">
                                        <div class="slide-left">
                                            <ul class="slide">
                                            <?php if(!empty($slides)){?>
                                                <?php foreach($slides as $slide){?>
                                            <li class="item">                               
                                                <div>
                                                    <a <?php 
                                                        if($slide->url != ''){
                                                            echo 'href="'.$slide->url.'" target="_blank"';
                                                        }else{
                                                            echo 'href="javascript:;"';
                                                        }
                                                    ?>>
                                                    <a href="javascript:void(0)"><img src="<?=$baseUrl?>/uploads/<?=$slide->images?>" alt=""/></a>
                                                     
                                                    </a>	
                                                </div>                                          
                                            </li>
                                            <?php } } ?>
                                                                                                                            
                                            </ul>
                                            <div class="slide-navigation">
                                            <?php if(!empty($slides)){?>
                                                <?php foreach($slides as $slide){?>
                                                <div class="item">
                                               
                                                <figure class="image">
                                                    <img src="<?=$baseUrl?>/uploads/<?=$slide->images?>" alt=""/>
                                                </figure>
                                                
                                           
                                                </div>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="slide-figure">
                                            
                                            <div><img src="<?=$styleUrl?>/images/ds-figure1.png" alt=""></div>
                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
</section>

<section>
<div class="block04 pc">
                            <div class="title pc"><img src="<?=$styleUrl?>/images/title-hd.png" alt=""></div>
                            <div class="block04-content">
                                <ul>
                                    <li class="btn-page4"><a target="blank" href="/chuyen-muc/tan-thu" class="img_hv">
                                        <img src="<?=$styleUrl?>/images/hd-01.png" alt="">
                                        <img src="<?=$styleUrl?>/images/hd-01-hv.png" alt="">
                                    </a></li>

                                    <?php if(!Yii::$app->user->isGuest){ ?>
                                        <li  class="btn-page4"><a target="blank" href="/gift-code" class="img_hv">
                                            <img src="<?=$styleUrl?>/images/hd-02.png" alt="">
                                            <img src="<?=$styleUrl?>/images/hd-02-hv.png" alt="">
                                        </a></li>
                                    <?php } else{ ?>
                                        <li  class="btn-page4 btn-login"><a href="#" class="img_hv">
                                            <img src="<?=$styleUrl?>/images/hd-02.png" alt="">
                                            <img src="<?=$styleUrl?>/images/hd-02-hv.png" alt="">
                                        </a></li>
                                    <?php } ?>

                                    <li  class="btn-page4"><a href="#" class="img_hv">
                                        <img src="<?=$styleUrl?>/images/hd-03.png" alt="">
                                        <img src="<?=$styleUrl?>/images/hd-03-hv.png" alt="">
                                    </a></li>
                                    <li class="btn-page4"><a href="#" class="img_hv">
                                        <img src="<?=$styleUrl?>/images/hd-04.png" alt="">
                                        <img src="<?=$styleUrl?>/images/hd-04-hv.png" alt="">
                                    </a></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
						</div>
					
</section>


<?php 
$js = <<<JS
openPopup();
function openPopup(){
	$('#hidpopup').fadeIn();
	$('.pop-wating-open').fadeIn();
}
JS;
$this->registerJs($js,View::POS_READY);
?>
