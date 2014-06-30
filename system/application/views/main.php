<!--<img src="<?php echo base_url();?>img/1m-horas-ribbon.gif" style="position: absolute; top: 0px; right: 0px;" />-->
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
			<div class="module-title">Cumplimos los 4.000.000 de horas de c&oacute;mputo</div>
			<div class="module-body">
				<!--<img src="<?php echo base_url();?>img/party_helium_balloons_clip_art_25507.jpg" width="180px" style="margin-bottom: 10px;"></img>-->
                                <img src="<?php echo base_url();?>img/4M.jpg" width="140px" style="margin-bottom: 80px;"></img>
				<div style="float:right; width:260px; padding-right:15px;font-size:14px;text-align:justify;">
					El proyecto cluster FING cumpli&oacute; 4.000.000 de horas de cómputo en enero de 2014. Nuestros agradecimientos a todos los que colaboraron para alcanzar este hito.<br/><br/>
					<br/>Total de horas de cómputo al día de hoy:<br/>
					<div style="text-align:center;margin-top:5px;">
						<div id="counter"><input type="hidden" name="counter-value" value="0" /></div>
					</div>
					<!-- <br/><a href="about:none" style="font-size:12px;float:right;">[leer más...]</a> -->
				</div>
				<br/>
				<!--<span style="font-weight:bold; margin-left:20px; margin-bottom:3px;">¿Qué se ha logrado en estas tres millones de horas?</span>-->
				<!--<center>-->
					<!--<img src="<?php echo base_url();?>img/indicadores-2012.png" width="400px"></img>-->
					<!--<table>
						<tr><td span=2><b>INDICADORES DEL CLUSTER FING</b></td></tr>
						<tr><td><b>Indicador</b></td><td><b>Valor (Mayo, 2013)</b></td></tr>
						<tr><td>Número de usuarios</td><td>&gt; 150, de 6 países</td></tr>
						<tr><td>Horas efectivas de cómputo</td><td>&gt; 2.900.000 horas (~332 años)</td></tr>
						<tr><td>Proyectos académicos</td><td>&gt; 35</td></tr>
						<tr><td>Tesis de posgrado</td><td>&gt; 30 Maestría y &gt; 15 Doctorado</td></tr>
						<tr><td>Grupos de investigación</td><td>25</td></tr>
						<tr><td>Proyectos y trabajos de grado</td><td>&gt; 100</td></tr>
						<tr><td>Convenios</td><td>9</td></tr>
						<tr><td>Atrículos publicados</td><td>&gt; 150</td></tr>
					</table>
				</center>-->
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
                        <div class="module-title">Indicadores del cluster FING</div>
                        <div class="module-body">
				<div style="text-align:right;font-weight:bold;">¿Qué se ha logrado en estas tres millones de horas?</div><br/>
		                <table width="100%" style="font-size:1.1em;font-weight:normal;" cellspacing=0>
                                        <tr style="background-color:#081073;color:white;font-weight:bold;">
						<td align="center">Indicador</td><td align="center">Valor (Julio, 2013)</td></tr>
                                        <tr><td>Número de usuarios</td><td align="right">&gt; ~200, de 8 países</td></tr>
                                        <tr><td>Horas efectivas de cómputo</td><td align="right">&gt; 4.500.000 horas (~515 años)</td></tr>
                                        <tr><td>Proyectos académicos</td><td align="right">&gt; 50</td></tr>
                                        <tr><td>Tesis de posgrado</td><td align="right">&gt; 40 Maestría y &gt; 20 Doctorado</td></tr>
                                        <tr><td>Grupos de investigación</td><td align="right">30</td></tr>
                                        <tr><td>Proyectos y trabajos de grado</td><td align="right">&gt; 130</td></tr>
        	                        <tr><td>Convenios</td><td align="right">12</td></tr>
                                        <tr><td>Atrículos publicados</td><td align="right">&gt; 250</td></tr>
	                        </table>	
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
		<!--<div class="module">
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
		</div>-->



               <div class="module" style="background-image:url(img/1278458880_kdmconfig_64x64.png);">
                        <div class="module-title">Ranking de estimaciones de usuarios</div>
			<div class="module-body">
				<?php echo $rankingEstimaciones;?>
				<div align="right">ranking de los últimos 60 días</div>
			</div>
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
                                <a href="http://www.fing.edu.uy/cluster/grupo/Multithreading-Clase1.pdf" class="menu-option">Curso de Programación Multithreading (ECAR 2012) [Clase 1]</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/Multithreading-Clase2.pdf" class="menu-option">Curso de Programación Multithreading (ECAR 2012) [Clase 2]</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/Multithreading-Clase3.pdf" class="menu-option">Curso de Programación Multithreading (ECAR 2012) [Clase 3]</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/cluster_arquitectura_y_aplicaciones.pdf" class="menu-option">Charla 1 (cluster)</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/cluster_memoria_compartida.pdf" class="menu-option">Charla 2 (memoria compartida)</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/cluster_memoria_distribuida.pdf" class="menu-option">Charla 3 (memoria distribuida)</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_1.pdf" class="menu-option">Nivelaci&oacute;n 1 (Unix-Linux)</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_2.pdf" class="menu-option">Nivelaci&oacute;n 2 (Unix-Linux)</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_3.pdf" class="menu-option">Nivelaci&oacute;n 3 (Unix-Linux)</a>
                                <a href="http://www.fing.edu.uy/cluster/grupo/Fortran.pdf" class="menu-option">FORTRAN</a>
                        </div>
                </div>
                <div class="module" style="background-image:url(img/1280327953_edu_science_64x64.png);">
                        <div class="module-title">Investigación</div>
                        <div class="module-body">
                                <a href="http://www.fing.edu.uy/grupos/niccad/index.php" class="menu-option">N&uacute;cleo Interdisciplinario de Computaci&oacute;n Cient&iacute;fica de Alto Desempe&ntilde;o (NICCAD)</a><br/>
                                <!--<a href="http://www.fing.edu.uy/cluster/seminario/" class="menu-option">Seminario Multidisciplinario de Computaci&oacute;n Cient&iacute;fica de Alto Desempe&ntilde;o</a>
                                <a href="http://www.fing.edu.uy/cluster/seminario/2011/" class="menu-option">II Seminario Multidisciplinario de Computación Científica de Alto Desempeño</a>-->
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
	<div id="right-column">
		<div class="module">
                        <div class="module-title">Evolución de horas de uso del cluster FING</div>
			<div style="padding:5px;margin:0px;text-align:center;">
				<a href="http://www.fing.edu.uy/cluster/img/horas_cluster_4M.png"><img src="http://www.fing.edu.uy/cluster/img/horas_cluster_4M.png" width="430px"></img></a>
			</div>
		</div>

		<div class="module">
                        <div class="module-title">Cluster FING: 8th in LARTOP 50 - 2013<!--50 fastest Supercomputers in Latin America--></div>
			<div style="padding:0px;margin:0px;text-align:center">
				<div style="text-align:right;font-weight:bold;margin-bottom:5px;">50 fastest Supercomputers in Latin America</div>
				<a href="http://www2.lartop50.org/src/#listing"><img src="http://www.fing.edu.uy/cluster/img/lartop50.jpg" width="430px"></img></a>
			</div>
		</div>

		<div class="module">
                        <div class="module-title">HPCLatAm - High-Performance Computing Latin America Community</div>
			<div style="padding:0px;margin:0px;text-align:center">
				<a href="http://hpclatam.org/">
					<img width="160px" style="margin-bottom: 10px;" src="http://hpclatam.org/img/logo_hpclatam.png"></img></a>
				<div style="float:right;width:260px;text-align:left;width:250px;margin-top:5px;">
