<?php
namespace app\modules\mycms;
use Yii;

/**
 * mycms module definition class
 */
class Module extends \yii\base\Module //implements yii\base\BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\mycms\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {   //echo 'ggg';exit;
        parent::init();
		$this->layout = 'site';
		//Yii::configure($this, require __DIR__ . '/config/web.php');
		//yii\web\Application::bootstrap();
       
	   // custom initialization code goes here
    }
	
	
}
