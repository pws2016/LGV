<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<!--script src="https://www.google.com/recaptcha/api.js?render=<?php echo CAPTCHA_PUBLIC?>"></script-->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MES0LPRMPP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MES0LPRMPP');
</script>
    </head>
    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="<?php echo base_url()?>/login" class="mb-5 d-block auth-logo">
                                <img src="<?php echo base_url('logo_completo.svg')?>" alt="" height="200" class="logo logo-dark">
                                <img src="<?php echo base_url('logo_completo.svg')?>" alt="" height="200" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                           
                            <div class="card-body p-4">
								<div class="row">
									<div class="col-lg-6"><img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/login-bp.png" class="img-fluid"></div>
									<div class="col-lg-6">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary"><?php echo lang('app.title_page_login')?></h5>
                                   
                                </div>
                                <div class="p-2 mt-4">
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
									  <?php //echo $validation->listErrors()
									 if(isset($_REQUEST['success'])){?>
									 <div class="alert alert-success" role="alert">
										 <?php echo $_REQUEST['success']?>
										</div>
									 <?php }?>
                                   <?php $attributes = ['class' => 'row row-cols-lg-auto gx-3 gy-2 align-items-center', 'id' => 'register-form','method'=>'post' ,  'accept-charset'=>"UTF-8"];
									echo form_open(base_url('smsAuth'), $attributes);?>
									<input type="hidden" name="action" value="send">
												<div class="col-12">
													<select name="mobile" class="form-control">
														<option value="default"><?php echo substr($defaultphone, 0, 4) . "*******" . substr($defaultphone, 10);?></option>
														<?php if(!empty($list_mobile)){
															foreach($list_mobile as $k=>$v){?>
															<option value="<?php echo $v['id']?>"><?php echo substr($v['mobile'], 0, 4) . "*******" . substr($v['mobile'], 10);?></option>
														<?php } } ?>
													</select>
                                               
                                                </div>
											<div class="col-12">
                                                  <button type="submit" class="btn btn-primary w-sm waves-effect waves-light"><?php echo lang('app.btn_get_code')?></button>
                                                </div>
                                          
                                      
                                  <?php echo form_close();?>
								  <hr/>
								  <?php $attributes = ['class' => 'row row-cols-lg-auto gx-3 gy-2 align-items-center', 'id' => 'register-form','method'=>'post' ,  'accept-charset'=>"UTF-8"];
									echo form_open(base_url('smsAuth'), $attributes);?>
									<input type="hidden" name="action" value="validate">
												<div class="col-12">
													<input id="input-mask" name="code" class="form-control input-mask" data-inputmask="'mask': '9-9-9-9-9-9'">
                                              
                                                </div>
											<div class="col-12">
                                                  <button type="submit" class="btn btn-info w-sm waves-effect waves-light"><?php echo lang('app.btn_valid')?></button>
                                                </div>
                                          
                                      
                                  <?php echo form_close();?>
                                </div>
									</div></div>
                            </div>
							<!-- end card-body -->
                        </div> 
<!-- end card -->
                    </div>
					<div class="mt-5 text-center">
						<?php echo view('includes/copyright');?>
					</div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
 <!-- form mask -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>
		  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-mask.init.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("register-form").submit();
   }
 </script>
 
    </body>
</html>
