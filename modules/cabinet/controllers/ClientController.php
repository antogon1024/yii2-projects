<?php
namespace app\modules\cabinet\controllers;

use yii\web\Controller; 
use Yii;

use app\modules\cabinet\models\clients\mytariff;


class ClientController extends Controller
{
	//public $menuHeader;

    public function init()
    {
        parent::init();
		//$this->layout = 'site2';
		//echo 'cab-net';exit;
        //$model = new MyTariff;
        //$data = $model->getData();
    }
   
    public function actionMyTariff()
    {
     
		$model = new MyTariff;
        $data = $model->getData();
		//echo '<pre>';
		//print_r($data);
       //echo $data['user']['duration'];
		//exit;
		
		return $this->render('my_tariff', ['data'=>$data,]);
    }

    public function actionMyClubs()
    {


        $model = new MyTariff;
        $data = $model->menuHeader();


        return $this->render('my_clubs', ['data'=>$data,]);
    }

    public function actionPersonalData()
    {
        $model = new MyTariff;
        $data = $model->menuHeader();
        return $this->render('personal_data', ['data'=>$data,]);
    }

    public function actionAccessCode()
    {
        $model = new MyTariff;
        $data = $model->menuHeader();
        return $this->render('access_code', ['data'=>$data,]);
    }

    public function actionQuestions()
    {
        $model = new MyTariff;
        $data = $model->menuHeader();
        return $this->render('questions', ['data'=>$data,]);
    }

}
