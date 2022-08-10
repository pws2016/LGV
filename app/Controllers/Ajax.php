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
						
						'name'  => 'PROV_CLIENTE',
						'id'    => 'PROV_CLIENTE',
						
						
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
						
						'name'  => 'PROV_FATTURA',
						'id'    => 'PROV_FATTURA',
						
						
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
						
						'name'  => 'PROV_FORNITURA',
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
		switch($t){
			case 'sede_comune':?>
		 <label for="verticalnav-email-input">Comune </label>
				<?php $input = [

							'name'  => 'LOCALITA_CLIENTE',
							'id'    => 'LOCALITA_CLIENTE',
							
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

							'name'  => 'LOCALITA_FATTURA',
							'id'    => 'LOCALITA_FATTURA',
							
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

							'name'  => 'LOCALITA_FORNITURA',
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
			if(!empty($v['ID_FORN'])){
				foreach($v['ID_FORN'] as $kk=>$vv){
					$x=$this->FornitoreModel->find($vv);
					$str_forn.=$x['NOME_FORN'].",";
				}
				
			}?>
		<tr id="tr_address_<?php echo $k?>">
			<td><?php echo $v['IND_FORNITURA']?></td>
			<td><?php echo $v['LOCALITA_FORNITURA'].' '.$v['PROV_FORNITURA'].' '.$v['CAP_FORNITURA']?></td>
			<td><?php echo $str_forn?></td>
			<td><a href="#" onclick="delete_adr('<?php echo $k?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
		</tr>
		<?php }
	}
	public function del_address(){
		$i=$this->request->getVar('i');
		$array_address=$this->session->get('array_address');
		
		if(isset($array_address[$i])) unset($array_address[$i]);
		array_values($array_address);
		$this->session->set(array('array_address'=>$array_address));
		if(!empty($array_address)){
			foreach($array_address as $k=>$v){
			$str_forn="";
			if(!empty($v['ID_FORN'])){
				foreach($v['ID_FORN'] as $kk=>$vv){
					$x=$this->FornitoreModel->find($vv);
					$str_forn.=$x['NOME_FORN'].",";
				}
				
			}?>
		<tr id="tr_address_<?php echo $k?>">
			<td><?php echo $v['IND_FORNITURA']?></td>
			<td><?php echo $v['LOCALITA_FORNITURA'].' '.$v['PROV_FORNITURA'].' '.$v['CAP_FORNITURA']?></td>
			<td><?php echo $str_forn?></td>
			<td><a href="#" onclick="delete_adr('<?php echo $k?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
		</tr>
		<?php } }
	}
}
?>