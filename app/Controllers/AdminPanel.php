<?php namespace App\Controllers;


class AdminPanel extends BaseController
{
	
	public function index()
	{
		
		
		$common_data=$this->common_data();
		$data=$common_data;
		if($common_data['is_logged']==false) return redirect()->to( base_url('login'));
		if($common_data['user_data']['role']!='A') return redirect()->to( base_url('/myAccount') );
		$data['nb_patients']=$this->UserModel->where('role','P')->countAllResults();
		$data['nb_staff']=$this->UserModel->where('role','C')->orWhere('role','M')->countAllResults();	
		
		return view('admin/dashboard',$data);
	}
	
	public function profile()
	{
		
		
		$common_data=$this->common_data();
		$data=$common_data;
		if($common_data['is_logged']==false) return redirect()->to( base_url('login'));
		if($common_data['user_data']['role']!='A') return redirect()->to( base_url('/myAccount') );
		
		if(!is_null($this->request->getVar('submit'))){
			$signup_email=$this->request->getVar('signup_email');
			$mobile=$this->request->getVar('mobile');
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
		return view('admin/profile',$data);
	}

	public function overview(){
		$common_data=$this->common_data();
		$data=$common_data;
		
		if($common_data['is_logged']==false) return redirect()->to( base_url('login'));
		if($common_data['user_data']['role']!='A') return redirect()->to( base_url('/myAccount') );
		$selected_project=$this->session->get('selected_project');
		
		$data['tot_requests']=$this->RequestsModel->where('project_id',$selected_project['id'])->countAllResults();
		return view('admin/overview',$data);
	}
			
}//end class
