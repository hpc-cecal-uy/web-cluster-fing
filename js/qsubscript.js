jQuery.validator.addMethod("walltime", function(value, element) { 
		try {
			return (parseInt($('#walltime_trabajo_dias').val()) +
				parseInt($('#walltime_trabajo_horas').val()) +
				parseInt($('#walltime_trabajo_minutos').val()) > 0);
		} catch (e) {
			return true;
		}
	}, "El tiempo de ejecuci&oacute;n del trabajo debe ser mayor que 0 d&iacute;as 0 horas 0 minutos."); 

jQuery.validator.addMethod("sin_espacios", function(value, element) { 
		try {
			return value.indexOf(' ') == -1;
		} catch (e) {
			return true;
		}
	}, "El texto no puede contener espacios."); 
	
jQuery.validator.addMethod("implementacion_mpi", function(value, element) { 
		try {
			if ($('#tiene_mpi_trabajo').is(':checked')) {
				return value != '';
			} else {
				return true;
			}
		} catch (e) {
			return true;
		}
	}, "Debe seleccionar una implementaci&oacute;n MPI."); 	

function disableField(field) {
	$(field).attr("disabled","disabled");
	$(field).addClass("disabledField");
}

function enableField(field) {
	$(field).removeAttr("disabled");
	$(field).removeClass("disabledField");
}
	
function validarTipoDeTrabajo() {
	var tipoDeTrabajo = $('#tipo_trabajo').val();
	switch (tipoDeTrabajo) {
		case 'serial':
			$('#nodos_trabajo').attr("disabled","disabled");
			$('#nodos_trabajo').val('1');
			$('#ppn_trabajo').attr("disabled","disabled");
			$('#ppn_trabajo').val('1');
			$('#tiene_omp_trabajo').attr("disabled","disabled");
			$('#tiene_omp_trabajo').removeAttr("checked");
			$('#tiene_mpi_trabajo').attr("disabled","disabled");
			$('#tiene_mpi_trabajo').removeAttr("checked");
			$('#implementacion_mpi_trabajo').attr("disabled","disabled");
			$('#implementacion_mpi_trabajo').val('');
			
			$('.paralelo').hide();
			$('.distribuido').hide();
			$('.paralelo-distribuido').hide();
			$('.secuencial').show();
			break;
		case 'paralelo':
			$('#ppn_trabajo').removeAttr("disabled");
			$('#tiene_omp_trabajo').removeAttr("disabled");

			disableField('#nodos_trabajo');
			$('#nodos_trabajo').val('1');
			
			$('#tiene_mpi_trabajo').attr("disabled","disabled");
			$('#tiene_mpi_trabajo').removeAttr("checked");
			$('#implementacion_mpi_trabajo').attr("disabled","disabled");
			$('#implementacion_mpi_trabajo').val('');
			
			$('.paralelo').show();
			$('.distribuido').hide();
			$('.paralelo-distribuido').show();
			$('.secuencial').hide();
			break;
		case 'distribuido':
			enableField('#nodos_trabajo');
		
			$('#ppn_trabajo').removeAttr("disabled");
			$('#tiene_mpi_trabajo').removeAttr("disabled");			
			$('#tiene_omp_trabajo').removeAttr("disabled");
			
			$('.paralelo').hide();
			$('.distribuido').show();
			$('.paralelo-distribuido').show();
			$('.secuencial').hide();
			break;
	}
}

var ayuda_focus = false;
var ayuda_mouseover = false;
function addHelp(element, mensaje) {
	$(element).bind('focusin', function() {
		if (!ayuda_focus) {
			$('#ayuda .modulo_contenido').empty();
			$('#ayuda .modulo_contenido').append(mensaje);
			ayuda_focus = true;
		}
	});
	$(element).bind('focusout', function() {
		ayuda_focus = false;
		if (!ayuda_mouseover) {
			cargarAyudaPorDefecto();
		}
	});
}

