<?php

namespace app\modules\cabinet\models\clients;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

//use yii\data\Pagination;
//use app\modules\cabinet\components\expire;
use \DateTime;

//class Clubs extends ActiveRecord
class MyTariff extends Model
{
    public function init()
    {
        Yii::$app->db->tablePrefix = 'cab_';
    }

    public static function tableName()
    {
        return '{{%tariffs}}';
    }

    public function getData()
    {
		$data = array();
		//print_r(Yii::$app->user->identity);
		//echo Yii::$app->user->identity->id;
		//exit;
		$user_id = Yii::$app->user->identity->id;
		$email = Yii::$app->user->identity->email;
		
		$ar_user = (new \yii\db\Query())
            ->select(['*'])
            ->from('{{%users}}')
			->where(['user_id' => $user_id])
            ->one();

		if($ar_user['tariff'] != '') {
			$ar_date = explode('-', $ar_user['start']);
			$ar_user['start1'] = $ar_date[0] . $ar_date[1] . $ar_date[2];
			$ar_user['start2'] = $ar_date[2] . '.' . $ar_date[1] . '.' . $ar_date[0];

			$ar_date = explode('-', $ar_user['end']);
			$ar_user['end1'] = $ar_date[0] . $ar_date[1] . $ar_date[2];
			$ar_user['end2'] = $ar_date[2] . '.' . $ar_date[1] . '.' . $ar_date[0];
		}
		$ar_user['freeze_flag'] = 0;
			
		if($ar_user['freeze_start'] == false)
			$ar_user['freeze_flag'] = 0;
			
		$ar_start = explode('-', $ar_user['freeze_start']);
		$ar_end = explode('-', $ar_user['freeze_end']);
			
		$ar_user['freeze_start1'] = $ar_start[2].'.'.$ar_start[1].'.'.$ar_start[0];
		$ar_user['freeze_end1'] = $ar_end[2].'.'.$ar_end[1].'.'.$ar_end[0];
			
		$sec_freeze_start = mktime( 0, 0, 0, $ar_start[1], $ar_start[2], $ar_start[0] );
		$sec_freeze_end = mktime( 0, 0, 0, $ar_end[1], $ar_end[2], $ar_end[0] );
				
		list($usec, $today_sec) = explode(" ",microtime()); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$today = date ("Y-m-d", $today_sec);	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$ar_today = explode('-', $today);
		$today_sec = mktime( 0, 0, 0, $ar_today[1], $ar_today[2], $ar_today[0] );
			
		if($sec_freeze_start <= $today_sec && $sec_freeze_end >= $today_sec)
			$ar_user['freeze_flag'] = 1;
		
		// проверка истечения срока действия тарифа
		//$helper = new Expire;
		if($ar_user['payment'] == 1){
			$expire = $this->tariffExpire( $ar_user['end'], $user_id );
			
			if($expire === true){
				$ar_user['payment'] = 0;
				$ar_user['tariff'] = '';
			}
		}
			
		if($ar_user['code'] != ''){
			$expire = $this->codeExpire( $ar_user['code_expire'], $ar_user['code'], $user_id );
		}
		
		$data['user'] = $ar_user;
		$data['user']['email'] = $email;
		
		//$db->setQuery("SELECT * FROM #__cab_tariffs");
		//$results  =  $db->loadAssocList();
		$results = (new \yii\db\Query())
            ->select(['*'])
            ->from('{{%tariffs}}')
            ->all();
		
		$ar = array();
		
		foreach($results as $k=>$v){
			$ar[$v['name']] = $v;
			
			$num = $v['duration'] % 10;
			$num1 = substr($v['duration'], 0, -1);
			$num1 = (int)$num1 % 10;

			if($num == 1) $ar[$v['name']]['month'] = 'месяц';
			else if(($num == 2 || $num == 3 || $num == 4) && $num1 != 1) $ar[$v['name']]['month'] = 'месяца';
			else $ar[$v['name']]['month'] = 'месяцев';
			
			$num = $v['access'] % 10;
			$num1 = substr($v['access'], 0, -1);
			$num1 = (int)$num1 % 10;

			if($num == 1) $ar[$v['name']]['club'] = 'клубу';
			else $ar[$v['name']]['club'] = 'клубам';
			
			$num = $v['visits']%10;
			$num1 = substr($v['visits'],0,-1);
			$num1 = $num1%10;
			if($num == 1) $ar[$v['name']]['num'] = 'раза';
			else $ar[$v['name']]['num'] = 'раз';
			
			if($v['name'] == $data['user']['tariff'])
				$ar[$v['name']]['active'] = 1;
			else
				$ar[$v['name']]['active'] = 0;
		}	
	
		$data['tariffs'] = $ar;
		
		//echo '<pre>';
		//print_r($data);
		//print_r($ar_user);
        //$db->setQuery("SELECT * FROM #__cab_users WHERE user_id = $user_id");
		//exit;
		return $data;
    }

