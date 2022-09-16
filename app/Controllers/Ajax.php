<?php namespace App\Controllers;


class Ajax extends BaseController
{ 
	public function index($f){
		return $this->$f();
	}
	public function get_provincia_by_nazione(){
		$id_nazione=$this->request->getVar('id_nazione');
		$t=$this->request->getVar('t');
		$list_provincia=array();
		if($id_nazione==139){
			$list_provincia=$this->ProvinceModel->orderBy('PROVINCIA','ASC')->find();
		}
		switch($t){
			case 'sede_provincia':?>
		  <label for="verticalnav-phoneno-input">Provincia </label>
			<?php 
				$options['']=lang('app.field_select');
				if(!empty($list_provincia)){
					foreach($list_provincia as $k=>$v){
					$options[$v['PROV']]=$v['PROVINCIA'];
				}
				}
				$input = [
						
						'name'  => 'residenza_provincia',
						'id'    => 'residenza_provincia',
						
						
						'class' => 'form-control '
				];
			if(!empty($list_provincia)){	$js = ' onChange="get_comune(\'sede_comune\',this.value);"';
				echo form_dropdown($input, $options,null,$js);
			}
			else	echo form_input($input);
			break;
			case 'fattura_provincia':?>
		  <label for="verticalnav-phoneno-input">Provincia </label>
			<?php 
				$options['']=lang('app.field_select');
				if(!empty($list_provincia)){
					foreach($list_provincia as $k=>$v){
					$options[$v['PROV']]=$v['PROVINCIA'];
				}
				}
				$input = [
						
						'name'  => 'fattura_provincia',
						'id'    => 'fattura_provincia',
						
						
						'class' => 'form-control '
				];
			if(!empty($list_provincia)){	$js = ' onChange="get_comune(\'fattura_comune\',this.value);"';
				echo form_dropdown($input, $options,null,$js);
			}
			else	echo form_input($input);
			break;
			case 'fornitura_provincia':?>
		  <label for="verticalnav-phoneno-input">Provincia </label>
			<?php 
				$options['']=lang('app.field_select');
				if(!empty($list_provincia)){
					foreach($list_provincia as $k=>$v){
					$options[$v['PROV']]=$v['PROVINCIA'];
				}
				}
				$input = [
						
						'name'  => 'provincia',
						'id'    => 'PROV_FORNITURA',
						
						
						'class' => 'form-control '
				];
			if(!empty($list_provincia)){	$js = ' onChange="get_comune(\'fornitura_comune\',this.value);"';
				echo form_dropdown($input, $options,null,$js);
			}
			else	echo form_input($input);
			break;
		}
				?>
		
		<?php 
	}
	
