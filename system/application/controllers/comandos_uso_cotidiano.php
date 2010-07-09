<?php 

class Comandos_Uso_Cotidiano extends Controller {
	
	function Comandos_Uso_Cotidiano() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'comandos_uso_cotidiano';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/comandos_uso_cotidiano.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
}

?>
