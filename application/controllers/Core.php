<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('usuario_model', '', TRUE);
		$this->load->model('core_model', '', TRUE);
	}

	// Navegación (redirección) hacia vistas correspondientes
	public function go($view, $param = NULL) {
		$view = strtolower($view);
		$view = str_replace("-", "_", $view);
		
		switch($view) {
			case "datos":
				break;
			default:
				break;
		}
		
		$this->load->view($view, $this->data);
	}
	
	
	// Obtiene datos
	private function _getDatos($total) {
		
	}

}
?>