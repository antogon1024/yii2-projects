<?php

namespace app\modules\help1\models\behaviors;

use Yii;
use app\library\behaviors\MyBehavior;
use app\library\behaviors\PurifyBehavior;

class BlogArticles extends \yii\db\ActiveRecord
{
    public $name;
    //public $prop1;

    public function behaviors()
    {
        return [
            [
                'class' => MyBehavior::className(),
                'prop1' => 'Статическое прикрепление поведения в <b>bмодели</b>',
                'prop2' => 'value2',
            ],

            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['text'],

            ]
        ];
    }
}