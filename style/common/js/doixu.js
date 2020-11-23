function changedoixu(form_id){
	var paymentForm 	= $('#'+form_id);
	var stlLoainap 		= paymentForm.find("#sltloainap").val();
	stlLoainap			= parseInt(stlLoainap);
	//console.log(stlLoainap);
	if(stlLoainap != 1){
		paymentForm.find("#xucharge").hide();
	}else{
		paymentForm.find("#xucharge").show();
	}
}

/* XU LY THE NAP */
function validateDoixu(form_id)
{
	var paymentForm 	= $('#'+form_id);
	var sltserver 		= paymentForm.find("#sltserver").val();
	var xucharge 		= paymentForm.find("#xucharge").val();
	xucharge			= parseInt(xucharge);
	var memberxu 		= paymentForm.find("#memberxu").val();
	memberxu			= parseInt(memberxu);
	var sltloainap 		= paymentForm.find("#sltloainap").val();
	var username		= $('#txtMemberLoged').val();
	var csrfToken = $('meta[name="csrf-token"]').attr("content");
	
	if(memberxu == 0){
		alert('Số xu trong ví không đủ, vui lòng nạp xu trước!');
		return false;
	}
	if(sltloainap == 0){
		alert('Vui lòng chọn loại nạp của bạn .');
		return false;
	}
	if(sltloainap == 1){
		if(xucharge == '' || xucharge < 50){
			alert('Số xu muốn đổi nhỏ nhất là 50 xu');
			return false;
		}
		
		if(xucharge > memberxu){
			alert('Số xu cần đổi không được lớn hơn xu bạn có trong ví');
			return false;
		}
	}
	
	if(sltserver == 0){
		alert('Vui lòng chọn máy chủ để nạp xu .');
		return false;
	}
	
	
	var textAlert   = "Bạn có chắc chắn muốn chuyển "+xucharge+" xu thành vàng ?";
	var r = confirm(textAlert);
	if (r == true) {
		$.ajax({
			type: "POST",
			url	: "/ajax-doi-xu",
			data: {
				sltserver	: sltserver,
				xucharge	: xucharge,
				username	: username,
				sltloainap	: sltloainap,
				'_csrf' 	: csrfToken
				
			},
			dataType: "json",
			beforeSend: showche(),
			success: function(response) {
				hideche();
				console.log(response);
				//var rs =  $.parseJSON(response);
				if (!response.error == 1) {
					alert(response.msg);
					paymentForm[0].reset();
					return true;
				}
				else {
					alert(response.msg);
					paymentForm[0].reset();
					hideche();
					return false;
				}
			},
			error: function (jqXHR, exception) {                
				if (jqXHR.status === 0) {
					alert('Not connect.\n Verify Network.');
				} else if (jqXHR.status == 404) {
					alert('Requested page not found. [404]');
				} else if (jqXHR.status == 500) {
					alert('Internal Server Error [500].'+exception.toString());
				} else if (exception === 'parsererror') {
					alert('Requested JSON parse failed.');
				} else if (exception === 'timeout') {
					alert('Time out error.');
				} else if (exception === 'abort') {
					alert('Ajax request aborted.');
				} else {
					alert('Uncaught Error.\n' + jqXHR.responseText);
				}
				paymentForm[0].reset();
				hideche();
			}
		});
	}
}