<?php

class Como_Conectarse extends Controller {
	
	function Como_Conectarse() {
		parent::Controller();
	}
	
	function index() {
		$this->load->library('upload');
		
		/*$to = "siturria@fing.edu.uy";
		$subject = "Hi!";
		$body = "Hi,\n\nHow are you?";
		if (mail($to, $subject, $body)) {
			echo("<p>Message successfully sent!</p>");
		} else {
			echo("<p>Message delivery failed...</p>");
		}*/
		
		$error = "";
		
		echo $this->input->post('pubkey');
		
		if ($this->input->post('submit') == 'Enviar') {
			$name_of_uploaded_file = basename($_FILES['pubkey']['name']);
			$type_of_uploaded_file = substr($name_of_uploaded_file,
					strrpos($name_of_uploaded_file, '.') + 1);
			$size_of_uploaded_file = $_FILES["pubkey"]["size"]/1024;//size in KBs
			
			echo $name_of_uploaded_file;
			echo $type_of_uploaded_file;
			echo $size_of_uploaded_file;
									
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
		
		if (strlen($this->input->post('descripcion')) == 0) {
			return 'Debe ingresar como se describir&iacute;a a si mismo.';
		}
		
		if (strlen($this->input->post('formacion')) == 0) {
			return 'Debe ingresar su nivel de formaci&oacute;n.';
		}
		
		if (strlen($this->input->post('motivacion')) == 0) {
			return 'Debe ingresar su motivaci&oacute;n para utilizar el cluster.';
		}
	
		return '';
	}
	
	function enviar() {
	}
}

?>