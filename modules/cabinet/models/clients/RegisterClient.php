<?php

namespace app\modules\cabinet\models\clients;

//use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;
use app\models\User;
use yii\web\UploadedFile;

class RegisterClient extends ActiveRecord
//class EntryForm extends Model
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
	public $phone;
	//public $photo;
	public $file;
	//public $avatar;
	
	public static function tableName()
    {
        return '{{%user}}';
    }
	
    public function rules()
    {
		return [
			[
				['role', 'full_name1', 'full_name2', 'full_name3', 'username', 'email', 'password1', 'password2',
					'phone','file'],
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
				['password1'], 'string', 'length' => [6], 'tooShort'=>'Количество символов должно быть больше 5'
			],

			[
				['password2'], 'compare', 'compareAttribute' => 'password1', 'message'=>'Пароли не совпадают'
			],

			[
				['username', 'email'], 'unique', 'message'=>'Поле должно быть уникальным'
			],

			[

				['file'], 'file',
				'extensions' => ['jpg','png', 'gif'],
				'maxSize' => 200*200,
				'wrongExtension' => 'Разрешены только файлы с этими расширениями: {extensions} .',
				'tooBig' => 'Размер файла не должен превышать {formattedLimit}.',

			]
		
		];
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


		if($this->role == 'client') {
			$this->savingClient($user->id);
		}

		//print_r($user); echo $user->id; exit;
		//return $user->save() ? $user : null;
		return $res;

    }

	public function savingClient($user_id)
	{
		$upload = Yii::$app->basePath . '/web/images/mod_cabinet/clients';
		$this->file->saveAs($upload . '/' . $user_id . '.' . $this->file->extension);
		//https://prowebmastering.ru/yii2-ispolyzovanie-klassa-yii-imagine-image-primery.html

		$full_name = $this->full_name1.' '.$this->full_name2.' '.$this->full_name3;
		$birth_date = $this->birth_day.'-'.$this->birth_month.'-'.$this->birth_year;

		Yii::$app->db->createCommand()->insert('cab_users', [
			'user_id' => $user_id,
			'photo' => $user_id . '.' . $this->file->extension,
			'full_name' => $full_name,
			'birth_date' => $birth_date,
			'phone' => $this->phone

		])->execute();

		/*$db->setQuery("
			INSERT INTO #__cab_users
			(`user_id`,`full_name`,`photo`,`birth_date`,`phone`".$field_custom.")
			VALUES('$user_id','$full_name','$photo','$birth_date','$phone'".$data_custom.")
		");*/
	}

	public function savingAdmin($user_id)
	{

	}
	
}