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
	<body data-keep-enlarged="true" class="vertical-collpsed">
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
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="total-revenue-chart"></div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1">$<span data-plugin="counterup">34,152</span></h4>
                                            <p class="text-muted mb-0">Total Revenue</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="orders-chart"> </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span ><?php echo $nb_patients?></span></h4>
                                            <p class="text-muted mb-0"><?php echo lang('app.title_stats_tot_patients')?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <div id="customers-chart"> </div>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $nb_staff?></span></h4>
                                            <p class="text-muted mb-0"><?php echo lang('app.title_stats_tot_staff')?></p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            
                        </div> <!-- end row-->

                   
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
