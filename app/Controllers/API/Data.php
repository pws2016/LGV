<?php namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Models\UserOfficesModel;
use App\Models\UserDocsModel;
use App\Models\SpecificationsModel;
use App\Models\PatologieModel;
use App\Models\PrestationsModel;
use App\Models\ClinicTeamModel;
class Data extends ResourceController
{
    use ResponseTrait;
		protected $helpers = ['form','url','text'];	
    // get all product
    public function index()
    {
        $data=array();
		
        return $this->respond($data, 200);
    }
	public function get_filter_form(){
		$SpecificationsModel=new SpecificationsModel();
		$ll=$SpecificationsModel->select('id,title,description')->where('enable','1');
		if($this->request->getVar('id_specification')!==null)
			$ll=$SpecificationsModel->where('id',$this->request->getVar('id_specification'));
		$ll=$SpecificationsModel->find();
		array_walk_recursive($ll,function(&$item){$item=strval($item);});
		$data['specifications']=$ll;
		$ll=array();
		$PatologieModel=new PatologieModel();
		$ll=$PatologieModel->select('id,title')->where('enable','1');
		if($this->request->getVar('id_patologie')!==null)
			$ll=$PatologieModel->where('id',$this->request->getVar('id_patologie'));
		if($this->request->getVar('id_specification')!==null)
			$ll=$PatologieModel->where("FIND_IN_SET('".$this->request->getVar('id_specification')."',ids_specification)>0");
		$ll=$PatologieModel->find();
		array_walk_recursive($ll,function(&$item){$item=strval($item);});
		$data['patologie']=$ll;
		$ll=array();
		$PrestationsModel=new PrestationsModel();
		$ll=$PrestationsModel->select('id,title')->where('enable','1');
		if($this->request->getVar('id_prestation')!==null)
			$ll=$PrestationsModel->where('id',$this->request->getVar('id_prestation'));
		if($this->request->getVar('id_specification')!==null)
			$ll=$PrestationsModel->where("FIND_IN_SET('".$this->request->getVar('id_specification')."',ids_specification)>0");
		$ll=$PrestationsModel->find();
		array_walk_recursive($ll,function(&$item){$item=strval($item);});
		$data['prestations']=$ll;
		
		return $this->respond(array('error'=>false,"data"=>$data));
	}
	public function get_specifications(){
		$SpecificationsModel=new SpecificationsModel();
		$ll=$SpecificationsModel->select('id,title,description')->where('enable','1');
		if($this->request->getVar('id_specification')!==null)
			$ll=$SpecificationsModel->where('id',$this->request->getVar('id_specification'));
		$ll=$SpecificationsModel->find();
		array_walk_recursive($ll,function(&$item){$item=strval($item);});
		return $this->respond(array('error'=>false,"data"=>$ll));
	}
	
	public function get_patologie(){
		$PatologieModel=new PatologieModel();
		$ll=$PatologieModel->select('id,title')->where('enable','1');
		if($this->request->getVar('id_patologie')!==null)
			$ll=$PatologieModel->where('id',$this->request->getVar('id_patologie'));
		if($this->request->getVar('id_specification')!==null)
			$ll=$PatologieModel->where("FIND_IN_SET('".$this->request->getVar('id_specification')."',ids_specification)>0");
		$ll=$PatologieModel->find();
		array_walk_recursive($ll,function(&$item){$item=strval($item);});
		return $this->respond(array('error'=>false,"data"=>$ll));
	}
	
	public function get_prestations(){
		$PrestationsModel=new PrestationsModel();
		$ll=$PrestationsModel->select('id,title')->where('enable','1');
		if($this->request->getVar('id_prestation')!==null)
			$ll=$PrestationsModel->where('id',$this->request->getVar('id_prestation'));
		if($this->request->getVar('id_specification')!==null)
			$ll=$PrestationsModel->where("FIND_IN_SET('".$this->request->getVar('id_specification')."',ids_specification)>0");
		$ll=$PrestationsModel->find();
		array_walk_recursive($ll,function(&$item){$item=strval($item);});
		return $this->respond(array('error'=>false,"data"=>$ll));
	}
	
