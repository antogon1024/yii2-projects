<?php
namespace app\modules\mycms\controllers;

use Yii;
use yii\web\Controller;
use app\modules\mycms\models\LoginForm;

class LoginController extends Controller
{
	public $layout = 'site2';
   
    public function actionIndex()
    {
		$model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
		   return $this->redirect(['/mycms/cabinet']);
        }
		
		return $this->render('index', [
			'model' => $model,
		]);
    }
}