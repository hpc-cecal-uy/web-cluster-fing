<div id="foto-slider">
	<img src="<?php echo base_url();?>img/fotos/1.jpg" alt="" title="Cluster FING" />
	<img src="<?php echo base_url();?>img/fotos/2.jpg" alt="" title="Cluster FING" style="display:none;" />
</div>
<div id="two-columns">
	<div id="left-column">
		<div class="module">
			<div class="module-title">Estd&iacute;sticas de tiempo real</div>
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
							<span class="noticia_titulo"><?php echo $noticia['titulo'];?></span>
							<span class="noticia_fecha"><?php echo $noticia['fecha'];?></span>					
							<p class="noticia_contenido"><?php echo $noticia['contenido'];?></p>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	<div id="right-column">
		<div class="module" style="background:url(img/1278458880_kdmconfig_64x64.png) no-repeat right 30px;">
			<div class="module-title">Nuevos usuarios</div>
			<div class="module-body">
				<a href="#" class="menu-option">C&oacute;mo conectarse</a>
				<a href="#" class="menu-option">C&oacute;mo ejecutar un trabajo</a>
				<a href="#" class="menu-option">Preguntas frecuentes</a>
				<a href="#" class="menu-option">Generador de scripts</a>
			</div>
		</div>
		<div class="module" style="background:url(img/1278458679_kcmpartitions_64x64.png) no-repeat right 30px;">
			<div class="module-title">Reportes</div>
			<div class="module-body">
				<a href="#" class="menu-option">Estad&iacute;sticas de uso mensual</a>
				<a href="#" class="menu-option">Estad&iacute;sticas de tiempo real (completas)</a>
				<a href="#" class="menu-option">Uso de CPU</a>
				<a href="#" class="menu-option">Uso de espacio de almacenamiento</a>
			</div>
		</div>
		<div class="module" style="background:url(img/1278458589_mycomputer_64x64.png) no-repeat right 30px;">
			<div class="module-title">Enseñanza</div>
			<div class="module-body">
				<a href="#" class="menu-option">Charla 1 (cluster)</a>
				<a href="#" class="menu-option">Charla 2 (memoria compartida)</a>
				<a href="#" class="menu-option">Charla 3 (memoria distribuida)</a>
				<a href="#" class="menu-option">Nivelaci&oacute;n 1 (Unix-Linux)</a>
				<a href="#" class="menu-option">Nivelaci&oacute;n 2 (Unix-Linux)</a>
				<a href="#" class="menu-option">FORTRAN</a>
				<a href="#" class="menu-option">Nivelaci&oacute;n 3 (Unix-Linux)</a>
			</div>
		</div>
		<div class="module" style="background:url(img/1278458764_folder_green_64x64.png) no-repeat right 30px;">
			<div class="module-title">Documentos</div>
			<div class="module-body">
				<a href="#" class="menu-option">Descripci&oacute;n t&eacute;cnica</a>
				<a href="#" class="menu-option">Pol&iacute;ticas de uso</a>
				<a href="#" class="menu-option">Reglamento de uso</a>
			</div>
		</div>
	</div>
	Logo CeCal
	Logo Fing
	Logo CSIC
</div>