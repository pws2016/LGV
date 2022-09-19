<?php namespace App\Controllers;
//use App\Models\UserModel;
//use App\Models\UserProfileModel;



class Authentification extends BaseController
{
	
	
	public function index()
	{  
		
		return view('dashboard',$data);
	} 
	
	public function loginAsGuest(){
		$common_data=$this->common_data();
		$data=$common_data;
		$exist=$this->UserModel->where('role', 'guest')->where('active', 'yes')->first();
		if(!empty($exist)){
			$this->session->set(array('user_data'=>$exist));
			$redirect_url='MyAccount';
			return redirect()->to( base_url($redirect_url) );
		}
		$data['error']=lang('app.error_not_exist_account');
		return view('login.php', $data);
	}
	public function login(){
		$common_data=$this->common_data();
		$data=$common_data;
		
		if($common_data['is_logged']==true){
				if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/admin/dashboard') );
				else return redirect()->to( base_url('/MyAccount') );
		}
		 $email=$this->request->getVar('login_email');
		 $password=$this->request->getVar('login_password');
		
		if(!is_null($this->request->getVar('login_email'))){
			$throttler = \Config\Services::throttler();

		// Checking login attempt 4 times in a minute
			$allowed = $throttler->check('login', 4, MINUTE);
			if ($allowed) {
				$val = $this->validate([
				   
					'login_email' =>['label' => 'email', 'rules' => 'required|valid_email'],
					'login_password' => ['label' => lang('app.field_password'), 'rules' =>'required']
				]);
				
				if (!$val)
				{
					
					return view('login.php', [
						   'validation' => $this->validator,'settings'=>$settings
					]);
				
				}
				else{
					$users = $this->UserModel
							->where('email', $email)
							->where('password', md5($password))
							->findAll();
				
					//	var_dump($users); exit;	
				 $url=uri_string();
					if(empty($users)){
						$error=lang('app.error_not_exist_account');
						 return view($url, [
						   'error' => $error,'settings'=>$settings
						]);
					}
					elseif($users[0]['active']!='yes'){
						 $error=lang('app.error_not_active_account');
						
						return view($url, ['error' => $error,'settings'=>$settings]);
					
					}
					else{
						
						/*$this->session->set(array('user_data'=>$users[0]));
						switch($users[0]['role']){
							case 'A':$redirect_url='admin/dashboard'; break;
							
							default:$redirect_url='MyAccount/dashboard';
						}
							$this->addUserLog($users[0]['id'],'login');
							*/
					$this->session->set(array('verifier_sms' => $users[0]));
					// creation code + save dans table smsauth
				/*	$sms_code = random_string("numeric", 6);
					$this->session->set(array('sms_code'=>$sms_code));
					$iat = time(); // current timestamp value
					$exp = $iat + 600;


					$insert = $this->UsersAuthSmsModel->insert(array(

						'code' => $sms_code,
						'user_id' => $users[0]['id'],
						'expired_at' => date('Y-m-d H:i', $exp)

					));*/



					$redirect_url = 'smsAuth';
						return redirect()->to( base_url($redirect_url) );
					}
				}
			}else{
				return redirect()->to( base_url('login') );
			}
			
		}
		echo view("login.php",$data);
	}
	
