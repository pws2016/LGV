<?php namespace App\Controllers;


class Speciality extends BaseController
{
	
	public function index()
	{
		
			
		$common_data=$this->common_data();
		$data=$common_data;
	
		if($this->request->getVar('action')!==null){
			switch($this->request->getVar('action')){
				case 'add':
			
					if($this->request->getVar('title')!=""){
						if(null !== $this->request->getVar('enable')) $enable=1; else $enable=0;
						$slug= url_title($this->request->getVar('title'), 'dash', true);
					$tab=array('title'=>$this->request->getVar('title'),
					'description'=>$this->request->getVar('description'),
					'enable'=>$enable,
					'slug'=>$slug);
					
						$x=$this->SpecificationsModel->insert($tab);
						
						$data['success']=lang('app.success_add');
					}
					else $data['error']=lang('app.error_required');
				break;
				case 'edit':
				
					if($this->request->getVar('title')!=""){
						if(null !== $this->request->getVar('enable')) $enable=1; else $enable=0;
					$tab=array('title'=>$this->request->getVar('title'),
					'description'=>$this->request->getVar('description'),
					'enable'=>$enable);
						$this->SpecificationsModel->update($this->request->getVar('id'),$tab);
						$data['success']=lang('app.success_update');
					}
					else $data['error']=lang('app.error_required');
				break;
				case 'delete':
					$user_to_delete=$this->request->getVar('user_to_delete');
					if($user_to_delete!=""){
						$this->SpecificationsModel->where('id',$user_to_delete)->delete();
						$data['success']=lang('app.success_delete');
					}
				break;
			}
		}
		$ll=$this->SpecificationsModel;
		if($this->request->getVar('search')!==null){
			$st=$this->request->getVar('search_text');
			if($st!=""){
				$data['search_text']=$st;
				$ll=$this->SpecificationsModel->like('title',$st);
			}
			$st=$this->request->getVar('search_patologie');
			if($st!=""){
				$data['search_patologie']=$st;
				$ids=array();
				$ll_patologie=$this->PatologieModel->like('title',$st)->find();
				if(!empty($ll_patologie)){
					foreach($ll_patologie as $k=>$v){
						$ids=array_merge($ids,explode(',',$v['ids_specification']));
					}
					array_unique($ids, SORT_NUMERIC );
				}
			
				if(!empty($ids)) $ll=$this->SpecificationsModel->whereIn('id',$ids);
				
			}
		}
		$ll=$this->SpecificationsModel->find();
		foreach($ll as $k=>$v){
				$tt=$this->PatologieModel->where("FIND_IN_SET('".$v['id']."',ids_specification) >0")->find();
				$str="";
			if(!empty($tt)){
				foreach($tt as $kk=>$vv){	
					$str.=$vv['title'].",";
				}
				$str=substr($str,0,-1);
			}
			$v['patologie']=$str;
			$res[]=$v;
		}
		$data['list']=$res;
		return view('admin/specification',$data);
	}
	
	public function update(){
		$id=$this->request->getVar('id');
		$inf=$this->SpecificationsModel->find($id);
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
						<div class="row mb-4">
							<label for="horizontal-email-input" class="col-sm-3 col-form-label"><?php echo lang('app.field_description')?> </label>
							<div class="col-sm-9">
								<?php $input = [
	
	'name'  => 'description',
	'id'    => 'description',
	'class' => 'form-control',
"value"=>$inf['description']

];

								echo form_textarea($input,$inf['description']);?>
							</div>
						</div>
						<div class="row mb-4">
							<div class="form-group">
                                                            
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="formrow-customCheck" name="enable" <?php if($inf['enable']>0) echo 'checked'?>>
									<label class="form-check-label" for="formrow-customCheck"><?php echo lang('app.field_enable')?></label>
								</div>
							</div>
						</div>
						<?php
			$html=ob_get_clean();
			$token = csrf_hash();
			$res=array("html"=>$html,'csrf'=>$token);
			echo json_encode($res,true);
	}
}//end class
