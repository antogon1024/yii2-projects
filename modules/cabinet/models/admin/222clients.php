<?php

namespace app\modules\cabinet\models\admin;

use Yii;
use yii\db\ActiveRecord;
use yii\data\Pagination;



class Clients extends ActiveRecord
{
    public $full_name1;
    public $full_name2;
    public $full_name3;
    public $birth_day;
    public $birth_month;
    public $birth_year;
    public $username;
    public $email;
    public $password1;
    public $password2;
    //public $role;
    public $phone;
    public $avatar;
    public $birth_date1;

    public function init()
    {
        //Yii::$app->db->tablePrefix = 'cab_';
    }

    public static function tableName()
    {
        return '{{%users}}';
    }

    public function getData()
    {
        $pageSize = 2;
        $count = $this::find()->count();
        $pages = new Pagination([
            'totalCount' => $count,
            'pageSize' => $pageSize,
            'pageSizeParam' => false
        ]);

        if (isset($_GET['page'])) {
            $offset = ($_GET['page'] - 1) * $pageSize;
        } else {
            $offset = 0;
        }

        $data = $this::find()
            ->select('* , user.email, user.username')
            ->leftJoin('user', 'user.id = user_id')
            ->limit($pages->limit)
            ->offset($offset)
            ->all();

        //print_r( $data->createCommand()->Sql );
        $arMonth = array(0 => 'месяц', 1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
            5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа', 9 => 'сентября', 10 => 'октября',
            11 => 'ноября', 12 => 'декабря'
        );

        foreach ($data as $k => $v) {
            if ($v['birth_date'] != '') {
                $a = explode('-', $v['birth_date']);
                $data[$k]['birth_date1'] = $a[0] . ' ' . $arMonth[$a[1]] . ' ' . $a[2] . ' года';
            }
        }

        //echo '<pre>';
        //print_r($data);
        //exit;
        $arr['data'] = $data;
        $arr['pages'] = $pages;
        return $arr;
    }
}