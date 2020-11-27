(function($) {
    "use strict";
    $(document).ready(function() {


        var csrf_params = $('meta[name=csrf-param]').prop('content');
        var csrf_token = $('meta[name=csrf-token]').prop('content');
        var $timeDice = 2000;
        var flagWin = 0;
        var flagAddLuot = false;

        //Triệu hồi
        $('body').delegate('.btn-trieuhoi', 'click', function(e) {

            var loginFlag = $("#loginFlag").val();
            if (loginFlag == 0) { // chua dang nhap hien pop dang nhap
                openlogin();
                return false;
            }
            var minigame_luotchoi = $('#minigame_luotchoi').val();
            if (parseInt(minigame_luotchoi) <= 0) {
                $('.minigame .content-popup p').html('Hết lượt chơi');
                $('.minigame').fadeIn();
                $('#mask').fadeIn();
                $("body").addClass("no-scroll");
                return false;
            }

            $(".doiqua-minigame").fadeOut();
            $(".dragon").css("display", "none");
            $(".ngoc").css("display", "none");
            $('#vid-trieuhoi').css("display", "block");
            $('.audio-game').trigger("pause");
            $('.audio-xoay').trigger("play");
            $('#vid-trieuhoi').trigger('play');
            setTimeout(function() {
                quay();
            }, 2900);
        });

        $('body').delegate('.minigame-doicode', 'click', function(e) {

            var loginFlag = $("#loginFlag").val();
            if (loginFlag == 0) { // chua dang nhap hien pop dang nhap
                openlogin();
                return false;
            }
            var id = $(this).data("id");
            var csrf_params = $('meta[name=csrf-param]').prop('content');
            var csrf_token = $('meta[name=csrf-token]').prop('content');
            var data = {
                csrf_params: csrf_token,
                'id': id
            }

            handleChangecode(data, function(res) {
                console.log(res);
                if (!res.error) {
                    $(".popup-page04").fadeOut();
                    $('.pop-giftcode input').val(res.data);
                    $('.pop-giftcode').fadeIn();
                    $('#mask').fadeIn();
                    $("body").addClass("no-scroll");
                    return $('#giftcode-text').html('XXXX');
                } else {
                    $(".popup-page04").fadeOut();
                    $('.popup-chua-datmoc p').html(res.data);
                    $('.popup-chua-datmoc').fadeIn();
                    $('#mask').fadeIn();
                    $("body").addClass("no-scroll");
                    return false;
                }
            });

        });

        $('body').delegate('#ketqua_minigame .close-popup', 'click', function(e) {

            var csrf_params = $('meta[name=csrf-param]').prop('content');
            var csrf_token = $('meta[name=csrf-token]').prop('content');
            var data = {
                csrf_params: csrf_token
            }
            handlePage3(data, function(res) {
                $('#p03').html(res.responseText);
            })
            $("#ketqua_minigame").fadeOut(200);
            $('#mask').fadeOut();
        });

        $('body').delegate('.popup-ketqua .close-kq', 'click', function(e) {
            var csrf_params = $('meta[name=csrf-param]').prop('content');
            var csrf_token = $('meta[name=csrf-token]').prop('content');
            var data = {
                csrf_params: csrf_token
            }
            handlePage3(data, function(res) {
                $('#p04').html(res.responseText);
            })
            $('.popup-ketqua').fadeOut();
            $('#mask').fadeOut();
            $("body").removeClass("no-scroll");
        });


    });

    /** TEASER **/
    $('body').delegate('.mangaplay-minigame-gcode', 'click', function(e) {
        var loginFlag = $("#loginFlag").val();
        $('.pop-giftcode #giftcode-text').html('');
        if (loginFlag == 0) { // chua dang nhap hien pop dang nhap
            $('#hidpopup').fadeIn();
            $('.pop-login').fadeIn();
        }
        // da dang nhap hien code theo moc chon
        var codeid = $(this).data("id");
        var data = {
            csrf_params: csrf_token,
            codeid: codeid
        }
        handleGiftcodeMinigame(data, function(response) {
            console.log(response);
            if (!response.error) {
                $('.pop-giftcode #giftcode-text').html(response.data);
                openGiftcode();
            }
        })
    }).on('submit', function(e) {
        e.preventDefault();
    });


})(jQuery);
// 


var isBusying = false;

function quay() {

    if (!isBusying) {
        isBusying = true;
        $('.audio').trigger("pause");
        $('.audio-xoay').trigger("play");
        var csrf_params = $('meta[name=csrf-param').prop('content');
        var csrf_token = $('meta[name=csrf-token').prop('content');

        /**Kết quả ngọc rồng **/
        var data = {
            csrf_params: csrf_token
        }

        handleChoi(data, function(res) {
            console.log(res);
            if (!res.error) {
                $('#ketqua-img').html('<img src="' + domain + '/uploads/' + res.data.images + '" alt="">');
                $('#ketqua').html(res.data.name);

                setTimeout(function() {
                    $('.audio-game').trigger("pause");
                }, 2800);

                setTimeout(function() {

                    $('.audio-xoay').trigger("pause");
                    $('.audio-popup').trigger("play");
                    $(".popup-ketqua").fadeIn();
                    $('#mask').fadeIn();
                    setTimeout(function() {
                        $(".dragon").css("display", "block");
                        $(".ngoc").css("display", "block");
                        $('#vid-trieuhoi').css("display", "none");
                        //$('.audio-game').trigger("play");
                    }, 1000);
                }, 3700);

                isBusying = false;

            } else {
                isBusying = false;
            }
        })
    }


}



function appAjax(url, method, data, dataType, callback) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    if (data !== null) {
        data._csrf = csrfToken;
    } else {
        data = { _csrf: csrfToken }
    }
    var request = $.ajax({
        url: url,
        method: method,
        data: data,
        dataType: dataType
    });
    request.done(function(msg) {
        // $( "#log" ).html( msg );
        callback(msg);
    });

    request.fail(function(jqXHR, textStatus) {
        // alert( "Request failed: " + textStatus );
        callback(jqXHR, textStatus);
    });
}

// COMMON delay function
var delay = (function() {
    var timer = 0;
    return function(callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

/**
 * process ajax signin form
 * params form value
 * return void
 */

function handleChoi(data, callback) {
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

function handlePage3(data, callback) {
    var params = data;
    appAjax(
        '/teaser/page3',
        'post',
        params,
        'json',
        function(response) {
            callback(response);
        }
    );
}

/**
 * process ajax signin form
 * params form value
 * return void
 */


function handleChangecode(data, callback) {
    var params = data;
    appAjax(
        '/minigamevongxoay/doithuong',
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

function handleGiftcodeMinigame(data, callback) {
    var params = data;
    appAjax(
        '/ajax/giftcode-minigame',
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