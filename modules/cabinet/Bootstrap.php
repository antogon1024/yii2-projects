<?php
namespace app\modules\cabinet;

use Yii;
use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
		$ar_url = ['cabinet/logout','cabinet/entry','cabinet/login','cabinet/register-client',
			'cabinet/register-club','cabinet/forms','cabinet/test'];

	
		$ar = explode('/', $app->request->getPathInfo());
		if( $app->request->getPathInfo() === 'cabinet' ){
			$app->getUrlManager()->addRules(
				[
					'cabinet' => 'cabinet/default/index',
					
				]
			);
		
		}else if( in_array( $app->request->getPathInfo(), $ar_url ) ){

			$app->getUrlManager()->addRules(
				[
					'cabinet/'.$ar[1] => 'cabinet/default/'.$ar[1],
				]
			);
		}else{

			if( strstr($app->request->getPathInfo(), 'cabinet') && Yii::$app->user->identity != false){
				$role = Yii::$app->user->identity['role'];

				if($role == 'admin' && count($ar) == 2){
					$app->getUrlManager()->addRules(
						[
							'cabinet/'.$ar[1] => 'cabinet/admin/'.$ar[1],
						]
					);
				}

				if($role == 'club_admin' && count($ar) == 2){
					$app->getUrlManager()->addRules(
						[
							'cabinet/'.$ar[1] => 'cabinet/club/'.$ar[1],
						]
					);
				}

				if($role == 'client' && count($ar) == 2){
					$app->getUrlManager()->addRules(
						[
							'cabinet/'.$ar[1] => 'cabinet/client/'.$ar[1],
						]
					);
				}
			}
		}

    }
}