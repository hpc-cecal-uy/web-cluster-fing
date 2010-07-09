<?php

class Como_Conectarse extends Controller {
	
	function Como_Conectarse() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'como_conectarse';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/como_conectarse.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
	
}

?>