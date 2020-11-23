window.fbAsyncInit = function() {
    //FB JavaScript SDK configuration and setup
    FB.init({
        appId: '347423116197650', // FB App ID
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true, // parse XFBML
        version: 'v3.3' // use graph api version 2.8
    });


};
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
        //attachSignin(document.getElementById('btnGoogleSignin'));
        attachSignin(document.getElementById('btnHomeDangnhapGG'));
    });
};
/*
var startAppMobile = function() {
gapi.load('auth2', function(){
  // Retrieve the singleton for the GoogleAuth library and set up the client.
  auth2 = gapi.auth2.init({
	client_id: '396007536042-b0flp68msb2ockudj7rojld4cvci2hju.apps.googleusercontent.com',
	cookiepolicy: 'single_host_origin',
	// Request scopes in addition to 'profile' and 'email'
	//scope: 'additional_scope'
  });
  attachSignin(document.getElementById('btnGoogleSignin'));
});
};
*/
var url_domain = location.protocol + "//" + location.host;
var url_playgame = url_domain + "/choi-ngay";
var url_maychu = url_domain + "/choi-ngay";
(function($) {
    "use strict";
    $(document).ready(function() {
        var csrf_params = $('meta[name=csrf-param]').prop('content');
        var csrf_token = $('meta[name=csrf-token]').prop('content');
        var url_playgame = url_domain + "/choi-ngay";
        var url_maychu = url_domain + "/choi-ngay";
        /*
        $('body').delegate('.btnHomeChoingay', 'click', function (e) {
        	var loginFlag = $("#loginFlag").val();
        	if(loginFlag == 0){ // chua dang nhap hien pop dang nhap
        		$('#dangnhap-dangky').modal('show');	
        		return false;
        	}else{
        		window.location.replace(url_maychu);
        	}
        });
        */
        // SHARE FACEBOOK
        $('body').delegate('.share-fa', 'click', function(e) {
            e.preventDefault();
            var element = $(this);
            var href = url_domain + "/teaser";

            FB.ui({
                method: 'feed',
                name: 'Chuẩn 100% Game ANIME NHẬT BẢN',
                hashtag: '#Sieuxayda',
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

        /** HOME LOGIN FORM **/
        $('body').delegate('.btnHomeDangnhap', 'click', function(e) {
            var username = $("#formLoginHome #username").val();
            var password = $("#formLoginHome #password").val();
            var data = {
                'username': username,
                'password': password,
                csrf_params: csrf_token
            }
            console.log(data);
            handleSignin(data, function(response) {
                console.log(response);
                if (!response.error) {
                    $("#loginFlag").val(1);

                    var dataRedirect = {
                        'page': 'homepage',
                        'action': 1
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_domain);
                        }
                    });
                } else {
                    alert('Đăng nhập thất bại!');
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });

        /** TEASER LOGOUT **/
        $('body').delegate('.btnHomeLogout', 'click', function(e) {
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

        /** HOME REGISTER POPPUP **/
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
                    var dataRedirect = {
                        'page': 'homepage',
                        'action': 2
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_domain);
                        }
                    });

                } else {
                    alert('Đăng ký thất bại, hoặc tài khoản đã tồn tại!');
                    return false;
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });


        /** HOME LOGIN POPPUP **/
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
                    var dataRedirect = {
                        'page': 'homepage',
                        'action': 1
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_domain);
                        }
                    });
                    /** pop giftcode **/
                } else {
                    alert(response.data);
                    return false;
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });


        /** UPDATE PASSWORD USER **/
        $('body').delegate('#form-updatepassworduser #btn-updatePasswordUser', 'click', function(e) {
            var password = $("#form-updatepassworduser #password").val();
            var repassword = $("#form-updatepassworduser #repassword").val();
            var oldpassword = $("#form-updatepassworduser #oldpassword").val();

            if (password == "" || repassword == "" || oldpassword == "") {
                alert('Vui lòng điền đầy đủ thông tin trước khi đổi mật khẩu !');
                return false;
            }
            if (password.length < 6) {
                alert('Mật khẩu phải từ 6 ký tự trở lên !');
                return false;
            }
            if (password != repassword) {
                alert('Mật khẩu mới không trùng khớp vui lòng nhập lại !');
                return false;
            }
            var data = {
                'password': password,
                'repassword': repassword,
                'oldpassword': oldpassword,
                csrf_params: csrf_token
            }
            handleUpdatePasswordUser(data, function(response) {
                console.log(response);
                if (!response.error) {
                    alert(response.data);
                    $("#form-updatepassworduser")[0].reset();
                } else {
                    alert(response.data);
                    return false;
                }
            })
        }).on('submit', function(e) {
            e.preventDefault();
        });

        /** UPDATE INFO USER **/
        $('body').delegate('#form-updateInfoUser #btn-updateInfoUser', 'click', function(e) {
            var member_fullname = $("#form-updateInfoUser #member_fullname").val();
            var member_phone = $("#form-updateInfoUser #member_phone").val();

            if (member_fullname == "" || member_fullname == "") {
                alert('Vui lòng điền đầy đủ thông tin trước khi cập nhật !');
                return false;
            }
            var data = {
                'member_fullname': member_fullname,
                'member_phone': member_phone,
                csrf_params: csrf_token
            }
            handleUpdateInfoUser(data, function(response) {
                console.log(response);
                if (!response.error) {
                    alert(response.data);
                    setTimeout(function() { location.reload(); }, 500);

                } else {
                    alert(response.data);
                    return false;
                }
            })
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
            if (!response.error) {
                /*
                $(".sm-active").css('display','none');
                $(".sm-wrapper").removeClass('sm-active');
                $("#logged-username").html('Xin chào : '+response.data.member_username+'!');
                $("#logged-user").show();
                */
                //window.location.replace(url_playgame);
                //giftcode();
            } else {
                alert(response.data);
            }
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
                    var dataRedirect = {
                        'page': 'homepage',
                        'action': 1
                    }
                    handleUrlRedirect(dataRedirect, function(res) {
                        if (!res.error) {
                            window.location.replace(res.data.url);
                        } else {
                            window.location.replace(url_domain);
                        }
                    });
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
                    'page': 'homepage',
                    'action': 1
                }
                handleUrlRedirect(dataRedirect, function(res) {
                    if (!res.error) {
                        window.location.replace(res.data.url);
                    } else {
                        window.location.replace(url_domain);
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

function updateInputPhone(dataUser) {
    if (dataUser.member_phone != '') {
        $('.txtMemberPhonenumber').val(dataUser.member_phone);
    }
}

function attachSignin(element) {
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            onSuccess(googleUser);
        },
        function(error) {
            alert(JSON.stringify(error, undefined, 2));
        });
}
/** end login google account **/

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
    $('.popup-nhapsdt').css("display", "block");
    $('.popup-nhapsdt-detail').css("display", "block");
}

function openNhapsdtClose() {
    $('.popup-nhapsdt').css("display", "none");
    $('.popup-nhapsdt-detail').css("display", "none");
}

function openGiftcode() {
    $('.popup-giftcode').css("display", "block");
}

function openGiftcodeClose() {
    $('.popup-giftcode').css("display", "none");
}
/** update info user **/
function handleUpdatePasswordUser(data, callback) {
    var params = data;
    appAjax(
        '/ajax-change-password',
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

function handleUpdateInfoUser(data, callback) {
    var params = data;
    appAjax(
        '/ajax-update-info-user',
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