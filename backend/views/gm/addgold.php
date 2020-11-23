<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Vàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servers-index">
<style>
#btnNapVang {
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
#btnNapVang:hover {
	box-shadow: 0 6px 6px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>

<div class="row">
<div class="col-lg-12">
  
	<div class="m-portlet">
		<!-- review --> 
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Add Vàng
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				
			</div>
		</div>
		<div class="m-portlet__body">
			<!-- content -->
			<form action="" id="f-nc-napvang">
               <div class="block" style="font-size: 13px; width: 100%; float: left;">
                    <div style="width: 100%; float: left;padding-bottom: 8px;">
                        <div style="width: 20%; float: left;">
                            <label>Chọn tool:</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <select class="form-control" name="select_tool" id="select_tool" onchange="changeSelectTool(this.value);">
        			             <option value="2">Add vàng</option>
        			        </select>
                        </div>
                    </div>
			        <div style="width: 100%; float: left;padding-bottom: 8px;">
                        <div style="width: 20%; float: left;">
                            <label>Chọn server:</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <select class="form-control" name="select_server" id="slserver_index">
								<option value="">chọn serser</option>
                                <?php 
                                foreach ($server_list as $s) {
                                ?>
        			            <option value="<?php echo $s->server_index;?>">
									<?=$s->server_name?>
								</option>
        			            <?php 
                                }
        			            ?>
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
                            <label>Số kim cương:</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <input class="form-control" type="text" id="member_knb" name="member_knb" value="" />
                        </div>
                    </div>
					<div style="width: 100%; float: left;padding-bottom: 8px;" id="enter_member">
                        <div style="width: 20%; float: left;">
                            <label>Nội dung nạp ( Momo, Paypal, Ck, vv):</label>
                        </div>
                        <div style="width: 70%; float: left;">
                            <input class="form-control" type="text" id="member_desc" name="member_desc" value="" />
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
					
			        <div id="div-ajax" style="width: 100%; float: left;padding-bottom: 8px;">
                        <div style="width: 20%; float: left;">
							&nbsp;
                        </div>
                        <div style="width: 70%; float: left; color: green; font-weight: bold;" id="tool_result">
                            <button type="button" id="btnNapVang" > Nạp Vàng </button>
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
			<!-- end content -->
		</div>
	</div>	
</div>
</div>
<script>
$('#btnNapVang').click(function(){
	var paymentForm 	= $('#f-nc-napvang');
	var slserver_index 	= paymentForm.find("#slserver_index").val();
	var member_username = paymentForm.find("#member_username").val();
	var member_knb 		= paymentForm.find("#member_knb").val();
	var member_desc 	= paymentForm.find("#member_desc").val();
	
	if(slserver_index == "" && slserver_index == 0){
		$('#div-result-error').html('Vui lòng chọn máy chủ muốn nạp vàng');
		$('#div-result-error').show();
		paymentForm.find("#slserver_index").focus();
		return false;
	}
	if(member_username == ''){
		$('#div-result-error').html('Vui lòng điền tài khoản muốn nhận vàng');
		$('#div-result-error').show();
		paymentForm.find("#member_username").focus();
		return false;
	}
	if(isNaN(member_knb)){
		$('#div-result-error').html('Vàng phải là số ');
		$('#div-result-error').show();
		paymentForm.find("#member_xu").focus();
		return false;
	}
	if(member_knb == '' || member_knb == 0){
		$('#div-result-error').html('Vui lòng điền số vàng User sẽ nhận được');
		$('#div-result-error').show();
		paymentForm.find("#member_knb").focus();
		return false;
	}
	
	if(member_desc == '' || member_desc == 0){
		$('#div-result-error').html('Vui lòng điền nội dung nạp vàng từ đâu, Momo, đền bù, paypal, chuyển khoản.');
		$('#div-result-error').show();
		paymentForm.find("#member_desc").focus();
		return false;
	}
	console.log(member_desc);
	$.ajax({
		method: "POST",// phương thức dữ liệu được truyền đi
		url: "/admin/index.php?r=ajax%2Faddgold",// gọi đến file server show_data.php để xử lý
		data: {
				slserver_index:slserver_index,
				member_username:member_username,
				member_knb:member_knb,
				member_desc:member_desc
		},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
		dataType: "json",
		success : function(rs){//kết quả trả về từ server nếu gửi thành công
			//var rs = $.parseJSON(response);
			console.log(rs);
			if(rs.error == false){
				// Thanh cong.
				$('#div-result-success').html(rs.msg);
				$('#div-result-success').show();
				paymentForm[0].reset();
			}
			else{
				// That bai.
				$('#div-result-error').html(rs.msg);
				$('#div-result-error').show();
				paymentForm[0].reset();
			}
		}
	});
});
</script>
		<!-- content -->
	</div>
</div>
	</div>
</div>
</div>

