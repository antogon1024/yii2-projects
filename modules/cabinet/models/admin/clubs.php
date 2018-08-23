<?php

namespace app\modules\cabinet\models\admin;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

use yii\data\Pagination;

//class Clubs extends ActiveRecord
class Clubs extends Model
{
    public function init()
    {
        Yii::$app->db->tablePrefix = 'cab_';
    }

    public static function tableName()
    {
        return '{{%clubs}}';
    }

    public function getData()
    {
        $pageSize = 2;
        $count = (new \yii\db\Query())->select('COUNT(*)')->from('cab_clubs')->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize, 'pageSizeParam'=>false]);

        if(isset($_GET['page'])) {
            $offset = ($_GET['page'] - 1) * $pageSize;
        }else{
            $offset = 0;
        }

        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from('{{%clubs}}')
            ->limit($pages->limit)->offset($offset)
            ->all();

        foreach($data as $k=>$v){
            if($v['all_clients'] != ''){
                $ar = explode(',', $v['all_clients']);
                $data[$k]['all_clients'] = count($ar);
            }else{
                $data[$k]['all_clients'] = 0;
            }

            if($v['active_clients'] != ''){
                $ar = explode(',', $v['active_clients']);
                $data[$k]['active_clients'] = count($ar);
            }else{
                $data[$k]['active_clients'] = 0;
            }
        }

        //echo $count = clone $ar; exit;
        // echo '<pre>';print_r($pages);exit;
        $arr['data'] = $data;
        $arr['pages'] = $pages;

        return $arr;
    }



}