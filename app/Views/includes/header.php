<header id="page-topbar">
	<div class="navbar-header">
		<div class="d-flex">
			<div class="navbar-brand-box">
				<a href="index.html" class="logo logo-dark">
					<span class="logo-sm">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="20">
					</span>
				</a>

				<a href="index.html" class="logo logo-light">
					<span class="logo-sm">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/creazioneimpresa_logo-bianco.png" alt="" height="20">
					</span>
				</a>
			</div>

			<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
				<i class="fa fa-fw fa-bars"></i>
			</button>
		</div>

		<div class="d-flex">

			<div class="dropdown d-inline-block d-lg-none ms-2">
				<button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
						data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="uil-search"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
					 aria-labelledby="page-header-search-dropdown">

					<form class="p-3">
						<div class="form-group m-0">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			
			
			<div class="dropdown d-none d-lg-inline-block ms-1">
				<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
					<i class="uil-minus-path"></i>
				</button>
			</div>

			

			<div class="dropdown d-inline-block">
				<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
						data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img class="rounded-circle header-profile-user" src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/users/avatar-9.jpg"
						 alt="Header Avatar">
					<span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php echo $user_data['display_name']?></span>
					<i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
				</button>
				<div class="dropdown-menu dropdown-menu-end">
					<!-- item-->
					<?php if($user_data['role']!='guest'){?>
					<a class="dropdown-item" href="<?php echo base_url($prefix_route.'profile');//$profile_url?>"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle"><?php echo lang('app.menu_profile')?></span></a>
					<?php } if($user_data['role']=='A'){?>
					<a class="dropdown-item d-block" href="<?php echo base_url($prefix_route.'settings')?>"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle"><?php echo lang('app.menu_setting')?></span></a>
					<?php } ?>
					<?php if($user_loginas!==null && $user_loginas['role']=='A'){?>
					<a href="<?php echo base_url('loginas_back/admin')?>" class="dropdown-item notify-item">
						<i class="uil uil-previous font-size-18 align-middle me-1 text-muted"></i>
						<span><?php echo  lang('app.menu_return_admin')?></span>
					</a>
					<?php } ?>
					<a class="dropdown-item" href="<?php echo base_url('logout')?>"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle"><?php echo lang('app.menu_logout')?></span></a>
				</div>
			</div>



		</div>
	</div>
</header>
<div class="vertical-menu">
	<div class="navbar-brand-box">
		<a href="<?php echo base_url($prefix_route.'dashboard')?>" class="logo logo-dark">
			<span class="logo-sm">
				<img src="https://app.creazioneimpresa.it/Minible_v2.0.0/Admin/dist/assets/images/logo-black-150x150-mail.png" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="https://creazioneimpresa.net/wp-content/uploads/2020/05/creazioneimpresa_logo-bianco.svg" alt="" height="20">
			</span>
		</a>

		<a href="<?php echo base_url($prefix_route.'dashboard')?>" class="logo logo-light">
			<span class="logo-sm">
				<img src="https://app.creazioneimpresa.it/Minible_v2.0.0/Admin/dist/assets/images/logo-black-150x150-mail.png" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="https://creazioneimpresa.net/wp-content/uploads/2020/05/creazioneimpresa_logo-bianco.svg" alt="" height="20">
			</span>
		</a>
	</div>

	<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
		<i class="fa fa-fw fa-bars"></i>
	</button>
	
	<div data-simplebar class="sidebar-menu-scroll">
		<div id="sidebar-menu">
			<ul class="metismenu list-unstyled" id="side-menu">
				<li>
					<a href="<?php echo base_url($prefix_route.'dashboard')?>">
						<i class="uil-home-alt"></i><span>Dashboard</span>
					</a>
				</li>
				<?php if($user_data['role']=='A'){?>
				<li>
					<a href="<?php echo base_url($prefix_route.'customers')?>">
						<i class="uil-users-alt me-2"></i><span>Lista clienti</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'agents')?>">
						<i class="uil-users-alt me-2"></i><span>Lista Agenti</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url($prefix_route.'fornitore')?>">
						<i class="uil-users-alt me-2"></i><span>Lista Fornitori</span>
					</a>
				</li>
				<?php } ?>
			
				
				
				
				
					
				
					
				<hr>
				<li class="menu-title">Profilo</li>
				<?php if($user_data['role']!='guest'){?>
				<li>
					<a href="<?php echo base_url($prefix_route.'profile');//$profile_url?>"><i class="uil uil-user-circle"></i> <span class="align-middle">Mio profilo</span></a>
				</li>
				<?php }?>
				
				<hr>
				<li>
					<a href="<?php echo base_url('logout')?>">
					<i class="uil uil-sign-out-alt"></i><span><?php echo lang('app.menu_logout')?></span></a>
				</li>
				<?php if($user_loginas!==null && $user_loginas['role']=='A'){?>
				<li>
					<a class="text-primary" href="<?php echo base_url('loginas_back/admin')?>">
						<i class="uil uil-previous"></i>
						<span><?php echo  lang('app.menu_return_admin')?></span>
					</a>
				</li>
				<?php } ?>
				</ul>
			</div>
	</div>
</div>