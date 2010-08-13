<?php  

class Nucleo extends Controller {
	
	function Nucleo() {
		parent::Controller();
	} 
	
	function index() {
		$data['body'] = 'nucleo/nucleo';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = '';
		$this->load->view('nucleo/includes/template', $data);
	}

}

?>