	public function smsAuth(){
		$common_data = $this->common_data();
		$settings = $common_data['settings'];
		$data = $common_data;
		if($this->request->getVar('action')!==null){
			switch($this->request->getVar('action')){
				case 'send':
					$sms_code = random_string("numeric", 6);
					$data['sms_code']=$sms_code; // to delete ag=fter end test
					//$this->session->set(array('sms_code'=>$sms_code));
					$iat = time(); // current timestamp value
					$exp = $iat + 600;


					$insert = $this->UsersAuthSmsModel->insert(array(

						'code' => $sms_code,
						'user_id' => $this->session->get('verifier_sms')['id'],
						'expired_at' => date('Y-m-d H:i', $exp)

					));
					$to=$this->request->getVar('mobile');
					if($to=='default'){
						$phonenumber=$this->session->get('verifier_sms')['mobile'];
					}
					else{
						$ll=$this->UsersMobileModel->where('user_id',$this->session->get('verifier_sms')['id'])->where('id',$to)->first();
						if(!empty($ll)) $phonenumber=$ll['mobile'];
						else $phonenumber=$this->session->get('verifier_sms')['mobile'];
					}
					
					// call arubaSMS here
					
					$data['success']=lang('app.success_send_sms')."<br/>CODE:".$sms_code;
					break;
				case 'validate':
				
					$s=$this->session->get('verifier_sms');
					$res = $this->UsersAuthSmsModel
					->where('user_id', $s['id'])
					->where('code',str_replace("-","",$this->request->getVar('code')))
					->find();
					
					if (empty($res)) {

						return view('smsAuth',array('error'=>"invalid code"));
					}
						
					else {

						
						$iat = time();
						
						if ($iat > strtotime($res[0]['expired_at'])) {

							return view('smsAuth',array('error'=>"expired code")); // code expiré
						}
						else{
						$this->session->set(array('user_data' => $s));
						switch($s['role']){
							case 'A':$redirect_url='admin/dashboard'; break;
							
							default:$redirect_url='MyAccount/dashboard';
						}
							$this->addUserLog($users[0]['id'],'login');
					
					return redirect()->to(base_url($redirect_url));
				}

				}
				break;
			}
		}
		$data['defaultphone']=$this->session->get('verifier_sms')['mobile'];
		$data['list_mobile']=$this->UsersMobileModel->where('user_id',$this->session->get('verifier_sms')['id'])->find();
		
		echo view('smsAuth.php',$data);
	}
/*	public function login(){
		$common_data=$this->common_data();
		$data=$common_data;
		
		if($common_data['is_logged']==true){
				if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/admin/dashboard') );
				else return redirect()->to( base_url('/MyAccount') );
		}
		 $email=$this->request->getVar('login_email');
		 $password=$this->request->getVar('login_password');
		
	if(!is_null($this->request->getVar('login_email'))){
		$throttler = \Config\Services::throttler();

		// Checking login attempt 4 times in a minute
        $allowed = $throttler->check('login', 4, MINUTE);
		if ($allowed) {
		$val = $this->validate([
           
            'login_email' =>['label' => 'email', 'rules' => 'required|valid_email'],
			'login_password' => ['label' => lang('app.field_password'), 'rules' =>'required']
        ]);
		
		if (!$val)
        {
			
            return view('login.php', [
                   'validation' => $this->validator,'settings'=>$settings
            ]);
		
        }
		elseif(!isset($_POST['g-recaptcha-response'])){
			$data['error']=lang('app.error_captcha');
		}
		else{
		$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			
			$recaptcha_response = $this->request->getVar('g-recaptcha-response');

			// Make and decode POST request:
			$recaptcha = file_get_contents($recaptcha_url . '?secret=' . CAPTCHA_SECRET . '&response=' . $recaptcha_response);
			$recaptcha = json_decode($recaptcha);

			// Take action based on the score returned:
			if ($recaptcha->score >= 0.9) {
				$users = $this->UserModel
							->where('email', $email)
							->where('password', md5($password))
							->findAll();
				
							
				 $url=uri_string();
				if(empty($users)){
					$error=lang('app.error_not_exist_account');
					 return view($url, [
					   'error' => $error,'settings'=>$settings
					]);
				}
				elseif($users[0]['active']!='yes'){
					 $error=lang('app.error_not_active_account');
					
					return view($url, ['error' => $error,'settings'=>$settings]);
				
				}
				else{
					
					$this->session->set(array('user_data'=>$users[0]));
					switch($users[0]['role']){
						case 'A':$redirect_url='admin/dashboard'; break;
						
						default:$redirect_url='MyAccount';
					}
						$this->addUserLog($users[0]['id'],'login');
					return redirect()->to( base_url($redirect_url) );
				}
			}else{
				$data['error']=lang('app.error_captcha');
			}
		}
		}else{
			return redirect()->to( base_url('login') );
		}
	}
		return view('login.php', $data);
	
	}*/
	
