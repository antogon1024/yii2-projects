<?php
namespace app\modules\mycms;
use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
		
		
		if( strstr($app->request->getPathInfo(), 'mycms') ){
			$app->getUrlManager()->addRules(
				[
					//'test/*' => 'admin/index',
					//'mycms/*' => 'mycms/default/index',
					'mycms/admin/<controller:\w+>/<action:\w+>/' => 'mycms/<controller>/<action>',
					'mycms/admin/' => 'mycms/admin/login',
					'mycms/<url:.*>' => 'mycms/default/index',
				]
			);
		}
    }
}