<?php  

class Main extends Controller {
	
	function Main() {
		parent::Controller();
	} 
	
	function index() {
		$data['body'] = 'main';
		$data['js_include'] = '';
		$this->load->view('includes/template', $data);
	}
	
}

?>