<?php $this->load->view("includes/header"); ?>
    
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <!--header-area start-->
        <?php $this->load->view("includes/top2"); ?>
        <!--header-area end-->
		

        <!--contact form start-->
        <div class="contact-us-form">
            <div class="container">
                <div class="container-inner" style="border:0">
                    
					<h1>Publicar Dato</h1>
					
					<div class="alert alert-info">
						<div style="margin: 10px 0"><strong>Sugerencias</strong></div>
						<ol>
							<li>Utiliza t&iacute;tulos/descripciones de manera concreta y resumida.</li>
							<li>Adjuntar fotos no es obligatorio, pero ayudar&aacute; a hacer tu dato mucho m&aacute;s atractivo.</li>
							<li>Puedes subir un m&aacuteximo de <b><?= $maxNumImgs ?></b> im&aacute;genes.</li>
							<li>La suma del peso de tus im&aacute;genes no puede superar los <b><?= $maxSizeImgs ?></b>.</li>
							<li>Las im&aacute;genes solo pueden ser del tipo <b><?= $fileTypesAllowed ?></b>.</li>
						</ol>
					</div>
					
					<form id="frmSubirDato" action="<?= $host ?>datos/subirAction" enctype="multipart/form-data" method="post" accept-charset="utf-8">

						<div class="form-group">
							<label for="titulo_txt">T&iacute;tulo:</label>
							<input type="text" class="form-control" id="titulo_txt" name="titulo_txt" />
						</div>
						
						<div class="form-group">
						  <label for="desc_txt">Descripci&oacute;n:</label>
						  <textarea class="form-control" rows="5" id="desc_txt" name="desc_txt"></textarea>
						</div>
						
						<div class="form-group">
							<label for="categoria_lst">Categor&iacute;a:</label>
							<select class="form-control" id="categoria_lst" name="categoria_lst">
								<?php foreach($categorias as $categoria) {?>
									<option value="<?= $categoria->id_categoria ?>"><?= $categoria->descripcion ?></option>
								<?php  } ?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="fecha_exp_txt">Fecha Expiraci&oacute;n:</label>
							
							<div class='input-group date' id='datetimepicker1'>
								<input type='text' class="form-control" id="fecha_exp_txt" name="fecha_exp_txt" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
							
						</div>
						
						<div class="form-group">
						
							<label for="precio_radio">Precio:</label>
							<div class="radio" style="font-size:1.4em;font-weight:bold">
								<?php 
									$ini = TRUE;
									$checked = '';
									foreach($montos as $monto) {
										if($ini) {
											$checked = 'checked = "checked"';
											$ini = FALSE;
										} else {
											$checked = '';
										}
										
								?>
									<label class="radio-inline"></label>
									<input type="radio" id="pr_<?= $monto->id_monto ?>" name="precio_radio" value="<?= $monto->id_monto ?>" <?= $checked ?> /><?= $monto->valor_format ?>
								<?php  } ?>
							</div>
						</div>
						
						<div class="form-group" style="margin:30px auto">
						  <label for="desc_txt">&iquest;Tienes im&aacute;genes para promocionar tu producto/servicio?:</label>
						  <div style="font-size:.8em;color:#b00;font-weight:bold">(Para seleccionar m&aacute;s de un archivo, mant&eacute;n presionado CTRL y selecci&oacute;nalos)</div>
						  <input type="file" name="userfile[]" multiple />
						</div>
						
						
						<button type="submit" class="btn btn-warning btn-lg">Enviar</button>
						
					</form>
					
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
