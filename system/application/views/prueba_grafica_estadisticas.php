<div id="content">
<p class="pagina-title" style="color:#000080;">Estadísticas de uso</p><br /><br />
<div id="content-body">
<div id="two-columns">
        <div id="left-column">
		<div class="module">
			<div class="module-title" style="color:#000080;" >Por áreas de aplicación</div>
                                <div class="module-body">
                                 <img WIDTH=400, HEIGTH=500 src="<?php echo base_url(); ?>img/porAreasDeAplicacion.png" alt="por areas de aplicacion"/>
                                </div>
				<div algn='right'>Actualizado a Julio de 2014</div>
		</div>
		<div class="module">
                	<div class="module-title" style="color:#000080;" >Total de horas de ejecución por grupos</div>
                        	<div class="module-body">
                                	<?php echo $graficaUso;?>
                        	</div>
				<div align="right">Acumulado desde 2009</div>
               	</div>
	</div>
	<div id="right-column">
		<div class="module">
               	        <div class="module-title" style="color:#000080;" >Ranking de estimaciones de usuarios</div>
                       	<div class="module-body">
                               	<?php echo $rankingEstimaciones;?>
                               	<div align="right">Ranking de los últimos 60 días</div>
                       	</div>
               	</div>
		<div class="module">
                        <div class="module-title" style="color:#000080;" >Usuarios con más uso de disco</div>
                                <div class="module-body">
                                        <?php echo $tabla_uso_disco;?>
                                </div>
                                <div align="right">Actualizado diariamente</div>
                </div>

	</div>
</div>
 <div class="logos">
		<p class="pagina-title" style="color:#000080;"></p>
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
