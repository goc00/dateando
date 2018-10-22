<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends MY_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->model('usuario_model', '', TRUE);
		//$this->load->model('core_model', '', TRUE);
	}
	
	
	/**
	 * Redirecciona a secciones correspondientes dentro de "Cuenta"
	 *
	 * @access public
	 * @return string
	 */
	public function go($view) {
		
		if($this->isLogged()) {
			
			$view = strtolower($view);
			$view = str_replace("-", "_", $view);

			$this->load->view("cuenta/".$view, $this->data);
			
		} else {
			redirect(base_url()."ingresar");
		}
		
		

	}
	
}
?>