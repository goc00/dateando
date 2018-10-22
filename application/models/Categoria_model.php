<?php class Categoria_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getAll() {
		return $this->db->get("categoria")->result();
	}
	
	// Obtiene listado de categorías y el total de datos respecto a cada una
	function getCategorias($estado) {
		$resultado = NULL;
		
		$this->db->select("COUNT( b.id_categoria ) as total, a.id_categoria, a.descripcion, a.slug");
		$this->db->from("categoria a");
		$this->db->join("(SELECT * FROM dato WHERE id_estado = $estado AND fecha_expiracion > now()) b", " a.id_categoria = b.id_categoria", "left");
		$this->db->group_by("a.id_categoria");
		$consulta = $this->db->get();
		if ($consulta->num_rows() > 0) $resultado = $consulta->result();

		return $resultado;
	}
	
	// Se trae categoria por slug
	function getCategoriaBySlug($slug) {
		$res = $this->db->get_where("categoria", array("slug" => $slug));
		if($res->num_rows() > 0) return $res->row();
		else return NULL;
	}
}
?>