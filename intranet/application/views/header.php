<header id="header" class="hidden-print">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img height="10px" src="assets/img/logo.png" alt="Sistemas UNH"> </span>
				<!-- END LOGO PLACEHOLDER -->

			
			 
			</div> 
            <!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">Información:</span>
				<span><b>Tipo:</b>  <?php echo $this->session->userdata('nombre_usuario_tipo'); ?>   | <b>Usuario:</b> <?php echo $this->session->userdata('nombre_usuario').' ('.$this->session->userdata('username').')'; ?>   </span>

			 

			</div>
			<!-- end projects dropdown -->
			
			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				
               
                
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
                
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown" aria-expanded="false"> 
							<img src="assets/img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							 
						 
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> Mis datos</a>
							</li>
							<li class="divider"></li>
							 
							 
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php  echo base_url() ?>panel/cerrarLogin" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>
 				
                
                
				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php  echo base_url() ?>panel/cerrarLogin" title="Salir del sistema" data-action="userLogout" data-logout-msg="Puede mejorar aún más su seguridad después de cerrar la sesión cerrando este navegador abierto"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				 

				 

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				

				 

			</div>
			<!-- end pulled right: nav area -->

		</header>