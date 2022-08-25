<?php namespace App\Controllers;


class Patients extends BaseController
{
	
	public function index()
	{
		$data=$this->common_data();
	if($this->request->getVar('action')!==null){
			switch($this->request->getVar('action')){
				case 'delete':
					$user_to_delete=$this->request->getVar('user_to_delete');
					if($user_to_delete!=""){
						$this->UserModel->edit($user_to_delete,array('deleted_at'=>date('Y-m-d H:i:s')));
						
						$data['success']=lang('app.success_delete');
					}
				break;
			}
		}
		if($this->request->getVar('search')!==null){
			
			$serach_email=$this->request->getVar('serach_email');
			if($serach_email!=""){
				$data['serach_email']=$serach_email;	
			} else $serach_email=null;
			
		
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
			
			
			$ll=$this->UserModel->patient_filter($serach_email,$search_cf,$search_piva,$search_nome,$search_cognome);
		}
		if(!empty($ll)){
		foreach($ll as $k=>$v){
			$list_offices=$this->UserOfficesModel->where('user_id',$v['user_id'])->find();
			$v['list_offices']=$list_offices;
			$list[]=$v;
		}
		}
		$data['list']=$list ?? array();
		return view('admin/patient_list',$data);
	}
	public function newP(){
		$common_data=$this->common_data();
		$data=$common_data;
		if($this->request->getVar('submit')!==null){
			if($this->request->getVar('active')!==null) $active="yes"; else $active="no";
			$display_name=$this->request->getVar('nome').' '.$this->request->getVar('cognome');
		
			$data_user=array(
			'active'=>$active,
			'role'=>'P',
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
			
			
			'description'=>$this->request->getVar('description'),
			'logo'=>$logo_name ?? '',
			
			'fattura_stato'=>$this->request->getVar('fattura_stato'),
			'fattura_provincia'=>$this->request->getVar('fattura_provincia'),
			'fattura_comune'=>$this->request->getVar('fattura_comune'),
			'fattura_indirizzo'=>$this->request->getVar('VIA_FATTURA'),
			'fattura_cap'=>$this->request->getVar('CAP_FATTURA'),
			'email'=>$this->request->getVar('EMAIL_FATTURA'),
			'fattura_pec'=>$this->request->getVar('PEC_FATTURA'),
			'fattura_sdi'=>$this->request->getVar('SDI'),
			
			);
			$this->UserProfileModel->insert($data_profile);
				return redirect()->to(base_url($common_data['prefix_route'].'/patients'))->with("success",lang('app.success_add'));
		}
	
		$data['list_nazione']=$this->NazioniModel->find();
		$data['list_provincia']=$this->ProvinceModel->orderBy('PROVINCIA','ASC')->find();
		
		return view('admin/patient_new',$data);
	}
	
	public function editP($user_id){
		$common_data=$this->common_data();
		$data=$common_data;
		if($this->request->getVar('submit')!==null){
			if($this->request->getVar('active')!==null) $active="yes"; else $active="no";
			$display_name=$this->request->getVar('nome').' '.$this->request->getVar('cognome');
		
			$data_user=array(
			'active'=>$active,
		
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
			
			
			'description'=>$this->request->getVar('description'),
			'logo'=>$logo_name ?? '',
			
			'fattura_stato'=>$this->request->getVar('fattura_stato'),
			'fattura_provincia'=>$this->request->getVar('fattura_provincia'),
			'fattura_comune'=>$this->request->getVar('fattura_comune'),
			'fattura_indirizzo'=>$this->request->getVar('VIA_FATTURA'),
			'fattura_cap'=>$this->request->getVar('CAP_FATTURA'),
			'email'=>$this->request->getVar('EMAIL_FATTURA'),
			'fattura_pec'=>$this->request->getVar('PEC_FATTURA'),
			'fattura_sdi'=>$this->request->getVar('SDI'),
			
			);
			$inf_prof=$this->UserProfileModel->where('user_id',$user_id)->first();
			$this->UserProfileModel->update($inf_prof['id'],$data_profile);
			//var_dump($this->session->get('user_docs'));exit;
			
			return redirect()->to(base_url($data['prefix_route'].'/patients'))->with("success",lang('app.success_update'));
		}
		
		$data['list_nazione']=$this->NazioniModel->find();		
		$data['list_provincia']=$this->ProvinceModel->orderBy('PROVINCIA','ASC')->find();
		
	
		
		$data['inf_staff']=$this->UserModel->find($user_id);
		$data['inf_staff_profile']=$this->UserProfileModel->where('user_id',$user_id)->first();
		if($data['inf_staff_profile']['residenza_provincia']!="") $data['list_comune']=$this->ComuniModel->where('PROV',$data['inf_staff_profile']['residenza_provincia'])->find();
		if($data['inf_staff_profile']['fattura_provincia']!="") $data['list_comune_fatt']=$this->ComuniModel->where('PROV',$data['inf_staff_profile']['fattura_provincia'])->find();
		
	
		$this->session->set(array('array_address'=>$list_address));
		$data['array_address']=$list_address;	
		return view('admin/patient_edit',$data);
	}
}