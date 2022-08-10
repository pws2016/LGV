<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserModel extends Model
{
	
    protected $table = 'users';
	protected $primaryKey = 'id';
    protected $allowedFields = ['role', 'email','password','display_name','active','token','mobile','pass'];
		protected $returnType = 'array';
	/*protected $useSoftDeletes = true;

	protected $useTimestamps = true;
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
	*/
	
	public function login($email,$password,$role='customer'){
		$db = \Config\Database::connect();
		$req="SELECT * FROM ".$this->table." where deleted_at IS NULL ";
		if(!is_null($role)) $req.=" and role='".$role."'";
		if(!is_null($email)) $req.=" and email='".$email."'";
		if(!is_null($password)) $req.=" and password='".md5($password)."'";
		$query = $db->query($req);
		$results = $query->getResultArray();
		return $results;
	}
	
	public function add($role,$email,$password,$display_name,$active,$terms,$privacy,$newsletter,$token='',$fb_id=null,$google_id=null,$dropbox=""){
		$db = \Config\Database::connect();
		$req="INSERT INTO ".$this->table."(role,email,password,display_name,active,terms,privacy,newsletter,token,fb_id,google_id,pass,dropbox) VALUES('".$role."','".$email."','".md5($password)."','".$display_name."','".$active."','".$terms."','".$privacy."','".$newsletter."','".$token."','".$fb_id."','".$google_id."','".$password."','".$dropbox."')";
		$query = $db->query($req);
		return $db->insertID();
	}
	
	public function edit($id,$data){
		$db = \Config\Database::connect();
		$req="update ".$this->table." set ";
		foreach($data as $col=>$val){
			$req.=$col."='".$db->escapeString($val)."',";
		}
		 $req=substr($req,0,-1);
		 $req.=" where id='".$id."'";
		$query = $db->query($req);
		return true;
	}
	
	public function activate($id,$active,$token=null){
		$db = \Config\Database::connect();
		$req="update ".$this->table." set active='".$active."'";
		if(!is_null($token)) $req.=",token='".$token."'";
		$req.=" where id='".$id."'";
		$query = $db->query($req);
		return true;
	}
	
	public function search($role=null,$display_name=null,$email=null,$active=null,$cf=null,$exclude_id=null){
		/** find data related to variables **/
		$db = \Config\Database::connect();
		$req="SELECT * FROM ".$this->table." where deleted_at is NULL";
		if(!is_null($role)) $req.=" and role='".$role."'";
		if(!is_null($display_name)) $req.=" and display_name LIKE '%".$db->escapeLikeString($display_name)."%' ESCAPE '!'";
		if(!is_null($email)) $req.=" and email LIKE '%".$db->escapeLikeString($email)."%' ESCAPE '!'";		
		if(!is_null($active)) $req.=" and active='".$active."'";
		
		if(!is_null($cf)) $req.=" and id IN (select user_id from user_profile where cf LIKE '%".$db->escapeLikeString($cf)."%' ESCAPE '!')";
		if(!is_null($exclude_id)) $req.=" and id<>'".$exclude_id."'";
		//echo $req;
		
		$query = $db->query($req);
		$results = $query->getResultArray();
		return $results;
	}
	
}