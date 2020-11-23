function changetab(id) {
    document.getElementById("flogin").style.display = "none";
    document.getElementById("freg").style.display = "none";
    if (id != '') {
        document.getElementById(id).style.display = "block";
    }
}

function changeloainap(form_id) {
    var paymentForm = $('#' + form_id);
    var stlLoainap = paymentForm.find("#stlLoainap").val();
    stlLoainap = parseInt(stlLoainap);
    if (stlLoainap == 2) {
        paymentForm.find(".two-col_sltserver").hide();
    } else if (stlLoainap == 1) {
        paymentForm.find(".two-col_sltserver").show();
    }
}
/** thong bao nap the **/

/* XU LY THE NAP */
function validateFormTelcosPayment(form_id) {
    var paymentForm = $('#' + form_id);
    var stlLoainap = paymentForm.find("#stlLoainap").val();
    stlLoainap = parseInt(stlLoainap);
    var payment_partner = paymentForm.find("#payment_partner").val();
    var sltserver = paymentForm.find("#sltserver").val();
    var card_type = paymentForm.find("#card_type").val();
    var card_seri = paymentForm.find("#card_seri").val();
    var card_code = paymentForm.find("#card_code").val();
    var card_amount = paymentForm.find("#card_amount").val();
    var csrf_params = $('meta[name=csrf-param]').prop('content');
    var csrf_token = $('meta[name=csrf-token]').prop('content');
    var username = $('#txtMemberLoged').val();
    if (stlLoainap == 0) {
        alert('Vui lòng chọn loại nạp xu hoặc nạp vàng .');
        return false;
    }

    if (stlLoainap == 1) {
        if (sltserver == 0) {
            alert('Vui lòng chọn máy chủ để nạp xu .');
            return false;
        }
    } else if (stlLoainap == 2) {
        sltserver = 0;
    } else {
        alert('Có lỗi xảy ra vui lòng thông báo với BQT game để được hỗ trợ !');
        return false;
    }

    if (card_seri == '') {
        alert('Số Seri thẻ không được để trống .');
        return false;
    }
    if (card_code == '') {
        alert('Mã thẻ không được để trống .');
        return false;
    }
    if (card_amount == 0) {
        alert('Bạn chưa chọn mệnh giá thẻ.');
        return false;
    }
    var textAlert = "Bạn đang chon mệnh giá thẻ là: mệnh giá " + card_amount + ". Hãy kiểm tra kỹ mệnh giá thẻ trước khi nạp.";
    var r = confirm(textAlert);
    if (r == true) {
        $.ajax({
            type: "POST",
            url: "/card/payment",
            data: {
                sltserver: sltserver,
                card_type: card_type,
                card_seri: card_seri,
                card_code: card_code,
                payment_partner: payment_partner,
                card_amount: card_amount,
                stlLoainap: stlLoainap,
                username: username,
                csrf_params: csrf_token
            },
            dataType: "json",
            beforeSend: showche(),
            success: function(response) {
                console.log(response);
                hideche();
                if (response.error == 1) {
                    alert(response.msg);
                    paymentForm[0].reset();
                    return true;
                } else {
                    alert(response.msg);
                    paymentForm[0].reset();
                    hideche();
                    return false;
                }
            },
            error: function(jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error [500].' + exception.toString());
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

function validateFormVTPPaymentGate(form_id) {
    var paymentForm = $('#' + form_id);
    var stlLoainap = paymentForm.find("#stlLoainap").val();
    stlLoainap = parseInt(stlLoainap);
    var sltserver = $('#' + form_id).find("#sltserver").val();
    sltserver = parseInt(sltserver);
    var card_type = 'gate';
    var card_seri = paymentForm.find("#serial").val();
    var card_code = paymentForm.find("#pin").val();
    var trans_id = new Date().getTime();
    var payment_partner = paymentForm.find("#payment_partner").val();
    var csrf_params = $('meta[name=csrf-param]').prop('content');
    var csrf_token = $('meta[name=csrf-token]').prop('content');
    var username = $('#txtMemberLoged').val();

    if (stlLoainap == 0) {
        alert('Vui lòng chọn loại nạp xu hoặc nạp vàng .');
        return false;
    }

    if (stlLoainap == 1) {
        if (sltserver == 0) {
            alert('Vui lòng chọn máy chủ để nạp vàng vào game .');
            return false;
        }
    } else if (stlLoainap == 2) {
        sltserver = 0;
    } else {
        alert('Có lỗi xảy ra vui lòng thông báo với BQT game để được hỗ trợ !');
        return false;
    }

    if (card_seri == '') {
        alert('Số Seri thẻ không được để trống .');
        return false;
    }
    if (card_code == '') {
        alert('Mã thẻ không được để trống .');
        return false;
    }
    $("#serial").val("");
    $("#pin").val("");
    $.ajax({
        type: "POST",
        url: "/card/payment",
        data: {
            sltserver: sltserver,
            card_type: card_type,
            card_seri: card_seri,
            card_code: card_code,
            trans_id: trans_id,
            payment_partner: payment_partner,
            stlLoainap: stlLoainap,
            username: username,
            csrf_params: csrf_token
        },
        dataType: "json",
        beforeSend: showche(),
        success: function(response) {
            console.log(response);
            if (response.error == 1) {
                //postback qua nha mang gate
                setTimeout(function() {
                    //do something special
                    var urlpayment = "https://sieuxayda.vn/postback-btcvn?trans_id=" + trans_id;
                    var url_postback = encodeURI(urlpayment);
                    Agent.PayRequest(card_seri, card_code, url_postback, function(err, data) {
                        hideche();
                        if (err) {
                            alert(err.message);
                        } else {
                            alert(data.message);
                        }
                    });
                }, 500);
            } else {
                hideche();
                alert(response.msg);
                return false;
            }
        },
        error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].' + exception.toString());
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' /*+ jqXHR.responseText*/ );
            }
            hideche();
        }
    });
}

function showche() {
    $('#loading-payment').fadeIn();
}

function hideche() {

    $('#loading-payment').fadeOut();
}