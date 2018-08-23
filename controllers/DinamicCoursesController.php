<?php
namespace app\controllers;

use Yii;
//use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\filters\VerbFilter;

use app\library\antogon1024\MobileDetect;
use app\models\DinamicCourses;
use app\models\Converter;

class DinamicCoursesController extends Controller
{
	public $layout = 'projects';
	public $data;
	public $arBest;
	
	public function actions()
    {
		/*$u1 = file(Yii::$app->basePath.'/web/data/dinamic-courses/usd1.csv');
		$u2 = file(Yii::$app->basePath.'/web/data/dinamic-courses/usd2.csv');
		
		$r = array_merge ($u1, $u2);
		echo '<pre>';
		print_r($r);
		echo '</pre>';
		
		exit;*/
		
		list($usec, $sec) = explode(" ",microtime());
		$key = date ("Y-m-d", $sec);
		$cache = Yii::$app->cache;	
			
		$data = $cache->get($key);
		
		if ($data === false) {
			$modelConverter = new Converter;
			$data = $modelConverter->GetData($key);
			$cache->set($key, $data, 3600);
		}
		
		//-----------------------------
		
		$cache = Yii::$app->cache;	
		$key = 'arbest';
			
		$this->arBest = $cache->get($key);
		
		if ($this->arBest === false) {
			$model = new DinamicCourses;
			$this->arBest = $model->bestCourse($data);
			$cache->set($key, $this->arBest, 3600);
			//$cache->set($key, $this->arBest, 1);
		}
		
	}
	
	//ajax!!!!
	public function actionIndex()
    {
       /* $arusd = file(Yii::$app->basePath.'/web/data/dinamic-courses/usd.csv');
		echo '<pre>';
		print_r($arusd);
		echo '</pre>';
		exit;8/
		
		
		/*$areur = file(Yii::$app->basePath.'/web/data/dinamic-courses/eur.csv');
		$arnok = file(Yii::$app->basePath.'/web/data/dinamic-courses/nok.csv');
		
		$a = 0;
		foreach($arusd as $k=>$v){
			if($k == 7295) break;
			
			$v = explode('|', trim($v));
			
			if($v[0] == '1999-01-01') $a = 1;
			//$eur = ($a === 1) ? (explode('|', trim($areur[$k-331])) : '0.0000';
			if($a === 1){
				$eur = explode('|', trim($areur[$k-331]))[1];
			}else{
				$eur = '0.0000';
			}
			
			//$v1 = explode('|', trim($areur[$k]));
			$v2 = explode('|', trim($arnok[$k]));
			
			//$ar[$k] = $v[0].'|'.$v[1].'|'.$v1[1].'|'.$v2[1];
			$ar[] = $v[0].'|'.$v[1].'|'.$eur.'|'.$v2[1];
			
			Yii::$app->db->createCommand()->insert('cb_exchange_rates', [
				'usd' => $v[1],
				'eur' => $eur,
				'nok' => $v2[1],
				'date' => $v[0],
			])->execute();
		}
		echo '<pre>';
		print_r($ar);
		echo '</pre>';
		*/
		/*$ar = Yii::$app->db->createCommand('SELECT usd,date FROM cb_exchange_rates')
            ->queryAll();
		
		echo '<pre>';
		print_r($ar);
		echo '</pre>';
		exit;*/
		
		
		
		
		
		$detect = new MobileDetect;
		$model = new DinamicCourses;
		
		if(isset($_GET['valute'])){ 
			
			$cache = Yii::$app->cache;	
			$key = 'graphic'.$_GET['valute'];
			
			$data = $cache->get($key);
		
			if ($data === false) {
				// срок действия истек или ключ не найден в кэше
				$data = $model->getDataGraphic( $_GET['valute'] );
				//$cache->set($key, $data, 3600);
				$cache->set($key, $data, 1);
			}
			
			
			//print_r($data);exit;
			echo json_encode( $data );
			exit;
		}
		
		
		if(isset($_GET['date2'])){
			$ar =explode('.', $_GET['date2']);
			$newdate = $ar[2].'-'.$ar[1].'-'.$ar[0];
			$ar1 = file(Yii::$app->basePath.'/web/data/dinamic-courses/'.$_GET['valute2'].'1.csv');
			$ar2 = file(Yii::$app->basePath.'/web/data/dinamic-courses/'.$_GET['valute2'].'2.csv');
			$ar = array_merge($ar1, $ar2);
			
			foreach($ar as $v){
				$vdate = explode('|', $v);
				if($vdate[0] == $newdate){
					$vdate[0] = explode('-', $vdate[0]);
					$vdate[0] = $vdate[0][2].'.'.$vdate[0][1].'.'.$vdate[0][0];
					$vdate[1] = trim($vdate[1]);
					echo json_encode( $vdate );
					exit;
				}
			}
		}
		
    }
	
	public function actionUsd()
    {
		
		$valute = 'usd';
		
		/*$cache = Yii::$app->cache;	
		$key = 'arbest'.$valute;
			
		$arBest = $cache->get($key);
		
		if ($arBest === false) {
			// срок действия истек или ключ не найден в кэше
			$model = new DinamicCourses;
			$arBest = $model->bestCourse($valute, $this->data);
			//$cache->set($key, $arBest, 3600);
			$cache->set($key, $arBest, 1);
		}*/
		
		$active = array('usd' => 'ant-active', 'eur' => '', 'nok' => '');
	
		//$mobile = ($detect->isMobile()) ? true : false;
		return $this->render('usd', [
			//'mobile' => $mobile,
			'arBest' => $this->arBest,
			'active' => $active,
			'valute' => 'usd'
		]);
	}
	
	public function actionEur()
    {
		/*$valute = 'eur';
		
		$cache = Yii::$app->cache;	
		$key = 'arbest'.$valute;
			
		$arBest = $cache->get($key);
		
		if ($arBest === false) {
			// срок действия истек или ключ не найден в кэше
			$model = new DinamicCourses;
			$arBest = $model->bestCourse($valute, $this->data);
			//$cache->set($key, $arBest, 3600);
			$cache->set($key, $arBest, 1);
		}*/
		
		$active = array('usd' => '', 'eur' => 'ant-active', 'nok' => '');
		//$mobile = ($detect->isMobile()) ? true : false;
		return $this->render('eur', [
			//'mobile' => $mobile,
			'arBest' => $this->arBest,
			'active' => $active,
			'valute' => 'eur'
		]);
	}
	
	public function actionNok()
    {
		/*$valute = 'nok';
		
		$cache = Yii::$app->cache;	
		$key = 'arbest'.$valute;
			
		$arBest = $cache->get($key);
		
		if ($arBest === false) {
			// срок действия истек или ключ не найден в кэше
			$model = new DinamicCourses;
			$arBest = $model->bestCourse($valute, $this->data);
			//$cache->set($key, $arBest, 3600);
			$cache->set($key, $arBest, 1);
		}*/
		
		$active = array('usd' => '', 'eur' => '', 'nok' => 'ant-active');
		//$mobile = ($detect->isMobile()) ? true : false;
		return $this->render('eur', [
			//'mobile' => $mobile,
			'arBest' => $this->arBest,
			'active' => $active,
			'valute' => 'nok'
		]);
	}
}