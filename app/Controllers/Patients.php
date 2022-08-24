<?php namespace App\Controllers;


class Patients extends BaseController
{
	
	public function index()
	{
		
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
}