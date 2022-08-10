<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SettingModel extends Model
{
    protected $table = 'setting';
	protected $primaryKey = 'id';
    protected $allowedFields = ['meta_key', 'meta_value','user_id'];
	protected $returnType = 'array';
	
	public function getByMetaKey($user_id='all'){
		$res=array();
		if($user_id=='all') $all=$this->findAll();
		elseif(is_null($user_id)) $all=$this->where('user_id IS NULL')->find();
		else $all=$this->where('user_id',$user_id)->find();
		foreach($all as $k=>$v){
			$res[$v['meta_key']]=$v['meta_value'];
		}
		return $res;
	}
	
}