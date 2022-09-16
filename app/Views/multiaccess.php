<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_multiaccess')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="<?php echo base_url()?>/intl-tel-input-master/build/css/intlTelInput.css">
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
                                    <h4 class="mb-0"><?php echo lang('app.title_page_multiaccess')?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('app.menu_multiaccess')?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
 <?php //echo $validation->listErrors()
			 if(isset($validation)){?>
			 <div class="alert alert-danger" role="alert">
				 <?php echo $validation->listErrors()?>
				</div>
			 <?php }?>
			 <?php //echo $validation->listErrors()
			 if(isset($error)){?>
			 <div class="alert alert-danger" role="alert">
				 <?php echo $error?>
				</div>
			 <?php }?>
			  <?php //echo $validation->listErrors()
			 if(isset($success)){?>
			 <div class="alert alert-success" role="alert">
				 <?php echo $success?>
				</div>
			 <?php }?>
                     <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                      <h4><?php echo lang('app.title_section_add_mobile')?></h4>

                                        <div class="row">
                                            
                                            <div class="col-lg-12 ms-lg-auto">
                                                <div class="mt-5 mt-lg-4">
                                                   
                                                    
                                                    <?php $attributes = ['class' => 'custom-validation','novalidate'=>true, 'id' => '','method'=>'post' ,  'accept-charset'=>"UTF-8"];
									echo form_open('', $attributes);?>
                                                       <input type="hidden" name="action" value="add">
                                                       
                                                        <div class="row justify-content-end">
                                                            <div class="col-sm-12">
                                                             
															
																
																
																		<div class="mb-3">
																			
																			  <input type="text" required class="form-control" id="mobile" name="mobile"  value="" placeholder="1235689">
																		</div>
																
															</div>
													
											
            
                                                                <div class="mt-5">
                                                                    <button type="submit" name="submit" class="btn btn-primary w-md"><?php echo  lang('app.btn_save')?></button>
                                                                </div>
                                                            </div>
                                                      
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                       
                                       
                                    </div>
                                </div>
                            </div>
							
							
							   <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                      <h4><?php echo lang('app.title_section_add_mobile')?></h4>

                                        <div class="row">
                                            
                                            <div class="col-lg-12 ms-lg-auto">
                                                <div class="mt-5 mt-lg-4">
                                                   
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            	<tr>
													<th data-sorting="disabled"></th>
													<th><?php echo lang('app.field_mobile')?></th>
													
                                            	</tr>
                                            </thead>
                                            <tbody>
                                           <?php 
										   if(!empty($list)){
										   foreach($list as $k=>$one_customer){?>
												<tr class="odd gradeX">
													<td>
														
																<a  class="btn btn-danger" data-bs-target="#delete-modal-dialog" data-bs-toggle="modal" onclick="del_user('<?php echo $one_customer['id']?>')" href=""><?php echo lang('app.action_delete')?></a>
														
													</td>
													
												
														<td><?php echo $one_customer['mobile']?></td>
													
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
							
                        </div> <!-- end row -->
                       
                       

                       
                       
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
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

       <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform','method'=>'post'];
		echo form_open( '', $attributes);?>
		<input type="hidden" name="action" value="delete">
		<input type="hidden" name="user_to_delete" id="user_to_delete">
		<div class="modal fade" id="delete-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_delete_mobile')?></h5>
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

        <!-- apexcharts -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

          <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/dashboard.init.js"></script>

     
  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
		    <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
			  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
		 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-validation.init.js"></script>
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
     //  preferredCountries: ['it'],
       separateDialCode: true,
      utilsScript: "<?php echo base_url()?>/intl-tel-input-master/build/js/utils.js",
    });
	/*input.addEventListener("countrychange", function() { alert("");
  // do something with iti.getSelectedCountryData()
  console.log(iti.getSelectedCountryData());
 // addressDropdown.value = iti.getSelectedCountryData().country ;
});*/

function del_user(id){
			$("#user_to_delete").val(id);
		}
 

  </script>
   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
    </body>
</html>
