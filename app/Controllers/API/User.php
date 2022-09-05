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
		$id=$this->request->getVar('id') ?? '';
		$name=$this->request->getVar('name') ?? ''; 
		$email=$this->request->getVar('email') ?? '';
		 switch($method){
			 case 'google':
				$exist=$UserModel->where('google_id',$id)->find();
				$google_id=$id; 
				$fb_id=''; 
				$apple_id=''; 
			break;
			case 'facebook':
				$exist=$UserModel->where('fb_id',$id)->find();
				$google_id=''; 
				$apple_id=''; 
					$fb_id=$id; 
			break;
			case 'apple':
				$exist=$UserModel->where('apple_id',$id)->find();
				$google_id='';
				$apple_id=$id; 				
				$fb_id=''; 
			break;
			 case 'email':$exist=array();
				 $email=$this->request->getVar('email');
				 $password=$this->request->getVar('password');
				$users = $UserModel
							->where('role', 'P')
							->where('email', $email)
							->where('password', md5($password))
							->findAll();
				
			 break;
		 }
		 
		 if(empty($exist) && $method!="email"){
			$password=rand(9999,99999999);
			$exist=$UserModel->where('email',$email)->find();
			
			if($method=='google'){
					$google_id=$id; 
					$apple_id='';
					$fb_id=''; 
				}
				elseif($method=='facebook'){
					$apple_id='';
					$google_id=''; 
					$fb_id=$id; 
				}
				else{
					$apple_id=$id; 
					$google_id=''; 
					$fb_id=''; 
				}
			if(empty($exist)){
				$user_id=$UserModel->add('P',$email,$password,$name,'yes','',$google_id,$fb_id,$apple_id);
			}
			else{
				
			
			 return $this->respond(array('error'=>true,'msg'=>lang('app.error_mail_exist')));
			
			}
			if(is_numeric($user_id) && $user_id>0){
				if(empty($exist)){
				$UserProfileModel->insert(array('user_id'=>$user_id,'email'=>$email,'nome'=>$name));
				}
				else{
					$exist_prof=$UserProfileModel->where('user_id',$user_id)->first();
					if(empty($exist_prof) || $exist_prof['id']==null) $UserProfileModel->insert(array('user_id'=>$user_id,'email'=>$email,'nome'=>$name));
					else $UserProfileModel->update($exist_prof['id'],array('user_id'=>$user_id,'email'=>$email,'nome'=>$name));
				}
				
				
				$data=array("id"=>$exist[0]['id'],"email"=>$exist[0]['email'],"mobile"=>$exist[0]['mobile'],"token"=>$exist[0]['token']);
				$inf_profile=$UserProfileModel->select('nome,cognome')->where('user_id',$data['id'])->first();
				$data=array_merge($data,$inf_profile ?? array());
				array_walk_recursive($data,function(&$item){$item=strval($item);});
				return $this->respond(array('error'=>false,"data"=>$data));
			}
			else{
				$res=array("status"=>"KO");
			}
			
		}
		elseif(!empty($exist) && $method!='email'){
			if($exist[0]['active']!='yes'){
				return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_active_account')));
			}
			else{
				$data=array("id"=>$exist[0]['id'],"email"=>$exist[0]['email'],"mobile"=>$exist[0]['mobile'],"token"=>$exist[0]['token']);
				$inf_profile=$UserProfileModel->select('nome,cognome')->where('user_id',$data['id'])->first();
				$data=array_merge($data,$inf_profile ?? array());
				array_walk_recursive($data,function(&$item){$item=strval($item);});
				return $this->respond(array('error'=>false,"data"=>$data));
			}
		}
		else{
		 
		 
			if(empty($users)){
				 return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_exist_account')));
			}
			elseif($users[0]['active']!='yes'){
				return $this->respond(array('error'=>true,'msg'=>lang('app.error_not_active_account')));
			}
			else{
				$data=array("id"=>$users[0]['id'],"email"=>$users[0]['email'],"mobile"=>$users[0]['mobile'],"token"=>$users[0]['token']);
				$inf_profile=$UserProfileModel->select('nome,cognome')->where('user_id',$data['id'])->first();
				$data=array_merge($data,$inf_profile ?? array());
				array_walk_recursive($data,function(&$item){$item=strval($item);});
				return $this->respond(array('error'=>false,"data"=>$data));
			}
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