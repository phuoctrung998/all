<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Máy chủ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servers-index">


<div class="row">
<div class="col-lg-12">
  
<div class="m-portlet">
	<!-- review --> 
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					DANH SÁCH GIAO DỊCH
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			
		</div>
	</div>
	<div class="m-portlet__body">
	<!-- content -->
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Trừ xu</h2>
			<form action="" id="f-nc-napxu">
               <div class="block" style="font-size: 13px; width: 100%; float: left;">
                    <div style="width: 100%; float: left;padding-bottom: 8px;">
                        <div style="width: 20%; float: left;">
                            <label>Chọn tool:</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <select class="form-control" name="select_tool" id="select_tool">
        			             <option value="2">Trừ Xu</option>
        			        </select>
                        </div>
                    </div>
			        <div style="width: 100%; float: left;padding-bottom: 8px;" id="enter_member">
                        <div style="width: 20%; float: left;">
                            <label>Tài khoản Thành viên:</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <input class="form-control" type="text" id="member_username" name="member_username" value="" />
                        </div>
                    </div>
                    <div style="width: 100%; float: left;padding-bottom: 8px;" id="enter_member">
                        <div style="width: 20%; float: left;">
                            <label>Số xu:</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <input class="form-control" type="text" id="member_xu" name="member_xu" value="" />
                        </div>
                    </div>
					<div style="width: 100%; float: left;padding-bottom: 8px;" id="group_gm_description">
                        <div style="width: 20%; float: left;">
                            <label>Nội dung nạp ( Momo, Paypal, Ck, vv):</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <input class="form-control" type="text" id="gm_description" name="gm_description" value="" />
                        </div>
                    </div>
					<div style="width: 100%; float: left;padding-bottom: 8px;">
                        <div style="width: 20%; float: left;">
							&nbsp;
                        </div>
                        <div style="width: 70%; float: left; color: green; font-weight: bold;" id="tool_result">
                           &nbsp;
                        </div>
                    </div>
					<style>
					#btnNapXu {
						background-color: #f44336; /* Green */
						border: none;
						color: white;
						padding: 15px 32px;
						text-align: center;
						text-decoration: none;
						display: inline-block;
						font-size: 16px;
						border-radius: 8px;
						cursor: pointer;
					}
					#btnNapXu:hover {
						box-shadow: 0 6px 6px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
					}
					</style>
			        <div style="width: 100%; float: left;padding-bottom: 8px;">
                        <div style="width: 20%; float: left;">
							&nbsp;
                        </div>
                        <div style="width: 70%; float: left; color: green; font-weight: bold;" id="tool_result">
                            <button type="button" id="btnNapXu" > Trừ xu </button>
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
			</form>	
			<div style="clear:both"></div>
            </div>
        </div>
<script>
$('#btnNapXu').click(function(){
	var paymentForm 	= $('#f-nc-napxu');
	var member_username = paymentForm.find("#member_username").val();
	var member_xu 		= paymentForm.find("#member_xu").val();
	var gm_description  = paymentForm.find("#gm_description").val();
	
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
	if(member_xu == '' || member_xu == 0){
		$('#div-result-error').html('Vui lòng điền số Xu User sẽ nhận được');
		$('#div-result-error').show();
		paymentForm.find("#member_xu").focus();
		return false;
	}
	
	if(gm_description == ''){
		$('#div-result-error').html('Vui lòng điền nội dung trừ xu');
		$('#div-result-error').show();
		paymentForm.find("#gm_description").focus();
		return false;
	}
	if(confirm("Bạn muốn hoàn thành giao dịch này ?")){
		$.ajax({
			method: "POST",// phương thức dữ liệu được truyền đi
			url: "/admin/index.php?r=ajax%2Ftruxu",// gọi đến file server show_data.php để xử lý
			data: {member_username:member_username,member_xu:member_xu,gm_description:gm_description},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
			dataType: "json",
			success : function(response){//kết quả trả về từ server nếu gửi thành công
				
				if(!response.error){
					if(response.data.status == 1){
						// Thanh cong.
						$('#div-result-success').html('Bạn đã trừ '+response.data.xu+' từ ví '+member_username+' thành công');
						$('#div-result-success').show();
						paymentForm[0].reset();
					}else{
						// That bai.
						$('#div-result-success').html('Bạn đã trừ '+response.data.xu+' từ ví '+member_username+' thất bại');
						$('#div-result-error').show();
						paymentForm[0].reset();
					}
				}
				else{
					// That bai.
					$('#div-result-error').html(response.msg);
					$('#div-result-error').show();
				}
			}
		});
	}	
});
</script>
	<!-- content -->
	</div>
</div>
	</div>
</div>
</div>

