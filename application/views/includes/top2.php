<div class="header-area Home2">
            <!--top header-->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-4">
                            <div class="cl-h-t-info">
                                <ul>
                                    <li><a href="<?= $host ?>ingresar"><i class="fa fa-bars"></i>mi cuenta</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-4">
                            <div class="classic-logo">
                                <a href="<?= $host ?>">
									<img src="<?= $host ?>assets/img/logo3_big_blue.png" alt="dateando.cl">
								</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="header-info c-l">
                                <ul>
                                    <?php if($signedIn) { ?>
										<li>
											<span style="color:#000"><?= $nombreUsuario ?><i id="more-logged-in-top" class="fa fa-angle-double-down"></i></span>
											<div class="logged-in-top top2">
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
            </div>
            <!--header-bottom-->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs col-sm-8 col-md-8">
                            <div class="header-menu home2">  
								<ul id="nav">
									<?php $this->load->view("includes/menu"); ?>
								</ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 ol-md-4">
                            <div class="h-search-btn">                                                  
                                <div class="classic-search">
                                    <form action="#">
                                        <input type="text" placeholder="Buscar dato">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--mobile menu satrt-->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
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