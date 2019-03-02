<?php

namespace app\models\dao;

use Yii;
use yii\base\Model;

class Accesses extends Model
{
	
	public function init()
	{
		Yii::$app->db->tablePrefix = 'acs_';
	}
	
	public function getData()
    { 	
		
		
		//echo '<pre>';
		//print_r(Yii::$app->db);
		//exit;
		
		
		
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
		//echo $active_filter;exit;
		
		if($active_filter != 'no_filter'){
			$res = Yii::$app->db->createCommand("SELECT * FROM {{%access}} WHERE `group`=:group")
				->bindValue(':group', $active_filter)
				->queryAll();
		}else{
			$res = Yii::$app->db->createCommand('SELECT * FROM {{%access}}')
				->bindValue(':group', $active_filter)
				->queryAll();
		}
		//exit;	
		
		foreach($res as $k=>$v){
			$pass = $this->decrypt(trim($v['password']), 'fapostrof123');
			$res[$k]['password'] = $pass;
			if($active_filter == $v['group']){
				$active = $v['group'];
				$flag = 1;
			}
				
			//$filter[] = $v['group'];
		}
		
		$ar['data'] = $res;
		
		
		//$filter = array_unique($filter);
		//SELECT DISTINCT id_order FROM table
		$filter = Yii::$app->db->createCommand("SELECT DISTINCT `group` FROM {{%access}}")
				->queryAll();
		//echo '<pre>';
		//print_r($filter);
		//exit;
		
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
		
		//echo '<pre>';
		//print_r($ar);
		//exit;
		return $ar;
	
    }
	
	public function save()
	{
		$res = Yii::$app->db->createCommand('SELECT id FROM {{%access}} WHERE name=:name')
			->bindValue(':name', $_POST['name'])
		    ->queryOne();
			//print_r($res);exit;
		
		if($res == false){
			$params = [':name' => $_POST['name']];
			
			Yii::$app->db->createCommand()->insert('{{%access}}', [
				'name' => $_POST['name'],
				'login' => $_POST['login'],
				'password' => $this->encrypt($_POST['password'], 'fapostrof123'),
				'email' => $_POST['email'],
				'site' => $_POST['site'],
				'addition' => $_POST['addition'],
				'group' => $_POST['group'],
			])
			->execute();
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
	
}