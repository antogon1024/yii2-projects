<?php

namespace app\modules\help1\controllers;

use Yii;
//use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\filters\VerbFilter;

//use app\models\Converter;
//use app\models\CoursesValute;

//use app\models\LoginForm;
//use app\models\ContactForm;

//use app\components\helpers\Helpers;
//use app\components\antogon1024\AntMenu;
use app\models\Converter;

class PjaxController extends Controller
{
	//public $requestedRoute = 'projects';
	//public $layout = 'projects';
	
	public function actionExample1()
    {
		$request = Yii::$app->request;
		//exit;
		if( $request->isPjax ){
			return $this->render('example-1', [
				'time' => date('H:i:s').' 111',
			]);
		}
		
		return $this->render('example-1', [
			'time' => date('H:i:s').' 222',
		]);
	}
	
	public function actionExample2()
    {
		return $this->render('example-2', [
			'time' => date('H:i:s'),
		]);
	}
	
	public function actionExample3($action = 'time')
    {
		if ($action === 'time') {
            $data = date('H:i:s');
        } else {
			$data = date('Y-M-d');
        }
		
		return $this->render('example-3', [
			'data' => $data,
		]);
	}
	
	
	
	
	
	
	
	public function actionGridView()
    {
		return $this->render('grid-view', [
			
		]);
	}
}