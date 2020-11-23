<?php
use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUpload;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\GiftcodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thêm code vào kho';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-md-6">
		<!--begin::Portlet-->
				<div class="m-portlet m-portlet--tab">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Custom Controls
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					
						<div class="m-portlet__body">
							<div id="giftcodeUpload">Upload</div>
							<div class="form-group m-form__group">
								<label for="exampleSelect1">
									Loại code
								</label>
								<select class="form-control m-input m-input--square" id="giftcode_type">
									<option value="0">
										Chọn loại giftcode
									</option>
									<?php foreach($loaicodes as $t){?>
									<option value="<?=$t->code?>">
										<?=$t->name?>
									</option>
									<?php } ?>
								</select>
							</div>
							
							<button id="extrabutton" type="button" class="btn btn-success m-btn--wide">
								Thêm code
							</button>
							<div id="eventsmessage"></div>
							
						</div>
						
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
</div>
<?php 
$js = <<<JS
var extraObj = $("#giftcodeUpload").uploadFile({
url:"/admin/index.php?r=giftcode%2Fadd-giftcode",
multiple:true,
fileName:"myfile",
returnType:"json",
autoSubmit:false,
dynamicFormData: function()
{
	var data ={ giftcode_type:$('#giftcode_type').val() }
	return data;
},
onLoad:function(obj)
{
		$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Widget Loaded:");
},
onSubmit:function(files)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
	//return false;
},
onSuccess:function(files,data,xhr,pd)
{

	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
	
},
afterUploadAll:function(obj)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded");
	

},
onError: function(files,status,errMsg,pd)
{
	$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Error for: "+JSON.stringify(files));
},
onCancel:function(files,pd)
{
		$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Canceled  files: "+JSON.stringify(files));
}
});
$("#extrabutton").click(function()
{
	var code_type = $('#giftcode_type').val();
	if(code_type ==0){
		alert('Vui lòng chọn loại giftcode');
		return false;
	}
	extraObj.startUpload();
});  
JS;
$this->registerJS($js,View::POS_READY);
?>