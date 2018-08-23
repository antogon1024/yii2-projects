<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Converter extends Model
{
	public $arWork = array();
	public $data_today = array();
	public $date_today;
	public $countDate; // правильно ???????????
	
	public function __construct(){
		list($usec, $sec) = explode(" ",microtime());
		$this->date_today = date ("Y-m-d", $sec);
	}
	
	public function getData($date)
    { 	
		if($date == $this->date_today){
			//$this->deleteDateToday();
			$this->addLines();
		}
		$res = array();
		$rescb = array();
		
		$rescb = $this->dataCenterBank($date);
		
		$ar_data = file(Yii::$app->basePath.'/web/data/converter/work.txt');
		$ar_data = array_reverse($ar_data);
		
		$flag = 0;
		foreach($ar_data as $v){
			if(strstr($v, $date)){
				$flag = 1;
			}
			
			if($flag == 1){
				if(strstr($v, 'empty')) 
					continue;
				else{
					$ar = explode('|||', $v);
					$date = $ar[0];
					break;
				}
			}
		}
		
		if($date == $this->date_today){
			/*$this->data_today['data']['usdcb'] = $rescb['usd'];
			$this->data_today['data']['eurcb'] = $rescb['eur'];
			$this->data_today['data']['nokcb'] = $rescb['nok'];
			return $this->data_today['data'];*/
			
			return array_merge($this->data_today, $rescb);
		}else{
			$res = $this->dataMurman($date);
		
			/*$res['data']['usdcb'] = $rescb['usd'];
			$res['data']['eurcb'] = $rescb['eur'];
			$res['data']['nokcb'] = $rescb['nok'];
			return $res['data'];*/
			
			return array_merge($res, $rescb);
		}
    }
	
	public function dataCenterBank($date){
		//echo $date;
		
		/*$ar = explode('-', $date);
		$mktime = mktime (10,0,0,$ar[1],$ar[2],$ar[0]) - 86400;
		$yesterday = date ("d/m/Y", $sec-86400);
		
		//list($usec, $sec) = explode(" ",microtime());
		//$today = date ("d/m/Y", $sec);
		//$yesterday = date ("d/m/Y", $sec-86400);
		*/
		//exit;
		//$ar_data =array();
		list($g, $m, $d) = explode('-', $date);
		$date = $d.'-'.$m.'-'.$g;
		$date1 = str_replace('-', '/', $date);
		$cont = file_get_contents('http://cbr.ru/scripts/XML_daily.asp?date_req='.$date1);
		if($cont != false){
			$ar = explode('</Valute>', $cont);
			$dt = array();
			foreach($ar as $v){
				if(strstr($v, 'R01235')){		  			
					preg_match('/([0-9]{1,3},[0-9]{1,4})/', $v, $out);
					$out[1] = str_replace(',', '.', $out[1]);
					$dt['usd'] = round($out[1], 2);
					$dt['usdcb'] = str_replace('.', ',', $dt['usd']);
					$dt['usdfull'] = str_replace('.', ',', $out[1]);
				}
				if(strstr($v, 'R01239')){		    
					preg_match('/([0-9]{1,3},[0-9]{1,4})/', $v, $out);
					$out[1] = str_replace(',', '.', $out[1]);
					$dt['eur'] = round($out[1], 2);
					$dt['eurcb'] = str_replace('.', ',', $dt['eur']);
					$dt['eurfull'] = str_replace('.', ',', $out[1]);
				}
				if(strstr($v, 'R01535')){		    
					preg_match('/([0-9]{1,3},[0-9]{1,4})/', $v, $out);
					$out[1] = str_replace(',', '.', $out[1]);
					$dt['nok'] = round($out[1], 2);
					$dt['nokcb'] = str_replace('.', ',', $dt['nok']);
					$dt['nokfull'] = str_replace('.', ',', $out[1]);
				}
			}
			//$ar_data = $dt;
		}
		
		//return $ar_data;
		return $dt;
	}
	
	private function dataMurman($date){
		$data = file_get_contents('http://www.b-port.com/cur.html?date=' . $date);
		preg_match('/(<table id="sortt">.+<\/table>)/Us', $data, $table);
		preg_match_all('/bank.*table_sort_left">(.*)<\/td>.*>(.*)<.*>.*>(.*)<.*>.*>(.*)<.*>.*>(.*)<.*>.*>(.*)<.*>.*>(.*)</Us', $table[1], $out);

		if(!empty($out[2])){ 
			//Проверка на пустые данные
			$flag = 0;
			$i = 0;
			foreach($out[2] as $v){
				$i++;
				if($i == 10)
					break;
		
				if($v != '-'){
					$flag = 1;
					break;
				}
			}
			
			if($flag == 1){
				//$result['flag'] = 'work';
				$name = array();
				foreach($out[1] as $v){
					$name[] = strip_tags($v);
				}
				$ar_out = array();
				$ar_out['banks'] = $name;
				$ar_out['usd1'] = $out[2];
				$ar_out['usd2'] = $out[3];
				$ar_out['eur1'] = $out[4];
				$ar_out['eur2'] = $out[5];
				$ar_out['nok1'] = $out[6];
				$ar_out['nok2'] = $out[7];
				$ar_out['flag'] = 'work';
				//$result['data'] = $ar_out;
				return $ar_out;
				//return $result;
			}else{
				$result['flag'] = 'empty';
				//$result['data'] = '';
				return $result;
			}
		}else{
			return false;
		}
	}
	
	public function addLines()
	{
		set_time_limit(86400);
		
		$this->deleteDateToday();
		//$ar_data = file(Yii::$app->basePath.'/web/data/converter/work.txt');
		//$date_start = end($ar_data);
		//$date_start = explode('|||', $date_start)[0];
		
		$ar = $this->getArrayDate ();
		
		foreach($ar as $date){
			$res = $this->dataMurman($date);
			if($date == $this->date_today)
				$this->data_today = $res;
					
			if($res['flag'] != false){
				$file = fopen(Yii::$app->basePath.'/web/data/converter/work.txt',"a");
				fputs ( $file, $date.'|||'.$res['flag']."\n");
				fclose ($file);	
			}
		}
		$this->arWork = file(Yii::$app->basePath.'/web/data/converter/work.txt');
	}
	
	// Возвращает массив дат , которых нет в файле 'work.txt'
	public function getArrayDate () {
		$ar_data = file(Yii::$app->basePath.'/web/data/converter/work.txt');
		$start = end($ar_data);
		$start = explode('|||', $start)[0];
		
		$ar = explode('-', $start);
		$start = mktime (10,0,0,$ar[1],$ar[2],$ar[0]);
		//echo $end;exit;
		$ar = explode('-', $this->date_today);
		$end = mktime (10,0,0,$ar[1],$ar[2],$ar[0]);
		
		$i = $start;
		$arr = array();
		
		while($i < $end){
			$i = $i+86400;
			//$arr[] = date ($format, $i);
			$arr[] = date ('Y-m-d', $i);
		}
		
		return $arr;
	}

	//Удаляет из файла 'work.txt' - сегодняшнюю дату
	public function deleteDateToday () {
		$ar = file(Yii::$app->basePath.'/web/data/converter/work.txt');
		
		$str = '';
		foreach($ar as $v){
			$ar1 = explode('|||', $v);
			
			if($ar1[0] != $this->date_today){
				$str .= $v;
				$flag = 0;
			}else{
				$flag = 1;
			}
		}
		
		if($flag == 1){
			$file = fopen(Yii::$app->basePath.'/web/data/converter/work.txt',"w");
			fputs ( $file, $str);
			fclose ($file);	
		}
	}
	
	
}