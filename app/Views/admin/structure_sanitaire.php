<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_structure_sanitaire')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
		<?php echo csrf_meta()?>
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
		 <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
                                    <h4 class="mb-0"><?php echo lang('app.title_page_structure_sanitaire')?></h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                           
											
											  <li class="breadcrumb-item active"><?php echo lang('app.menu_structure_sanitaire')?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-12">
								<div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="uil uil-search me-3"></i><?php echo lang('app.advanced_search')?><a data-bs-target="#add-modal-dialog"  data-bs-toggle="modal"  name="add" class="btn btn-success" style="float:right"><?php echo  lang('app.btn_add')?></a></h5>
                                    </div>
                                    <div class="card-body">
                                       
                                        <p class="card-text">
									
										<?php $attributes = ['class' => 'row row-cols-lg-auto gx-3 gy-2 align-items-center', 'method' => 'post','id'=>'search_form'];
echo form_open(base_url('admin/structureSanitaire'), $attributes);?>
										<div class="col-12">
                                                  <label class="visually-hidden" for="specificSizeInputName"><?php echo  lang('app.field_title')?></label>
                                                  <input type="text" name="search_text" value="<?php echo $search_text ?? ''?>" class="form-control" id="specificSizeInputName" placeholder="<?php echo  lang('app.field_title')?>">
                                            </div>
											
										<div class="col-12">
                                               <button type="submit" name="search" class="btn btn-secondary"><?php echo  lang('app.btn_search')?></button>
											   <button type="button" name="clear" class="btn btn-danger" onclick="reset_form()"><?php echo  lang('app.btn_reset')?></button>
                                           </div>
									
									
										</form>
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
										 if(isset($success)){?>
										 <div class="alert alert-success" role="alert">
											 <?php echo $success?>
											</div>
										 <?php }?>
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            	<tr>
													<th data-sorting="disabled"></th>
													<th><?php echo lang('app.field_title')?></th>
													
												
                                            	</tr>
                                            </thead>
                                            <tbody>
                                           <?php 
										   if(!empty($list)){
										   foreach($list as $k=>$one_customer){?>
												<tr class="odd gradeX">
													<td>
														<div class="dropdown mt-4 mt-sm-0">
															<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																Azione <i class="mdi mdi-chevron-down"></i>
															</button>
															<div class="dropdown-menu">
																
																<a class="dropdown-item" data-bs-target="#edit-modal-dialog" data-bs-toggle="modal" onclick="get_data('<?php echo $one_customer['id']?>')" href=""><?php echo lang('app.action_update')?></a>
																<hr>
																<a class="dropdown-item" data-bs-target="#delete-modal-dialog" data-bs-toggle="modal" onclick="del_user('<?php echo $one_customer['id']?>')" href=""><?php echo lang('app.action_delete')?></a>
															</div>
														</div>
													</td>
													
													<td><?php echo $one_customer['title']?></td>
													
													
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

<?php $attributes = ['class' => 'custom-validation', 'method' => 'post'];
echo form_open(base_url('admin/structureSanitaire'), $attributes);?>
<input type="hidden" name="action" value="add">
				<div class="modal fade" id="add-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_new_structure_sanitaire')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					
		
					<div class="modal-body" id="">
						
                                                        
														
					
						<div class="row mb-4">
							<label for="horizontal-email-input" class="col-sm-3 col-form-label"><?php echo lang('app.field_title')?> <code>*</code></label>
							<div class="col-sm-9">
								<?php $input = [
	'type'  => 'text',
	'name'  => 'title',
	'id'    => 'title',
	'class' => 'form-control',
'required'=>true,

];

							echo form_input($input);?>
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
				

	<?php $attributes = ['class' => 'custom-validation', 'method' => 'post'];
echo form_open(base_url('admin/structureSanitaire'), $attributes);?>
<input type="hidden" name="action" value="edit">
				<div class="modal fade" id="edit-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_update_structure_sanitaire')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					
		
					<div class="modal-body" id="profile_data">
					
						
                                                         
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_cancel')?></button>
						 <button type="submit" class="btn btn-success"><?php echo lang('app.btn_save')?></button>
					</div>
				</div>
			</div>
		</div>
</form>				
			   
       <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform','method'=>'post'];
		echo form_open( base_url($prefix_route.'structureSanitaire'), $attributes);?>
		<input type="hidden" name="action" value="delete">
		<input type="hidden" name="user_to_delete" id="user_to_delete">
		<div class="modal fade" id="delete-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_delete_structure_sanitaire')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
					</div>
					
		
					<div class="modal-body" id="">
						<?php  echo lang('app.alert_msg_delete_structure')?>
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close')?></button>
						<input type="submit" name="delete" class="btn btn-danger" value="<?php echo lang('app.btn_delete')?>">
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
 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/js/select2.min.js"></script>
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
$(".select2").select2({
	placeholder: "<?php echo lang('app.field_select')?>",
	allowClear: true
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


	
	function get_data(id){ 
		var csrfName ="X-CSRF-TOKEN"; // CSRF Token name
        var csrfHash = $("meta[name="+csrfName+"]").attr('content'); // CSRF hash
	 
			$.ajax({  
				url:"<?php echo base_url()?>/admin/structureSanitaire/update",				
				type: 'post',
				data:{id:id,"<?php echo csrf_token()?>":csrfHash},
				success:function(data){
					var	obj=JSON.parse(data);
					$("meta[name="+csrfName+"]").attr('content',obj.csrf);	
					$("input[name=<?php echo csrf_token()?>]").val(obj.csrf);									
					$("#profile_data").html(obj.html);
					$(".select2").select2({
						placeholder: "<?php echo lang('app.field_select')?>",
						allowClear: true
					});
				}  
			});

		}
		
		
		function del_user(id){
			$("#user_to_delete").val(id);
		}
		
		function reset_form(){
			$(':input','#search_form')
  .not(':button, :submit, :reset, :hidden')
  .val('')
  .prop('checked', false)
  .prop('selected', false);
  $('.select2').val(null).trigger('change');
		}
	</script>
    </body>
</html>
