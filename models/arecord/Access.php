<?php

namespace app\models\arecord;

use Yii;
use yii\db\ActiveRecord;

class Access extends ActiveRecord
{
	public function init()
	{
		Yii::$app->db->tablePrefix = 'acs_';
	}
	
	public static function tableName()
    {
		return '{{%access}}';
    }
	
	public function getData()
    { 	
		$session = Yii::$app->session;
		if($_POST){
			$session['active_filter'] = $_POST['filter'];
			$active_filter = $_POST['filter'];
		}else if( isset($session['active_filter']) ){
			$active_filter = $session['active_filter'];
		}else{
			$active_filter = 'no_filter';
		}
		
		$active = '';
		$flag = 0;
		
		if($active_filter != 'no_filter'){	
			$res = Access::find()
				->where('`group`=:group', [':group' => $active_filter])
				->all();
		}else{
			$res = Access::find()
				->all();
		}

		foreach($res as $k=>$v){
			$pass = $this->decrypt(trim($v['password']), 'fapostrof123');
			$res[$k]['password'] = $pass;
			if($active_filter == $v['group']){
				$active = $v['group'];
				$flag = 1;
			}
		}
		
		$ar['data'] = $res;
	
		$filter = Access::find('DISTINCT `group`')
			->all();
		
		if($flag == 1)
			$ar['filter'][] = array('name'=>'Без фильтра','value'=>'no_filter','active'=>0);
		else
			$ar['filter'][] = array('name'=>'Без фильтра','value'=>'no_filter','active'=>1);
		
		foreach($filter as $v){
			if($v['group'] == $active)
				$ar['filter'][] = array('name'=>$v['group'],'value'=>$v['group'],'active'=>1);
			else
				$ar['filter'][] = array('name'=>$v['group'],'value'=>$v['group'],'active'=>0);
		}
		
		return $ar;
    }
	
	public function add()
	{
		$res = Access::find('id')
			->where('name=:name', [':name' => $_POST['name']])
			->one();
		
		if($res == false){ 
			$access = new Access();
			
			$access->name = $_POST['name'];
			$access->login = $_POST['login'];
			$access->password = $this->encrypt($_POST['password'], 'fapostrof123');
			$access->email = $_POST['email'];
			$access->site = $_POST['site'];
			$access->addition = $_POST['addition'];
			$access->group = $_POST['group'];
			
			$access->save();
		}
	}
	
	function decrypt($encrypted, $key) {
		$ekey = hash('SHA256', $key, true);
		$iv = base64_decode(substr($encrypted, 0, 22) . '==');
		$encrypted = substr($encrypted, 22);
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $ekey, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0\4");
		$hash = substr($decrypted, -32);
		$decrypted = substr($decrypted, 0, -32);
		if (md5($decrypted) != $hash) return false;
		return $decrypted;
	}
	
	function encrypt($decrypted, $key) {
		$ekey = hash('SHA256', $key, true);
		srand(); $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
		if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) return false;
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $ekey, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
		return $iv_base64 . $encrypted;
	}
/*
php 7
https://www.codeblogbt.com/archives/464410

$key = "anotherpassword1";
$str = "does it work 12";

$enc = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $str."\1", MCRYPT_MODE_ECB);
$dec = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $enc, MCRYPT_MODE_ECB);
echo(bin2hex($enc).PHP_EOL);
var_dump($dec);

$enc = openssl_encrypt($str, 'bf-ecb', $key, true);
$dec = openssl_decrypt($enc, 'bf-ecb', $key, true);
echo(bin2hex($enc).PHP_EOL);
var_dump($dec);
*/	
}