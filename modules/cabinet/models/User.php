<?php
namespace app\modules\cabinet\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property mixed password_hash
 * @property string auth_key
 */
class User extends ActiveRecord implements IdentityInterface
{
    
	const ROLE_ADMIN = 'root';
    const ROLE_USER = 'user';
	const ROLE_ATTORNEY = 'attorney';
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

	//----------------------------------------
    public function init()
    {
        //Yii::$app->db->tablePrefix = 'cab_';
    }

    public static function tableName()
    {
        return '{{user}}';
    }

    /**
     * @return array
     */
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
	//----------------------------------------------
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
	

	//------------------------------------------------------------------
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
 
}