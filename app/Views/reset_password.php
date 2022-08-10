<!doctype html>
<html lang="it">

    <head>
        
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_reset')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" CONTENT="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
        <meta content="Creazioneimpresa" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo CAPTCHA_PUBLIC?>"></script>
    </head>

    <body class="authentication-bg">

      
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="<?php echo base_url()?>/login" class="mb-5 d-block auth-logo">
                                <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/orizzontale-black.png" alt="" height="22" class="logo logo-dark">
                                <img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="22" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 

                                <div class="text-center mt-2">
                                    <h5 class="text-primary"><?php echo lang('app.title_page_reset')?></h5>
                                   
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
                                   <?php $attributes = ['class' => 'custom-validation','novalidate'=>true, 'id' => 'register-form','method'=>'post' ,  'accept-charset'=>"UTF-8"];
									echo form_open( base_url('resetPassword/'.$exist[0]['email'].'/'.$exist[0]['token']), $attributes);
									$input = [
												'type'  => 'hidden',
												'name'  => 'redirect_url',
												'id'    => 'redirect_url',
											
												'value' => $redirect_url
												
										];

										echo form_input($input);
					$input = [
												'type'  => 'hidden',
												'name'  => 'email',
												'id'    => 'email',
												'value' =>$exist[0]['email'],
												'placeholder' =>lang('app.field_password'),
												'class' => 'form-control'
												
										];echo form_input($input);
										$input = [
												'type'  => 'hidden',
												'name'  => 'token',
												'id'    => 'token',
												'value' =>$exist[0]['token'],
												'placeholder' =>lang('app.field_password'),
												'class' => 'form-control'
												
										];echo form_input($input);?>
        
                                       
                                      
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword"><?php echo lang('app.field_password')?></label>
                                          <?php $input = [
												'type'  => 'password',
												'name'  => 'subscribe_password',
												'id'    => 'subscribe_password',
												'class' => 'form-control',
												'required'=>true,
												'placeholder' =>"Password"
										];

										echo form_input($input);?>
                                        </div>
									<div class="mb-3">
                                            <label class="form-label" for="userpassword"><?php echo lang('app.field_confirm_password')?></label>
                                          <?php $input = [
												'type'  => 'password',
												'name'  => 'subscribe_confirm_password',
												'id'    => 'subscribe_confirm_password',
												'class' => 'form-control',
												 'data-parsley-equalto'=>'#subscribe_password',
												'required'=>true,
												 
												'placeholder' =>lang('app.field_confirm_password')
										];

										echo form_input($input);?>
                                        </div>
                                        
                                         <div class="mt-3 text-end">
										 <button class="g-recaptcha btn btn-primary w-sm waves-effect waves-light" 
        data-sitekey="<?php echo CAPTCHA_PUBLIC?>"
        data-callback='onSubmit' 
        data-action='submit'><?php echo  lang('app.btn_reset')?></button>
										 
                              
                                           
                                        </div>
            
                                       

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0"><?php echo lang('app.have_account')?> <a href="<?php echo base_url('login')?>" class="fw-medium text-primary"> <?php echo lang('app.btn_login')?></a></p>
                                        </div>
                                     <?php echo form_close();?>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                           <?php echo view('includes/copyright');?>
                        </div>

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
		   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
		    <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
		 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-validation.init.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("register-form").submit();
   }
 </script>
    </body>
</html>
