<?php namespace App\Controllers;


class StaffPanel extends BaseController
{
	
	public function index()
	{
			
		$common_data=$this->common_data();
		$data=$common_data;
		if($common_data['is_logged']==false) return redirect()->to( base_url('login'));
		if(!in_array($common_data['user_data']['role'],array("M","C"))) return redirect()->to( base_url('/') );
		$data['nb_patients']=$this->UserModel->where('role','P')->countAllResults();
		$data['nb_staff']=$this->UserModel->where('role','C')->orWhere('role','M')->countAllResults();	
		
		return view('dashboard',$data);
	}
	
	public function account()
	{
		
		
		$common_data=$this->common_data();
		$data=$common_data;
		
		
		if(!is_null($this->request->getVar('submit'))){
			$signup_email=$this->request->getVar('signup_email');
			$mobile=$this->request->getVar('code_mobile');
			$signup_password=$this->request->getVar('signup_password');
			$signup_password_confirmation=$this->request->getVar('signup_password_confirmation');
			$val = $this->validate([
			'signup_email' => ['label' => 'Email', 'rules' => 'trim|required|valid_email|is_unique[users.email,id,'.$common_data['user_data']['id'].']'],			
			'mobile'=>['label' => lang('app.field_mobile'), 'rules' => 'trim|required']
		]);
		if($signup_password!=""){
			$val = $this->validate([
			
			'signup_password_confirmation' => ['label' => lang('app.field_confirm_password'), 'rules' => 'trim|required|matches[signup_password]']
			]);
		}
			if (!$val)
			{
					//var_dump($this->validator);
					$validation=$this->validator;
					$error_msg=$validation->listErrors();
					$data['error']=$error_msg;
			}
			else{
					$dt['email']=$signup_email;
					$dt['mobile']=$mobile;
					if($signup_password!="")$dt['password']=md5($signup_password);
					$this->UserModel->edit($common_data['user_data']['id'],$dt);
					$data['success']=lang('app.success_update');
			
		}
		}
		$inf_user=$this->UserModel->find($common_data['user_data']['id']);
		$data['inf_user']=$inf_user;
		return view('account',$data);
	}

	public function multiaccess(){
		$common_data=$this->common_data();
		$data=$common_data;
		if($this->request->getVar('action')!==null){
			switch($this->request->getVar('action')){
				case 'add':
					$mobile=$this->request->getVar('code_mobile');
					if($mobile!=""){
						$this->UsersMobileModel->insert(array('user_id'=>$common_data['user_data']['id'],'mobile'=>$mobile));
						$data['success']=lang('app.success_add');
					}
				break;
				case 'delete':
					$user_to_delete=$this->request->getVar('user_to_delete');
					if($user_to_delete!=""){
						$this->UsersMobileModel->where('user_id',$common_data['user_data']['id'])->where('id',$user_to_delete)->delete();
						$data['success']=lang('app.success_delete');
					}
				break;
			}
		}
		$data['list']=$this->UsersMobileModel->where('user_id',$common_data['user_data']['id'])->find();
		return view('multiaccess',$data);
	}
	
	public function profile(){
		$common_data=$this->common_data();
		$data=$common_data;
		$user_id=$common_data['user_data']['id'];
		
		if($this->request->getVar('submit')!==null){
			
			
			
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
			//'logo'=>$logo_name,
			
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
			'esperto'=>$this->request->getVar('esperto'),
			'publication'=>$this->request->getVar('publication'),
			'experience'=>$this->request->getVar('experience'),
			'academic'=>$this->request->getVar('academic'),
			);
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
						$data_profile['logo']=$logo_name;
						
						}
						
			
			$inf_prof=$this->UserProfileModel->where('user_id',$user_id)->first();
			$this->UserProfileModel->update($inf_prof['id'],$data_profile);
			//var_dump($this->session->get('user_docs'));exit;
			if($this->request->getVar('delete_docs')!==null){
				foreach($this->request->getVar('delete_docs') as $k=>$d){
				
					$this->UserDocsModel->delete($d);
				}
			}
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
						
			
			$this->UserOfficesModel->where('user_id',$user_id)->delete();
		
			if($this->session->get('array_address')!==null){
				foreach($this->session->get('array_address') as $k=>$d){
					$this->UserOfficesModel->insert(array("user_id"=>$user_id,"title"=>$d['title'],"indirizzo"=>$d['indirizzo'],"provincia"=>$d['provincia'],"comune"=>$d['comune'],"cap"=>$d['cap'],"lat"=>$d['lat'],"lng"=>$d['lng'],"phone"=>$d['phone'],"email"=>$d['email']));
				}
			}	
			
			
			
			if(!empty($this->request->getVar('ids_family_to_delete'))){
				$this->ClinicTeamModel->whereIn('id', $this->request->getVar('ids_family_to_delete'))->delete();
			}
			
			if($common_data['user_data']['role']=='C' && !empty($this->request->getVar('list_team'))){
					
			
					
					
				foreach($this->request->getVar('list_team') as $k=>$v){
					
					if(isset($v['team_enable'])) $team_enable=1; else $team_enable=0;
					if($v['team_id']!=""){
						$tab_team=array("user_id"=>$user_id,"name"=>$v['team_name'],"description"=>$v['team_description'],"enable"=>$team_enable,'ids_specification'=>implode(",",$v['team_ids_speciality']?? array()),'ids_patologie'=>implode(",",$v['team_ids_patologie']?? array()));
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
								 $tab_team['image']=$team_image;
							  } 
					}
						$this->ClinicTeamModel->update($v['team_id'],$tab_team);
					}
					else{
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
				
					
					$this->ClinicTeamModel->insert(array("user_id"=>$user_id,"name"=>$v['team_name'],"description"=>$v['team_description'],"enable"=>$team_enable,"image"=>$team_image,'ids_specification'=>implode(",",$v['team_ids_speciality']?? array()),'ids_patologie'=>implode(",",$v['team_ids_patologie']?? array())));
					}
				}
			}
			
			
			
			if($this->session->get('array_address')!==null) $this->session->remove('array_address');
			if($this->session->get('user_docs')!==null) $this->session->remove('user_docs');
			$data['success']=lang('app.success_update');
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
			//	var_dump($list_address);		
		$this->session->set(array('array_address'=>$list_address));
		$data['array_address']=$list_address;	
		
		$data['list_team']=$this->ClinicTeamModel->where('user_id',$user_id)->find();
		return view('profile',$data);
	}
}