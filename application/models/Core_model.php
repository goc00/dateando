<?php class Core_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function inicioTrx() {
		$this->db->trans_begin();
	}
	function commitTrx() {
		$this->db->trans_commit();
	}
	function rollbackTrx() {
		$this->db->trans_rollback();
	}

}
?>