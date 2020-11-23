<?php
use backend\assets\AppAsset;
use yii\widgets\ListView;
/* @var $this yii\web\View */
AppAsset::register($this);
$asset = backend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<!-- BEGIN: Subheader -->
<!-- END: Subheader -->
<div class="m-content">


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
								Ngày: <?=$today?>
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
								Ngày: <?=$today?>
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


<!-- aa-->
	<div class="m-portlet">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-xl-4">
					<!--begin:: Widgets/Stats2-1 -->
					<div class="m-widget1">
						<div class="m-widget1__item">
							<div class="row m-row--no-padding align-items-center">
								<div class="col">
									<h3 class="m-widget1__title">
										Doanh thu hôm nay (nạp thẻ)
									</h3>
									<span class="m-widget1__desc">
										<?=$today?>
									</span>
								</div>
								<div class="col m--align-right">
									<span class="m-widget1__number m--font-brand">
										<?=number_format((int)$danhthu_today['total_money'])?> VNĐ
									</span>
								</div>
							</div>
						</div>
						<div class="m-widget1__item">
							<div class="row m-row--no-padding align-items-center">
								<div class="col">
									<h3 class="m-widget1__title">
										Xu trong ví
									</h3>
									<span class="m-widget1__desc">
										<?=$day_prev?>
									</span>
								</div>
								<div class="col m--align-right">
									<span class="m-widget1__number m--font-danger">
										<?=number_format((int)$xutrongvi['total_xu'])?> VNĐ
									</span>
								</div>
							</div>
						</div>
						<div class="m-widget1__item">
							<div class="row m-row--no-padding align-items-center">
								<div class="col">
									<h3 class="m-widget1__title">
										Doanh thu Tổng
									</h3>
									<span class="m-widget1__desc">
										all day
									</span>
								</div>
								<div class="col m--align-right">
									<span class="m-widget1__number m--font-danger">
										<?=number_format((int)$doanhthu_tong)?> VNĐ
									</span>
								</div>
							</div>
						</div>
					</div>
					<!--end:: Widgets/Stats2-1 -->
				</div>
				<div class="col-xl-4">
					<!--begin:: Widgets/Daily Sales-->
					<div class="m-widget14">
						<div class="m-widget14__header m--margin-bottom-30">
							<h3 class="m-widget14__title">
														CHƯA CÓ GÌ
													</h3>
							<span class="m-widget14__desc">
														Chưa có gì code
													</span>
						</div>
						<div class="m-widget14__chart" style="height:120px;">
							<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
								<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
									<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
								</div>
								<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
									<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
								</div>
							</div>
							<canvas id="m_chart_daily_sales" width="594" height="180" class="chartjs-render-monitor" style="display: block; height: 120px; width: 396px;"></canvas>
						</div>
					</div>
					<!--end:: Widgets/Daily Sales-->
				</div>
				<div class="col-xl-4">
                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14">
                    <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
							Thông số maketing
						</h3>
                        <span class="m-widget14__desc">
							<?=number_format($thanhviendangky)?> thành viên
						</span>
                    </div>
                    <div class="row  align-items-center">
                        <div class="col">
                            <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                <div class="m-widget14__stat">
                                    100%
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="m-widget14__legends">
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                    <span class="m-widget14__legend-text">
										<?=number_format($thanhviendangky_homnay)?> đăng ký mới
									</span>
                                </div>
                                <!--
								<div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                    <span class="m-widget14__legend-text">
										47% Đăng nhập
									</span>
                                </div>
                                <div class="m-widget14__legend">
                                    <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                    <span class="m-widget14__legend-text">
										19% Khác
									</span>
                                </div>
								-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Profit Share-->
            </div>
			</div>
		</div>
	</div>
	
	
	
	
</div>