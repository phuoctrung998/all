<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\widget\TopPartnerWidget;
use frontend\widget\TopHeaderWidget;
use frontend\widget\HtmlContentWidget;
use frontend\widget\LeaderShipWidget;
use frontend\widget\SettingsWidget;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
  
?>
				<div id="content" role="main" class="content-area">
                     <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_2080061672">
                        <div data-parallax-fade="true" data-parallax="2">
                           <div class="img-inner image-zoom-long dark" >
                              <img width="4041" height="1005" src="<?=$baseUrl?>/uploads/slides/<?=$dataSlider->images?>" class="attachment-large size-large" alt="" 
							  srcset="<?=$baseUrl?>/uploads/slides/<?=$dataSlider->images?> 4041w, <?=$baseUrl?>/uploads/slides/<?=$dataSlider->images?> 768w" sizes="(max-width: 4041px) 100vw, 4041px" />                
                           </div>
                        </div>
                        <style scope="scope">
                        </style>
                     </div>
                     <div class="gap-element" style="display:block; height:auto; padding-top:60px" class="clearfix"></div>
                     <div class="row"  id="row-1612821113">
                        <div class="col small-12 large-12"  >
                           <div class="col-inner"  >
                              <section class="section locvienb dark" id="section_781970395">
                                 <div class="bg section-bg fill bg-fill  bg-loaded" >
                                 </div>
                                 <!-- .section-bg -->
                                 <div class="section-content relative">
                                    <div class="gap-element" style="display:block; height:auto; padding-top:40px" class="clearfix"></div>
                                    <div class="row"  id="row-1791426843">
                                       <div class="col medium-9 small-12 large-9"  >
                                          <div class="col-inner"  >
                                             <h1 style="font-weight: 500; margin-bottom: 25px; color: #fff;">
											 <?=HtmlContentWidget::widget(["code"=>"html_gioithieu_gioithieuchung","type"=>"title"])?>
											 </h1>
                                             <?=HtmlContentWidget::widget(["code"=>"html_gioithieu_gioithieuchung","type"=>"content"])?>
                                          </div>
                                       </div>
                                       <div class="col medium-3 small-12 large-3"  >
                                          <div class="col-inner text-center"  >
                                             <div class="row"  id="row-45264922">
                                                <div class="col hide-for-small small-12 large-12"  >
                                                   <div class="col-inner"  >
                                                      <div class="gap-element" style="display:block; height:auto; padding-top:30px" class="clearfix"></div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_2090999121">
                                                <a href="<?=Yii::$app->params['webDomain'].'uploads/contents/'?><?=SettingsWidget::widget(["field"=>'brochure'])?>" target="_self" class="">
                                                   <div data-animate="flipInY">
                                                      <div class="img-inner image-zoom-long dark" >
                                                         <img width="258" height="137" src="<?=$styleUrl?>/images/r46h.png" class="attachment-large size-large" alt="" />                
                                                      </div>
                                                   </div>
                                                </a>
                                                <style scope="scope">
                                                </style>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- .section-content -->
                                 <style scope="scope">
                                    #section_781970395 {
                                    padding-top: 0px;
                                    padding-bottom: 0px;
                                    background-color: #162d61;
                                    }
                                 </style>
                              </section>
                           </div>
                        </div>
                     </div>
                     <div class="gap-element" style="display:block; height:auto; padding-top:40px" class="clearfix"></div>
                     <div class="row"  id="row-77335061">
                        <div class="col small-12 large-12"  >
                           <div class="col-inner"  >
                              <section class="section has-parallax" id="section_1244595400">
                                 <div class="bg section-bg fill bg-fill  " data-parallax-container=".section" data-parallax-background data-parallax="-3">
                                 </div>
                                 <!-- .section-bg -->
                                 <div class="section-content relative">
                                    <div class="row"  id="row-1177557151">
                                       <div class="col medium-5 small-12 large-5"  data-animate="bounceIn">
                                          <div class="col-inner"  >
                                             <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_636896652">
                                                <div class="img-inner dark" >
                                                   <img width="690" height="500" src="<?=$baseUrl?>/uploads/contents/<?=HtmlContentWidget::widget(["code"=>"html_gioithieu_cacmoclichsu","type"=>"images"])?>" class="attachment-large size-large" alt="" />                
                                                </div>
                                                <style scope="scope">
                                                </style>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col medium-7 small-12 large-7"  >
                                          <div class="col-inner"  >
                                             <h2 style="font-weight: 500; margin-bottom: 25px; color: #0170af;">
												<?=HtmlContentWidget::widget(["code"=>"html_gioithieu_cacmoclichsu","type"=>"title"])?>
											</h2>
                                             <?=HtmlContentWidget::widget(["code"=>"html_gioithieu_cacmoclichsu","type"=>"content"])?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- .section-content -->
                                 <style scope="scope">
                                    #section_1244595400 {
                                    padding-top: 0px;
                                    padding-bottom: 0px;
                                    }
                                    #section_1244595400 .section-bg.bg-loaded {
                                    background-image: url(<?=$styleUrl?>/images/img-right-k3-duc-profile-bizweb.png);
                                    }
                                    #section_1244595400 .section-bg {
                                    background-position: 90% 23%;
                                    }
                                 </style>
                              </section>
                           </div>
                        </div>
                     </div>
                     <div class="row align-center"  id="row-117612064">
                        <div class="col small-12 large-12"  >
                           <div class="col-inner"  >
                              <section class="section dark" id="section_65065431">
                                 <div class="bg section-bg fill bg-fill  " >
                                 </div>
                                 <!-- .section-bg -->
                                 <div class="section-content relative">
                                    <div class="row align-center"  id="row-61631553">
                                       <div class="col small-12 large-12"  >
                                          <div class="col-inner text-center"  >
                                             <div class="gap-element" style="display:block; height:auto; padding-top:30px" class="clearfix"></div>
                                             <h2 style="font-weight: 500; margin-bottom: 25px; color: #fff;">
												<?=HtmlContentWidget::widget(["code"=>"html_gioithieu_doingulanhdao","type"=>"title"])?>
											</h2>
                                             <?=HtmlContentWidget::widget(["code"=>"html_gioithieu_doingulanhdao","type"=>"content"])?>
                                          </div>
                                       </div>
                                       <style scope="scope">
                                       </style>
                                    </div>
                                 </div>
                                 <!-- .section-content -->
                                 <style scope="scope">
                                    #section_65065431 {
                                    padding-top: 0px;
                                    padding-bottom: 0px;
                                    background-color: rgb(255, 255, 255);
                                    }
                                    #section_65065431 .section-bg.bg-loaded {
                                    background-image: url(<?=$styleUrl?>/images/bg-bottom-k2-duc-profile-bizweb.png);
                                    }
                                 </style>
                              </section>
                           </div>
                        </div>
                        <div class="col medium-6 small-12 large-6"  >
                           <div class="col-inner"  >
                              <div class="gap-element" style="display:block; height:auto; padding-top:11px" class="clearfix"></div>
                              <?=HtmlContentWidget::widget(["code"=>"html_gioithieu_doingulanhdao_noidung","type"=>"content"])?>
                              <div class="gap-element" style="display:block; height:auto; padding-top:10px" class="clearfix"></div>
                           </div>
                        </div>
                        <div class="col medium-6 small-12 large-6"  >
                           <div class="col-inner"  >
                              <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_416912587">
                                 <div class="img-inner dark" >
                                    <img width="1200" height="846" src="<?=$baseUrl?>/uploads/contents/<?=HtmlContentWidget::widget(["code"=>"html_gioithieu_doingulanhdao_noidung","type"=>"images"])?>" class="attachment-large size-large" alt="" srcset="<?=$baseUrl?>/uploads/contents/<?=HtmlContentWidget::widget(["code"=>"html_gioithieu_doingulanhdao_noidung","type"=>"images"])?> 1200w, <?=$baseUrl?>/uploads/contents/<?=HtmlContentWidget::widget(["code"=>"html_gioithieu_doingulanhdao_noidung","type"=>"images"])?> 768w" sizes="(max-width: 1200px) 100vw, 1200px" />                
                                 </div>
                                 <style scope="scope">
                                 </style>
                              </div>
                           </div>
                        </div>
                        <style scope="scope">
                        </style>
                     </div>
                     <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_720967472">
                        <div class="img-inner dark" >
                           <img width="1600" height="600" src="<?=$styleUrl?>/images/de.jpg" class="attachment-large size-large" alt="" srcset="<?=$styleUrl?>/images/de.jpg 1600w, <?=$styleUrl?>/images/de-768x288.jpg 768w" sizes="(max-width: 1600px) 100vw, 1600px" />                
                        </div>
                        <style scope="scope">
                        </style>
                     </div>
                </div>