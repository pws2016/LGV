<?php namespace App\Controllers;


class Patologie extends BaseController
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
						if(null !== $this->request->getVar('is_default')) $is_default=1; else $is_default=0;
						var_dump($this->request->getVar('ids_specification'));
					$tab=array('title'=>$this->request->getVar('title'),
					'ids_specification'=>implode(",",$this->request->getVar('ids_specification') ?? array()),
					'enable'=>$enable,
					'is_default'=>$is_default);
					
						$x=$this->PatologieModel->insert($tab);
						
						$data['success']=lang('app.success_add');
					}
					else $data['error']=lang('app.error_required');
				break;
				case 'edit':
				
					if($this->request->getVar('title')!=""){
						if(null !== $this->request->getVar('enable')) $enable=1; else $enable=0;
						if(null !== $this->request->getVar('is_default')) $is_default=1; else $is_default=0;
					$tab=array('title'=>$this->request->getVar('title'),
					'ids_specification'=>implode(",",$this->request->getVar('ids_specification') ?? array()),
					'enable'=>$enable,'is_default'=>$is_default);
						$this->PatologieModel->update($this->request->getVar('id'),$tab);
						$data['success']=lang('app.success_update');
					}
					else $data['error']=lang('app.error_required');
				break;
				case 'delete':
					$user_to_delete=$this->request->getVar('user_to_delete');
					if($user_to_delete!=""){
						$this->PatologieModel->where('id',$user_to_delete)->delete();
						$data['success']=lang('app.success_delete');
					}
				break;
			}
		}
		$ll=$this->PatologieModel;
		if($this->request->getVar('search')!==null){
			$st=$this->request->getVar('search_text');
			if($st!=""){
				$data['search_text']=$st;
				$ll=$this->PatologieModel->like('title',$st);
			}
			echo $st=$this->request->getVar('search_patologie');
			if($st!=""){
				$data['search_patologie']=$st;
				$ll=$this->PatologieModel->where("FIND_IN_SET('".$st."',ids_specification) >0");
				/*$ids=array();
				$ll_patologie=$this->PatologieModel->like('title',$st)->find();
				if(!empty($ll_patologie)){
					foreach($ll_patologie as $k=>$v){
						$ids=array_merge($ids,explode(',',$v['ids_specification']));
					}
					array_unique($ids, SORT_NUMERIC );
				}
			
				$ll=$this->PatologieModel->whereIn('id',$ids);*/
			}
		}
		$ll=$this->PatologieModel->find();
		foreach($ll as $k=>$v){
			$tt=explode(",",$v['ids_specification']);
			$str="";
			if(!empty($tt)){
				foreach($tt as $kk=>$vv){
					$inf_s=$this->SpecificationsModel->find($vv);
					$str.=$inf_s['title'].",";
				}
				$str=substr($str,0,-1);
			}
			$v['specification']=$str;
			$res[]=$v;
		}
		$data['list']=$res;
		$data['list_speciality']=$this->SpecificationsModel->orderBy('title','ASC')->find();
		return view('admin/patologie',$data);
	}
	
	public function update(){
		$id=$this->request->getVar('id');
		$inf=$this->PatologieModel->find($id);
			$list_speciality=$this->SpecificationsModel->orderBy('title','ASC')->find();
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
							<label for="horizontal-email-input" class="col-sm-3 col-form-label"><?php echo lang('app.field_speciality')?> <code>*</code></label>
							<div class="col-sm-9">
								<select class="select2 form-control select2-multiple" name="ids_specification[]" required multiple="multiple" data-placeholder="<?php echo lang('app.field_select')?> ..." style="width:100%">
									<?php if(!empty($list_speciality)){
										foreach($list_speciality as $k=>$v){?>
											<option value="<?php echo $v['id']?>" <?php if(in_array($v['id'],explode(",",$inf['ids_specification']))) echo 'selected' ?>><?php echo $v['title']?></option>
									<?php }}?>
								</select>
							</div>
						</div>
						<div class="row mb-4">
							<div class="form-group">
                                                            
								<div class="form-check form-check-inline">
									<input type="checkbox" class="form-check-input" id="formrow-customCheck" name="enable" <?php if($inf['enable']>0) echo 'checked'?>>
									<label class="form-check-label" for="formrow-customCheck"><?php echo lang('app.field_enable')?></label>
								</div>
								<div class="form-check form-check-inline">
									<input type="checkbox" class="form-check-input" id="formrow-customCheck" name="is_default" <?php if($inf['is_default']>0) echo 'checked'?>>
									<label class="form-check-label" for="formrow-customCheck"><?php echo lang('app.field_default')?></label>
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
