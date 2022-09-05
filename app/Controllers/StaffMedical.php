<?php namespace App\Controllers;


class StaffMedical extends BaseController
{
	
	public function index()
	{
		$data=$this->common_data();
		$data['list_speciality']=$this->SpecificationsModel->orderBy('title','ASC')->find();
		$data['list_patologie']=$this->PatologieModel->orderBy('title','ASC')->find();
		$data['list_prestation']=$this->PrestationsModel->orderBy('title','ASC')->find();
		$data['list_structure_sanitaire']=$this->StructureSanitaireModel->orderBy('title','ASC')->find();
		$data['list_ordre_prof']=$this->OrdreProfessionelModel->orderBy('title','ASC')->find();
		$data['list_ordre_city']=$this->OrdreCityModel->orderBy('title','ASC')->find();
		if($this->request->getVar('action')!==null){
			switch($this->request->getVar('action')){
				case 'delete':
					$user_to_delete=$this->request->getVar('user_to_delete');
					if($user_to_delete!=""){
						$this->UserModel->edit($user_to_delete,array('deleted_at'=>date('Y-m-d H:i:s')));
						$x=$this->UserOfficesModel->where('user_id',$user_to_delete)->delete();
						$data['success']=lang('app.success_delete');
					}
				break;
			}
		}
		if($this->request->getVar('search')!==null){
			$search_role=$this->request->getVar('search_role');
			if($search_role!=""){
				$data['search_role']=$search_role;	
			} else $search_role=null;
			
			$serach_email=$this->request->getVar('serach_email');
			if($serach_email!=""){
				$data['serach_email']=$serach_email;	
			} else $serach_email=null;
			
			$search_speciality=$this->request->getVar('search_speciality');
			if($search_speciality!=""){
				$data['search_speciality']=$search_speciality;	
			} else $search_speciality=null;
			
			$search_patologie=$this->request->getVar('search_patologie');
			if($search_patologie!=""){
				$data['search_patologie']=$search_patologie;	
			} else $search_patologie=null;
			
			$search_prestation=$this->request->getVar('search_prestation');
			if($search_prestation!=""){
				$data['search_prestation']=$search_prestation;	
			} else $search_prestation=null;
			
			$search_cf=$this->request->getVar('search_cf');
			if($search_cf!=""){
				$data['search_cf']=$search_cf;	
			} else $search_cf=null;
			
			$search_piva=$this->request->getVar('search_piva');
			if($search_piva!=""){
				$data['search_piva']=$search_piva;	
			} else $search_piva=null;
			
			$search_nome=$this->request->getVar('search_nome');
			if($search_nome!=""){
				$data['search_nome']=$search_nome;	
			} else $search_nome=null;
			
			$search_cognome=$this->request->getVar('search_cognome');
			if($search_cognome!=""){
				$data['search_cognome']=$search_cognome;	
			} else $search_cognome=null;
			
			$search_company=$this->request->getVar('search_company');
			if($search_company!=""){
				$data['search_company']=$search_company;	
			} else $search_company=null;
			
			$ll=$this->UserModel->staff_filter($search_role,$serach_email,$search_speciality,$search_patologie,$search_prestation,$search_cf,$search_piva,$search_nome,$search_cognome,$search_company);
		}
		if(!empty($ll)){
		foreach($ll as $k=>$v){
			$list_offices=$this->UserOfficesModel->where('user_id',$v['user_id'])->find();
			$v['list_offices']=$list_offices;
			$list[]=$v;
		}
		}
		$data['list']=$list ?? array();
		return view('admin/staff_list',$data);
	}
	
