<?php

namespace app\models;

use Yii;
use yii\base\Model;


class TopMenu extends Model
{
	private static function getMenuItems()
	{
		$items = array();
		//$resultAll = TopMenu::find()->orderBy('position')->all();
		
		$resultAll = (new \yii\db\Query())
			//->select(['id', 'parent_id'])
			->select(['*'])
			->from('mycms_items')
			->where(['type_item' => 'shop'])
			//->limit(10)
			->all();
			
		//$resultAll = Yii::$app->db->createCommand("SELECT id,parent_id FROM mycms_items WHERE type_item='shop'")
        //   ->queryAll();	
			
//print_r($resultAll);exit;
		foreach($resultAll as $result)
		{
			
			//var_dump( $result);
			if(empty($items[$result['parent_id']]))
			{
				$items[$result['parent_id']] = array();
			}
			
			$items[$result['parent_id']][] = $result;
		}
		
		

		/*echo '<pre>';
		print_r($items);
		echo '</pre>';
		exit;*/
		return $items;
	}
	
	
	public static function viewMenuItems($parentId=0)
	{
		$arrItems = TopMenu::getMenuItems();
		if(empty($arrItems[$parentId])) {return;}
		for($i = 0; $i<count($arrItems[$parentId]); $i++)
		{
			/*$result[] = [
				'label' => $arrItems[$parentId][$i]['name'],
				'url' => [$arrItems[$parentId][$i]['seolink']],
				'linkOptions'=> ['title'=>$arrItems[$parentId][$i]['name']],
				'items' => TopMenu::viewMenuItems($arrItems[$parentId][$i]['id']),
				'options' => ['class'=>$arrItems[$parentId][$i]['classa']],
			];*/
			
			$result[] = [
				'label' => $arrItems[$parentId][$i]['item'],
				'url' => [$arrItems[$parentId][$i]['path']],
				//'url' => 'index',
				'linkOptions'=> ['title'=>$arrItems[$parentId][$i]['item']],
				'items' => TopMenu::viewMenuItems($arrItems[$parentId][$i]['id']),
				//'options' => ['class'=>$arrItems[$parentId][$i]['classa']],
			];
		}
		
		//echo '<pre>';
		//print_r($result);
		//echo '</pre>';
//exit;
		return $result;
	}
}