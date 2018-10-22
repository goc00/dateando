<?php class Dato_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	// Nuevo dato
	function nuevo($o) {
		if($this->db->insert("dato", $o))
			return $this->db->insert_id();
            
        return NULL;
	}
	
	// Actualiza visitas
	function agregaVisita($idDato, $valor) {
		
		$data = array("visitas" => $valor);
		$this->db->where("id_dato", $idDato);
		
		return $this->db->update("dato", $data);
		
	}
	
	// Obtener datos
	function getDatoById($idDato) {
		
		$this->db->select("d.*, c.descripcion as 'categoria_desc', c.slug, m.valor, u.nombre_usuario, u.desde_fb, u.nombre_fb");
		$this->db->from("dato d");
		$this->db->join("categoria c", "d.id_categoria = c.id_categoria");
		$this->db->join("monto m", "d.id_monto = m.id_monto");
		$this->db->join("usuario u", "d.id_usuario = u.id_usuario");
		$this->db->where("d.id_dato = $idDato");
		
		$res = $this->db->get();
		if($res->num_rows() > 0) return $res->row();
		else return NULL;
	}
	
	
	// Guarda imágenes del dato
	function addImageDato($o) {
		if($this->db->insert("dato_imagen", $o))
			return $this->db->insert_id();
            
        return NULL;
	}
	
	// Datos MÁS COMPRADOS
	function getDatosMostBought($total = NULL, $offset = NULL) {
		
		$this->db->select("c.*, d.*, m.valor");
		$this->db->from("compra c");
		$this->db->join("dato d", "c.id_dato = d.id_dato");
		$this->db->join("monto m", "d.id_monto = m.id_monto");
		
		if(!is_null($total) && is_null($offset)) {
			$this->db->limit($total);
		} else if(!is_null($total) && !is_null($offset)) {
			$this->db->limit($total, $offset); // offset, total
		}

		$res = $this->db->get();
		
		if($res->num_rows() > 0) {
			
			// Busca los potenciales feedbacks para cada dato
			$datos = $res->result();
			foreach($datos as $dato) {
				
				$feedbacks = $this->getFeedbacksByIdDato($dato->id_dato);
				$dato->valorizacion = NULL;
				if(!is_null($feedbacks)) {
					$sum = 0;
					foreach($feedbacks as $fb) $sum += $fb->valorizacion;
					$dato->valorizacion = round($sum/count($feedbacks));
				}
			}
			
			return $datos;
		} else {
			return NULL;
		}
		
	}
	
	// Datos MÁS COMPRADOS
	function getDatosMostViewed($total = NULL, $offset = NULL) {
		
		$this->db->select("d.*, m.valor");
		$this->db->from("dato d");
		$this->db->join("monto m", "d.id_monto = m.id_monto");
		$this->db->order_by("d.visitas DESC, d.estado DESC, d.fecha_creacion DESC");
		
		if(!is_null($total) && is_null($offset)) {
			$this->db->limit($total);
		} else if(!is_null($total) && !is_null($offset)) {
			$this->db->limit($total, $offset); // offset, total
		}

		$res = $this->db->get();

		if($res->num_rows() > 0) {
			
			// Busca los potenciales feedbacks para cada dato
			$datos = $res->result();
			foreach($datos as $dato) {
				
				$feedbacks = $this->getFeedbacksByIdDato($dato->id_dato);
				$dato->valorizacion = NULL;
				if(!is_null($feedbacks)) {
					$sum = 0;
					foreach($feedbacks as $fb) $sum += $fb->valorizacion;
					$dato->valorizacion = round($sum/count($feedbacks));
				}
			}
			
			return $datos;
		} else {
			return NULL;
		}
		
	}
	
	// Datos por precio
	// Recibe como parámetro el tipo de precio
	function getDatosByPrice($idMonto, $total = NULL, $offset = NULL) {
		
		$datos = $this->getDatos(array("d.id_monto" => $idMonto), $total, $offset);
		
		if(!is_null($datos)) return $datos;
		else return NULL;

	}
	
	
	// Datos por categoría
	function getDatosByCategory($idCategoria, $total = NULL, $offset = NULL) {
		
		$datos = $this->getDatos(array("d.id_categoria" => $idCategoria), $total, $offset);
		
		if(!is_null($datos)) {

			return $datos;
			
		} else {
			return NULL;
		}
		
	}
	
	// Obtiene listado de datos, desde - hasta
	function getDatos($where = NULL, $total = NULL, $offset = NULL) {
		
		$this->db->select("d.*, m.valor");
		$this->db->from("dato d");
		$this->db->join("monto m", "d.id_monto = m.id_monto");
		if(!is_null($where)) $this->db->where($where);
		$this->db->order_by("d.estado DESC, d.fecha_creacion DESC");
		
		if(is_null($total) && is_null($offset)) {
			// no limit
		} else if(!is_null($total) && is_null($offset)) {
			$this->db->limit($total);
		} else {
			// vienen ambos
			$this->db->limit($total, $offset); // offset, total
		}

		$res = $this->db->get();
		
		if($res->num_rows() > 0) {
			
			// Busca los potenciales feedbacks para cada dato
			$datos = $res->result();
			foreach($datos as $dato) {
				
				$feedbacks = $this->getFeedbacksByIdDato($dato->id_dato);
				$dato->valorizacion = NULL;
				if(!is_null($feedbacks)) {
					$sum = 0;
					foreach($feedbacks as $fb) $sum += $fb->valorizacion;
					$dato->valorizacion = round($sum/count($feedbacks));
				}
			}
			
			return $datos;
		} else {
			return NULL;
		}
	}
	
	
	// Obtiene los feedbacks por el idDato
	function getFeedbacksByIdDato($idDato) {
		
		$this->db->select("f.*");
		$this->db->from("feedback f");
		$this->db->join("compra c", "f.id_compra = c.id_compra");
		$this->db->where("c.id_dato = $idDato");
		
		$res = $this->db->get();
		
		if($res->num_rows() > 0) return $res->result();
		else return NULL;
		
	}
	
	
	// Obtiene las imágenes de un dato
	function getImagenesDato($idDato) {
		$res = $this->db->get_where("dato_imagen", array("id_dato" => $idDato));
		if($res->num_rows() > 0) return $res->result();
		else return NULL;
	}

}
?>