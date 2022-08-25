<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_staff_list')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
			<?php echo csrf_meta()?>
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/header.php')?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.title_page_staff_list')?></h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                           
											
											  <li class="breadcrumb-item active"><?php echo lang('app.title_menu_staff')?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-12">
								<div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="uil uil-search me-3"></i><?php echo lang('app.advanced_search')?><a href="<?php echo base_url($prefix_route.'/staffMedical/new')?>"  name="add" class="btn btn-success" style="float:right"><?php echo  lang('app.btn_add')?></a></h5>
                                    </div>
                                    <div class="card-body">
                                       
                                        <p class="card-text">
									
										  <?php $attributes = ['class' => 'row  gx-3 gy-2 align-items-center', 'id' => 'search_form','method'=>'post'];
											echo form_open( base_url($prefix_route.'/staffMedical'), $attributes);?>
										<div class="col-3">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo lang('app.field_role')?></label>
                                                  <select onchange="sel_filtre(this.value)" name="search_role" class="form-control" id="specificSizeInputName" placeholder="<?php echo lang('app.field_role')?>">
												  <option value="" <?php if($search_role=='' || !isset($search_role)) echo 'selected'?>><?php echo lang('app.field_role')?></option>
												   <option value="M" <?php if($search_role=='M') echo 'selected'?>> <?php echo lang('app.field_medecin')?></option>
												    <option value="C"  <?php if($search_role=='C') echo 'selected'?>> <?php echo lang('app.field_clinic')?></option>
												  </select>
                                            </div>
										<div class="col-3">
										  <label class="visually-hidden" for="specificSizeInputName"><?php echo lang('app.field_speciality')?></label>
										 <select name="search_speciality" class="form-control" >
											<option value="" <?php if($search_speciality=='' || !isset($search_speciality)) echo 'selected'?>><?php echo lang('app.field_speciality')?></option>
											<?php if(!empty($list_speciality)){
												foreach($list_speciality as $k=>$v){?>
												<option value="<?php echo $v['id']?>" <?php if($search_speciality==$v['id']) echo 'selected'?>><?php echo $v['title']?></option>
											<?php } }?>  
											</select>
										</div>
										<div class="col-3">
										  <label class="visually-hidden" for="specificSizeInputName"><?php echo lang('app.field_patologie')?></label>
										 <select name="search_patologie" class="form-control" >
											<option value="" <?php if($search_patologie=='' || !isset($search_patologie)) echo 'selected'?>><?php echo lang('app.field_patologie')?></option>
											<?php if(!empty($list_patologie)){
												foreach($list_patologie as $k=>$v){?>
												<option value="<?php echo $v['id']?>" <?php if($search_patologie==$v['id']) echo 'selected'?>><?php echo $v['title']?></option>
											<?php } }?>  
											</select>
										</div>
										<div class="col-3">
										  <label class="visually-hidden" for="specificSizeInputName"><?php echo lang('app.field_prestation')?></label>
										 <select name="search_prestation" class="form-control" >
											<option value="" <?php if($search_prestation=='' || !isset($search_prestation)) echo 'selected'?>><?php echo lang('app.field_prestation')?></option>
											<?php if(!empty($list_prestation)){
												foreach($list_prestation as $k=>$v){?>
												<option value="<?php echo $v['id']?>" <?php if($search_prestation==$v['id']) echo 'selected'?>><?php echo $v['title']?></option>
											<?php } }?>  
											</select>
										</div>
											<div class="col-3">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_email')?></label>
                                                  <input type="text" name="search_email" value="<?php echo $search_email ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_email')?>">
                                            </div>
											<div class="col-3 div_clinic" style="display:none" >
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_company_name')?></label>
                                                  <input type="text" name="search_company" value="<?php echo $search_company ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_company_name')?>">
                                            </div>
											
											<div class="col-3 div_medecin"  style="display:none">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_cf')?></label>
                                                  <input type="text" name="search_cf" value="<?php echo $search_cf ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_cf')?>">
                                            </div>
											<div class="col-3 div_clinic"  style="display:none">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_piva')?></label>
                                                  <input type="text" name="search_piva" value="<?php echo $search_piva ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_piva')?>">
                                            </div>
										<div class="col-3 div_medecin"  style="display:none">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_first_name')?></label>
                                                  <input type="text" name="search_nome" value="<?php echo $search_nome ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_first_name')?>">
                                            </div>
											<div class="col-3 div_medecin"  style="display:none">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_last_name')?></label>
                                                  <input type="text" name="search_cognome" value="<?php echo $search_cognome ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_last_name')?>">
                                            </div>
											
										<div class="col-12">
                                               <button type="submit" name="search" class="btn btn-secondary"><?php echo  lang('app.btn_search')?></button>
											      <button type="button" name="reset" class="btn btn-danger" onclick="reset_search()"><?php echo  lang('app.btn_reset')?></button>
                                           </div>
									
									
										<?php echo form_close()?>
										</p>
                                    </div>
                                </div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
								  <div class="card-header bg-transparent border-primary">
								  <h4 class="my-0 text-primary"><i class="uil uil-list-ul me-3"></i><?php echo lang('app.title_section_result')?></h4>
								  </div>
                                    <div class="card-body">
                                               
										 
                                       <?php 
										 if(isset($validation)){?>
										 <div class="alert alert-danger" role="alert">
											 <?php echo $validation->listErrors()?>
											</div>
										 <?php }?>
							 <?php 
										 if(isset($error)){?>
										 <div class="alert alert-danger" role="alert">
											 <?php echo $error?>
											</div>
										 <?php }?>
										  <?php 
										   if(session()->get('success')!==null){?>
										 <div class="alert alert-success" role="alert">
											 <?php echo session()->get('success')?>
											</div>
										 <?php }
										 if(isset($success)){?>
										 <div class="alert alert-success" role="alert">
											 <?php echo $success?>
											</div>
										 <?php }?>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            	<tr>
													<th data-sorting="disabled"></th>
													<th><?php echo lang('app.field_role')?></th>
													<th><?php echo lang('app.field_email')?></th>
													<th><?php echo lang('app.field_company_name')?></th>
													<th><?php echo lang('app.field_address')?></th>
													<th>C.F/<?php echo lang('app.field_piva')?></th>
													<th></th>
                                            	</tr>
                                            </thead>
                                            <tbody>
                                           <?php 
										   if(!empty($list)){
										   foreach($list as $k=>$one_customer){?>
												<tr class="odd gradeX">
													<td>
														<div class="dropdown mt-4 mt-sm-0">
															<button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																Azione <i class="mdi mdi-chevron-down"></i>
															</button>
															<div class="dropdown-menu">
																<!--a class="dropdown-item" data-bs-target="#profile-modal-dialog" data-bs-toggle="modal" onclick="get_data('<?php echo $one_customer['user_id']?>')" href=""><?php echo lang('app.action_profile')?></a-->
																
																<a  class="dropdown-item" href="<?php echo base_url($prefix_route.'/staffMedical/edit/'.$one_customer['user_id'])?>"><?php echo lang('app.action_update')?></a>
																<hr>
																<a class="dropdown-item" data-bs-target="#delete-modal-dialog" data-bs-toggle="modal" onclick="del_user('<?php echo $one_customer['user_id']?>')" href=""><?php echo lang('app.action_delete')?></a>
															</div>
														</div>
													
													</td>
													
												
														<td><?php echo $one_customer['role']?></td>
													<td><?php echo $one_customer['account_email']?></td>
												
													<td><?php if($one_customer['role']=="M") echo $one_customer['cognome'].', '.$one_customer['nome']; else echo $one_customer['rafgione_sociale']; ?></td>
													<td>
													<?php if(!empty($one_customer['list_offices'])){
														foreach($one_customer['list_offices'] as $kk=>$vv){?>
														<li><?php echo $vv['indirizzo'].' '.$vv['comune'].'('.$vv['provincia'].') '.$vv['cap']?></li>
													<?php }}?>
													</td>
													<td><?php if($one_customer['role']=="M") echo $one_customer['fattura_cf']; else echo $one_customer['fattura_piva'];?></td>
													<td></td>
												</tr>
										   <?php } }?>
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        
                    </div>
                </div>
   
       <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform','method'=>'post'];
		echo form_open( base_url($prefix_route.'/staffMedical'), $attributes);?>
		<input type="hidden" name="action" value="delete">
		<input type="hidden" name="user_to_delete" id="user_to_delete">
		<div class="modal fade" id="delete-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_delete_customer')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
					</div>
					
		
					<div class="modal-body" id="">
						<?php  echo lang('app.alert_msg_delete_user')?>
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close')?></button>
						<input type="submit" name="delete" class="btn btn-danger" value="<?php echo lang('app.btn_delete')?>">
					</div>
				</div>
			</div>
		</div>
         </form>
          

