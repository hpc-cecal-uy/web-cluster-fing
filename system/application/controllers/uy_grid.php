<?php

class Uy_Grid extends Controller {

	function Uy_Grid() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'uy_grid';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/uy_grid.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
	
}

?>