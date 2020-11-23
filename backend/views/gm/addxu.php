<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nạp xu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-lg-12">
  <form action="" class="m-form m-form--fit m-form--label-align-right" id="f-nc-napxu">
	<div class="m-portlet">
		<!-- review --> 
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Nạp xu
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				
			</div>
		</div>
		<div class="m-portlet__body">
			<!-- content -->
			
               <div class="block" style="font-size: 13px; width: 100%; float: left;">
                    
					<div class="form-group m-form__group row has-danger">
						<label class="col-form-label col-lg-3 col-sm-12">
							Loại hình nạp
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<select class="form-control" name="select_tool" id="select_tool">
									 <option value="2">Nạp xu</option>
								</select>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="flaticon-settings"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger">
						<label class="col-form-label col-lg-3 col-sm-12">
							Phương thức nạp
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<select class="form-control" name="trade_type" id="trade_type">
									<option value="0">Chọn phương thức nạp</option>
									 <option value="1">Momo</option>
									 <option value="2">Ngân hàng</option>
									 <option value="3">Paypal</option>
									 <option value="4">Nạp thẻ dùm</option>
									 <option value="5">Đền bù thẻ lỗi</option>
								</select>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="flaticon-gift"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger" id="trans_id_div" style="display:none">
						<label class="col-form-label col-lg-3 col-sm-12">
							Id giao dịch:
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<input class="form-control" type="text" id="trans_id" name="trans_id" value="" />
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="flaticon-laptop"></i>
									</span>
								</div>
							</div>
							<div class="form-control-feedback">
								Hướng dẫn coi Id giao dịch 
								<a href="javascript:;" style="color:red;font-weight:bold" data-toggle="modal" data-target="#m_modal_1_2">
									ở đây 
								</a>
								<!--begin::Modal-->
								<div class="modal fade" id="m_modal_1_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">
													Modal title
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">
														&times;
													</span>
												</button>
											</div>
											<div class="modal-body">
												<p>
													Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
												</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">
													Close
												</button>
												<button type="button" class="btn btn-primary">
													Save changes
												</button>
											</div>
										</div>
									</div>
								</div>
								<!--end::Modal-->
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger">
						<label class="col-form-label col-lg-3 col-sm-12">
							Tài khoản:
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<input class="form-control" type="text" id="member_username" name="member_username" value="" />
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="flaticon-profile"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger">
						<label class="col-form-label col-lg-3 col-sm-12">
							Số xu:
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<input class="form-control" type="text" id="member_xu_real" name="member_xu_real" value="0" />
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="flaticon-piggy-bank"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger">
						<label class="col-form-label col-lg-3 col-sm-12">
							Xu thực nhận
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<input type="text" id="member_xu" class="form-control m-input" readonly value="0">
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="flaticon-coins"></i>
									</span>
								</div>
							</div>
							<div class="form-control-feedback">
								Xu thực nhận trong game
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger">
						<label class="col-form-label col-lg-3 col-sm-12">
							Nội dung nạp ( Momo, Paypal, Ck, vv):
						</label>
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<input class="form-control" type="text" id="gm_description" name="gm_description" value="" />
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-calendar-check-o"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group m-form__group row has-danger">
						
						<div class="col-lg-4 col-md-9 col-sm-12">
							<div class="input-group" id="m_daterangepicker_2_validate">
								<div style="width: 20%; float: left;">
									&nbsp;
								</div>
								<div style="width: 70%; float: left; color: green; font-weight: bold;" id="tool_result">
								   &nbsp;
								</div>
							</div>
						</div>
					</div>
					<div id="div-result"> 
						<div id="div-result-success" style="color:green;display:none">
							
						</div>
						<div id="div-result-error" style="color:red;display:none">
							&nbsp;
						</div>
					</div>
                </div>
			
			<div style="clear:both"></div>
			<!-- end content -->
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions">
				<div class="row">
					<div class="col-lg-9 ml-lg-auto">
						<button type="button" class="btn btn-brand" id="btnNapXu" > Nạp Xu </button>
					</div>
				</div>
			</div>
		</div>
	</div>	
	</form>	
