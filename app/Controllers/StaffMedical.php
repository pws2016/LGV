<?php namespace App\Controllers;


class StaffMedical extends BaseController
{
	
	public function index()
	{
		
	}
	
	public function newStaff(){
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
			'email'=>$this->request->getVar('EMAIL_FATTURA'),
			'fattura_pec'=>$this->request->getVar('PEC_FATTURA'),
			'fattura_sdi'=>$this->request->getVar('SDI'),
			
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
			if($this->session->get('array_address')!==null) $this->session->remove('array_address');
			if($this->session->get('user_docs')!==null) $this->session->remove('user_docs');
			return redirect()->to(base_url($prefix_route.'/staffMedical'))->with("success",lang('app.success_add'));
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
}?>