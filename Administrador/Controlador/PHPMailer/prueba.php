<?php
echo "hola<br>";
require_once"class.phpmailer.php";

$mail = new PHPMailer(true);
$mail->PluginDir = "class/";
$mail->Mailer = "smtp";
$mail->Host = '10.156.80.34';
$mail->Username   = "info@unes.edu.ve";
$mail->Password = "Unes3030";
// Configuramos el protocolo SMTP con autenticación
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->From = "info@unes.edu.ve";
$mail->FromName = "info@unes.edu.ve";
$mail->Timeout=90;
$mail->AddAddress("dediaz@unes.edu.ve");

// Configuración del servidor SMTP



// Configuración cabeceras del mensaje



$mail->Subject = "Asunto del correo";

//$body  = "Proebando los correos con un tutorial<br>";
//$body .= "hecho por <strong>Developando</strong>.<br>";
//$body .= "<font color='red'>Visitanos pronto</font>";
$mail->Body = "Hola";
$mail->AltBody = "Hola";
// Ficheros adjuntos
//$mail->AddAttachment("changelog.txt");

// Enviar el correo
if (!$mail->Send()) {
	echo "Hubo un error: " . $correo->ErrorInfo;
}else{
	echo "enviado";
	
}


?>
