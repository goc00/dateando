<?php
class MY_Controller extends CI_Controller {
	
	// Constantes
	const CLP						= 1;
	const PIVOT						= "@@PIVOT@@";
	
	// Perfiles
	const PERFIL_ADMIN				= 1;
	const PERFIL_USUARIO_NORMAL		= 2;
	
	// Tipos de monto
	const MONTO_5					= 1;
	const MONTO_10					= 2;
	const MONTO_20					= 3;
	
	protected $data;

	function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Santiago");
		
		$this->data["host"] = base_url();
		if($this->isLogged()) {
			$this->data["signedIn"] = TRUE;
			$this->data["nombreUsuario"] = $this->encryption->decrypt($this->session->userdata("nu"));
		} else {
			$this->data["signedIn"] = FALSE;
		}
	}
	
	
	/**
	 * Es data válida, tomando separador y posición
	 */
	protected function isDataValid($data) {
		// Desencripta
		$decoded = $this->encryption->decrypt($data);
		
		// Toma la posición del separador
		$pos = substr($decoded, strlen($decoded)-1, 1);
		$sepL = strlen(self::PIVOT);
		
		if((int)$pos == 1) {
			$sep = substr($decoded, strlen($decoded)-(1+$sepL), $sepL);
		} else {
			$sep = substr($decoded, 0, $sepL);
		}
		
		return $sep == self::PIVOT;	
	}
	
	/**
	 * Verifica que usuario esté autentificado y además la session sea válida
	 */
	protected function isLogged() {
		
		$logged = FALSE;
		$session = $this->session->userdata("id");
		
		if($session) {
			// Si está la session, verifica que además sea válida
			if($this->isDataValid($session)) $logged = TRUE;
		}
		
		return $logged;
	}
	
	
	/**
	 * Lanza exception
	 */
	protected function exception($mensaje, $num) {
		throw new Exception($mensaje, $num);
	}
	
}

