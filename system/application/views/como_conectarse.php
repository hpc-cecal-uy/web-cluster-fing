<div id="content">
	<h1>Cómo conectarse</h1>
	<div id="content-body" style="font-size: 1.1em;">
		<ul>
			<li><b>Punto de acceso:</b> cluster.fing.edu.uy</li>
			<!-- <li><b>Habilitación de usuarios:</b> solicitud mediante correo electrónico a <a href="mailto:gusera@fing.edu.uy">Gabriel Usera</a> y <a href="mailto:sergion@fing.edu.uy">Sergio Nesmachnow</a>&nbsp;<img src="<?php echo base_url(); ?>img/1280327156_email.png"></img</li> -->
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
	<div id="nuevo-usuario" style="font-size: 1.1em;">
		<h3>Soy un nuevo usuario</h3>
		<div <?php if (strlen($error) == 0) echo 'style="display:none;"'; ?>>
			<?php echo $error; ?>
		</div>
		<?php echo form_open('como_conectarse',array('id'=>'nuevo_usuario','name'=>'nuevo_usuario')); ?>
			<div class="note">Los campos marcados con <b>*</b> son requeridos.</div>
			<fieldset class="modulo_fieldset">
				<p>
					<label for="nombre" class="form">Nombre completo:</label>
					<em>*</em><?php 
						$data_nombre = array(
							'id'		=> 'nombre',
							'name'		=> 'nombre',
							'value'		=> set_value('nombre'),
							'maxlength'	=> '25',
							'size'		=> '25');
						echo form_input($data_nombre, set_value('nombre')); ?>
				</p>
				<div class="error"><label for="nombre" generated="true" class="error"></label></div>
				<p>
					<label for="email" class="form">Correo electr&oacute;nico:</label>
					<em>*</em><?php 
						$data_email = array(
							'id'		=> 'email',
							'name'		=> 'email',
							'value'		=> set_value('email'),
							'size'		=> '25');
						echo form_input($data_email,set_value('email')); ?>
				</p>
				<div class="error"><label for="email" generated="true" class="error"></label></div>
				<p>
					<label for="descripcion" class="form">C&oacute;mo se describir&iacute;a? (estudiante/investigador/etc.):</label>
					<em>*</em><?php 
						$data_descripcion = array(
							'id'		=> 'descripcion',
							'name'		=> 'descripcion',
							'value'		=> set_value('descripcion'),
							'size'		=> '25');
						echo form_input($data_descripcion,set_value('descripcion')); ?>
				</p>
				<div class="error"><label for="descripcion" generated="true" class="error"></label></div>
				<p>
					<label for="formacion" class="form">Qu&eacute; formaci&oacute;n tiene? (estudiante/grado/maestr&iacute;a/doctorado/etc.):</label>
					<em>*</em><?php 
						$data_formacion = array(
							'id'		=> 'formacion',
							'name'		=> 'formacion',
							'value'		=> set_value('formacion'),
							'size'		=> '25');
						echo form_input(data_formacion,set_value('formacion')); ?>
				</p>
				<div class="error"><label for="formacion" generated="true" class="error"></label></div>
				<p>
					<label for="motivacion" class="form">Cu&aacute;l es su motivaci&oacute;n para utilizar el cluster? (materia o curso perticular/tesis (de maestr&iacute;a o doctorado)/proyecto/curiosidad/etc.):</label>
					<em>*</em><?php 
						$data_motivacion = array(
							'id'		=> 'proyecto',
							'name'		=> 'proyecto',
							'value'		=> set_value('motivacion'),
							'size'		=> '25');
						echo form_input($data_motivacion,set_value('motivacion')); ?>
				</p>
				<div class="error"><label for="motivacion" generated="true" class="error"></label></div>
				<p>
					<?php $custom_submit = ''; //class="submit_button"';	
					echo form_submit('submit', 'Enviar',$custom_submit); ?>
				</p>
			</fieldset>
		<?php  echo form_close(); ?>
	</div>
</div>