	public function newStaff(){
		$common_data=$this->common_data();
		$data=$common_data;
	//
		if($this->request->getVar('submit')!==null){
			
	
			if($this->request->getVar('active')!==null) $active="yes"; else $active="no";
			$display_name=$this->request->getVar('nome').' '.$this->request->getVar('cognome');
			if($this->request->getVar('role')=='C') $display_name=$this->request->getVar('ragione_sociale');
			$data_user=array(
			'active'=>$active,
			'role'=>$this->request->getVar('role'),
			'email'=>$this->request->getVar('email'),
			'mobile'=>$this->request->getVar('mobile'),
			'display_name'=>$display_name,
			'password'=>md5(random_string())
			);
			$user_id=$this->UserModel->insert($data_user);
			
			 $validated = $this->validate([
							'logo' => [
								'uploaded[logo]',
								'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png]',
								'max_size[logo,4096]',
							],
						]);
				
						if ($validated) { 
							$avatar_logo = $this->request->getFile('logo');
							 $logo_name = $avatar_logo->getRandomName();
							
							$avatar_logo->move(ROOTPATH.'public/uploads/logo/',$logo_name);
						
						
						}
						else {
							$logo_name=null;
					
						}
			
			
			$data_profile=array("user_id"=>$user_id,
			'nome'=>$this->request->getVar('nome'),
			'cognome'=>$this->request->getVar('cognome'),
			'ragione_sociale'=>$this->request->getVar('ragione_sociale'),
			'telefono'=>$this->request->getVar('telefono'),
			'fattura_cf'=>$this->request->getVar('fattura_cf'),
			'fattura_piva'=>$this->request->getVar('fattura_piva'),
			'fattura_sesso'=>$this->request->getVar('fattura_sesso'),
			'nascita_data'=>$this->request->getVar('nascita_data'),
			'residenza_stato'=>$this->request->getVar('residenza_stato'),
			'residenza_provincia'=>$this->request->getVar('residenza_provincia'),
			'residenza_comune'=>$this->request->getVar('residenza_comune'),
			'residenza_indirizzo'=>$this->request->getVar('VIA_CLIENTE'),
			'residenza_cap'=>$this->request->getVar('CAP_CLIENTE'),
			//'email'=>$this->request->getVar('CIVICO_CLIENTE'),
			'tipologia'=>$this->request->getVar('tipologia'),
			'ordre_prof'=>$this->request->getVar('ordre_prof'),
			'structure_sanitaire'=>$this->request->getVar('structure_sanitaire'),
			'ordre_city'=>$this->request->getVar('ordre_city'),
			'ordre_num'=>$this->request->getVar('ordre_num'),
			'ids_specification'=>implode(",",$this->request->getVar('to_speciality') ?? array()),
			'ids_patologie'=>implode(",",$this->request->getVar('to_patologie') ?? array()),
			'ids_prestation'=>implode(",",$this->request->getVar('to_prestation') ?? array()),
			'description'=>$this->request->getVar('description'),
			'logo'=>$logo_name ?? '',
			
			'fattura_stato'=>$this->request->getVar('fattura_stato'),
			'fattura_provincia'=>$this->request->getVar('fattura_provincia'),
			'fattura_comune'=>$this->request->getVar('fattura_comune'),
			'fattura_indirizzo'=>$this->request->getVar('VIA_FATTURA'),
			'fattura_cap'=>$this->request->getVar('CAP_FATTURA'),
			'fattura_nome'=>$this->request->getVar('fattura_nome'),
			'fattura_IBAN'=>$this->request->getVar('fattura_IBAN'),
			'email'=>$this->request->getVar('EMAIL_FATTURA'),
			'fattura_pec'=>$this->request->getVar('PEC_FATTURA'),
			'fattura_sdi'=>$this->request->getVar('SDI'),
			'title'=>$this->request->getVar('title'),
			);
			$this->UserProfileModel->insert($data_profile);
			//var_dump($this->session->get('user_docs'));exit;
			if($this->session->get('user_docs')!==null){
				foreach($this->session->get('user_docs') as $k=>$d){
				
					$this->UserDocsModel->insert(array("user_id"=>$user_id,"type"=>'doc',"doc"=>$d));
				}
			}
			
			 $validated = $this->validate([
							'cv' => [
								'uploaded[cv]',
								'mime_in[cv,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
								'max_size[cv,4096]',
							],
						]);
				
						if ($validated) { 
							$avatar_logo = $this->request->getFile('cv');
							 $cv = $avatar_logo->getRandomName();
							
							$avatar_logo->move(ROOTPATH.'public/uploads/medecin_doc/',$cv);
						$this->UserDocsModel->insert(array("user_id"=>$user_id,"type"=>'cv',"doc"=>$cv));
						
						}
						
			
			
			if($this->session->get('array_address')!==null){
				foreach($this->session->get('array_address') as $k=>$d){
					$this->UserOfficesModel->insert(array("user_id"=>$user_id,"indirizzo"=>$d['IND_FORNITURA'],"provincia"=>$d['PROV_FORNITURA'],"comune"=>$d['LOCALITA_FORNITURA'],"cap"=>$d['CAP_FORNITURA'],"lat"=>$d['lat'],"lng"=>$d['lng'],"phone"=>$d['PHONE_FORNITURA'],"email"=>$d['EMAIL_FORNITURA']));
				}
			}	
		
			if($this->request->getVar('role')=='C' && !empty($this->request->getVar('list_team'))){
					
			
					
					
				foreach($this->request->getVar('list_team') as $k=>$v){
					
					if(isset($v['team_enable'])) $team_enable=1; else $team_enable=0;
					
					$team_image=$_FILES["list_team"]['name'][$k]['team_image'] ?? '';
			
					if($team_image!=""){
							$target_dir = ROOTPATH."public/uploads/team/";
							$target_file = $target_dir . basename($_FILES["list_team"]['name'][$k]['team_image']);
							$uploadOk = 1;
							$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						
						
							  $check = getimagesize($_FILES["list_team"]['tmp_name'][$k]['team_image']);
							  if($check !== false) {
								
								 $team_image=random_string('alnum',16).".".$imageFileType;
								 move_uploaded_file($_FILES["list_team"]['tmp_name'][$k]['team_image'],$target_dir.$team_image);
							  } else {
								$team_image="";
							  }
					}
				
					
					$this->ClinicTeamModel->insert(array("user_id"=>$user_id,"name"=>$v['team_name'],"description"=>$v['team_description'],"enable"=>$team_enable,"image"=>$team_image));
				}
			}
			
			
			if($this->session->get('array_address')!==null) $this->session->remove('array_address');
			if($this->session->get('user_docs')!==null) $this->session->remove('user_docs');
			return redirect()->to(base_url($common_data['prefix_route'].'/staffMedical'))->with("success",lang('app.success_add'));
		}
		if($this->session->get('array_address')!==null) $this->session->remove('array_address');
		if($this->session->get('user_docs')!==null) $this->session->remove('user_docs');
		$data['list_nazione']=$this->NazioniModel->find();
		$data['list_speciality']=$this->SpecificationsModel->where('enable',1)->orderBy('title','ASC')->find();
		$data['list_patologie']=$this->PatologieModel->where('enable',1)->orderBy('title','ASC')->find();
		$data['list_prestation']=$this->PrestationsModel->where('enable',1)->orderBy('title','ASC')->find();
		$data['list_structure_sanitaire']=$this->StructureSanitaireModel->orderBy('title','ASC')->find();
		$data['list_ordre_prof']=$this->OrdreProfessionelModel->orderBy('title','ASC')->find();
		$data['list_ordre_city']=$this->OrdreCityModel->orderBy('title','ASC')->find();
		$data['list_provincia']=$this->ProvinceModel->orderBy('PROVINCIA','ASC')->find();
		$array_address=$this->session->get('array_address') ?? array();		
		$data['array_address']=$array_address ?? array();
		return view('admin/staff_new',$data);
	}
	
