<!DOCTYPE HTML>
<html lang="it">
 
    <head>
        
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_patient_edit')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" CONTENT="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
		  
		   <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
		 <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
		   <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		     <link rel="stylesheet" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.css">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/multiselect-master/lib/google-code-prettify/prettify.css" />
 
    <link rel="stylesheet" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/multiselect-master/css/style.css" />
 <style>
	 .h5title {border-bottom: 1px solid;padding-bottom: 10px;}
input[type=text]:focus,input[type=email]:focus,input[type=password]:focus,input[type=email]:focus,input[type=date]:focus,input[type=time]:focus,input[type=number]:focus,input[type=file]:focus,input[type=url]:focus,select:focus,textarea:focus {outline: #FF7700 auto 5px;}
	 select.form-control:focus {outline: #FF7700 auto 5px;border: 1px solid #FF7700 ;}
	 .error{color:#6a74f4 !important;}
	 .parsley-errors-list>li {color:#6a74f4 !important;font-weight:bold;}
	 
	.div_clinic{display:none}
		</style>
	</head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/header.php')?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.title_page_patient_edit')?></h4>
								<div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                           
											
											  <li class="breadcrumb-item "><a href="<?php echo base_url($prefix_route.'patients')?>"><?php echo lang('app.title_menu_patient')?></a></li>
											  <li class="breadcrumb-item active"><a href="javascript: void(0);"><?php echo lang('app.menu_patient_edit')?></a></li>
                                        </ol>
                                    </div>

                                   

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
						
                          <div class="row justify-content-center">
                            <div class="col-lg-12">
                               
                                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
									<div class="row">
												
												<div class="alert alert-danger" id="error_mail" style="display:none"><?php echo lang('app.error_mail_exist')?></div>
											</div>
                                          
                                   <?php $attributes = ['class' => 'custom-validation', 'id' => 'myform','method'=>'post'];
		echo form_open_multipart( base_url($prefix_route.'/patients/edit/'.$inf_staff['id']), $attributes);?>
<input type="hidden" name="action" value="add">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $inf_staff['id']?>">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills nav-justified bg-light" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#navpills2-home" role="tab" aria-selected="false">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block"><?php echo lang('app.title_section_user_info')?></span>
                                            </a>
                                        </li>
                                      
                                  
										
										
										 <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#navpills2-profile" role="tab" aria-selected="false">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block"><?php echo lang('app.title_section_user_fattura')?></span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="navpills2-home" role="tabpanel">
                                            <p class="mb-0">
											<div class="row">  
														<h5 class="my-0 text-primary"><?php echo lang('app.title_section_account')?></h5>
													</div>
											<div class="row">
												 <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_email')?> <span class="text-primary">*</span>
																
																</label>
                                                                <input type="text" class="form-control" id="email_address" name="email" required data-parsley-type="email"  data-parsley-checkemail  value="<?php echo $inf_staff['email']?>">
																        

                                                            </div>
                                                        </div>
														 <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_mobile')?> <span class="text-primary">*</span>
																
																</label>
                                                                <input type="text" class="form-control" id="mobile" name="mobile" required value="<?php echo $inf_staff['mobile']?>">
																<small class="text-muted"><?php echo lang('app.help_text_mobile_account')?></small>
                                                            </div>
                                                        </div>
												
												  <div class="col-lg-2">
												   <div class="mb-3">
														<div class="form-check">
															<input class="form-check-input" type="checkbox" name="active" value="yes" <?php if($inf_staff['active']=='yes') echo 'checked'?> id="active" >
															<label class="form-check-label" for="active">
															   <?php echo lang('app.field_enable')?>
															</label>
														</div>
												   </div>
												  </div>
														
											</div>
												<div class="row">  
														<h5 class="my-0 text-primary"><?php echo lang('app.title_section_profile')?></h5>
													</div>
                                             
													<div class="row div_medecin">
													 <div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_sexe')?><span class="text-primary">*</span></label>
                                                                <select class="form-control" id="fattura_sesso" name="fattura_sesso" required>
																	<option value="M" <?php if($inf_staff_profile['fattura_sesso']=='M') echo 'selected'?>><?php echo lang('app.field_sex_m')?></option>
																	<option value="F" <?php if($inf_staff_profile['fattura_sesso']=='F') echo 'selected'?>><?php echo lang('app.field_sex_f')?></option>
																</select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_first_name')?><span class="text-primary">*</span></label>
                                                                <input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $inf_staff_profile['nome']?>">
                                                            </div>
                                                        </div>
														 <div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_last_name')?><span class="text-primary">*</span></label>
                                                                <input type="text" class="form-control" id="cognome" name="cognome" required value="<?php echo $inf_staff_profile['cognome']?>">
                                                            </div>
                                                        </div>
														 <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_birthdate')?></label>
                                                                <input type="text" class="form-control" id="nascita_data" name="nascita_data" value="<?php echo $inf_staff_profile['nascita_data']?>" >
                                                            </div>
                                                        </div>
														 <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_cf')?></label>
                                                                <input type="text" class="form-control" id="fattura_cf" name="fattura_cf"  value="<?php echo $inf_staff_profile['fattura_cf']?>">
                                                            </div>
                                                        </div>
														
													</div>
													<div class="row">
													 
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_phone')?></label>
                                                                <input type="text" class="form-control" id="telefono" name="telefono"  value="<?php echo $inf_staff_profile['telefono']?>">
                                                            </div>
                                                        </div>
														 <div class="col-lg-6">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_logo')?> </label>
														<input type="file" name="logo" class="form-control">
													</div>
												</div>
														 
													</div>
													<div class="row">  
														<h5 class="my-0 text-primary"><?php echo lang('app.title_section_address')?></h5>
													</div>
													<div class="row">
													<div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_country')?> <span class="text-primary">*</span>
																
																</label>
                                                                <select class="form-control" id="residenza_stato" name="residenza_stato"  onchange="get_provincia('sede_provincia',this.value);">
																	<option value=""><?php echo lang('app.field_select')?></option>
																	<?php foreach($list_nazione  as $k=>$v){?>
																	<option value="<?php echo $v['ID']?>" <?php if($v['ID']==$inf_staff_profile['residenza_stato']) echo 'selected'?>><?php echo $v['NAZIONE']?></option>
																	<?php } ?>
																</select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3" id="div_sede_provincia">
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
																	$js = ' onChange="get_comune(\'sede_comune\',this.value);"';
																	if(!empty($list_provincia)) echo form_dropdown($input, $options,$inf_staff_profile['residenza_provincia'],$js);
																	else echo form_input($input,$inf_staff_profile['residenza_provincia']);
																	?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3" id="div_sede_comune">
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
																	
																if(!empty($list_comune)) echo form_dropdown($input, $options,$inf_staff_profile['residenza_comune']);
																else	echo form_input($input,$inf_staff_profile['residenza_comune']);
																	?>
                                                            </div>
                                                        </div>
														
                                                    </div>
													<div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_address')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'VIA_CLIENTE',
																			'id'    => 'VIA_CLIENTE',
																		'value'    =>  $inf_staff_profile['residenza_indirizzo'],
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														<?php /*<div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_civico')?> </label>
                                                                <?php 
																$input = [
																		'type'  => 'text',
																		'name'  => 'CIVICO_CLIENTE',
																		'id'    => 'CIVICO_CLIENTE',
																	
																		'class' => 'form-control'
																];

																echo form_input($input);
																?>
                                                            </div>
                                                        </div>*/?>
														 <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_zip')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'CAP_CLIENTE',
																			'id'    => 'CAP_CLIENTE',
																			'value'    =>  $inf_staff_profile['residenza_cap'],
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </p>
                                        </div>
                                        <div class="tab-pane" id="navpills2-profile" role="tabpanel">
                                            <p class="mb-0">
											
                                                <div class="row">
													<div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_country')?> 
																</label>
                                                                <select class="form-control" id="fattura_stato" name="fattura_stato"  onChange="get_provincia('fattura_provincia',this.value);">
																	<option value=""><?php echo lang('app.field_select')?></option>
																	<?php foreach($list_nazione  as $k=>$v){?>
																	<option value="<?php echo $v['ID']?>" <?php if($v['ID']==$inf_staff_profile['fattura_stato']) echo 'selected'?>><?php echo $v['NAZIONE']?></option>
																	<?php } ?>
																</select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3" id="div_fattura_provincia">
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
																	$js = ' onChange="get_comune(\'fattura_comune\',this.value);"';
																	if(!empty($list_provincia)) echo form_dropdown($input, $options,$inf_staff_profile['fattura_provincia'],$js);
																	else echo form_input($input,$inf_staff_profile['fattura_provincia']);
																	?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3" id="div_fattura_comune">
                                                                <label for="verticalnav-email-input">Comune </label>
                                                                <?php $input = [
												
																			'name'  => 'fattura_comune',
																			'id'    => 'fattura_comune',
																			
																			'class' => 'form-control'
																	];
																	$options=array();
																	$options['']=lang('app.field_select');
																	
																		if(!empty($list_comune_fatt)){
																			foreach($list_comune_fatt as $kk=>$vv){
																			$options[$vv['COMUNE']]=$vv['COMUNE'];
																		} }
																	
																if(!empty($list_comune_fatt))	echo form_dropdown($input, $options,$inf_staff_profile['fattura_comune']);
																else	echo form_input($input,$inf_staff_profile['fattura_comune']);
																	?>
                                                            </div>
                                                        </div>
														
                                                    </div>
													<div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_address')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'VIA_FATTURA',
																			'id'    => 'VIA_FATTURA',
																		'value'    =>  $inf_staff_profile['fattura_indirizzo'],
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														<?php /*<div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_civico')?> </label>
                                                                <?php 
																$input = [
																		'type'  => 'text',
																		'name'  => 'CIVICO_FATTURA',
																		'id'    => 'CIVICO_FATTURA',
																	
																		'class' => 'form-control'
																];

																echo form_input($input);
																?>
                                                            </div>
                                                        </div> */?>
														 <div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_zip')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'CAP_FATTURA',
																			'id'    => 'CAP_FATTURA',
																		
																			'value'    =>  $inf_staff_profile['fattura_cap'],
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
													 <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input">Email </label>
                                                                <?php 
																	$input = [
																			'type'  => 'email',
																			'name'  => 'EMAIL_FATTURA',
																			'id'    => 'EMAIL_FATTURA',
																			'value'    =>  $inf_staff_profile['email'],
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														 <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_sdi')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'SDI',
																			'id'    => 'SDI',
																		'value'    =>  $inf_staff_profile['fattura_sdi'],
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														 <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_pec')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'PEC_FATTURA',
																			'id'    => 'PEC_FATTURA',
																		'value'    =>  $inf_staff_profile['fattura_pec'],
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
													</div>
                                            </p>
                                        </div>
                                        
                                    
									
									</div>
									<div class="row">
										<input type="submit" class="btn btn-success" name="submit" value="<?php echo lang('app.btn_save')?>">
									</div>
									<?php echo form_close()?>
                                </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
 
		   
    <form class="custom-validation2" method="post" id="add_addresse_form" onsubmit="return add_adr()" enctype="multipart/form-data">
<input type="hidden" name="action" value="add">
				<div class="modal fade" id="addAddress-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_new_address')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					
		
					<div class="modal-body" id="">
						
						<div class="row">
													
                                                        <div class="col-lg-6">
                                                            <div class="mb-3" id="div_fornitura_provincia">
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
																	$js = ' onChange="get_comune(\'fornitura_comune\',this.value);"';
																	echo form_dropdown($input, $options,null,$js);
																	//echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3" id="div_fornitura_comune">
                                                                <label for="verticalnav-email-input">Comune </label>
                                                                <?php $input = [
												
																			'name'  => 'LOCALITA_FORNITURA',
																			'id'    => 'LOCALITA_FORNITURA',
																			
																			'class' => 'form-control'
																	];
																	$options=array();
																	$options['']=lang('app.field_select');
																	
																		if(!empty($list_comune)){foreach($list_comune as $kk=>$vv){
																			$options[$vv['id']]=$vv['comune'];
																		} }
																	
																//	echo form_dropdown($input, $options,$request_data_inf['sede_comune']);
																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														
                                                    </div>
													<div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_address')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'IND_FORNITURA',
																			'id'    => 'IND_FORNITURA',
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														
														 <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_zip')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'CAP_FORNITURA',
																			'id'    => 'CAP_FORNITURA',
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="row">
													 <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_phone')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'PHONE_FORNITURA',
																			'id'    => 'PHONE_FORNITURA',
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														 <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-address-input"><?php echo lang('app.field_email')?> </label>
                                                                <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'EMAIL_FORNITURA',
																			'id'    => 'EMAIL_FORNITURA',
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
													</div>
													<div class="row">
													<div class="col-lg-1 mt-4">
														<a class="btn btn-info" href="#" onclick="get_pos();"><i class="fa fa-map"></i></a>
													</div>
														<div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input col-12"><?php echo lang('app.field_maps_lat')?> 
																</label>
																	 <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'lat',
																			'id'    => 'lat',
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
														<div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input col-12"><?php echo lang('app.field_maps_long')?> 
																</label>
																	 <?php 
																	$input = [
																			'type'  => 'text',
																			'name'  => 'lng',
																			'id'    => 'lng',
																		
																		
																			'class' => 'form-control'
																	];

																	echo form_input($input);
																	?>
                                                            </div>
                                                        </div>
													</div>
                                                         
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close')?></button>
						 <button type="submit" class="btn btn-success"><?php echo lang('app.btn_save')?></button>
					</div>
				</div>
			</div>
		</div>
</form>	   
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                               <?php echo view('includes/copyright');?>
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
	
	
		
   <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
     <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/tinymce/tinymce.min.js"></script>

		
		
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
		  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/js/select2.min.js"></script>
		    <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-advanced.init.js"></script>
		
		  
<?php /*		  
   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
		*/ ?>
		 <!-- jquery step -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
  
	  	
	<script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
		<script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
		 
		   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
		   <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
		 
 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/multiselect-master/dist/js/multiselect.js"></script>
  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/dropzone/dropzone.js"></script>
       
		  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/langs_tinymce/it.js"></script>
		  
		 
	<script>

  $(document).ready(function(){
	  tinymce.init({
  selector: 'textarea#description',
  language: 'it'
});

	 get_provincia('sede_provincia',139); 

	
  window.Parsley
  .addValidator('requiredIf', {
    requirementType: 'string',
    validateString: function(value, requirement) {
     // return 0 === value % requirement;
	if (jQuery(requirement).is(':checked')){
		if(value=="") return false; else return true;
        // return !!value;
      } 

      return true;
	  //return false;
    },
    messages: {
      en: 'This value should be a multiple of %s',
      fr: 'Cette valeur doit être un multiple de %s'
    }
  });

 
  var $form =  $('.custom-validation').parsley({
	  locale:'it'
	 
  });
  $form.on('form:validate', function() {
		$("#error_mail").hide(0);
	    $("#error_adr").hide(0);
		
  });
  $form.on('field:error', function() {
	 //console.log('Validation failed for: ', this.$element.attr('name')); 
	 if(this.$element.attr('name')=="hidden_adr"){
		
		  $("#error_adr").show(0);
		
	 }
  });
   $form.on('form:submit', function() {
	   var response=false;
	   alert($("#user_id").val());
	    $.ajax({
                    url: "<?php echo base_url('ajax/valid_user_email')?>",
                    data: {email: $("#email_address").val(),id:$("#user_id").val()},
                    dataType: 'json',
                    type: 'post',
                    async: false,
                    success: function(data) {
						
						if(data.status==false){
							response = false;
							$("#error_mail").show(0);
						}
						else response = true;
                    },
                    error: function() {
                        response = false;
                    }
                });
				
	   return response;
		
  });
   var $form2 =  $('.custom-validation2').parsley({
	  locale:'it'
  });
  
  
   }); // end $(sdocument)
 
  
  
 
		
			
   function get_provincia(t,v){
			
			$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_provincia_by_nazione",
				  method:"POST",
				  data:{id_nazione:v,t:t}
				  
			}).done(function(data){ 
				if(t=='sede_provincia'){
					$("#div_sede_provincia").html(data);
					var xxx="<label for='verticalnav-email-input'>Comune </label><input type='text' name='residenza_comune' id='residenza_comune' class='form-control'>";
					$("#div_sede_comune").html(xxx);
				}
				
				if(t=='fattura_provincia'){
					$("#div_fattura_provincia").html(data);
					var xxx="<label for='verticalnav-email-input' >Comune</label><input type='text' name='fattura_comune' id='fattura_comune' class='form-control'>";
					$("#div_fattura_comune").html(xxx);
				}
				if(t=='fornitura_provincia'){
					$("#div_fornitura_provincia").html(data);
					var xxx="<label for='verticalnav-email-input' >Comune</label><input type='text' name='LOCALITA_FORNITURA' id='LOCALITA_FORNITURA' class='form-control'>";
					$("#div_fornitura_comune").html(xxx);
				}
			});
		}
		
		function get_comune(t,v){
	
			$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_comune_by_provincia",
				  method:"POST",
				  data:{id_provincia:v,t:t}
				  
			}).done(function(data){
				
				if(t=='sede_comune') $("#div_sede_comune").html(data);
			
				if(t=='fattura_comune') $("#div_fattura_comune").html(data);
					if(t=='fornitura_comune') $("#div_fornitura_comune").html(data);
			});
		}
		
	</script>

 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
		
		

		  
    </body>
</html>
