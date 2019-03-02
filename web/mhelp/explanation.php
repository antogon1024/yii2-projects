<?php
// Добавление правил URL динамически -------------------------------------------
//В корень модуля добавить следующий файл - можно в любое место

// Bootstrap.php--
namespace app\modules\mycms;
use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
		
		if( strstr($app->request->getPathInfo(), 'mycms') ){
			$app->getUrlManager()->addRules(
				[
					// объявление правил здесь
					'test/*' => 'admin/index',
				]
			);
		}
    }
}
//---
//В файле конфигурации подключим класс 
'bootstrap' => [
	'app\modules\mycms\Bootstrap',
],
//------------------------------------------------------------------------------------------