	public function search_medecin(){
		$UserModel=new UserModel();
		$UserProfileModel=new UserProfileModel();
		$UserOfficesModel=new UserOfficesModel();
		$SpecificationsModel=new SpecificationsModel();
		$PatologieModel=new PatologieModel();
		$PrestationsModel=new PrestationsModel();
	//	$ll=$UserModel->where('active','yes');
		$sarch_role=$this->request->getVar('sarch_role') ?? null;
		$search_specification=$this->request->getVar('search_specification') ?? null;
		$search_patologie=$this->request->getVar('search_patologie') ?? null;
		$search_prestation=$this->request->getVar('search_prestation') ?? null;
		$search_name=$this->request->getVar('search_name') ?? null;
		$ll=$UserModel->searchApi($sarch_role,$search_specification,$search_patologie,$search_prestation,$search_name);
		$res=array();
		if(!empty($ll)){
			foreach($ll as $k=>$v){
				if($v['logo']!="") $v['logo']=base_url('uploads/logo/'.$v['logo']);
				$str_pec=array();
				if($v['ids_specification']!=""){
					$tt=explode(",",$v['ids_specification']);
					foreach($tt as $kk=>$vv){
						$inf_spec=$SpecificationsModel->find($vv);
						$str_spec[]=$inf_spec['title'];
					}
					$v['specification']=implode(',',$str_spec);
				}
				
				$str_pat=array();
				if($v['ids_patologie']!=""){
					$tt=explode(",",$v['ids_patologie']);
					foreach($tt as $kk=>$vv){
						$inf_spec=$PatologieModel->find($vv);
						$str_pat[]=$inf_spec['title'];
					}
					$v['patologie']=implode(',',$str_pat);
				}
				
				$str_prest=array();
				if($v['ids_prestation']!=""){
					$tt=explode(",",$v['ids_prestation']);
					foreach($tt as $kk=>$vv){
						$inf_spec=$PrestationsModel->find($vv);
						$str_prest[]=$inf_spec['title'];
					}
					$v['prestation']=implode(',',$str_prest);
				}
				
				$str_offices=array();
				$list_offices=$UserOfficesModel->select('indirizzo,provincia,comune,cap')->where('user_id',$v['id'])->find();
			//	var_dump($list_offices); exit;
				if(!empty($list_offices)){
					foreach($list_offices as $kk=>$vv){
						$str_offices[]=$vv;
					}
				}
				$v['offices']=$str_offices;
				
				$res[]=$v;
			}
		}
	//	var_dump($res);
		array_walk_recursive($res,function(&$item){$item=strval($item);});
		return $this->respond(array('error'=>false,"data"=>$res));
	}
	
	public function profile($id){
		$UserModel=new UserModel();
		$UserProfileModel=new UserProfileModel();
		$UserOfficesModel=new UserOfficesModel();
		$SpecificationsModel=new SpecificationsModel();
		$PatologieModel=new PatologieModel();
		$PrestationsModel=new PrestationsModel();
		$UserDocsModel=new UserDocsModel();
		$ClinicTeamModel=new ClinicTeamModel();
		$verify=$UserModel->where('active','yes')->where('id',$id)->first();
		if(empty($verify))  return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_exist_profile')));
		else{
			$v=$UserProfileModel->where('user_id',$id)->first();
			if(empty($v))  return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_exist_profile')));
			$v['id']=$v['user_id'];
			
			
			$v['role']=$verify['role'];
			if($v['logo']!="") $v['logo']=base_url('uploads/logo/'.$v['logo']);
				$str_pec=array();
				if($v['ids_specification']!=""){
					$tt=explode(",",$v['ids_specification']);
					foreach($tt as $kk=>$vv){
						$inf_spec=$SpecificationsModel->find($vv);
						$str_spec[]=$inf_spec['title'];
					}
					$v['specification']=implode(',',$str_spec);
				}
				
				$str_pat=array();
				if($v['ids_patologie']!=""){
					$tt=explode(",",$v['ids_patologie']);
					foreach($tt as $kk=>$vv){
						$inf_spec=$PatologieModel->find($vv);
						$str_pat[]=$inf_spec['title'];
					}
					$v['patologie']=implode(',',$str_pat);
				}
				
				$str_prest=array();
				if($v['ids_prestation']!=""){
					$tt=explode(",",$v['ids_prestation']);
					foreach($tt as $kk=>$vv){
						$inf_spec=$PrestationsModel->find($vv);
						$str_prest[]=$inf_spec['title'];
					}
					$v['prestation']=implode(',',$str_prest);
				}
				
				$str_offices=array();
				$list_offices=$UserOfficesModel->select('indirizzo,provincia,comune,cap')->where('user_id',$v['id'])->find();
			//	var_dump($list_offices); exit;
				if(!empty($list_offices)){
					foreach($list_offices as $kk=>$vv){
						$str_offices[]=$vv;
					}
				}
				$v['offices']=$str_offices;
				
				$cv=$UserDocsModel->where('user_id',$id)->where('type','cv')->first();
				if(!empty($cv)) $v['cv']=base_url('uploads/medecin_doc/'.$cv['doc']); else $v['cv']="";
				
				$v['team']=array();
				if($verify['role']=='C'){
					$list_team=$ClinicTeamModel->where('user_id',$id)->where('enable',1)->find();
					if(!empty($list_team)){
						foreach($list_team as $kk=>$vv){
							if($vv['image']!="") $vv['image']=base_url('uploads/teams/'.$vv['image']);
							$v['team'][]=$vv;
						}
					}
				}
				
				unset($v['user_id']);
				unset($v['fattura_piva']);
				unset($v['fattura_cf']);
				unset($v['fattura_stato']);
				unset($v['fattura_provincia']);
				unset($v['fattura_comune']);
				unset($v['fattura_indirizzo']);	
				unset($v['fattura_cap']);
				unset($v['fattura_pec']);
				unset($v['fattura_sdi']);
				unset($v['fattura_phone']);
				unset($v['fattura_nome']);
				unset($v['fattura_cognome']);
				unset($v['fattura_type']);
				unset($v['fattura_sesso']);
				unset($v['fattura_birthdate']);
				unset($v['ids_specification']);
				unset($v['ids_patologie']);
				unset($v['ids_prestation']);
				$res[]=$v;
				
				array_walk_recursive($res,function(&$item){$item=strval($item);});
				return $this->respond(array('error'=>false,"data"=>$res));
		}
	}
}