(function($) {
	"use strict";
	$(document).ready(function() {
		var csrf_params =  	$('meta[name=csrf-param]').prop('content');
		var csrf_token  = 	$('meta[name=csrf-token]').prop('content');
		/** đổi code **/
		$('body').delegate('.btn-doicodephuonghoang', 'click', function(e){
			var loginFlag = $("#loginFlag").val();
			var minigame_input_vongxoay_point = $('#minigame_input_vongxoay_point').val();
			if(loginFlag == 0){ // chua dang nhap hien pop dang nhap
				$('#hidpopup').fadeIn();
				$('.pop-login').fadeIn();
				return false;
			}
			// da dang nhap hien code theo moc chon
			var codeid 		= $(this).data("id");
			var code_point 	= $(this).data("point");
			var data = {
				csrf_params : csrf_token,
				codeid : codeid
			}
			handleDoiCode(data,function(response){
				console.log(response);
				if(!response.error){
					clickReceiveCode(response.data.code);
					$('.minigame_vongquay_point').html(response.data.member_point);
					$('.minigame_vongquay_longphuonghoang').html(response.data.member_longphuonghoang);
				}else{
					clickReceiveCode('Bạn chưa đủ điều kiện nhận code');
				}
			})
		}).on('submit', function(e){
			e.preventDefault();
		});
	});
})(jQuery);		
/** hiệu ứng **/

var hieu_ung = {
	'el': '#img_quay',
	'stop_point': null,
	'interval_id': null,
	'stop_index': {
		1:[0],		//Cong 2 diem
		8:[45], 	//Them luot
		7:[90],  	//Phuong hoang 1 [checked]
		6:[135], 	//Cong 1 diem
		5:[180], 	//Cong 5 diem
		4:[225], 	//Cong 1 diem [checked]
		3:[270], 	//Phuong hoang 2 [checked]
		2:[315] 	// Cong 1 diem
	}, 
	'rotate_count': 8,
	'old_point' : {
		'check' : false,
		'value_old' : null,
		'value_new' : null
	},
	'play': function()
	{
		if (!this.stop_point)
			return;
		
		if(this.old_point.value_old == null){
			this.old_point.value_old = this.old_point.value_new;
		}
		
		$(this).css('-webkit-transform', 'rotate('+this.old_point.value_old+'deg)');
		$(this).css('-moz-transform', 'rotate('+this.old_point.value_old+'deg)');
		$(this).css('transform', 'rotate('+this.old_point.value_old+'deg)');
		//console.log('Giá trị v_old : ' + this.old_point.value_old);

		var v_old = this.old_point.value_old ;
		var v_stop = this.stop_point;
		var element = this.el;
		var v_this = this;

			$(this.el).animate({  transform: v_stop }, {
				step: function(now,fx) {
					fx.start = v_old;
					if(now >= v_old){
						$(this).css('-webkit-transform','rotate('+now+'deg)'); 
						$(this).css('-moz-transform','rotate('+now+'deg)');
						$(this).css('transform','rotate('+now+'deg)');
					}
				},
				duration: 5000
			}, 'ease-out'
			);
		//},0)
		
	},
	'stop': function ()
	{
		$(this.el).stop();
	},
	'setStopPoint': function(params)
	{
		if(this.stop_point != null){
			this.old_point.check = true;
		}
		var arr_point = this.stop_index[params.coupon_id];

		// Biến tác động quay đến ô nào
		var valueArrPoint = arr_point[Math.floor(Math.random() * arr_point.length)];

		console.log('Giá trị tọa độ : ' + valueArrPoint);

		this.stop_point = this.rotate_count*360 + valueArrPoint;

		if(this.old_point.check){
			this.old_point.value_old = this.old_point.value_new;
			this.old_point.value_new = valueArrPoint;

		}else{
			this.old_point.value_old = 0;
			this.old_point.value_new = valueArrPoint;
		} 
	}
};
/** end hiệu ứng **/

