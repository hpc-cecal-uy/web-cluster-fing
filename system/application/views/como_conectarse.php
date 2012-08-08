<div id="content">
	<h1>Cómo conectarse</h1>
	<div id="content-body" style="font-size: 1.1em;">
		<ul>
			<li><b>Punto de acceso:</b> cluster.fing.edu.uy</li>
			<!-- <li><b>Habilitación de usuarios:</b> solicitud mediante correo electrónico a <a href="mailto:gusera@fing.edu.uy">Gabriel Usera</a> y <a href="mailto:sergion@fing.edu.uy">Sergio Nesmachnow</a>&nbsp;<img src="<?php echo base_url(); ?>img/1280327156_email.png"></img></li> -->
			<li><b>Autenticación:</b> mediante par de claves pública/privada.
				<ul>
					<li>Se genera con comandos de ssh (ssh-keygen) y utilitarios (putty-keygen).</li>
					<li>Clave RSA de 1024 bits.</li>
					<li>La clave pública se debe enviar por correo electrónico, y la clave privada se almacena en un archivo accesible al(a los) equipo(s) desde los cuales se establecerá la conexión.</li>
					<li>El procedimiento de generación de claves puede consultarse en el siguiente <a href="http://www.fing.edu.uy/inco/cursos/hpc/material/clases/AmbientePVM.pdf">enlace</a> y en sitios de Internet.</li>
				</ul>
			</li>
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
							'size'		=> '90%');
						echo form_input($data_nombre, set_value('nombre')); ?><em>*</em>
				</p>
				<p>
					<label for="email">Correo electr&oacute;nico</label><br/>
					<?php 
						$data_email = array(
							'id'		=> 'email',
							'name'		=> 'email',
							'value'		=> set_value('email'),
							'size'		=> '90%');
						echo form_input($data_email,set_value('email')); ?><em>*</em>
				</p>
				<p>
					<label for="email2">Verifique su correo electr&oacute;nico</label><br/>
					<?php 
						$data_email = array(
							'id'		=> 'email2',
							'name'		=> 'email2',
							'value'		=> set_value('email2'),
							'size'		=> '90%');
						echo form_input($data_email,set_value('email2')); ?><em>*</em>
				</p>
				<p>
					<label for="descripcion">C&oacute;mo se describir&iacute;a? (estudiante/investigador/etc.)</label><br/>
					<?php 
						$data_descripcion = array(
							'id'		=> 'descripcion',
							'name'		=> 'descripcion',
							'value'		=> set_value('descripcion'),
							'size'		=> '90%');
						echo form_input($data_descripcion,set_value('descripcion')); ?><em>*</em>
				</p>
				<p>
					<label for="formacion">Qu&eacute; formaci&oacute;n tiene? (estudiante/grado/maestr&iacute;a/doctorado/etc.)</label><br/>
					<?php 
						$data_formacion = array(
							'id'		=> 'formacion',
							'name'		=> 'formacion',
							'value'		=> set_value('formacion'),
							'size'		=> '90%');
						echo form_input($data_formacion,set_value('formacion')); ?><em>*</em>
				</p>
				<p>
					<label for="motivacion">Cu&aacute;l es su motivaci&oacute;n para utilizar el cluster? (curso específico/tesis de maestr&iacute;a o doctorado/proyecto/curiosidad/etc.)</label><br/>
					<?php 
						$data_motivacion = array(
							'id'		=> 'motivacion',
							'name'		=> 'motivacion',
							'value'		=> set_value('motivacion'),
							'size'		=> '90%');
						echo form_input($data_motivacion,set_value('motivacion')); ?><em>*</em>
				</p>
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
