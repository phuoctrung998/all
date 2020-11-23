/**
 * Created by fay on 2018/2/11.
 */

// $.fn.loading = function () {
//     var html = '<div class="loading-box"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
//     $(this).append($(html))
// }

var userCheckIn = {
    options: {
        "number": 0,          // 已补签的次数
        "vipCheckIn": 0,   // vip可以签到次数
        "hasNumber": 0, // 可签到次数
        "today": 0,         // 当天的几号 没有前导零
        "timeBox": ".time-box",       // 签到日历模块对象
        'checked': 'active'          // 已签到的样式
    },
    init: function () {
        var self = this;
        var timeBox = $(this.options.timeBox);

        var li_allow = timeBox.find('li.allow');
        li_allow.click(function () {

            self.options.number = timeBox.find('input.checkin_number').val();
            self.options.vipCheckIn = timeBox.find('input.checkin_vipCheckIn').val();
            self.options.hasNumber = timeBox.find('input.checkin_hasNumber').val();
            self.options.today = timeBox.find('input.checkin_today').val();

            var click_li = $(this);

            if (click_li.hasClass(self.options.checked)) {
                return false;
            }
            var day = click_li.attr('date-day');

            var sign_day = 0;
            if (day != undefined) {
                if ((self.options.hasNumber > 0 && day > 0) || day == self.options.today) {
                    sign_day = day;
                }

            } else {
                var today = self.options.today;
                var today_li = timeBox.find('li[date-day=' + today + ']');
                if (!(today_li.hasClass('active'))) {
                    sign_day = today;

                }
            }

            if (sign_day > 0) {

                var params = {
                    "day": sign_day,
                    "type": sign_day == self.options.today ? 0 : 1,
                    "month": "",
                    "year": ""
                };
                $.ajax({
                    url: "/user/doCheckin",
                    data: params,
                    dataType: "json",
                    type: "POST"
                }).done(function (json) {
                    if (json.status == 1) {
                        layer.msg(json.msg, {icon: 6});
                        self.fun(timeBox, click_li);
                    }

                });

            }

        });

    },
    fun: function (timeBox, click_li) {
        this.options.number += 1;
        this.options.hasNumber -= 1;
        if(this.options.hasNumber <=0){
            this.options.hasNumber = 0;
        }

        timeBox.find('input.checkin_number').val(this.options.number);
        timeBox.find('input.checkin_hasNumber').val(this.options.hasNumber);
        timeBox.find('#current-num').text(this.options.hasNumber);
        click_li.removeClass('allow').addClass(this.options.checked);


    }
};

var H5baseUrl = $('#baseUrl').val();
var publicPath = $('#public_path').val();

