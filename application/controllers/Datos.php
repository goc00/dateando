<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends MY_Controller {
	
	const MAX_IMG				= 3;					// Máximo de imágenes al publicar dato 
	const FILES_TYPES			= "gif|jpg|jpeg|png";	// Tipos de archivos permitidos al publicar dato
	const MAX_VIEW_DATOS		= 10;					// Número de datos al ir cargando con "ver más"
	
	const WIDTH_IMG				= 270;					// Ancho defecto listado de imágenes
	const HEIGHT_IMG			= 300;					// Alto defecto listado de imágenes
	
	const DAYS_ALERT_EXPIRATION	= 3;					// Días en cuando se alerta la fecha de expiración
	
	const MAX_VALORISATION		= 5;					// Máximo de valorización
	
	const PIVOT_ENCRYPT			= "@DAT@";

	
	function __construct() {
		parent::__construct();
		$this->load->model('categoria_model', '', TRUE);
		$this->load->model('monto_model', '', TRUE);
		$this->load->model('dato_model', '', TRUE);
		$this->load->model('core_model', '', TRUE);
		$this->load->model('compra_model', '', TRUE);
		$this->load->model('favorito_model', '', TRUE);
		$this->load->helper(array('form', 'file'));
	}
	
	/**
	 * Realiza la carga inicial de los elementos necesarios para todas las vistas
	 * relacionadas a Datos. Llena el arreglo "global" $data definido en MY_Controller
	 *
	 * @access private
	 * @return void
	 */
	private function _init() {
		
		// Cargas categorías y montos
		$categorias = $this->categoria_model->getAll();
		
		$montos = $this->monto_model->getAll();
		$palabras = array(
						"5000" =>"cinco",
						"10000" => "diez",
						"20000" => "veinte"
					);
		foreach($montos as $monto) {
			$monto->valor_format = "$".number_format($monto->valor,0,",",".");
			$monto->valor_str = $palabras[(string)$monto->valor];
		}

		$this->data["categorias"] = $categorias;
		$this->data["montos"] = $montos;
	}
	
	
	/**
	 * Carga "todos" los datos
	 *
	 * @access public
	 * @return void
	 */
	public function index() {
		
		$this->_init(); // Carga inicial
		
		$actualSection = '
				<ul>
					<li><a href="'.base_url().'">Inicio</a> <i class="fa fa-angle-right"></i></li>
					<li>Datos</li>
				</ul>
			';
		
		// Listado de datos
		$datos = $this->_obtenerDatos("todos");

		
		$this->data["datos"] = is_null($datos) ? "No se han encontrado datos" : $this->_generarDatos($datos);
		$this->data["hayDatos"] = is_null($datos) ? FALSE : TRUE;
		$this->data["titulo"] = "Listado de Datos";
		$this->data["actualSection"] = $actualSection;
		
		$this->load->view("datos", $this->data);
	}
	
	
	/**
	 * Ver detalles de dato seleccionado
	 *
	 * @access public
	 * @return void
	 */
	public function ver($idDato) {
		
		$this->_init();
		
		$mostrar = 4;	// total de datos a mostrar
		$titulo = "";
		$wDatosMasVend = 270;
		$hDatosMasVend = 270;
		$hDatosRecient = 300;
		$pathImgDefault = $this->data["host"]."assets/img/default/";
		
		// Descodifica el dato
		$idDato = $this->_base64url_decode($idDato);

		// Obtiene dato
		$dato = $this->dato_model->getDatoById($idDato);
		$titulo = $dato->titulo;
		
		$actualSection = '
				<ul>
					<li><a href="'.base_url().'">Inicio</a> <i class="fa fa-angle-right"></i></li>
					<li><a href="'.base_url().'datos">Datos</a> <i class="fa fa-angle-right"></i></li>
			';
		$actualSection .= '<li><a href="'.base_url().'datos/categoria/'.$dato->slug.'">'.$dato->categoria_desc.'</a> <i class="fa fa-angle-right"></i></li>';
		$actualSection .= '<li>'.$titulo.'</li></ul>';
		
		// Calcula días restantes para que culmine
		$fechaDato = new DateTime(date("Y-m-d", strtotime($dato->fecha_expiracion)));
		$fechaHoy = new DateTime(date("Y-m-d"));
		$diff = $fechaDato->diff($fechaHoy)->format("%a");
		$tiempo = "";
		if($diff <= 0) {
			$tiempo = "<span style=\"color:#bbb\">Expirado</span>";
		} else {
			if($diff > 0 && $diff <= self::DAYS_ALERT_EXPIRATION) {
				$tiempo = "<span style=\"color:#f00\">$diff día(s)</span>";
			} else {
				$tiempo = "$diff día(s)";
			}
		}
		
		// Verifica si hay feedback de eventuales compras
		$feedbacks = $this->compra_model->getFeedbacks($idDato);
		
		// Obtiene últimos datos y datos más vendidos
		$datosMasVendidos = $this->dato_model->getDatosMostBought($mostrar);
		$datosRecientes = $this->dato_model->getDatos(NULL, $mostrar);

		if(!is_null($datosMasVendidos)) 
			$this->_prepareDatosPromociones($datosMasVendidos, $pathImgDefault."bbb-2.png", $wDatosMasVend, $hDatosMasVend);
			
		if(!is_null($datosRecientes))
			$this->_prepareDatosPromociones($datosRecientes, $pathImgDefault."bbb-2.png", $wDatosMasVend, $hDatosRecient);
		
		// Preparar imágenes
		$imagenes = $this->dato_model->getImagenesDato($dato->id_dato);
		$navTabsActive = ' <li class="active" role="presentation">';
		$navTabsNoActive = '<li role="presentation">';
		$tabPanesActive = 'class="tab-pane active"';
		$tabPanesNoActive = 'class="tab-pane"';
		$navTabsTemplate = '[NAV_TABS]<a data-toggle="tab" role="tab" aria-controls="[NAV_TABS_NAME]" href="#[NAV_TABS_NAME]"><img src="[NAV_TABS_IMG]" alt=""></a></li>';
		$tabPanesTemplate = '<div id="[TAB_PANES_NAME]" [TAB_PANES] role="tabpanel"><img src="[TAB_PANES_IMG]" alt=""></div>';
		$navTabs = "";
		$tabPanes = "";
		
		if(!is_null($imagenes)) {
			// Toma cualquiera de las fotos como la principal
			$t = count($imagenes);
			$indice = 0; // por defecto la primera
			if($t > 1) $indice = rand(0, $t-1);

			$imgSelecc = $imagenes[$indice];
			foreach($imagenes as $img) {

				if($imgSelecc->id_dato_imagen == $img->id_dato_imagen) {
					$navTabs .= str_replace("[NAV_TABS]", $navTabsActive, $navTabsTemplate);
					$tabPanes .= str_replace("[TAB_PANES]", $tabPanesActive, $tabPanesTemplate);
				} else {
					$navTabs .= str_replace("[NAV_TABS]", $navTabsNoActive, $navTabsTemplate);
					$tabPanes .= str_replace("[TAB_PANES]", $tabPanesNoActive, $tabPanesTemplate);
				}
				
				$nombre = "imgname".$img->id_dato_imagen;
				$imag = base_url().'uploads/images/'.$img->file_name;
				$navTabs = str_replace("[NAV_TABS_NAME]", $nombre, $navTabs);
				$navTabs = str_replace("[NAV_TABS_IMG]", $imag, $navTabs);
				$tabPanes = str_replace("[TAB_PANES_NAME]", $nombre, $tabPanes);
				$tabPanes = str_replace("[TAB_PANES_IMG]", $imag, $tabPanes);
				
			}
		}
		
		// Actualiza las visitas al dato
		$this->dato_model->agregaVisita($dato->id_dato, ++$dato->visitas);
		
		
		// Paso de información a vista
		$this->data["navTabs"] = $navTabs;
		$this->data["tabPanes"] = $tabPanes;
		$this->data["feedbacks"] = $feedbacks;
		$this->data["totalFeedbacks"] = is_null($feedbacks) ? 0 : count($feedbacks);
		$this->data["actualSection"] = $actualSection;
		$this->data["titulo"] = $titulo;
		$this->data["totalComentarios"] = 0;
		$this->data["creador"] = (int)$dato->desde_fb == 1 ? $dato->nombre_fb : $dato->nombre_usuario;
		$this->data["tiempo"] = $tiempo;
		$this->data["diff"] = $diff;
		$this->data["precio"] = "$".number_format((float)$dato->valor,0,",",".");
		$this->data["descripcion"] = $dato->descripcion;
		$this->data["datosRecientes"] = $datosRecientes;
		$this->data["datosMasVendidos"] = $datosMasVendidos;
		$this->data["url"] = base_url()."datos/ver/".$this->_base64url_encode($dato->id_dato);
		
		$this->load->view("detalle_dato", $this->data);
		
	}
	

	/**
	 * Carga datos en función del parámetro solicitado
	 *
	 * @access public
	 * @return void
	 */
	public function filtrar($criterio) {
		
		$this->_init();

		$error = "";
		$titulo = "";
		$actualSection = '
				<ul>
					<li><a href="'.base_url().'">Inicio</a> <i class="fa fa-angle-right"></i></li>
					<li><a href="'.base_url().'datos">Datos</a> <i class="fa fa-angle-right"></i></li>
			'; // Sección en la que se encuentra uno actualmente
		
		switch($criterio) {
			case "mas-vistos":
				$titulo = "Los más vistos";
				break;
			case "mas-comprados":
				$titulo = "Lo más comprados";
				break;
			case "cinco":
				$titulo = "Solo Por $5.000";
				break;
			case "diez":
				$titulo = "Solo Por $10.000";
				break;
			case "veinte":
				$titulo = "Solo Por $20.000";
				break;
			default:
				break;
		}

		$actualSection .= '<li>'.$titulo.'</li>';
		$actualSection .= '</ul>';
		
		// --------- Obtiene datos --------------
		$datos = $this->_obtenerDatos($criterio);
		// --------------------------------------
		
		$this->data["datos"] = is_null($datos) ? "No se han encontrado datos" : $this->_generarDatos($datos);
		$this->data["hayDatos"] = is_null($datos) ? FALSE : TRUE;
		$this->data["actualSection"] = $actualSection;
		$this->data["titulo"] = $titulo;
		$this->data["error"] = $error;
		
		$this->load->view("datos", $this->data);
		
	}
	
	
	/**
	 * Carga datos de una respectiva categoría
	 *
	 * @access public
	 * @return void
	 */
	public function categoria($slug) {
		
		$this->_init();
		
		$datos = NULL;
		$error = "";
		$titulo = "";
		$actualSection = '
				<ul>
					<li><a href="'.base_url().'">Inicio</a> <i class="fa fa-angle-right"></i></li>
					<li><a href="'.base_url().'datos">Datos</a> <i class="fa fa-angle-right"></i></li>
			'; // Sección en la que se encuentra uno actualmente
		
		// Busca los datos por el slug
		$oCategoria = $this->categoria_model->getCategoriaBySlug($slug);

		if(!is_null($oCategoria)) {
			
			$titulo = $oCategoria->descripcion;
			
			// --------- Obtiene datos --------------
			$datos = $this->_obtenerDatosCategoria($oCategoria->id_categoria);
			// --------------------------------------
			
		}
		
		$actualSection .= '<li>'.$titulo.'</li>';
		$actualSection .= '</ul>';
		
		// --------------------------------------
		
		$this->data["datos"] = is_null($datos) ? "No se han encontrado datos" : $this->_generarDatos($datos);
		$this->data["hayDatos"] = is_null($datos) ? FALSE : TRUE;
		$this->data["actualSection"] = $actualSection;
		$this->data["titulo"] = $titulo;
		$this->data["error"] = $error;
		
		$this->load->view("datos", $this->data);
		
	}
	
	
	
	/**
	 * Despliega nuevos datos en función de botón "ver más"
	 *
	 * @access public
	 * @return void
	 */
	public function verMasAction() {
		
		$salida = new stdClass();
		$salida->errCode = 0;
		$salida->errMessage = "";
		$salida->result = NULL;
			
		try {
			
			$params = array("order", "criterio");
			
			// Recibe parámetros por POST
			$post = $this->input->post(NULL, TRUE);
			if(empty($post)) throw new Exception("No se ha recibido ninguna petición", 1000);
			$post =	(object)$post;
			
			// Verifica que vengan todos los parámetros necesarios
			if(!$this->_validParams($post, $params)) throw new Exception("No se han definido todos los campos necesarios para completar la solicitud", 1001);
			
			// Obtiene URI de donde está posicionado
			// Analiza para obtener el criterio de filtro
			$arr = explode("/", $post->criterio);
			$l = count($arr);
			$criterio = $arr[$l-2]; // filtrar o categoría
			$valor = $arr[$l-1];
			
			$datos = NULL;
	
			if($criterio == "filtrar") {
				
				// Por filtro
				$datos = $this->_obtenerDatos($valor, $post->order);
				
			} else if($criterio == "categoria") {
				
				// Por categoría
				$oCategoria = $this->categoria_model->getCategoriaBySlug($valor);
				if(!is_null($oCategoria)) {
					$datos = $this->_obtenerDatosCategoria($oCategoria->id_categoria, $post->order);
				}
				
			} else {
				// Carga normal
				// Envío lo que sea, aprovechando el mismo método
				$datos = $this->_obtenerDatos("todos", $post->order);
				
			}
			
			if(is_null($datos)) throw new Exception("Por el momento no hay más datos por mostrar", 1002);
			
			// Genera datos para ser anexados al listado
			$salida->result = $this->_generarDatos($datos);
	
		} catch(Exception $e) {
			log_message("error", "Error ".$e->getCode().", description: ".$e->getMessage());
			$salida->errCode = $e->getCode();
			$salida->errMessage = $e->getMessage();
		}
		
		$this->_json($salida);
		
	}
	

	/**
	 * Vista para publicar dato, carga elementos necesarios para despliegue
	 * y/o selección al momento de realizar la acción.
	 *
	 * @access public
	 * @return void
	 */
	public function subir() {
		
		
		try {
			
			// Debe estar autentificado
			if(!$this->isLogged()) $this->exception("No está autentificado en el sistema", 1000);
			
			$categorias = $this->categoria_model->getAll();
		
			$montos = $this->monto_model->getAll();
			foreach($montos as $monto) {
				$monto->valor_format = "$".number_format($monto->valor,0,",",".");
			}
			
			$this->data["categorias"] = $categorias;
			$this->data["montos"] = $montos;
			$this->data["maxNumImgs"] = self::MAX_IMG;
			$this->data["maxSizeImgs"] = ini_get('post_max_size');
			$this->data["fileTypesAllowed"] = str_replace("|", ", ", self::FILES_TYPES);
			
			
			$this->load->view("subir_dato", $this->data);
			
		} catch(Exception $e) {
			redirect("ingresar");
		}
		
	}
	
	/**
	 * Publica un dato con todas sus características
	 *
	 * @access public
	 * @return string
	 */
	public function subirAction() {
		
		// Evito que el Warning se imprima por pantalla, afectando la respuesta JSON
		ob_get_contents();
		ob_end_clean();

		// --------------------------------
		$exito = "no";
		$mensaje = "no actions";
		$go = base_url()."cuenta/tus-datos";
		$hayTrx = FALSE;

		try {
			
			if(!$this->isLogged()) $this->exception("No está autentificado en el sistema, por favor reingresa", 1000);
			
			$maxPostSize = ini_get('post_max_size');
			$totalFiles = 0;
			$nameFieldFile = "userfile";
			$idUser = $this->encryption->decrypt($this->session->userdata("iu"));
			
			// Verifica que no se viole el máximo de envío por POST definido en el sistema	
			if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&
				empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0) {
				$this->exception('La suma total del tamaño de tus archivos no puede superar los '.$maxPostSize, 1001);
			}
			
			// Recibe valores
			$post = $this->input->post(NULL, TRUE);
			if(empty($post)) $this->exception("No se ha podido detectar ninguna petición", 1002);
			
			// Todos los campos son necesarios, menos "userfile" (archivos)
			foreach($post as $key => $value) {
				if(empty($value) && $key != $nameFieldFile) $this->exception("Debes completar todos los datos", 1002);
				$$key = $value;
			}

			// Cuenta el número (eventual) de archivos subidos
			// Solo si viene algún archivo, entra a la iteración para verificar algún potencial error
			$firstFileName = $_FILES[$nameFieldFile]['name'][0];
			if(!empty($firstFileName))
				$totalFiles = count($_FILES[$nameFieldFile]['name']);
			
			// Valida que no se exceda el total de archivos permitidos
			if($totalFiles > self::MAX_IMG) $this->exception('No puedes subir más de '.self::MAX_IMG.' imágenes', 1002);
			
			// Valida formato de fecha de expiración
			// También verifica que la fecha de expiración sea mayor a la actual
			if(!$this->funciones->validateDate($fecha_exp_txt, "d/m/Y")) $this->exception("El formato de la fecha de expiración es inválido", 1005);
			
			$hoy = date("d/m/Y");
			$dateExpirationObj = DateTime::createFromFormat('d/m/Y', $fecha_exp_txt); // 1481770800
			$dateExp = $dateExpirationObj->format('Y-m-d');
			$dateExpMilis = strtotime($dateExp);
			$todayMilis = strtotime(date('Y-m-d'));
			
			if($todayMilis >= $dateExpMilis) $this->exception("La fecha de expiración no puede ser anterior ni igual a la fecha actual", 1005);
			
			// --------- CREA DATO ------------
			// Inicia transacción
			$this->core_model->inicioTrx();
			$hayTrx = TRUE;

			$o = new stdClass();
			$o->id_usuario = $idUser;
			$o->id_monto = $precio_radio;
			$o->id_categoria = $categoria_lst;
			$o->titulo = $titulo_txt;
			$o->descripcion = $desc_txt;
			$o->visitas = 0;
			$o->estado = 1;
			$o->fecha_creacion = date("Y-m-d H:i:s");
			$o->fecha_expiracion = $dateExp." 23:59:59"; // hasta el 
			
			$idDato = $this->dato_model->nuevo($o);
			
			if(is_null($idDato)) $this->exception('Lo sentimos, no se pudo publicar tu dato', 1004);
			
			// Si hay archivos seleccionados, intenta subirlos
			
			if($totalFiles > 0) {
				
				// Archivos almacenados (los registra por si hay que hacer rollback)
				$filesUploaded = array();

				// Hay imágenes, intenta hacer la subida de estas
				$dir = dirname($_SERVER["SCRIPT_FILENAME"]).'/';

				// Carga librería
				$config['upload_path'] = $dir.'uploads/images';
				$config['allowed_types'] = self::FILES_TYPES;
				$this->load->library('upload', $config);
				
				for($i=0; $i<$totalFiles; $i++) {

					if($_FILES[$nameFieldFile]['error'][$i] == 0) {
						
						// Procesar, no error
						// Saca la extensión del archivo
						$fileName = $_FILES[$nameFieldFile]['name'][$i];
						$fileNameSplitted = explode('.', $fileName);
						$extension = $fileNameSplitted[count($fileNameSplitted)-1];

						$nomNoExt = 'img_'.$idDato.'_'.str_replace ('.', '', microtime(TRUE));
						$nom = $nomNoExt.".".$extension;

						// Nuevo input temporal para hacer el upload
						$_FILES['userFile']['name'] = $nom;
						$_FILES['userFile']['type'] = $_FILES[$nameFieldFile]['type'][$i];
						$_FILES['userFile']['tmp_name'] = $_FILES[$nameFieldFile]['tmp_name'][$i];
						$_FILES['userFile']['error'] = $_FILES[$nameFieldFile]['error'][$i];
						$_FILES['userFile']['size'] = $_FILES[$nameFieldFile]['size'][$i];
						
						//print_r($_FILES['userFile']); exit;
						if ($this->upload->do_upload('userFile')) {
							
							// Archivo correctamente subido, se registra en base de datos
							$info = $this->upload->data();
							$info["id_dato"] = $idDato;
							$info["fecha_creacion"] = date("Y-m-d H:i:s");
							
							$filesUploaded[] = $info["full_path"];
							
							// Guarda en base de datos
							$res = $this->dato_model->addImageDato($info);
							
						} else {
							// No se pudo subir el archivo por el siguiente motivo
							// Hace rollback, si es que hay archivos
							if(count($filesUploaded) > 0) {
								foreach($filesUploaded as $f) {
									// Los remueve para evitar estar acumulando basura
									unlink($f);
								}
								
							}
							
							$this->exception($this->upload->display_errors('',''), 1007);
						}

					} else {
						// Sucedió un error con el archivo, así que hace rollback
						$this->exception("No podemos procesar el o los archivos seleccionados, por favor inténtalo nuevamente con otro(s).", 1008);
					}
				}
	
			}
			
			// Si llegó acá, sin errores, aplica commit
			$this->core_model->commitTrx();

			// TODO OK
			$exito = "si";
			$mensaje = "¡Tu dato ha sido publicado satisfactoriamente!";


		} catch(Exception $e) {
			$mensaje = $e->getMessage();
			if($hayTrx) $this->core_model->rollbackTrx();
			log_message("error", $mensaje);
		}
		
		echo json_encode(array("exito" => $exito, "mensaje" => $mensaje, "resultado" => $go));
	
	}
	
	
	/**
	 * Agrega un dato a favoritos
	 *
	 * @access public
	 * @return void
	 */
	public function addFavAction() {
		
		$salida = new stdClass();
		$salida->errCode = 0;
		$salida->errMessage = "";
		$salida->result = NULL;
			
		try {
			
			$params = array("id");
			
			// Verifica que esté autentificado
			if(!$this->isLogged()) $this->exception("Debes estar autentificado para completar esta acción", 1000);
	
			$idUser = $this->encryption->decrypt($this->session->userdata("iu"));
			
			// Recibe parámetros por POST
			$post = $this->input->post(NULL, TRUE);
			if(empty($post)) throw new Exception("No se ha recibido ninguna petición", 1001);
			$post =	(object)$post;
			
			// Verifica que vengan todos los parámetros necesarios
			if(!$this->_validParams($post, $params)) throw new Exception("No se han definido todos los campos necesarios para completar la solicitud", 1001);
			
			// Verifica si el dato ya fue agregado previamente
			$idDato = $this->_base64url_decode($post->id);
			$oFav = $this->favorito_model->getFavByIdDatoAndIdUsuario($idDato, $idUser);
			if(!is_null($oFav)) throw new Exception("Ya has agregado este dato a tu lista de favoritos", 1002);
			
			// Intenta registrar el dato
			$o = new stdClass();
			$o->id_usuario = $idUser;
			$o->id_dato = $idDato;
			$o->fecha_creacion = date("Y-m-d H:i:s");
			if(!$this->favorito_model->addFav($o))
				throw new Exception("Lo sentimos, pero no se pudo completar la acción", 1003);
			
			$salida->result = "Se ha agregado exitosamente el dato a tu lista de favoritos";
	
		} catch(Exception $e) {
			log_message("error", "Error ".$e->getCode().", description: ".$e->getMessage());
			$salida->errCode = $e->getCode();
			$salida->errMessage = $e->getMessage();
		}
		
		$this->_json($salida);
		
	}
	
	
	// ------------------------ MÉTODOS PRIVADOS ------------------------
	
	
	/**
	 * Obtiene el listado de datos y los convierte a HTML para cargarlos
	 * dinámicamente en la vista correspondiente
	 *
	 * @access private
	 * @return string
	 */
	private function _generarDatos($datos) {
		
		$plantilla = $this->load->view('includes/single_producto', '', TRUE);
		$html = "";
		$pathImgs = base_url().'uploads/images/';
		$star = '<a href="#"><i class="fa {CLASS}"></i></a>'; // fa-star, fa-star-o

		foreach($datos as $d) {
			$plantillaAux = $plantilla;
			$plantillaAux =  str_replace("{DATA_ROW}", $d->row, $plantillaAux);
			
			// Si vienen imágenes, toma la principal para visualizar
			$mainImg = "";
			$hoverImg = "";
			$wImg = self::WIDTH_IMG;
			$hImg = self::HEIGHT_IMG;
			if(!is_null($d->imagenes)) {
				foreach($d->imagenes as $img) {
					if((int)$img->principal == 1) {
						$mainImg = $pathImgs.$img->file_name;
						$hoverImg = $pathImgs.$img->file_name;
						$wImg = $img->image_width_redem;
						$hImg = $img->image_height_redem;
						break;
					}
				}
			} else {
				// Imágenes por defecto
				$mainImg = $this->data["host"]."assets/img/product/product-2.png";
				$hoverImg = $this->data["host"]."assets/img/product/bg-an.jpg";
			}
			
			// Valorización
			$valorizacion = ""; // MAX_VALORISATION
			if(is_null($d->valorizacion)) {
				for($i=0;$i<self::MAX_VALORISATION;$i++) {
					$valorizacion .= str_replace("{CLASS}", "fa-star-o", $star);
				}
			} else {
				// Recorre por el valor recibido
				$cont = 0;
				for($i=0;$i<self::MAX_VALORISATION;$i++) {
					if($cont < $d->valorizacion) {
						$valorizacion .= str_replace("{CLASS}", "fa-star", $star);
						$cont++;
					} else {
						$valorizacion .= str_replace("{CLASS}", "fa-star-o", $star);
					}
				}
			}
			
			$plantillaAux =  str_replace("{DATA_FAV}", $this->_base64url_encode($d->id_dato), $plantillaAux);
			$plantillaAux =  str_replace("{DATA_FAV_ACTION}", base_url()."datos/addFavAction/", $plantillaAux);
			$plantillaAux =  str_replace("{DATA_URL}", base_url()."datos/ver/".$this->_base64url_encode($d->id_dato), $plantillaAux);
			$plantillaAux =  str_replace("{DATA_IMG_PRIMARY}", $mainImg, $plantillaAux);
			$plantillaAux =  str_replace("{DATA_IMG_HOVER}", $hoverImg, $plantillaAux);
			$plantillaAux =  str_replace("{DATA_IMG_WIDTH}", $wImg, $plantillaAux);
			$plantillaAux =  str_replace("{DATA_IMG_HEIGHT}", $hImg, $plantillaAux);
			$plantillaAux =  str_replace("{DATA_TITULO}", $d->titulo, $plantillaAux);
			$plantillaAux =  str_replace("{DATA_PRECIO}", "$".number_format((float)$d->valor,0,",","."), $plantillaAux);
			$plantillaAux =  str_replace("{DATA_DESCRIPCION}", $d->descripcion, $plantillaAux);
			$plantillaAux =  str_replace("{DATA_VALORIZACION}", $valorizacion, $plantillaAux);
			
			$html .= $plantillaAux;
		}
		
		return $html;
		
	}
	

	/**
	 * Carga la lista de datos para los filtros
	 *
	 * @access private
	 * @return string
	 */
	private function _obtenerDatos($criterio, $offset = NULL) {
		
		$datos = NULL;
		$width = 270;
		$height = 300;
		
		switch($criterio) {
			case "mas-vistos":
				$datos = $this->dato_model->getDatosMostViewed(self::MAX_VIEW_DATOS, $offset);
				break;
			case "mas-comprados":
				$datos = $this->dato_model->getDatosMostBought(self::MAX_VIEW_DATOS, $offset);
				break;
			case "cinco":
				$datos = $this->dato_model->getDatosByPrice(parent::MONTO_5, self::MAX_VIEW_DATOS, $offset);
				break;
			case "diez":
				$datos = $this->dato_model->getDatosByPrice(parent::MONTO_10, self::MAX_VIEW_DATOS, $offset);
				break;
			case "veinte":
				$datos = $this->dato_model->getDatosByPrice(parent::MONTO_20, self::MAX_VIEW_DATOS, $offset);
				break;
			default:
				// Todos los datos
				$datos = $this->dato_model->getDatos(NULL, self::MAX_VIEW_DATOS, $offset);
				break;
		}
		
		// Le agrega el row number para poder manejar el "ver más" y reutilizarlo para todo
		if(!is_null($datos)) {
			$row = is_null($offset) ? 0 : $offset;
			foreach($datos as $dato) {
				// Imágenes
				$dato->imagenes = $this->_imagenesDato($width, $height, $dato->id_dato);
				// Pivot de ordenamiento
				$dato->row = ++$row;
			}
		}
		
		return $datos;
		
	}
	
	
	/**
	 * Carga la lista de datos por categoría
	 *
	 * @access private
	 * @return string
	 */
	private function _obtenerDatosCategoria($idCategoria, $offset = NULL) {
		
		$width = 270;
		$height = 300;
		
		$datos = $this->dato_model->getDatosByCategory($idCategoria, self::MAX_VIEW_DATOS, $offset);

		// Le agrega el row number para poder manejar el "ver más" y reutilizarlo para todo
		if(!is_null($datos)) {
			$row = is_null($offset) ? 0 : $offset;
			foreach($datos as $dato) {
				// Imágenes
				$dato->imagenes = $this->_imagenesDato($width, $height, $dato->id_dato);
				// Pivot de ordenamiento
				$dato->row = ++$row;
			}
		}
		
		return $datos;
		
	}
	
	/**
	 * Obtiene las imágenes de un determinado dato
	 * Además determina cual es la mayor para dejarla como principal por defecto
	 *
	 * @access private
	 * @return string
	 */
	private function _imagenesDato($width, $height, $idDato) {
		
		$imagenes = $this->dato_model->getImagenesDato($idDato);
		
		if(!is_null($imagenes)) {
			// Si hay imágenes, procesa los tamaños respecto al tamaño por defecto
			$imgMax = NULL;
			foreach($imagenes as &$img) {
				
				$w = (int)$img->image_width;
				$h = (int)$img->image_height;
				
				// Evalúa tamaño para creación de thumbnail
				$res = $this->_redemCalculate($width, $height, $w, $h);
	
				$img->image_width_redem = $res->x;
				$img->image_height_redem = $res->y;
				
				// Con esto evalúa cual es la mayor para dejarla como principal
				if(is_null($imgMax)) {
					
					$img->principal = 1;
					$imgMax =& $img;
					
				} else {
					
					$sumMax = $imgMax->image_width_redem + $imgMax->image_height_redem;
					$sum = $img->image_width_redem + $img->image_height_redem;
					
					if($sum > $sumMax) {
						$imgMax->principal = 0; // lo quita como principal
						$img->principal = 1;
						$imgMax =& $img;
					} else {
						$img->principal = 0;
					}
				}
				
			}
			
			return $imagenes;
		}
		
		return NULL;
		
	}
	
	/**
	 * Genera datos para ser visualizados los side-bar
	 *
	 * @access private
	 * @return void
	 */
	private function _prepareDatosPromociones(&$datos, $imgDefault, $w, $h) {
		
		$pathImg = $this->data["host"]."uploads/images/";
		
		foreach($datos as $d) {
				
			$imagenes = $this->_imagenesDato($w, $h, $d->id_dato);
			
			// Imágenes por defecto
			$mainImg = $imgDefault;
			$hoverImg = $mainImg;
				
			if(!is_null($imagenes)) {
				foreach($imagenes as $img) {
					if((int)$img->principal == 1) {
						$mainImg = $pathImg.$img->file_name;
						$hoverImg = $pathImg.$img->file_name;
						break;
					}
				}
			}
			
			$d->valor = "$".number_format((float)$d->valor,0,",",".");
			$d->imagenA = $mainImg;
			$d->imagenB = $hoverImg;
			$d->ir = base_url()."datos/ver/".$this->_base64url_encode($d->id_dato);
			
		}
		
	}
	
	
	/**
	 * Calcula el tamaño para las dimensiones recibidas
	 * Retorna un objeto con las nuevas (w,h)
	 *
	 * @access private
	 * @return Object
	 */
	private function _redemCalculate($wPivot, $hPivot, $w, $h) {

		$res = new stdClass();
		
		// Primero evalúa en que condición se encuentran los tamaños respecto
		// al tamaño por defecto
		
		if($w <= $wPivot && $h <= $hPivot) {
			
			// Ambas menores, no hace ningún cálculo, retorna lo mismo
			$res->x = $w;
			$res->y = $h;
			
		} else if($w > $wPivot && $h <= $hPivot) {
			
			// Toma razón respecto a $w
			$res = $this->_redemX($wPivot, $w, $h);
			
		} else if($w <= $wPivot && $h > $hPivot) {
			
			// Toma razón respecto a $h
			$res = $this->_redemY($hPivot, $w, $h);
			
		} else {
			// Ambas mayores
			// Verifica cual de las dos es mayor
			if($w > $h) {
				$res = $this->_redemX($wPivot, $w, $h);
			} else if($h > $w) {
				$res = $this->_redemY($hPivot, $w, $h);
			} else {
				// Son iguales, así que toma la razón respecto al mayor del tipo defecto
				// En este caso será HEIGHT_IMG (300) en vez de $wPivot (270)
				$res = $this->_redemY($hPivot, $w, $h);
			}
		}
		
		return $res;
	}
	
	private function _redemX($wPivot, $w, $h) {
		
		$res = new stdClass();
		
		$razon = round($wPivot / $w, 4, PHP_ROUND_HALF_DOWN);
		$res->x = $wPivot;
		$res->y = round($h * $razon, 0);
		
		return $res;
		
	}
	
	private function _redemY($hPivot, $w, $h) {
		
		
		$res = new stdClass();
		
		$razon = round($hPivot / $h, 4, PHP_ROUND_HALF_DOWN);
		$res->x = round($w * $razon, 0);
		$res->y = $hPivot;
		
		return $res;
		
	}


	/**
	 * Calcula el ratio en las dimensiones entregadas,
	 * generando un resultado redimensionado en función de aquello.
	 * SIEMPRE se considera el primer valor como el mayor
	 *
	 * @access private
	 * @return Object
	 */
	private function _redem($x, $y, $max) {

		$newX = 0;
		$newY = 0;
	
		if($max == "w") {
			
			$porc = round(self::WIDTH_IMG / $x, 4, PHP_ROUND_HALF_DOWN);

			$newX = self::WIDTH_IMG;
			$newY = round($y * $porc, 0);
			
		} else {
			
			$porc = round(self::HEIGHT_IMG / $y, 4, PHP_ROUND_HALF_DOWN);

			$newY = round($x * $porc, 0);
			$newX = self::HEIGHT_IMG;
			
		}
	
		
		$salida = new stdClass();
		$salida->x = $newX;
		$salida->y = $newY;

		return $salida;
	} 
	
	
	
	/**
	 *  Salida general para respuestas en formato JSON
	 *
	 * @access private
	 * @return string
	 */
	private function _json($obj) {
		echo json_encode(array(
								"errCode" => $obj->errCode, 
								"errMessage" => $obj->errMessage,
								"result" => $obj->result
							)
						);
	}

	
	// Verifica los parámetros necesarios para una petición post
	private function _validParams($post, $params) {
		
		$l = count($params);

		for($i=0;$i<$l;$i++) {
			$key = $params[$i];
			if(!isset($post->$key)) {
				log_message("error", "Falta el campo [$key]");
				return FALSE;
			}
		}
		
		return TRUE;
		
	}
	
	
	/**
	 * Métodos para simple encrypt/decrypt
	 * Siempre los 5 primeros valores serán random y no se considerarán
	 *
	 * @access private
	 * @return string
	 */
	private function _base64url_encode($data) {
		$multipler = rand(1,999);
		$sep = "|";
		$rand = rand(10000,99999);
		$data = $rand.$sep.$multipler.$sep.($data*$multipler);
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 

	private function _base64url_decode($data) {
		
		$decoded = base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
		$arr = explode("|", $decoded);
		$l = count($arr);
		$id = (int)$arr[$l-1] / (int)$arr[$l-2];
		//$str = substr($decoded, 5, strlen($decoded)-5); // desde el 6 hasta el último (index = 5)

		return $id;
	}
	
}
?>