<?php

namespace app\models;

use Yii;
use yii\base\Model;

class DinamicCourses extends Model
{
	public $date_today;
	public $arUsd = array();
	
	public function __construct(){
		
		list($usec, $sec) = explode(" ",microtime());
		$this->date_today = date ("Y-m-d", $sec);
		//$this->date_today = '2018-01-30';
	}
	
	function getDataGraphic($valute){
		$ar1 = file(Yii::$app->basePath.'/web/data/dinamic-courses/'.$valute.'1.csv');
		$ar2 = file(Yii::$app->basePath.'/web/data/dinamic-courses/'.$valute.'2.csv');
		$ar = array_merge($ar1, $ar2);
			
		$data = array();
		foreach($ar as $k=>$v){
			$arr = explode('|', $v);
			$data[$k]['date'] = trim($arr[0]);
			$data[$k]['value'] = trim($arr[1]);
		}
		return $data;
	}
	
	function restoreDataGraphic($error){
		
		if(!empty($this->arUsd)){
			$arUsd = $this->arUsd;
		}else{
			$arUsd = file(Yii::$app->basePath.'/web/data/dinamic-courses/usd2.csv');
		}
		
		//echo '<pre>';
		//print_r($arUsd);
		//echo '</pre>';
		
		$arEur = file(Yii::$app->basePath.'/web/data/dinamic-courses/eur2.csv');
		$arNok = file(Yii::$app->basePath.'/web/data/dinamic-courses/nok2.csv');
		
		$str_errors = '';
		foreach($error as $val){
			$err = explode('|', $val);
			$date = $err[0];
			
			$ar = explode('-', $date);
			$date = $ar[2].'/'.$ar[1].'/'.$ar[0];
			
			$arr = $this->parseData($date); 
			//echo '<pre>';
			//print_r($arr);
			//echo '</pre>';
			//exit;
			if($arr['success'] === 1){
				$key = $err[1];
				//$arUsd[$key] = $arr['date'].'|'.$arr['usd']."\r\n";
				$arUsd[$key] = $arr['usd'];
				$arEur[$key] = $arr['eur'];
				$arNok[$key] = $arr['nok'];
			}else{
				$str_errors .= $val;
			}
		}
		
		$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/error.csv', "w");
		fputs ( $file, $str_errors);
		fclose ($file);
		
		/*echo '<pre>';
		print_r($arUsd);
		echo '</pre>';
		exit;*/
		$usd = '';
		foreach($arUsd as $v){
			$usd .= $v;
		}
		
		$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/usd2.csv', "w");
		fputs ( $file, $usd);
		fclose ($file);
		
		
		$eur = '';
		foreach($arEur as $v){
			$eur .= $v;
		}
		
		$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/eur2.csv', "w");
		fputs ( $file, $eur);
		fclose ($file);
		
		
		$nok = '';
		foreach($arNok as $v){
			$nok .= $v;
		}
		
		$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/nok2.csv', "w");
		fputs ( $file, $nok);
		fclose ($file);
		
		//exit;
	}
	
