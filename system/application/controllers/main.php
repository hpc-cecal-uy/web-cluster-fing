<?php  

class Main extends Controller {
	
	function Main() {
		parent::Controller();
	} 
	
	function index() {
		$this->load->helper('file');
		$this->load->helper('date');
		
		$data['volver_style'] = 'display:none';
		$data['body'] = 'main';
		$data['js_include'] = '<script src="'.base_url().'js/main.js" type="text/javascript" charset="utf-8"></script>'.
			'<script src="'.base_url().'js/jquery.nivo.slider.js" type="text/javascript" charset="utf-8"></script>'.
			'<script src="'.base_url().'js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>'.
			'<script src="'.base_url().'js/jquery.flipCounter.1.1.pack.js" type="text/javascript" charset="utf-8"></script>';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/main.css" type="text/css" media="screen" />'.
			'<link rel="stylesheet" href="'.base_url().'css/nivo-slider.css" type="text/css" media="screen" />';
		
		$data['noticias'] = $this->obtenerNoticias();
		
		// Horas de cómputo ------------------
		//$file = "/home/santiago/eclipse/php-workspace/web-cluster-fing/Cluster.All.Hours.txt";
		//$file = "/fing/web/cluster/Cluster.All.Hours.txt";
		$file = "/fing/web/cluster/Cluster.Pbsacct.Hours.txt";
		$f = fopen($file, "r");
		
		$file2 = "/fing/web/cluster/Contador.Horas.Actual.txt";
		$f2 = fopen($file2, "r");
		
		if ($line = fgets($f, 1000)) {
			$data['horas'] = trim($line);
			if ($line2 = fgets($f2, 1000)) {
				$data['horas'] += trim($line2);
			}
			else {
				$data['horas'] = "1000000";
			}
		}
		// Horas de cómputo ------------------
		
		//ranking estimaciones
		$file2 = "/fing/web/cluster/estadisticas/rankingEstimaciones.html";
		$f2 = fopen($file2, "r");
		$data['rankingEstimaciones'] = '';
		while ($line2 = fgets($f2, 1000)){
			$data['rankingEstimaciones'] = $data['rankingEstimaciones'] . $line2; 
		}
		
		$this->load->view('includes/template', $data);
	}
	
	function obtenerNoticias() {		
		$noticias = array();
		
		$path_noticias = APPPATH.'views/includes/noticias';
		$archivos = get_dir_file_info($path_noticias);
		
		foreach ($archivos as $archivo) {	
			$archivo_nombre = $archivo['name'];
			$archivo_path = $archivo['server_path'];
			$archivo_timestamp = filemtime($archivo_path);
			$archivo_fecha = unix_to_human($archivo_timestamp, FALSE, 'eu');
			$archivo_contenido = read_file($archivo_path);
			
			$pos = strpos($archivo_contenido, "\n");
			
			if ($pos > 0) {
				$cuerpo = substr($archivo_contenido, $pos, strlen($archivo_contenido));
				$titulo = substr($archivo_contenido, 0, $pos);	
			} else {
				$titulo = $archivo_contenido;
				$cuerpo = "";
			}
			
			$pos = strrpos($archivo_nombre, ".");
			if ($pos > 0) {
			    $archivo_nombre = substr($archivo_nombre, 0 , $pos);
			}
			
			array_push($noticias, array(
				'titulo'=>$titulo,
				'timestamp'=>$archivo_timestamp,
				'fecha'=>$archivo_fecha,
				'contenido'=>$cuerpo));			
		}
		
		usort($noticias, 'sort_cmp');
		$noticias = array_slice($noticias, 0, 10);
		
		return $noticias;
	}
}

function sort_cmp($a, $b)
{
    if ($a['timestamp'] == $b['timestamp']) {
        return 0;
    }
    return ($a['timestamp'] < $b['timestamp']) ? 1 : -1;
}

?>