var H5BaseLang = 'vn';
var H5App = {
    options: {
        'baseUrl': H5baseUrl ? H5baseUrl : '',
        'publicPath': publicPath ? publicPath : '',
        'gameIframe': '#JCgameIframe',           // 玩游戏页的Iframe对象
        'gameHost': '#gameHost',                 // 玩游戏页的游戏host地址
        'paymentBox': '#paymentBox',             // 调用支付的弹框
        'paymentIframe':'#paymentIframe',         // 支付页的Iframe对象
        'paymentChoose': '#paymentChoose',         //选择支付方式弹框
        'webDomain': '#webDomain',                  // 网站顶级域名
        'okOrigin': 'https://connect.ok.ru',        // ok的sdk发消息体
        'vkApp': false                              // vk移动端判断 true为移动端，false为web端
    },
    icon: {
        'warning': 0,
        'right': 1,
        'wrong': 2,
        'ask': 3,
        'lock': 4,
        'failed': 5,
        'success': 6

    },
    event_type: {
        'like': 1,
        'share': 2,
        'invite': 3
    },
    sdkDebug:false,
    isFull: false,
    // 首页ajax加载数据 我的游戏
    getMygame: function (page) {
        /**
         * 模板
         *
         <li>
         <a href="./game_page.html">
         <img src="./images/img/img1.jpg" alt="">
         <span class="name">Game Name</span>
         <span class="server">(S100)</span>
         </a>
         </li>
         */

        var data = {
            "type": "my",
            "page": page ? page : 1
        };

        $.ajax({
            url: this.options.baseUrl + "/index/games",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>';
                        _html += '<a data-login="1" href="' + data[i].game_web + '">';
                        _html += '<img src="' + data[i].img + '" alt="' + data[i].gamename + '">';
                        _html += '<span class="name">' + data[i].gamename + '</span>';
                        _html += '<span class="server">(' + data[i].servername + ')</span>';
                        _html += '</a>';
                        _html += '</li>';
                    }

                    $('.my-game-list').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 首页ajax加载数据 热门游戏
    getHotgame: function (page) {
        /**
         * 模板
         *
         <li>
         <a class="game-list" href="###">
         <img src="./images/img/icon1.jpg" alt="">
         <div class="content">
         <div class="title">
         <span class="name">GAME NAME</span>
         <span class="hot">HOT</span>
         <span class="gift"></span>
         </div>
         <em>
         Популярные Новые игры Объявление Новый сервер Популярные Новые игры Объявление Новый сервер
         </em>
         </div>
         </a>
         <a class="start-btn" href="###">Начать</a>
         </li>
         */

        var data = {
            "type": "hot",
            "page": page ? page : 1
        };

        $.ajax({
            url: this.options.baseUrl + "/index/games",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>';
                        _html += '<a data-login="1" class="game-list" href="' + data[i].game_web + '">';
                        _html += '<img src="' + data[i].img + '" alt="' + data[i].gamename + '">';
                        _html += '<div class="content">';
                        _html += '<div class="title">\
                                    <span class="name">' + data[i].gamename + '</span>\
                                    <span class="hot">HOT</span>\
                                    <span class="gift"></span>\
                                </div>';
                        _html += '<em>' + data[i].content + '</em>';
                        _html += '</div>';
                        _html += '</a>';
                        _html += '<a data-login="1" class="start-btn" href="' + data[i].game_web + '">' + translate('play', H5BaseLang) + '</a>';
                        _html += '</li>';
                    }

                    $('.hot-game').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 首页ajax加载数据 新游戏
    getNewgame: function (page) {
        /**
         * 模板
         *
         <li>
         <a class="game-list" href="###">
         <img src="./images/img/icon1.jpg" alt="">
         <div class="content">
         <div class="title">
         <span class="name">GAME NAME</span>
         <span class="hot">HOT</span>
         <span class="gift"></span>
         </div>
         <em>
         Популярные Новые игры Объявление Новый сервер Популярные Новые игры Объявление Новый сервер
         </em>
         </div>
         </a>
         <a class="start-btn" href="###">Начать</a>
         </li>
         */

        var data = {
            "type": "new",
            "page": page ? page : 1
        };

        $.ajax({
            url: this.options.baseUrl + "/index/games",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>';
                        _html += '<a data-login="1" class="game-list" href="' + data[i].game_web + '">';
                        _html += '<img src="' + data[i].img + '" alt="' + data[i].gamename + '">';
                        _html += '<div class="content">';
                        _html += '<div class="title">\
                                    <span class="name">' + data[i].gamename + '</span>\
                                    <span class="hot">HOT</span>\
                                    <span class="gift"></span>\
                                </div>';
                        _html += '<em>' + data[i].content + '</em>';
                        _html += '</div>';
                        _html += '</a>';
                        _html += '<a data-login="1" class="start-btn" href="' + data[i].game_web + '">' + translate('play', H5BaseLang) + '</a>';
                        _html += '</li>';
                    }

                    $('.new-game').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 首页ajax加载数据 公告文章
    getNews: function (page) {
        /**
         * 模板
         *
         <div class="news-hint">
         <a href="###">
         <span>Объявление Объявление Объявление Объявление Объявление</span>
         <em>01-02-2018</em>
         </a>
         </div>
         */
        var name = translate('notice', H5BaseLang); // 公告
        var data = {
            "name": name,
            "page": page ? page : 1
        };

        $.ajax({
            url: this.options.baseUrl + "/index/articles",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        // _html+= '<div class="news-hint">';
                        _html += '<a href="' + H5App.options.baseUrl + '/article/detail/id/' + data[i].id + '">';
                        _html += '<span>' + data[i].post_title + '</span>';
                        _html += '<em>' + data[i].post_modified + '</em>';
                        _html += '</a>';
                        // _html+= '</div>';
                    }

                    $('.news-hint').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 首页ajax加载数据 游戏新服 已开服
    getStartServer: function (page) {
        /**
         * 模板
         *
         <li>
         <a class="game-list" href="###">
         <img src="./images/img/icon1.jpg" alt="">
         <p>
         <!-- 游戏名称 -->
         <strong>Ярость Квинтона</strong>
         <!-- 区服 -->
         <em>S100</em>
         <!-- 已开服9分钟 -->
         <em>открылся 9 минут назад</em>
         </p>
         </a>
         <a class="start-btn" href="###">Начать</a>
         </li>
         */

        var data = {
            "page": page ? page : 1,
            "is_open": 1
        };

        $.ajax({
            url: this.options.baseUrl + "/index/servers",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>';
                        _html += '<a data-login="1" class="game-list" href="' + data[i].game_web + '">';
                        _html += '<img src="' + data[i].pic4 + '" alt="' + data[i].gamename + '">';
                        _html += '<p>';
                        _html += '<strong>' + data[i].gamename + '</strong>';
                        _html += '<em>' + data[i].servername + '</em>';
                        _html += '<em>' + translate('already_open', H5BaseLang) + ':' + timeFormat(parseInt(data[i].start_time) + iTimeZoneDifference, 'dd.MM yyyy') + '</em>';
                        _html += '</p>';
                        _html += '</a>';
                        _html += '<a data-login="1" class="start-btn" href="' + data[i].game_web + '">' + translate('play', H5BaseLang) + '</a>';
                        _html += '</li>';
                    }

                    $('.new-server-end').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 首页ajax加载数据 游戏即将开服信息
    getNewServer: function (page) {
        /**
         * 模板
         *
         <li>
         <a class="game-list" href="###">
         <img src="./images/img/icon1.jpg" alt="">
         <p>
         <!-- 游戏名称 -->
         <strong>Ярость Квинтона</strong>
         <!-- 区服 -->
         <em>S100</em>
         <!-- 已开服9分钟 -->
         <em>открылся 9 минут назад</em>
         </p>
         </a>

         </li>
         */

        var data = {
            "page": page ? page : 1,
            "is_open": 0
        };

        $.ajax({
            url: this.options.baseUrl + "/index/servers",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>';
                        _html += '<a class="game-list" data-login="1" href="' + data[i].game_web + '">';
                        _html += '<img src="' + data[i].pic4 + '" alt="' + data[i].gamename + '">';
                        _html += '<p>';
                        _html += '<strong>' + data[i].gamename + '</strong>';
                        _html += '<em>' + data[i].servername + '</em>';
                        _html += '<em>' + translate('start_server', H5BaseLang) + ' ' + timeFormat(parseInt(data[i].start_time) + iTimeZoneDifference, 'dd.MM hh:mm') + '</em>';
                        _html += '</p>';
                        _html += '</a>';

                        _html += '</li>';
                    }

                    $('.new-server-start').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 首页初始加载数据
    homeInit: function () {
        var swiper = new Swiper('.swiper-container');

        $('.tab-menu-bar li').on('click', function () {
            var idx = $(this).index();
            $(this).addClass('active').siblings().removeClass('active');
            $('.list-content').hide().eq(idx).show();
        });

        $('.new-server-tab span').on('click', function () {
            var idx = $(this).index();
            $(this).addClass('active').siblings().removeClass('active');
            $('.new-server').hide().eq(idx).show();
        });

        this.getMygame();
        this.getHotgame();
        this.getNewgame();
        this.getNews();
        this.getStartServer();
        this.getNewServer();

        // 检测首页所有跳转链接在跳转之前是否登录 未登录的则弹出登录框
        $(document).on('click','a[data-login]',function () {
            if(userConfig['uid'] == ''){
                showLogin();
                return false;
            }
        });
    },

    alertMsg: function (msg, icon_num, func) {
        var icon = this.icon[icon_num];

        layer.msg(msg, {icon: icon});

        if (typeof func == 'function') {
            var i = setTimeout(function () {
                func();
                clearTimeout(i);
            }, 2000);

        }
    },

    // H5签到
    checkIn: function () {
        userCheckIn.init();
    },

    // 用户中心 玩家的游戏
    userGames: function (page) {
        /**
         * 模板
         *
         <li>
         <a href="./game_page.html">
         <img src="./images/img/img1.jpg" alt="">
         <span class="name">Game Name</span>
         <span class="server">(S100)</span>
         </a>
         </li>
         */

        var data = {
            "page": page ? page : 1
        };

        $.ajax({
            url: this.options.baseUrl + "/user/gameslist",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>';
                        _html += '<a href="' + data[i].game_web + '">';
                        _html += '<img src="' + data[i].img + '" alt="' + data[i].gamename + '">';
                        _html += '<span class="name">' + data[i].gamename + '</span>';
                        _html += '<span class="server">(' + data[i].servername + ')</span>';
                        _html += '</a>';
                        _html += '</li>';
                    }

                    $('.my-game-list').html(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 用户中心 玩家订单
    userOrderList: function (listObj,params) {
        /**
         * 模板
         *
         <tr>
         <td>23-12-2017</td>
         <td>100</td>
         <td>
         <p>Ярость Квинтона</p>
         <p>(S360)</p>
         </td>
         <td>
         <a class="state" href="###">Успешно</a>
         </td>
         </tr>
         */

        var page = listObj.attr('data-page');
        var gid = '';
        if(params){
            gid = params.gid;
        }

        var data = {
            "gid": gid ? gid : '',
            "page": page ? page : 1
        };


        var dataHave = listObj.attr('data-next');
        if(dataHave == 0){
            return false;
        }

        var i = layer.load();
        $.ajax({
            url: H5App.options.baseUrl + "/user/orderlist",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {
            layer.close(i);
        }).done(function (res) {
            var _html = '';
            if (res.status == 1 && res.errCode == 0) {
                listObj.attr('data-page',Number(page) + 1);
                var data = res.data;

                if (data instanceof Array && data.length > 0) {
                    for (var i in data) {
                        _html += '<tr>';
                        _html += '<td>' + data[i]['pay_time'] + '</td>';
                        _html += '<td>' + data[i]['pay_money'] + '</td>';
                        _html += '<td><p>' + data[i]['gamename'] + '</p><p>' + data[i]['servername'] + '</p></td>';

                        var pay_status = translate('pay_not', H5BaseLang);
                        switch (data[i]['order_status']) {
                            case 0:
                                pay_status = translate('pay_not', H5BaseLang);
                                break;
                            case 1:
                                pay_status = translate('pay_success', H5BaseLang);
                                break;
                            case 2:
                                pay_status = translate('pay_refund', H5BaseLang);
                                break;
                        }

                        _html += '<td><a class="state dialog" data-dialogbox =".table-detail" ' +

                            'data-orderid="' + data[i]['orderid'] + '" ' +
                            ' data-pay_bank="' + data[i]['pay_bank'] + '" ' +
                            ' data-pay_time="' + data[i]['pay_time'] + '" ' +

                            '>' + pay_status + '</a></td>';
                        _html += '</tr>';
                    }

                }
            }

            if (page >1) {
                listObj.append(_html);
            } else {
                listObj.html(_html);
            }

            if(res.next_have == false){
                listObj.attr('data-next',0);
            }

        }).fail(function () {
            console.log('error');
        });
    },
    // .editor

    // 用户中心 玩家问题列表
    userQuestion: function (listObj) {
        /**
         * 模板
         *
         <tr>
         <td>23-12-2017</td>
         <td>100</td>
         <td>
         <p>Ярость Квинтона</p>
         <p>(S360)</p>
         </td>
         <td>
         <a class="state" href="###">Успешно</a>
         </td>
         </tr>
         */

        var page = listObj.attr('data-page');
        var data = {
            "page": page ? page : 1
        };

        var i = layer.load();
        $.ajax({
            url: H5App.options.baseUrl + "/service/loglist",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {
            layer.close(i);
        }).done(function (res) {
            var _html = '';
            if (res.status == 1 && res.errCode == 0) {
                listObj.attr('data-page',Number(page) + 1);
                var data = res.data;
                if (data instanceof Array) {

                    for (var i in data) {
                        var _class = (data[i]['status'] == 1) ? 'isupdate' : '';
                        if(data[i]['gsname'] == null){
                            data[i]['gsname'] = '--';
                        }
                        _html += '<tr>';
                        _html += '<td class="' + _class + '">' +  data[i]['gsname'] + '</td>';
                        _html += '<td>' + data[i]['created_at'] + '</td>';
                        _html += '<td><a class="state" href="' + H5App.options.baseUrl + '/service/view/id/' + data[i]['id'] + '">' + translate('detail', H5BaseLang) + '</a></td>';
                        _html += '</tr>';
                    }

                }

            }

            if (page >1) {
                listObj.append(_html);
            } else {
                listObj.html(_html);
            }

            if(res.next_have == false){
                listObj.attr('data-next',0);
            }


        }).fail(function () {
            console.log('error');
        });
    },

    // 用户中心 玩家礼包列表
    userGiftList: function (listObj,params) {
        /**
         * 模板
         *
         <tr>
         <td>Ярость Квинтона</td>
         <td>Очков</td>
         <td>
         <a class="state" href="###">Подробнее</a>
         </td>
         </tr>
         */
        var page = listObj.attr('data-page');
        var gid = '';
        if(params){
            gid = params.gid;
        }

        var data = {
            "gid": gid ? gid : '',
            "page": page ? page : 1
        };
        var i = layer.load();
        $.ajax({
            url: H5App.options.baseUrl + "/user/giftlist",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {
            layer.close(i);
        }).done(function (res) {
            var _html = '';
            if (res.status == 1 && res.errCode == 0) {
                listObj.attr('data-page',Number(page) + 1);
                var data = res.data;

                if (data instanceof Array  && data.length > 0) {
                    for (var i in data) {

                        _html += '<tr>';
                        _html += '<td>' + data[i]['gamename'] + '</td>';
                        _html += '<td>' + data[i]['type_desc'] + '</td>';
                        _html += '<td><a class="state dialog" data-goods_detail="' + data[i]['goods_detail'] + '" data-dialogbox =".gift-code">' + translate('detail', H5BaseLang) + '</a></td>';
                        _html += '</tr>';
                    }
                }
            }

            if (page >1) {
                listObj.append(_html);
            } else {
                listObj.html(_html);
            }

            if(res.next_have == false){
                listObj.attr('data-next',0);
            }


        }).fail(function () {
            console.log('error');
        });

    },

    // 礼包中心 免费礼包列表
    giftList: function (page) {
        /**
         * 模板
         *
         <div class="gift-list">
         <div class="gift-list-header">
         <img src="__PUBLIC__/common/H5/images/img/icon1.jpg" alt="">
         <h3>GAME NAME</h3>
         </div>
         <ul class="gift-list-body">
         <li>
         <div class="content">
         <h3>Gift</h3>
         <p>
         xxx xxxs
         </p>
         </div>
         <a href=" ### " class="gift-btn " data-code="111111111111111">получить</a>
         </li>
         </ul>
         </div>
         */

        var data = {
            "page": page ? page : 1
        };
        var self = this;

        $.ajax({
            url: this.options.baseUrl + "/giftbag/baglist",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<div class="gift-list">\
                                    <div class="gift-list-header">\
                                        <img src="' + data[i]['game']['pic4'] + '" alt="">\
                                        <h3>' + data[i]['game']['gamename'] + '</h3>\
                                    </div>\
                                    <ul class="gift-list-body">';

                        var _gift = data[i]['gift'];
                        for (var j in _gift) {
                            _html += '<li>\
                                    <div class="content">\
                                        <h3>' + _gift[j]['title'] + '</h3>\
                                        <p>' + _gift[j]['desc'] + '</p>\
                                    </div>\
                                    <a href="javascript:;" class="gift-btn" data-res="loading..." data-id="' + _gift[j]['id'] + '" data-dialogbox =".gift-code">' + translate('exchange', H5BaseLang) + '</a>\
                                </li>';
                        }

                        _html += '</ul>\
                        </div>';

                    }

                    $('#gift-bag-list').append(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });

    },

    // 积分商城 积分礼包列表
    mallList: function (page) {
        /**
         * 模板
         *
         <li>
         <a class="shoping-link" href="./detail.html">
         <img src="__PUBLIC__/common/H5/images/img/icon1.jpg" alt="">
         <div class="content">
         <h2>Зышифщзс</h2>
         <p>потребные очки: 2222222</p>
         <p>остаток: 666666</p>
         </div>
         </a>
         </li>
         */

        var data = {
            "page": page ? page : 1
        };
        var self = this;

        $.ajax({
            url: this.options.baseUrl + "/mall/mallList",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>\
                                    <a class="shoping-link" href="' + self.options.baseUrl + '/mall/detail/id/' + data[i]['id'] + '">\
                                    <img src="' + data[i]['image_small'] + '" alt="">\
                                    <div class="content">\
                                    <h2>' + data[i]['title'] + '</h2>\
                                    <p>' + translate('need_points', H5BaseLang) + ': ' + data[i]['integral'] + '</p>\
                                    <p>' + translate('sku_num', H5BaseLang) + ': ' + data[i]['number'] + '</p>\
                                    </div>\
                                    </a>\
                                </li>';

                    }

                    $('.shoping-list').append(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });

    },

    // 积分商城 推荐的积分礼包列表
    mallRecommend: function (page) {
        /**
         * 模板
         *
         <li>
         <a class="shoping-link" href="./detail.html">
         <img src="__PUBLIC__/common/H5/images/img/icon1.jpg" alt="">
         <div class="content">
         <h2>Зышифщзс</h2>
         <p>потребные очки: 2222222</p>
         <p>остаток: 666666</p>
         </div>
         </a>
         </li>
         */

        var data = {
            "page": page ? page : 1
        };
        var self = this;

        $.ajax({
            url: this.options.baseUrl + "/mall/mallRecommend",
            type: "POST",
            data: data,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {

            if (res.status == 1 && res.errCode == 0) {
                var data = res.data;
                if (data instanceof Array) {
                    var _html = '';
                    for (var i in data) {
                        _html += '<li>\
                                    <a class="shoping-link" href="' + self.options.baseUrl + '/mall/detail/id/' + data[i]['id'] + '">\
                                    <img src="' + data[i]['image_small'] + '" alt="">\
                                    <div class="content">\
                                    <h2>' + data[i]['title'] + '</h2>\
                                    <p>' + translate('need_points', H5BaseLang) + ': ' + data[i]['integral'] + '</p>\
                                    <p>' + translate('sku_num', H5BaseLang) + ': ' + data[i]['number'] + '</p>\
                                    </div>\
                                    </a>\
                                </li>';

                    }

                    $('#mall-recommend').append(_html);

                }

            }


        }).fail(function () {
            console.log('error');
        });

    },

    // 显示小弹框 obj:点击显示弹框的按钮对象,也可以是弹框里的内容对象
    showDialog: function (obj) {

        var data = {};  // 拿到所有data属性值
        if(typeof obj.data() == 'undefined'){
            var _content = $(obj);

        }else{
            data = obj.data();
            var _content = $(data.dialogbox);
        }


        var content = _content.clone();
        content.show();
        var title = content.attr('data-title');
        for (var key in data) {
            content.find('[data-' + key + ']').text(data[key]);
        }

        var dialog_head = '<div class="title"><h3>' + title + '</h3>\
                            <a href="###" class="close">\
                                <img src="' + this.options.publicPath + '/common/H5/images/h5_icon/icon3.png" alt="">\
                            </a>\
                        </div>';
        var dialog_box = $('<div class="lay-bg"><div class="lay-details">' + dialog_head + '</div></div>');
        dialog_box.show();
        dialog_box.find('.lay-details').append(content);

        $('body').append(dialog_box);


    },
    // 隐藏弹框
    hideDialog: function (obj) {
        var dialog_box = obj.parents('.lay-bg');
        dialog_box.remove();
    },

    // 设置元素宽高为屏幕的宽高
    setWinSize: function (obj,wcut,hcut) {
        var obj = $(obj);
        if(H5App.isMobileApp()){
            var winH =  document.documentElement.clientHeight || document.body.offsetHeight;
        }else{
            var winH = $(window).height();
        }


        var winW = window.screen.availWidth || window.screen.width;
        if(wcut){
            winW = winW - Number(wcut);
        }
        if(hcut){
            winH = winH - Number(hcut);
        }

        if(wcut == 0 || wcut == undefined){
            obj.css({
                "height": winH,
                "width": '100%'
            });
        }else{
            obj.css({
                "height": winH,
                "width": winW
            });
        }


        if(H5App.isMobileApp() || this.isFull == true){
            $('#JCgameIframe').css({
                "position":"fixed",
                'left': 0,
                'top': 0,
                'width': '100%',
                'height': '100%'
            });
        }


    },

    getWinSize: function () {
        //var winW = window.screen.availWidth || window.screen.width;
        var winW = document.documentElement.clientWidth || document.body.offsetWidth;

        // if(H5App.isMobileApp()){
        //     var winH =  document.documentElement.clientHeight || document.body.offsetHeight;
        // }else{
        //     var winH = $(window).height();
        // }

        var winH =  document.documentElement.clientHeight || document.body.offsetHeight;
        return [winW,winH];
    },

     browser:{
        versions:function(){
            var u = navigator.userAgent;
            return {
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,//火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Adr') > -1, //android终端
                iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1, //是否web应用程序，没有头部与底部
                weixin: u.indexOf('MicroMessenger') > -1, //是否微信
                qq: u.match(/\sQQ/i) == "qq", //是否QQ

                isChrome : u.indexOf("Safari") > -1 && (u.indexOf("Chrome") > -1 || u.indexOf("CriOS") > -1),
                isSafari : u.indexOf("Safari") > -1 && (u.indexOf("Chrome") == -1 && u.indexOf("CriOS") == -1)
            };
        }(),
        language:(navigator.browserLanguage || navigator.language).toLowerCase()
    },

    isMobileApp:function () {
        return H5App.browser.versions.mobile || H5App.browser.versions.iPhone || H5App.browser.versions.iPhone || H5App.browser.versions.android||H5App.browser.versions.ios;
    },
    // 游戏页面的小圆球事件
    gamePageDrag: function (obj) {
        var shortcut = $(obj)[0];
        var icon = shortcut.querySelector('.icon');
        var navList = shortcut.querySelector('.nav-list');

        var isShow = false;
        var hammer = new Hammer(icon);
        hammer.on('tap', function (e) {
            if (isShow === false) {
                navList.style.display = 'flex';
                isShow = true;
            } else {
                navList.style.display = 'none';
                isShow = false;
            }
        });

        function drag(obj, parentNode) {
            var obj = document.getElementById(obj);
            if (!obj) {
                return;
            }
            if (arguments.length == 1) {
                var parentNode = window.self;
                var pWidth = parentNode.innerWidth,
                    pHeight = parentNode.innerHeight;
            } else {
                var parentNode = document.getElementById(parentNode);
                var pWidth = parentNode.clientWidth,
                    pHeight = parentNode.clientHeight;
            }
            obj.addEventListener('touchstart', function (event) {
                if(event.target.classList.contains('quick-way-btn')){

                    return false;
                }

                //当只有一个手指时              .
                if (event.touches.length == 1) {
                    //禁止浏览器默认事
                    event.preventDefault();
                    if(event.target.href){
                        window.location.href = event.target.href;
                    }
                };
                obj.classList.remove('end');

                var touch = event.targetTouches[0];
                var disX = touch.clientX - obj.offsetLeft,
                    disY = touch.clientY - obj.offsetTop;
                var oWidth = obj.offsetWidth,
                    oHeight = obj.offsetHeight;

                obj.addEventListener('touchmove', dragMove);
                obj.addEventListener('touchend', dragEnd);

                function dragMove(event) {
                    navList.style.display = 'none';
                    isShow = false;

                    var touch = event.targetTouches[0];
                    obj.style.left = touch.clientX - disX + 'px';
                    obj.style.top = touch.clientY - disY + 'px';
                    //左侧
                    if (obj.offsetLeft <= 0) {
                        obj.style.left = 0;
                    };
                    //右侧
                    if (obj.offsetLeft >= pWidth - oWidth) {
                        obj.style.left = pWidth - oWidth + 'px';
                    };
                    //上面
                    if (obj.offsetTop <= 0) {
                        obj.style.top = 0;
                    };
                    //下面
                    if (obj.offsetTop >= pHeight - oHeight) {
                        obj.style.top = pHeight - oHeight + 'px';
                    };
                }

                function dragEnd(event) {
                    if (obj.offsetLeft < pWidth / 2) {
                        obj.style.left = 0;
                        navList.classList.remove('right');
                    } else {
                        obj.style.left = pWidth - oWidth + 'px';
                        navList.classList.add('right');
                    }
                    obj.classList.add('end');
                    obj.removeEventListener('touchmove', dragMove);
                    obj.removeEventListener('touchend', dragEnd);
                }
            });
        }
        drag('shortcut')
    },

    // 向游戏框架发送消息
    postMessage: function (params) {

        var JCgameIframe = $(H5App.options.gameIframe);
        var game_host = $(H5App.options.gameHost).val();
        JCgameIframe[0].contentWindow.postMessage(params, '*');
        //console.log(params);
    },
    getMessage: function () {
        window.addEventListener('message',function(e){
           console.log(e);

            var webDomain = $(H5App.options.webDomain).val();
            if(e.origin.indexOf(webDomain) != -1 ){
                try{
                    var data = JSON.parse(e.data);
					console.log("==============getMessage 1 ============");
                    console.log(e.data);
					
                    if(data && data.method){
                        var method = data.method;
                        var params = data.params;
                        H5App[method](params);
                    }
                }catch(e){
					console.log("==============getMessage 2============");
                    console.log(e);
                    return true;
                }


            }else{
                if(e.origin == H5App.options.okOrigin){
                    try{
						console.log("==============getMessage 3============");	
                       // console.log(e);
                        var data = JSON.parse(e.data);

                        layer.closeAll();
                        // ok 发布分享返回ID
                        if(typeof data.id != 'undefined'){
                            var method ='showShareBox';
                            var res = {
                                'status': 1,
                                'errorCode':0,
                                'msg': 'success',
                                'data':[]
                            };
                            console.log(res);
                            H5App.sendResponse(method,res);

                        }

                    }catch (e){
						console.log("==============getMessage 4============");
                        return true;
                    }



                }
            }


        },false);
    },

    // Tải và gửi kết quả dữ liệu phản hồi đến SDK
    sendResponse: function (method,res) {
        var status = 'failed';
        if(res.status == 1){
            status = 'success';
        }

        var response = {
            'method':method + 'Done',
            'params':{
                'status': status,
                'errCode':res.errCode,
                'msg':res.msg,
                'data': res.data
            }
        };
        response = JSON.stringify(response);
        H5App.postMessage(response);

    },

    // 显示支付渠道选择框
    showPaymentChoose: function () {
        var obj = $(H5App.options.paymentChoose);
        obj.show();
    },
    // 关闭支付渠道选择框
    hidePaymentChoose: function () {
        var obj = $(H5App.options.paymentChoose);
        obj.hide();
    },

    // Hiển thị kênh nạp
    showPayBox: function (params) {
        // Nếu nó là toàn màn hình, thoát khỏi toàn màn hình
        if (H5App.isFull){
            H5App.setScreen();
        }
        console.log('PayBox:');
        console.log(params);
        var method = 'showPayBox';
		//params['platform_name'] = 'cmn';
        var platform = 'cmn';
        var funs = platform + method;
        if(this.showPayBoxFuns[funs] == 'undefined'){
            throw new Error('Method ' + funs + ' is undefined or invalid');
        }
		//params['goods_id'] = 2001;
        // Gán giá trị cho cửa sổ bật lên chọn hộp thanh toán
        var goods_id = 2001;

        if (platform == 'cmn') {

        } else {
            if(typeof recharge_appItem[goods_id] =='undefined'){
                var res = {
                    'status': 0,
                    'errCode': 7,
                    'msg': 'Goods ID not exists'
                };
                H5App.sendResponse(method,res);
                return false;
            }
        }
        this.showPayBoxFuns[funs](params,method);

    },

    // 关闭平台支付弹框
    closePayBox: function () {
        var payBox = $(H5App.options.paymentBox);
        payBox.hide();
        var paymentIframe = $(H5App.options.paymentIframe);     // 支付页面
        paymentIframe.attr('src','');
    },

    checkLogin: function (params) {
        // console.log('checkLogin:');
        // console.log(params);
        $.ajax({
            url: H5App.options.baseUrl + "/gameApi/checkLogin",
            type: "POST",
            data: params,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {
            var method = 'checkLogin';
            H5App.sendResponse(method,res);
            H5App.setPlayerInfo(res.data);

        }).fail(function () {
            console.log('error');
        });

    },
    refreshLogin: function (params) {
        console.log('refresh login');
        window.location.reload();
    },

    // 保存玩家游戏等级数据
    reportLevel: function (params) {
        $.ajax({
            url: H5App.options.baseUrl + "/gameApi/reportLevel",
            type: "POST",
            data: params,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {
            if (params.platform_name == 'joyfun') {
                var res_data = res.data;
                jfsdk.reportLevelUp({
                    step: "1",
                    level: res_data.level,
                    serverId: res_data.sid,
                    character: res_data.character_name
                });

            }

            var method = 'reportLevel';
            H5App.sendResponse(method,res);


        }).fail(function () {
            console.log('error');
        });
    },

    // 上报战力
    reportFight: function (params) {
        $.ajax({
            url: H5App.options.baseUrl + "/gameApi/reportFight",
            type: "POST",
            data: params,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {
            var method = 'reportFight';
            H5App.sendResponse(method,res);
            H5App.setPlayerInfo({fight:params.fight});


        }).fail(function () {
            console.log('error');
        });
    },

    // 上报玩家其他游戏数据 例如竞技排行，团排行
    reportPlayerInfo: function (params) {
        $.ajax({
            url: H5App.options.baseUrl + "/gameApi/reportPlayerInfo",
            type: "POST",
            data: params,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {
            var method = 'reportPlayerInfo';
            H5App.sendResponse(method,res);
            H5App.setPlayerInfo(params);


        }).fail(function () {
            console.log('error');
        });
    },

    // 保存玩家角色名称数据
    reportCharacter: function (params) {
        $.ajax({
            url: H5App.options.baseUrl + "/gameApi/reportCharacter",
            type: "POST",
            data: params,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {
            var method = 'reportCharacter';
            var res_data = res.data;
            if (params.platform_name == 'joyfun') {
                jfsdk.reportEnterGame({
                    step: "1",
                    level: res_data.level,
                    serverId: res_data.sid,
                    character: res_data.character_name
                });
            }
            H5App.setPlayerInfo({character:res_data.character_name,serverName:res_data.serverName});
            var timeout = setTimeout(function () {
                H5App.sendResponse(method,res);
                clearTimeout(timeout);
            },2000);


        }).fail(function () {
            console.log('error');
        });
    },

    showPayBoxFuns:{
        RCshowPayBox:function () {
            var params = arguments[0];
            var method = arguments[1];

            var goods_id = params['goods_id'];
            var paymentChoose = $(H5App.options.paymentChoose);     // 平台支付选择框对象
            var goods_info = recharge_appItem[goods_id];
            var _total_count = Number(goods_info['count']) + Number(goods_info['additional']);
            _total_count += ' ' + goods_info['name'];
            $('#recharge-total-count').text(_total_count);
            $('#recharge-total-money').text(goods_info['price']);

            // 让用户选择支付渠道显示
            H5App.showPaymentChoose();

            $('.choose_paytype').unbind('click');
            $('.choose_paytype').bind('click',function () {
                var pay_type = paymentChoose.find('input:checked').val();

                params['pay_type'] = pay_type;

                $.ajax({
                    url: H5App.options.baseUrl + "/pay/create",
                    type: "POST",
                    data: params,
                    dataType: "JSON"
                }).always(function () {

                }).done(function (res) {

                    if (res.status == 1 && res.errCode == 0) {
                        var data = res.data;
                        // var paymentBox = $(H5App.options.paymentBox);
                        // paymentBox.show();

                        //paymentIframe.attr('src',data['url']);

                        var winSize = H5App.getWinSize();
                        if(H5App.isMobileApp()){
                            var areaSize = [
                                (winSize[0] - 30) + 'px',
                                (winSize[1] -40) + 'px'
                            ];
                        }else{
                            var areaSize = [
                                (winSize[0] - 30)/2 + 'px',
                                (winSize[1] -40) + 'px'
                            ];
                        }


                        layer.open({
                            type: 2,
                            content: data['url'], //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
                            title: translate('recharge',H5BaseLang),
                            area: areaSize,
                            id: "paymentBoxLayer",
                            anim: 1

                        });

                    }

                    H5App.sendResponse(method,res);
                    H5App.hidePaymentChoose();  // 隐藏支付选择框


                }).fail(function () {
                    console.log('error');
                });
            });
        },

        vkshowPayBox:function () {
            var params = arguments[0];
            var method = arguments[1];
            //console.log(params);

            // 为了跟原来web端参数保持一致 充值档位ID参数名称为 gear_id
            params['gear_id'] = params['goods_id'];

            $.ajax({
                url: H5App.options.baseUrl + "/platform/pay/platform_name/"+params['platform_name']+"/game_id/"+params['gid'],
                type: "POST",
                data: params,
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;

                    var params = {
                        type: 'item',
                        item: data.item + '_' + data.id
                    };

                    VK.callMethod('showOrderBox', params);

                    VK.addCallback('onOrderBoxDone',function (status) {
                        //alert(status);
                        H5App.sendResponse(method,res);
                    });

                }


            }).fail(function () {
                console.log('error');
            });


        },

        okshowPayBox:function () {
            var params = arguments[0];
            var method = arguments[1];

            // 为了跟原来web端参数保持一致 充值档位ID参数名称为 gear_id
            params['gear_id'] = params['goods_id'];

            $.ajax({
                url: H5App.options.baseUrl + "/platform/pay/platform_name/"+params['platform_name']+"/game_id/"+params['gid'],
                type: "POST",
                data: params,
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;
                    var okMobile = $('#okMobile').val();

                    if (okMobile) {
                        OKSDK.Payment.showInFrame(data.name, data.get_coin, data.id, null,'paymentFrame');
                    } else {
                        FAPI.UI.showPayment(data.name, data.name, data.id, data.get_coin, null, data.json, "ok", "true");
                    }


                    //H5App.sendResponse(method,res);
                }


            }).fail(function () {
                console.log('error');
            });
        },

        joyfunshowPayBox:function () {
            var params = arguments[0];
            var method = arguments[1];

            // 为了跟原来web端参数保持一致 充值档位ID参数名称为 gear_id
            params['gear_id'] = params['goods_id'];

            $.ajax({
                url: H5App.options.baseUrl + "/platform/pay/platform_name/"+params['platform_name']+"/game_id/"+params['gid'],
                type: "POST",
                data: params,
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;

                    //alert(JSON.stringify(data));

                    jfsdk.pay({ data: {
                        serverId: data.sid,
                        cpOrderId: data.orderid,
                        gameGoodsId: data.item_id,
                        goodsName: data.item_name,
                        goodsDesc: data.item_name,
                        goodsNum: 1,    // 按档位充值，一个商品就是一个档位
                        goodsPrice: data.price,
                        goodsAmount:data.amount,
                        extParams: data.extend
                    },
                        onFail: function(errorMessage) {
                            //支付失败

                        },
                        onCancel: function() { //支付取消

                        },
                        onFinish: function() {
                            //支付结束(此回调方法只表示支付结束，具体支付结果以服务器端通知为准)
                            H5App.sendResponse(method,res);
                        }
                    });

                }


            }).fail(function () {
                console.log('error');
            });
        },
		
        cmnshowPayBox: function () {
            var params = arguments[0];
            $.ajax({
                url: "https://h5.fun2vn.com/gameApi/getPayUrl/platform_name/cmn/gid/2001",
                type: "GET",
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {
                if (res.status == 1 && res.errCode == 0) {
                    var areaSizeObj = H5App.getAreaSize();

                  var cmnIndex = layer.open({
                    type: 2,
                    content: res.data.pay_url, //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
                    title: translate('recharge',H5BaseLang),
                    area: [areaSizeObj['areaSize'][0] + 'px', areaSizeObj['areaSize'][1] + 'px'],
                    id: "cmnPayBox-layer",
                    anim: 1
                  });
                  $(window).on("resize", function () {
                    var areaSizeObj = H5App.getAreaSize();
                    var winSize = areaSizeObj['winSize'];
                    var areaSize = areaSizeObj['areaSize'];
                    layer.style(cmnIndex, {
                      width: areaSize[0] + 'px' ,
                      height: areaSize[1] + 'px',
                      top: (winSize[1] - areaSize[1])/2 + 'px',
                      left: (winSize[0] - areaSize[0]) /2 + 'px',
                    });

                  });


                    // if (H5App.isMobileApp()) {
                    //   var newWindow = window.open('about:blank', '_blank');
                    //   // 移动端 弄成跳转新页面
                    //   //window.open(res.data.pay_url,'_blank');
                    //   newWindow.location.href = res.data.pay_url;
                    // } else {
                    //   // web 端，弄弹框
                    // }





                }
            }).fail(function () {
                console.log('error');
            });
        },
		
        mailrushowPayBox: function () {
            var params = arguments[0];
            var method = arguments[1];
            console.log('mailruPayBox:');
            console.log(params);

            // 为了跟原来web端参数保持一致 充值档位ID参数名称为 gear_id
            params['gear_id'] = params['goods_id'];

            $.ajax({
                url: H5App.options.baseUrl + "/platform/pay/platform_name/"+params['platform_name']+"/game_id/"+params['gid'],
                type: "POST",
                data: params,
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;
                    mailru.app.payments.showDialog({
                        service_id: data.id,
                        service_name: data.name,
                        mailiki_price: data.price
                    });

                    //H5App.sendResponse(method,res);
                }


            }).fail(function () {
                console.log('error');
            });

        }
    },

    // 显示邀请模块
    showInviteBox: function (params) {
        var method= 'showInviteBox';
        var platform = params['platform_name'];
        var funs = platform + method;
        if(this.showInviteBoxFuns[funs] === undefined){
            throw new Error('Method ' + funs + ' is undefined or invalid');
        }

        this.showInviteBoxFuns[funs](params,method);
    },
    showInviteBoxFuns:{
        RCshowInviteBox:function () {
            var params = arguments[0];
            var method = arguments[1];

            var sharePlatform = 'vk';

            $.ajax({
                url: H5App.options.baseUrl + "/gameApi/getEventConfig",
                type: "POST",
                data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['share']},
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;

                    var cdk_res = {
                        status : res.status,
                        errCode: res.errCode,
                        msg: res.msg,
                        data: ''
                    };

                    // message: data['message'] +' ' + data['url'] + '?request_id=uid_'+params['uid']+'&request_platform='+params['platform_name'],
                    // attachments: [data['photo']],


                    var winSize = H5App.getWinSize();
                    var areaSize = [
                        (winSize[0] - 20) + 'px',
                        (winSize[1] -60) + 'px'
                    ];



                    switch (sharePlatform){
                        case 'vk':
                            var apiUrl = 'https://vkontakte.ru/share.php?';

                            apiUrl += 'url='+ encodeURIComponent(data['url'] + '?request_id=uid_' + params['uid'] + '&request_platform=' + params['platform_name'] );
                            apiUrl += '&comment=' + encodeURIComponent(data['message']);
                            apiUrl += '&title=' + data['title'];

                            // layer.open({
                            //     type: 2,
                            //     content: apiUrl, //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
                            //     title: translate('share',H5BaseLang),
                            //     area: areaSize,
                            //     id: "RCshareBox",
                            //     anim: 1
                            //
                            // });

                            H5App.sendResponse(method,cdk_res);
                            window.open(apiUrl);


                            break;

                    }





                }


            }).fail(function () {
                console.log('error');
            });
        },

        vkshowInviteBox:function () {
            var params = arguments[0];
            var method = arguments[1];


            if(VK._bridge == false){
                VK.callMethod('showInviteBox');

                var cdk_res = {
                    status : 1,
                    errCode: 0,
                    msg: 'success',
                    data: ''
                };
                setTimeout(function (method,cdk_res) {
                    H5App.sendResponse(method,cdk_res);
                },15000,method,cdk_res);



            }else{
                VK.callMethod('showInviteBox');
                VK.addCallback('onInviteBoxDone',function (status,data) {

                    if(status == 'success'){
                        var cdk_res = {
                            status : 1,
                            errCode: 0,
                            msg: 'success',
                            data: ''
                        };
                        H5App.sendResponse(method,cdk_res);
                    }

                });
            }
        },

				cmnshowInviteBox:function () {
					var params = arguments[0];
					var method = arguments[1];

					$.ajax({
						url: H5App.options.baseUrl + "/gameApi/getEventConfig",
						type: "POST",
						data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['invite']},
						dataType: "JSON"
					}).always(function () {

					}).done(function (res) {
						var cdk_res = {
							status : res.status,
							errCode: res.errCode,
							msg: res.msg,
							data: ''
						};
						if (res.status == 1 && res.errCode == 0) {

							FB.ui({method: 'apprequests',
								message: res.data.message
							}, function(response){
								console.log(response);
								if(response && response.request){
//                var request_id = response.request;
									//var to_ids = response.to;
									H5App.sendResponse(method,cdk_res);
								}

							});

							// FB.ui({
							// 	method: 'send',
							// 	link: 'http://www.nytimes.com/interactive/2015/04/15/travel/europe-favorite-streets.html',
							// });
						}


					}).fail(function () {
						console.log('error');
					});



			},
    },

    // 显示分享模块
    showShareBox: function (params) {
        var method= 'showShareBox';
        var platform = params['platform_name'];
        var funs = platform + method;
        if(this.showShareBoxFuns[funs] === undefined){
            throw new Error('Method ' + funs + ' is undefined or invalid');
        }

        this.showShareBoxFuns[funs](params,method);
    },

    showShareBoxFuns:{
        RCshowShareBox:function () {
            var params = arguments[0];
            var method = arguments[1];

            var sharePlatform = 'vk';

            $.ajax({
                url: H5App.options.baseUrl + "/gameApi/getEventConfig",
                type: "POST",
                data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['share']},
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;

                    var cdk_res = {
                        status : res.status,
                        errCode: res.errCode,
                        msg: res.msg,
                        data: ''
                    };

                    // message: data['message'] +' ' + data['url'] + '?request_id=uid_'+params['uid']+'&request_platform='+params['platform_name'],
                   // attachments: [data['photo']],


                    var winSize = H5App.getWinSize();
                    var areaSize = [
                        (winSize[0] - 20) + 'px',
                        (winSize[1] -60) + 'px'
                    ];



                    switch (sharePlatform){
                        case 'vk':
                            var apiUrl = 'https://vkontakte.ru/share.php?';

                            apiUrl += 'url='+ encodeURIComponent(data['url'] + '?request_id=uid_' + params['uid'] + '&request_platform=' + params['platform_name'] );
                            apiUrl += '&comment=' + encodeURIComponent(data['message']);
                            apiUrl += '&title=' + data['title'];

                            // layer.open({
                            //     type: 2,
                            //     content: apiUrl, //这里content是一个URL，如果你不想让iframe出现滚动条，你还可以content: ['http://sentsin.com', 'no']
                            //     title: translate('share',H5BaseLang),
                            //     area: areaSize,
                            //     id: "RCshareBox",
                            //     anim: 1
                            //
                            // });

                            H5App.sendResponse(method,cdk_res);
                            window.open(apiUrl);


                            break;

                    }





                }


            }).fail(function () {
                console.log('error');
            });

        },

        vkshowShareBox:function () {
            var params = arguments[0];
            var method = arguments[1];


            // if(VK._bridge == false){
            //     VK.callMethod('showInviteBox');
            //
            //     var cdk_res = {
            //         status : 1,
            //         errCode: 0,
            //         msg: 'success',
            //         data: ''
            //     };
            //     setTimeout(function (method,cdk_res) {
            //         H5App.sendResponse(method,cdk_res);
            //     },15000,method,cdk_res);
            //
            //
            //
            // }else{
            //     VK.callMethod('showInviteBox');
            //     VK.addCallback('onInviteBoxDone',function (status,data) {
            //
            //         if(status == 'success'){
            //             var cdk_res = {
            //                 status : 1,
            //                 errCode: 0,
            //                 msg: 'success',
            //                 data: ''
            //             };
            //             H5App.sendResponse(method,cdk_res);
            //         }
            //
            //     });
            // }
            // return ;

            $.ajax({
                url: H5App.options.baseUrl + "/gameApi/getEventConfig",
                type: "POST",
                data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['share']},
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;

                    var cdk_res = {
                        status : res.status,
                        errCode: res.errCode,
                        msg: res.msg,
                        data: ''
                    };

                    if(VK._bridge == false){ // 网页版
                        var args = {
                            owner_id: userConfig['platform_uid'],
                            friends_only: 0,
                            from_group: 1,
                            message: data['message'] +' ' + data['url'] + '?request_id=uid_'+params['uid']+'&request_platform='+params['platform_name'],
                            attachments:data['photo']
                        };

                        if(H5App.sdkDebug){
                            args['test_mode'] = 1;
                        }

                        VK.api('wall.post',args,function (response) {
                            console.log(response);
                            if(response['response']){
                                H5App.sendResponse(method,cdk_res);
                            }

                        });


                    }else{
                        var args = {
                            message: data['message'] +' ' + data['url'] + '?request_id=uid_'+params['uid']+'&request_platform='+params['platform_name'],
                            attachments: [data['photo']],
                            target: 'wall'
                        };

                        VK.callMethod('showShareBox', args['message'],args['attachments'],args['target']);
                        VK.addCallback('onShareBoxDone',function (status) {
                            //alert(status);
                            H5App.sendResponse(method,cdk_res);
                        });

                    }



                }


            }).fail(function () {
                console.log('error');
            });




        },

        okshowShareBox:function () {
            var params = arguments[0];
            var method = arguments[1];


            $.ajax({
                url: H5App.options.baseUrl + "/gameApi/getEventConfig",
                type: "POST",
                data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['share']},
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;

                    var _photo = data['photo'].split(',');
                    var img_obj = [];
                    if(_photo.length > 0){
                        for(var i in _photo){
                            // { "id": "photoToken1" },
                            //{ "id": "photoToken2" },
                            //var _o = {"photoId": _photo[i]};
                            var _o = {
                                "type": "photo",
                                "list": [{"photoId": _photo[i]}],
                            };

                            img_obj.push(_o);
                        }
                    }

                    var _parms = {
                        "media":[
                            {
                                "type": "text",
                                "text": data['message']
                            },

                            {
                                "type": "link",
                                "url": data['url'] + '?request_id=uid_'+params['uid']+'&request_platform='+params['platform_name']
                            },

                        ]

                    };

                    if(img_obj.length > 0){
                        for(var i in img_obj){
                            _parms['media'].push(img_obj[i]);
                        }

                    }


                    //console.log(_parms);
                    OKSDK.Widgets.post(null, JSON.stringify(_parms));
                    //OKSDK.Widgets.post('', _parms);


                }


            }).fail(function () {
                console.log('error');
            });




        },
        cmnshowShareBox:function () {
            var params = arguments[0];
            var method = arguments[1];
            console.log(params);
            $.ajax({
                url: H5App.options.baseUrl + "/gameApi/getEventConfig",
                type: "POST",
                data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['share']},
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {
                var cdk_res = {
                    status : res.status,
                    errCode: res.errCode,
                    msg: res.msg,
                    data: ''
                };
                if (res.status == 1 && res.errCode == 0) {

                    var share_type = params['type'];
                    if (!share_type) {
                    	share_type = 1;
										}
                    var share_url = Platform_config['share'+share_type];
                    console.log(share_url);
                    cdk_res.data = {
                        type:share_type
                    };
                    FB.ui(
                        {
                            method: 'share',
                            href: share_url,
                            display:'popup'
                        },
                        // callback
                        function(response) {

                            if(response && !response.error_code){
                                H5App.sendResponse(method,cdk_res);
                            }
                        }
                    );

                }


            }).fail(function () {
                console.log('error');
            });

        },

        mailrushowShareBox:function () {
            var params = arguments[0];
            var method = arguments[1];
            $.ajax({
                url: H5App.options.baseUrl + "/gameApi/getEventConfig",
                type: "POST",
                data: {'platform_name': params['platform_name'], 'gid': params['gid'], 'event_type': H5App.event_type['share']},
                dataType: "JSON"
            }).always(function () {

            }).done(function (res) {

                if (res.status == 1 && res.errCode == 0) {
                    var data = res.data;


                    var args = {
                        'url': data['url'],
                        'title':data['title'],
                        'text': data['message'],
                        'img_url': data['photo'],
                        'user_text': data['message']
                    };


                    mailru.common.stream.post(args);


                }


            }).fail(function () {
                console.log('error');
            });

            mailru.events.listen(mailru.common.events.streamPublish, function(event) {
                console.log(event);
                var cdk_res = {
                    status : 1,
                    errCode: 0,
                    msg: 'success',
                    data: ''
                };

                H5App.sendResponse(method,cdk_res);

            });
        }
    },

    getFriends: function (params) {
        var method= 'getFriends';
        var platform = params['platform_name'];
        var funs = platform + method;
        if(this.getFriendsFuns[funs] === undefined){
            throw new Error('Method ' + funs + ' is undefined or invalid');
        }

        this.getFriendsFuns[funs](params,method);

    },

    getFriendsFuns:{
        vkgetFriends: function () {

            var params = arguments[0];
            var method = arguments[1];

            var args = {
                app_id: Platform_config['appId'],
                platform: 'web',
                extended: 0,
                return_friends: 1,
                fields:'',
                name_case:'nom',
                v:5.73
            };

            if(H5App.sdkDebug){
                args['test_mode'] = 1;
            }

            VK.api('apps.get',args,function (response) {
                //console.log(response);

                if(response['response']){
                    params['friends'] = response['response']['items'][0]['friends'];

                    if(params['friends'].length > 0){
                        $.ajax({
                            url: H5App.options.baseUrl + "/gameApi/getFriends",
                            type: "POST",
                            data: params,
                            dataType: "JSON"
                        }).always(function () {

                        }).done(function (res) {

                            if (res.status == 1 && res.errCode == 0) {

                                H5App.sendResponse(method,res);

                            }


                        }).fail(function () {
                            console.log('error');
                        });

                    }else{
                        var res = {
                            'status': 0,
                            'errCode': 10,
                            'msg': 'Data is empty'
                        };

                        H5App.sendResponse(method,res);
                    }
                }



            });
        },

        okgetFriends: function () {

            var params = arguments[0];
            var method = arguments[1];

            OKSDK.REST.call("friends.getAppUsers", {}, function (status, data, error) {

                console.log(data);

                if(status == 'ok'){
                    params['friends'] = data['uids'];

                    if(params['friends'].length > 0){
                        $.ajax({
                            url: H5App.options.baseUrl + "/gameApi/getFriends",
                            type: "POST",
                            data: params,
                            dataType: "JSON"
                        }).always(function () {

                        }).done(function (res) {

                            if (res.status == 1 && res.errCode == 0) {
                                H5App.sendResponse(method,res);
                            }


                        }).fail(function () {
                            console.log('error');
                        });

                    }else{
                        var res = {
                            'status': 0,
                            'errCode': 10,
                            'msg': 'Data is empty'
                        };

                        H5App.sendResponse(method,res);
                    }
                }else{

                    alert(OKSDK.Util.toString(error));
                }

            });


        }
    },

    // 游戏端获取用户基本信息
    getUserInfo: function (params) {
        $.ajax({
            url: H5App.options.baseUrl + "/gameApi/getUserInfo",
            type: "POST",
            data: params,
            dataType: "JSON"
        }).always(function () {

        }).done(function (res) {
            var method = 'getUserInfo';
            H5App.sendResponse(method,res);


        }).fail(function () {
            console.log('error');
        });

    },

    vkSettings: function () {
        var method= 'vkSettings';
        var platform = params['platform_name'];
        if(platform == 'vk'){

            if(VK._bridge == false) { // 网页端

                VK.callMethod('showSettingsBox', 259);
                vk.addCallback('onSettingsChanged',function (status) {
                    console.log(status);
                    var cdk_res = {};
                    cdk_res.status = 1;
                    H5App.sendResponse(method,cdk_res);
                })
            } else {
                VK.callMethod('showSettingsBox');
                VK.addCallback('onSettingsBoxDone',function (status) {
                    var cdk_res = {};
                    if (status == 'cancel') {
                        cdk_res.status = 0;
                    } else if (status == 'success') {
                        cdk_res.status = 1;

                    } else if (status == 'fail') {
                        cdk_res.status = 0;
                    }
                    H5App.sendResponse(method,cdk_res);
                });
            }

        }
    },


    //进入全屏
    requestFullScreen: function(element) {
        var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;
        if (requestMethod){
            requestMethod.call(element);
        }
    },
    //退出全屏
    exitFullscreen: function(element) {
        var requestMethod = element.exitFullscreen || element.mozCancelFullScreen || element.webkitCancelFullScreen;
        if (requestMethod){
            requestMethod.call(element);
        }

    },

    getAreaSize: function(){
      var winSize = H5App.getWinSize();
      if (H5App.isMobileApp()) {
        var _w = winSize[0] * 0.8;
        var _h = winSize[1] * 0.8;

      }else {
        // pc 端
        var _w = winSize[0] * 0.5;
        var _h = winSize[1] * 0.5;
      }

      var areaSize = [_w , _h];
      return {winSize:winSize,areaSize:areaSize};
    },
    setScreen: function(params) {
        var fullElement = document.getElementById('JCgameIframe');
        var exitElement = document;
        this.isFull ? this.exitFullscreen(exitElement) : this.requestFullScreen(fullElement);
        this.isFull = !this.isFull;
    },

    // 设置玩家基本信息，例如 等级，昵称，区服名称，战力值，排行榜等信息，主要是海贼 vk 平台的展示
    setPlayerInfo: function(params) {
        var player_info_show = $('#player_info_show');
        if (player_info_show.length > 0) {
            if (typeof params.serverName != 'undefined') {
                $('#game_serverName').html(params.serverName);
            }

            if (typeof params.fight != 'undefined') {
                $('#game_fightLevel').html(params.fight);
            }

            if (typeof params.character != 'undefined') {
                $('#game_nickName').html(params.character);
            }

            if (typeof params.skill_rank != 'undefined') {
                $('#game_skillRank').html(params.skill_rank);
            }
            if (typeof params.group_rank != 'undefined') {
                $('#game_groupRank').html(params.group_rank);
            }
        }
    },

    loadingShow:function () {
        var html = '<div class="ladder-fixed" id="loader">\
            <div class="loader">\
            <div class="loader-inner pacman">\
            <div></div>\
            <div></div>\
            <div></div>\
            <div></div>\
            <div></div>\
            </div>\
            </div>\
            </div>';
        $('body').append($(html));

    },
    loadingHide:function () {
        $('#loader').remove();
    },

    gameLoadBefore:function () {
        if(userConfig.uid !=''){
			/* Ken comment , thay chua can thiet
            var player_info_show = $('#player_info_show');
            if (player_info_show.length > 0) {
                // 异步请求后端 获取玩家基本信息
                var player_info_gid = $('#player_info_gid').val();
                var player_info_sid = $('#player_info_sid').val();
                var params = {
                    gid: player_info_gid,
                    sid: player_info_sid,
                    uid: userConfig.uid
                };
                $.ajax({
                    url: H5App.options.baseUrl + "/gameApi/getPlayerInfo",
                    type: "POST",
                    data: params,
                    dataType: "JSON"
                }).always(function () {

                }).done(function (res) {
                    var res_data = res.data;
                    H5App.setPlayerInfo(res_data);

                }).fail(function () {
                    console.log('error');
                });

            }
			*/

            H5App.loadingShow();
            var _gameIframe = $(H5App.options.gameIframe);

            H5App.loadingHide();
            // _gameIframe[0].onload = function(){
            //     H5App.loadingHide();
            //     //$('#web-game-topbar').show();
            // };
        }
    },

    // 页面滚动加载对应模块的数据
    refreshLoad:function(listObj,params,loadFun) {
        loadFun(listObj,params);
        $(window).scroll(function(){
            var scrollTop = $(window).scrollTop();
            var scrollHeight = $(document).height();
            var windowHeight = $(window).height();
            if (scrollTop + windowHeight == scrollHeight) {

                loadFun(listObj,params);
            }
        });
    },

    gamePageWH : function(){
        var shouldFixForFbVersion = function(ua, fbMinVersion) {
            if (
                ua.indexOf("ios") > -1 &&
                ua.indexOf("fbav") > -1 &&
                ua.indexOf("fbios") > -1
            ) {
                try {
                    var result = /fbav\/(\d+)\.\d+\.\d+\.\d+\.\d+;/.exec(ua);
                    if (result) {
                        var versionId = parseInt(result[1], 10);
                        if (versionId >= fbMinVersion) {
                            return false;
                        }
                    }
                } catch (e) {}
                return true;
            }
            return false;
        };
        var timer0 = null,
            timer1 = null,
            status = null,
            times = 0;
        var resize = function(nopx) {
            var $framer = $("#JCgameIframe");
            var ua = window.navigator.userAgent.toLowerCase();

            var fbl =
                shouldFixForFbVersion(ua, 148) ||
                (ua.indexOf("iphone") > -1 && ua.indexOf("twitter") > -1)
                    ? 100
                    : 0;
            var px30 = 0;
            if (
                nopx &&
                ua.indexOf("iphone") > -1 &&
                ua.indexOf("mobile") > -1 &&
                ua.indexOf("safari") > -1
            ) {
                if (window.orientation === 90 || window.orientation === -90) {
                    px30 = 30;
                }
            }
            var w = $(window).width(),
                h = $(window).height() - fbl;
            $framer.attr("width", w);
            $framer.attr("height", h - px30);
            $framer.css({
                width: w,
                height: h - px30
            });
        };
        var check = function() {
            var newStatus = {
                width: $(window).width(),
                height: $(window).height()
            };
            if (!status) {
                status = {
                    width: newStatus.width,
                    height: newStatus.height
                };
                return true;
            } else {
                if (
                    status.width !== newStatus.width ||
                    status.height !== newStatus.height
                ) {
                    status.width = newStatus.width;
                    status.height = newStatus.height;
                    return true;
                }
            }
            return false;
        };
        var handleOrientateEvent = function() {
            var ua = window.navigator.userAgent.toLowerCase();
            if (
                ua.indexOf("iphone") > -1 &&
                ua.indexOf("mobile") > -1 &&
                ua.indexOf("safari") > -1
            ) {
                if (window.orientation === 180 || window.orientation === 0) {
                    $("body").css({
                        marginTop: "0px",
                        marginBottom: "0px"
                    });
                } else if (
                    window.orientation === 90 ||
                    window.orientation === -90
                ) {
                    $("body").css({
                        marginTop: "0px",
                        marginBottom: "0px"
                    });
                }
            }
            status = null;
            times = 0;
            if (timer0) {
                clearInterval(timer0);
                timer0 = null;
            }
            if (timer1) {
                clearTimeout(timer1);
                timer1 = null;
            }
            timer0 = setInterval(function() {
                if (times > 5) {
                    if (timer0) {
                        clearInterval(timer0);
                    }
                } else {
                    times = times + 1;
                    if (check()) {
                        resize();
                    }
                }
            }, 100);
            timer1 = setTimeout(resize, 1000);
        };
        var handleResizeEvent = function() {
            if (timer1) {
                clearTimeout(timer1);
                timer1 = null;
            }
            timer1 = setTimeout(resize, 1000);
        };
        $(function() {
            resize(true);
            if ("onorientationchange" in window) {
                $(window).on("orientationchange", handleOrientateEvent);
            } else {
                $(window).on("resize", handleResizeEvent);
            }
        });
    },

    modalHelper: (function(bodyCls) {
        var scrollTop;
        return {
            bodyAddFixed: function() {
                scrollTop = document.scrollingElement.scrollTop;
                document.body.classList.add(bodyCls);
                document.body.style.top = -scrollTop + "px";
            },
            bodyRemoveFixed: function() {
                document.body.classList.remove(bodyCls);
                // scrollTop lost after set position:fixed, restore it back.
                document.scrollingElement.scrollTop = scrollTop;
            }
        };
    })("modal-open")
};


/**
 * 快捷方式 引导的弹框
 *
 * @param {any} opt
 * iconUrl      string：     必填，游戏 icon
 * isGamePage   boolean：    默认false,是否是游戏页面(游戏页面通过小球点击显示。不需要判断 localStorage.hint)
 *
 */
function QuickWay(opt){
    this.iconUrl = opt.iconUrl;
    this.element = $('<div class="quick-way"></div>');
    this.isGamePage = opt.isGamePage || false;
    this.init();
    this.bindEvents();
};
QuickWay.prototype.init = function(content){
    $('.quick-way').remove();
    this.showQuickWayBox();
};
QuickWay.prototype.warpHtml = function(content){
    return this.element.append('<img class="show-icon" src="'+ this.iconUrl +'" alt="">'+
    '<div class="content">'+
    '<p>Сначала нажмите <span class="hint-icon"></span></p>'+
    '<p>'+ content +'</p>'+
    '</div>'+
    '<i class="close"></i>');
};
QuickWay.prototype.bindEvents = function(){
    var _this = this;
    this.element.on('click','.close',function(){
        _this.element.remove();
    });
};
QuickWay.prototype.showInIosSafari = function(){
    // quick-way-safari
    this.element.remove();
    this.element.addClass('quick-way-safari');
    $('body').append(this.warpHtml('потом на иконку "На экран «Домой»"'))
};
QuickWay.prototype.showInAndroidChrome = function(){
    // quick-way-chrome
    this.element.remove();
    this.element.addClass('quick-way-chrome');
    $('body').append(this.warpHtml('потом на иконку "Добавить на главный экран"'))
};
QuickWay.prototype.showInVkMobile = function(){
    // quick-way-vk
    this.element.remove();
    this.element.addClass('quick-way-vk');
    $('body').append(this.warpHtml('потом на иконку "Добавить в меню"'))
};
QuickWay.prototype.judgeQuickWayType = function(){
    if(H5App.options.vkApp === true){
        // vk
        this.showInVkMobile();
    }else if(H5App.browser.versions.iPhone){
        // iphone?
        if(H5App.browser.versions.isSafari){
            this.showInIosSafari();
        }else{
            if(this.isGamePage){
                layer.alert('Используйте браузер Safari для просмотра', {
                    icon: 0,
                    title:'Подсказка',
                    btn:['Подтвердить']
                });
            }
        }
    }else if(H5App.browser.versions.android){
        // android?
        if(H5App.browser.versions.isChrome){
            this.showInAndroidChrome();
        }else{
            if(this.isGamePage){
                layer.alert('Используйте браузер Chrome для просмотра', {
                    icon: 0,
                    title: 'Подсказка',
                    btn:['Подтвердить']
                });
            }
        }
    }
};

QuickWay.prototype.showQuickWayBox = function(){

    if( !this.isGamePage ){
        // 第一次？ 移动端？
        if(!localStorage['hint'] && H5App.browser.versions.mobile){
            this.judgeQuickWayType();
            localStorage['hint'] = true;
        }
    }else {
        if( H5App.browser.versions.mobile){
            this.judgeQuickWayType();
        }
    }
};


// var quickWay = new QuickWay({
//     iconUrl : 'https://static.123ogame.com/public/common/H5/images/h5_icon/desktop_ios/72.png'
// })

(function () {
    $(function () {
        $(document).on('click', '.dialog', function () {
            H5App.showDialog($(this));
        });

        $(document).on('click', '.lay-bg .close', function () {
            H5App.hideDialog($(this));
        });


        if(!H5App.browser.versions.mobile){
            var backIconRightDistance = ($(window).width() - $('body').width())/2 > 80
            if(backIconRightDistance){
                $('.icon-back').css({
                    right:($(window).width() - $('body').width())/2 +'px'
                })
            }
        }


        $('#full-screen-button').on('click',function () {
           H5App.setScreen();
        });

    });
})();

document.onkeydown=function(event) {
    var e = event || window.event || arguments.callee.caller.arguments[0];
    var keyNum = e.keyCode;
    switch(keyNum) {
        case 27:
        H5App.setScreen();
        break;
        case 96:
        H5App.setScreen();
        break;
    }

}

function Base64() {

    // private property
    _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

    // public method for encoding
    this.encode = function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;
        input = _utf8_encode(input);
        while (i < input.length) {
            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);
            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;
            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }
            output = output +
                _keyStr.charAt(enc1) + _keyStr.charAt(enc2) +
                _keyStr.charAt(enc3) + _keyStr.charAt(enc4);
        }
        return output;
    }

    // public method for decoding
    this.decode = function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;
        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        while (i < input.length) {
            enc1 = _keyStr.indexOf(input.charAt(i++));
            enc2 = _keyStr.indexOf(input.charAt(i++));
            enc3 = _keyStr.indexOf(input.charAt(i++));
            enc4 = _keyStr.indexOf(input.charAt(i++));
            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;
            output = output + String.fromCharCode(chr1);
            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }
        }
        output = _utf8_decode(output);
        return output;
    }

    // private method for UTF-8 encoding
    _utf8_encode = function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";
        for (var n = 0; n < string.length; n++) {
            var c = string.charCodeAt(n);
            if (c < 128) {
                utftext += String.fromCharCode(c);
            } else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            } else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }
        return utftext;
    }

    // private method for UTF-8 decoding
    _utf8_decode = function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;
        while ( i < utftext.length ) {
            c = utftext.charCodeAt(i);
            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            } else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            } else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }
        }
        return string;
    }
}