	public function register(){
		$common_data=$this->common_data();
		$data=$common_data;
		
		if($common_data['is_logged']==true && $common_data['user_data']['role']!='guest'){
				if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/admin/dashboard') );
				else return redirect()->to( base_url('/MyAccount') );
		}
		$throttler = \Config\Services::throttler();

		// Checking login attempt 4 times in a minute
        $allowed = $throttler->check('register', 4, MINUTE);
		if ($allowed) {
		$signup_email=$this->request->getVar('signup_email');
		$signup_password=$this->request->getVar('signup_password');
		$signup_password_confirmation=$this->request->getVar('signup_password_confirmation');
		if(!is_null($this->request->getVar('terms'))) $terms="yes"; else $terms="no";
		if(!is_null($this->request->getVar('newsletter'))) $newsletter="yes"; else $newsletter="no";
		
		$val = $this->validate([
			'signup_email' => ['label' => 'Email', 'rules' => 'trim|required|valid_email'],			
			'signup_password' => ['label' => 'Password', 'rules' => 'trim|required'],
			'signup_password_confirmation' => ['label' => lang('app.field_confirm_password'), 'rules' => 'trim|required|matches[signup_password]']
		]);
		
		if (!$val)
		{
				//var_dump($this->validator);
				$validation=$this->validator;
				$error_msg=$validation->listErrors();
				$data['error']=$error_msg;
		}
		elseif($terms=='no'){
			$data['error']=lang('app.error_terms');
		}
		elseif(!isset($_POST['g-recaptcha-response'])){
			$data['error']=lang('app.error_captcha');
		}
		else{
			$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			
			$recaptcha_response = $this->request->getVar('g-recaptcha-response');

			// Make and decode POST request:
			$recaptcha = file_get_contents($recaptcha_url . '?secret=' . CAPTCHA_SECRET . '&response=' . $recaptcha_response);
			$recaptcha = json_decode($recaptcha);

			// Take action based on the score returned:
			if ($recaptcha->score >= 0.9) {
				$ex_email=$this->UserModel->where('email',$signup_email)->findAll();
				if(!empty($ex_email)){
					$error_msg=lang('app.error_mail_exist');
					$data['error']=$error_msg;
				}
				//$data =['role'=>'customer', 'email' => $signup_email,'password'=> md5($signup_password),'display_name'=>$signup_email,'active'=>'no','token'=>'azeer'];
				else{helper('text');
						$token=random_string('alnum', 6);
						$user_id =$this->UserModel->add('customer',$signup_email,$signup_password,$signup_email,'no',$terms,'yes',$newsletter,$token);
						$ex=$this->UserModel->find($user_id);
						$this->UserProfileModel->insert(array('user_id'=>$user_id,'email'=>$signup_email));
						//$this->session->set(array('user_data'=>$ex));
						if($common_data['user_data']['role']=='guest'){
							$this->RequestsModel->update($this->session->get('request_id'),array('user_id'=>$user_id));
							$this->session->remove('user_data');
						}
					/*	$RequestsModel=new RequestsModel();
						if($this->session->get('request_id')!==null)
							$RequestsModel->update($this->session->get('request_id'),array("user_id"=>$ex['id'],'session_id'=>''));
						*/
						
						$redirect=base_url('login');
						$this->SendRegisterMail($user_id,$redirect);
					//	$this->SendTrackMail($user_id,$this->session->get('request_id'));
						$res=array("error"=>false,"validation"=>$user_id);
							$this->addUserLog($user_id,'register');
						$data['success']=lang('app.success_new_register');
				}
			} // end verifing captcha
			else $data['error']=lang('app.error_captcha');
		}
		}
		else{
			$data['error']=lang('app.error_throttler');
			return redirect()->to(base_url('login'));
		}
		return view('register.php', $data);
	}
	public function activateAccount($email,$token){
		$common_data=$this->common_data();
		$data=$common_data;
		if($common_data['is_logged']==true){
				if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/admin/dashboard') );
				else return redirect()->to( base_url('/MyAccount') );
		}
		$redirect=$this->request->getVar('redirect');
		
		
		$exist=$this->UserModel->where('token', $token)
						->where('email', $email)
						->find();
					
		if(empty($exist)){
			$data['error']=lang('app.error_activation_account');
			return redirect()->to( base_url());
		}
		else{
			$new_token=random_string('alnum', 6);
			$this->UserModel->activate($exist[0]['id'],"yes",$new_token);
			$ex=$this->UserModel->find($exist[0]['id']);
			$this->session->set(array('user_data'=>$ex));
			$data['success']=lang('app.success_activation_account');
			if($redirect!='') return redirect()->to( $redirect);
		}
		
	}
	
