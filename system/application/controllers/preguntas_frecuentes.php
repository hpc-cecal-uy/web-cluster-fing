<?php 

class Preguntas_Frecuentes extends Controller {
	
	function Preguntas_Frecuentes() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'preguntas_frecuentes';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/preguntas_frecuentes.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
}

?>
