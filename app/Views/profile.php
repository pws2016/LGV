<!DOCTYPE HTML>
<html lang="it">
 
    <head>
        
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_profile')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" CONTENT="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
		   <link rel="stylesheet" href="<?php echo base_url()?>/intl-tel-input-master/build/css/intlTelInput.css">
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
			<?php if($inf_staff['role']=='M'){?>
				.div_clinic{display:none}
				.div_medecin{display:flex}
			<?php } else{?>
			.div_medecin{display:none}
			.div_clinic{display:flex}
			<?php } ?>
			h6.titleblock{background: #f5f6f8;color: #000 !important;font-weight: 100;font-size: 15px;}
		</style>
	</head>

    <body data-keep-enlarged="true" class="vertical-collpsed">
        <div id="layout-wrapper">
            <?php echo view('includes/header.php')?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.title_page_profile')?></h4>
									<div class="page-title-right">
										<ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>


										
											<li class="breadcrumb-item active"><a href="javascript: void(0);"><?php echo lang('app.menu_profile')?></a></li>
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
													<div class="alert alert-danger" id="error_adr" style="display:none"><?php echo lang('app.error_atleast_adr')?></div>
													<div class="alert alert-danger" id="error_mail" style="display:none"><?php echo lang('app.error_mail_exist')?></div>
												</div>
                                          
                                  <?php $attributes = ['class' => 'custom-validation', 'id' => 'myform','method'=>'post'];
		echo form_open_multipart( '', $attributes);?>

<input type="hidden" id="id_family_to_del" value="">
                                    <!-- Nav tabs -->
												<ul class="nav nav-pills nav-justified bg-light" role="tablist">
													<li class="nav-item waves-effect waves-light">
														<a class="nav-link active" data-bs-toggle="tab" href="#navpills2-home" role="tab" aria-selected="false">
															<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
															<span class="d-none d-sm-block"><?php echo lang('app.title_section_user_info')?></span>
														</a>
													</li>

													<li class="nav-item waves-effect waves-light">
														<a class="nav-link" data-bs-toggle="tab" href="#navpills2-messages" role="tab" aria-selected="false">
															<span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
															<span class="d-none d-sm-block"><?php echo lang('app.title_section_user_medical_profile')?></span>
														</a>
													</li>

													<li class="nav-item waves-effect waves-light">
														<a class="nav-link " data-bs-toggle="tab" href="#navpills2-settings" role="tab" aria-selected="true">
															<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
															<span class="d-none d-sm-block"><?php echo lang('app.title_section_user_address')?></span>
														</a>
													</li>
													<li class="nav-item waves-effect waves-light">
														<a class="nav-link " data-bs-toggle="tab" href="#navpills2-media" role="tab" aria-selected="true">
															<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
															<span class="d-none d-sm-block"><?php echo lang('app.title_section_user_media')?></span>
														</a>
													</li>
													<li class="nav-item waves-effect waves-light">
														<a class="nav-link " data-bs-toggle="tab" href="#navpills2-docs" role="tab" aria-selected="true">
															<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
															<span class="d-none d-sm-block"><?php echo lang('app.title_section_user_doc')?></span>
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
															<div class="col-lg-6">
																
																
																
																
																<div class="row">
																	<div class="col-lg-12">
																		<h6 class="mb-3 titleblock"><?php echo lang('app.title_section_profile')?></h6>
																	</div>
																	<div class="row div_clinic">
																		<div class="col-lg-8">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_company_name')?> <span class="text-primary">*</span>

																				</label>
																				<input type="text" class="form-control" id="ragione_sociale" name="ragione_sociale"  value="<?php echo $inf_staff_profile['ragione_sociale']?>" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona2">
																			</div>
																		</div>
																		<div class="col-lg-4">
																			<div class="mb-3">
																				<label for="verticalnav-address-input"><?php echo lang('app.field_piva')?> <span class="text-primary">*</span></label>
																				<?php 
	$input = [
	'type'  => 'text',
	'name'  => 'fattura_piva',
	'id'    => 'fattura_piva',
'value'    =>  $inf_staff_profile['fattura_piva'],
	'class' => 'form-control',
	"data-parsley-validate-if-empty"=>true,
	" data-parsley-required-if"=>"#persona2",
	'data-parsley-length'=>"[11,11]",
	'data-parsley-length-message'=>"Il codice fiscale deve essere di 11 caratteri",
	'data-parsley-type'=>"alphanum"
];

																echo form_input($input);
																				?>
																			</div>
																		</div>
																	</div>
																
																	<div class="row div_medecin">
																		<div class="col-lg-2">
																		<?php /*	<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_sexe')?><span class="text-primary">*</span></label>
																				<select class="form-control" id="fattura_sesso" name="fattura_sesso" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona1" >
																					<option value="M" selected><?php echo lang('app.field_sex_m')?></option>
																					<option value="F" ><?php echo lang('app.field_sex_f')?></option>
																				</select>
																			</div> */ ?>
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_dr_title')?><span class="text-primary">*</span></label>
																				<select class="form-control" id="title" name="title" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona1" >
																					<option value="Dr." <?php if($inf_staff_profile['title']=='Dr.') echo 'selected'?>>Dr.</option>
																					<option value="Dr.ssa" <?php if($inf_staff_profile['title']=='Dr.ssa') echo 'selected'?>>Dr.ssa</option>
																						<option value="Non specificato" <?php if($inf_staff_profile['title']=='Non specificato') echo 'selected'?>>Non specificato</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-lg-5">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_first_name')?><span class="text-primary">*</span></label>
																				<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $inf_staff_profile['nome']?>" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona1" >
																			</div>
																		</div>
																		<div class="col-lg-5">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_last_name')?><span class="text-primary">*</span></label>
																				<input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo $inf_staff_profile['cognome']?>" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona1" >
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_birthdate')?><span class="text-primary">*</span></label>
																				<div class="input-group" id="datepicker1">
											<input type="text" name="nascita_data" class="form-control" placeholder="dd M, yyyy" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona1"
												   data-date-format="dd/mm/yyyy" data-date-container='#datepicker1' data-provide="datepicker" data-date-autoclose="true" data-regional="it" value="<?php echo $inf_staff_profile['nascita_data']?>" data-date-altformat="yyyy-mm-dd">

											<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
										</div><!-- input-group -->
																				
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_cf')?><span class="text-primary">*</span></label>
																				<input type="text" class="form-control" id="fattura_cf" name="fattura_cf"  value="<?php echo $inf_staff_profile['fattura_cf']?>" data-parsley-validate-if-empty="true"  data-parsley-required-if="#persona1" >
																			</div>
																		</div>
																	</div>
																	<div class="row">

																		<div class="col-lg-6">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_phone')?></label>
																				<input type="text" class="form-control" id="telefono" name="telefono"   value="<?php echo $inf_staff_profile['telefono']?>">
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<div class="mb-3">
																				<label for="verticalnav-firstname-input"><?php echo lang('app.field_typologie')?> 	</label>
																				<select class="form-control" id="tipologia" name="tipologia"  >
																					<option value=""><?php echo lang('app.field_select')?></option>
																					<?php if(!empty($SaffTipologie)){ foreach($SaffTipologie  as $k=>$v){?>
																					<option value="<?php echo $k?>" <?php if($k==$inf_staff_profile['tipologia']) echo 'selected'?>><?php echo $v?></option>
																					<?php } }?>
																				</select>
																			</div>
																		</div>


																	</div>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="col-lg-12">  
																	<h6 class="mb-3 titleblock"><?php echo lang('app.title_section_address')?></h6>
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
															</div>
														</div>
														</p>
													</div>
                                        <div class="tab-pane" id="navpills2-profile" role="tabpanel">
                                            <p class="mb-0">
												<div class="row">
												<div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input"><?php echo lang('app.field_fattura_nome')?> 
																</label>
																<input type="text" class="form-control" name="fattura_nome" id="fattura_nome" value="<?php echo $inf_staff_profile['fattura_nome']?>">
															</div>
														</div>
												<div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input">IBAN
																</label>
																<input type="text" class="form-control" name="fattura_IBAN" id="fattura_IBAN" value="<?php echo $inf_staff_profile['fattura_IBAN']?>">
															</div>
														</div>
</div>														
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
																	
																		if(!empty($list_comune_fatt)){foreach($list_comune_fatt as $kk=>$vv){
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
                                        <div class="tab-pane" id="navpills2-messages" role="tabpanel">
                                            <p class="mb-0">
											<div class="row div_clinic">
												<h6 class="mb-3 titleblock">Staff medico<?php //echo lang('app.field_team')?></h6>
												
											<div class="repeater">
												<div class="" data-repeater-list="list_team">
												<?php if(empty($list_team)){?>
													<div class="card" data-repeater-item >
														<div class="card-header">
															<?php echo lang('app.title_section_new_team_memeber')?>
															<button style="float:right" data-repeater-delete type="button" class="btn btn-sm btn-danger " ><i class="fas fa-trash"></i></button>
														</div>
														<div class="card-body">
															<div class="row">
																<div class="col-2">
																	<div class="mb-3">
																		<div class="form-check">
																			<input class="form-check-input" type="checkbox" name="team_enable" value="yes" checked id="team_enable" >
																			<label class="form-check-label" for="team_enable">
																			   Attiv??															</label>
																		</div>
																   </div>
																    </div>
																   <div class="col-5">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_name')?> 	</label>
																			  <input type="text"  class="form-control" id="team_name" name="team_name"  >
																		</div>
																	</div>
																	 <div class="col-5">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_image')?> 	</label>
																			  <input type="file" class="form-control" id="team_image" name="team_image"  >
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_description')?> 	</label>
																			  <textarea class="form-control team_description" id="team_description" name="team_description"  ></textarea>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_speciality')?> 	</label>
																	<select name="team_ids_speciality" class="form-control" size="8" multiple="multiple">
																		<?php if(!empty($list_speciality)){
																			foreach($list_speciality as $k=>$v){?>
																		<option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
																		<?php } }?>  
																	</select>
																	</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_patologie')?> 	</label>
																	<select name="team_ids_patologie" class="form-control" size="8" multiple="multiple">
																		<?php if(!empty($list_patologie)){
																			foreach($list_patologie as $k=>$v){?>
																		<option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
																		<?php } }?>  
																	</select>
																	</div>
																	</div>
																</div>
															</div>
														
													</div><!-- end row repeater item -->
												<?php } else{
													foreach($list_team as $kk=>$vv){?>
													<div class="card" data-repeater-item >
														<div class="card-header">
															<?php echo lang('app.title_section_new_team_memeber')?>
															
															<button style="float:right" data-repeater-delete type="button" class="btn btn-sm btn-danger " onclick="family_to_del('<?php echo $vv['id']?>')"><i class="fas fa-trash"></i></button>
														</div>
														<div class="card-body">
														<input type="hidden" name="team_id" value="<?php echo $vv['id']?>">
															<div class="row">
																<div class="col-2">
																	<div class="mb-3">
																		<div class="form-check">
																			<input class="form-check-input" type="checkbox" name="team_enable" value="yes" <?php if($vv['enable']=='1') echo 'checked'?> id="team_enable" >
																			<label class="form-check-label" for="team_enable">
																			   Attiv??															</label>
																		</div>
																   </div>
																    </div>
																   <div class="col-5">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_name')?> 	</label>
																			  <input type="text"  class="form-control" id="team_name" name="team_name"  value="<?php echo $vv['name']?>">
																		</div>
																	</div>

																	 <div class="col-4">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_image')?> 	</label>
																			  <input type="file" class="form-control" id="team_image" name="team_image"  >
																		</div>
																	</div>
																<div class="col-1">
																	   <?php if($vv['image']!=""){?> <img src="<?php echo base_url('uploads/team/'.$vv['image'])?>" width="75px" height="75px"><?php } ?>
																	   </div>
																	<div class="col-12">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_description')?> 	</label>
																			  <textarea class="form-control team_description" id="team_description" name="team_description"  ><?php echo $vv['description']?></textarea>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_speciality')?> 	</label>
																	<select name="team_ids_speciality" class="form-control" size="8" multiple="multiple">
																		<?php if(!empty($list_speciality)){
																			foreach($list_speciality as $k=>$v){?>
																		<option value="<?php echo $v['id']?>" <?php if(in_array($v['id'],explode(",",$vv['ids_specification']))) echo 'selected'?>><?php echo $v['title']?></option>
																		<?php } }?>  
																	</select>
																	</div>
																	</div>
																	<div class="col-6">
																		<div class="mb-3">
																			 <label for="verticalnav-firstname-input"><?php echo lang('app.field_patologie')?> 	</label>
																	<select name="team_ids_patologie" class="form-control" size="8" multiple="multiple">
																		<?php if(!empty($list_patologie)){
																			foreach($list_patologie as $k=>$v){?>
																		<option value="<?php echo $v['id']?>"  <?php if(in_array($v['id'],explode(",",$vv['ids_patologie']))) echo 'selected'?>><?php echo $v['title']?></option>
																		<?php } }?>  
																	</select>
																	</div>
																	</div>
																</div>
															</div>
														
													</div><!-- end row repeater item -->
												<?php } } ?>
													</div><!-- end repeater list -->
													<div class="row">
																<div class="col-lg-12">
																	<input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="<?php echo lang('app.btn_add_row')?>"/>
																	</div>
															</div>
												</div><!-- end repeater -->
											</div> 
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<?php /*<div class="col-lg-6 div_medecin">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"><?php echo lang('app.field_structure_sanitaire')?> 
																</label>
																<select class="form-control" id="structure_sanitaire" name="structure_sanitaire"  >
																	<option value=""><?php echo lang('app.field_select')?></option>
																	<?php if(!empty($list_structure_sanitaire)){
		foreach($list_structure_sanitaire  as $k=>$v){?>
																	<option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
																	<?php } }?>
																</select>
															</div>
														</div> */?>
														<div class="col-lg-6 div_medecin">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"><?php echo lang('app.field_ordre_prof')?> 
																</label>
																<select class="form-control" id="ordre_prof" name="ordre_prof"  >
																	<option value=""><?php echo lang('app.field_select')?></option>
																	<?php if(!empty($list_ordre_prof)){
		foreach($list_ordre_prof  as $k=>$v){?>
																	<option value="<?php echo $v['id']?>" <?php if($v['id']==$inf_staff_profile['ordre_prof']) echo 'selected'?>><?php echo $v['title']?></option>
																	<?php } }?>
																</select>
															</div>
														</div>
														<div class="col-lg-6 div_medecin">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"><?php echo lang('app.field_ordre_city')?> 
																</label>
															<?php	/*<select class="form-control" id="ordre_city" name="ordre_city"  >
																	<option value=""><?php echo lang('app.field_select')?></option>
																	<?php if(!empty($list_ordre_city)){
		foreach($list_ordre_city  as $k=>$v){?>
																	<option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
																	<?php } }?>
																</select> */ ?>
																	<input type="text" class="form-control" id="ordre_city" name="ordre_city" value="<?php echo $inf_staff_profile['ordre_city']?>" >
															</div>
														</div>
														<div class="col-lg-6 div_medecin">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"><?php echo lang('app.field_ordre_num')?> 
																</label>
																<input type="text" class="form-control" id="ordre_num" name="ordre_num"  value="<?php echo $inf_staff_profile['ordre_num']?>" >

															</div>
														</div>
														<div class="col-lg-12">
															<div class="row">  
																<h5 class="my-0 text-primary"><?php echo lang('app.field_speciality')?></h5>

															</div>
															<div class="row">
																<div class="col-6">
																	<select name="from_speciality[]" class="js-multiselect form-control" size="8" multiple="multiple">
																		<?php if(!empty($list_speciality)){
						foreach($list_speciality as $k=>$v){
							if(!in_array($v['id'],explode(",",$inf_staff_profile['ids_specification']))){?>
                        <option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
                    <?php } } }?>  
																	</select>
																</div>
                
																<div class="col-1">
																	<button type="button" id="js_right_All_1" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-forward"></i></button>
																	<button type="button" id="js_right_Selected_1" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-chevron-right"></i></button>
																	<button type="button" id="js_left_Selected_1" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-chevron-left"></i></button>
																	<button type="button" id="js_left_All_1" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-backward"></i></button>
																</div>
                
																<div class="col-5">
																	<select name="to_speciality[]" id="js_multiselect_to_1" class="form-control" size="8" multiple="multiple" data-parsley-multiple-of="3" data-parsley-validate-if-empty="true">
																	<?php if(!empty($list_speciality)){
						foreach($list_speciality as $k=>$v){
							if(in_array($v['id'],explode(",",$inf_staff_profile['ids_specification']))){?>
                        <option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
                    <?php } } }?>  
																	</select>
																	<div class="row">
																		<div class="col-6">
																			<button type="button" id="multiselect_move_up_1" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-chevron-up"></i></button>
																		</div>
																		<div class="col-6">
																			<button type="button" id="multiselect_move_down_1" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-chevron-down"></i></button>
																		</div>
																	</div>
																</div>
            												</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">  
														<h5 class="my-0 text-primary"><?php echo lang('app.field_patologie')?></h5>
														<p class="text-muted"><?php echo lang('app.help_text_select_patologie')?></p>
													</div>
													<div class="row">
														<div class="col-5">
															<select name="from_patologie[]" class="js-multiselect2 form-control" size="8" multiple="multiple">
																<?php if(!empty($list_patologie)){
						foreach($list_patologie as $k=>$v){
							if(!in_array($v['id'],explode(",",$inf_staff_profile['ids_patologie']))){?>
                        <option value="<?php echo $v['id']?>" data-speciality="<?php echo $v['ids_specification'].","?>"  disabled><?php echo $v['title']?></option>
						<?php } } }?>  
															</select>
														</div>
                
														<div class="col-1">
															<button type="button" id="js_right_All_2" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-forward"></i></button>
															<button type="button" id="js_right_Selected_2" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-chevron-right"></i></button>
															<button type="button" id="js_left_Selected_2" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-chevron-left"></i></button>
															<button type="button" id="js_left_All_2" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-backward"></i></button>
														</div>
                
														<div class="col-5">
															<select name="to_patologie[]" id="js_multiselect_to_2" class="form-control" size="8" multiple="multiple">
																<?php if(!empty($list_patologie)){
						foreach($list_patologie as $k=>$v){
							if(in_array($v['id'],explode(",",$inf_staff_profile['ids_patologie']))){?>
                        <option value="<?php echo $v['id']?>" data-speciality="<?php echo $v['ids_specification'].","?>"  disabled><?php echo $v['title']?></option>
						<?php } } }?>  
															</select>
															<div class="row">
																<div class="col-6">
																	<button type="button" id="multiselect_move_up_2" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-chevron-up"></i></button>
																</div>
																<div class="col-6">
																	<button type="button" id="multiselect_move_down_2" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-chevron-down"></i></button>
																</div>
															</div>
														</div>
            										</div>
													<div class="row">  
														<h5 class="my-0 text-primary"><?php echo lang('app.field_prestation')?></h5>
														<p class="text-muted"><?php echo lang('app.help_text_select_prestation')?></p>
													</div>
													<div class="row">
														<div class="col-5">
															<select name="from_prestation[]" class="js-multiselect3 form-control" size="8" multiple="multiple">
																<?php if(!empty($list_prestation)){
						foreach($list_prestation as $k=>$v){
							if(!in_array($v['id'],explode(",",$inf_staff_profile['ids_prestation']))){?>
                        <option value="<?php echo $v['id']?>" data-speciality="<?php echo $v['ids_specification'].","?>"  disabled><?php echo $v['title']?></option>
						<?php } } }?>  
															</select>
														</div>
                
														<div class="col-1">
															<button type="button" id="js_right_All_3" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-forward"></i></button>
															<button type="button" id="js_right_Selected_3" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-chevron-right"></i></button>
															<button type="button" id="js_left_Selected_3" class="btn btn-block btn-light waves-effect waves-light mb-1"><i class="fas fa-chevron-left"></i></button>
															<button type="button" id="js_left_All_3" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-backward"></i></button>
														</div>
                
														<div class="col-5">
															<select name="to_prestation[]" id="js_multiselect_to_3" class="form-control" size="8" multiple="multiple">
																<?php if(!empty($list_prestation)){
						foreach($list_prestation as $k=>$v){
							if(in_array($v['id'],explode(",",$inf_staff_profile['ids_prestation']))){?>
                        <option value="<?php echo $v['id']?>" data-speciality="<?php echo $v['ids_specification'].","?>"  disabled><?php echo $v['title']?></option>
						<?php } } }?>  
															</select>
															<div class="row">
																<div class="col-6">
																	<button type="button" id="multiselect_move_up_3" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-chevron-up"></i></button>
																</div>
																<div class="col-6">
																	<button type="button" id="multiselect_move_down_3" class="btn btn-block btn-light waves-effect waves-light"><i class="fas fa-chevron-down"></i></button>
																</div>
															</div>
														</div>
            										</div>
												</div>
											</div>
                                            </p>
                                        </div>
                                        <div class="tab-pane " id="navpills2-settings" role="tabpanel">
                                            <p class="mb-0">
											  <div class="row">
												<div class="col-lg-4">
													<div class="mb-3">
													<input type="button" class="btn btn-warning" name="add_address" value="<?php echo lang('app.btn_add_address')?>" data-bs-target="#addAddress-modal-dialog" data-bs-toggle="modal">
													</div>
													
												</div>
											</div>
											<div class="row">
												<table class="table table-striped">
													<tbody id="list_address">
													<tr style="display:none"><td colspan="3"><input type="text" name="hidden_adr" id="hidden_adr" value="<?php echo count($array_address ?? array())?>" required data-parsley-type="integer" data-parsley-min="1"></td></tr>
														<?php // $array_address=$this->session->get('array_address');
														
														if(!empty($array_address)){
															foreach($array_address as $k=>$v){
																
														?>
													<tr id="tr_address_<?php echo $k?>">
													<td><?php echo $v['title']?></td>
														<td><?php echo $v['indirizzo']?></td>
														<td><?php echo $v['comune'].' '.$v['provincia'].' '.$v['cap']?></td>
														<td><?php echo $v['phone'].'<br/>'.$v['email']?></td>
														<td><a href="#" onclick="delete_adr('<?php echo $k?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
													</tr>
														<?php } }  ?>
													</tbody>
												</table>
											</div>
                                            </p>
                                        </div>
                                       <div class="tab-pane" id="navpills2-media" role="tabpanel">
                                            <p class="mb-0">
											<div class="row">
												 <div class="col-lg-5">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_photo_profile')?> </label>
														<input type="file" name="logo" class="form-control">
													</div>
												</div>
												<?php if($inf_staff_profile['logo']!=""){?>
												<div class="col-lg-1">
													<img src="<?php echo base_url('uploads/logo/'.$inf_staff_profile['logo'])?>" width="75px" height="75px">
												</div>
												<?php } ?>
												<div class="col-lg-6">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_biografie')?> </label>
														<textarea id="description" name="description"><?php echo $inf_staff_profile['description']?></textarea>
											 </div>
												</div>
												<?php /* <div class="col-lg-6">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_cv')?> </label>
														<input type="file" name="cv" class="form-control">
													</div>
												</div> */ ?>
											</div>
											<div class="row">
											<div class="col-lg-6 div_medecin">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_esperto')?> </label>
														<textarea id="esperto" name="esperto"><?php echo $inf_staff_profile['esperto']?></textarea>
											 </div>
												</div>
												<div class="col-lg-6 div_medecin">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_publication')?> </label>
														<textarea id="publication" name="publication"><?php echo $inf_staff_profile['publication']?></textarea>
											 </div>
												</div>
												<div class="col-lg-6 div_medecin">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_experience')?> </label>
														<textarea id="experience" name="experience"><?php echo $inf_staff_profile['experience']?></textarea>
											 </div>
												</div>
												<div class="col-lg-6 div_medecin">
													<div class="mb-3">
														<label for="verticalnav-address-input"><?php echo lang('app.field_academic')?> </label>
														<textarea id="academic" name="academic"><?php echo $inf_staff_profile['academic']?></textarea>
											 </div>
												</div>
												
											</div>
											</p>
										</div>
									  <div class="tab-pane" id="navpills2-docs" role="tabpanel">
                                            <p class="mb-0">
											<div class='row'>
												<h5 class="my-0 text-primary"><?php echo lang('app.title_section_current_files')?></h5>
												<table class="table table-bordred">
												<tr>
													<th><?php echo lang('app.field_delete')?></th>
													<th><?php echo lang('app.field_file')?></th>
													<th></th>
												</tr>
												<?php
												if(!empty($docs)){
													foreach($docs as $d){?>
													<tr>
														<td><input type="checkbox" name="delete_docs[]" value="<?php echo $d['id']?>"></td>
														<td><?php echo $d['doc']?></td>
														<td>
														<?php if(exif_imagetype(ROOTPATH.'public/uploads/medecin_doc/'.$d['doc'])==false){?>
														<a target="_blank" href="<?php echo base_url('uploads/medecin_doc/'.$d['doc'])?>"><i class="fa fa-download"></i></a>
														<?php } else{?>
														<img src="<?php echo base_url('uploads/medecin_doc/'.$d['doc'])?>" width="75">
														<a target="_blank" href="<?php echo base_url('uploads/medecin_doc/'.$d['doc'])?>"><i class="fa fa-download"></i></a>
														<?php } ?>
														</td>
													</tr>
												<?php } } ?>
												</table>
											</div>
											<hr/>
											<div class="dropzone" >
											 <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                    </div>
                                                    
                                                    <h4><?php echo lang('app.help_text_uplaod_files')?></h4>
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
										  <div class="col-lg-12">
												<div class="mb-3" id="div_fornitura_provincia">
													<label for="verticalnav-phoneno-input"><?php echo lang('app.field_title_office')?> </label>
													<input type="text" name="title" class="form-control">
												</div>
											</div>										  
                                                        <div class="col-lg-6">
                                                            <div class="mb-3" id="div_fornitura_provincia">
                                                                <label for="verticalnav-phoneno-input">Provincia </label>
                                                                <?php 
																$options=array();
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
												
																			'name'  => 'comune',
																			'id'    => 'LOCALITA_FORNITURA',
																			
																			'class' => 'form-control'
																	];
																	$options=array();
																	$options['']=lang('app.field_select');
																	
																		if(!empty($list_comune)){foreach($list_comune as $kk=>$vv){
																			$options[$vv['comune']]=$vv['comune'];
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
																			'name'  => 'indirizzo',
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
																			'name'  => 'cap',
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
																			'name'  => 'phone',
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
																			'name'  => 'email',
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
		
		  
		  
   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
		
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
	 <script src="<?php echo base_url()?>/intl-tel-input-master/build/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#mobile");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
       hiddenInput: "code_mobile",
      // initialCountry: "auto",
       localizedCountries: { 'it': 'Italia' },
      // nationalMode: false,
       onlyCountries: ['it'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['it'],
       separateDialCode: true,
      utilsScript: "<?php echo base_url()?>/intl-tel-input-master/build/js/utils.js",
    });
	/*input.addEventListener("countrychange", function() { alert("");
  // do something with iti.getSelectedCountryData()
  console.log(iti.getSelectedCountryData());
 // addressDropdown.value = iti.getSelectedCountryData().country ;
});*/
  </script>	  
		 
	<script>

  $(document).ready(function(){
	  tinymce.init({
  selector: 'textarea#description',
  language: 'it'
});
tinymce.init({
  selector: 'textarea#esperto',
  language: 'it'
});
  tinymce.init({
  selector: 'textarea#experience',
  language: 'it'
});
tinymce.init({
  selector: 'textarea#academic',
  language: 'it'
});
  tinymce.init({
  selector: 'textarea#publication',
  language: 'it'
});

//	 get_provincia('sede_provincia',139); 
	// get_provincia('fattura_provincia',139); 
	sel_patologie("#js_multiselect_to_1");
		sel_prestation("#js_multiselect_to_1");
	  window.prettyPrint && prettyPrint();

    $('.js-multiselect').multiselect({
        right: '#js_multiselect_to_1',
        rightAll: '#js_right_All_1',
        rightSelected: '#js_right_Selected_1',
        leftSelected: '#js_left_Selected_1',
        leftAll: '#js_left_All_1',
		moveUp: '#multiselect_move_up_1',
		moveDown: '#multiselect_move_down_1',
		submitAllLeft:false,
		afterMoveToLeft:function($left, $right, $options){
			var s=$right.selector;
			sel_patologie(s);
			sel_prestation(s);
		},
		afterMoveToRight:function($left, $right, $options){			
			var s=$right.selector;
			sel_patologie(s);
			sel_prestation(s);
		}
    });
	$('.js-multiselect2').multiselect({
        right: '#js_multiselect_to_2',
        rightAll: '#js_right_All_2',
        rightSelected: '#js_right_Selected_2',
        leftSelected: '#js_left_Selected_2',
        leftAll: '#js_left_All_2',
		moveUp: '#multiselect_move_up_2',
		moveDown: '#multiselect_move_down_2',
		submitAllLeft:false,
    });
	$('.js-multiselect3').multiselect({
        right: '#js_multiselect_to_3',
        rightAll: '#js_right_All_3',
        rightSelected: '#js_right_Selected_3',
        leftSelected: '#js_left_Selected_3',
        leftAll: '#js_left_All_3',
		moveUp: '#multiselect_move_up_3',
		moveDown: '#multiselect_move_down_3',
		submitAllLeft:false,
    });
	
	var myDropzone =new Dropzone(".dropzone",{  
		url: "<?php echo base_url()?>/ajax/upload_user_doc" ,
		acceptedFiles:"image/*,application/pdf"
	});
	  myDropzone.on("success", function(file, response) {
		console.log(response);
		
	   });


 $('.repeater').repeater({
        defaultValues: {
            'textarea-input': 'foo',
            'text-input': 'bar',
            'select-input': 'B',
            'checkbox-input': ['A', 'B'],
            'radio-input': 'B'
        },
        show: function () {
            $(this).slideDown("fast", function() { 
				/*tinymce.init({
				  selector: '.team_description',
				  language: 'it'
				});*/
			});
			
        },
        hide: function (deleteElement) { 
             if(confirm('Sei sicuro di voler eliminare questo elemento?')) {
                $(this).slideUp(deleteElement);
				
				$("#myform").append("<input type='hidden' name='ids_family_to_delete[]' value='"+$("#id_family_to_del").val()+"'>");
            }
			
        },
        ready: function (setIndexes) {
			
			
        }
    });
    
   
   
	
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
      fr: 'Cette valeur doit ??tre un multiple de %s'
    }
  });
/*
	window.Parsley
            .addValidator('checkemail',
			{ requirementType: 'string',
			 validateString:function (value, requirement) {
                var response = false;

                $.ajax({
                    url: "<?php echo base_url('ajax/valid_user_email')?>",
                    data: {username: value},
                    dataType: 'json',
                    type: 'post',
                    async: false,
                    success: function(data) {
                        response = true;
                    },
                    error: function() {
                        response = false;
                    }
                });
                return response;
			},
            messages: {
      en: 'This value should be a multiple of %s',
      fr: 'Cette valeur doit ??tre un multiple de %s'
    }
  });*/
/*
window.Parsley.addValidator('multipleOf', {
  validateString: function(value, requirement) {
	  console.log(requirement);
	  if (jQuery(requirement).find('option').length==0) return false; else return true;
    //return value % requirement === 0;
  },
  requirementType: 'string',
  messages: {
    en: 'This value should be a multiple of .',
	 it: 'This value should be a multiple of .',
    fr: "Ce nombre n'est pas un multiple de ."
  }
});
*/
 
  var $form =  $('.custom-validation').parsley({
	  locale:'it'
	 
  });
  $form.on('form:validate', function() {
		$("#error_mail").hide(0);
	    $("#error_adr").hide(0);
		
  });
  $form.on('field:error', function() {
	 console.log('Validation failed for: ', this.$element.attr('name')); 
	 if(this.$element.attr('name')=="hidden_adr"){
		
		  $("#error_adr").show(0);
		
	 }
  });
   $form.on('form:submit', function() {
	   var response=false;
	    $.ajax({
                    url: "<?php echo base_url('ajax/valid_user_email')?>",
                    data: {email: $("#email_address").val(),id:$("#user_id").val()},
                    dataType: 'json',
                    type: 'post',
                    async: false,
                    success: function(data) {
						console.log(data);
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
  
  
   }); // end (sdocument)
   
   function family_to_del(v){
		$("#id_family_to_del").val(v);
	}		
		
  function add_adr(){
	  var formData = $("#add_addresse_form").serializeArray();
	  $.ajax({
				  url:"<?php echo base_url()?>/ajax/add_address",
				  method:"POST",
				  data:formData
				  
			}).done(function(data){
				$("#hidden_adr").val('1');
				$("#list_address").html(data);
				$("#addAddress-modal-dialog").modal('hide');
			});
	  return false;
  }
  
  function delete_adr(i){ 
	   $.ajax({
				  url:"<?php echo base_url()?>/ajax/del_address",
				  method:"POST",
				data:{i:i}
				  
			}).done(function(data){
				//$("#tr_address_"+i).remove();
				$("#list_address").html("");
				$("#list_address").html(data);
			});
  }
  function get_pos(){
			var fields = $( "#add_addresse_form" ).serializeArray();
			
			$.ajax({
				  url:"<?php echo base_url('ajax/get_map_position')?>",
				  method:"POST",
				  data:fields
				  
			}).done(function(data){
				
				var obj=JSON.parse(data);
				if(obj.error==true){
					alert(obj.validation);

				}
				else{
					$("#lat").val(obj.lat);
					$("#lng").val(obj.lon);
					return true;
				}
			});
		}
		
			function tp_med(v){
	 if(v=='C'){ $(".div_clinic").css('display', 'flex');  $(".div_medecin").hide(0);}
	 else  { $(".div_clinic").hide(0);  $(".div_medecin").css('display', 'flex');}
 }
  function sel_patologie(s){
	  var options = $(s+' option');
			$("#js_multiselect_to_2 option").prop('disabled', true);
			$(".js-multiselect2 option").prop('disabled', true);
				$("#js_multiselect_to_2 option").prop('selected', false);
			$(".js-multiselect2 option").prop('selected', false);
			var values = $.map(options ,function(option) {
				
				return option.value;
			});
			//console.log(values);
			for(var i = 0; i < values.length; i++) {
				//console.log("loop", values[i])
				$("#js_multiselect_to_2").find("option").each(function( index ) {
					var tt=$(this).data('speciality');
					var items = tt.split(',');
					if(tt.indexOf(values[i])>-1){
						$(this).prop('disabled', false);
					}
				});
				$(".js-multiselect2").find("option").each(function( index ) {
					var tt=$(this).data('speciality');
					var items = tt.split(',');
					if(tt.indexOf(values[i])>-1){
						$(this).prop('disabled', false);
					}
				});
			}
  }
  function sel_prestation(s){
	  var options = $(s+' option');
			$("#js_multiselect_to_3 option").prop('disabled', true);
			$(".js-multiselect3 option").prop('disabled', true);
				$("#js_multiselect_to_3 option").prop('selected', false);
			$(".js-multiselect2 option").prop('selected', false);
			var values = $.map(options ,function(option) {
				
				return option.value;
			});
			//console.log(values);
			for(var i = 0; i < values.length; i++) {
				//console.log("loop", values[i])
				$("#js_multiselect_to_3").find("option").each(function( index ) {
					var tt=$(this).data('speciality');
					var items = tt.split(',');
					if(tt.indexOf(values[i])>-1){
						$(this).prop('disabled', false);
					}
				});
				$(".js-multiselect3").find("option").each(function( index ) {
					var tt=$(this).data('speciality');
					var items = tt.split(',');
					if(tt.indexOf(values[i])>-1){
						$(this).prop('disabled', false);
					}
				});
			}
  }
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
					var xxx="<label for='verticalnav-email-input' >Comune</label><input type='text' name='comune' id='LOCALITA_FORNITURA' class='form-control'>";
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