/** xoay**/
var isBusying = false;
function quay() {
	var minigame_input_vongxoay_luotchoi = $('#minigame_input_vongxoay_luotchoi').val();
	if(parseInt(minigame_input_vongxoay_luotchoi) == 0){
		clickReceivePopMessage('Lượt quay của bạn đã hết!');
		return false;
	}	
	if (!isBusying) {
		//$('#img_quay').addClass('unlimit');
		isBusying 		= true;
		$('.audio').trigger("pause");
		$('.audio-xoay').trigger("play");
		var csrf_params =  	$('meta[name=csrf-param]').prop('content');
		var csrf_token  = 	$('meta[name=csrf-token]').prop('content');
		var data = {
			csrf_params : csrf_token
		}
		
		handleChoi(data,function(res){
			if(!res.error){
				console.log(res);
				var outcome = res.data.outcome;
				isBusying = true;
                var response = {
					"Successfully": true,
					"Status": null,
					"GiftPart": {
						"Id": 0,
						"Point": 45,
						// Trả về giá trị random từ 1 tới 10
						// "Name": Math.floor(Math.random() * 10) + 1, 
						// Trả về giá trị cố định (ở đây đang set trả về giá trị thứ 5)
 						"Name": outcome,
						"Label": "45",
						"Frequency": 0,
						"CampaignId": null
				  	},
				  	"TotalPoint": 0
				}
                setTimeout(function(){
                	if(1 == 1){ 
                		if (response.Successfully) {
                            hieu_ung.setStopPoint({ 'coupon_id': response.GiftPart.Name });
                            //$('#img_quay').removeClass('unlimit');
                            $('#ketqua').html('.');
                            hieu_ung.play();
                            //setTimeout(function () { alert("Chúc mừng bạn đã được tích " + response.Data.Name + " điểm vào tài khoản."); isBusying = false; }, 9000);
                            setTimeout(function () {
                                isBusying = false;
								var messageResult = 'Chúc mừng bạn nhận được ';
                                switch(response.GiftPart.Name){
                                	case 1:
                                		messageResult = messageResult + 'Cộng 2 Điểm';
                                		break;
                                	case 2:
                                		messageResult = messageResult + 'Cộng 1 điểm';
                                		break;
                                	case 3:
                                		messageResult = messageResult + '2 Lông Phượng Hoàng';
                                		break;
                                	case 4:
                                		messageResult = messageResult + 'Cộng 2 điểm';
                                		break;
                                	case 5:
                                		messageResult = messageResult + 'Cộng 5 điểm';
                                		break;
                                	case 6:
                                		messageResult = messageResult + 'Cộng 1 điểm';
                                		break;
                                	case 7:
                                		messageResult = messageResult + ' 1 Lông Phượng Hoàng';
                                		break;
                                	case 8:
                                		messageResult = messageResult + 'Thêm lượt';
                                		break;
                                	default :
                                		messageResult = 'Error!';
                                		break;
                                }
								console.log("===========");
								console.log(res);
								$('.minigame_vongquay_luotchoi').html(res.data.luotchoiconlai);
								$('.minigame_vongquay_point').html(res.data.member_point);
								$('.minigame_vongquay_longphuonghoang').html(res.data.member_longphuonghoang);
								
								$('#ketqua').html(messageResult);
								$('.mask').fadeIn();
								$('.popup-ketqua').fadeIn(.5);
								
							}, 5000);
                        } else {
                            var messageResult = "Không thành công!";
                            // if (response.Status === "Campaign_DoAction_BeLimitedMaximumPlayInDay") {
                            //     messageResult = "<p>Hôm nay bạn đã tham gia vòng quay may mắn</p> <p class='strong-title'>Vui lòng quay lại sau</p>";
							// }							
                            $('#ketqua').html(messageResult);
							isBusying = false;
                        }
                	}else{
                		isBusying = false;
                	}
                },0)
				/** end action quay **/
			}else{
				isBusying = false;
				$('#ketqua').html(res.data);
				$('.mask').fadeIn();
				$('.popup-ketqua').fadeIn(.5);
			}
		});
		/** end ajax **/
	}
}


function appAjax(url, method, data, dataType, callback) {
	var csrfToken = $('meta[name="csrf-token"]').attr("content");
	if (data !== null) {
		data._csrf = csrfToken;
	} else {
		data = {_csrf: csrfToken}
	}
	var request = $.ajax({
	  url: url,
	  method: method,
	  data: data,
	  dataType: dataType
	});
	request.done(function( msg ) {
	  // $( "#log" ).html( msg );
	  callback(msg);
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  // alert( "Request failed: " + textStatus );
	  callback(jqXHR, textStatus);
	});
}

// COMMON delay function
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

/**
 * process ajax signin form
 * params form value
 * return void
*/

function handleChoi(data,callback)
{
	var params = data;
	appAjax(
		'/minigamevongxoay/xoay',
		'post',
		params,
		'json',
		function(response) {
			callback(response);
			if (!response.error) {
				console.log('success');
			} else {
				console.log('error', response);
			}
		}
	);
}

function openPopDefaultText(strText){
	console.log(strText);
	$('.pop-default .default-content p').html(strText);
	$('#hidpopup').fadeIn();
    $('.pop-default').fadeIn();
}

function handleReloadDoiTuong(params,callback) {
	appAjax(
		'/ajax/reload-doi-hero',
		'post',
		params,
		'html',
		function(response) {
			callback(response);
			if (!response.error) {
				console.log('success');
			} else {
				console.log('error');
			}
		}
	);
}

function handleDoiCode(data,callback)
{
	var params = data;
	appAjax(
		'/minigamevongxoay/doicode',
		'post',
		params,
		'json',
		function(response) {
			callback(response);
			if (!response.error) {
				console.log('success');
			} else {
				console.log('error', response);
			}
		}
	);
}
function clickReceiveTuong(codeGif) {
	$('.pop-tuong').addClass('active');
	var $codeTxt = 'BẠN ĐÃ ĐỔI TƯỚNG THÀNH CÔNG';
	var $codeGif = codeGif;
	$('.code-txt').text($codeTxt);
	$('.code-gift').text($codeGif);
	$('.popup-code-bg').fadeIn();
}
function clickReceivePopMessage(msg){
	$('#dfketqua').html('');
	$('#dfketqua').html(msg);
	$('.mask').fadeIn();
	$('.popup-default').fadeIn(.5);
}
function clickReceiveCode(codeGif){
	
	$('.popup-giftcode input').val(codeGif);
	$('.popup-giftcode').fadeIn(.5);    
	$('.mask').fadeIn();
	$('.popup-doiqua').fadeOut(.3);
}
function copyCode() {
  /* Get the text field */
  var copyText = document.getElementById("vongquay-value-code");
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  /* Copy the text inside the text field */
  document.execCommand("copy");
  /* Alert the copied text */
  alert("Copied");
}