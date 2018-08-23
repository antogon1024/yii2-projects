<?php

namespace app\modules\help1\models\widgets;

use Yii;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public function init()
    {
        Yii::$app->db->tablePrefix = 'help_';
    }

    public static function tableName()
    {
        return '{{%news}}';
    }

    public function getData()
    {
        $data = Access::find();
           // ->asArray()
           // ->all();
        return $data;
    }
}