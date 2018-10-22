<?php class Favorito_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	// Obtengo registro de favorito por usuario y dato
	function getFavByIdDatoAndIdUsuario($idDato, $idUsuario) {
		
		$res = $this->db->get_where("favorito",
									array("id_dato" => $idDato, "id_usuario" => $idUsuario));
		if($res->num_rows() > 0) return $res->row();
		else return NULL;

	}
	
	function addFav($o) {
		if($this->db->insert("favorito", $o))
			return $this->db->insert_id();
            
        return NULL;
	}

}
?>