	public function editStaff($user_id){
			$common_data=$this->common_data();
		$data=$common_data;
	//var_dump($_FILES);
		if($this->request->getVar('submit')!==null){
			if($this->request->getVar('active')!==null) $active="yes"; else $active="no";
			$display_name=$this->request->getVar('nome').' '.$this->request->getVar('cognome');
			if($this->request->getVar('role')=='C') $display_name=$this->request->getVar('ragione_sociale');
			$data_user=array(
			'active'=>$active,
			'role'=>$this->request->getVar('role'),
			'email'=>$this->request->getVar('email'),
			'mobile'=>$this->request->getVar('mobile'),
			'display_name'=>$display_name,
			
			);
			$this->UserModel->edit($user_id,$data_user);
			
			 $validated = $this->validate([
							'logo' => [
								'uploaded[logo]',
								'mime_in[logo,image/jpg,image/jpeg,image/gif,image/png]',
								'max_size[logo,4096]',
							],
						]);
				
						if ($validated) { 
							$avatar_logo = $this->request->getFile('logo');
							 $logo_name = $avatar_logo->getRandomName();
							
							$avatar_logo->move(ROOTPATH.'public/uploads/logo/',$logo_name);
						
						
						}
						else {
							$logo_name=null;
					
						}
			
			
			$data_profile=array("user_id"=>$user_id,
			'nome'=>$this->request->getVar('nome'),
			'cognome'=>$this->request->getVar('cognome'),
			'ragione_sociale'=>$this->request->getVar('ragione_sociale'),
			'telefono'=>$this->request->getVar('telefono'),
			'fattura_cf'=>$this->request->getVar('fattura_cf'),
			'fattura_piva'=>$this->request->getVar('fattura_piva'),
			'fattura_sesso'=>$this->request->getVar('fattura_sesso'),
			'nascita_data'=>$this->request->getVar('nascita_data'),
			'residenza_stato'=>$this->request->getVar('residenza_stato'),
			'residenza_provincia'=>$this->request->getVar('residenza_provincia'),
			'residenza_comune'=>$this->request->getVar('residenza_comune'),
			'residenza_indirizzo'=>$this->request->getVar('VIA_CLIENTE'),
			'residenza_cap'=>$this->request->getVar('CAP_CLIENTE'),
			//'email'=>$this->request->getVar('CIVICO_CLIENTE'),
			'tipologia'=>$this->request->getVar('tipologia'),
			'ordre_prof'=>$this->request->getVar('ordre_prof'),
			'structure_sanitaire'=>$this->request->getVar('structure_sanitaire'),
			'ordre_city'=>$this->request->getVar('ordre_city'),
			'ordre_num'=>$this->request->getVar('ordre_num'),
			'ids_specification'=>implode(",",$this->request->getVar('to_speciality') ?? array()),
			'ids_patologie'=>implode(",",$this->request->getVar('to_patologie') ?? array()),
			'ids_prestation'=>implode(",",$this->request->getVar('to_prestation') ?? array()),
			'description'=>$this->request->getVar('description'),
			'logo'=>$logo_name ?? '',
			
			'fattura_stato'=>$this->request->getVar('fattura_stato'),
			'fattura_provincia'=>$this->request->getVar('fattura_provincia'),
			'fattura_comune'=>$this->request->getVar('fattura_comune'),
			'fattura_indirizzo'=>$this->request->getVar('VIA_FATTURA'),
			'fattura_cap'=>$this->request->getVar('CAP_FATTURA'),
			'fattura_nome'=>$this->request->getVar('fattura_nome'),
			'fattura_IBAN'=>$this->request->getVar('fattura_IBAN'),
			'email'=>$this->request->getVar('EMAIL_FATTURA'),
			'fattura_pec'=>$this->request->getVar('PEC_FATTURA'),
			'fattura_sdi'=>$this->request->getVar('SDI'),
			'title'=>$this->request->getVar('title'),
			);
			$inf_prof=$this->UserProfileModel->where('user_id',$user_id)->first();
			$this->UserProfileModel->update($inf_prof['id'],$data_profile);
			//var_dump($this->session->get('user_docs'));exit;
			if($this->session->get('user_docs')!==null){
				foreach($this->session->get('user_docs') as $k=>$d){
				
					$this->UserDocsModel->insert(array("user_id"=>$user_id,"type"=>'doc',"doc"=>$d));
				}
			}
			
			 $validated = $this->validate([
							'cv' => [
								'uploaded[cv]',
								'mime_in[cv,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
								'max_size[cv,4096]',
							],
						]);
				
						if ($validated) { 
							$avatar_logo = $this->request->getFile('cv');
							 $cv = $avatar_logo->getRandomName();
							
							$avatar_logo->move(ROOTPATH.'public/uploads/medecin_doc/',$cv);
						$this->UserDocsModel->insert(array("user_id"=>$user_id,"type"=>'cv',"doc"=>$cv));
						
						}
						
			
			
			if($this->session->get('array_address')!==null){
				foreach($this->session->get('array_address') as $k=>$d){
					$this->UserOfficesModel->insert(array("user_id"=>$user_id,"indirizzo"=>$d['IND_FORNITURA'],"provincia"=>$d['PROV_FORNITURA'],"comune"=>$d['LOCALITA_FORNITURA'],"cap"=>$d['CAP_FORNITURA'],"lat"=>$d['lat'],"lng"=>$d['lng'],"phone"=>$d['PHONE_FORNITURA'],"email"=>$d['EMAIL_FORNITURA']));
				}
			}	
			if($this->session->get('array_address')!==null) $this->session->remove('array_address');
			if($this->session->get('user_docs')!==null) $this->session->remove('user_docs');
			return redirect()->to(base_url($data['prefix_route'].'/staffMedical'))->with("success",lang('app.success_update'));
		}
		if($this->session->get('array_address')!==null) $this->session->remove('array_address');
		if($this->session->get('user_docs')!==null) $this->session->remove('user_docs');
		$data['list_nazione']=$this->NazioniModel->find();
		$data['list_speciality']=$this->SpecificationsModel->where('enable',1)->orderBy('title','ASC')->find();
		$data['list_patologie']=$this->PatologieModel->where('enable',1)->orderBy('title','ASC')->find();
		$data['list_prestation']=$this->PrestationsModel->where('enable',1)->orderBy('title','ASC')->find();
		$data['list_structure_sanitaire']=$this->StructureSanitaireModel->orderBy('title','ASC')->find();
		$data['list_ordre_prof']=$this->OrdreProfessionelModel->orderBy('title','ASC')->find();
		$data['list_ordre_city']=$this->OrdreCityModel->orderBy('title','ASC')->find();
		$data['list_provincia']=$this->ProvinceModel->orderBy('PROVINCIA','ASC')->find();
		
		$array_address=$this->session->get('array_address') ?? array();		
		$data['array_address']=$array_address ?? array();
		
		$data['inf_staff']=$this->UserModel->find($user_id);
		$data['inf_staff_profile']=$this->UserProfileModel->where('user_id',$user_id)->first();
		if($data['inf_staff_profile']['residenza_provincia']!="") $data['list_comune']=$this->ComuniModel->where('PROV',$data['inf_staff_profile']['residenza_provincia'])->find();
		if($data['inf_staff_profile']['fattura_provincia']!="") $data['list_comune_fatt']=$this->ComuniModel->where('PROV',$data['inf_staff_profile']['fattura_provincia'])->find();
		$data['docs']=$this->UserDocsModel->where('user_id',$user_id)->where('type','doc')->find();
		$res_adr=array();
		 $list_address=$this->UserOfficesModel->where('user_id',$user_id)->find();
						
		$this->session->set(array('array_address'=>$list_address));
		$data['array_address']=$list_address;	
		return view('admin/staff_edit',$data);
		
	}
}?>