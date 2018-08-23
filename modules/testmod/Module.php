<?php

namespace app\modules\testmod;

/**
 * mycms module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\testmod\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
		$this->layout = 'site';
        // custom initialization code goes here
    }
}
