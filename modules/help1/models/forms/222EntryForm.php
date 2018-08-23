<?php

namespace app\modules\help1\models;

use yii\base\Model;

class EntryForm extends Model
{
   // public $name;
	//public $login;
    //public $email;

    public function rules()
    {
        return [
            //[['name2', 'email'], 'required'],
			
			//['login', 'string', 'length' => [4, 8]],
            
			//['email', 'email'],
        ];
    }
}