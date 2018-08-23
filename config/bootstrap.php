<?php
namespace app\config;

use yii\base\BootstrapInterface;
use yii\base\Application;

class Bootstrap implements BootstrapInterface
{
	public function bootstrap($app)
    { 	
		$app->on(Application::EVENT_BEFORE_REQUEST, function () {
           //echo 'asd3';exit;
        });
    }
}