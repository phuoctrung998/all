jQuery(document).ready(function($) {
	/* Click Server Play */
	$('.server_play').click(function(){
		var loginFlag 	= $('#loginFlag').val();
		if(loginFlag == 1){
			server_status 	= $(this).attr('server_status');
			server_slug 	=  $(this).attr('server_slug');
			server_name 	=  $(this).attr('server_name');
			if(server_status == 1){
				window.location.href = '/may-chu/'+server_slug;
			}else if(server_status == 2){
				alert('Máy chủ '+server_name+' đang được bảo trì, vui lòng chọn máy chủ khác !!!');
			}else if(server_status == 3){
				alert('Máy chủ '+server_name+' quá đông, vui lòng chọn máy chủ khác !!!');
			}else if(server_status == 4){
				alert('Máy chủ '+server_name+' đã đầy, vui lòng chọn máy chủ khác !!!');
			}
		}else{
			$('.formHomeFlashLogin')
			  .SlickModals('setEffect', 'popup', 'fadeIn')
			  .SlickModals('setType', 'delayed', '0s')
			  .SlickModals('openPopup');
		}	
	});
});