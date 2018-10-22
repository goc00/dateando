<?php $this->load->view("includes/header"); ?>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        
        <!--header-area start-->
        <?php $this->load->view("includes/top"); ?>
        <!--header-area end-->
		
        <!--slider area start-->
        <div class="slider-area home1">
            <div class="bend niceties preview-2">
                <div id="ensign-nivoslider" class="slides">	
                    <img src="<?= $host ?>assets/img/slider/slider-bg.jpg" alt="" title="#slider-direction-1"  />
                    <img src="<?= $host ?>assets/img/slider/slider-bg.jpg" alt="" title="#slider-direction-2"  />
                </div>
                <!-- direction 1 -->
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-cn s-tb slider-1">
                        <div class="title-container s-tb-c">
                            <h1 class="title1">DRESSES FOR EVERY</h1>
                            <h1 class="title2"><strong>OCCASSONS!</strong></h1>
                            <a href="#"><span>SHOP NOW</span></a>
                        </div>
                    </div>
                    <!-- layer 1 -->
                    <div class="layer-1 slide1">
                        <img src="<?= $host ?>assets/img/slider/h1-s1-l-1.png" alt="" />
                    </div>	
                </div>
                <!-- direction 2 -->
                <div id="slider-direction-2" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-cn s-tb slider-2">
                        <div class="title-container s-tb-c">
                            <h1 class="title1">WOMEN’S FASHION</h1>
                            <h2 class="title2">SAVE UP TO 30% OFF</h2>
                            <a href="#"><span>SHOP NOW</span></a>
                        </div>
                    </div>
                    <!-- layer 2 -->
                    <div class="layer-2 slide2">
                        <img src="<?= $host ?>assets/img/slider/h1-s1-l-2.png" alt="" />
                    </div>	
                </div>
            </div>
        </div>
        <!--slider area end-->
       <!--banner area satrt-->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-9 col-lg-9">
                        <div class="banner-image-area">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="litele-img">
                                        <a href="#"><img src="<?= $host ?>assets/img/banner-1.png" alt=""></a>
                                        <div class="li-banner-new">
                                            <span>new</span>
                                        </div>
                                    </div>                                      
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div class="large-img">
                                        <a href="#"><img src="<?= $host ?>assets/img/banner-2.png" alt=""></a>
                                    </div>   
                               </div>
                            </div>
                            <div class="row banner-bottom">
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                    <div class="large-img">
                                        <a href="#"><img src="<?= $host ?>assets/img/banner-3.png" alt=""></a>
                                        <div class="lr-banner-new">
                                            <span>new</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">       
                                    <div class="litele-img">
                                        <a href="#"><img src="<?= $host ?>assets/img/banner-4.png" alt=""></a>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-xs-12 hidden-sm col-md-3">
                        <div class="banner-another-img">
                            <a href="#"><img src="<?= $host ?>assets/img/banner-5-.png" alt=""></a>
                            <div class="banner-a-img-block">
                                <h2>NEW FASHION<br/>TRANDS 2016</h2>
                                <a href="#">SHOP NOW</a> 
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!--banner area send-->
       <!--t seller area start-->
        <div class="best-seller-area another owl-indicator">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="my-nav" role="tablist">
                            <li role="presentation" class="active"><a href="#best-seller" aria-controls="best-seller" role="tab" data-toggle="tab">Best seller</a></li>
                            <li role="presentation"><a href="#add-cart" aria-controls="add-cart" role="tab" data-toggle="tab">New add cart</a></li>
                            <li role="presentation"><a href="#most-wanted" aria-controls="most-wanted" role="tab" data-toggle="tab">Most wanted</a></li>
                        </ul>    
                    </div>
                </div>
                <div class="row">
                   <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="best-seller">
                            <!--best seller product-->
                            <div class="best-seller-product">
                               <!--single product start-->
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/b-d-1.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/b-d-2.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                   <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/product.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img//product/product-2.png" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bb-2.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bb-1.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bbb-1.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bb-2.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bg-an.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/product.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/cap-1.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/cap-2.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/hat%20-2.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/hat-1.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bb-1.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bb-2.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <!--single product start-->    
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="add-cart">
                            <!--best seller product-->
                            <div class="best-seller-product">
                               <!--single product start-->
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/b-d-1.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bg-an.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/shoes-p.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/shoes-2.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bg-c-2.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bg-c-1.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/b-d-2.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/b-d-1.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/product-2.png" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/product-4.png" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bg-an.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/b-d-2.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/product-4.png" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/product.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a class="b-s-p-img" href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/cap-2.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/hat%20-2.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <!--single product start-->    
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="most-wanted">
                            <!--best seller product-->
                            <div class="best-seller-product">
                               <!--single product start-->
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bg-c-1.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bg-c-2.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/cap-1.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bg-c-1.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/b-d-1.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/product-2.png" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bb-1.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/product-4.png" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bb-2.JPG" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bb-1.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bbb-1.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bb-1.JPG" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/bg-an.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/bbb-1.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?= $host ?>assets/img/product/b-d-2.jpg" alt="">
                                                <img class="hover-img" src="<?= $host ?>assets/img/product/b-d-1.jpg" alt="">
                                            </a>
                                            <div class="img-block">
                                                <div class="primary-icon">
                                                    <a href="#"><i class="fa fa-random"></i></a>
                                                    <a href="#"><i class="fa fa-eye"></i></a>
                                                </div>
                                                <div class="hover-icon">
                                                    <span class="random"><a href="#"><i class="fa fa-random"></i></a></span>
                                                    <span class="eye"><a href="#"><i class="fa fa-eye"></i>Quick view</a></span>
                                                 </div>    
                                            </div>
                                        </div>
                                        <div class="product-block-text">
                                            <h3><a href="#">Bag<span>$60.23</span></a></h3>
                                             <a class="p-b-t-a-c" href="#">add to cart</a>
                                        </div>
                                    </div>   
                                </div>
                                <!--single product start-->    
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--best seller area end-->

        <?php $this->load->view("includes/footer"); ?>
        <?php $this->load->view("includes/scripts"); ?>
    <?php $this->load->view("includes/bottom"); ?>
