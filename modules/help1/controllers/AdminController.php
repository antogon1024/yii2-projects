<?php

namespace app\modules\mycms\controllers;

use yii\web\Controller;
use Yii;
//use common\models\LoginForm;
use app\modules\mycms\models\LoginForm;
use app\modules\mycms\models\SignupForm;
/**
 * Default controller for the `mycms` module
 */
class AdminController extends Controller
{
    public function init()
    {
        parent::init();
		$this->layout = 'admin';
    }
	
	
	/**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    
		
		//return $this->render('index');
    }
	
	public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