	public function tariffExpire($dateExpire, $user_id)
	{
		list($usec, $today_sec) = explode(" ",microtime());
		$curent = date ("Y-m-d", $today_sec);

		$first = DateTime::createFromFormat('Y-m-d', $dateExpire);
		$second = DateTime::createFromFormat('Y-m-d', $curent);

		if($second > $first){
			//$db  = JFactory::getDbo();
			//$db->setQuery("UPDATE #__cab_users SET `tariff`='',`payment`=0,`code`='',`code_active`=0 WHERE user_id = $userId");
			//$db->execute();

			Yii::$app->db->createCommand()
				->update('{{%users}}',
					['tariff' => '', 'payment' => 0, 'code' => '','code_active' => 0],
					'user_id = '.$user_id)
				->execute();

			//$db->setQuery("DELETE FROM #__cab_user_statistics  WHERE user_id = $userId");
			//$db->execute();

			Yii::$app->db->createCommand()->delete('{{%user_statistics}}', 'user_id = '.$user_id)->execute();

			return true;
		}else{
			return false;
		}
	}

	public function codeExpire( $dateExpire, $code, $user_id )
	{
		list($usec, $sec) = explode(" ",microtime());
		$curent = date ("Y-m-d H:i:s", $sec);

		$first = DateTime::createFromFormat('Y-m-d H:i:s', $dateExpire);
		$second = DateTime::createFromFormat('Y-m-d H:i:s', $curent);

		if($second > $first){
			//echo Yii::$app->basePath;exit;
			$path = Yii::$app->basePath.'/web/data/cabinet/free_codes.txt';
			$str = file_get_contents($path);
			$str .= $code.',';

			$file = fopen($path, "w");
			fputs ( $file, $str);
			fclose ($file);

			$path = Yii::$app->basePath.'/web/data/cabinet/busy_codes.txt';
			$str = file_get_contents($path);
			$str = str_replace($code.',', '', $str);

			$file = fopen($path, "w");
			fputs ( $file, $str);
			fclose ($file);

			//$db  = JFactory::getDbo();
			//$db->setQuery("UPDATE #__cab_users SET `code`='',`code_active`=0 WHERE user_id = $user_id");
			//$db->execute();

			Yii::$app->db->createCommand()
				->update('{{%users}}', ['code' => '','code_active' => 0], 'user_id='.$user_id)
				->execute();
			return true;
		}else{
			return false;
		}
	}

	public function menuHeader()
	{
		$key = 'client_'.Yii::$app->user->identity->email;
		$cache = Yii::$app->cache;


		$ar = $cache->getOrSet($key, function () {
			$ar['user']['user_id'] = Yii::$app->user->identity->id;

			$res = (new \yii\db\Query())
				->select(['photo','full_name'])
				->from('{{%users}}')
				->where(['user_id' => $ar['user']['user_id']])
				->one();

			$ar['user']['photo'] = $res['photo'];
			$ar['user']['full_name'] = $res['full_name'];
			return $ar;
		});

		return $ar;
	}

}