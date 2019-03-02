<?php

namespace app\modules\help1\controllers;

use Yii;
use yii\web\Controller;
use app\modules\help1\models\EntryForm2;
/**
 * Default controller for the `mycms` module
 */
class HelpController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //echo 'help1';exit;
		return $this->render('index');
    }

	public function actionCaching()
    {
        //echo 'help1/caching';exit;
		return $this->render('caching');
    }

	public function actionWidgets()
    {
        //echo 'help1/caching';exit;
		return $this->render('widgets');
    }
	
	public function actionBootstrap()
    {
        //echo 'help1/caching';exit;
		return $this->render('bootstrap');
    }
	
	public function actionForms()
    {
       echo '<pre>'; print_r($_FILES); print_r($_POST); exit;
	   //echo 'help1/caching';exit;
		//return $this->render('forms');
		$model = new EntryForm2();
		//$this->createAction('captcha')->getVerifyCode(true);
       //echo  Yii::$app->formatter->dateFormat;exit;
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...
 
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            //print_r($model);
			// либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('forms', ['model' => $model]);
        }
    }

    public function actionBehaviors()
    {
       // exit;
        return $this->render('behaviors');
    }
}
