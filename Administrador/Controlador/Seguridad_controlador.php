<?php
class Seguridad
{

	public function generarToken($form) {

		// generar token de forma aleatoria
		$token = md5(uniqid(microtime(), true));


		// generar fecha de generación del token
		$token_time = time();

		// escribir la información del token en sesión para poder
		// comprobar su validez cuando se reciba un token desde un formulario
		$_SESSION['csrf'][$form.'_token'] = array('token'=>$token, 'time'=>$token_time);; 

		return $token;
	}

	public static function validarToken($form, $token, $delta_time=0) {
	 
	   // comprueba si hay un token registrado en sesión para el formulario
	   if(!isset($_SESSION['csrf'][$form.'_token'])) {
	       return false;
	   }
	 
	   // compara el token recibido con el registrado en sesión
	   if ($_SESSION['csrf'][$form.'_token']['token'] !== $token) {
	       return false;
	   }
	 
	   // si se indica un tiempo máximo de validez del ticket se compara la
	   // fecha actual con la de generación del ticket
	   if($delta_time > 0){
	       $token_age = time() - $_SESSION['csrf'][$form.'_token']['time'];
	       if($token_age >= $delta_time){
	      return false;
	       }
	   }

	   session_unset($_SESSION['csrf']);
	 
	   return true;
	}
}