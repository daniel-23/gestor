<?php
require_once('class.phpmailer.php');
 
$correo = new PHPMailer();
$correo->SetLanguage('es','language/');
$correo->PluginDir = "";
$correo->Mailer = "mail";//smtp
$correo->IsSMTP();
 
$correo->SMTPAuth = true;
 
//$correo->SMTPSecure = 'tls';
$correo->SMTPSecure = 'ssl';
$correo->SMTPSecure = 'tcp';
$correo->Host = "10.156.80.34";
$correo->SMTPDebug = 0;
//$correo->Host = "smtp.gmail.com";
 
//$correo->Port = 587;
$correo->Port = 25;
 
//$correo->Username   = "danielbatlet@gmail.com";
$correo->Username   = "info@unes.edu.ve";
 
//$correo->Password   = "";
$correo->Password   = "Unes3030";
 
$correo->SetFrom("info@unes.edu.ve", "Mi Codigo PHP");
 
$correo->AddReplyTo("info@unes.edu.ve","Mi Codigo PHP");
 
$correo->AddAddress("dediaz@unes.edu.ve", "Daniel");
 
$correo->Subject = "Mi primero correo con PHPMailer";
 
$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
 
//$correo->AddAttachment("images/phpmailer.gif");
 
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>