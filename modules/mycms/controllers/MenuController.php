<?php

namespace app\modules\mycms\controllers;

use Yii;
use yii\web\Controller;
//use app\models\Converter;
use app\modules\mycms\models\allMenu;

class MenuController extends Controller
{
	public $tablePrefix = 'asd_';
	
	public function init()
    {   //echo 'menu';exit;
		$identity = Yii::$app->user->identity;
		if($identity == null){
			return $this->redirect(['/mycms/admin']);
		}
		$this->layout = 'admin';
    }
   
    public function actionIndex()
    {
        //exit;
		//print_r( Yii::$app->user);//exit;
		return $this->render('index');
    }
	
	public function actionAllMenu()
    {
        $session = Yii::$app->session;
		$session->open();
		//if(!isset($session['duser']))
			//$this->redirect($baseUrl.'/admin');

		//exit;
		//$cs = Yii::app()->clientScript;
       // $cs->registerScriptFile('/web/js/admin/jquery.js', CClientScript::POS_HEAD);
		//$cs->registerScriptFile(baseUrl.'/js/admin/allMenu.js', CClientScript::POS_HEAD);
		//$cs->registerCssFile(baseUrl.'/css/admin/all_menu.css');
		$this->view->registerJsFile('/web/js/admin/jquery.js');
		               
		$model = new allMenu;
	
		$message = '';
		if(isset($_POST['allMenu'])){	
            $model->attributes=$_POST['allMenu'];	
			
			$str='';
			foreach($model->test as $k=>$v){
				$str.="'".$k."'".',';  
			}
			$str=trim($str, ',');
            //$ar=$model->query2($str);

		}
		
		if(isset($_POST['del'])){
			
			
			$id=$_POST['del'];
			$id=explode(',', $id);
			$i=0;
			foreach($id as $val){
				$i++;
			    $res=$model->query3($val);
				$name=$res[1];
				if(stristr(PHP_OS,'win'))
					$k="\r\n";
				else
					$k="\r";
				$apath=Yii::getPathOfAlias('webroot');
				
				$str='/*menu_#'.$name.'*/';
				
				$cont=file_get_contents($apath.'/css/shop.css');
				$cont=explode($str, $cont);

				$result=$cont[0].ltrim($cont[2], $k);
				
				$file = fopen($apath."/css/shop.css","w");
                flock($file, LOCK_EX);
                fputs ( $file, $result);
                fclose ($file);

			}
	
			if($res[0]==1){
			    if($i==1)
			        //$message="$i меню удаленно успешно";
				    $message=iconv('cp1251','utf-8',"$i меню удаленно успешно");
			    else
                    $message=iconv('cp1251','utf-8',"$i меню удаленны успешно");
			}
		}
		
        $ar=$model->query1();
		print_r($ar);exit;
		//$menu=$this->adminMenu();

		return $this->render('all-menu', array(
			//'menu' => $menu,
		    'model'=>$model,
		    'ar'=>$ar,
		    'message'=>$message
        ));		
		
		
		//return $this->render('all-menu');
    }
	
	public function actionAddMenu()
    {
		return $this->render('add-menu');
    }
	
	public function actionItemMenu()
    {
		return $this->render('item-menu');
    }
	
	public function actionAddItem()
    {
		return $this->render('add-item');
    }
}