function cargarAyudaPorDefecto() {
	$('#ayuda .modulo_contenido').empty();
	$('#ayuda .modulo_contenido').append('<div style="text-align: justify;">El cluster FING utiliza el software TORQUE para la gesti&oacute;n de los recursos de c&oacute;mputo del cluster. Para iniciar un trabajo en el cluster se debe generar un script con informaci&oacute;n relevante del trabajo, por ejemplo: la cantidad de procesadores del cluster que requiere el trabajo para su ejecuci&oacute;n o el tiempo m&aacute;ximo de ejecuci&oacute;n requerido por el trabajo.<br/><br />Esta p&aacute;gina facilita la creaci&oacute;n del script necesario para la ejecuci&oacute;n de un trabajo en el cluster FING.<br/><br/>Una vez generado el script, debe ser guardado en el sistema de archivos del cluster (por ejemplo en <b>~/script_trabajo.sh</b>). Para iniciar la ejecuci&oacute;n del trabajo descrito en el script se debe ejecutar el comando: <b>qsub ~/script_trabajo.sh</b><br/><br/>Por m&aacute;s comandos necesarios para el uso diario del cluster FING ver la p&aacute;gina <a target="_new" href="http://www.fing.edu.uy/inco/proyectos/hpc/wiki/field.php?n=Proyectos.PCFINGComandosDeUsoDiarioDelCluster">wiki del grupo HPC</a>.</div>');
}