<div class="modal fade" id="profile-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_client_profile')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
					</div>
					
		
					<div class="modal-body" id="profile_data">
						
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close')?></button>
					
					</div>
				</div>
			</div>
		</div>

<div class="modal fade" id="attachment-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_client_attachment')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
					</div>
					
		
					<div class="modal-body" id="attachment_data">
						
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close')?></button>
					
					</div>
				</div>
			</div>
		</div>

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
        <!-- END layout-wrapper -->

      

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

			 <!-- Required datatable js -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		
          <!-- Responsive examples -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/datatables.init.js"></script>
<script>
$("#datatable").DataTable({
		language: {
				url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json'
			},
			searching: false
			
			});
</script>
 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>

        <!--script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-validation.init.js"></script-->
      <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
	  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
	  <script>
  $('.custom-validation').parsley({
	  locale:'it'
  });
</script>
<script>
function reset_search(){
$(':input','#search_form')
  .not(':button, :submit, :reset, :hidden')
  .val('')
  .prop('checked', false)
  .prop('selected', false);
}
		function get_data(id){ 
			$.ajax({  
				url:"<?php echo base_url()?>/admin/customers/profile",
				type: 'post',
				
				data:{id:id},
				success:function(data){ 
					$("#profile_data").html(data);
				}  
			});

		}

function sel_filtre(v){
$(".div_clinic").hide(0);
$(".div_medecin").hide(0);
if(v=='M') $(".div_medecin").show(0);
if(v=='C') $(".div_clinic").show(0);
}	
		function get_attachment(id){ 
			$.ajax({  
				url:"<?php echo base_url()?>/admin/customers/attachments",
				type: 'post',
				
				data:{id:id},
				success:function(data){ 
					$("#attachment_data").html(data);
				}  
			});

		}
		
		function del_user(id){
			$("#user_to_delete").val(id);
		}
	</script>
    </body>
</html>
