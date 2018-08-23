<?php
namespace app\library;

use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class MyUrlRule extends BaseObject implements UrlRuleInterface
{
	public $language;
	
	public function createUrl($manager, $route, $params)
    {
		$p = '';
		
		if(count($params) > 0){
			$p = '?';
			foreach($params as $k=>$v){
				$p .= ( end($params) == $v ) ? "$k=$v" : "$k=$v&";
			}
		}
		
		if( \Yii::$app->language === 'en-US' && $route != 'ru')
			return 'en/'.$route.$p;
		
		if( \Yii::$app->language === 'ru-RU')
			return $route.$p;
		
		if($route === 'ru')
			return $route;
		
		return false; 
	}
	
    public function parseRequest($manager, $request)
    {
		$params = $request->get();
		$pathInfo = trim($request->getPathInfo(), '/');// exit;
		
		/*if( $pathInfo === 'ru' ){
			\Yii::$app->language = 'ru-RU';
			return ['site/index', $params];
		}
		
		if( $pathInfo === 'en' ){
			\Yii::$app->language = 'en-US';
			return ['site/index', $params];
		}*/
		
		
		//$arUrl = ['pjax'=>'widgets','grid-view'=>'widgets']; 
		$pathInfo = str_replace('en/', '', $pathInfo);
		
		$ar = explode('/', $pathInfo);
		$cnt = count($ar);
		
		if ($ar[0] === 'help1') { //exit;
			if($cnt === 1){
				return ['help1/default/index', $params];
			}elseif($cnt === 2){
				return ['help1/'.$ar[1].'/index', $params];
			}elseif($cnt === 3){
				return ['help1/'.$ar[2].'/index', $params];
			}else{
				$action = array_pop($ar);
				$controller = array_pop($ar);
				return ['help1/'.$controller.'/'.$action, $params];
			}
		}
		/*if ($ar[0] === 'mycms') {
			$arr = ['register', 'login', 'logout', 'cabinet'];
			if(isset($ar[1]) && in_array($ar[1], $arr)){
				return ['mycms/'.$ar[1].'/index', $params];
			}
			
			if($cnt === 1){
				return ['mycms/default/index', $params];
			}elseif($cnt === 2){
				return ['mycms/admin/index', $params];
			}elseif($cnt === 3){
				return ['mycms/'.$ar[2].'/index', $params];
			}else{
				$action = array_pop($ar);
				$controller = array_pop($ar);
				$controller = str_replace('-', '', $controller);
				return ['mycms/'.$controller.'/'.$action, $params];
			}
		}*/
		
		if(\Yii::$app->language === 'en-US')
			return [$pathInfo, $params];
		
        return false;  
    }
}