$(document).ready(function(){
	$('#ayuda').bind('mouseover', function() {
		ayuda_mouseover = true;
	});
	$('#ayuda').bind('mouseleave', function() {
		ayuda_mouseover = false;
		if (!ayuda_focus) {
			cargarAyudaPorDefecto();
		}
	});

	$('input').addClass("idleField");
	$('input').focus(function() {  
		$(this).removeClass("idleField").addClass("focusField");  
	});  
	$('input').blur(function() {  
		$(this).removeClass("focusField").addClass("idleField");  
	});
	
	$('select').addClass("idleField");	
	$('select').focus(function() {  
		$(this).removeClass("idleField").addClass("focusField");  
	});  
	$('select').blur(function() {  
		$(this).removeClass("focusField").addClass("idleField");   
	});
	
	$("#scriptgen").validate({
		rules: {
			nombre_trabajo: {
				required: true,
				"sin_espacios": true
			},
			ejecutable_trabajo: "required",
			directorio_trabajo: "required",
			email_responsable: {
				required: true,
				email: true
			},
			walltime_trabajo_dias: {
				required: true,
				number: true,
				min: 0
			},
			walltime_trabajo_horas: {
				required: true,
				number: true,
				max: 23,
				min: 0
			},
			walltime_trabajo_minutos: {
				required: true,
				number: true,
				max: 60,
				min: 0,
				"walltime": true
			},
			nodos_trabajo: {
				required: true,
				number: true,
				min: 1
			},
			ppn_trabajo: {
				required: true,
				number: true,
				min: 1
			},
			implementacion_mpi_trabajo: {
				"implementacion_mpi": true
			}
		},
		messages: {
			nombre_trabajo: {
				required: "Debe ingresar un nombre descriptivo para el trabajo."
			},
			ejecutable_trabajo: "Debe ingresar el camino completo al ejecutable del trabajo.",
			directorio_trabajo: "Debe ingresar el camino completo al directorio de trabajo del trabajo.",
			email_responsable: {
				required: "Debe ingresar el correo electr&oacute;nico de la persona responsable del trabajo.",
				email: "El correo electr&oacute;nico no es v&aacute;lido."
			},
			walltime_trabajo_dias: {
				required: "Debe ingresar la cantidad m&aacute;xima de d&iacute;as de ejecuci&oacute;n del trabajo.",
				number: "La cantidad de d&iacute;as de ejecuci&oacute;n del trabajo debe ser un n&uacute;mero v&aacute;lido.",
				min: "La cantidad de d&iacute;as de ejecuci&oacute;n del trabajo debe ser mayor o igual que 0."
			},
			walltime_trabajo_horas: {
				required: "Debe ingresar la cantidad m&aacute;xima de horas de ejecuci&oacute;n del trabajo.",
				number: "La cantidad de horas de ejecuci&oacute;n del trabajo debe ser un n&uacute;mero v&aacute;lido.",
				min: "La cantidad de horas de ejecuci&oacute;n del trabajo debe ser mayor o igual que 0.",
				max: "La cantidad de horas de ejecuci&oacute;n del trabajo debe ser menor que 24."
			},
			walltime_trabajo_minutos: {
				required: "Debe ingresar la cantidad m&aacute;xima de minutos de ejecuci&oacute;n del trabajo.",
				number: "La cantidad de minutos de ejecuci&oacute;n del trabajo debe ser un n&uacute;mero v&aacute;lido.",
				min: "La cantidad de minutos de ejecuci&oacute;n del trabajo debe ser mayor o igual que 0.",
				max: "La cantidad de minutos de ejecuci&oacute;n del trabajo debe ser menor que 24."
			},
			nodos_trabajo: {
				required: "Debe ingresar la cantidad nodos necesarios para la ejecuci&oacute;n del trabajo.",
				number: "La cantidad de nodos necesarios para la ejecuci&oacute;n no es un n&uacute;mero v&aacute;lido.",
				min: "La cantidad de nodos del trabajo debe ser mayor que 0."
			},
			ppn_trabajo: {
				required: "Debe ingresar la cantidad procesadores por nodos necesarios para la ejecuci&oacute;n del trabajo.",
				number: "La cantidad de procesadores por nodos necesarios para la ejecuci&oacute;n no es un n&uacute;mero v&aacute;lido.",
				min: "La cantidad de procesadores por nodo del trabajo debe ser mayor que 0."
			}
		}
	});

	validarTipoDeTrabajo();
	$('#tipo_trabajo').bind('change', function() {
		validarTipoDeTrabajo();
	});
	$('#tiene_mpi_trabajo').bind('change', function() {
		if ($('#tiene_mpi_trabajo').is(':checked')) {	
			$('#implementacion_mpi_trabajo').removeAttr("disabled");
		} else {
			$('#implementacion_mpi_trabajo').attr("disabled","disabled");
			$('#implementacion_mpi_trabajo').val('');
		}
	});
	
	cargarAyudaPorDefecto();
	addHelp('#nombre_trabajo',
		'<b>Nombre del trabajo:</b><ul>' +
			'<li>El nombre del trabajo debe describir el trabajo y debe ayudar a identificar el trabajo durante su ejecuci&oacute;n en el cluster.</li>'+
			'<li>El tama&ntilde;o m&aacute;ximo para el nombre del trabajo es de 15 caracteres.</li>'+
			'<li>El nombre del trabajo no puede contener espacios.</li>'+
		'</ul>');
	addHelp('#email_responsable',
		'<b>Correo electr&oacute;nico del responsable del trabajo:</b><ul>' +
			'<li>Casilla de correo del responsable del trabajo. A esta casilla de correo llegar&aacute;n las notificaciones de cambios de estados o errores del trabajo en el cluster.</li>'+
		'</ul>');
	addHelp('#ejecutable_trabajo',
		'<b>Ejecutable del trabajo:</b><ul>' +
			'<li>Ruta completa al ejecutable del trabajo en el cluster.<br/><b>Por ejemplo:</b> ~/trabajo/calcular</li>'+
		'</ul>');
	addHelp('#directorio_trabajo',
		'<b>Directorio de trabajo:</b><ul>' +
			'<li>Ruta completa al directorio de trabajo del trabajo en el cluster. Antes de iniciar el trabajo se ejecutar&aacute; un cambio de directorio al directorio de trabajo especificado de modo que este directorio ser&aacute; el current directory durante la ejeucuci&oacute;n del trabajo.<br/><b>Por ejemplo:</b> ~/trabajo</li>'+
		'</ul>');
	addHelp('#walltime_trabajo_dias',
		'<b>Tiempo de ejecuci&oacute;n del trabajo:</b><ul>' +
			'<li>Cantidad m&aacute;xima de d&iacute;as de ejecuci&oacute;n que el trabajo requiere para terminar satisfactoriamente.</li>'+
			'<li>El tiempo de ejecuci&oacute;n de un trabajo se comienza a contabilizar una vez que el trabajo inicia su ejecuci&oacute;n. No se toma en cuenta para el tiempo de ejecuci&oacute;n el tiempo de espera en la cola de ejecuci&oacute;n.</li>'+
			'<li>Si un trabajo excede su tiempo de ejecuci&oacute;n m&aacute;ximo su ejecuci&oacute;n ser&aacute; abortada, por esta raz&oacute;n es recomendable sobreestimar el tiempo m&aacute;ximo de ejecuci&oacute;n de un trabajo aproximadamente un 20%.</li>'+
		'</ul>');
	addHelp('#walltime_trabajo_horas',
		'<b>Tiempo de ejecuci&oacute;n del trabajo:</b><ul>' +
			'<li>Cantidad m&aacute;xima de horas de ejecuci&oacute;n que el trabajo requiere para terminar satisfactoriamente.</li>'+
			'<li>El tiempo de ejecuci&oacute;n de un trabajo se comienza a contabilizar una vez que el trabajo inicia su ejecuci&oacute;n. No se toma en cuenta para el tiempo de ejecuci&oacute;n el tiempo de espera en la cola de ejecuci&oacute;n.</li>'+
			'<li>Si un trabajo excede su tiempo de ejecuci&oacute;n m&aacute;ximo su ejecuci&oacute;n ser&aacute; abortada, por esta raz&oacute;n es recomendable sobreestimar el tiempo m&aacute;ximo de ejecuci&oacute;n de un trabajo aproximadamente un 20%.</li>'+
		'</ul>');
	addHelp('#walltime_trabajo_minutos',
		'<b>Tiempo de ejecuci&oacute;n del trabajo:</b><ul>' +
			'<li>Cantidad m&aacute;xima de minutos de ejecuci&oacute;n que el trabajo requiere para terminar satisfactoriamente.</li>'+
			'<li>El tiempo de ejecuci&oacute;n de un trabajo se comienza a contabilizar una vez que el trabajo inicia su ejecuci&oacute;n. No se toma en cuenta para el tiempo de ejecuci&oacute;n el tiempo de espera en la cola de ejecuci&oacute;n.</li>'+
			'<li>Si un trabajo excede su tiempo de ejecuci&oacute;n m&aacute;ximo su ejecuci&oacute;n ser&aacute; abortada, por esta raz&oacute;n es recomendable sobreestimar el tiempo m&aacute;ximo de ejecuci&oacute;n de un trabajo aproximadamente un 20%.</li>'+
		'</ul>');
	addHelp('#cola_trabajo',
		'<b>Cola de ejecuci&oacute;n del trabajo:</b><ul>' +
			'<li>La cola de ejecuci&oacute;n utilizada por el trabajo determina las caracter&iacute;sticas que tendr&aacute; el trabajo en el cluster.</li>' +
			'<table cellspacing="3px" cellpadding="0px"><tr style="font-weight:bold;"><td>Nombre</td><td>M&aacute;x. de procs.</td><td>M&aacute;x. de walltime</td></tr>' +
			'<tr><td>small_jobs</td><td>16</td><td>240 hs.</td></tr>' +
			'<tr><td>medium_jobs</td><td>32</td><td>96 hs.</td></tr>' +
			'<tr><td>big_jobs</td><td>--</td><td>48 hs.</td></tr>' +
			'<tr><td>quick_jobs</td><td>24</td><td>2 hs.</td></tr>' +
			'</table></li>'+
		'</ul>');
	addHelp('#tipo_trabajo',
		'<b>Tipo de trabajo:</b><ul>' +
			'<li>Un trabajo de tipo <b><i>secuencial</i></b> solamente podr&aacute; utilizar 1 procesador del cluster y no podr&aacute; utlizar ni OpenMP ni MPI.</li>' +
			'<li>Un trabajo de tipo <b><i>paralelo</i></b> podr&aacute; utilizar m&aacute;s de un procesador de cluster pero todos estos procesadores deber&aacute;n encontrarse f&iacute;sicamente en la misma m&aacute;quina. Podr&aacute; utlizar OpenMP para paralelizar su ejecuci&oacute;n pero no podr&aacute; utilizar MPI.</li>' +
			'<li>Un trabajo de tipo <b><i>distribuido</i></b> podr&aacute; utilizar cualquier cantidad de procesadores del cluster y podr&aacute; utlizar MPI para el pasaje de mensajes pero no podr&aacute; utilizar OpenMP.</li>' +					
		'</ul>');
	addHelp('#nodos_trabajo',
		'<b>Cantidad de nodos:</b><ul>' +
			'<li>La cantidad de nodos requerida por un trabajo determina la cantidad de unidades de procesamiento que le ser&aacute;n asignadas al trabajo. Por defecto cada uno de los nodos del trabajo tendr&aacute; un CPU, por lo tanto a un trabajo le ser&aacute; asignados tantos CPU como nodos sean solicitados.</li>' +
			'<li>Por ejemplo: si un trabajo solicita 2 nodos le ser&aacute;n asignados 2 CPU.</li>' + 
		'</ul>');
	addHelp('#ppn_trabajo',
		'<b>Cantidad de procesadores por nodo:</b><ul>' +
			'<li>La cantidad de procesadores por nodo determina la cantidad de CPU que se asignan por cada nodo solicitado por un trabajo. Por defecto la cantidad de procesadores por nodo es 1.</li>' + 
			'<li>Por ejemplo: si un trabajo solicita 2 nodos y 2 procesadores por nodo le ser&aacute;n asignados 4 CPU.</li>' + 
		'</ul>');
	addHelp('#tiene_mpi_trabajo',
		'<b>&#191;Desea utilizar MPI?</b><ul>' +
			'<li>Enlace: <a href="http://es.wikipedia.org/wiki/Interfaz_de_Paso_de_Mensajes" target="_new">&#191;Qu&eacute; es MPI?</a>.</li>' + 
		'</ul>');
	addHelp('#implementacion_mpi_trabajo',
		'<b>&#191;Qu&eacute; implementaci&oacute;n de MPI desea utilizar?</b><ul>' +
			'<li>Enlace: <a href="http://www.mcs.anl.gov/research/projects/mpich2/" target="_new">MPICH</a>.</li>' + 
			'<li>Enlace: <a href="http://www.lam-mpi.org/" target="_new">LAM/MPI</a>.</li>' + 
			'<li>Enlace: <a href="http://www.open-mpi.org/" target="_new">OpenMPI</a>.</li>' + 
		'</ul>');
	addHelp('#tiene_omp_trabajo',
		'<b>&#191;Desea utilizar OpenMP?</b><ul>' +
			'<li>Enlace: <a href="http://es.wikipedia.org/wiki/OpenMP" target="_new">&#191;Qu&eacute; es OpenMP?</a>.</li>' + 
		'</ul>');
	addHelp('#stdout_trabajo',
		'<b>Salida est&aacute;ndar del trabajo:</b><ul>' +
			'<li>Determina el lugar donde se guardar&aacute; el archivo con la salida est&aacute;ndar a consola del trabajo.</li>' + 
			'<li>Si no se especifica una ubicaci&oacute;n de salida se generar&aacute; un archivo en el directorio de trabajo.</li>' + 
			'<li>Si se especifica un directorio se seguir&aacute; la misma regla anterior pero en lugar de utilizar el directorio de trabajo se utilizar&aacute; el directorio especificado.</li>' + 
			'<li>Si se especifica un archivo siempre se utilizar&aacute; ese archivo para guardar la salida y en caso de que ya exista se sobreescribir&aacute;.</li>' + 
		'</ul>');
	addHelp('#errout_trabajo',
		'<b>Salida de error del trabajo:</b><ul>' +
			'<li>Determina el lugar donde se guardar&aacute; el archivo con la salida de error a consola del trabajo.</li>' + 
			'<li>Si no se especifica una ubicaci&oacute;n de salida se generar&aacute; un archivo en el directorio de trabajo.</li>' + 
			'<li>Si se especifica un directorio se seguir&aacute; la misma regla anterior pero en lugar de utilizar el directorio de trabajo se utilizar&aacute; el directorio especificado.</li>' + 
			'<li>Si se especifica un archivo siempre se utilizar&aacute; ese archivo para guardar la salida y en caso de que ya exista se sobreescribir&aacute;.</li>' + 
		'</ul>');
	addHelp('#notificacion_inicio_trabajo',
		'<b>Notificaciones v&iacute;a correo electr&oacute;nico:</b><ul>' +
			'<li>Se le enviar&aacute; un correo electr&oacute;nico al responsable del trabajo cuando se inicie la ejecuci&oacute;n del trabajo en el cluster.</li>' + 
		'</ul>');
	addHelp('#notificacion_finalizar_trabajo',
		'<b>Notificaciones v&iacute;a correo electr&oacute;nico:</b><ul>' +
			'<li>Se le enviar&aacute; un correo electr&oacute;nico al responsable del trabajo cuando el trabajo finalice su ejecuci&oacute;n con un resumen de los recrusos comsumidos por el trabajo.</li>' + 
		'</ul>');
	addHelp('#notificacion_abortar_trabajo',
		'<b>Notificaciones v&iacute;a correo electr&oacute;nico:</b><ul>' +
			'<li>Se le enviar&aacute; un correo electr&oacute;nico al responsable del trabajo en caso de que ocurra un problema con el trabajo y este sea abortado por el gestor de tareas.</li>' + 
		'</ul>');
});
