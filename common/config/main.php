<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ], 
        'authManager' =>[
            'class' => 'yii\rbac\DbManager',
        ]
    ],
	'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
    ],
	'timeZone' => 'Asia/Ho_Chi_Minh', 
];
