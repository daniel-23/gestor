<?php
require_once('class.phpmailer.php');
 
$correo = new PHPMailer();
$correo->SetLanguage('es','language/');
$correo->PluginDir = "";
$correo->Mailer = "smtp";//mail
$correo->IsSMTP();
 
$correo->SMTPAuth = true;
 
$correo->SMTPSecure = 'tls';
//$correo->SMTPSecure = 'ssl';
//$correo->Host = "10.156.80.34";
$correo->Host = "smtp.gmail.com";
//$correo->SMTPDebug = 0;
//
 
$correo->Port = 587;
//$correo->Port = 465;
 
$correo->Username   = "danielbatlet@gmail.com";
//$correo->Username   = "info@unes.edu.ve";
 
$correo->Password   = "Daniel023Enrique797";
//$correo->Password   = "Unes3030";
 
$correo->SetFrom("danielbatlet@gmail.com", "Daniel Diaz");
 
$correo->AddReplyTo("danielbatlet@gmail.com","Daniel Diaz");
 
$correo->AddAddress("danielbatlet_@hotmail.com", "Daniel");
 
$correo->Subject = "Mi primero correo con PHPMailer";
 
$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
 
//$correo->AddAttachment("images/phpmailer.gif");
 
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>