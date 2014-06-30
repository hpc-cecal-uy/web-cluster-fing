<div id="content">
	<h1>Cómo conectarse</h1>
	<div id="content-body" style="font-size: 1.1em;">
		<ul>
			<li><b>Punto de acceso:</b> cluster.fing.edu.uy</li>
                        <li><b>Punto de acceso externo:</b> cluster-external.fing.edu.uy (solo bajo pedido)</li>
			<!-- <li><b>Habilitación de usuarios:</b> solicitud mediante correo electrónico a <a href="mailto:gusera@fing.edu.uy">Gabriel Usera</a> y <a href="mailto:sergion@fing.edu.uy">Sergio Nesmachnow</a>&nbsp;<img src="<?php echo base_url(); ?>img/1280327156_email.png"></img></li> -->
			<li><b>Autenticación:</b> mediante par de claves pública/privada.
				<ul>
					<li>Se genera con comandos de ssh (ssh-keygen) y utilitarios (putty-keygen).</li>
					<li>Clave RSA de 1024 bits.</li>
					<li>La clave pública se debe enviar por correo electrónico, y la clave privada se almacena en un archivo accesible al(a los) equipo(s) desde los cuales se establecerá la conexión.</li>
					<li>El procedimiento de generación de claves puede consultarse en el siguiente <a href="http://www.fing.edu.uy/inco/cursos/hpc/material/clases/AmbientePVM.pdf">enlace</a> y en sitios de Internet.</li>
				</ul>
			</li>
			<li><b>Nuevo usuario:</b> para solicitar acceso al cluster debe completar el formulario que sigue.</li>
		</ul>
	</div>
	<?php if (! $enviado) { ?>
	<h1>Soy un nuevo usuario</h1>
	<div id="nuevo-usuario" style="font-size: 1.1em;">
		<div <?php if (strlen($error) == 0) { echo 'style="display:none;"'; } else { echo 'style="color:red;font-weight:bold;"'; } ?>>
			<?php echo $error; ?>
		</div>
		<?php echo form_open_multipart('como_conectarse',array('id'=>'nuevo_usuario','name'=>'nuevo_usuario')); ?>
			<fieldset style="border: 0 none;">
				<p>
					<label for="nombre">Nombre completo</label><br/>
					<?php 
						$data_nombre = array(
							'id'		=> 'nombre',
							'name'		=> 'nombre',
							'value'		=> set_value('nombre'),
							'size'		=> '60');
						echo form_input($data_nombre, set_value('nombre')); ?><em>*</em>
				</p>
				<p>
					<label for="email">Correo electr&oacute;nico</label><br/>
					<?php 
						$data_email = array(
							'id'		=> 'email',
							'name'		=> 'email',
							'value'		=> set_value('email'),
							'size'		=> '60');
						echo form_input($data_email,set_value('email')); ?><em>*</em>
				</p>
				<p>
					<label for="email2">Verifique su correo electr&oacute;nico</label><br/>
					<?php 
						$data_email = array(
							'id'		=> 'email2',
							'name'		=> 'email2',
							'value'		=> set_value('email2'),
							'size'		=> '60');
						echo form_input($data_email,set_value('email2')); ?><em>*</em>
				</p>
				<p>
					<h3>Filiaci&oacute;n</h3>
				</p>
				<p>
					<label for="instituto">Instituto</label><br/>
					<?php
						$data_instituto = array(
							'id'		=> 'instituto',
							'name'		=> 'instituto',
							'value'		=> set_value('instituto'),
							'rows'		=> '1',
							'cols'		=> '60');
						echo form_input($data_instituto,set_value('instituto'));
					?>
					<em>*</em>
				</p>
				<p>
					<label for="facultad">Facultad</label><br/>
					<?php
						$data_facultad = array(
							'id'		=> 'facultad',
							'name'		=> 'facultad',
							'value'		=> set_value('facultad'),
							'rows'		=> '1',
							'cols'		=> '60');
						echo form_input($data_facultad,set_value('facultad'));
					?>
					<em>*</em>
				</p>
				<p>
					<label for="universidad">Universidad</label><br/>
					<?php
						$data_universidad = array(
							'id'		=> 'universidad',
							'name'		=> 'universidad',
							'value'		=> set_value('universidad'),
							'rows'		=> '1',
							'cols'		=> '60');
						echo form_input($data_universidad,set_value('universidad'));
					?>
					<em>*</em>
				</p>
				<br/><br/>
				<p>
					<label for="nivelAcademico">Nivel Acad&eacute;mico</label><br/>
					<?php
						$data_nivelAcademico = array(
							'Estudiante de Grado'			=> 'Estudiante de Grado',
							'Estudiante de Maestria'		=> 'Estudiante de Maestria',
							'Estudiante de Doctorado'		=> 'Estudiante de Doctorado',
							'Investigador'				=> 'Investigador',
							'Industria'				=> 'Industria');
						echo form_dropdown('nivelAcademico', $data_nivelAcademico, 'estudianteGrado');
					?>
					<em>*</em>
				</p>
				<p>
					<label for="tipoTrabajo">Tipo de Trabajo</label><br/>
					<?php
						$data_tipoTrabajo = array(
							'Curso de Grado'			=> 'Curso de Grado',
							'Curso de Posgrado'			=> 'Curso de Posgrado',
							'Tesis de Maestria'			=> 'Tesis de Maestria',
							'Tesis de Doctorado'			=> 'Tesis de Doctorado',
							'Proyecto de Investigacion'		=> 'Proyecto de Investigacion',
							'Convenio'				=> 'Convenio');
						echo form_dropdown('tipoTrabajo', $data_tipoTrabajo, 'cursoGrado');
					?>
					<em>*</em>
				</p>
				
				<p>
					<label for="articulosPublicados">Art&iacute;culos publicados que han utilizado la infraestructura</label><br/>
					<label for="articulosPublicados" ><font size=1>Para nuevos usuarios, acepta el valor 0.</font></label><br />
					<!-- type puede no andar porque no esta documentado que sea asi -->
					<?php
						$data_articulosPublicados = array(
							'id'		=> 'articulosPublicados',
							'name'		=> 'articulosPublicados',
							'value'		=> set_value('articulosPublicados'),
							'rows'		=> '1',
							'cols'		=> '60');
					echo form_input($data_articulosPublicados,set_value('articulosPublicados'));
					?>
					<em>*</em>
				</p>
				
				
				<!--<p>
					<label for="descripcion">C&oacute;mo se describir&iacute;a? (estudiante/investigador/etc.)</label><br/>
					<?php 
						$data_descripcion = array(
							'id'		=> 'descripcion',
							'name'		=> 'descripcion',
							'value'		=> set_value('descripcion'),
							'rows'		=> '3',
							'cols'		=> '60');
						echo form_textarea($data_descripcion,set_value('descripcion')); ?><em>*</em>
				</p>-->
				<!--<p>
					<label for="formacion">Qu&eacute; formaci&oacute;n tiene? (estudiante/grado/maestr&iacute;a/doctorado/etc.)</label><br/>
					<?php 
						$data_formacion = array(
							'id'		=> 'formacion',
							'name'		=> 'formacion',
							'value'		=> set_value('formacion'),
							'rows'		=> '3',
							'cols'		=> '60');
						echo form_textarea($data_formacion,set_value('formacion')); ?><em>*</em>
				</p>-->
				<!--<p>
					<label for="motivacion">Cu&aacute;l es su motivaci&oacute;n para utilizar el cluster? (curso específico/tesis de maestr&iacute;a o doctorado/proyecto/curiosidad/etc.)</label><br/>
					<?php 
						$data_motivacion = array(
							'id'		=> 'motivacion',
							'name'		=> 'motivacion',
							'value'		=> set_value('motivacion'),
							'rows'		=> '3',
							'cols'		=> '60');
						echo form_textarea($data_motivacion,set_value('motivacion')); ?><em>*</em>
				</p>-->
				<!--<p>
					<label for="area">Cu&aacute;l es su &aacute;rea de trabajo?</label><br/>
					<?php 
						$data_area = array(
							'id'		=> 'area',
							'name'		=> 'area',
							'value'		=> set_value('area'),
							'rows'		=> '3',
							'cols'		=> '60');
						echo form_textarea($data_area,set_value('area')); ?><em>*</em>
				</p>-->
				<p>
					<label for="pubkey">Ingrese su clave p&uacute;blica</label><br/>
					<?php 
						$data_pubkey = array(
							'id'		=> 'pubkey',
							'name'		=> 'pubkey',
							'value'		=> set_value('pubkey'),
							'size'		=> '70%');
						echo form_upload($data_pubkey,set_value('pubkey')); ?><em>*</em>
				</p>
				<div style="font-size:smaller; font-weight:bold;">Los campos marcados con <b>*</b> son requeridos.</div>
				<p>
					<?php $custom_submit = ''; //class="submit_button"';	
					echo form_submit('submit', 'Enviar',$custom_submit); ?>
				</p>
			</fieldset>
		<?php  echo form_close(); ?>
	</div>
	<?php } else { ?>
		<h1>Sus datos fueron enviados con &eacute;xito!</h1>
		A la brevedad los administradores se contactar&aacute;n con usted.
	<?php } ?>
</div>
