<!DOCTYPE html>

<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>NICCAD</title>
		<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
		<?php echo $css_include; ?>
				
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<?php echo $js_include; ?>
	</head>
	<body>
		<div id="page">
			<div id="page-header">
				<div id="page-header-body">
					<a href="<?php echo base_url();?>index.php"><img src="<?php echo base_url();?>img/niccad.png"></img></a>
					<p>
						Núcleo Interdisciplinario de Computación Científica de Alto Desempeño
					</p>
				</div>
			</div>
			
			<div id="page-body">
				<?php $this->load->view($body); ?>
			</div>
			
			<div id="page-footer">
				<div id="page-footer-body">
					<p>Esta p&aacute;gina fue generada en {elapsed_time} segundos.</p>
				</div>
			</div>
		</div>
	</body>
</html>