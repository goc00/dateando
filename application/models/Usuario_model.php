<?php class Usuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	// Obtener usuario por nombreUsuario y password
	function getUsuario($nombreUsuario, $pass) {
		$res = $this->db->get_where("usuario", array("nombre_usuario" => $nombreUsuario, "contrasena" => $pass));
		if($res->num_rows() > 0) return $res->row();
		else return NULL;
	}
	
	// Usuario por nombreUsuario
	function getByUsername($nombreUsuario) {
		$res = $this->db->get_where("usuario", array("nombre_usuario" => $nombreUsuario));
		if($res->num_rows() > 0) return $res->row();
		else return NULL;
	}
	// Usuario por email
	function getByEmail($email) {
		$res = $this->db->get_where("usuario", array("email" => $email));
		if($res->num_rows() > 0) return $res->row();
		else return NULL;
	}
	
	// Nuevo usuario
	function nuevo($o) {
		if($this->db->insert("usuario", $o))
			return $this->db->insert_id();
            
        return NULL;
	}
	
	// Registra acceso del usuario
	function registerAccess($idUsuario) {
		
		$arr = array(
				"id_usuario" => $idUsuario,
				"fecha_ingreso" => date("Y-m-d H:i:s")
			);
		if($this->db->insert("acceso", $arr))
			return $this->db->insert_id();
            
        return NULL;
	}
	
	// Busca usuario por id de facebook
	function getUserByIdFb($idFb) {
		$res = $this->db->get_where("usuario", array("id_fb" => $idFb,
													"desde_fb" => 1));
		if($res->num_rows() > 0) return $res->row();
		else return NULL;
	}

}
?>