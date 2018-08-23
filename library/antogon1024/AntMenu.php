<?php
namespace app\library\antogon1024;

use Yii;
use yii\widgets\Menu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
 
class AntMenu extends Menu
{
	
	public $addActiveCssClass = 'add-active';          //add
	//public $firstActive = false;          //add
	
	protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
		$route = Yii::$app->request->getPathInfo();
		$ar = explode('/', $route);
		//$i=0;
		$arr = [];
		while( count($ar) != 1 ){
			//$i++; if($i >10) break;
			$arr[] = implode("/", $ar);
			array_pop($ar);	
		}
		
		foreach ($items as $i => $item) {
			$options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            
			$url = trim($item['url'][0], '/');
			
			if($url === $route){
				$class[] = $this->addActiveCssClass;
			}
			if (in_array($url, $arr)) {
				$class[] = $this->activeCssClass;
			}
			
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }
            if (!empty($class)) {
                if (empty($options['class'])) {
                    $options['class'] = implode(' ', $class);
                } else {
                    $options['class'] .= ' ' . implode(' ', $class);
                }
            }

            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $submenuTemplate = ArrayHelper::getValue($item, 'submenuTemplate', $this->submenuTemplate);
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
			//echo $tag;
            $lines[] = Html::tag($tag, $menu, $options);
			//echo Html::tag($tag, $menu, $options).'<br>';
        }
		//print_r($lines);
		//exit;

        return implode("\n", $lines);
    }
}