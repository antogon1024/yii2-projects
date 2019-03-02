<?php

namespace app\modules\cabinet\models;

use Yii;
use yii\db\ActiveRecord;

//use yii\base\Model;
//use app\models\User;
use app\modules\cabinet\models\User;
use yii\data\Pagination;

class Clients extends ActiveRecord
//class Clients extends Model
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
    public $role;
    //public $phone;
    //public $avatar;
    //public $avatar1;
    public $birth_date1;
    public $edit;

    //const STATUS_REQUEST = 0;
    //const STATUS_INACTIVE = 0;
    //const STATUS_ACTIVE = 1;

    public function init()
    {
        Yii::$app->db->tablePrefix = 'cab_';
    }

    public static function tableName()
    {
        return '{{%clients}}';
    }

    public function rules()
    {
        $rules = [
            [
                ['password1', 'password2', 'avatar', 'role', 'full_name1', 'full_name2',
                    'full_name3', 'phone', 'username', 'email'],
                'required', 'message' => 'Поле не должно быть пустым'
            ],

            /*[
                ['username', 'email'],
                'required', 'targetClass' => User::className(), 'message' => 'Поле не должно быть пустым'
            ],*/

            [
                ['full_name1', 'full_name2', 'full_name3'],
                'match', 'pattern' => '/^[а-я]+$/ui', 'message' => 'Разрешена только кириллица'
            ],

            [
                ['birth_day'],
                'match', 'pattern' => '/^0$/ui', 'message' => 'Не выбран день', 'not' => true
            ],

            [
                ['birth_month'],
                'match', 'pattern' => '/^0$/ui', 'message' => 'Не выбран месяц', 'not' => true
            ],

            [
                ['birth_year'],
                'match', 'pattern' => '/^0$/ui', 'message' => 'Не выбран год', 'not' => true
            ],

            [
                ['username'],
                'match', 'pattern' => '/^[a-z0-9]+$/ui', 'message' => 'Разрешены латинские буквы и цифры'
            ],

            [
                ['email'], 'email', 'message' => 'Неправильный формат email'
            ],

            [
                ['password1'], 'string', 'length' => [4], 'tooShort' => 'Количество символов должно быть больше 5'
            ],

            [
                ['password2'], 'compare', 'compareAttribute' => 'password1', 'message' => 'Пароли не совпадают'
            ],

            [
                ['username'], 'unique', 'targetClass' => User::className(),
                'message' => 'Такой логин уже существует'
            ],

            [
                ['email'], 'unique', 'targetClass' => User::className(),
                'message' => 'Такой адрес почты уже существует'
            ],

            [
                ['avatar'], 'file',
                'extensions' => ['jpg', 'png', 'gif'],
                'maxSize' => 200 * 200,
                'wrongExtension' => 'Разрешены только файлы с этими расширениями: {extensions} .',
                'tooBig' => 'Размер файла не должен превышать {formattedLimit}.',
            ]

        ];

        //Если клиент редактируется, убираем обязательность полей - password1, password2,avatar
        if (Yii::$app->request->post()['edit'] == 1) {
            unset($rules[0][0][0]);
            unset($rules[0][0][1]);
            unset($rules[0][0][2]);
        }

        if (Yii::$app->request->post()['unique-username'] == 0) {
            unset($rules[9]);
        }

        if (Yii::$app->request->post()['unique-email'] == 0) {
            unset($rules[10]);
        }

        return $rules;
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->setPassword($this->password1);
        $user->generateAuthKey();
        $res = $user->save() ? $user : null;

        $this->saveClient($user->id);


        //echo '<pre>';
        print_r($this);
        exit;


        //return $res;

    }

    public function saveClient($user_id)
    {
        $upload = Yii::$app->basePath . '/web/images/mod_cabinet/clients';
        if (file_exists($upload . '/' . $user_id . '.' . $this->avatar->extension)) {
            unlink($upload . '/' . $user_id . '.' . $this->avatar->extension);
        }
        $this->avatar->saveAs($upload . '/' . $user_id . '.' . $this->avatar->extension);


        $full_name = $this->full_name1 . ' ' . $this->full_name2 . ' ' . $this->full_name3;
        $birth_date = $this->birth_day . '-' . $this->birth_month . '-' . $this->birth_year;

        Yii::$app->db->createCommand()->insert('{{%clients}}', [
            'user_id' => $user_id,
            'avatar' => $user_id . '.' . $this->avatar->extension,
            'full_name' => $full_name,
            'birth_date' => $birth_date,
            'phone' => $this->phone

        ])->execute();
    }

    public function getData()
    {
        $session = Yii::$app->session;
        if (isset($_POST['filter'])) {
            $filter = $_POST['filter'];
            $session->set('filter', $filter);
        } else {
            $filter = 'full_name';
            $filter = ($session->has('filter')) ? $session->get('filter') : 'full_name';
        }

        if (isset(Yii::$app->request->post()['search'])) {
            $search = $_POST['search'];
        } else {
            $search = '';
        }

        $pageSize = 1;
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
            ->select('{{%clients}}.id, user_id, avatar, full_name, birth_date, phone, user.email,
             user.username, user.created_at')
            ->leftJoin('user', 'user.id = user_id')
            ->where(['like', 'full_name', $search . '%', false])
            ->limit($pages->limit)
            ->offset($offset)
            ->orderBy($filter . ' ASC')
            ->all();

        if(count($data) == 0){
            $pages->totalCount = 0;
        }

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

        $ar_filter = ['tariff' => 'Тариф', 'full_name' => 'Имя', 'created_at' => 'Новые'];

        $arr['data'] = $data;
        $arr['pages'] = $pages;
        $arr['filter'] = $ar_filter[$filter];
        return $arr;
    }

    public function getClient($user_id)
    {
        $client = $this::find()
            ->select('user_id, avatar, full_name, birth_date, phone, user.email, user.username')
            ->leftJoin('user', 'user.id = user_id')
            ->where(['user_id' => $user_id])
            ->asArray()
            ->one();
//echo $user_id;exit;
        foreach ($client as $k => $v) {
            if ($k == 'full_name') {
                //echo $v;exit;
                $name = trim($v);
                $ar = explode(' ', $name);
                $client['full_name1'] = $ar[0];
                $client['full_name2'] = $ar[1];
                $client['full_name3'] = $ar[2];
            }
            if ($k == 'birth_date') {
                $date = trim($v);
                $ar = explode('-', $date);
                $client['birth_day'] = $ar[0];
                $client['birth_month'] = $ar[1];
                $client['birth_year'] = $ar[2];
            }
        }
        return $client;
    }

    public function updateClient($user_id)
    {

        $post = Yii::$app->request->post()['Clients'];

        //echo '<pre>';
        //print_r($post);
        //exit;

        if (!empty($this->avatar)) {
            $ar_data['avatar'] = $user_id . '.' . $this->avatar->extension;

            $upload = Yii::$app->basePath . '/web/images/mod_cabinet/clients';
            if (file_exists($upload . '/' . $user_id . '.' . $this->avatar->extension)) {
                unlink($upload . '/' . $user_id . '.' . $this->avatar->extension);
            }
            $this->avatar->saveAs($upload . '/' . $user_id . '.' . $this->avatar->extension);
        }

        $ar_data['full_name'] = $post['full_name1'] . ' ' . $post['full_name2'] . ' ' . $post['full_name3'];
        $ar_data['birth_date'] = $post['birth_day'] . '-' . $post['birth_month'] . '-' . $post['birth_year'];
        $ar_data['phone'] = $post['phone'];

        Yii::$app->db->createCommand()->update('{{%clients}}', $ar_data, 'user_id =' . $user_id)->execute();
    }

}