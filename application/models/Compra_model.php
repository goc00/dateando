<?php class Compra_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	// Obtener feedbacks de las compras de un determinado dato
	function getFeedbacks($idDato) {
		
		$this->db->select("f.*, u.nombre_usuario, u.nombre_fb, u.desde_fb");
		$this->db->from("feedback f");
		$this->db->join("compra c", "f.id_compra = c.id_compra");
		$this->db->join("usuario u", "f.id_usuario = u.id_usuario");
		$this->db->where("c.id_dato = $idDato");
		
		$res = $this->db->get();
		if($res->num_rows() > 0) return $res->result();
		else return NULL;
		
	}

}
?>