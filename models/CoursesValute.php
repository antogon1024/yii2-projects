<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Converter;

use app\models\Url;

class CoursesValute extends Model
{
	function getPrevData($date, $arr){
		$ar = explode('-', $date);
		$mktime = mktime (10,0,0,$ar[1],$ar[2],$ar[0]) - 86400;
		$prevDate = date ("Y-m-d", $mktime);
		
		$converter = new Converter;
		$prevData = $converter->dataCenterBank($prevDate);
		
		$arValute = ['usd', 'eur', 'nok'];
		foreach($arValute as $valute){
			$current = str_replace(',', '.', $arr[$valute]);
			$prev = str_replace(',', '.', $prevData[$valute.'full']);
			
			$change = $current - $prev;
			if($change >= 0){
				$change = round($change, 4);
				if($change == 0) 
					$change = '0.0000';
				$change = '+ '.$change;
			}else{
				$change = $prev - $current;
				$change = round($change, 4);
				$change = '- '.$change;
			}
			
			$class = ($current >= $prev) ? 'ant-green' : 'ant-red';
			$data[$valute] = array('value'=>$current, 'class'=>$class, 'change'=>$change);
		}
		return $data;
	}
	
	public function validateDate($date){ 
		if( preg_match('/[0-9]{2}\.[0-9]{2}\.[0-9]{4}/Us', $date) ){
			list($usec, $max) = explode(" ",microtime());
			$min = gmmktime (0, 0, 0, 5, 2, 2007);
			
			$ar = explode('.', $date);
			$cur = gmmktime (0, 0, 0, $ar[1], $ar[0], $ar[2]);
			
			if($cur > $max || $cur < $min){
				return false;
			}
		}else{
			return false;
		}
	}
}