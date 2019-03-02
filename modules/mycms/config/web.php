<?php
$config = [
    'components' => [
        'urlManager' => [
           'class' => 'yii\web\UrlManager',
		   'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
				//'<module:mycms>/admin/<controller:\w+>/<action:\w+>/'=>'<module>/<controller>/<action>',
				//'admin/<controller:\w+>/<action:\w+>/'=>'<module>/<controller>/<action>',
				//'<url:help2.*>'=>'test2/index',
				//'<url:help.*>'=>'test/index',
            ],
        ],
        
    ],
  
];


return $config;
