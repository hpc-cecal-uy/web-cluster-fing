<div id="content">
	<?php if (! $enviado) { ?>
	<h1>Registro de usuarios</h1>
	<p>Si no tiene experiencia en la creación de claves público-privadas, le recomendamos lea este pequeño <a href="http://www.fing.edu.uy/cluster/index.php/crear_usuario">tutorial</a>. También encotrará ayuda sobre como ingresar al cluster luego de tener su usuario.</p>
	<div id="nuevo-usuario" style="font-size: 1.1em;" onload=seleccionaOtro(); >
		<div <?php if (strlen($error) == 0) { echo 'style="display:none;"'; } else { echo 'style="color:red;font-weight:bold;"'; } ?>>
			<?php echo $error; ?>
		</div>
		<?php echo form_open_multipart('como_conectarse',array('id'=>'nuevo_usuario','name'=>'nuevo_usuario')); ?>
			<fieldset style="border: 0 none;">
				 <p>     
                                        <label for="tipoUsuario">Tipo de Usuario:  </label>
                                        <?php
                                                $data_tipoUsuario = array(
                                                        'Interno'            => 'Interno',
                                                        'Externo'                => 'Externo');
                                                echo form_dropdown('tipoUsuario', $data_tipoUsuario, set_value('tipoUsuario'), 'id="usu" onchange=mostrarCampoIP();');
                                        ?>
                                        <em>*</em>
                                </p>
				<div id="num_ip" name="num_ip">
                                        <label for="ip">Número IP</label><br/>
                                        <?php
                                                $data_ip = array(
                                                        'id'            => 'ip',
                                                        'name'          => 'ip',
                                                        'value'         => set_value('ip'),
                                                        'rows'          => '1',
                                                        'cols'          => '60');
                                                echo form_input($data_ip,set_value('ip'));
                                        ?>
					<em>*</em>
				</div>
				<p>
                                        <label for="tipoRegistro">Tipo de Registro:  </label>
                                        <?php
                                                $data_tipoRegistro = array(
                                                        'Nuevo usuario'            => 'Nuevo Usuario',
                                                        'Migracion'                => 'Migración');
                                                echo form_dropdown('tipoRegistro', $data_tipoRegistro);
                                        ?>
                                        <em>*</em>
                                </p>
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
					<label for="instituto">Grupo/Instituto</label><br/>
					<?php
						$data_instituto = array(
							'INCO'		=> 'INCO - FING - UDELAR',
							'IMFIA'		=> 'IMFIA - FING - UDELAR',
							'IF'		=> 'IF - FING - UDELAR',
							'IIE'		=> 'IIE - FING - UDELAR',
							'IMERL'		=> 'IMERL - FING - UDELAR',
							'IIQ'           => 'IIQ - FING - UDELAR',
							'IIE/IMERL'	=> 'IIE/IMERL - FING - UDELAR',
							'INCO/IMERL'    => 'INCO/IMERL - FING - UDELAR',
							'INCO/IMFIA'    => 'INCO/IMFIA - FING - UDELAR',
							'UMA'		=> 'Universidad de Málaga',
							'FCS'		=> 'Facultad de Ciencias Sociales - UDELAR',
							'PASTEUR'	=> 'Pasteur',
							'OTRO'		=> 'Otro');
						echo form_dropdown('instituto', $data_instituto, set_value('instituto'), 'id="inst" onchange=seleccionaOtro();');
					?>
					<em>*</em>
				</p>
				<div id="sector_grupo" name="sector_grupo">
					<label for="grupo">Facultad</label><br/>
					<?php
						$data_grupo = array(
							'id'		=> 'grupo',
							'name'		=> 'grupo',
							'value'		=> set_value('grupo'),
							'rows'		=> '1',
							'cols'		=> '60');
						echo form_input($data_grupo,set_value('grupo'));
					?>
					<br/><br/> 
					<label for="institucion">Institución</label><br/>
					<?php
						$data_institucion = array(
							'id'		=> 'institucion',
							'name'		=> 'institucion',
							'value'		=> set_value('institucion'),
							'rows'		=> '1',
							'cols'		=> '60');
						echo form_input($data_institucion, set_value('institucion'));
					?>
					<em>*</em>
				</div>

				<!--<p>
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
				</p>-->
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
						echo form_dropdown('nivelAcademico', $data_nivelAcademico);
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
						echo form_dropdown('tipoTrabajo', $data_tipoTrabajo);
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
					<label style="font-size:7.5pt">Obligatorio para nuevos usuarios</label></br>
					<?php 
						$data_pubkey = array(
							'id'		=> 'pubkey',
							'name'		=> 'pubkey',
							'value'		=> set_value('pubkey'),
							'size'		=> '70%');
						echo form_upload($data_pubkey,set_value('pubkey')); ?><em>*</em>
				</p>
				<p>
					<label for="anterior">Nombre de usuario del cluster anterior o usuario fing</label><br />
					<?php
                                                $data_usuarioAnterior = array(
                                                        'id'            => 'usuarioAnterior',
                                                        'name'          => 'usuarioAnterior',
                                                        'value'         => set_value('usuarioAnterior'),
                                                        'rows'          => '1',
                                                        'cols'          => '60');
                                        echo form_input($data_usuarioAnterior,set_value('usuarioAnterior'));
                                        ?>
				</p><em>*</em>
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
	<script languaje="javascript">
                                                function seleccionaOtro(){
							var e = document.getElementById("inst");
							var seleccionado = e.options[e.selectedIndex].value;
                                                        if (seleccionado == "OTRO"){
                                                                document.getElementById("sector_grupo").style.display = "block";
                                                                //alert(seleccionado);
                                                        }else{
                                                                document.getElementById("sector_grupo").style.display = "none";
                                                                //alert(seleccionado);
                                                        }
                                                 }

						function mostrarCampoIP(){
                                                        var e = document.getElementById("usu");
                                                        var seleccionado = e.options[e.selectedIndex].value;
                                                        if (seleccionado == "Externo"){
                                                                document.getElementById("num_ip").style.display = "block";
                                                                //alert(seleccionado);
                                                        }else{
                                                                document.getElementById("num_ip").style.display = "none";
                                                                //alert(seleccionado);
                                                        }
                                                 }

						
						window.onload = function(){
							var e = document.getElementById("inst");
                                                        var seleccionado = e.options[e.selectedIndex].value;
                                                        if (seleccionado == "OTRO"){
                                                                document.getElementById("sector_grupo").style.display = "block";
                                                                //alert(seleccionado);
                                                        }else{
                                                                document.getElementById("sector_grupo").style.display = "none";
                                                                //alert(seleccionado);
                                                        }
							//alert("Ejecutando onload!!");
							var elem = document.getElementById("usu");
							var sel = elem.options[elem.selectedIndex].value;
							if (sel == "Externo"){
								document.getElementById("num_ip").style.display = "block";
							}else{
								document.getElementById("num_ip").style.display = "none";
							}
						}
         </script>
</div>
