<?php $this->load->view("includes/header"); ?>
    
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <!--header-area start-->
        <?php $this->load->view("includes/top2"); ?>
		<!--header-area end-->
		
	
        <!--my account area start-->
        <div class="my-a-w-title"></div>
		
        <!--my-account description-->
        <div class="my-acount-desc">
            <div class="container">
                <div class="container-inner">
					
					<!-- <form>
						<div class="form-group">
							<label for="titulo_txt">Nombre de Usuario:</label>
							<input type="text" class="form-control" id="titulo_txt" />
						</div>
						
						<div class="form-group">
							<label for="titulo_txt">Contrase&ntilde;a:</label>
							<input type="text" class="form-control" id="titulo_txt" />
						</div>
					</form> -->
					
						
						<div class="col-md-2"></div>
						
						<div class="col-md-8">
							
							<div style="margin:auto">
								
								<button id="login-fb" class="btn btn-lg btn-block btn-facebook">Ingresar con Facebook</button>
								<button id="login-aceptar-fb" class="btn btn-lg btn-block btn-facebook" style="display:none" data-action="<?= $host ?>usuario/loginFbAction">Presiona aqu&iacute; para comenzar</button>
								
								<div class="divider"><strong class="divider-title ng-binding">o</strong></div>
								
								<form action="<?= $host ?>usuario/registerAction" method="post" id="frmRegistro">
									<div class="form-group">
										<!-- <label for="titulo_txt">:</label> -->
										<input type="text" class="form-control" id="username_txt" name="username_txt" placeholder="Nombre de Usuario" />
									</div>
									<div class="form-group">
										<!-- <label for="titulo_txt">:</label> -->
										<input type="text" class="form-control" id="email_txt" name="email_txt" placeholder="Correo Electr&oacute;nico" />
									</div>
									<div class="form-group">
										<!-- <label for="titulo_txt">Contrase&ntilde;a:</label> -->
										<input type="password" class="form-control" id="password_txt" name="password_txt" placeholder="Contrase&ntilde;a" />
									</div>
									<div class="form-group">
										<!-- <label for="titulo_txt">Contrase&ntilde;a:</label> -->
										<input type="password" class="form-control" id="re_password_txt" name="re_password_txt" placeholder="Repetir Contrase&ntilde;a" />
									</div>
									
									<div class="form-group" style="text-align:center">
										<button type="submit" class="btn btn-warning btn-lg" style="font-weight:bold">Registrar</button>
									</div>
									
								</form>
								
								
								<div style="margin:50px auto auto auto;text-align:center;font-size:1.1em">
									&iquest;Ya est&aacute;s registrado?, <a href="<?= $host ?>ingresar">Ingresa aqu&iacute;</a>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-2"></div>
					
					<!--  <div class="col-md-6">
						
						<div style="text-align:center;margin:auto">
						
							<h3>¿Aún no tienes cuenta?</h3>
							<div><button type="submit" class="btn btn-danger btn-lg btn-block">Regístrate</button></div>
						
						</div>
						
                        <form action="#">
                            <div class="form-fields">
                                <h2>Register</h2>
                                <p>
                                    <label>Email address  <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p>
                                    <label>Password <span class="required">*</span></label>
                                    <input type="password" />
                                </p>
                            </div>
                            <div class="form-action">
                                <input type="submit" value="Register" />
                            </div>
                        </form> 
                    </div> -->
                </div>
            </div>
        </div>
        <!--my account area end-->
     
		
         <!--footer-area start-->
       <?php $this->load->view("includes/footer"); ?>
        <!--footer-area end-->

        <?php $this->load->view("includes/scripts"); ?>
    <?php $this->load->view("includes/bottom"); ?>