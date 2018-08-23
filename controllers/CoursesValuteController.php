<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Converter;
use app\models\CoursesValute;

//use app\models\LoginForm;
//use app\models\ContactForm;

//use app\components\helpers\Helpers;
//use app\components\antogon1024\AntMenu;

class CoursesValuteController extends Controller
{
	public $layout = 'projects';
	
	public function actionIndex()
    {//exit;
		$cache = Yii::$app->cache;
		$model = new CoursesValute;
		
		list($usec, $sec) = explode(" ",microtime());
		$today = date ("Y-m-d", $sec);
		
		if(isset($_GET['date'])){
			$valid = $model->validateDate( Yii::$app->request->get('date') );
			if($valid === false){
				return $this->redirect('/courses-valute/index');
			}
			
			$date = explode('.', Yii::$app->request->get('date'));
			$date = $date[2].'-'.$date[1].'-'.$date[0];
			$input = Yii::$app->request->get('date');
		}else{
			$date = $today;
			$input = '';
		}
		
		$duration = ($date == $today) ? 3600 : 	3600*24*365;
		$data = $cache->get($date);
		
		if ($data === false) {
			$modelConverter = new Converter;
			$data = $modelConverter->GetData($date);
			$cache->set($date, $data, $duration);
		}
		
		foreach($data['banks'] as $k=>$v){
			$data['odd'][$k] = ($k%2  == 0) ? 'ant-odd-1' : 'ant-odd-2';
		}
		
		$ar = ['usd'=>$data['usdfull'], 'eur'=>$data['eurfull'], 'nok'=>$data['nokfull']];
		$res = $model->getPrevData($date, $ar);
		
		$sec_start = gmmktime (0, 0, 0, 5, 2, 2007);
		list($usec, $sec) = explode(" ",microtime());
		$maxday = round(($sec - $sec_start)/86400, 0);
		$today = date ("d.m.Y", $sec);
		
		return $this->render('index', [
			'data' => $data,
			'res' => $res,
			'maxday' => $maxday,
			'today' => $today,
			'input' => $input
		]);
		
    }
}