<?php $this->load->view("includes/header"); ?>
  
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <!--header-area start-->
        <?php $this->load->view("includes/top2"); ?>
        <!--header-area end-->
		
        <!--shop header area sart-->
        <div class="shop-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shop-header-title">
                            <h2><?= $titulo ?></h2>
                        </div>
                        <div class="shop-menu">
												
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!--shop header area end-->
        <!--gird men start-->
        <div class="grid-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gird-menu">
                            <?= $actualSection ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--gird men start-->
        <!--shop-area start-->
        <div class="shop-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <!--widget caetegorie start-->
                        <div class="single-widget categories">
                            <div class="sidebar-title">
                                <h3>Categor&iacute;as</h3>
                            </div>
                            <div class="categories-list">
                                <ul>
									<?php foreach($categorias as $categoria) { ?>
										<li><a href="<?= $host."datos/categoria/".$categoria->slug ?>"><?= $categoria->descripcion ?><!-- <span>(14)</span> --></a></li>
									<?php  } ?>
                                </ul>
                            </div>
                        </div>
                        <!--widget caetegorie end-->
                        <!--widget price start-->
                       
                        <!--widget price end-->
                        <!--widget filter-by start-->
                        <div class="single-widget filter-by">
                            <div class="sidebar-title">
                                <h3>Filtrar Por</h3>
                            </div>
                            <div class="fiter-menu">
                                <ul>
									<?php foreach($montos as $monto) {?>
										<li><a href="<?= $host."datos/filtrar/".$monto->valor_str ?>"><?= $monto->valor_format ?><!-- <span class="count">(1)</span> --></a></li>
									<?php  } ?>
                            	</ul>
                            </div>   
                                
                        </div>
                        <!--widget filter-by end-->

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9">
   
                        <!--shop-list view-->
                        <div class="row">
                            <div id="listDatos" class="show-list-product another">
								<?= $datos ?>
                            </div>
                        </div>
						
						<?php if($hayDatos) { ?>
                        <div>
                            <button id="verMasBtn" type="button" data-action="<?= $host ?>datos/verMasAction" class="btn btn-primary btn-lg btn-block">Ver M&aacute;s Datos</button>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!--shop-area end-->
        
		
       <!--footer-area start-->
       <?php $this->load->view("includes/footer"); ?>
        <!--footer-area end-->

        <?php $this->load->view("includes/scripts"); ?>
    <?php $this->load->view("includes/bottom"); ?>
