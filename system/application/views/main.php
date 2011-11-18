<img src="<?php echo base_url();?>img/1m-horas-ribbon.gif" style="position: absolute; top: 0px; right: 0px;" />
<div id="foto-slider">
	<img src="<?php echo base_url();?>img/fotos/1.jpg" alt="" title="Cluster FING" />
	<img src="<?php echo base_url();?>img/fotos/2.jpg" alt="" title="Cluster FING" style="display:none;" />
	<img src="<?php echo base_url();?>img/fotos/3.jpg" alt="" title="Cluster FING" style="display:none;" />
	<img src="<?php echo base_url();?>img/fotos/4.jpg" alt="" title="Cluster FING" style="display:none;" />
	<img src="<?php echo base_url();?>img/fotos/5.jpg" alt="" title="Cluster FING" style="display:none;" />
	<img src="<?php echo base_url();?>img/fotos/6.jpg" alt="" title="Cluster FING" style="display:none;" />
</div>
<div id="two-columns">
	<div id="left-column">
		<div class="module">
			<div class="module-title">¡Cumplimos 1.000.000 de horas de cómputo!</div>
			<!--<div class="module-title">¡Falta poco para cumplir el 1.000.000 de horas!</div>-->
			<div class="module-body">
				<img src="<?php echo base_url();?>img/party_helium_balloons_clip_art_25507.jpg" width="180px" style="margin-bottom: 10px;"></img>
				<div style="float:right; width:230px; padding-right:15px;font-size:14px;text-align:justify;">
					¡Albricias, el proyecto cluster FING cumplió 1.000.000 de horas de cómputo el viernes 16 de setiembre del 2011 a las 20:46!<br/><br/>
					Nuestros agradecimientos a todos los que colaboraron para que este hito pudiera ser alcanzado.<br/>
					<br/>Total de horas de cómputo hasta el momento:<br/>
					<div style="text-align:center;margin-top:5px;">
						<div id="counter"><input type="hidden" name="counter-value" value="0" /></div>
					</div>
					<!-- <br/><a href="about:none" style="font-size:12px;float:right;">[leer más...]</a> -->
				</div>
				<br/><br/><br/><br/>
				<span style="font-weight:bold; margin-left:20px; margin-bottom:3px;">¿Qué hicimos en este primer millón de horas?</span>
				<center><img src="<?php echo base_url();?>img/indicadores.png"></img></center>
				<script type="text/javascript">
				        jQuery(document).ready(function($) {
				                //$("#counter").flipCounter({imagePath:"http://localhost/web-cluster-fing/img/flipCounter-medium.png"});
				                $("#counter").flipCounter({imagePath:"http://www.fing.edu.uy/cluster/img/flipCounter-medium.png",number:0});
				                //$("#counter").flipCounter({imagePath:"http://localhost/web-cluster-fing/img/flipCounter-custom.png",number:0,digitHeight:67,digitWidth:50});              
				                $("#counter").flipCounter(
				                        "startAnimation", // scroll counter from the current number to the specified number
				                        {
				                                number: <?php echo $horas;?>, // the number we want the counter to scroll to
				                                easing: jQuery.easing.easeOutCubic, // this easing function to apply to the scroll.
				                                duration: 3000 // number of ms animation should take to complete
				                        }
				                );    
				        });
				</script>
			</div>
		</div>
		<div class="module">
			<div class="module-title">Estad&iacute;sticas en tiempo real</div>
			<div class="module-body">
				<div id="slideshow">
				    <div id="slidesContainer">
				      <div class="slide">
				        <h3></h3>
				        <p><a href="http://www.fing.edu.uy/cluster/ganglia/" target="_new"><img src="http://www.fing.edu.uy/cluster/ganglia/graph.php?g=load_report&z=medium&c=FING%20Cluster&m=&r=hour&s=descending&hc=4" /></a></p>
		              </div>
					  <div class="slide">
				        <h3></h3>
				        <p><a href="http://www.fing.edu.uy/cluster/ganglia/" target="_new"><img src="http://www.fing.edu.uy/cluster/ganglia/graph.php?g=cpu_report&z=medium&c=FING Cluster&m=&r=hour&s=descending&hc=4" /></a></p>
				      </div>
					  <div class="slide">
				        <h3></h3>
				        <p><a href="http://www.fing.edu.uy/cluster/ganglia/" target="_new"><img src="http://www.fing.edu.uy/cluster/ganglia/graph.php?g=mem_report&z=medium&c=FING%20Cluster&m=&r=hour&s=descending&hc=4" /></a></p>
				      </div>
		      		  <div class="slide">
				        <h3></h3>
				        <p><a href="http://www.fing.edu.uy/cluster/ganglia/" target="_new"><img src="http://www.fing.edu.uy/cluster/ganglia/graph.php?g=network_report&z=medium&c=FING%20Cluster&m=&r=hour&s=descending&hc=4" /></a></p>
				      </div>	      
		            </div>
			    </div>
			</div>
	    </div>
		<div class="module">
			<div class="module-title">Noticias</div>
			<div class="module-body">
				<ul class="noticias">
					<?php foreach($noticias as $noticia):?>
						<li class="noticia">
							<span class="noticia_titulo"><?php echo $noticia['titulo'];?></span><br/>
							<span class="noticia_fecha"><?php echo $noticia['fecha'];?></span>
							<div class="noticia_contenido"><?php echo $noticia['contenido'];?></div>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<div id="right-column">
		<div class="module">
			<div class="module-title">II Seminario Multidisciplinario de Computación Científica de Alto Desempeño</div>
			<div class="module-body">
				<img src="<?php echo base_url();?>img/logo-niccad.png" width="180px" style="margin-bottom: 10px;"></img>
				<div style="float:right; width:230px; padding-right:15px;font-size:14px;text-align:justify;">
					El próximo jueves 24 de noviembre de 2011 se llevará a cabo el II Seminario Multidisciplinario de 
					Computación Científica de Alto Desempeño.<br/><br/>El mismo se desarrollará en el Salón B11 del Polifuncional 
					José Luis Massera de la Facultad de Ingeniería, de 10 a 17 horas.<br/>
					<a href="http://www.fing.edu.uy/cluster/seminario/2011/" style="font-size:12px;float:right;">[leer más...]</a>
				</div>
				<br/><br/><br/><br/>
			</div>
		</div>
		<div class="module" style="background-image:url(img/1278458880_kdmconfig_64x64.png);">
			<div class="module-title">Nuevos usuarios</div>
			<div class="module-body">
				<a href="<?php echo base_url();?>index.php/como_conectarse" class="menu-option">C&oacute;mo conectarse</a>
				<a href="<?php echo base_url();?>index.php/como_ejecutar_trabajo" class="menu-option">C&oacute;mo ejecutar un trabajo</a>
				<a href="<?php echo base_url();?>index.php/comandos_uso_cotidiano" class="menu-option">Comandos de uso cotidiano</a>
				<a href="<?php echo base_url();?>index.php/preguntas_frecuentes" class="menu-option">Preguntas frecuentes</a>
				<a href="<?php echo base_url();?>index.php/qsubscript" class="menu-option" target="_new">Generador de scripts qsub</a>
			</div>
		</div>
		<div class="module" style="background-image:url(img/1278458679_kcmpartitions_64x64.png);">
			<div class="module-title">Reportes</div>
			<div class="module-body">
				<a href="http://www.fing.edu.uy/cluster/estadisticas.html" class="menu-option" target="_new">Estad&iacute;sticas de uso mensual</a>
				<a href="http://www.fing.edu.uy/cluster/ganglia/" class="menu-option" target="_new">Estad&iacute;sticas de tiempo real (completas)</a>
				<a href="http://www.fing.edu.uy/cluster/gstat.txt" class="menu-option" target="_new">Uso de CPU</a>
				<a href="http://www.fing.edu.uy/cluster/uso.disco.home.cluster.txt" class="menu-option" target="_new">Uso de espacio de almacenamiento</a>
			</div>
		</div>
		<div class="module" style="background-image:url(img/1280934526_package_edutainment_64x64.png);">
			<div class="module-title">Enseñanza</div>
			<div class="module-body">
				<a href="http://www.fing.edu.uy/cluster/grupo/cluster_arquitectura_y_aplicaciones.pdf" class="menu-option">Charla 1 (cluster)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/cluster_memoria_compartida.pdf" class="menu-option">Charla 2 (memoria compartida)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/cluster_memoria_distribuida.pdf" class="menu-option">Charla 3 (memoria distribuida)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_1.pdf" class="menu-option">Nivelaci&oacute;n 1 (Unix-Linux)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_2.pdf" class="menu-option">Nivelaci&oacute;n 2 (Unix-Linux)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/Fortran.pdf" class="menu-option">FORTRAN</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_3.pdf" class="menu-option">Nivelaci&oacute;n 3 (Unix-Linux)</a>
			</div>
		</div>
		<div class="module" style="background-image:url(img/1280327953_edu_science_64x64.png);">
			<div class="module-title">Investigación</div>
			<div class="module-body">
				<a href="http://www.fing.edu.uy/grupos/niccad/index.php" class="menu-option">N&uacute;cleo Interdisciplinario de Computaci&oacute;n Cient&iacute;fica de Alto Desempe&ntilde;o (NICCAD)</a>
				<a href="http://www.fing.edu.uy/cluster/seminario/" class="menu-option">Seminario Multidisciplinario de Computaci&oacute;n Cient&iacute;fica de Alto Desempe&ntilde;o</a>
				<a href="http://www.fing.edu.uy/cluster/seminario/2011/" class="menu-option">II Seminario Multidisciplinario de Computación Científica de Alto Desempeño</a>
			</div>
		</div>
		<div class="module" style="background-image:url(img/1278458764_folder_green_64x64.png);">
			<div class="module-title">Documentos</div>
			<div class="module-body">
				<a href="<?php echo base_url();?>files/clusterFING_estructura.pdf" class="menu-option">Descripci&oacute;n t&eacute;cnica</a>
				<a href="http://www.fing.edu.uy/cluster/pdfs/politicas.pdf" class="menu-option">Pol&iacute;ticas de uso</a>
				<a href="http://www.fing.edu.uy/cluster/pdfs/Reglamento.pdf" class="menu-option">Reglamento de uso</a>
			</div>
		</div>
	</div>
	<div class="logos">
		<a href="http://www.fing.edu.uy/inco/grupos/cecal/" target="_new"><img src="<?php echo base_url();?>img/logo_cecal.png" alt="cecal" /></a>
		<a href="http://www.fing.edu.uy/" target="_new"><img src="<?php echo base_url();?>img/logo_fing.jpg" alt="fing" /></a>
		<a href="http://www.csic.edu.uy/" target="_new"><img src="<?php echo base_url();?>img/logo_csic.png" alt="csic" /></a>
		<a href="http://www.gisela-grid.eu/" target="_new"><img src="<?php echo base_url();?>img/gisela_168x114.jpg" alt="csic" /></a>
	</div>
	<div class="contacto">
		<table border="0" style="margin:auto">
			<tr>
				<td valign="top" style="text-align: right;">e-mail de contacto:</td>
				<td valign="bottom" style="text-align: left;"><img src="<?php echo base_url();?>img/email.png"/></td>
			</tr>
			<tr><td style="text-align: right;">grupo de noticias:</td><td style="text-align: left;">fing.cluster.general</td></tr>
		</table>
	</div>
</div>
