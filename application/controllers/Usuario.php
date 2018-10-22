<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('usuario_model', '', TRUE);
		$this->load->model('core_model', '', TRUE);
	}
	
	/**
	 * Procesa autentificación para Facebook
	 * Acá se infiere que el usuario ya pasó por el proceso de login
	 * que registra o no la nueva cuenta o como corresponda
	 *
	 * @access public
	 * @return string
	 */
	public function loginFbAction() {
		
		$exito = "no";
		$mensaje = "no actions";
		$go = base_url();
		$bd = FALSE;
		
		try {

			$name = trim($this->input->post("name"));
			$email = trim($this->input->post("email"));
			$id = trim($this->input->post("id"));

			if(empty($name) || empty($email) || empty($id)) throw new Exception("No se han podido obtener los datos desde Facebook", 1000);
				
			$oGlobal = new stdClass();

			// Verifica si el usuario existe o no
			$usuario = $this->usuario_model->getUserByIdFb($id);
			
			if(!is_null($usuario)) {
				
				// El usuario existe, lo autentifica y registra acceso
				// Registra acceso del usuario si corresponde
				if((int)$usuario->estado == 0) throw new Exception("Lo sentimos pero tu cuenta se encuentra bloqueada", 1000);
				
				$acceso = $this->usuario_model->registerAccess($usuario->id_usuario);

				// Crea session y retorna objeto
				$oGlobal->idUsuario = $usuario->id_usuario;
				$oGlobal->nombreUsuario = $usuario->nombre_fb;
				
				$mensaje = "Bienvenido nuevamente, " . $oGlobal->nombreUsuario;

			} else {
				// No existe el usuario, intentará registrarlo
				// En fb se autentifica por id_fb
				
				// Crea una contraseña dinámica en función de email
				$newPass = str_replace("@", parent::PIVOT, $email);
				
				$usuario = new stdClass();
				$usuario->id_perfil = parent::PERFIL_USUARIO_NORMAL; // usuario normal
				$usuario->nombre_usuario = $id; // utiliza el id de fb como nombre de usuario
				$usuario->contrasena = md5($newPass); // pasa el id
				$usuario->email = $email;
				$usuario->id_fb = $id;
				$usuario->desde_fb = 1;
				$usuario->nombre_fb = $name;
				$usuario->estado = 1;
				$usuario->fecha_creacion = date("Y-m-d H:i:s");
				
				$this->core_model->inicioTrx();
				$bd = TRUE;
				
				$res = $this->usuario_model->nuevo($usuario); 
				if(is_null($res)) {
					throw new Exception("No se pudo registar el usuario", 1001);
				}

				// Registrado, registra acceso y levanta session
				$usuario->id_usuario = $res;
				$acceso = $this->usuario_model->registerAccess($usuario->id_usuario);
				
				// Commit
				if($bd) $this->core_model->commitTrx();
				
				// Crea session y retorna objeto
				$oGlobal->idUsuario = $usuario->id_usuario;
				$oGlobal->nombreUsuario = $name;
				
				$mensaje = "Usuario creado satisfactoriamente";
			}
			
			$exito = "si";
			
			// Crea session
			$oGlobal->fb = 1;
			$this->_generateTokenSession($oGlobal);

		} catch(Exception $e) {
			$mensaje = $e->getMessage();
			if($bd) $this->core_model->rollbackTrx();
		}

		echo json_encode(array("exito" => $exito, "mensaje" => $mensaje, "go" => $go));
	}
	
	
	/**
	 * Autentificación normal de usuario (JSON)
	 *
	 * @access public
	 * @return string
	 */
	public function loginAction() {
		
		$exito = "no";
		$mensaje = "no actions";
		//$noReturn = 0;
		
		try {
			
			// Obtiene datos de POST
			$userName = trim($this->input->post("username_txt"));
			$pass = trim($this->input->post("password_txt"));
			//$noReturn = trim($this->input->post("no_return"));
			if(empty($userName) || empty($pass)) $this->exception("Debes completar todos los datos", 1000);
			
			// Valida que el usuario exista
			$oUser = $this->usuario_model->getUsuario($userName, md5($pass));

			if(empty($oUser)) $this->exception("Nombre de usuario y/o contraseña incorrectos", 1001);
			
			if((int)$oUser->estado == 0) throw new Exception("Lo sentimos pero tu cuenta se encuentra bloqueada", 1001);
				
			$acceso = $this->usuario_model->registerAccess($oUser->id_usuario);

			// Crea session y retorna objeto
			$oGlobal = new stdClass();
			$oGlobal->idUsuario = $oUser->id_usuario;
			$oGlobal->nombreUsuario = $oUser->nombre_usuario;
			$oGlobal->fb = 0;
			
			$this->_generateTokenSession($oGlobal);
			
			$mensaje = "Bienvenido nuevamente, " . $oGlobal->nombreUsuario;
			$exito = "si";
			
		} catch(Exception $e) {
			$mensaje = $e->getMessage();
		}
		
		echo json_encode(array("exito" => $exito, "mensaje" => $mensaje, "go" => base_url()));

	}
	
	
	/**
	 * Registro normal de usuario (JSON)
	 *
	 * @access public
	 * @return string
	 */
	public function registerAction() {
		
		$exito = "no";
		$mensaje = "no actions";
		$bd = FALSE;
		$minCharsPass = 8; // mínimo de caracteres para contraseña
		$maxCharsPass = 20;	// máximo
		
		try {
			
			// Obtiene datos de POST
			$userName = trim($this->input->post("username_txt"));
			$email = trim($this->input->post("email_txt"));
			$pass = trim($this->input->post("password_txt"));
			$passRe = trim($this->input->post("re_password_txt"));
			
			if(empty($userName) || empty($email) || empty($pass) || empty($passRe)) $this->exception("Todos los campos son necesarios", 1000);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $this->exception("El correo electrónico no es válido", 1000);
			if(strlen($pass) < $minCharsPass || strlen($pass) > $maxCharsPass) $this->exception("Tu contraseña debe tener entre $minCharsPass y $maxCharsPass caracteres", 1000);
			if($pass != $passRe) $this->exception("Las contraseñas no coinciden", 1000);
			
			// Revisa que no exista ni el nombre de usuario ni el email
			$oUsuario = $this->usuario_model->getByUsername($userName);
			if(!is_null($oUsuario)) $this->exception("Lo sentimos, el nombre de usuario seleccionado ya existe", 1001);
			$oUsuario = $this->usuario_model->getByEmail($email);
			if(!is_null($oUsuario)) $this->exception("Lo sentimos, el correo electrónico proporcionado ya existe", 1001);
			
			// Regista en base de datos
			$usuario = new stdClass();
			$usuario->id_perfil = parent::PERFIL_USUARIO_NORMAL; // usuario normal
			$usuario->nombre_usuario = $userName;
			$usuario->contrasena = md5($pass); // pasa el id
			$usuario->email = $email;
			$usuario->desde_fb = 0;
			$usuario->estado = 1;
			$usuario->fecha_creacion = date("Y-m-d H:i:s");
			
			$res = $this->usuario_model->nuevo($usuario); 
			if(is_null($res)) throw new Exception("No se pudo registar el usuario", 1002);
			
			// Variables de éxito
			$mensaje = "¡Has creado tu cuenta satisfactoriamente!";
			$exito = "si";
			
			// Intenta autentificarlo automáticamente
			$acceso = $this->usuario_model->registerAccess($res);

			// Crea session y retorna objeto
			$oGlobal = new stdClass();
			$oGlobal->idUsuario = $res;
			$oGlobal->nombreUsuario = $usuario->nombre_usuario;
			$oGlobal->fb = 0;
			
			$this->_generateTokenSession($oGlobal);
				
		} catch(Exception $e) {
			$mensaje = $e->getMessage();
		}
		
		echo json_encode(array("exito" => $exito, "mensaje" => $mensaje, "go" => base_url()));
		
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	// ------------- MÉTODOS PRIVADOS ----------------
	
	/**
	 * Crea session de usuario
	 *
	 * @access private
	 * @return void
	 */
	private function _generateTokenSession($oSession) {
		
		$pos = rand(0,1); // obtiene 2 posiciones, pre(0) o post(1)
		$idUsuario = $oSession->idUsuario;
		$encryp = ($pos == 0) ? parent::PIVOT.$idUsuario : $idUsuario.parent::PIVOT;
		$encryp = $encryp.$pos;

		$session = array(
					"id" => $this->encryption->encrypt($encryp),
					"iu" => $this->encryption->encrypt($idUsuario),
					"nu" => $this->encryption->encrypt($oSession->nombreUsuario),
					"fb" => $oSession->fb
				);
		
		$this->session->set_userdata($session);
		
	}
}
?>