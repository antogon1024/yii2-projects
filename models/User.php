<?php
namespace app\models;
     
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
     
/**
* User model
*
* @property integer $id
* @property string $username
* @property string $password_hash
* @property string $password_reset_token
* @property string $email
* @property string $auth_key
* @property integer $status
* @property integer $created_at
* @property integer $updated_at
* @property string $password write-only password
*/
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	
	//const ROLE_USER = 1;
	//const ROLE_MODER = 5;
	//const ROLE_ADMIN = 20;
     
    /**
    * @inheritdoc
    */

    public static function tableName()
    {
        return '{{user}}';
    }
     
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
      
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }
     
    //abstract
	public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
     
    //abstract
	public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
     
	//abstract
    public function getId() 
    {
        return $this->getPrimaryKey();
    }
    
	//abstract
    public function getAuthKey() 
    {
        return $this->auth_key;
    }
     
	//abstract 
    public function validateAuthKey($authKey) 
    {
        return $this->getAuthKey() === $authKey;
    }
	
	public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
     
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
     
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
     
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
     
}

