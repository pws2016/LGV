<?php namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\UserProfileModel;
class User extends ResourceController
{
    use ResponseTrait;
		protected $helpers = ['form','url','text'];	
    // get all product
    public function index()
    {
        $data=array();
		
        return $this->respond($data, 200);
    }
	
	public function login(){
		$UserModel=new UserModel();
		$UserProfileModel=new UserProfileModel();
		 $method=$this->request->getVar('method');
		 switch($method){
			 case 'email':
				 $email=$this->request->getVar('email');
				 $password=$this->request->getVar('password');
				$users = $UserModel
							->where('role', 'P')
							->where('email', $email)
							->where('password', md5($password))
							->findAll();
				
			 break;
		 }
		 
		if(empty($users)){
			 return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_exist_account')));
		}
		elseif($users[0]['active']!='yes'){
			return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_active_account')));
		}
		else{
			$data=array("id"=>$users[0]['id'],"email"=>$users[0]['email'],"mobile"=>$users[0]['mobile'],"token"=>$users[0]['token']);
			$inf_profile=$UserProfileModel->select('nome,cognome')->where('user_id',$data['id'])->first();
			$data=array_merge($data,$inf_profile);
			array_walk_recursive($data,function(&$item){$item=strval($item);});
			return $this->respond(array('error'=>false,"data"=>$data));
		}
	}
	
	public function register(){
		$UserModel=new UserModel();
		$UserProfileModel=new UserProfileModel();
		$method=$this->request->getVar('method');
		 switch($method){
			 case 'email':
				 $email=$this->request->getVar('email');
				 $mobile=$this->request->getVar('mobile');
				 $password=$this->request->getVar('password');
				 $nome=$this->request->getVar('nome');
				 $cognome=$this->request->getVar('cognome');
				 $validation = $this->validate([
						'nome' =>['label' => 'nome', 'rules' => 'trim|required'],
						'cognome' => ['label' => 'cognome', 'rules' => 'trim|required'],
						'password' => ['label' => 'Password', 'rules' => 'trim|required'],
						'mobile' => ['label' => 'Mobile', 'rules' => 'trim|required'],
						"email" =>['label' => 'Email', 'rules' => 'trim|required'],			
					]);

					if (!$validation) {
						return $this->respond(array('error'=>true,'msg'=>lang('app.error_required')));
						//return $this->failValidationErrors($this->validator->getErrors());
					}
				else{
					 $validation = $this->validate([
					 "email" =>['label' => 'Email', 'rules' => 'is_unique[users.email]'],			
					 ]);
					 if (!$validation) {
						return $this->respond(array('error'=>true,'msg'=>lang('app.error_mail_exist')));
						//return $this->failValidationErrors($this->validator->getErrors());
					}
					else{
						$token=random_string('alnum', 6);
						$user_id =$UserModel->insert(array("role"=>"P","active"=>"yes","email"=>$email,"password"=>md5($password),"mobile"=>$mobile,"active"=>"yes","token"=>$token,"created_at"=>date('Y-m-d H:i:s')));
						
						$UserProfileModel->insert(array('user_id'=>$user_id,'email'=>$signup_email,"nome"=>$nome,"cognome"=>$cognome));
						$data=array("id"=>$user_id,"email"=>$email,"mobile"=>$mobile,"token"=>$token,"nome"=>$nome,"cognome"=>$cognome);
						array_walk_recursive($data,function(&$item){$item=strval($item);});
						return $this->respond(array('error'=>false,"data"=>$data));
					}
				}
			 break;
		 }
	}
}