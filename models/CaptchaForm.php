<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CaptchaForm extends Model
{
    public $string1;
	public $string2;
    public $email;
	public $verifyCode;
	public $date1;

    public function rules()
    {
        return [
           [
				['string1', 'string2', 'email'], 'required', 'message'=>'Поле не может быть пустым'],
				
				['string1', 'string', 'length' => [3, 4],
					'tooShort'=>'Поле {attribute} должно содержать не менее {min} символов.',
					'tooLong'=>'Поле {attribute} должно содержать не более {max} символов.',
				],
				
				['string2', 'string', 'length' => 5,
					'notEqual'=>'Поле {attribute} должно содержать 5 символов.',
				],
			
				['email','email','message'=>'Некоректный e-mail адрес'],
				
				[['date1'], 'required'],
				[['date1'], 'safe'],
				['date1', 'date', 'format' => 'yyyy-M-d'],
				//['verifyCode', 'captcha', 'captchaAction' => \yii\helpers\Url::toRoute('/help1/forms')],
				//['verifyCode', 'captcha', 'captchaAction' => \yii\helpers\Url::toRoute('/help1/forms')],
				['verifyCode', 'captcha'],
        ];
    }
}