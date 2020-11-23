<?php
use yii\helpers\Html;
use backend\models\VanchuyenModel;
use backend\models\KhachhangModel;
use backend\models\XuatkhoModel;
use backend\models\NhapkhoModel;
use backend\models\TonkhoModel;
use backend\models\ThuchiModel;
use common\models\Xuatkho;
use common\models\Nhapkho;
use common\models\XuatkhoItem;
use common\models\NhapkhoItem;
use common\models\SettingImportantValues;
use common\models\Kho;

$dataProviderVanchuyen 	= VanchuyenModel::getDataProviderVanChuyenToday();
$dataProviderPhieuthu	= ThuchiModel::getDataProviderPhieuthuToday();
$dataProviderPhieuchi	= ThuchiModel::getDataProviderPhieuchiToday();
$dataProviderKhachhanglienheToday = KhachhangModel::getDataProviderKhachhanglienheToday();
$dataProviderXuatkhoToday 	= XuatkhoModel::getDataProviderXuatkhoToday();
$dataProviderNhapkhoToday 	= NhapkhoModel::getDataProviderNhapkhoToday();
$dataProviderTonkhoToday	= TonkhoModel::getTonkhoByProduct();
$dataProviderTonkhoAllItem 	= TonkhoModel::getDataProviderTonkho();
$dataTongthuchi 			= ThuchiModel::getTonQuy();
$tonQuyCu 					= SettingImportantValues::find()->where(['code' => Yii::$app->params['codeTonQuyCu']])->one();
$dataKho					= Kho::find()->all();		
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<!--[if gte mso 9]><xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml><![endif]-->
<title>THAI DUONG EMAIL</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
<meta name="format-detection" content="telephone=no">
<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<!--<![endif]-->
<style type="text/css">
body {
	margin: 0 !important;
	padding: 0 !important;
	-webkit-text-size-adjust: 100% !important;
	-ms-text-size-adjust: 100% !important;
	-webkit-font-smoothing: antialiased !important;
}
img {
	border: 0 !important;
	outline: none !important;
}
p {
	Margin: 0px !important;
	Padding: 0px !important;
}
table {
	border-collapse: collapse;
	mso-table-lspace: 0px;
	mso-table-rspace: 0px;
}
td, a, span {
	border-collapse: collapse;
	mso-line-height-rule: exactly;
}
.ExternalClass * {
	line-height: 100%;
}
.em_defaultlink a {
	color: inherit !important;
	text-decoration: none !important;
}
span.MsoHyperlink {
	mso-style-priority: 99;
	color: inherit;
}
span.MsoHyperlinkFollowed {
	mso-style-priority: 99;
	color: inherit;
}
 @media only screen and (min-width:481px) and (max-width:699px) {
.em_main_table {
	width: 100% !important;
}
.em_wrapper {
	width: 100% !important;
}
.em_hide {
	display: none !important;
}
.em_img {
	width: 100% !important;
	height: auto !important;
}
.em_h20 {
	height: 20px !important;
}
.em_padd {
	padding: 20px 10px !important;
}
}
@media screen and (max-width: 480px) {
.em_main_table {
	width: 100% !important;
}
.em_wrapper {
	width: 100% !important;
}
.em_hide {
	display: none !important;
}
.em_img {
	width: 100% !important;
	height: auto !important;
}
.em_h20 {
	height: 20px !important;
}
.em_padd {
	padding: 20px 10px !important;
}
.em_text1 {
	font-size: 16px !important;
	line-height: 24px !important;
}
u + .em_body .em_full_wrap {
	width: 100% !important;
	width: 100vw !important;
}
}
</style>
<style type="text/css">
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size:12px;
}

#customers #customersInfo{
	background-color: #d7e2df;
}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #01517e;
  color: white;
}

#customersProducts th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #8BC34A;
  color: white;
}
#customersProducts td, #customersProducts th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size:12px;
}
#customersProducts tr{
  background-color: #f2f2f2;	
}
.info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
	text-transform: uppercase;
	color:white;
}
.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
	color:white;
}
</style>
<?php $this->head() ?>
</head>