	public function get_comune_by_provincia(){
		$id_prov=$this->request->getVar('id_provincia');
		$t=$this->request->getVar('t');
		$list_comune=$this->ComuniModel->where('PROV',$id_prov)->orderBy('COMUNE','ASC')->find();
		//var_dump($list_comune);
		switch($t){
			case 'sede_comune':?>
		 <label for="verticalnav-email-input">Comune </label>
				<?php $input = [

							'name'  => 'residenza_comune',
							'id'    => 'residenza_comune',
							
							'class' => 'form-control'
					];
					$options=array();
					$options['']=lang('app.field_select');
					
						if(!empty($list_comune)){foreach($list_comune as $kk=>$vv){
							$options[$vv['COMUNE']]=$vv['COMUNE'];
						} }
					
				if(!empty($list_comune))	echo form_dropdown($input, $options);
				else	echo form_input($input);
					?>
	<?php break;
	case 'fattura_comune':?>
		 <label for="verticalnav-email-input">Comune </label>
				<?php $input = [

							'name'  => 'fattura_comune',
							'id'    => 'fattura_comune',
							
							'class' => 'form-control'
					];
					$options=array();
					$options['']=lang('app.field_select');
					
						if(!empty($list_comune)){foreach($list_comune as $kk=>$vv){
							$options[$vv['COMUNE']]=$vv['COMUNE'];
						} }
					
				if(!empty($list_comune))	echo form_dropdown($input, $options);
				else	echo form_input($input);
					?>
	<?php break;
	case 'fornitura_comune':?>
		 <label for="verticalnav-email-input">Comune </label>
				<?php $input = [

							'name'  => 'comune',
							'id'    => 'LOCALITA_FORNITURA',
							
							'class' => 'form-control'
					];
					$options=array();
					$options['']=lang('app.field_select');
					
						if(!empty($list_comune)){foreach($list_comune as $kk=>$vv){
							$options[$vv['COMUNE']]=$vv['COMUNE'];
						} }
					
				if(!empty($list_comune))	echo form_dropdown($input, $options);
				else	echo form_input($input);
					?>
	<?php break;
		}
		?>
	<?php 
	}
	public function add_address(){
		
		$new_adr=$_POST;
		if($this->session->get('array_address')===null){
			$array_address[]=$new_adr;
			
		}
		else{
		$array_address=array_merge($this->session->get('array_address'),array($new_adr));
		}
		$this->session->set(array('array_address'=>$array_address));
		
		foreach($array_address as $k=>$v){
			$str_forn="";
			?>
		<tr id="tr_address_<?php echo $k?>">
			<td><?php echo $v['title']?></td>
			<td><?php echo $v['indirizzo']?></td>
			<td><?php echo $v['comune'].' '.$v['provincia'].' '.$v['cap']?></td>
			<td><?php echo $v['phone'].'<br/>'.$v['email']?></td>
			<td><a href="#" onclick="delete_adr('<?php echo $k?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
		</tr>
		<?php }?>
		<tr style="display:none"><td colspan="3"><input type="text" name="hidden_adr" id="hidden_adr" value="<?php echo count($array_address ?? array())?>" required data-parsley-type="integer" data-parsley-min="1"></td></tr>
	<?php
	}
	public function del_address(){
		$i=$this->request->getVar('i');
		$array_address=$this->session->get('array_address');
		var_dump($array_address[$i]);
		if(isset($array_address[$i])) unset($array_address[$i]);
		array_values($array_address);
		$this->session->set(array('array_address'=>$array_address));
		if(!empty($array_address)){
			foreach($array_address as $k=>$v){
			$str_forn="";
			?>
		<tr id="tr_address_<?php echo $k?>">
		<td><?php echo $v['title']?></td>
			<td><?php echo $v['indirizzo']?></td>
			<td><?php echo $v['comune'].' '.$v['provincia'].' '.$v['cap']?></td>
			<td><?php echo $v['phone'].'<br/>'.$v['email']?></td>
			<td><a href="#" onclick="delete_adr('<?php echo $k?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
		</tr>
		<?php } }?>
		<tr style="display:none"><td colspan="3"><input type="text" name="hidden_adr" id="hidden_adr" value="<?php echo count($array_address ?? array())?>" required data-parsley-type="integer" data-parsley-min="1"></td></tr>
	<?php
	}
	
	public function get_map_position(){
			$inf_city=$this->ComuniModel->where('PROV',$this->request->getVar('LOCALITA_FORNITURA'))->first();
			$inf_provincia=$this->ProvinceModel->where('PROV',$this->request->getVar('PROV_FORNITURA'))->first();
			 $indirizzo = $this->request->getVar('IND_FORNITURA') . ', ' . $inf_city['COMUNE'] . ', ' . $inf_provincia['PROVINCIA'] . ', Italia';
			
			 $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='. urlencode($indirizzo).'&key='.MAP_KEY);
			$output = json_decode($geocode);

			$latitudine =  $output->results[0]->geometry->location->lat;
			$longitudine = $output->results[0]->geometry->location->lng;
			
			if($latitudine=="" && $longitudine=="") $res=array("error"=>true,"validation"=>lang('app.error_map'));
			else{
				$res=array("error"=>false,"lat"=>$latitudine,"lon"=>$longitudine);
			}
			echo json_encode($res,true);
	}
	
	public function upload_user_doc(){
		$data=$this->common_data();
		$validation = \Config\Services::validation();
if($this->session->get('user_docs')!==null){
	$user_docs=$this->session->get('user_docs');
}
else $user_docs=array();
      $input = $validation->setRules([
         'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,jpeg,jpg,png,pdf],'
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){

          $data['success'] = 0;
          $data['error'] = $validation->getError('file');// Error response

      }else{

          if($file = $this->request->getFile('file')) {
             if ($file->isValid() && ! $file->hasMoved()) {
                // Get file name and extension
                $name = $file->getName();
                $ext = $file->getClientExtension();

                // Get random file name
                $newName = $file->getRandomName();

                // Store file in public/uploads/ folder
                $file->move(ROOTPATH.'/public/uploads/medecin_doc/', $newName);
				$user_docs[]=$newName;
                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';

             }else{
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.'; 
             }
          }else{
             // Response
             $data['success'] = 2;
             $data['message'] = 'File not uploaded.';
          }
      }
	  $this->session->set(array('user_docs'=>$user_docs));
	  
	}
	
	function valid_user_email(){
		$data=$this->common_data();
		$email=$this->request->getVar('email');
		$id=$this->request->getVar('id');
		$exist=$this->UserModel->where('email',$email);
		if($id!==null) $exist=$this->UserModel->where('id !=',$id);
		$exist=$this->UserModel->find();
		if(empty($exist))  $output = array(
		   'status' => true
		  );
		else  $output = array(
		   'status' => false
		  );
		/*   echo json_encode(array(
		   'status' => true
		  ));*/
		 echo json_encode($output);
	}
}
?>