<?php $this->load->view("includes/header"); ?>
  
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <!--header-area start-->
        <?php $this->load->view("includes/top2"); ?>
        <!--header-area end-->
		
        <!--header-area start-->
        <!--product header area start-->
        <div class="product-header-area">
            <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product-menu">
						<?= $actualSection ?>
					</div>
				</div>
			</div>
		</div>
        </div>
        <!--product header area end-->
        <!--product-simple area satrt-->
        <div class="product-simple-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="single-product-image">
                            <div class="single-product-tab">
                              <!-- Nav tabs -->
                              <ul role="tablist" class="nav nav-tabs">
                                <!-- <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#home"><img src="img/product/s1.jpg" alt=""></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="profile" href="#profile"><img src="img/product/s2.jpg" alt=""></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#messages"><img src="img/product/s3.jpg" alt=""></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="settings" href="#settings"><img src="img/product/s4.jpg" alt=""></a></li> -->
								<?= $navTabs ?>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <!-- <div id="home" class="tab-pane active" role="tabpanel"><img src="img/product/1.jpg" alt=""></div>
                                <div id="profile" class="tab-pane" role="tabpanel"><img src="img/product/2.jpg" alt=""></div>
                                <div id="messages" class="tab-pane" role="tabpanel"><img src="img/product/3.jpg" alt=""></div>
                                <div id="settings" class="tab-pane" role="tabpanel"><img src="img/product/4.jpg" alt=""></div> -->
								<?= $tabPanes ?>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="single-product-info">
                            <div class="product-nav">
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <h1 class="product_title"><?= $titulo ?></h1>
                            <div class="price-box">
                                <span class="new-price"><?= $precio ?></span>
                                <!-- <span class="old-price"><?= $precio ?></span> -->
                            </div>
                            <div class="pro-rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
							<div><i class="fa fa-user"></i> Publicado por: <b><?= $creador ?></b></div>
							<div><i class="fa fa-hourglass"></i> Termina en: <b><?= $tiempo ?></b></div>
                            
                            <div class="stock-status"></div>
                            <form action="#">
                                <div class="quantity">
                                    <input type="number" value="1">
									<?php
									$disabled = "";
									if($diff <= 0) $disabled = ' disabled';
									?>
                                    <button type="submit"<?= $disabled ?>>Comprar</button>
                                </div>
                            </form>
                            <div class="add-to-wishlist-p">
                                <a title="" data-toggle="tooltip" href="#" data-original-title="Agregar a Favoritos"><i class="fa fa-star"></i></a>
                            </div>
                            <div style="width:100px;margin-top:20px">
                                <!-- Buttons start here. Copy this ul to your document. -->
								<span style="font-size:.9em">Compartir en:</span>
								<ul class="rrssb-buttons clearfix">
								  <li class="rrssb-facebook">
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" class="popup">
									  <span class="rrssb-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg>
									  </span>
									  <span class="rrssb-text">facebook</span>
									</a>
								  </li>
								  <li class="rrssb-twitter">
									<!-- Replace href with your Meta and URL information  -->
									<a href="https://twitter.com/intent/tweet?text=He encontrado este excelente dato: <?= $url ?> vía www.dateando.cl @DateandoCL"
									class="popup">
									  <span class="rrssb-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg>
									  </span>
									  <span class="rrssb-text">twitter</span>
									</a>
								  </li>
								  <li class="rrssb-googleplus">
									<!-- Replace href with your meta and URL information.  -->
									<a href="https://plus.google.com/share?url=He%20encontrado%20este%20excelente%20dato%20vía%20www.dateando.cl%20@DateandoCL%20<?= $url ?>" class="popup">
									  <span class="rrssb-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"/></svg>            </span>
									  <span class="rrssb-text">google+</span>
									</a>
								  </li>
								</ul>
								<!-- Buttons end here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product-simple area end-->
        <!--product-tab area start-->
        <div class="product-tab-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="product-tabs">
                            <div>
                              <!-- Nav tabs -->
                              <ul role="tablist" class="nav nav-tabs">
                                <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="tab-desc" href="#tab-desc" aria-expanded="true">Descripci&oacute;n</a></li>
                                <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="page-comments" href="#page-comments" aria-expanded="false">Comentarios (<?= $totalFeedbacks ?>)</a></li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div id="tab-desc" class="tab-pane active" role="tabpanel">
                                    <div class="product-tab-desc">
                                        <p><?= $descripcion ?></p>
                                    </div>
                                </div>
                                <div id="page-comments" class="tab-pane" role="tabpanel">
                                    <div class="product-tab-desc">
                                        <div class="product-page-comments">
                                            <h2><?= $totalFeedbacks ?> comentario(s) para <?= $titulo ?></h2>
                                            <ul>
												<?php 
												if(!is_null($feedbacks))
													foreach($feedbacks as $feedb) { ?>
                                                <li>
                                                    <div class="product-comments">
                                                        <img alt="" src="img/avatar.png">
                                                        <div class="product-comments-content">
                                                            <p><strong><?php
																			if((int)$feedb->desde_fb == 1) echo $feedb->nombre_fb;
																			else echo $feedb->nombre_usuario;
																		?></strong> -
                                                                <span><?= date("d/m/Y", strtotime($feedb->fecha)) ?>:</span>
                                                                <span class="pro-comments-rating">
                                                                    <i class="fa fa-star"></i>								
                                                                    <i class="fa fa-star"></i>								
                                                                    <i class="fa fa-star"></i>								
                                                                    <i class="fa fa-star"></i>								
                                                                </span>
                                                            </p>
                                                            <div class="desc">
                                                                <?= $feedb->comentario ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
												<?php } ?>
                                            </ul>
                                            <!-- <div class="review-form-wrapper">
                                                <h3>Add a review</h3>
                                                <form action="#">
                                                    <input type="text" placeholder="your name">
                                                    <input type="email" placeholder="your email">
                                                    <div class="your-rating">
                                                        <h5>Your Rating</h5>
                                                        <span>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                        </span>
                                                        <span>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                        </span>
                                                        <span>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                        </span>
                                                        <span>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                        </span>
                                                    </div>
                                                    <textarea placeholder="Your Rating" rows="10" cols="30" id="product-message"></textarea>
                                                    <input type="submit" value="submit">
                                                </form>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>						
                        </div>
                        <div class="clear"></div>
                        <div class="upsells_products_widget">
                            <div class="section-heading">
                                <h3>Los m&aacute;s vendidos</h3>
                            </div>
                            <div class="row">
								<?php
								if(!is_null($datosMasVendidos))
									foreach($datosMasVendidos as $dato) {
										//print_r($dato);
								?>
							
							
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                    <div class="f-single-product">
                                        <div class="f-product-img">
                                            <a class="f-p-img-p" href="#">
                                                <img class="primary-img" src="<?= $dato->imagenA ?>" alt="">
                                                <img class="hover-img" src="<?= $dato->imagenB ?>" alt="">
                                            </a>
                                            <div class="f-img-block">
                                                <div class="feature-add-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="feature-add-cart">
                                                    <a href="<?= $dato->ir ?>">Ver detalle</a>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="feature-product-block">
                                            <h3><a href="#"><?= $dato->titulo ?><span><?= $dato->valor ?></span></a></h3>
                                            <div class="feature-p-block-icon">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
								<?php }	?>
								
								
								
								
								
								
                                					
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <!-- widget-recent start -->
                        <aside class="widget top-product-widget">
                            <h3 class="sidebar-title">Recientes</h3>
                            <ul>
							
								<?php
								if(!is_null($datosRecientes))
									foreach($datosRecientes as $dato) {
								?>
								<li>
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?= $dato->ir ?>">
                                                <img alt="" src="<?= $dato->imagenA ?>" class="primary-image">
                                                <img alt="" src="<?= $dato->imagenB ?>" class="secondary-image">
                                            </a>						
                                        </div>
                                        <div class="product-content">
                                            <div class="pro-info">
                                                <h2 class="product-name"><a href="<?= $dato->ir ?>"><?= $dato->titulo ?></a></h2>
                                                <div class="price-box">
                                                    <span class="new-price"><?= $dato->valor ?></span>
                                                </div>								
                                            </div>									
                                        </div>
                                    </div>
                                </li>
								<?php }	?>

                            </ul>
                        </aside>
                        <!-- widget-recent end -->				
                    </div>
                </div>
            </div>
        </div>
		
        <!--product-tab area end-->
        <!--our brand start-->
        <div class="our-brand-area owl-indicator"></div>
        <!--our brand end-->
		
        <!--footer-area start-->
        <?php $this->load->view("includes/footer"); ?>
        <!--footer-area end-->

        
        <?php $this->load->view("includes/scripts"); ?>
		
     <?php $this->load->view("includes/bottom"); ?>
