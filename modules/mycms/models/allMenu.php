<?php
namespace app\modules\mycms\models;

use Yii;
use yii\base\Model;
//use app\modules\mycms\models\allMenu;


//class allMenu extends CActiveRecord
class allMenu extends Model
{ 
	//public $tablePrefix = 'asd_';
	/*public $all;
	public $smenu;
	public $amenu;
	public $test=array();
	//public $prefix = 'abc_';
	public $tablePrefix = 'asd';
	//public $test;
	//public $test2;
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return "{{modules}}";
	}


	public function rules(){
        return array(
            array('test,all', 'required'),
           
        );
    }
	*/

	public function query1()
	{
		/*$rows = (new \yii\db\Query())
			->select(['id', 'email'])
			->from('user')
			->where(['last_name' => 'Smith'])
			->limit(10)
			->all();*/
			
		$rows = (new \yii\db\Query())
			->select(['id', 'name', 'position', 'status'])
			->from ('mcms_modules')
			->where(['mod_name' => 'menu'])
			->all();
		//echo '<pre>';
		//print_r($rows);
		//exit;
		/*
		$connection = Yii::app()->db;
		$sql="SELECT id,name,position,mstatus FROM {{modules}} WHERE mod_name='menu' ";
		$command=$connection->createCommand($sql);
		$rowCount=$command->query();
		*/
		//foreach($rowCount as $val) {
		foreach($rows as $val) {
		   $id=$val['id'];
		   $name=$val['name'];
		   $position=$val['position'];
		   $status=$val['status'];
		  
			/*$sql="SELECT count(*) FROM {{items}} WHERE name='$name'";
		 
			$command=$connection->createCommand($sql);
		  
			$row=$command->queryScalar();*/
			
			$menu[] = array('id'=>$id,'name'=>$name,'count'=>1,'position'=>$position,
			   'status'=>$status);
			
		}
		return $menu;
	}

	public function query2($name){
		$connection = Yii::app()->db;
		//найти id в items где name равно amenu
		$sql="SELECT id FROM {{items}} WHERE item in ($name)";
		$command=$connection->createCommand($sql);
		$row=$command->queryColumn();
		
		foreach($row as $val){
			$sql="DELETE FROM {{items}} WHERE parent_id='$val'";
			$command=$connection->createCommand($sql);
			$command->execute();
		}

		$sql="DELETE FROM {{items}} WHERE name in ($name) or item in ($name)";
		$command=$connection->createCommand($sql);
		$command->execute();
		return;
	}

	public function query3($id){
		$connection = Yii::app()->db;
		$sql="SELECT name FROM {{modules}} WHERE id='$id'";
        $command=$connection->createCommand($sql);
		$name=$command->queryScalar();

        if($name!='amenu'){
		    $sql="DELETE FROM {{modules}} WHERE id='$id'";
		    $command=$connection->createCommand($sql);
		    $rowCount=$command->execute();
		

		    $sql="DELETE FROM {{items}} WHERE name='$name'";
		    $command=$connection->createCommand($sql);
		    $command->execute();

		    return array(0=>$rowCount,1=>$name);
		}
	}
}