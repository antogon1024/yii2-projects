<?php

namespace app\modules\help1\models;

use Yii;
use yii\base\Model;
//class EntryForm extends \yii\db\ActiveRecord
class EntryForm2 extends Model
{
    public $string1;
	public $string2;
    public $email;
	public $comparePassword1;
	public $comparePassword2;
	public $age;
	public $avatar;
	//public $date1;
	//public $default_value;
	public $verifyCode;

    public function rules()
    {
		return [
           [
				['string1', 'string2', 'email', 'comparePassword1', 'comparePassword2'], 
				'required', 'message'=>'Поле не может быть пустым'
			],
				
			[['string1', 'comparePassword1', 'comparePassword2'], 'string', 'length' => [3, 4],
				'tooShort'=>'Поле {attribute} должно содержать не менее {min} символов.',
				'tooLong'=>'Поле {attribute} должно содержать не более {max} символов.',
			],
				
			['string2', 'string', 'length' => 5,
				'notEqual'=>'Поле {attribute} должно содержать 5 символов.',
			],
			
			['email','email','message'=>'Некоректный e-mail адрес'],
			
			['comparePassword2', 'compare', 'compareAttribute' => 'comparePassword1'],
			
			['age', 'compare', 'compareValue' => 30, 'operator' => '>=', 'type' => 'number',
			'message' => 'Возраст должен быть больше или равен {compareValueOrAttribute}'],
			
			['avatar', 'file', 'extensions' => ['rng', 'jpg', 'gif'], 'maxSize' => 10*10,/*'skipOnEmpty' => false,*/
				'wrongExtension' => 'Разрешены только файлы с этими расширениями: {extensions} .',
				'tooBig' => 'The file is too big.'
			],
			
			
			//['age', 'default', 'value' => 42],
			//['default1', 'default', 'value' => 'asd'],
			//[ ['default_value'], 'default', 'value' => 'DEFAULT VALUE'],
			
			['verifyCode', 'captcha', 'message' => 'Код подтверждения неверен.'],
			
			
        ];
    }
}