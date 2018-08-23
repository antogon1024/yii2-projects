<?php
// подключаем пространство имен
namespace app\library\widgets;


use yii\base\Widget;
use app\library\Behaviors\MyBehavior;
//use yii\helpers\Html;

// расширяем класс Widget
class MyWidget extends Widget
{
    public function behaviors()
    {
        return [
            [
                'class' => MyBehavior::className(),
                'prop1' => 'Статическое прикрепление поведения в <b>виджете</b>',
                'prop2' => 'value2',
            ],
        ];
    }
    // функция описывает определенные действия
    public function init()
    {
        parent::init();
    }

    // возвращаем результат
    public function run()
    {
        //return Html::encode($this->url);
    }
}
