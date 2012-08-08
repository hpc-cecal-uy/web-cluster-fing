<?php

class Como_Conectarse extends Controller {
	
	function Como_Conectarse() {
		parent::Controller();
	}
	
	function index() {
		$error = "";
			
		if ($this->input->post('submit') == 'Enviar') {								
			$error = $this->validar_input();
				
			if (strlen($error) == 0) {
				$script = $this->enviar();
			}
		}
		
		$data['error'] = $error;
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
				
		if (strlen($this->input->post('descripcion')) == 0) {
			return 'Debe ingresar como se describir&iacute;a a si mismo.';
		}
		
		if (strlen($this->input->post('formacion')) == 0) {
			return 'Debe ingresar su nivel de formaci&oacute;n.';
		}
		
		if (strlen($this->input->post('motivacion')) == 0) {
			return 'Debe ingresar su motivaci&oacute;n para utilizar el cluster.';
		}
	
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
		echo $data_pubkey;
		
		//$to = "sergion@fing.edu.uy,gusera@fing.edu.uy,siturria@fing.edu.uy";
		$to = "siturria@fing.edu.uy";
		$subject = "[CLUSTER FING] Nuevo usuario";
		
		$body = "Nombre: " + $this->input->post('nombre');
		$body .= "\nEmail: " + $this->input->post('email');
		$body .= "\nDescripción: " + $this->input->post('descripcion');
		$body .= "\nFormación: " + $this->input->post('formacion');
		$body .= "\nMotivación: " + $this->input->post('motivacion');
		$body .= "\n(start) Public key ====>\n";
		$body .= $data_pubkey;
		$body .= "\n(end) Public key <====\n";
		
		if (mail($to, $subject, $body)) {
			echo("<p>Message successfully sent!</p>");
		} else {
			echo("<p>Message delivery failed...</p>");
		}
		
		$data['nombre'] = '';
	}
}

?>