			<!--div class="notice-top-bar p-relative z-index-1 bg-secondary">
				<div class="container">
					<div class="row justify-content-center py-2">
						<div class="col-9 col-md-12 text-center">
							<p class="text-color-light mb-0 font-weight-semibold text-2">Join our Community of Marketers. <a href="#" class="btn btn-link text-decoration-none p-0 m-0 btn-dash ms-1 text-light">Apply Now</a></p>
						</div>
					</div>
				</div>
			</div-->

			<header id="header" class="header-transparent" data-plugin-options="{'stickyScrollUp': true, 'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 42, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body header-body-bottom-border border-top-0">
					<div class="header-container container p-static">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="<?php echo base_url()?>">
											<img src="https://app.creazioneimpresa.it/Minible_v2.0.0/Admin/dist/assets/images/orizzontale-black.png" class="img-fluid" width="200" height="33" alt="" />
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-effect-1">
										<div class="header-nav-main header-nav-main-text-capitalize header-nav-main-square header-nav-main-arrows header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li>
														<a href="<?php echo base_url()?>" class="nav-link <?php if($menuitem=='home') echo 'active'?>">
															Home
														</a>
													</li>
													<li>
														<a target="_blank" href="https://creazioneimpresa.net/relazione-di-impatto/" class="nav-link">
															Chi Siamo
														</a>
													</li>
													<li>
														<a target="_blank" class="nav-link" href="https://creazioneimpresa.net/">
															About
														</a>
													</li>
													<li>
														<a class="nav-link <?php if($menuitem=='prezzi') echo 'active'?>" href="<?php echo base_url('prezzi')?>">
															Prezzi
														</a>
													</li>
													<li>
														<a class="nav-link <?php if($menuitem=='faq') echo 'active'?>" href="<?php echo base_url('faq')?>">
															FAQ
														</a>
													</li>
													
													<li>
														<a target="_blank" class="nav-link" href="https://creazioneimpresa.net/creazioneimpresa/">
															Blog
														</a>
													</li>
													<li>
														<a target="_blank" class="nav-link" href="https://creazioneimpresa.net/creazioneimpresa-2/">
															Contatti
														</a>
													</li>
												</ul>
											</nav>
										</div>
									</div>

									<ul class="header-extra-info d-none d-xxl-block mt-2 mx-3">
										<li class="d-none d-sm-inline-flex ms-0 font-weight-semibold">
											<div class="d-flex align-items-center">
												<i class="icons icon-phone text-8 text-color-primary me-2"></i>
												<a href="tel:+390287178674" class="text-decoration-none text-3 text-dark text-color-hover-primary">02 87178674</a>
											</div>
										</li>
									</ul>

									<a href="<?php echo base_url('register')?>" class="btn btn-modern btn-primary box-shadow-6 border-0 text-transform-none btn-dash ms-3 d-none d-xl-inline-block">REGISTRATI ORA</a>

									<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
										<i class="fas fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>