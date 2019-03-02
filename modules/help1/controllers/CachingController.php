<?php
namespace app\modules\help1\controllers;

use Yii;
use yii\web\Controller;

class CachingController extends Controller
{
	
	public function actionData()
    {
		return $this->render('data', [
			
		]);
	}

	public function actionFragment()
    {
		return $this->render('fragment', [
			
		]);
	}
}