	public function bestCourse($arr){
		if( file_exists(Yii::$app->basePath.'/web/data/dinamic-courses/lastDate.txt') ){
			$lastDate = file(Yii::$app->basePath.'/web/data/dinamic-courses/lastDate.txt');
		}else{
			$lastDate = $this->date_today;
		}
		
		$error = file(Yii::$app->basePath.'/web/data/dinamic-courses/error.csv');
		
		if($lastDate[0] != $this->date_today){//exit;
			$this->updateDataGraphic($lastDate[0]);
		}
		
		if(!empty($error)){ 
			$this->restoreDataGraphic($error);
		}
		
		date_default_timezone_set("Europe/Moscow");
		$best_cur1['date'] = date ("d.m.Y");
		$best_cur1['time'] = date ("H:i");
		
		$sec_st = gmmktime (0, 0, 0, 1, 1, 2000);
		list($usec, $sec) = explode(" ",microtime());
		$end = date ("Y-m-d", $sec);
		list($year, $month, $day) = explode('-', $end);
		$sec_end = gmmktime (0, 0, 0, $month, $day, $year);
		$maxday = ($sec_end - $sec_st)/86400;
		$best_cur1['maxday'] = $maxday;
		
		$best_cur1['usd']['center_course'] = str_replace(',', '.', $arr['usdcb']);
		$best_cur1['usd']['center_message'] = 'рублей за доллар США';
		$best_cur1['usd']['caption'] = 'ДИНАМИКА КУРСА доллара США, за 1 USD';
		$best_cur1['usd']['valute'] = 'usd';
		
		$best_cur1['eur']['center_course'] = str_replace(',', '.', $arr['eurcb']);
		$best_cur1['eur']['center_message'] = 'рублей за евро';
		$best_cur1['eur']['caption'] = 'ДИНАМИКА КУРСА евро, за 1 EUR';
		$best_cur1['eur']['valute'] = 'eur';
		
		$best_cur1['nok']['center_course'] = str_replace(',', '.', $arr['nokcb']);
		$best_cur1['nok']['center_message'] = 'рублей за 10 норвежских крон';
		$best_cur1['nok']['caption'] = 'ДИНАМИКА КУРСА норвежской кроны, за 10 NOK';
		$best_cur1['nok']['valute'] = 'nok';
		
		foreach( ['usd','eur','nok'] as $value ){
			$bay=0;
			foreach($arr[$value.'1'] as $k=>$v){
				if($v > $bay){
					$bay = $v;
					$ind = $k;
				}
			}
			$best_cur1[$value]['bay_course'] = $bay;
			$best_cur1[$value]['bay_name'] = mb_strtoupper($arr['banks'][$ind]);
			$best_cur1[$value]['bay_title'] = $arr['banks'][$ind];
		
			$sale=1000000000;
			foreach($arr[$value.'2'] as $k=>$v){
				if($v < $sale && $v != '-'){
					$sale = $v;
					$ind = $k;
				}
			}
			$best_cur1[$value]['sale_course'] = $sale;
			$best_cur1[$value]['sale_name'] = mb_strtoupper($arr['banks'][$ind]);
			$best_cur1[$value]['sale_title'] = $arr['banks'][$ind];
			
			$best_cur1[$value]['list'] = $this->getList($value);
		}
		
		return $best_cur1;
	}
	
	//Возвращает массив 7 последних дат с курсами валют и другими данными.
	public function getList($valute){ 
		$arData = file(Yii::$app->basePath.'/web/data/dinamic-courses/'.$valute.'2.csv'); //!!!!!!!!!!!!!!!!!!!!!!
		//$arData = file(Yii::$app->basePath.'/web/data/dinamic-courses/usd2.csv'); //!!!!!!!!!!!!!!!!!!!!!!
		
		$i = 0;
		while($i < 8){
			$ar[] = trim( array_pop($arData) );
			$i++;
		}
		
		foreach($ar as $k=>$v){
			$ar1 = explode('|', $v);
			$ar2 = explode('|', $ar[$k+1]);
			
			$class = ($ar1[1] >= $ar2[1]) ? 'st-green' : 'st-red';
			
			$change = $ar1[1] - $ar2[1];
			if($change >= 0){
				$change = round($change, 4);
				if($change == 0) 
					$change = '0.0000';
				$change = sprintf("%01.4f", $change);
				$change = '+ '.$change;
			}else{
				$change = $ar2[1] - $ar1[1]; //echo '<br>';
				$change = round($change, 4);
				$change = sprintf("%01.4f", $change); //echo '<br>';
				$change = '- '.$change;
			}
			
			$date = explode('-', $ar1[0]);
			$date = $date[2].'.'.$date[1];
			
			$arr[] = array('date'=>$date, 'value'=>$ar1[1], 'class'=>$class, 'change'=>$change);
			if($k == 6) break;
		}
		
		//echo $valute; 
		//exit;
		return $arr;
	}
	
