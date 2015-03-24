<?php 

class Infraestructura extends Controller {
	
	function Inraestructura() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'infraestructura';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/como_ejecutar_trabajo.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
}

?>
