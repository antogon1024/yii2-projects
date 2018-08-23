<?php

namespace app\modules\help1;

/**
 * mycms module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\help1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
		$this->layout = 'main';
		// custom initialization code goes here
    }
}
