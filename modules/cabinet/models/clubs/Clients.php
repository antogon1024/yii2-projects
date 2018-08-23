<?php

namespace app\modules\cabinet\models\clubs;

use Yii;
//use yii\db\ActiveRecord;
use yii\base\Model;

//use yii\data\Pagination;
//use app\modules\cabinet\components\expire;
//use \DateTime;

//class Clubs extends ActiveRecord
class Clients extends Model
{
    public function init()
    {
        Yii::$app->db->tablePrefix = 'cab_';
    }



    public function getData()
    {
    }

    public function menuHeader()
    {
        $key = 'club_'.Yii::$app->user->identity->email;
        $cache = Yii::$app->cache;

        $ar = $cache->getOrSet($key, function () {
            $res = (new \yii\db\Query())
                ->select(['name','icon'])
                ->from('{{%clubs}}')
                ->where(['admin' => Yii::$app->user->identity->email])
                ->one();

            $ar['name'] = $res['name'];
            $ar['icon'] = $res['icon'];
            return $ar;
        });

        return $ar;
    }
}