<?php 

class Como_Ejecutar_Trabajo extends Controller {
	
	function Como_Ejecutar_Trabajo() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'como_ejecutar_trabajo';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/como_ejecutar_trabajo.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
}

?>