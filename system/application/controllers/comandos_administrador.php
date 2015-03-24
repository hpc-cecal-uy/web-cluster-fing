<?php 

class Comandos_Administrador extends Controller {
	
	function Comandos_Administrador() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'comandos_administrador';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/comandos_administrador.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
}

?>
