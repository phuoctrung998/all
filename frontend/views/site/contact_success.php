<?php
use frontend\widget\TopPartnerWidget;
use frontend\widget\TopHeaderWidget;
use frontend\widget\HtmlContentWidget;
use frontend\widget\SliderWidget;
use frontend\widget\HomeNewsWidget;
use frontend\widget\HomeDuanWidget;
use frontend\widget\HomeTopHeaderWidget;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;
use frontend\widget\PartnerWidget;
$baseUrl 	= Yii::getAlias('@webDomain');
$styleUrl 	= Yii::getAlias('@webDomain').'/style';
?>
<div id="content" role="main" class="content-area">
                     
                     <div class="row"  id="row-996590230">
                        <div class="col medium-6 small-12 large-6"  >
                           <div class="col-inner"  >
                              <div class="tabbed-content">
                                 <ul class="nav nav-divided nav-normal nav-size-large nav-center">
                                    <li class="tab active has-icon"><a href="#tab_trỤ-sỞ-hÀ-nỘi">
										<span><?=PartnerWidget::widget(["code"=>'cn01',"field"=>'title'])?></span></a>
									</li>
                                    <li class="tab has-icon"><a href="#tab_vp-ĐẠi-diỆn-miỀn-nam">
										<span><?=PartnerWidget::widget(["code"=>'cn02',"field"=>'title'])?></span></a>
									</li>
                                 </ul>
                                 <div class="tab-panels">
                                    <div class="panel active" id="tab_trỤ-sỞ-hÀ-nỘi">
										
                                       <div class="google-map relative mb" id="map-1590067318">
                                          <div class="map-height" id="map-1590067318-inner">
											<?=PartnerWidget::widget(["code"=>'cn01',"field"=>'quote'])?>
										  </div>
                                          <div id="map_overlay_top"></div>
                                          <div id="map_overlay_bottom"></div>
                                          <div class="map_inner map-inner last-reset absolute x100 md-x95 lg-x95 y100 md-y95 lg-y95">
                                             <p><span style="font-size: 14.4px;">
											 Điạ chỉ: <?=PartnerWidget::widget(["code"=>'cn01',"field"=>'address'])?>
											 </span></p>
                                          </div>
                                          <style scope="scope">
                                             #map-1590067318 .map-inner {
                                             background-color: rgb(255, 255, 255);
                                             max-width: 100%;
                                             }
                                             #map-1590067318 .map-height {
                                             height: 470px;
                                             }
                                             @media (min-width:550px) {
                                             #map-1590067318 .map-inner {
                                             max-width: 40%;
                                             }
                                             }
                                             @media (min-width:850px) {
                                             #map-1590067318 .map-inner {
                                             max-width: 30%;
                                             }
                                             }
                                          </style>
                                       </div>
                                       <!-- .map -->
                                    </div>
                                    <div class="panel" id="tab_vp-ĐẠi-diỆn-miỀn-nam">
                                       <div class="google-map relative mb" id="map-243696840">
                                          <div class="map-height" id="map-243696840-inner">
											<?=PartnerWidget::widget(["code"=>'cn02',"field"=>'quote'])?>
										  </div>
                                          <div id="map_overlay_top"></div>
                                          <div id="map_overlay_bottom"></div>
                                          <div class="map_inner map-inner last-reset absolute x100 md-x95 lg-x95 y100 md-y95 lg-y95">
                                             <p><span style="font-size: 14.4px;">
											 Điạ chỉ : <?=PartnerWidget::widget(["code"=>'cn02',"field"=>'address'])?>
											 </span></p>
                                          </div>
                                          <style scope="scope">
                                             #map-243696840 .map-inner {
                                             background-color: rgb(255, 255, 255);
                                             max-width: 100%;
                                             }
                                             #map-243696840 .map-height {
                                             height: 470px;
                                             }
                                             @media (min-width:550px) {
                                             #map-243696840 .map-inner {
                                             max-width: 40%;
                                             }
                                             }
                                             @media (min-width:850px) {
                                             #map-243696840 .map-inner {
                                             max-width: 30%;
                                             }
                                             }
                                          </style>
                                       </div>
                                       <!-- .map -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col medium-6 small-12 large-6"  >
                           <div class="col-inner"  >
								<div class="gap-element" style="display:block; height:auto; padding-top:42px" class="clearfix"></div>
								<div id="ninja_forms_form_1_cont" class="ninja-forms-cont">
									<div id="ninja_forms_form_1_wrap" class="ninja-forms-form-wrap">
										<div id="ninja_forms_form_1_response_msg" style="" class="ninja-forms-response-msg "></div>
										<div style="text-align:center">
											<span style="color:red">Cảm ơn quý khách đã liên hệ. <br> Chúng tôi sẽ phản hồi lại trong thời gian sớm nhất !</span>
										</div>
									</div>
								</div>
                           </div>
                        </div>
                     </div>
                  </div>
<?php 
$urlAjax = \Yii::$app->urlManager->createUrl(['site/send-email-contact']);

$fullname 		= $model->fullname;
$email 			= $model->email;
$telephone_m 	= $model->telephone_m;
$title			= $model->title;
$body			= $model->body;
$csrfParam 	= Yii::$app->request->csrfParam;
$csrfToken	= Yii::$app->request->csrfToken;

$jsLoadBottom = <<< JS
	$.ajax({
            type: "POST",
            url: "$urlAjax",
            data: {
                fullname			:'$fullname',
                email 				:'$email',
				telephone_m			:'$telephone_m',
				title				:'$title',
				body				:'$body',
				address				:'$address',
				$csrfParam			: '$csrfToken'
            },
            dataType: "json",
            success: function (response) {
            },
            complete: function (jqXHR, textStatus ) {
            }
    });
JS;
$this->registerJs($jsLoadBottom,$this::POS_READY);
?>				