<body class="em_body" style="margin:0px; padding:0px;" bgcolor="#efefef">
<?php $this->beginBody() ?>
<table class="em_full_wrap" valign="top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">
  <tbody><tr>
    <td valign="top" align="center">
		<table  class="em_main_table" style="width:700px;" width="700" cellspacing="0" cellpadding="0" border="0" align="center">
        <!--Header section-->
        <tbody>
		<tr>
          <td style="padding:15px;" class="em_padd" valign="top" bgcolor="#01517e" align="center">
		  <table bgcolor="#01517e" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
              <tbody><tr>
                <td align="right" bgcolor="#01517e" style="font-family:'Open Sans', Arial, sans-serif; font-size:12px; line-height:15px; color:white;" valign="top" align="center">
					01/21/2019
				</td>
              </tr>
            </tbody></table>
			</td>
        </tr>
        <!--//Header section--> 
        <!--Banner section-->
        <tr>
          <td valign="top" bgcolor="#ffffff" align="center">
			<table width="100%" cellspacing="0"  cellpadding="0" border="0" align="center">
				<tbody>
					<tr>
					<td valign="top" style='padding-top:10px;padding-bottom:10px;'>
						<table>
							<tr>
								<td align="center">
									<img src="https://cutram.vn/uploads/contents/logo_1515465776.png" alt="Creating Email Magic"  style="display: block;" />
								</td>
								<td width="100%" align="center" style="vertical-align: middle;">
									<h1 style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; line-height:15px; color:#024367;">BÁO CÁO TÌNH HÌNH KINH DOANH THÁI DƯƠNG</h1>
									
								</td>
							</tr>
						</table>
					</td>
					</tr>
				</tbody>
			</table>
			</td>
        </tr>
        <!--//Banner section--> 
        <!--Content Text Section-->
                 <tr>
          <td  class="em_padd" valign="top"  align="center">
			 
			 
			 <!-- content TỒN KHO -->
			 <table width="100%">
			   <tr>
				  <?php if(isset($dataTongthuchi['thu'])){?>
				  <td width="30%" style="padding:10px;background-color:#00c0ef">
					 <span class="info-box-text">TỔNG THU</span>
					 <span class="info-box-number"><?=number_format($dataTongthuchi['thu'])?> VNĐ</span>
				  </td>
				  <?php } ?>
				  <?php if(isset($dataTongthuchi['chi'])){?>
				  <td width="30%" style="padding:10px;background-color:#00a65a">
					 <span class="info-box-text">TỔNG CHI</span>
					 <span class="info-box-number"><?=number_format($dataTongthuchi['chi'])?> VNĐ</span>
				  </td>
				  <?php } ?>
				  <?php if(!empty($tonQuyCu) && isset($dataTongthuchi['chenhlech'])){?>
				  <td width="30%" style="padding:10px;background-color:#f39c12">
					 <span class="info-box-text">TỒN QUỸ</span>
					 <span class="info-box-number"><?=number_format($tonQuyCu->code_values+$dataTongthuchi['chenhlech'])?> VNĐ</span>
				  </td>
				  <?php } ?>
			   </tr>
			</table>
			<!-- end TỒN KHO -->
			 
			 <!-- content ban hang -->
			 <table id="customers">
			   <tr>
				  <th colspan='9'>PHIẾU BÁN HÀNG</th>
			   </tr>
			   <?php 
					$dataXuatkhoToday = $dataProviderXuatkhoToday->getModels();
					if(count($dataXuatkhoToday)>0){
					foreach($dataXuatkhoToday as $model){	
			   ?>
			   <tr id="customersInfo">
					<td>
						<?php echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['xuatkho/update','id'=>$model->id]).'">'.$model->code.'</a>';?>
					</td>
					<td>
						<?php echo date('d-m-Y',$model->in_date)?>
					</td>
					<td colspan="7">
						<?php echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['khachhang/update','id'=>$model->khachhang->id]).'">'.$model->khachhang->company.'</a>';?>
					</td>
			   </tr>
			   <tr>
				  <td colspan="9" style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Mã hàng hóa</th>
						   <th>Tên hàng</th>
						   <th>Kho</th>
						   <th>Khu vực</th>
						   <th>Số lượng</th>
						   <th>Giá nhập</th>
						   <th>Thành tiền</th>
						</tr>
						<?php 
							$dataHanghoa = XuatkhoItem::find()->where(['xuatkho_id'	=> $model->id])->all();
						?>
						<?php 
							$total 		= 0;
							$totalItem 	= 0;
							$totalNumProduct = 0;
							foreach($dataHanghoa as $key => $hh){
							$totalItem = $hh->price*$hh->quanlity;	
							$total += $totalItem;
							$totalNumProduct += $hh->quanlity;
						?>
						<tr class="item-selected">
							<td><?=$hh->products->code?></td>
							<td><?=$hh->products->name?></td>
							<td><?=$hh->kho->name?></td>
							<td><?=$hh->khobai->name?></td>
							<td class="item-soluong">
								<?=$hh->quanlity?>
							</td>
							<td class="item-gia">
								<?=number_format($hh->price)?>
							</td>
							<td><?=number_format($totalItem)?></td>
						</tr>
						<?php } ?>
						<tr class="item-selected">
						   <td colspan="6" align="right">Tổng số lượng:</td>	
						   <td align="left"> <?=$totalNumProduct?> cây </td>
						</tr>
						<?php if($model->soluongthua > 0){?>
						<tr>	
						   <td colspan="6" align="right">Cừ thừa:</td>	
						   <td align="left"> + <?php echo number_format($model->soluongthua). ' cây';?> </td>
						</tr>
						<?php } ?>
						<?php if($model->soluongthieu > 0){?>
						<tr>
						   <td colspan="6" align="right">Cừ thiếu:</td>	
						   <td align="left"> - <?php echo number_format($model->soluongthieu). ' cây';?> </td>
						</tr>
						<?php } ?>
						<tr>   
						   <td colspan="6" align="right">Tổng tiền:</td>	
						   <td align="left"> <?php echo number_format($model->thongkeByPhieuxuat['tongtien_cu_thucte'])?> </td>
						</tr>
						<?php if($model->thongkeByPhieuxuat['tiendatra'] > 0){?>
						<tr>   
						   <td colspan="6" align="right">Đã trả:</td>	
						   <td align="left"> <?php echo number_format($model->thongkeByPhieuxuat['tiendatra'])?> </td>
						</tr>
						<?php } ?>
						<?php if($model->thongkeByPhieuxuat['tienconnolai_thucte'] > 0){?>
						<tr>  
						   <td colspan="6" align="right">Còn nợ lại:</td>	
						   <td align="left"> <?php echo number_format($model->thongkeByPhieuxuat['tienconnolai_thucte'])?> </td>
						</tr>
						<?php } ?>
					 </table>
				  </td>
			   </tr>
					<?php } }else{ ?>
				<tr><td colspan="9">Hôm nay bạn chưa có phiếu bán hàng nào.</td></tr>
				<?php }?>
			</table>
			 <!-- end content ban hang -->
			 
			 
			 <!-- content nhap hang -->
			 <table id="customers">
			   <tr>
				  <th colspan='9'>PHIẾU NHẬP HÀNG</th>
			   </tr>
			   <?php 
					$dataNhapkhoToday = $dataProviderNhapkhoToday->getModels();
					if(count($dataNhapkhoToday)>0){
					foreach($dataNhapkhoToday as $model){	
			   ?>
			   <tr id="customersInfo">
					<td>
						<?php echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['nhapkho/update','id'=>$model->id]).'">'.$model->code.'</a>';?>
					</td>
					<td>
						<?php echo date('d-m-Y',$model->in_date)?>
					</td>
					<td colspan="7">
						<?php echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['nhacungcap/update','id'=>$model->nhacungcap->id]).'">'.$model->nhacungcap->name.'</a>';?>
					</td>
			   </tr>
			   <tr>
				  <td colspan="7" style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Mã hàng hóa</th>
						   <th>Tên hàng</th>
						   <th>Kho</th>
						   <th>Khu vực</th>
						   <th>Số lượng</th>
						   <th>Giá nhập</th>
						   <th>Thành tiền</th>
						</tr>
						<?php
							$dataHanghoa 	= NhapkhoItem::find()->where(['nhapkho_id'	=> $model->id])->all();	
							$total 			= 0;
							$totalItem 		= 0;
							$totalNumProduct= 0;
							foreach($dataHanghoa as $hh){
							$totalItem = $hh->price*$hh->quanlity;	
							$total += $totalItem;
							$totalNumProduct += $hh->quanlity;
						?>
						<tr>
							<td><?=$hh->products->code?></td>
							<td><?=$hh->products->name?></td>
							<td><?=$hh->kho->name?></td>
							<td><?=$hh->khobai->name?></td>
							<td><?=number_format($hh->quanlity)?></td>
							<td><?=number_format($hh->price)?></td>
							<td><?=number_format($totalItem)?></td>
						</tr>
						<?php } ?>
						<tr class="item-selected">
						   <td colspan="6" align="right">Tổng số lượng:</td>	
						   <td align="left"> <?=number_format($totalNumProduct)?> cây </td>
						</tr>
						<tr class="item-selected">
						   <td colspan="6" align="right">Tổng tiền:</td>	
						   <td align="left"><?=number_format($total)?> </td>
						</tr>
						<?php if($model->tiendatra > 0){?>
						<tr class="item-selected">
						   <td colspan="6" align="right">Đã trả:</td>	
						   <td align="left"> <?=number_format($model->tiendatra)?> </td>
						</tr>
						
						<?php if($model->tienconnolai > 0){?>
						<tr class="item-selected">
						   <td colspan="6" align="right">Còn nợ lại:</td>	
						   <td align="left"> <?=number_format($model->tienconnolai)?> </td>
						</tr>
						<?php } ?>
						
						<?php } ?>
					 </table>
				  </td>
			   </tr>
				<?php } }else{ ?>
				<tr><td colspan="9">Hôm nay bạn chưa có phiếu nhập hàng nào.</td></tr>
				<?php }?>
			</table>
			<!-- end content nhap hang -->
		  
			
			<!-- content nhap hang -->
			 <table id="customers">
			   <tr>
				  <th colspan='9'>THU CHI </th>
			   </tr>
			   <tr id="customersInfo">
				  <td>Phiếu thu <?php echo date('d-m-Y',time());?></td>
			   </tr>
			   <tr>
				  <td colspan="" style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Loại thu</th>
						   <th>Người nộp</th>
						   <th>Giá tiền</th>
						   <th>Mã phiếu bán hàng</th>
						</tr>
						<?php 
							$dataPhieuthu = $dataProviderPhieuthu->getModels();
							if(count($dataPhieuthu) > 0){
							foreach($dataPhieuthu as $model){	
						?>
								<tr class="item-selected">
								   <td><?php echo $model->loaithuchi->name;?></td>
								   <td>
								   <?php 
										if($model->group_of_voters_id==1)//nhanvien
										{
											if(!empty($model->nguoinopnhan->name)){
												echo $model->nguoinopnhan->name;
											}
										}
										elseif($model->group_of_voters_id==2) //nhacungcap
										{
											if(!empty($model->nguoinopnhan->name)){
												echo $model->nguoinopnhan->name;
											}
										}
										elseif($model->group_of_voters_id==3){ //khachhang
											if(!empty($model->nguoinopnhan->company)){
												echo $model->nguoinopnhan->company;
											}
										}
										else{
											echo 'Khác';
										}
								   ?>
								   </td>
								   <td><?php echo number_format($model->price);?></td>
								   <td class="item-soluong">
									  <?php 
										if(!empty($model->maphieuxuat)){
											if($model->thu_or_chi == $model->defaultPhieuthu){
												echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['xuatkho/update','id'=>$model->maphieuxuat->id]).'">'.$model->maphieuxuat->code.'</a>';
											}
											elseif($model->thu_or_chi == $model->defaultPhieuchi){
												echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['nhapkho/update','id'=>$model->maphieuxuat->id]).'">'.$model->maphieuxuat->code.'</a>';
											}
										}
										else{
											echo "";
										}
									  ?>
								   </td>
								</tr>
						<?php 
							}
							}else{
						  ?>
						  <tr><td colspan="8">Hôm nay bạn chưa có phiếu thu nào nào.</td></tr>
						  <?php } ?>
					 </table>
				  </td>
			   </tr>
			   
			   <tr id="customersInfo">
				  <td>Phiếu chi <?php echo date('d-m-Y',time());?></td>
			   </tr>
			   <tr>
				  <td colspan="" style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Loại chi</th>
						   <th>Người nhận</th>
						   <th>Giá tiền</th>
						   <th>Mã phiếu nhập</th>
						</tr>
						<?php 
							$dataPhieuchi = $dataProviderPhieuchi->getModels();
							if(count($dataPhieuchi) > 0){
							foreach($dataPhieuchi as $model){	
						?>
								<tr class="item-selected">
								   <td><?php echo $model->loaithuchi->name;?></td>
								   <td>
								   <?php 
										if($model->group_of_voters_id==1)//nhanvien
										{
											if(!empty($model->nguoinopnhan->name)){
												echo $model->nguoinopnhan->name;
											}
										}
										elseif($model->group_of_voters_id==2) //nhacungcap
										{
											if(!empty($model->nguoinopnhan->name)){
												echo $model->nguoinopnhan->name;
											}
										}
										elseif($model->group_of_voters_id==3){ //khachhang
											if(!empty($model->nguoinopnhan->company)){
												echo $model->nguoinopnhan->company;
											}
										}
										else{
											echo 'Khác';
										}
								   ?>
								   </td>
								   <td><?php echo number_format($model->price);?></td>
								   <td class="item-soluong">
									  <?php 
										if(!empty($model->maphieuxuat)){
											if($model->thu_or_chi == $model->defaultPhieuthu){
												echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['xuatkho/update','id'=>$model->maphieuxuat->id]).'">'.$model->maphieuxuat->code.'</a>';
											}
											elseif($model->thu_or_chi == $model->defaultPhieuchi){
												echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['nhapkho/update','id'=>$model->maphieuxuat->id]).'">'.$model->maphieuxuat->code.'</a>';
											}
										}
										else{
											echo "";
										}
									  ?>
								   </td>
								</tr>
						<?php 
							}
							}else{
						  ?>
						  <tr><td colspan="8">Hôm nay bạn chưa có phiếu chi nào nào.</td></tr>
						  <?php } ?>
					 </table>
				  </td>
			   </tr>
			</table>
			<!-- end content nhap hang -->
			
			
			<!-- content VẬN CHUYỂN  -->
			 <table id="customers">
			   <tr>
				  <th>VẬN CHUYỂN </th>
			   </tr>
			   <tr>
				  <td style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Ngày/Đêm</th>
						   <th>Xe</th>
						   <th>Tài xế</th>
						   <th>Khách hàng</th>
						   <th>Điểm đi</th>
						   <th>Điểm đến</th>
						   <th>Giá tiền</th>
						</tr>
					   
						  <?php 
						  $dataVanchuyen = $dataProviderVanchuyen->getModels();
						  if(count($dataVanchuyen)>0){
							  foreach($dataVanchuyen as $model){?>
							  <tr>
								  <td>
									  <?php 
										if($model->vanchuyen_ngay_or_dem == 1){
											echo 'Ngày';
										}
										elseif($model->vanchuyen_ngay_or_dem == 2){
											echo 'Đêm';
										}
									  ?>
								  </td>
								  <td>
									<?php 
										if($model->loaixe==1){
											echo '51D-20513';
										}elseif($model->loaixe==2){
											echo '51D-31873';
										}
									?>
								  </td>
								  <td>
									<?php 
										if(!empty($model->employees->name)){
											echo $model->employees->name;
										}
										else{
											echo 'Cả 2 xe';
										}
									?>
								  </td>
								  <td>
										<?php 
											if($model->flag_anhson==1){
												echo $model->khachhang->company;
											}else{
												echo 'Anh Sơn';
											}
										?>
								  </td>
								  <td><?php echo $model->diemdi; ?></td>
								  <td><?php echo $model->diemden; ?></td>
								  <td><?php echo number_format($model->giatien); ?></td>
							  </tr>
						<?php }
						  }else{
						 ?>
						  <tr>
						  <td colspan="8">Hôm nay bạn chưa có đơn hàng vận chuyển nào.</td>
						  </tr>
						  <?php } ?>
						 
					 </table>
				  </td>
			   </tr>
			</table>
			<!-- end content VẬN CHUYỂN -->
			
			
			<!-- content KHÁCH HÀNG LIÊN HỆ -->
			 <table id="customers">
			   <tr>
				  <th colspan='9'>KHÁCH HÀNG LIÊN HỆ</th>
			   </tr>
			   <tr>
				  <td style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Khách hàng</th>
						   <th>Người liên hệ</th>
						   <th>Số điện thoại</th>
						   <th>C/Ty cung ứng</th>
						   <th>Sản phẩm</th>
						   <th>Số lượng</th>
						   <th>Giá</th>
						</tr>
						<?php 
						$dataKhachhangLienhe = $dataProviderKhachhanglienheToday->getModels();
						if(count($dataKhachhangLienhe)){
							foreach($dataKhachhangLienhe as $model){
						?>
						<tr class="item-selected">
						  <td><?php echo '<a href="'.Yii::$app->urlManager->createAbsoluteUrl(['khachhang/update','id'=>$model->khachhang->id]).'">'.$model->khachhang->company.'</a>'; ?></td>
						  <td><?php echo $model->khachhang->fullname;?></td>
						  <td><?php echo $model->khachhang->phone;?></td>
						  <td><?php echo $model->company->name;?></td>
						  <td><?php echo $model->products->code;?></td>
						  <td><?php echo number_format($model->quanlity);?></td>
						  <td><?php echo number_format($model->price);?></td>
						</tr>
						<?php 
							}
						}else{ 
						?>
						<tr class="item-selected">
						  <td colspan="8">Hôm nay bạn chưa có liên hệ mới nào từ khách hàng.</td>
						</tr>
						<?php } ?>
					 </table>
				  </td>
			   </tr>
			</table>
			<!-- end KHÁCH HÀNG LIÊN HỆ -->
			
			
			
			 <!-- content BÁO CÁO TỒN KHO -->
			 <table id="customers">
			   <tr>
				  <th colspan='9'>BÁO CÁO TỒN KHO</th>
			   </tr>
			   <?php 
					foreach($dataKho as $kho){
			   ?>
			   <tr id="customersInfo">
					<td>
						<?php echo $kho->name; ?>
					</td>
			   </tr>
			   <tr>
				  <td colspan="9" style="padding:8px">
					 <table id="customersProducts" width="100%">
						<tr style="background-color: #aed0e4;">
						   <th>Kho</th>
						   <th>Kho bãi</th>
						   <th>Sản phẩm</th>
						   <th>Tồn kho</th>
						</tr>
						<?php 
						$dataProviderTonkhoAllItem 	= TonkhoModel::getDataProviderTonkhoByKhoId($kho->id);
						$dataTonkhoAllItem 			= $dataProviderTonkhoAllItem->getModels();
						if(count($dataTonkhoAllItem)){
							foreach($dataTonkhoAllItem as $model){
								if($model['tonkho'] != 0){
						?>
							<tr class="item-selected">
							  <td><?php echo $model['kho_name'] ?></td>
							  <td><?php echo $model['kho_bai_name']; ?></td>
							  <td><?php echo $model['product_name'].'('.$model['product_code'].')'; ?></td>
							  <td><?php echo number_format($model['tonkho']); ?></td>
							</tr>
						<?php } } ?>
						
						<?php 
							$totalTonkho = 0;
							$dataProviderTonkhoByProduct = TonkhoModel::getTonkhoByKhoIdGroupByProductCode($kho->id);
							foreach($dataProviderTonkhoByProduct as $data){
							$totalTonkho  += $data['tonkho'];
							if($data['tonkho'] > 0){
						?>
							<tr class="item-selected">
							   <td colspan="3" align="right"><?=$data['product_name']?> ( <?=$data['product_code']?> )</td>	
							   <td align="left"> <?=number_format($data['tonkho'])?> </td>
							</tr>
						<?php } } ?>
							<tr class="item-selected">
							   <td colspan="3" align="right"><b>Tổng tồn kho</b></td>	
							   <td align="left"> <?=number_format($totalTonkho)?> </td>
							</tr>
						
						<?php	
						}else{ 
						?>
						<tr class="item-selected">
						  <td colspan="4">Hiện không có sản phẩm nào trong kho</td>
						</tr>
						<?php } ?>
					</table>
				</td>
			   </tr>
			   <?php } ?>
			</table>	
			 <!-- end BÁO CÁO TỒN KHO -->
			
		  </td>
        </tr>

        <!--//Content Text Section--> 
        <!--Footer Section-->
        <tr>
          <td style="padding:38px 30px;" class="em_padd" valign="top" bgcolor="#f6f7f8" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
              <tbody>
              <tr>
                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:11px; line-height:18px; color:#999999;" valign="top" align="center">
				<a href="#" target="_blank" style="color:#999999; text-decoration:underline;">
					THAI DUONG GROUP
				  <br>
                  © 2019 All Rights Reserved.<br>
                 </td>
              </tr>
            </tbody></table></td>
        </tr>
        <tr>
          <td class="em_hide" style="line-height:1px;min-width:700px;background-color:#ffffff;"><img alt="" src="images/spacer.gif" style="max-height:1px; min-height:1px; display:block; width:700px; min-width:700px;" width="700" border="0" height="1"></td>
        </tr>
      </tbody></table></td>
  </tr>
</tbody></table>
<div class="em_hide" style="white-space: nowrap; display: none; font-size:0px; line-height:0px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
