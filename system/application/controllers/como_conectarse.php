<?php

class Como_Conectarse extends Controller {
	
	function Como_Conecetarse() {
		parent::Controller();
	}
	
	function index() {
			
		/*echo phpinfo();

		return 0;*/

		$this->load->helper('url');
				
		$error = "";
			
		if ($this->input->post('submit') == 'Enviar') {								
			$error = $this->validar_input();
				
			if (strlen($error) == 0) {
				$error = $this->enviar();
			}
		}
		
		$data['enviado'] = false;
		$data['error'] = $error;
		$data['body'] = 'como_conectarse';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/como_conectarse.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
	
	function enviado() {
		$data['enviado'] = true;
		$data['body'] = 'como_conectarse';
		$data['volver_style'] = '';
		$data['js_include'] = '';
		$data['css_include'] = $data['css_include'] = '<link rel="stylesheet" href="'.base_url().'css/como_conectarse.css" type="text/css" media="screen" />';
		$this->load->view('includes/template', $data);
	}
	
	function validar_input() {
		if (strlen($this->input->post('nombre')) == 0) {
			return 'Debe ingresar su nombre completo.';
		}
			
		if (strlen($this->input->post('email')) == 0) {
			return 'Debe ingresar su correo eletr&oacute;nico.';
		}

		if ($this->input->post('email') != $this->input->post('email2')) {
			return 'Los correos electr&oacute;nicos no coinciden.';
		}
		
		if (strlen($this->input->post('instituto')) == 0) {
			return 'Debe ingresar instituto.';
		}
		
		if (strlen($this->input->post('facultad')) == 0) {
			return 'Debe ingresar facultad.';
		}
		
		if (strlen($this->input->post('universidad')) == 0) {
			return 'Debe ingresar universidad.';
		}
	
		if (preg_match('/[0-9]+/',$this->input->post('articulosPublicados')) == 0 ) {
			return 'Debe ingresar un n&uacute;mero de art&iacute;culos publicados.';
		}
		
		
				
		/*if (strlen($this->input->post('descripcion')) == 0) {
			return 'Debe ingresar como se describir&iacute;a a si mismo.';
		}
		
		if (strlen($this->input->post('formacion')) == 0) {
			return 'Debe ingresar su nivel de formaci&oacute;n.';
		}
		
		if (strlen($this->input->post('motivacion')) == 0) {
			return 'Debe ingresar su motivaci&oacute;n para utilizar el cluster.';
		}*/
	
		if ($_FILES["pubkey"]["size"] == 0) {
			return 'Debe ingresar su clave p&uacute;blica para acceder al cluster.';
		}
		
		return '';
	}
	


	function enviar() {
		
		
		
		$pubkey = $_FILES["pubkey"]["tmp_name"];
		$file_pubkey = fopen($pubkey, 'r');
		$data_pubkey = fread($file_pubkey, filesize($pubkey));
		fclose($file_pubkey);
		
		$to = "sergion@fing.edu.uy,gusera@fing.edu.uy,siturria@fing.edu.uy,nrocchetti@fing.edu.uy";
		//$to = "nestorrocchetti@gmail.com";

		$subject = "[CLUSTER FING] Nuevo usuario";
		
		$body = "Se ha recibido una nueva solicitud de usuario para el cluster!";
		$body .= "\n[Nombre]\n".$this->input->post('nombre');
		$body .= "\n[Email]\n".$this->input->post('email');
		
		$body .= "\n[Instituto]\n".$this->input->post('instituto');
		$body .= "\n[Facultad]\n".$this->input->post('facultad');
		$body .= "\n[Universidad]\n".$this->input->post('universidad');	
		$body .= "\n[Nivel Académico]\n".$this->input->post('nivelAcademico');
		$body .= "\n[Tipo de Trabajo]\n".$this->input->post('tipoTrabajo');
		$body .= "\n[Articulos Publicados]\n".$this->input->post('articulosPublicados');
		$body .= "\n[Public key]\n";
		$body .= $data_pubkey;
		
		//aqui antes de enviarlo por mail hay que guardar la consulta insert
		//en un archivo
		
		$mes = date("m");
		$anio = date("Y");
		
		$ar = fopen("/fing/web/cluster/usuariosNuevos/usuariosNuevos_".$mes."_".$anio.".sql", "a") 
			or die("Problemas en la creacion de la consulta");
		
		fputs($ar, "INSERT INTO usuarios_cluster.usuarios (nombre, email, instituto, facultad, universidad, nivelAcademico, tipoDeTrabajo, articulos, pkey) VALUES ('"
			.$this->input->post('nombre')."','"
			.$this->input->post('email')."','"
			.$this->input->post('instituto')."','"
			.$this->input->post('facultad')."','"
			.$this->input->post('universidad')."','"
			.$this->input->post('nivelAcademico')."','"
			.$this->input->post('tipoTrabajo')."','"
			.$this->input->post('articulosPublicados')."','"
			.$data_pubkey."')"
			." ON DUPLICATE KEY UPDATE email='"
			.$this->input->post('email')
			."';");

		
		if (mail($to, $subject, $body)) {
			redirect('como_conectarse/enviado');
		} else {
			return 'Ocurri&oacute; un error enviando sus datos. Por favor env&iacute;elos manualmente a <a href="mailto:gusera@fing.edu.uy">Gabriel Usera</a> y <a href="mailto:sergion@fing.edu.uy">Sergio Nesmachnow</a>&nbsp;<img src="'.base_url().'img/1280327156_email.png"></img>';
		}			
	}

}

?>
