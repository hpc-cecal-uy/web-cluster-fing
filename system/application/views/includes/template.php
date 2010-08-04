<!DOCTYPE html>

<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Cluster FING</title>
		<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
		<?php echo $css_include; ?>
				
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo base_url();?>js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
		<?php echo $js_include; ?>
	</head>
	<body>
		<div id="page">
			<div id="page-header">
				<div id="page-header-body">
					<a href="<?php echo base_url();?>index.php"><img src="<?php echo base_url();?>img/cluster_fing.png"></img></a>
					<p>
						El cluster FING es una infraestructura de c&oacute;mputo de alto desempe&ntilde;o 
						perteneciente a la Facultad de Ingenier&iacute;a. Su principal objetivo consiste 
						en proveer soporte para la resoluci&oacute;n de problemas complejos que demanden 
						un gran poder de c&oacute;mputo. El cluster  FING fue adquirido con fondos del 
						llamado de Fortalecimiento de Equipamientos para la Investigaci&oacute;n de la 
						Comisi&oacute;n Sectorial de Investigaci&oacute;n Cient&iacute;fica (2008). 
					</p>
					<div class="volver_header" style="<?php echo $volver_style; ?>">
						<a href="<?php echo base_url();?>index.php">volver a la página principal</a>
					</div>
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