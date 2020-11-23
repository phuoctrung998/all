<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' 	=> dirname(__DIR__),
    'bootstrap' => [
		'log',
	],
	'sourceLanguage' 		=> 'en',
    'language' 				=> 'en',
    'controllerNamespace' 	=> 'frontend\controllers',
	'on beforeRequest' 		=> function ($event) 
	{
	},
    'components' => [
        'user' => [
            'identityClass' => 'frontend\models\Members',
            //'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'i18n' => [
            'translations' => [
                '*' => [ // This config applies to all translations
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii/messages'
                ],
            ],
        ], 
		// Override the urlManager component
       'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => [
				'en' => 'en-US', 
				'fr', 
				'de'
			],
            'enableDefaultLanguageUrlCode' 	=> false,
            'enableLanguagePersistence' 	=> false,
			'enableLanguageDetection' 		=> false,
			//  Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
			'rules' => [
				'/'							=> 'site/index',
				'/teaser'					=> 'teaser/index',
				'logout' 					=> 'site/logout',
				'register' 					=> 'site/signup',
				'login'						=> 'site/login',
				'/trang-chu'				=> 'site/index',
				
				/** Ajax **/
				'ajax-login'				=> 'ajax/signin',
				'ajax-register'				=> 'ajax/signup',
				'ajax-logout'				=> 'ajax/logout',
				'update-member-phonenumber'	=> 'ajax/update-member-phonenumber',
				'ajax-sharefb'				=> 'ajax/share-fb',
				'ajax-giftcode-teaser'		=> 'ajax/giftcode-teaser',
				'ajax-box-slider'			=> 'ajaxbox/box-slider',
				'get-link-redirect'			=> 'ajax/get-link-redirect',
				
				'teaser-logout'				=> 'teaser/logout',
				
				/** Game **/
				'play'						=> 'game/play',
				'choi-ngay'					=> 'game/play-now',
				'play-one-user'				=> 'game/play-one-user',
				//'napvang'					=> 'game/napvang',
				'napthethang'				=> 'game/napthethang',
				'info-character'			=> 'game/info-character',
				
				/** minigame **/
				'vongquay-phuonghoang'		=> 'vongxoay/index',
				'vongquay-gioto'			=> 'vongxoay/gioto',
				
				/** Card **/
				'card-in-game'				=> 'card/card-in-game',
				'nap-the'					=> 'card/index',
				'card/payment'				=> 'card/payment',
				'callback-push247'			=> 'card/callback-push247',
				'postback-btcvn'			=> 'card/postback-btcvn',
				'callback-htlink'			=> 'card/callback-htlink',
				'ajax-doi-xu'				=> 'card/doixu',
				'nap-test'					=> 'card/test-payment',
				
				/** GIFTCODE **/
				'gift-code'					=> 'giftcode/index',
				'code-trieu-hoi-am-duong'	=> 'giftcode/trieu-hoi-am-duong',
				
				/** members **/
				'thong-tin-tai-khoan'		=> 'members/index',
				'cap-nhat-thong-tin'		=> 'members/account-update',
				'doi-mat-khau'				=> 'members/change-password',
				'lich-su-giao-dich'			=> 'members/lichsugiaodich',
				'ajax-change-password'		=> 'ajax/change-password',
				'ajax-update-info-user'		=> 'ajax/update-info-user',
				
				/** xml sitemap**/
				'sitemap-category.xml' 				=> 'sitemap/category',
				'sitemap-list-apps.xml' 			=> 'sitemap/list-apps',
				'sitemap-apps-<id:[0-9]+>.xml' 		=> 'sitemap/apps',
				
				/** may chu **/
				'may-chu'							=> 'servers/index',
				'may-chu/<slug:[^/]+>'				=> 'game/play',
				
				/** cate **/
				'chuyen-muc/<slug:[A-Za-z0-9 -_.]+>' 	=> 'news/category',
				/** post **/
				'<slug:[^/]+>' 					=> 'news/detail',
				
			],
			// Ignore / Filter route pattern's
			'ignoreLanguageUrlPatterns' => [
				'#^admin/#' => '#^admin/#',
			],
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mobileDetect' => [
			'class' => '\skeeks\yii2\mobiledetect\MobileDetect'
		],
		'assetsAutoCompress' =>
        [
            'class'                         => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled'                       => true,

            'readFileTimeout'               => 3,           //Time in seconds for reading each asset file

            'jsCompress'                    => true,        //Enable minification js in html code
            'jsCompressFlaggedComments'     => true,        //Cut comments during processing js

            'cssCompress'                   => true,        //Enable minification css in html code

            'cssFileCompile'                => true,        //Turning association css files
            'cssFileRemouteCompile'         => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
            'cssFileCompress'               => true,        //Enable compression and processing before being stored in the css file
            'cssFileBottom'                 => false,       //Moving down the page css files
            'cssFileBottomLoadOnJs'         => false,       //Transfer css file down the page and uploading them using js

            'jsFileCompile'                 => true,        //Turning association js files
            'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
            'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
            'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js

            'htmlCompress'                  => true,        //Enable compression html
            'htmlCompressOptions'           =>              //options for compressing output result
            [
                'extra' => true,        //use more compact algorithm
                'no-comments' => true   //cut all the html comments
            ],     
        ],
		'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'useFileTransport' => false,
        ],
        'transport' => [
			'class' => 'Swift_SmtpTransport',
			'plugins' => [
				[
					'class' => 'Swift_Plugins_ThrottlerPlugin',
					'constructArgs' => [20],
				],
			],
		],
    ],
	'modules' => [
		'social' => [
			// the module class
			'class' => 'kartik\social\Module',
			'facebook' => [
				'appId' => '191450028286187',
				'secret' => 'f3bfcf4ee2439a0be91429ba62413baa',
			],
			// the global settings for the google plugins widget
			'google' => [
				'clientId' => '225459956798-iquj1b1halajbbgabh0402th3b8faabj.apps.googleusercontent.com ',
				'pageId' => '108940536677568216255',
			],
			// the global settings for the google analytic plugin widget
			'googleAnalytics' => [
				'id' => 'TRACKING_ID',
				'domain' => 'TRACKING_DOMAIN',
			],
		],
	],
    'params' => $params,
];