</div>
</div>
<script>
$( document ).ready(function() {
	$('#trade_type').change(function(){
		if($(this).val() == 5){
			$('#trans_id_div').show();
		}else{
			$('#trans_id_div').hide();
		}
	});
	$("#member_xu_real").keyup(function(){
		member_xu_real 	= $("#member_xu_real").val();
		member_xu_real 	= parseInt(member_xu_real);
		trade_type 	= $("#trade_type").val();
		trade_type 	= parseInt(trade_type);
		if(trade_type == 1 || trade_type == 2 || trade_type == 3){
			$('#member_xu').val((member_xu_real/100)*120);
		}else{
			console.log(member_xu+' - '+trade_type);
			$('#member_xu').val(member_xu_real);
		}
	});
	$("#trade_type").change(function(){
		member_xu_real = $("#member_xu_real").val();
		member_xu_real = parseInt(member_xu_real);
		trade_type 	= $("#trade_type").val();
		trade_type 	= parseInt(trade_type);
		if(trade_type == 1 || trade_type == 2 || trade_type == 3){
			$('#member_xu').val((member_xu_real/100)*120);
		}else{
			console.log(member_xu_real+' - '+trade_type);
			$('#member_xu').val(member_xu_real);
		}
	});
});
$('#btnNapXu').click(function(){
	var paymentForm 	= $('#f-nc-napxu');
	var member_username = paymentForm.find("#member_username").val();
	var member_xu 		= paymentForm.find("#member_xu").val();
	var gm_description  = paymentForm.find("#gm_description").val();
	var trade_type  	= paymentForm.find("#trade_type").val();
	var trans_id  		= paymentForm.find("#trans_id").val();
	var member_xu_real  = paymentForm.find('#member_xu_real').val();
	
	
	if(member_username == ''){
		$('#div-result-error').html('Vui lòng điền tài khoản muốn nhận vàng');
		$('#div-result-error').show();
		paymentForm.find("#member_username").focus();
		return false;
	}
	if(isNaN(member_xu)){
		$('#div-result-error').html('Xu phải là số ');
		$('#div-result-error').show();
		paymentForm.find("#member_xu").focus();
		return false;
	}
	if(isNaN(trade_type)){
		$('#div-result-error').html('Vui lòng chọn loại hình nạp thẻ');
		$('#div-result-error').show();
		paymentForm.find("#trade_type").focus();
		return false;
	}
	if(trade_type == 5){
		if(trans_id == '' || isNaN(trans_id)){
			$('#div-result-error').html('Mã id giao dịch không được để trống');
			$('#div-result-error').show();
			paymentForm.find("#trans_id").focus();
			return false;
		}
	}
	if(member_xu == '' || member_xu == 0){
		$('#div-result-error').html('Vui lòng điền số Xu User sẽ nhận được');
		$('#div-result-error').show();
		paymentForm.find("#member_xu").focus();
		return false;
	}
	
	if(gm_description == ''){
		$('#div-result-error').html('Vui lòng điền nội dung thêm xu');
		$('#div-result-error').show();
		paymentForm.find("#gm_description").focus();
		return false;
	}
	var csrfToken = $('meta[name="csrf-token"]').attr("content");
	
	if(confirm("Bạn muốn hoàn thành giao dịch này ?")){
		$.ajax({
			method: "POST",// phương thức dữ liệu được truyền đi
			url: "/admin/index.php?r=ajax%2Faddxu",// gọi đến file server show_data.php để xử lý
			data: {
					member_username:member_username,
					member_xu:member_xu,
					member_xu_real:member_xu_real,
					gm_description:gm_description,
					trade_type:trade_type,
					trans_id:trans_id,
					_csrf: csrfToken
			},
			dataType: "json",
			success : function(response){//kết quả trả về từ server nếu gửi thành công
				console.log(response);
				if(!response.error){
					if(response.data.status == 1){
						// Thanh cong.
						$('#div-result-error').html('');
						$('#div-result-success').html('Bạn đã thêm '+response.data.xu+' vào ví thành công');
						$('#div-result-success').show();
						$('#trans_id_div').hide();
						paymentForm[0].reset();
					}else{
						// That bai.
						$('#div-result-success').html('');
						$('#div-result-error').html('Bạn đã thêm '+response.data.xu+' vào ví thất bại');
						$('#div-result-error').show();
						paymentForm[0].reset();
					}
				}
				else{
					// That bai.
					$('#div-result-success').html('');
					$('#div-result-error').html(response.msg);
					$('#div-result-error').show();
				}
			}
		});
	}
});
</script>

