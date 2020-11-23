// Load the SDK asynchronously
(function(d) {
    var js, id = 'facebook-jssdk',
        ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));

var googleUser = {};
var startApp = function() {
    gapi.load('auth2', function() {
        // Retrieve the singleton for the GoogleAuth library and set up the client.
        auth2 = gapi.auth2.init({
            client_id: '396007536042-b0flp68msb2ockudj7rojld4cvci2hju.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
        });
        attachSignin(document.getElementById('my-signin2'));
    });
};


var url_playgame = location.protocol + "//" + location.host +
    "/choi-ngay";
var url_home = location.protocol + "//" + location.host;
var url_teaser = location.protocol + "//" + location.host + "/choi-ngay";
(function($) {
    "use strict";
    $(document).ready(function() {
        var csrf_params = $('meta[name=csrf-param]').prop('content');
        var csrf_token = $('meta[name=csrf-token]').prop('content');

        var url_playgame = "https://sieuxayda.vn/";
        // SHARE FACEBOOK
        $('body').delegate('.minigame-share-fb', 'click', function(e) {
            e.preventDefault();
            var element = $(this);
            var href = $("#minigameUrlShare").val();

            FB.ui({
                method: 'feed',
                name: 'Chuẩn 100% Game ANIME NHẬT BẢN',
                hashtag: '#SieuXayda',
                link: href,
                picture: 'https://sieuxayda.vn/style/teaser/images/sharefb.jpg',
                description: 'Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU!',
                message: 'Cực Phẩm Game ANIME NHẬT BẢN Quá Xuất Sắc. Anh Em Lập Bang Chiến Cùng Nhé. Vào Game Nhận Miễn Phí THẦN THÚ + LỄ BAO 10 TRIỆU',
                caption: 'Hơn 69.000 người đã tham gia. Còn huynh thì sao ?',
            }, function(response) {
                if (!response.error_code) {
                    console.log(response);
                    var params = {};
                    handleMinigameSharefb(params, function(rs) {
                        console.log(rs);
                        if (!rs.errors) {
                            $('.pop-default .default-content p').html('Chúc mừng bạn đã chia sẻ thành công !');
                            $('.pop-default').fadeIn();
                        }
                    });
                } else {
                    $('.pop-default .default-content p').html('Bạn đã hủy chia sẻ.');
                    $('.pop-default').fadeIn();
                }
            });

        });

        /** TEASER **/
        $('body').delegate('.mangaplay-pop-register .btnDangky', 'click', function(e) {

            var username = $(".mangaplay-pop-register #username").val();
            var password = $(".mangaplay-pop-register #password").val();
            var repassword = $(".mangaplay-pop-register #repassword").val();
            var data = {
                'username': username,
                'password': password,
                'repassword': repassword,
                csrf_params: csrf_token
            }
            handleRegister(data, function(response) {
                console.log(response);
                if (!response.error) {
                    $("#loginFlag").val(1);
                    var dataRedirect = {
                        'page': 'teaser',
                        'action': 2
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        console.log(res);
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_home);
                        }
                    });

                } else {
                    alert('Vui lòng kiểm tra lại thông tin hoặc tài khoản đã tồn tại!');
                    return false;
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });


        /** TEASER **/
        $('body').delegate('.mangaplay-pop-login .btnDangnhap', 'click', function(e) {
            var username = $(".mangaplay-pop-login #username").val();
            var password = $(".mangaplay-pop-login #password").val();
            var data = {
                'username': username,
                'password': password,
                csrf_params: csrf_token
            }
            handleSignin(data, function(response) {
                console.log(response);
                if (!response.error) {
                    /** pop giftcode **/
                    var dataRedirect = {
                        'page': 'teaser',
                        'action': 1
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        console.log(res);
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_home);
                        }
                    });
                } else {
                    alert(response.data);
                    return false;
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });

        /** TEASER LOGOUT **/
        $('body').delegate('.teaser-logout', 'click', function(e) {
            var data = {
                csrf_params: csrf_token
            }
            handleLogout(data, function(response) {
                console.log(response);
                if (!response.error) {
                    location.reload();
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });

        /** TEASER **/
        $('body').delegate('.btn-phone-update', 'click', function(e) {
            var phonenumber = $(".pop-phone #txtMemberPhonenumber").val();
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (vnf_regex.test(phonenumber) == false) {
                alert('Số điện thoại không đúng định dạng !');
                return false;
            }
            var data = {
                csrf_params: csrf_token,
                phonenumber: phonenumber
            }
            handleUpdatePhonenumber(data, function(response) {
                if (!response.error) {
                    $('.pop-phone').fadeOut();
                    $('.pop-default .default-content p').html('Chúc mừng bạn đã cập nhật số điện thoại thành công! Giftcode sẽ được gửi vào số điện thoại của bạn vào ngày 03/09/2019');
                    $('.pop-default').fadeIn();

                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });

        /** TEASER **/
        $('body').delegate('.mangaplay-pop-gcode', 'click', function(e) {
            var loginFlag = $("#loginFlag").val();
            if (loginFlag == 0) { // chua dang nhap hien pop dang nhap
                $('#hidpopup').fadeIn();
                $('.pop-login').fadeIn();
                return false;
            }
            // da dang nhap hien code theo moc chon
            var codeid = $(this).data("id");
            var data = {
                csrf_params: csrf_token,
                codeid: codeid
            }
            handleGiftcodeTeaser(data, function(response) {
                console.log(response);
                if (!response.error) {
                    $('.pop-giftcode #giftcode-text').html(response.data);
                    openGiftcode();
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });

        /** TEASER UPDATE PHONENUMBER **/
        $('body').delegate('.phone-giftcode', 'click', function(e) {
            var loginFlag = $("#loginFlag").val();
            if (loginFlag == 1) {
                openNhapsdt();
            } else {
                $('#hidpopup').fadeIn();
                $('.pop-login').fadeIn()
            }
        });


        /** TEASER NGAY OPENBETA **/
        $('body').delegate('.btn-openbeta-thongbao-close', 'click', function(e) {
            openbetaThongbaoClose();
        }).on('submit', function(e) {
            e.preventDefault();
        });

        $('body').delegate('.popup-nhapsdt-close', 'click', function(e) {
            openNhapsdtClose();
        }).on('submit', function(e) {
            e.preventDefault();
        });

        $('body').delegate('.popup-giftcode-close', 'click', function(e) {
            openGiftcodeClose();
        }).on('submit', function(e) {
            e.preventDefault();
        });


    });
})(jQuery);
// 


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

function handleSignin(data, callback) {
    var params = data;
    appAjax(
        '/ajax-login',
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

function handleRegister(data, callback) {
    var params = data;
    appAjax(
        '/ajax-register',
        'post',
        params,
        'json',
        function(response) {
            callback(response);
        }
    );
}

function handleLogout(data, callback) {
    var params = data;
    appAjax(
        '/ajax-logout',
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

function handleUpdatePhonenumber(data, callback) {
    var params = data;
    appAjax(
        '/update-member-phonenumber',
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

function handleShareFb(data, callback) {
    var params = data;
    appAjax(
        '/ajax-sharefb',
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

function handleMinigameSharefb(data, callback) {
    var params = data;
    appAjax(
        '/ajax-sharefb',
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

function handleGiftcodeTeaser(data, callback) {
    var params = data;
    appAjax(
        '/ajax-giftcode-teaser',
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

function handleUrlRedirect(data, callback) {
    var params = data;
    appAjax(
        '/get-link-redirect',
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

/** FB login Ajax **/
function checkLogin(callback) {
    if (loginFlag == 0) {
        $('body').find('.popup-login-bg').fadeIn();
        $('body').find('.popup-login').fadeIn();
        return false;
    }
    return true;
}


function FBLogin() {
    // Check whether the user already logged in the website using Facebook login
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //If user already logged in the Facebook then check the 
            //Get the Facebook user's info
            verify_user();
        }
    });

    FB.login(function(response) {
        if (response.authResponse) {
            verify_user(response.authResponse.accessToken);
        } else {
            alert('User cancelled login or did not fully authorize.');
        }
    }, { scope: 'email' });
}

function verify_user(access_token) {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    FB.api('/me', { access_token: access_token, locale: 'en_US', fields: 'id, name, first_name, last_name,email, link, gender,locale, picture' },
        function(response) {
            $.ajax({
                url: "/ajax/login-fb-account",
                data: { userinfo: JSON.stringify(response), '_csrf': csrfToken },
                type: "POST",
                success: function(resp) {
                    console.log(resp);
                    var dataRedirect = {
                        'page': 'teaser',
                        'action': 2
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_maychu);
                        }
                    });
                    /*
        $(".sm-active").css('display','none');
		$(".sm-wrapper").removeClass('sm-active');
		$("#logged-username").html('Xin chào : '+resp.data.member_username+'! <a href="/teaser-logout" style="color:white" class="teaser-logout"> Thoát </a>');
		$("#logged-user").show();
		$("#loginFlag").val(1);
		*/
                }
            });
        });
}

/** End Fb Login Ajax **/


/** login google account khi Guest xu dung chuc nang can dang nhap **/

function onSuccess(googleUser) {
    var profile = googleUser.getBasicProfile();
    var access_token = googleUser.getAuthResponse().access_token;
    var params = {
        'id': profile.getId(),
        'name': profile.getName(),
        'image': profile.getImageUrl(),
        'email': profile.getEmail(),
        'familyName': profile.getFamilyName(),
        'givenName': profile.getGivenName(),
        'access_token': access_token
    }
    $.ajax({
        url: '/ajax/login-google-account',
        async: false,
        dataType: "json",
        type: "POST",
        data: params,
        success: function(response) {
            if (!response.error) {
                var dataRedirect = {
                    'page': 'teaser',
                    'action': 2
                }
                handleUrlRedirect(dataRedirect, function(res) {
                    if (!res.error) {
                        window.location.replace(res.data.url);
                    } else {
                        window.location.replace(url_maychu);
                    }
                });

            }
        },
        error: function(_6) {
            // $('#askModal .hashtags').html('');
        }
    });

    // exist after get data and login
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
        console.log('User signed out.');
    });
}


function onFailure(error) {
    console.log(error);
}

function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            onSuccess(googleUser);
        },
        function(error) {
            //alert(JSON.stringify(error, undefined, 2));
        });
}
/** end login google account **/


function updateInputPhone(dataUser) {
    if (dataUser.member_phone != '') {
        $('.txtMemberPhonenumber').val(dataUser.member_phone);
    }
}


/** TEASER POPPUP **/
function openbetaThongbao() {
    $('.popup-openbeta-thongbao').css("display", "block");
    $('.popup-openbeta-thongbao-detail').css("display", "block");
}

function openbetaThongbaoClose() {
    $('.popup-openbeta-thongbao').css("display", "none");
    $('.popup-openbeta-thongbao-detail').css("display", "none");
}

function openNhapsdt() {
    $('#hidpopup').fadeIn();
    $('.pop-phone').fadeIn();
}

function openNhapsdtClose() {
    $('#hidpopup').fadeOut();
    $('.pop-phone').fadeOut();
}

function openGiftcode() {
    $('#hidpopup').fadeIn();
    $('.pop-giftcode').fadeIn();
}

function openGiftcodeClose() {
    $('#hidpopup').fadeOut();
    $('.pop-giftcode').fadeOut();
}

function openPopDefault() {
    $('#hidpopup').fadeIn();
    $('.pop-default').fadeIn();
}

function closePopDefault() {
    $('#hidpopup').fadeOut();
    $('.pop-default').fadeOut();
}

function scrapeLink(url) {
    var masterdfd = $.Deferred();
    FB.api('https://graph.facebook.com/', 'post', {
        id: url,
        scrape: true
    }, function(response) {
        if (!response || response.error) {
            masterdfd.reject(response);
        } else {
            masterdfd.resolve(response);
        }
    });
    return masterdfd;
}

function checkPhoneNumber() {
    var flag = false;
    var phone = $('#txtMemberPhonenumber').val().trim(); // ID của trường Số điện thoại
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    phone = phone.replace(/ /g, '');
    if (phone != '') {
        var firstNumber = phone.substring(0, 2);
        if ((firstNumber == '09' || firstNumber == '08') && phone.length == 10) {
            if (phone.match(/^\d{10}/)) {
                flag = true;
            }
        } else if (firstNumber == '01' && phone.length == 11) {
            if (phone.match(/^\d{11}/)) {
                flag = true;
            }
        }
    }
    return flag;
}