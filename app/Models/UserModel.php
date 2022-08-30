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
	
	
	public function staff_filter($role=null,$email=null,$speciality=null,$patologie=null,$prestation=null,$cf=null,$piva=null,$nome=null,$cognome=null,$ragione=null){
		/** find data related to variables **/
		$db = \Config\Database::connect();
		$req="SELECT u.email as account_email, u.role ,p.*  FROM ".$this->table." as u,user_profile as p where u.deleted_at is NULL and u.id=p.user_id";
		if(!is_null($role)) $req.=" and u.role='".$role."'";
		elseif(is_null($role)) $req.=" and (u.role!='A' and u.role!='U')";
		if(!is_null($email)) $req.=" and u.email LIKE '%".$db->escapeLikeString($email)."%' ESCAPE '!'";	
		
		if(!is_null($speciality)) $req.=" and FIND_IN_SET('".$speciality."',p.ids_specification)>0";
		if(!is_null($patologie)) $req.=" and FIND_IN_SET('".$patologie."',p.ids_patologie)>0";
		if(!is_null($prestation)) $req.=" and FIND_IN_SET('".$prestation."',p.ids_prestation)>0";
		
		if(!is_null($cf)) $req.=" and p.fattura_cf=LIKE '%".$db->escapeLikeString($cf)."%' ESCAPE '!'";
		if(!is_null($piva)) $req.=" and p.fattura_piva=LIKE '%".$db->escapeLikeString($piva)."%' ESCAPE '!'";
		if(!is_null($nome)) $req.=" and p.nome=LIKE '%".$db->escapeLikeString($nome)."%' ESCAPE '!'";
		if(!is_null($cognome)) $req.=" and p.cognome=LIKE '%".$db->escapeLikeString($cognome)."%' ESCAPE '!'";
		if(!is_null($ragione)) $req.=" and p.ragione_sociale=LIKE '%".$db->escapeLikeString($ragione)."%' ESCAPE '!'";
		//echo $req;
		
		$query = $db->query($req);
		$results = $query->getResultArray();
		return $results;
	}
	public function patient_filter($email=null,$cf=null,$piva=null,$nome=null,$cognome=null){
		/** find data related to variables **/
		$db = \Config\Database::connect();
		$req="SELECT u.email as account_email, u.role ,p.*  FROM ".$this->table." as u,user_profile as p where u.deleted_at is NULL and u.id=p.user_id and u.role='P'";
	
		if(!is_null($email)) $req.=" and u.email LIKE '%".$db->escapeLikeString($email)."%' ESCAPE '!'";	
		
	
		
		if(!is_null($cf)) $req.=" and p.fattura_cf=LIKE '%".$db->escapeLikeString($cf)."%' ESCAPE '!'";
		if(!is_null($piva)) $req.=" and p.fattura_piva=LIKE '%".$db->escapeLikeString($piva)."%' ESCAPE '!'";
		if(!is_null($nome)) $req.=" and p.nome=LIKE '%".$db->escapeLikeString($nome)."%' ESCAPE '!'";
		if(!is_null($cognome)) $req.=" and p.cognome=LIKE '%".$db->escapeLikeString($cognome)."%' ESCAPE '!'";
		
		
		$query = $db->query($req);
		$results = $query->getResultArray();
		return $results;
	}
	
	public function searchApi($role=null,$speciality=null,$patologie=null,$prestation=null,$display_name=null){
		$db = \Config\Database::connect();
		//o.indirizzo ,o.provincia,o.comune,o.cap,o.lat,o.lng 
		//LEFT JOIN user_offices as o ON u.id = o.user_id		
		$req="SELECT 
		u.id,u.display_name , u.role ,
		p.nome,p.cognome,p.ragione_sociale,p.logo,p.tipologia,p.description,p.ids_specification,p.ids_patologie,p.ids_prestation
		
		FROM ".$this->table." as u 
		LEFT JOIN user_profile as p ON u.id = p.user_id	
		
		where u.active='yes' and deleted_at IS NULL";
		if(!is_null($role)) $req.=" and u.role='".$role."'";
		elseif(is_null($role)) $req.=" and (u.role!='A' and u.role!='U')";
		if(!is_null($speciality)) $req.=" and FIND_IN_SET('".$speciality."',p.ids_specification)>0";
		if(!is_null($patologie)) $req.=" and FIND_IN_SET('".$patologie."',p.ids_patologie)>0";
		if(!is_null($prestation)) $req.=" and FIND_IN_SET('".$prestation."',p.ids_prestation)>0";
		if(!is_null($display_name)) $req.=" and u.display_name like '%".$db->escapeLikeString($display_name)."%' ESCAPE '!'";
		//echo $req;
		$query = $db->query($req);
		$results = $query->getResultArray();
		return $results;
	}
}