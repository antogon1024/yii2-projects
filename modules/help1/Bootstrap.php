<?php
namespace app\modules\help1;
use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
		
		
		if( strstr($app->request->getPathInfo(), 'help1') ){
			$app->getUrlManager()->addRules(
				[
					//'test/*' => 'admin/index',
					//'mycms/*' => 'mycms/default/index',
					//'help1/<controller:\w+>/<action:\w+>/' => 'help1/<controller>/<action>',
					//'mycms/admin/' => 'mycms/admin/login',
					//'mycms/<url:.*>' => 'mycms/default/index',

					['class' => 'app\library\help\MyUrlRule'],
				]
			);
		}
    }
}