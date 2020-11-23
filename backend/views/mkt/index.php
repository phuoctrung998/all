<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MktSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mkts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkt-index">

    <?php echo $this->render('_search', ['model' => $reportModel]); ?>

</div>


<!--- begin --->
<div class="row">
   
    <div class="col-xl-6">
        <!--begin:: Widgets/Product Sales-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
							Doanh thu trong ngày ( tiền thực nhận )
							<span class="m-portlet__head-desc">
								Ngày: <?=$start_date?> đến <?=$end_date?>
							</span>
						</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget25">
                    <span class="m-widget25__price m--font-brand">
						<?=number_format($tongdoanhthu*200)?>
					</span>
                    <span class="m-widget25__desc">
						Tổng nạp
					</span>
                    <div class="m-widget25--progress">
                        <div class="m-widget25__progress">
                            <span class="m-widget25__progress-number">
								<?=number_format($tongnap_the*200)?>
							</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
								<?php 
									$percen_napthe = 0;
									if($tongnap_the>0){
										$percen_napthe = $tongnap_the / $tongdoanhthu * 100;
									}
								?>
                                <div class="progress-bar m--bg-danger" role="progressbar" 
									style="width: <?=round($percen_napthe,0, PHP_ROUND_HALF_EVEN);?>%;" 
									aria-valuenow="50" 
									aria-valuemin="0" 
									aria-valuemax="100">
								</div>
                            </div>
                            <span class="m-widget25__progress-sub">
								Nạp thẻ
							</span>
                        </div>
                        <div class="m-widget25__progress">
                            <span class="m-widget25__progress-number">
								<?=number_format($tongnap_xu*200)?>
							</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
								<?php 
									$percen_napxu = 0;
									if($tongnap_xu>0){
										$percen_napxu = $tongnap_xu / $tongdoanhthu * 100;
									}
								?>
                                <div class="progress-bar m--bg-accent" role="progressbar" style="width: <?=round($percen_napxu,0, PHP_ROUND_HALF_EVEN);?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget25__progress-sub">
								GM nạp ví (momo,paypal,ngân hàng...)
							</span>
                        </div>
                        <div class="m-widget25__progress">
                            <span class="m-widget25__progress-number">
								<?=number_format($tongnap_vang*200)?>
							</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
								<?php 
									$percen_vang = 0;
									if($tongnap_vang>0){
										$percen_vang = $tongnap_vang / $tongdoanhthu * 100;
									}
								?>
                                <div class="progress-bar m--bg-warning" role="progressbar" style="width: <?=round($percen_vang,0, PHP_ROUND_HALF_EVEN);?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget25__progress-sub">
								GM nạp vàng
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Product Sales-->
    </div>
	
	 <div class="col-xl-6">
        <!--begin:: Widgets/Product Sales-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
							Doanh thu ingame
							<span class="m-portlet__head-desc">
								Ngày: <?=$start_date?> đến <?=$end_date?>
							</span>
						</h3>
						
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget25">
                    <span class="m-widget25__price m--font-brand">
						<?=number_format($tongdoisoat*200)?>
					</span>
                    <span class="m-widget25__desc">
						Đối soát nạp vàng vào game
					</span>
                    <div class="m-widget25--progress">
                        <div class="m-widget25__progress">
                            <span class="m-widget25__progress-number">
								<?=number_format($tructiep_napthe*200)?>
							</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
								<?php 
									$percen_tructiep_napthe = 0;
									if($tructiep_napthe>0){
										$percen_tructiep_napthe = $tructiep_napthe / $tongdoisoat * 100;
									}
								?>
                                <div class="progress-bar m--bg-danger" role="progressbar" 
									style="width: <?=round($percen_tructiep_napthe,0, PHP_ROUND_HALF_EVEN);?>%;" 
									aria-valuenow="50" 
									aria-valuemin="0" 
									aria-valuemax="100">
								</div>
                            </div>
                            <span class="m-widget25__progress-sub">
								Nạp thẻ trực tiếp
							</span>
                        </div>
                        <div class="m-widget25__progress">
                            <span class="m-widget25__progress-number">
								<?=number_format($tructiep_tieuxu*200)?>
							</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
								<?php 
									$percen_tructiep_tieuxu = 0;
									if($tructiep_tieuxu>0){
										$percen_tructiep_tieuxu = $tructiep_tieuxu / $tongdoisoat * 100;
									}
								?>
                                <div class="progress-bar m--bg-accent" role="progressbar" style="width: <?=round($percen_tructiep_tieuxu,0, PHP_ROUND_HALF_EVEN);?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget25__progress-sub">
								Xu chuyển vàng vào game
							</span>
                        </div>
                        <div class="m-widget25__progress">
                            <span class="m-widget25__progress-number">
								<?=number_format($tructiep_napvang_gm*200)?>
							</span>
                            <div class="m--space-10"></div>
                            <div class="progress m-progress--sm">
								<?php 
									$percen_tructiep_napvang_gm = 0;
									if($tructiep_napvang_gm>0){
										$percen_tructiep_napvang_gm = $tructiep_napvang_gm / $tongdoisoat * 100;
									}
								?>
                                <div class="progress-bar m--bg-warning" role="progressbar" 
								style="width: <?=round($percen_tructiep_napvang_gm,0, PHP_ROUND_HALF_EVEN);?>%;" 
								aria-valuenow="50" aria-valuemin="0" 
								aria-valuemax="100"></div>
                            </div>
                            <span class="m-widget25__progress-sub">
								GM nạp vàng
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Product Sales-->
    </div>
</div>
<!-- end -->
