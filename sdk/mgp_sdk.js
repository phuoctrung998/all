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
	
}	