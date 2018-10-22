<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	public function index() {
		$this->load->view('index', $this->data);
	}
}
