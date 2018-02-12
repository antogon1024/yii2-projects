<?php

namespace app\modules\mycms;

/**
 * mycms module definition class
 */
class Module extends \yii\base\Module
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
       
	   // custom initialization code goes here
    }
}
