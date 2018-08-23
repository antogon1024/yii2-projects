<?php

namespace app\modules\cabinet\models\clubs;

//use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;
use app\models\User;
use yii\web\UploadedFile;
use yii\imagine\Image;

class RegisterClub extends ActiveRecord
//class EntryForm extends Model
{
	public $role;
	public $name;
	public $email;
	public $username;
	public $password1;
	public $password2;
	public $contacts;
	public $address;
	public $logo;



	public static function tableName()
    {
        return '{{%user}}';
    }
	
    public function rules()
    {
		return [
			[
				['role', 'name', 'email', 'password1', 'password2',
					'contacts', 'address','logo'],
				'required', 'message'=>'Поле не должно быть пустым'
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
				['logo'], 'file', 'extensions' => ['jpg','png', 'gif'],
				//'maxSize' => 222*222,
				'wrongExtension' => 'Разрешены только файлы с этими расширениями: {extensions} .',
				'tooBig' => 'The file "{logo}" is too big. Its size cannot exceed {formattedLimit}.',
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

		//if($this->role == 'client') {
			$this->savingClub($user->email, $user->id);
		//}

		return $res;
    }

	public function savingClub($email, $id)
	{
		$upload = Yii::$app->basePath . '/web/images/mod_cabinet/clubs';
		$this->logo->saveAs($upload . '/' . $id . '.' . $this->logo->extension);
$image = $upload.'/1.jpg';
		Image::thumbnail($image, 12, 12)
			->save($upload.'/1a.jpg', ['quality' => 80]);


		Yii::$app->db->createCommand()->insert('cab_clubs', [
			'name' => $this->name,
			'admin' => $email,
			'icon' => $id . '.' . $this->logo->extension,
			'create' => date("Y-m-d"),
			'contacts' => $this->contacts,
			'address' => $this->address,
		])->execute();


	}

	/*public function savingAdmin($user_id)
	{

	}*/
	
}