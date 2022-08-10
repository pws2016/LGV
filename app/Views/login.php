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
									 if(isset($_REQUEST['success'])){?>
									 <div class="alert alert-success" role="alert">
										 <?php echo $_REQUEST['success']?>
										</div>
									 <?php }?>
                                   <?php $attributes = ['class' => '', 'id' => 'register-form','method'=>'post' ,  'accept-charset'=>"UTF-8"];
									echo form_open(base_url('login'), $attributes);?>
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Email</label>
											<?php $input = [
												'type'  => 'email',
												'name'  => 'login_email',
												'id'    => 'login_email',
												'class' => 'form-control',
												'placeholder' =>"Email"
										];
 
										echo form_input($input);
										?>
                                           
                                        </div>
                
                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="<?php echo base_url('forgotPassword')?>" class="text-muted"><?php echo lang('app.forget_password')?></a>
                                            </div>
                                            <label class="form-label" for="userpassword"><?php echo lang('app.field_password')?></label>
                                           <?php $input = [
												'type'  => 'password',
												'name'  => 'login_password',
												'id'    => 'login_password',
												'class' => 'form-control',
												'placeholder' =>"Password"
										];
										echo form_input($input);?>
                                        </div>
                
                                      
                                        <div class="mt-3 text-end">
										 <?php /*<a class="btn btn-info w-sm waves-effect waves-light" href="<?php echo base_url('loginAsGuest')?>"><?php echo lang('app.btn_login_guest')?></a>*/?>
											
											
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit"><?php echo lang('app.btn_login')?></button>
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

        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("register-form").submit();
   }
 </script>
    </body>
</html>
