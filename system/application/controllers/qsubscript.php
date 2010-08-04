<?php
class QSubScript extends Controller {
	
	function QSubScript() {
		parent::Controller();
	}
	
	function index() {
		$script = "";
		$error = "";
		$debug = "";
		
		if ($this->input->post('submit') == 'Aceptar') {
			$error = $this->validar_input();
			
			if (strlen($error) == 0) {
				$script = $this->generar_script();
			}
		}
		
		$implementacion_mpi_trabajo_options = array(
		  'mpich' => 'MPICH 1.2.7',
		  'lam' => 'LAM/MPI 7.1.4',
		  'openmpi' => 'OpenMPI 1.2.5'
		);

		$cola_trabajo_options = array(
		  'publica' => 'P&uacute;blica',
		  'privada' => 'Privada',
		  'especial' => 'Especial'
		);
	
		$data['body'] = 'qsubscript';
		$data['js_include'] = '<script src="'.base_url().'js/qsubscript.js" type="text/javascript" charset="utf-8"></script>';
		$data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/qsubscript.css" type="text/css" media="screen" />';
		
		$data['implementacion_mpi_trabajo_options'] = $implementacion_mpi_trabajo_options;
		$data['cola_trabajo_options'] = $cola_trabajo_options;
		$data['script'] = $script;
		$data['debug'] = $debug;
		$data['error'] = $error;
		
		$this->load->view('includes/template', $data);
	}
	
	function validar_input() {	
		if (strlen($this->input->post('nombre_trabajo')) == 0) {
			return 'Debe ingresar un nombre descriptivo para el trabajo.';
		}
			
		if (strlen($this->input->post('walltime_trabajo_dias')) == 0) {
			return 'Debe ingresar la cantidad de d&iacute;as de ejecuci&oacute;n requeridos por el trabajo.';
		}
		if (strlen($this->input->post('walltime_trabajo_horas')) == 0) {
			return 'Debe ingresar la cantidad de horas de ejecuci&oacute;n requeridos por el trabajo.';
		}
		if (strlen($this->input->post('walltime_trabajo_minutos')) == 0) {
			return 'Debe ingresar la cantidad de minutos de ejecuci&oacute;n requeridos por el trabajo.';
		}
		
		if (strlen($this->input->post('directorio_trabajo')) == 0) {
			return 'Debe ingresar un directorio de trabajo para la ejecuci&oacute;n del trabajo.';
		}
		if (strlen($this->input->post('email_responsable')) == 0) {
			return 'Debe ingresar la direcci&oacute;n de correo electr&oacute;nico del responsable del trabajo.';
		}
		if (strlen($this->input->post('ejecutable_trabajo')) == 0) {
			return 'Debe ingresar el camino completo al ejecutable del trabajo.';
		}
		
		switch ($this->input->post('tipo_trabajo')) {
			case 'serial':
				break;
			case 'paralelo':
				if (strlen($this->input->post('ppn_trabajo')) == 0) {
					return 'Debe ingresar la cantidad de unidades de c&oacute;mputo por nodo requerida por el trabajo.';
				}
				
				break;
			case 'distribuido':
				if (strlen($this->input->post('nodos_trabajo')) == 0) {
					return 'Debe ingresar la cantidad de nodos de c&oacute;mputo requeridos por el trabajo.';
				}
				
				if (strlen($this->input->post('ppn_trabajo')) == 0) {
					return 'Debe ingresar la cantidad de unidades de c&oacute;mputo por nodo requerida por el trabajo.';
				}
			
				break;
		}
		
		return '';
	}
	
