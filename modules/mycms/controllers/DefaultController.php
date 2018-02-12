<?php

namespace app\modules\mycms\controllers;

use Yii;
use yii\web\Controller;
use app\modules\mycms\models\LoginForm;
use app\modules\mycms\models\SignupForm;
/**
 * Default controller for the `mycms` module
 */
class DefaultController extends Controller
{
	public function init()
    {
        parent::init();
		$this->layout = 'site2';
    }
   
    public function actionIndex()
    {
        //print_r( Yii::$app->user);//exit;
		return $this->render('index');
    }
	
	public function actionTest()
    {
        return $this->render('index');
    }
	
	public function actionLogin()
    {
		$model = new LoginForm();
		//$identity = Yii::$app->user->identity;
		//print_r( Yii::$app->user);//exit;
		//echo $id = Yii::$app->user->id.'aaa';
		//echo Yii::$app->user->identity->username;
		//echo $identity->username;
		//exit;
		
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
        }

        //$model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           // return $this->goBack();
		   return $this->redirect(['/mycms/default/kabinet']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
		
		//return $this->render('login');
    }
	
	public function actionLogout()
    {
        Yii::$app->user->logout();
		return $this->redirect(['/mycms']);
        //return $this->goHome();
    }
	
	public function actionRegister()
    {
        $identity = Yii::$app->user->identity;
		//print_r($identity);exit;
		
		$model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
					return $this->redirect(['/mycms/default/kabinet']);
                }
            }
        }
 
        //return $this->render('signup', [
            //'model' => $model,
       // ]);
		return $this->render('register', [
			'model' => $model,
		]);
    }
	
	public function actionKabinet()
    {
        return $this->render('kabinet');
    }
}
