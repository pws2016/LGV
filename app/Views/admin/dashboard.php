<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_dashboard')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<style>
			h3.post__title.expand:before {width: 100px;}
			h3.post__title:before {content: "";width: 0;height: 10px;background-color: #FF7700;position: absolute;top: 0;transition: width 0.5s;}
		</style>
    </head>

    <!--body data-layout="horizontal" data-topbar="colored"-->
	<body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/header.php')?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.title_page_dashboard')?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('app.menu_dashboard')?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                     <div class="row">
					 <?php if(!empty($list_projects)){
						 foreach( $list_projects as $one_project){?>
						 
						 <div class="col-md-6">
						 		<div class="card bg-primary" style="background-color: #FAFAFA !important;">
                            		<div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-sm-8">
                                                <h3 class="post__title expand"></h3>
												                                               
												<?php echo $one_project['description']?>
                                                <div class="mt-4">
                                                    <a href="<?php echo base_url('chooseProject/'.$one_project['id'])?>" class="btn btn-outline-warning waves-effect waves-light"><?php echo lang('app.btn_manage')?></a>
                                                </div>
												
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="mt-4 mt-sm-0">
                                                    <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/setup-analytics-amico.svg" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
						 	</div>
						 
						 
					 <?php } }?> 
                        </div>
                           <div class="row">
                            <div class="col-12">
                                <div class="card">
								
                                    <div class="card-body">
        <h4><?php echo lang('app.title_section_last_invoices')?></h4>
                                        <!--h4 class="card-title"><a data-bs-target="#add-modal-dialog"  data-bs-toggle="modal"  name="add" class="btn btn-success float-right"><?php echo  lang('app.btn_add')?></a></h4-->
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
												<tr class="bg-transparent">
													<th style="width: 120px;">&nbsp;</th>
													<th><?php echo lang('app.field_invoice')?></th>
													<th><?php echo lang('app.field_date')?></th>
													<th><?php echo lang('app.field_billed_to')?></th>
													<th><?php echo lang('app.field_total')?></th>
													<th><?php echo lang('app.field_status')?></th>
													<th><?php echo lang('app.field_payment_method')?></th>
												</tr>
                                            </thead>
        
        
                                            <tbody>
											
                                           <?php 
										   if(!empty($list_invoices)){
										   foreach($list_invoices as $k=>$one_customer){?>
												<tr class="odd gradeX">
													<td>
														<div class="dropdown mt-4 mt-sm-0">
															<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																Azione <i class="mdi mdi-chevron-down"></i>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="<?php echo base_url($prefix_route.'invoices/details/'.$one_customer['id'])?>">Dettaglio pagamento </a>
																<a class="dropdown-item" target="_blank" href="<?php echo $one_customer['pdf']?>">Dettaglio fattura (FIC)</a>
																<hr>
																<?php if($one_customer['pdf_type']!=""){
											   if($one_customer['pdf_type']=="simple") $url= base_url($prefix_route.'/requests/download_bp_pdf/'.$one_customer['request_id']);
											   if($one_customer['pdf_type']=="full") $url= base_url('/requests/certificazione/zip/'.$one_customer['request_id']);
																?>
																<a class="dropdown-item" target="_blank" href="<?php echo $url?>">Scarica PDF</a>
																<?php } ?>
																
															</div>
														</div>
													</td>
													<td><?php echo $one_customer['num']?></td>
													<td><?php echo date('d/m/Y',strtotime($one_customer['date']))?></td>
													<td><a class="text-primary" data-bs-target="#client-profile-modal-dialog" data-bs-toggle="modal" onclick="get_client_profile('<?php echo $one_customer['user_id']?>')"><?php echo $one_customer['billing_name']?></a></td>
													<td><?php echo $one_customer['amount']?> €</td>
													<td><div class="badge bg-soft-success font-size-12"><?php echo lang('app.field_status_paid')?></div></td>
													<td><?php echo $one_customer['payment_method']?></td>
													
												</tr>
										   <?php } }?>
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
 <div class="modal fade" id="client-profile-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_client_profile')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
					</div>
					
		
					<div class="modal-body" id="div_client_profile">
						
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

      

          <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/dashboard.init.js"></script>

      <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
<script>
function get_client_profile(id){ 
	$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_client_profile",
				  method:"POST",
				  data:{id:id}
				  
			}).done(function(data){
			
				$("#div_client_profile").html(data);
			});
}
	</script>
    </body>
</html>
