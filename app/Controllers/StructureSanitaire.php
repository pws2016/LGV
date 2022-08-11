<?php namespace App\Controllers;


class StructureSanitaire extends BaseController
{
	
	public function index()
	{
		
			
		$common_data=$this->common_data();
		$data=$common_data;
	
		if($this->request->getVar('action')!==null){
			switch($this->request->getVar('action')){
				case 'add':
			
					if($this->request->getVar('title')!=""){
					$tab=array('title'=>$this->request->getVar('title')
					);
					
						$x=$this->StructureSanitaireModel->insert($tab);
						
						$data['success']=lang('app.success_add');
					}
					else $data['error']=lang('app.error_required');
				break;
				case 'edit':
				
					if($this->request->getVar('title')!=""){
						
					$tab=array('title'=>$this->request->getVar('title'),
					);
						$this->StructureSanitaireModel->update($this->request->getVar('id'),$tab);
						$data['success']=lang('app.success_update');
					}
					else $data['error']=lang('app.error_required');
				break;
				case 'delete':
					$user_to_delete=$this->request->getVar('user_to_delete');
					if($user_to_delete!=""){
						$this->StructureSanitaireModel->where('id',$user_to_delete)->delete();
						$data['success']=lang('app.success_delete');
					}
				break;
			}
		}
		$ll=$this->StructureSanitaireModel;
		if($this->request->getVar('search')!==null){
			$st=$this->request->getVar('search_text');
			if($st!=""){
				$data['search_text']=$st;
				$ll=$this->StructureSanitaireModel->like('title',$st);
			}
			
		}
		$ll=$this->StructureSanitaireModel->find();
		
		$data['list']=$ll;
		
		return view('admin/structure_sanitaire',$data);
	}
	
	public function update(){
		$id=$this->request->getVar('id');
		$inf=$this->StructureSanitaireModel->find($id);
		
		ob_start();?>
		<input type="hidden" name="id" value="<?php echo $inf['id']?>">
			<div class="row mb-4">
							<label for="horizontal-email-input" class="col-sm-3 col-form-label"><?php echo lang('app.field_title')?> <code>*</code></label>
							<div class="col-sm-9">
								<?php $input = [
	'type'  => 'text',
	'name'  => 'title',
	'id'    => 'title',
	'class' => 'form-control',
'required'=>true,
"value"=>$inf['title']
];

							echo form_input($input);?>
							</div>
						</div>
					
						<?php
			$html=ob_get_clean();
			$token = csrf_hash();
			$res=array("html"=>$html,'csrf'=>$token);
			echo json_encode($res,true);
	}
}//end class
