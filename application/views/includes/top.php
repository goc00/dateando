<div class="header-area home1">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="classic-logo">
					<a href="<?= $host ?>">
						<img src="<?= $host ?>assets/img/logo3_yellow.png" alt="dateando.cl">
					</a>
				</div>
			</div>
			<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
				<div class="header-menu">                                                  
					<ul id="nav">
						<?php $this->load->view("includes/menu"); ?>
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="header-info">
					<ul>
						
						<?php if($signedIn) { ?>
							<li>
								<span style="color:#fff"><?= $nombreUsuario ?><i id="more-logged-in-top" class="fa fa-angle-double-down"></i></span>
								<div class="logged-in-top">
									<ul>
										<li><a href="<?= $host ?>cuenta/tus-datos">Tus Datos</a></li>
										<li><a href="<?= $host ?>usuario/logout">Cerrar Sesi&oacute;n</a></li>
									</ul>
								</div>
							</li>
						<?php } else { ?>
							<li><a href="<?= $host ?>ingresar">Ingresar</a></li>
							<li><a href="<?= $host ?>registro">Reg&iacute;strate</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!--mobile menu start-->
	<div class="mobile-menu-area home1">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav id="dropdown">
						<ul>
							<?php $this->load->view("includes/menu"); ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>    
	</div>
<!--mobile menu end-->     
</div>