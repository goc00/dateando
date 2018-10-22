<?php $this->load->view("includes/header"); ?>
 
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <!--header-area start-->
        <?php $this->load->view("includes/top2"); ?>
        <!--header-area end-->
		
        <!--contact area start-->


        <!--contact form start-->
        <div class="contact-us-form">
            <div class="container">
                <div class="container-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <div class="contact-form-title">
                                    <h2>Contacto <span style="font-weight:bold;font-size:.6em">(todos los campos son requeridos)</span></h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-details">
                                            <form action="mail.php" method="POST" >
                                                <div class="contact-name">
                                                    <input name="name" type="text" placeholder="Nombre" required>
                                                </div>
                                                <div class="contact-email">
                                                    <input name="email" type="text" placeholder="E-mail" required>
                                                </div>
                                                <div class="contact-subject">
                                                    <input name="subject" type="text" placeholder="Motivo" required>
                                                </div>
                                                <div class="contact-textarea">
                                                    <textarea name="message"  cols="30" rows="10" placeholder="Mensaje" required></textarea>
                                                </div>
                                                <div class="contact-submitt">
                                                    <button type="submit" value="submit form">Enviar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--contact form end-->

        <!--conatct-us are-end-->
        <!--our brand start-->
        <div class="our-brand-area owl-indicator"></div>
        <!--our brand end-->
		
        <!--footer-area start-->
        <?php $this->load->view("includes/footer"); ?>
        <!--footer-area end-->

        
        <?php $this->load->view("includes/scripts"); ?>
		
     <?php $this->load->view("includes/bottom"); ?>
