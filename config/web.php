<?php
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
	//'language' => 'ru-RU', 
    
	'modules' => [
		'mycms' => [
            'class' => 'app\modules\mycms\module',
        ],
		'help1' => [
            'class' => 'app\modules\help1\module',
        ],
		'cabinet' => [
            'class' => 'app\modules\cabinet\module',
        ],
    ],
	//'onBeginRequest'=>'test',
	'aliases' => [
        //'@mysite' => 'http://mysite.com'
		//'@http://yii2b/asd'=>'http://yii2b/site/index'
    ],
	'bootstrap' => [
		'app\config\bootstrap',
		'app\modules\mycms\Bootstrap',
		'app\modules\help1\Bootstrap',
		'app\modules\cabinet\Bootstrap',
	],
    'components' => [
        'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource'
				],
			],
		],
		
		//'authManager' => [
            //'class' => 'yii\rbac\DbManager',
        //],
		'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-OfxGE7CLNPW75fEHtC_QiBHOe6h3RnM',
			'baseUrl'=> '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
		//'db' => ['tablePrefix' => 'cab_'],
		'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        'jquery.min.js'
                        //YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                                YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				//'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				//'<url:help.*>'=>'test/index',
//'/mycms/admin/<controller:\w+>/<action:\w+>/'=>'<controller>/<action>',	
//'<module:mycms>/<url:.*>/<controller:\w+>/<action:\w+>/'=>'<module>/admin/<controller>/<action>',	
				//'<controller:\w+>/<url:.*>/<action:\w+>'=>'<controller>/<action>',
				
				//'<url:.+>/<controller:\w+>/<action:\w+>/'=>'<controller>/<action>',
				//'<url:.+>/<controller:\w+>/'=>'<controller>/index',
				
				//'<controller:\w+>/<action:\w+>/'=>'<controller>/<action>',
				//['class' => 'app\library\MyUrlRule', 'pattern' => 'gelpp\/.*', 'route' => '',],
				
	//['class' => 'app\library\MyUrlRule', 'language'=>['ru', 'en']],
				
				//'<module:help1>/<url:.*>/<controller:\w+>/<action:\w+>/'=>'<module>/<controller>/<action>',
				
				//['class' => 'app\library\MyUrlRule']
				
				//app\components\CustomUrlRule
				
				//'<controller:\w+>' => '<controller>/index',
				
				//'test/*' => 'test/index',
				//'shop/*'=>'shop/default/index',
				//'mycms/<[.]+>'=>'mycms/default/index',
				//'<url:[\w\/]+>'=>'test/index',
				//'<url>'=>'test/index',
				
				
				//'<url:.*>'=>'test/index',
				
				//'<url:a.+>'=>'test/index',
				//'<url:b>'=>'site/index',
				
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				/*[
					'pattern' => '.*',
					'route' => 'test/index',
					//'suffix' => '/',
				]*/
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}
//print_r($config);
//echo Yii::$app->controller->id;
return $config;
