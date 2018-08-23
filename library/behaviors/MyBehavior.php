<?php
namespace app\library\behaviors;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $prop1 = 'defaultValue';

    private $_prop2;

    public function getProp2()
    {
        return $this->_prop2;
    }

    public function setProp2($value)
    {
        $this->_prop2 = $value;
    }

    public function foo()
    {
        return 'результат функции';
    }
}