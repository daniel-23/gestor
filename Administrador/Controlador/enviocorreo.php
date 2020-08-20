<?php

require "PHPMailer/class.phpmailer.php";

class EnvioCorreo
{

	public static function enviarCorreo($datosCorreo)
	{	
		$correo = new PHPMailer();
		$correo->IsSMTP();
		$correo->SMTPDebug = 0;
		$correo->Host = "smtp.mailtrap.io";
		$correo->Port = 2525;
		#$correo->SMTPSecure = 'tls';
		$correo->SMTPAuth = true;
		#$correo->Username   = "daniele.diazg@gmail.com";
		#$correo->Password   = "Zxcv1*Bnm2$";
		$correo->Username   = "ffd16dd1eed477";
		$correo->Password   = "e9228af3ad0548";
		$correo->SetFrom("from@example.com", "Administrador WEB");
		$correo->AddAddress($datosCorreo["para"]);
		$correo->Subject = isset($datosCorreo['asunto']) ? $datosCorreo['asunto'] : "Mensaje de la web";
		$cuerpo = $datosCorreo["mensajeCorreo"];
		$correo->MsgHTML(utf8_decode($cuerpo));
		$correo->AltBody = utf8_decode($cuerpo);
		 
		if($correo->Send()){
			return True;
		}else{
			return False;
		}
	}
}