HPCLatAm gathers a young but growing community of scientist and practitioners of the HPC in Latin America. The past events proved that the HPC community in the region is steadely growing. HPCLatAm aims to bring together researchers, developers, and users of HPC to discuss new ideas, experiences, and problems. <br/>The main goal of HPCLatAm is to provide a regional forum fostering the growth of the HPC community in Latin America through the exchange and dissemination of new ideas, techniques, and research in HPC.
				</div>
				<br/><br/><br/><br/>
				<div style="text-align:right;">
					<a href="http://hpclatam.org/">P&aacute;gina web</a>&nbsp;<img src="http://www.fing.edu.uy/cluster/img/1376705828_home.png"/><br/>
					<a href="http://www.linkedin.com/groups/HPC-Latam-5139928"/>Grupo de discusi&oacute;n</a>&nbsp;<img src="http://www.fing.edu.uy/cluster/img/1376705841_linked_in.png"/>
				</div>
				<br/>
			</div>
		</div>

		<div class="module">
                        <div class="module-title">STIC-AmSud Scientific Meeting</div>
			<div style="padding:0px;margin:0px;text-align:center;">
				<a href="http://www.fing.edu.uy/grupos/niccad/stic-amsud-2012/"><img src="http://www.fing.edu.uy/grupos/niccad/stic-amsud-2012/logo_2.png" width="300px"></img></a>
			</div>
		</div>




                <div class="module">
                        <div class="module-title">Evento interdisciplinario PEDECIBA: "Computación Científica de Alto Desempeño"</div>
                        <div class="module-body">
				<div style="float:left; width:130px; text-align: center;">
                                    <img src="http://www.fing.edu.uy/grupos/niccad/ccad-2012/logo_pedeciba.png" width="100px"></img>
                                    <br/>
				    <img src="http://www.fing.edu.uy/grupos/niccad/ccad-2012/logo_niccad-2.png" width="120px"></img>
				</div>
                                <div style="width:300px;font-size:14px;text-align:justify;padding-left:130px;">
                                        El miércoles 17 de noviembre de 2012 se desarroll&oacute; el evento interdisciplinario de 
                                        Computación Científica de Alto Desempe&ntilde;o en Facultad de Ingeniería.<br/> 
                                        La Conferencia tuvo como cometido la difusión de las actividades de investigación en al 
                                        área de computación científica, destacando la importancia de la infraestructura de cómputo 
                                        de alto desempeño de la Universidad de la República, utilizada por grupos de investigación 
                                        de diversas disciplinas para resolver problemas con impacto en la salud, el manejo de recursos 
                                        energéticos, la producción, etc.
                                </div>
                                <div>
                                   <center>
                                     <table>
                                       <tr>
                                         <td>
                                            <a href="https://picasaweb.google.com/lh/photo/nF2A4MKVmTEb6NPExayuiUJoTTRrTmcPoQ4-ln3fDrw?feat=embedwebsite"><img src="https://lh4.googleusercontent.com/-eMx8iY5iIzY/UH87CaUbmdI/AAAAAAAAJ8E/oLffpi7A-Gk/s144/DSC02383.jpeg" height="108" width="140" /></a>
                                         </td>
                                         <td>
                                            <a href="https://picasaweb.google.com/lh/photo/ok-AhyWJR0qzrQWOBVQOikJoTTRrTmcPoQ4-ln3fDrw?feat=embedwebsite"><img src="https://lh3.googleusercontent.com/-jZwi2vz3CPc/UH88zP5jEoI/AAAAAAAAJ-k/C_TbuQHBWVE/s144/DSC02413.jpeg" height="108" width="140" /></a>
                                         </td>
                                         <td>
                                            <a href="https://picasaweb.google.com/lh/photo/uN6l8hKvnF2mOTXZ-dzNUEJoTTRrTmcPoQ4-ln3fDrw?feat=embedwebsite"><img src="https://lh5.googleusercontent.com/-jciPpUB13jE/UH8-eEWxysI/AAAAAAAAKAo/ctbzunnNjPg/s144/DSC02433.jpeg" height="108" width="140" /></a>
                                         </td>
                                        </tr>
                                      </table>
                                   </center>
                                </div>
                                <a href="http://www.fing.edu.uy/grupos/niccad/ccad-2012/" style="font-size:12px;float:right;">[leer más...]</a>
                        </div>
                </div>




		<div class="module">
			<div class="module-title">II Seminario Multidisciplinario de Computación Científica de Alto Desempeño</div>
			<div class="module-body" style="text-align:center;">
				<div style="float:left;width:130px; text-align: center;height:110px;">
					<img src="http://www.fing.edu.uy/grupos/niccad/ccad-2012/logo_niccad-2.png" width="120px" style="margin-bottom: 50px;"></img>
				</div>
				<div style="width:300px; padding-left:130px;font-size:14px;text-align:justify;">
					El jueves 24 de noviembre de 2011 se desarroll&oacute; el II Seminario Multidisciplinario de Computación Científica de Alto Desempe&ntilde;o en el Polifuncional José Luis Massera de la Facultad de Ingenierí&iacute;a. El evento reuni&oacute; a investigadores, estudiantes y empresarios interesados en las &aacute;reas de computaci&oacute;n cient&iacute;fica y computaci&oacute;n de alto desempe&ntilde;o.
                                </div>
				<div style="margin-top:1px;padding-left:0px;">
				   <center>
				     <table>
				       <tr>
				         <td>										
					    <a href="https://picasaweb.google.com/santiago.iturriaga/IISeminarioMultidisciplinarioDeComputacionCientificaDeAltoDesempeno?authuser=0&feat=embedwebsite"><img src="https://lh4.googleusercontent.com/-gEQwCvnrUxc/Ts6psOVZeDI/AAAAAAAAGwc/8fYiUMJA4vY/s144/IMG20111124_001.jpg" height="108" width="140" /></a>
                                         </td>
					 <td>
					    <a href="https://picasaweb.google.com/santiago.iturriaga/IISeminarioMultidisciplinarioDeComputacionCientificaDeAltoDesempeno?authuser=0&feat=embedwebsite"><img src="https://lh4.googleusercontent.com/-09IFNToleT8/Ts6pqXOIoqI/AAAAAAAAGww/a2thWv_It5k/s144/IMG20111124_002.jpg" height="108" width="140" /></a>
                                         </td>
					 <td>
					    <a href="https://picasaweb.google.com/santiago.iturriaga/IISeminarioMultidisciplinarioDeComputacionCientificaDeAltoDesempeno?authuser=0&feat=embedwebsite"><img src="https://lh5.googleusercontent.com/-0QK_fxigNgE/Ts6plnU470I/AAAAAAAAGxw/N5_48jDBGTs/s144/IMG20111124_007.jpg" height="108" width="140" /></a>
                                         </td>
				        </tr>
				      </table>
				   </center>
				</div>
				<a href="http://www.fing.edu.uy/cluster/seminario/2011/" style="font-size:12px;float:right;">[leer más...]</a>
			</div>
		</div>
		<!--<div class="module" style="background-image:url(img/1278458880_kdmconfig_64x64.png);">
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
				<a href="http://www.fing.edu.uy/cluster/grupo/Multithreading-Clase1.pdf" class="menu-option">Curso de Programación Multithreading (ECAR 2012) [Clase 1]</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/Multithreading-Clase2.pdf" class="menu-option">Curso de Programación Multithreading (ECAR 2012) [Clase 2]</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/Multithreading-Clase3.pdf" class="menu-option">Curso de Programación Multithreading (ECAR 2012) [Clase 3]</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/cluster_arquitectura_y_aplicaciones.pdf" class="menu-option">Charla 1 (cluster)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/cluster_memoria_compartida.pdf" class="menu-option">Charla 2 (memoria compartida)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/cluster_memoria_distribuida.pdf" class="menu-option">Charla 3 (memoria distribuida)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_1.pdf" class="menu-option">Nivelaci&oacute;n 1 (Unix-Linux)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_2.pdf" class="menu-option">Nivelaci&oacute;n 2 (Unix-Linux)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/nivelacion_3.pdf" class="menu-option">Nivelaci&oacute;n 3 (Unix-Linux)</a>
				<a href="http://www.fing.edu.uy/cluster/grupo/Fortran.pdf" class="menu-option">FORTRAN</a>
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
		</div>-->
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
