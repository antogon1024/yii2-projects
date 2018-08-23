<?php

namespace app\modules\mycms\controllers;

use yii\web\Controller;
use Yii;
//use common\models\LoginForm;
use app\modules\mycms\models\LoginForm;
use app\modules\mycms\models\SignupForm;


class AdminController extends Controller
{
   /* public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/
	
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

	public function actionLogin()
    {
        $this->layout = 'login';
		
		if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
			return $this->redirect('/mycms/admin/menu/index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	
    public function actionLogout()
    {
        Yii::$app->user->logout();
		return $this->redirect('/mycms/admin');
        //return $this->goHome();
    }
}
