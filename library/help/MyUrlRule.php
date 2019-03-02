<?php
namespace app\library\help;

use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class MyUrlRule extends BaseObject implements UrlRuleInterface
{
	//public $language;
	
	public function createUrl($manager, $route, $params)
    {
		return false;
	}
	
    public function parseRequest($manager, $request)
    {
		$params = $request->get();
		$pathInfo = trim($request->getPathInfo(), '/');
		
		$ar = explode('/', $pathInfo);
		$cnt = count($ar);
		
		if($cnt === 1){
			return ['help1/help/index', $params];
		}else if($cnt === 2){
			$action = array_pop($ar);
			return ['help1/help/'.$action, $params];
		}else{
			$action = array_pop($ar);
			$controller = array_pop($ar);
			return ['help1/'.$controller.'/'.$action, $params];
		}
		
        return false;  
    }
}