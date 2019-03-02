<?php

namespace app\controllers;

//use app\models\dao\Access;
//use app\models\build\Access;
use app\models\arecord\Access;
use yii\helpers\Html;

class AccessController extends \yii\web\Controller
{
    public function init()
	{
		//Yii::app()->db->tablePrefix='acs_';
	}
	
	public function actionIndex()
    {
        $model = new Access;
		$data = $model->getData();
		//echo '<pre>';
		//print_r($data);
		//echo '222';exit;
		
		//print_r($this);
		
		//exit;
		return $this->render('index', [
			'data'=>$data['data'],
			'filter'=>$data['filter'],
			//'active'=>$data['active']
		]);
    }

    public function actionAdd()
    {
        $model = new Access;
		
		if($_POST){
			$model->add();
		}
		
		return $this->render('add');
    }
	
	public function actionEdit()
    {
        return $this->render('test');
    }
	
	public function actionDelete()
    {
        return $this->render('test');
    }

}
