<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
	'modules' => [
		'phanquyen' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
        ],
		'ckeditor' => [
			'class' => 'wadeshuler\ckeditor\Module',    // required and dont change!!!

			//'controllerNamespace' => 'wadeshuler\ckeditor\controllers\default',    // to override my controller
			'preset' => 'full',    // default: basic - options: basic, standard, standard-all, full, full-all
			//'customCdn' => '//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.10/ckeditor.js',    // must point to ckeditor.js

			'uploadDir' => Yii::getAlias('@rootWeb').'/uploads/contents',    // must be file path (required when using filebrowser*BrowseUrl below)
			'uploadUrl' =>  Yii::getAlias('@webDomain').'/uploads/contents',        // must be valid URL (required when using filebrowser*BrowseUrl below)

			// how to add external plugins (must also list them in `widgetClientOptions` `extraPlugins` below)
			//'widgetExternalPlugins' => [
			//    ['name' => 'pluginname', 'path' => '/path/to/', 'file' => 'plugin.js'],
			//    ['name' => 'pluginname2', 'path' => '/path/to2/', 'file' => 'plugin.js'],
			//],

			// passes html options to the text area tag itself. Mostly useless as CKEditor hides the <textarea> and uses it's own div
			//'widgetOptions' => [
			//    'rows' => '10',
			//],

			// These are basically passed to the `CKEDITOR.replace()`
			'widgetClientOptions' => [
				//'skin' => 'moono',    // must be in skins directory
				//'skin' => 'kama,http://cdn.ckeditor.com/4.5.10/standard-all/skins/kama/'    // skin from somehwere else - http://docs.ckeditor.com/#!/api/CKEDITOR.config-cfg-skin
				//'extraPlugins' => 'abbr,inserthtml',     // list of externalPlugins (loaded from `widgetExternalPlugins` above)
				//'customConfig' => '@web/js/myconfig.js',
				'filebrowserBrowseUrl' => '/ckeditor/default/file-browse',
				'filebrowserUploadUrl' => '/ckeditor/default/file-upload',
				'filebrowserImageBrowseUrl' => '/ckeditor/default/image-browse',
				'filebrowserImageUploadUrl' => '/ckeditor/default/image-upload',
			]
		],

	],
    'components' => [
		'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
		'request' => [
			'csrfParam' => '_backendCSRF',
			'csrfCookie' => [
				'httpOnly' => true,
				'path' => '/admin',
			],
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'identityCookie' => [
				'name' => '_backendIdentity',
				'path' => '/admin',
				'httpOnly' => true,
			],
		],
		'session' => [
			'name' => 'BACKENDSESSID',
			'cookieParams' => [
				'path' => '/admin',
			],
		],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
 //       ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
	'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login', 
            'site/error',
			'phanquyen/*',
            /*'site/*',
            'admin/*',*/
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ],
    ],
    'params' => $params,
];
