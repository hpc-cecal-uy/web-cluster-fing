<?php  

class Main extends Controller {
	
	function Main() {
		parent::Controller();
	} 
	
	function index() {
		$data['body'] = 'main';
		$data['js_include'] = '<script src="'.base_url().'js/main.js" type="text/javascript" charset="utf-8"></script>'.
			'<script src="'.base_url().'js/jquery.nivo.slider.js" type="text/javascript" charset="utf-8"></script>';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/main.css" type="text/css" media="screen" />'.
			'<link rel="stylesheet" href="'.base_url().'css/nivo-slider.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
}

?>