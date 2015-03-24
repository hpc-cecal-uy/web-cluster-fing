<?php 

class Uso_Disco_Home extends Controller {
	
	function Uso_Disco_Home() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'uso_disco_home';
		$data['volver_style'] = '';
		$data['js_include'] = '<script src="'.base_url().'js/Chart.min.js"></script>'.
			'<script src="'.base_url().'js/main.js" type="text/javascript" charset="utf-8"></script>'.
                        '<script src="'.base_url().'js/jquery.nivo.slider.js" type="text/javascript" charset="utf-8"></script>'.
                        '<script src="'.base_url().'js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>'.
                        '<script src="'.base_url().'js/jquery.flipCounter.1.1.pack.js" type="text/javascript" charset="utf-8"></script>';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/main.css" type="text/css" media="screen" /> <link rel="stylesheet" href="'.base_url().'css/styles.css" type="text/css" media="screen" /> <link rel="stylesheet" href="'.base_url().'css/estadisticas.css" type="text/css" media="screen" />'.
                        '<link rel="stylesheet" href="'.base_url().'css/main.css" type="text/css" media="screen" /> ';
		
		$file4 = "/fing/web/cluster/estadisticas/tabla_uso_disco.html";
                $f4 = fopen($file4, "r");
                $data['tabla_uso_disco'] = '';
                while ($line4 = fgets($f4, 1000)){
                        $data['tabla_uso_disco'] = $data['tabla_uso_disco'] . $line4;
                }
		

		$this->load->view('includes/template', $data);
	}
}

?>
