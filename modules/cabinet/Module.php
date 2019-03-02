<?php
namespace app\modules\cabinet;
use Yii;

/**
 * mycms module definition class
 */
class Module extends \yii\base\Module //implements yii\base\BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\cabinet\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {   //echo 'cabinet';exit;
        parent::init();


        $this->layout = 'cab_layout';
        Yii::$app->db->tablePrefix = 'cab_';
        $path = Yii::$app->basePath . '/runtime/logs/app.log';

        if ( file_exists($path) ) {
            unlink($path);
        }
        //echo Yii::$app->db->tablePrefix;
        //echo '<pre>';print_r($this);exit;
        //$this->layout = 'empty';

       // $this->redirect('/cabinet/default/main');
        //Yii::$app->response->redirect('/cabinet/default/cabinet');
		//Yii::configure($this, require __DIR__ . '/config/web.php');
		//yii\web\Application::bootstrap();
       
	   // custom initialization code goes here
    }
	
}
