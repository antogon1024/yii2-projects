<?php
namespace app\modules\cabinet\controllers;

use Yii;
use yii\web\Controller;
use app\modules\cabinet\models\clubs\clients;


class ClubController extends Controller
{
	public function init()
    {
        parent::init();
		//$this->layout = 'site2';
		//echo 'cab-net';exit;
    }

	
   
    public function actionClients()
    {
        $model = new Clients;
        $data = $model->menuHeader();

        return $this->render('clients', ['data'=>$data,]);
    }

    public function actionAccessCode()
    {
        $model = new Clients;
        $data = $model->menuHeader();

        return $this->render('access_code', ['data'=>$data,]);
    }

    public function actionStatistics()
    {
        $model = new Clients;
        $data = $model->menuHeader();

        return $this->render('statistics', ['data'=>$data,]);
    }

    public function actionJournal()
    {
        $model = new Clients;
        $data = $model->menuHeader();

        return $this->render('journal', ['data'=>$data,]);
    }

}