	public function forgotPassword(){
		$common_data=$this->common_data();
		$data=$common_data;
		if($common_data['is_logged']==true){
				if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/admin/dashboard') );
				else return redirect()->to( base_url('/MyAccount') );
		}
		 $uri = previous_url(false);
		
		$settings=$this->SettingModel->getByMetaKey();
		
		if(!is_null($this->request->getVar('login_email'))){
			$throttler = \Config\Services::throttler();

		// Checking login attempt 4 times in a minute
        $allowed = $throttler->check('forgot', 4, MINUTE);
		
		if ($allowed) {
			 $this->session->set(array('forgot_redirect'=>$this->request->getVar('redirect_url')));
			$val = $this->validate([
	
			'login_email' => ['label' => lang('app.field_email'), 'rules' => 'trim|required|valid_email'],			
			
		]);
			if (!$val)
			{
					
				$validation=$this->validator;
				$error=$validation->listErrors();
				$data['error']=$error;
			}
			elseif(!isset($_POST['g-recaptcha-response'])){
			$data['error']=lang('app.error_captcha');
			}
			else{
				$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			
			$recaptcha_response = $this->request->getVar('g-recaptcha-response');

			// Make and decode POST request:
			$recaptcha = file_get_contents($recaptcha_url . '?secret=' . CAPTCHA_SECRET . '&response=' . $recaptcha_response);
			$recaptcha = json_decode($recaptcha);

			if ($recaptcha->score >= 0.9) {
				$exist=$this->UserModel->where('email', $this->request->getVar('login_email'))->find();
				if(empty($exist)){
					$data['error']=lang('app.error_activation_account');
				}
				else{
					 $new_token=random_string('alnum', 12);
					$this->UserModel->edit($exist[0]['id'],array("token"=>$new_token));
					############## email #########################
					
					$email = \Config\Services::email();
					$subscribe_email=$this->request->getVar('login_email');
					
					$email->setFrom($settings['sender_email'],$settings['sender_name']);
				
					$email->setTo($subscribe_email);
					$link=base_url().'/resetPassword/'.$subscribe_email.'/'.$new_token;
					
					$temp=$this->TemplatesModel->where('module','forgot_pass')->find();
				
					$html=str_replace(array("{var_website_name}","{var_user_name}","{var_varification_link}"),
					array($settings['sender_name'],$exist[0]['display_name'],$link),
					$temp[0]['html']);
					$email->setSubject($temp[0]['subject']);
					$email->setMessage($html);
					$email->setAltMessage(strip_tags($html));
					$xxx=$email->send();
					
					//var_dump($email);
					$data['success']=lang('app.success_recuperate_password');
				}
			}else{
				$data['error']=lang('app.error_captcha');
			}
			}
		} else{
			return redirect()->to(base_url('login'));
		}
		}
		$data['redirect_url']=$uri;
		return view('forgot_password',$data);
	}
	
	public function resetPassword($email,$token){
		$common_data=$this->common_data();
		$data=$common_data;
	if($common_data['is_logged']==true){
				if($common_data['user_data']['role']=='A') return redirect()->to( base_url('/admin/dashboard') );
				else return redirect()->to( base_url('/MyAccount') );
		}
			$settings=$this->SettingModel->getByMetaKey();
		$data['redirect_url']=$this->session->get('forgot_redirect');
		
		$exist=$this->UserModel->where('token', $token)
						->where('email', $email)
						->find();
			
		if(empty($exist)){
			$data['error']=lang('app.error_reset_password');
		}
		else{
			if(!is_null($this->request->getVar('email'))){
				$throttler = \Config\Services::throttler();

		// Checking login attempt 4 times in a minute
        $allowed = $throttler->check('forgot', 4, MINUTE);
		
		if ($allowed) {
				
				$signup_password=$this->request->getVar('subscribe_password');
				$subscribe_confirm_password=$this->request->getVar('subscribe_confirm_password');
				
				$val = $this->validate([
				
					'subscribe_password' => ['label' => lang('app.field_password'), 'rules' => 'trim|required'],
					'subscribe_confirm_password' => ['label' => lang('app.field_confirm_password'), 'rules' => 'trim|required|matches[subscribe_password]']
				
				]);
				if (!$val)
				{
						//var_dump($this->validator);
						$validation=$this->validator;
						$data['error']=$validation->listErrors();
					
				}
				elseif(!isset($_POST['g-recaptcha-response'])){
				$data['error']=lang('app.error_captcha');
				}
				else{
					$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			
					$recaptcha_response = $this->request->getVar('g-recaptcha-response');

					// Make and decode POST request:
					$recaptcha = file_get_contents($recaptcha_url . '?secret=' . CAPTCHA_SECRET . '&response=' . $recaptcha_response);
					$recaptcha = json_decode($recaptcha);

					if ($recaptcha->score >= 0.9) {
						$exist=$this->UserModel->where('email', $this->request->getVar('email'))->find();
						if(empty($exist)){
							$data['error']=lang('app.error_activation_account');
						}
						else{
							$new_token=random_string('alnum', 12);
							$this->UserModel->edit($exist[0]['id'],array("password"=>md5($signup_password),'token'=>$new_token));
							$data['success']=lang('app.success_reset_password');
							if(!is_null($this->request->getVar('redirect_url')) && $this->request->getVar('redirect_url')!="") return redirect()->to( $this->request->getVar('redirect_url'));
							else return redirect()->to(base_url('login?success='.lang('app.success_reset_password')));
						}
					}
						else $data['error']=lang('app.error_captcha');
				}
		}else {
				return redirect()->to(base_url('login'));
			}
			}
			//$UserModel->activate($exist[0]['id'],"yes",$new_token);
			$data['exist']=$exist;
			
		}
		return view('reset_password',$data);
	}
	
	public function logout(){
		$this->session->remove('user_data');
			$this->session->destroy();
			
			return redirect()->to( base_url());
	}
}// end controller class