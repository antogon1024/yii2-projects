<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

//use app\models\LoginForm;
//use app\models\ContactForm;
use app\models\Converter;
//use app\components\helpers\Helpers;
//use app\components\antogon1024\AntMenu;

class ConverterController extends Controller
{
	public $layout = 'projects';
	
	public function actionIndex()
    {
		$model = new Converter;
		list($usec, $sec) = explode(" ",microtime());
		$today = date ("Y-m-d", $sec);
		
		if( $_POST ){
			$request = Yii::$app->request;
			
			// эквивалентно: $dateKey = isset($_POST['date']) ? $_POST['date'] : $today;
			$dateKey = $request->post('date', $today);
			
			$duration = ($dateKey == $today) ? 3600 : 3600*24*365;
			$cache = Yii::$app->cache;
			$data = $cache->get($dateKey);
		
			if ($data === false) {
				$data = $model->GetData($dateKey);
				$cache->set($dateKey, $data, $duration);
			}
			
			echo json_encode($data);
			exit;
		}
		
		$sec_start = gmmktime (0, 0, 0, 5, 2, 2007);
		list($usec, $sec) = explode(" ",microtime());
		$end = date ("Y-m-d", $sec);
		
		list($year, $month, $day) = explode('-', $end);
		$sec_end = gmmktime (0, 0, 0, $month, $day, $year);
		$maxday = ($sec_end - $sec_start)/86400;
		
		return $this->render('index', [
			'maxday' => $maxday,
			//'data' => $data
		]);
		
    }
	
	
	public function actionTest()
	{
		list($usec, $sec) = explode(" ",microtime());
		$date = date ("Y-m-d", $sec);
		//$date = '2017-11-13';
		//$date = '2017-11-08';
		//$date = '2017-11-06';
		
		$model = new Converter;
		$data = $model->GetData($date);
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit;
	}
	
		
}
