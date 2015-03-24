<?php 

class Prueba_Grafica_Estadisticas extends Controller {
	
	function Prueba_Grafica_Estadisticas() {
		parent::Controller();
	}
	
	function index() {
		$data['body'] = 'prueba_grafica_estadisticas';
		$data['volver_style'] = '';
		$data['js_include'] = '<script src="'.base_url().'js/Chart.min.js"></script>'.
			'<script src="'.base_url().'js/main.js" type="text/javascript" charset="utf-8"></script>'.
                        '<script src="'.base_url().'js/jquery.nivo.slider.js" type="text/javascript" charset="utf-8"></script>'.
                        '<script src="'.base_url().'js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>'.
                        '<script src="'.base_url().'js/jquery.flipCounter.1.1.pack.js" type="text/javascript" charset="utf-8"></script>';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/main.css" type="text/css" media="screen" /> <link rel="stylesheet" href="'.base_url().'css/styles.css" type="text/css" media="screen" /> <link rel="stylesheet" href="'.base_url().'css/estadisticas.css" type="text/css" media="screen" />'.
                        '<link rel="stylesheet" href="'.base_url().'css/main.css" type="text/css" media="screen" /> ';
		$file2 = "/fing/web/cluster/estadisticas/graficaUsoPorGrupo.html";
                $f2 = fopen($file2, "r");
                $data['graficaUso'] = '';
                while ($line2 = fgets($f2, 1000)){
                        $data['graficaUso'] = $data['graficaUso'] . $line2;
                }

		//ranking estimaciones
                $file3 = "/fing/web/cluster/estadisticas/rankingEstimaciones.html";
                $f3 = fopen($file3, "r");
                $data['rankingEstimaciones'] = '';
                while ($line3 = fgets($f3, 1000)){
                        $data['rankingEstimaciones'] = $data['rankingEstimaciones'] . $line3;
                }

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
