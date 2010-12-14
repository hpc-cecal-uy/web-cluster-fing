<?php

class Uy_Grid extends Controller {

	function Uy_Grid() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'uy_grid';
		$data['volver_style'] = '';
		$data['js_include'] = '<script src="'.base_url().'js/cloud-carousel.1.0.4.min.js" type="text/javascript" charset="utf-8"></script>';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/uy_grid.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
	
}

?>