	function generar_script() {
		$script = '#!/bin/bash'."\n";
		$script .= "\n".'# Nombre del trabajo'."\n";
		$script .= '#PBS -N '.$this->input->post('nombre_trabajo')."\n";
		
		$script .= "\n".'# Requerimientos'."\n";
		$script .= '#PBS -l ';
		$script .= 'nodes=';
		
		if (strlen($this->input->post('nodos_trabajo')) > 0) {
			$script .= $this->input->post('nodos_trabajo');
		} else {
			$script .= '1';
		}
		
		if (strlen($this->input->post('ppn_trabajo')) > 0) {
			$script .= ':ppn='.$this->input->post('ppn_trabajo');
		}
		
		$script .= ',walltime=';
		if (strlen($this->input->post('walltime_trabajo_dias')) == 1) {
			$script .= '0';
		}
		$script .= $this->input->post('walltime_trabajo_dias').':';

		if (strlen($this->input->post('walltime_trabajo_horas')) == 1) {
			$script .= '0';
		}
		$script .= $this->input->post('walltime_trabajo_horas').':';

		if (strlen($this->input->post('walltime_trabajo_minutos')) == 1) {
			$script .= '0';
		}
		$script .= $this->input->post('walltime_trabajo_minutos')."\n";
			
		$script .= "\n".'# Cola de ejecuci&oacute;n'."\n";
		$script .= '#PBS -q '.$this->input->post('cola_trabajo')."\n";
		
		$script .= "\n".'# Directorio de trabajo'."\n";
		$script .= '#PBS -d '.$this->input->post('directorio_trabajo')."\n";
		
		$script .= "\n".'# Correo electr&oacute;nico'."\n";
		$script .= '#PBS -M '.$this->input->post('email_responsable')."\n";
		
		$script .= "\n".'# Email'."\n";
		$script .= '#PBS -m ';
		
		if (strlen($this->input->post('notificiacion_inicio_trabajo')) == 0 &&
			strlen($this->input->post('notificacion_finalizar_trabajo')) == 0 &&
			strlen($this->input->post('notificacion_abortar_trabajo')) == 0) {
			
			$script .= 'n';
		} else {
			if (strlen($this->input->post('notificacion_inicio_trabajo')) > 0) {
				$script .= 'b';
			}
			if (strlen($this->input->post('notificacion_finalizar_trabajo')) > 0) {
				$script .= 'e';
			}
			if (strlen($this->input->post('notificacion_abortar_trabajo')) > 0) {
				$script .= 'a';
			}
		}
		$script .= "\n\n";		
		$script .= '# n: no mail will be sent.'."\n";
		$script .= '# a: mail is sent when the job is aborted by the batch system.'."\n";
		$script .= '# b: mail is sent when the job begins execution.'."\n";
		$script .= '# e: mail is sent when the job terminates.'."\n";
				
		if (strlen($this->input->post('stdout_trabajo')) > 0) {
			$script .= "\n".'# Directorio donde se guardar&aacute; la salida est&aacute;ndar del nuestro trabajo.'."\n";
			$script .= '#PBS -e '.$this->input->post('stdout_trabajo')."\n";
		}
		if (strlen($this->input->post('errout_trabajo')) > 0) {
			$script .= "\n".'# Directorio donde se guardar&aacute; la salida de error del nuestro trabajo.'."\n";
			$script .= '#PBS -o '.$this->input->post('errout_trabajo')."\n";
		}
		
		$script .= "\n".'# Will make  all variables defined in the environment'."\n";
		$script .= '# from which the job is submitted available to the job.'."\n";
		$script .= '#PBS -V'."\n";
		
		$script .= "\n".'echo Job Name: $PBS_JOBNAME'."\n";
		$script .= 'echo Working directory: $PBS_O_WORKDIR'."\n";
		$script .= 'echo Queue: $PBS_QUEUE'."\n";
		$script .= 'echo Cantidad de tasks: $PBS_TASKNUM'."\n";
		$script .= 'echo Home: $PBS_O_HOME'."\n";
		$script .= 'echo Puerto del MOM: $PBS_MOMPORT'."\n";
		$script .= 'echo Nombre del usuario: $PBS_O_LOGNAME'."\n";
		$script .= 'echo Idioma: $PBS_O_LANG'."\n";
		$script .= 'echo Cookie: $PBS_JOBCOOKIE'."\n";
		$script .= 'echo Offset de numero de nodos: $PBS_NODENUM'."\n";
		$script .= 'echo Shell: $PBS_O_SHELL'."\n";
		$script .= 'echo JobID: $PBS_O_JOBID'."\n";
		$script .= 'echo Host: $PBS_O_HOST'."\n";
		$script .= 'echo Cola de ejecucion: $PBS_QUEUE'."\n";
		$script .= 'echo Archivo de nodos: $PBS_NODEFILE'."\n";
		$script .= 'echo Path: $PBS_O_PATH'."\n";
		$script .= 'echo'."\n";
		$script .= 'cd $PBS_O_WORKDIR'."\n";
		$script .= 'echo Current path:'."\n";
		$script .= 'pwd'."\n";
		$script .= 'echo'."\n";
		$script .= 'echo Nodos:'."\n";
		$script .= 'cat $PBS_NODEFILE'."\n";
		$script .= 'echo'."\n";
		$script .= 'echo Cantidad de nodos:'."\n";
		$script .= 'NPROCS=$(/usr/bin/wc -l < $PBS_NODEFILE)'."\n";
		$script .= 'echo $NPROCS'."\n";
		$script .= 'echo'."\n";

		switch ($this->input->post('tipo_trabajo')) {
			case 'serial':
				//Serial
				$script .= "\n".'# Ejecuto la tarea'."\n";
				$script .= 'time '.$this->input->post('ejecutable_trabajo')."\n";
				break;
			case 'paralelo':
				//Paralelo
				if (strlen($this->input->post('tiene_omp_trabajo')) > 0) {
					//Con OpenMP
					$script .= 'export OMP_SCHEDULE="DYNAMIC,1"'."\n";
					$script .= 'export OMP_NUM_THREADS=$NPROCS'."\n";
				}
				
				$script .= "\n".'# Ejecuto la tarea'."\n";
				$script .= 'time '.$this->input->post('ejecutable_trabajo')."\n";
				
				break;
			case 'distribuido':
				if (strlen($this->input->post('tiene_omp_trabajo')) > 0) {
					//Con OpenMP
					$script .= 'export OMP_SCHEDULE="DYNAMIC,1"'."\n";
					$script .= 'export OMP_NUM_THREADS=$NPROCS'."\n";
				}		
			
				if (strlen($this->input->post('tiene_mpi_trabajo')) == 0) {
					//Sin MPI?
					$script .= "\n".'# Ejecuto la tarea'."\n";
					$script .= 'time '.$this->input->post('ejecutable_trabajo')."\n";
				} else {
					//Con MPI
					$script .= "\n".'# Ejecuto la tarea'."\n";
					switch ($this->input->post('implementacion_mpi_trabajo')) {
						case 'mpich':
							//MPICH
							$script .= 'time /opt/mpich-ch_p4-gcc-1.2.7/bin/mpirun -np $NPROCS -machinefile $PBS_NODEFILE '.$this->input->post('ejecutable_trabajo')."\n";
							break;
						case 'lam':
							//LAM
							$script .= '/opt/lam-7.1.4/bin/lamboot'."\n";
							$script .= 'time /opt/lam-7.1.4/bin/mpiexec '.$this->input->post('ejecutable_trabajo')."\n";
							$script .= '/opt/lam-7.1.4/bin/lamhalt'."\n";
							break;
						case 'openmpi':
							//OpenMPI
							$script .= 'time mpiexec -np $NPROCS -machinefile $PBS_NODEFILE '.$this->input->post('ejecutable_trabajo')."\n";
							break;
					}
				}
				break;
		}
		
		$script .= '<script type="text/javascript">';
		$script .= '	$(document).ready(function(){';
		$script .= '		$(window).scrollTop($("#salida").offset().top - 80);';
		$script .= '	});';
		$script .= '</script>';
		
		return $script;
	}
}
?>