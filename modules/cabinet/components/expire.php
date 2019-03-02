<?php
namespace app\modules\cabinet\components;
use \DateTime;
use Yii;

class Expire
{
	public function tariffExpire($dateExpire, $userId)
	{
		list($usec, $today_sec) = explode(" ",microtime());
		$curent = date ("Y-m-d", $today_sec);
		
		$first = DateTime::createFromFormat('Y-m-d', $dateExpire);
		$second = DateTime::createFromFormat('Y-m-d', $curent);
			
		if($second > $first){
			$db  = JFactory::getDbo();
			$db->setQuery("UPDATE #__cab_users SET `tariff`='',`payment`=0,`code`='',`code_active`=0 WHERE user_id = $userId");
			$db->execute();
			
			$db->setQuery("DELETE FROM #__cab_user_statistics  WHERE user_id = $userId");
			$db->execute();
			
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
			
			$db  = JFactory::getDbo();
			$db->setQuery("UPDATE #__cab_users SET `code`='',`code_active`=0 WHERE user_id = $user_id");
			$db->execute();
			return true;
		}else{
			return false;
		}
	}
}