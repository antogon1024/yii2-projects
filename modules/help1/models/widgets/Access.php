<?php

namespace app\modules\help1\models\widgets;

use Yii;
use yii\db\ActiveRecord;
use app\library\behaviors\MyBehavior;

class Access extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => MyBehavior::className(),
                'prop1' => 'Статическое прикрепление поведения в <b>модели</b>',
                'prop2' => 'value2',
            ],
        ];
    }


    public function init()
    {
        Yii::$app->db->tablePrefix = 'acs_';
    }

    public static function tableName()
    {
        return '{{%access}}';
    }

    public function getData()
    {
        $data = Access::find()
            ->asArray()
            ->all();
        return $data;
    }
}