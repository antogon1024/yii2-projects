<?php

namespace app\modules\cabinet\models\clients;

use Yii;
use yii\db\ActiveRecord;
use app\models\User;
//use yii\web\UploadedFile;

class RegisterClient extends ActiveRecord
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
	
	public static function tableName()
    {
        return '{{%users}}';
    }
	
    public function rules()
    {
		return [
			[
				['username', 'email', 'password1', 'password2'],
				'required', 'message'=>'Поле не должно быть пустым'
			]
/*
			[
				['role', 'full_name1', 'full_name2', 'full_name3', 'username', 'email', 'password1', 'password2',
					'phone','avatar'],
				'required', 'message'=>'Поле не должно быть пустым'
			],

			[
				['full_name1','full_name2','full_name3'], 
				'match', 'pattern' => '/^[а-я]+$/ui', 'message'=>'Разрешена только кириллица'
			],
			
			[
				['birth_day'], 
				'match', 'pattern' => '/^0$/ui', 'message'=>'Не выбран день', 'not' => true
			],
			
			[
				['birth_month'], 
				'match', 'pattern' => '/^0$/ui', 'message'=>'Не выбран месяц', 'not' => true
			],
			
			[
				['birth_year'], 
				'match', 'pattern' => '/^0$/ui', 'message'=>'Не выбран год', 'not' => true
			],

			[
				['username'], 
				'match', 'pattern' => '/^[a-z0-9]+$/ui', 'message'=>'Разрешены латинские буквы и цифры'
			],

			[
				['email'], 'email', 'message'=>'Неправильный формат email'
			],

			[
				['password1'], 'string', 'length' => [4], 'tooShort'=>'Количество символов должно быть больше 5'
			],

			[
				['password2'], 'compare', 'compareAttribute' => 'password1', 'message'=>'Пароли не совпадают'
			],

			[
				['username', 'email'], 'unique', 'message'=>'Поле должно быть уникальным'
			],

			[

				['avatar'], 'file',
				'extensions' => ['jpg','png', 'gif'],
				'maxSize' => 200*200,
				'wrongExtension' => 'Разрешены только файлы с этими расширениями: {extensions} .',
				'tooBig' => 'Размер файла не должен превышать {formattedLimit}.',

			]
	*/
		];
    }
	
	public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
		//$user->role = $this->role;
        $user->setPassword($this->password1);
        $user->generateAuthKey();

		$res = $user->save() ? $user : null;
		//$this->savingClient($user->id);

		return $res;

    }

	public function savingClient($user_id)
	{
		//echo '<pre>';print_r($this);exit;
		$upload = Yii::$app->basePath . '/web/images/mod_cabinet/clients';
		$this->avatar->saveAs($upload . '/' . $user_id . '.' . $this->avatar->extension);
		//https://prowebmastering.ru/yii2-ispolyzovanie-klassa-yii-imagine-image-primery.html

		$full_name = $this->full_name1.' '.$this->full_name2.' '.$this->full_name3;
		$birth_date = $this->birth_day.'-'.$this->birth_month.'-'.$this->birth_year;

		Yii::$app->db->createCommand()->insert('cab_users', [
			'user_id' => $user_id,
			'photo' => $user_id . '.' . $this->avatar->extension,
			'full_name' => $full_name,
			'birth_date' => $birth_date,
			'phone' => $this->phone

		])->execute();
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