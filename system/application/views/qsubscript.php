<h2>Generador de scripts qsub para el cluster FING</h2>
<div id="contenidoInterno">
	<div <?php if (strlen($error) == 0) echo 'style="display:none;"'; ?>>
		<?php echo $error; ?>
	</div>
	<div id="ayuda" class="modulo">
		<img class="icon" src="<?php echo base_url(); ?>img/1275179077_help-browser.png"></img>
		<h3 class="modulo_titulo">Ayuda</h3>
		<div class="modulo_contenido"></div>
	</div>
	<div id="entrada" class="modulo">
		<h3 class="modulo_titulo">PAR&Aacute;METROS DEL TRABAJO</h3>
		<div class="modulo_contenido">
			<?php echo form_open('qsubscript',array('id'=>'scriptgen','name'=>'scriptgen')); ?>
				<div class="note">Los campos marcados con <b>*</b> son requeridos.</div>
				<fieldset class="modulo_fieldset">
					<p>
						<label for="nombre_trabajo" class="form">Nombre del trabajo:</label>
						<em>*</em><?php 
							$data_nombre_trabajo = array(
								'id'		=> 'nombre_trabajo',
								'name'		=> 'nombre_trabajo',
								'value'		=> set_value('nombre_trabajo'),
								'maxlength'	=> '15',
								'size'		=> '15');
							echo form_input($data_nombre_trabajo, set_value('nombre_trabajo')); ?>
					</p>
					<div class="error"><label for="nombre_trabajo" generated="true" class="error"></label></div>
					<p>
						<label for="email_responsable" class="form">Correo electr&oacute;nico:</label>
						<em>*</em><?php 
							$data_email_responsable = array(
								'id'		=> 'email_responsable',
								'name'		=> 'email_responsable',
								'value'		=> set_value('email_responsable'),
								'size'		=> '30');
							echo form_input($data_email_responsable,set_value('email_responsable')); ?>
					</p>
					<div class="error"><label for="email_responsable" generated="true" class="error"></label></div>
					<p>
						<label for="ejecutable_trabajo" class="form">Ejecutable del trabajo:</label>
						<em>*</em><?php 
							$data_ejecutable_trabajo = array(
								'id'		=> 'ejecutable_trabajo',
								'name'		=> 'ejecutable_trabajo',
								'value'		=> set_value('ejecutable_trabajo'),
								'size'		=> '30');
								
							echo form_input($data_ejecutable_trabajo,set_value('ejecutable_trabajo')); ?>
					</p>
					<div class="error"><label for="ejecutable_trabajo" generated="true" class="error"></label></div>
					<p>
						<label for="directorio_trabajo" class="form">Directorio de trabajo:</label>
						<em>*</em><?php 
							$data_directorio_trabajo = array(
								'id'		=> 'directorio_trabajo',
								'name'		=> 'directorio_trabajo',
								'value'		=> set_value('directorio_trabajo'),
								'size'		=> '30');

							echo form_input($data_directorio_trabajo,	set_value('directorio_trabajo')); ?>
					</p>
					<div class="error"><label for="directorio_trabajo" generated="true" class="error"></label></div>
					<p>
						<label for="walltime_trabajo_dias" class="form">Tiempo de ejecuci&oacute;n del trabajo:</label>
						<em>*</em><?php
							$data_dias = array(
								'id'		=> 'walltime_trabajo_dias',
								'name'		=> 'walltime_trabajo_dias',
								'value'		=> set_value('walltime_trabajo_dias','0'),
								'maxlength'	=> '2',
								'size'		=> '2');
						
							echo form_input($data_dias); echo " d&iacute;as "; ?><?php $data_horas = array(
							'id'		=> 'walltime_trabajo_horas',
							'name'		=> 'walltime_trabajo_horas',
							'value'		=> set_value('walltime_trabajo_horas','12'),
							'maxlength'	=> '2',
							'size'		=> '2');
						
						echo form_input($data_horas); echo " horas "; ?><?php $data_minutos = array(
							'id'		=> 'walltime_trabajo_minutos',
							'name'		=> 'walltime_trabajo_minutos',
							'value'		=> set_value('walltime_trabajo_minutos','0'),
							'maxlength'	=> '2',
							'size'		=> '2');
						
						echo form_input($data_minutos); echo " minutos"; ?>
					</p>
					<div class="error"><label for="walltime_trabajo_dias" generated="true" class="error"></label></div>
					<div class="error"><label for="walltime_trabajo_horas" generated="true" class="error"></label></div>
					<div class="error"><label for="walltime_trabajo_minutos" generated="true" class="error"></label></div>
					<p>
						<label for="cola_trabajo" class="form">Cola de ejecuci&oacute;n del trabajo:</label>
						<em>&nbsp;</em><?php
							echo form_dropdown('cola_trabajo', $cola_trabajo_options, set_value('cola_trabajo','publica'), 'id="cola_trabajo"'); ?>
					</p>
					<p>
						<label for="tipo_trabajo" class="form">Tipo de trabajo:</label>
						<em>&nbsp;</em><?php
							$tipo_trabajo_options = array(
											  'serial' => 'Secuencial',
											  'paralelo' => 'Paralelo',
											  'distribuido' => 'Distribuido');
							echo form_dropdown('tipo_trabajo', $tipo_trabajo_options,set_value('tipo_trabajo', 'serial'), 'id="tipo_trabajo"');		?>
					</p>
					<fieldset class="modulo_fieldset_aux">
						<legend>Trabajos paralelos/distribuidos</legend>
						<div class="secuencial note">
							Estos par&aacute;metros solo se encuentran disponibles para trabajos de tipo paralelo/distribuido.
						</div>
						<div class="paralelo-distribuido">
							<p>
								<label for="nodos_trabajo" class="form">Cantidad de nodos:</label>
								<em>*</em><?php 
									$data_nodos_trabajo = array(
										'id'		=> 'nodos_trabajo',
										'name'		=> 'nodos_trabajo',
										'value'		=> set_value('nodos_trabajo'),
										'size'		=> '4');
										
									echo form_input($data_nodos_trabajo,set_value('nodos_trabajo','1')); ?>&nbsp;<span class="note paralelo">(solo para trabajos distribuidos)</span>
							</p>
							<div class="error"><label for="nodos_trabajo" generated="true" class="error"></label></div>
							<p>
								<label for="ppn_trabajo" class="form">Cantidad de procesadores por nodo:</label>
								<em>*</em><?php 
									$data_ppn_trabajo = array(
										'id'		=> 'ppn_trabajo',
										'name'		=> 'ppn_trabajo',
										'value'		=> set_value('ppn_trabajo'),
										'size'		=> '4');
										
									echo form_input($data_ppn_trabajo,set_value('ppn_trabajo','1')); ?>
							</p>
							<div class="error"><label for="ppn_trabajo" generated="true" class="error"></label></div>
							<p>
								<label for="tiene_mpi_trabajo" class="form">&#191;Utilizar MPI?:</label>
								<em>&nbsp;</em><?php
									echo form_checkbox(array('id'=>'tiene_mpi_trabajo','name'=>'tiene_mpi_trabajo'), 
										'tiene_mpi_trabajo', set_checkbox('tiene_mpi_trabajo','tiene_mpi_trabajo',FALSE)); ?> implementaci&oacute;n <?php 
										
									$implementacion_mpi_trabajo_options_aux = array('' => 'Seleccionar...');
									$implementacion_mpi_trabajo_options_final = array_merge($implementacion_mpi_trabajo_options_aux, $implementacion_mpi_trabajo_options);
									echo form_dropdown('implementacion_mpi_trabajo', $implementacion_mpi_trabajo_options_final, 
										set_value('implementacion_mpi_trabajo', ''),'id="implementacion_mpi_trabajo"');	?>
							</p>
							<div class="error"><label for="implementacion_mpi_trabajo" generated="true" class="error"></label></div>
							<p>
								<label for="tiene_omp_trabajo" class="form">&#191;Utilizar OpenMP?:</label>
								<em>&nbsp;</em><?php echo form_checkbox(array('name'=>'tiene_omp_trabajo','id'=>'tiene_omp_trabajo'), 
									'tiene_omp_trabajo',  set_checkbox('tiene_omp_trabajo','tiene_omp_trabajo',FALSE)); ?>
							</p>
							<p class="modulo_footer">
								Nota: la habilitaci&oacute;n de estos par&aacute;metros depende del tipo de trabajo seleccionado.
							</p>
						</div>
					</fieldset>
					<fieldset class="modulo_fieldset_aux">
						<legend>Reporte de resultados</legend>
						<p>
							<label for="stdout_trabajo" class="form">Salida est&aacute;ndar del trabajo:</label>
							<em>&nbsp;</em><?php 
								$data_stdout_trabajo = array(
									'id'		=> 'stdout_trabajo',
									'name'		=> 'stdout_trabajo',
									'value'		=> set_value('stdout_trabajo'),
									'size'		=> '30');
									
								echo form_input($data_stdout_trabajo,set_value('stdout_trabajo'));?>
						</p>
						<p>
							<label for="errout_trabajo" class="form">Salida de error del trabajo:</label>
							<em>&nbsp;</em><?php 
								$data_errout_trabajo = array(
									'id'		=> 'errout_trabajo',
									'name'		=> 'errout_trabajo',
									'value'		=> set_value('errout_trabajo'),
									'size'		=> '30');
									
								echo form_input($data_errout_trabajo,set_value('errout_trabajo')); ?>
						</p>
						<p>
							<label for="notificiacion_inicio_trabajo" class="form">Notificaciones v&iacute;a correo electr&oacute;nico:</label>
							<em>&nbsp;</em><?php
								echo form_checkbox(array('name'=>'notificacion_inicio_trabajo','id'=>'notificacion_inicio_trabajo'), 'notificacion_inicio_trabajo', 
									set_checkbox('notificacion_inicio_trabajo','notificacion_inicio_trabajo',TRUE)); ?><label 
									for="notificiacion_inicio_trabajo"> al iniciar </label><?php
								echo form_checkbox(array('name'=>'notificacion_finalizar_trabajo','id'=>'notificacion_finalizar_trabajo'), 'notificacion_finalizar_trabajo', 
									set_checkbox('notificacion_finalizar_trabajo','notificacion_finalizar_trabajo',TRUE));?><label 
									for="notificacion_finalizar_trabajo"> al finalizar </label><?php
								echo form_checkbox(array('name'=>'notificacion_abortar_trabajo','id'=>'notificacion_abortar_trabajo'), 'notificacion_abortar_trabajo', 
									set_checkbox('notificacion_abortar_trabajo','notificacion_abortar_trabajo',TRUE)); ?><label 
									for="notificacion_abortar_trabajo"> al abortar</label>
						</p>
					</fieldset>
					<p>
						<?php $custom_submit = 'class="submit_button"';	
						echo form_submit('submit', 'Aceptar',$custom_submit); ?>
					</p>
				</fieldset>
			<?php  echo form_close(); ?>
		</div>
	</div>
	<div id="salida" <?php if (strlen($script) == 0) echo 'style="display:none;"'; ?>  class="modulo">
		<h3 class="modulo_titulo">SCRIPT DEL TRABAJO</h3>
		<div class="modulo_contenido">
			<code><?php echo nl2br($script); ?></code>
		</div>
	</div>
	<div <?php if (strlen($debug) == 0) echo 'style="display:none;"'; ?>>
		<?php echo $debug; ?>
	</div>
</div>