	// Возвращает массив дат , которых нет в файле 'web/data/dinamic-courses/usd.csv'
	public function getArrayDate($start) {
		$ar = explode('-', $start);
		$start = mktime (10,0,0,$ar[1],$ar[2],$ar[0]);
		
		$ar = explode('-', $this->date_today);
		$end = mktime (10,0,0,$ar[1],$ar[2],$ar[0]);
		
		$arr = array();
		
		while($start < $end){
			$start = $start+86400;
			$arr[] = date ('d/m/Y', $start);
		}
		
		return $arr;
	}
	
	
	public function parseData($date) {
		$cont = file_get_contents('http://cbr.ru/scripts/XML_daily.asp?date_req='.$date);
		//$cont = false;
		
		$ar = explode('/', $date);
		$date1 = $ar[2].'-'.$ar[1].'-'.$ar[0];
		
		$arErrors = file(Yii::$app->basePath.'/web/data/dinamic-courses/error.csv');
		
		if($cont === false){
			
			$this->arUsd = file(Yii::$app->basePath.'/web/data/dinamic-courses/usd2.csv');
			$key = count($this->arUsd);
			
			$flag = 0;
			foreach($arErrors as $val){
				if(strstr($val, $date1)){
					$flag = 1; break;
				}
			}
			
			if( $flag === 0 ){
				$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/error.csv', "a");
				fputs ( $file, $date1.'|'.$key."|\r\n");
				fclose ($file);
			}
				
			$arSuccess = file(Yii::$app->basePath.'/web/data/dinamic-courses/lastSuccess.csv');
			$arSuccess = explode( '|', trim($arSuccess[0]) );
	
			$usd = $date1.'|'.$arSuccess[0]."\r\n";
			$eur = $date1.'|'.$arSuccess[1]."\r\n";
			$nok = $date1.'|'.$arSuccess[2]."\r\n";
			
			$success = 0;
		}
		//----------------
		else{
			if(!empty($arErrors)){
				$str = '';
				foreach($arErrors as $val){
					if(!strstr($val, $date1)){
						$str .= $val;
					}
				}
				//$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/error.csv', "w");
				//fputs ( $file, $str);
				//fclose ($file);
			}
	
			$ar = explode('<Valute ID="R01235">', $cont);
			$ar=explode('</Value>', $ar[1]);
			preg_match('/<Value>(.*)/', $ar[0], $out);
			$successUsd = str_replace(',', '.', $out[1]);
			$usd = $date1.'|'.$successUsd."\r\n";
	
			$ar = explode('<Valute ID="R01535">', $cont);
			$ar=explode('</Value>', $ar[1]);
			preg_match('/<Value>(.*)/', $ar[0], $out);
			$successNok = str_replace(',', '.', $out[1]);
			$nok = $date1.'|'.$successNok."\n";
	
			$ar = explode('<Valute ID="R01239">', $cont);
			$ar=explode('</Value>', $ar[1]);
			preg_match('/<Value>(.*)/', $ar[0], $out);
			$successEur = str_replace(',', '.', $out[1]);
			$eur = $date1.'|'.$successEur."\n";
				
			$success = $successUsd.'|'.$successEur.'|'.$successNok;
			$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/lastSuccess.csv', "w");
			fputs ( $file, $success);
			fclose ($file);
			
			$success = 1;
		}
		
		//$usd = explode('|', $usd)[1];
		//$eur = explode('|', $eur)[1];
		//$nok = explode('|', $nok)[1];
		return array('date'=>$date1, 'usd'=>$usd, 'eur'=>$eur, 'nok'=>$nok, 'success'=>$success);
	}
	
	public function updateDataGraphic($start) {
		set_time_limit(86400);
		
		$arDate = $this->getArrayDate($start);
		
		foreach($arDate as $date){
			$data = $this->parseData($date);
			
			$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/lastDate.txt', "w");
			fputs ( $file, $data['date']);
			fclose ($file);
			
			$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/usd2.csv', "a");
			fputs ( $file, $data['usd']);
			fclose ($file);
			
			$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/eur2.csv', "a");
			fputs ( $file, $data['eur']);
			fclose ($file);
			
			$file = fopen(Yii::$app->basePath.'/web/data/dinamic-courses/nok2.csv', "a");
			fputs ( $file, $data['nok']);
			fclose ($file);
	
			sleep(1);
			
		}
	}
	
}

/*
		echo '<pre>';
		print_r($best_cur1);
		echo '</pre>';
*/
