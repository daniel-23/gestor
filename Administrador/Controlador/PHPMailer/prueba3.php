<?php 
include_once("class.phpmailer.php");
	$mail = new phpmailer();
	$mail->SetLanguage('es','language/');
	$mail->PluginDir = "";
	$mail->Mailer = "mail";//smtp
 	$mail->IsSMTP();
  	$mail->Host = "172.16.36.4";//smtp.gmail.com
  	$mail->Port = "465";//465
        $mail->SMTPAuth = true;
  	$mail->SMTPSecure = "ssl";//sslv3
        $mail->Username = "info@unes.edu.ve";//seleccion.unes@gmail.com 
  	$mail->Password = "Unes3030";//UnEs.EdU.Ve_2014
	$mail->From = "info@unes.edu.ve";
  	$mail->FromName = "info@unes.edu.ve";//receptor
	$mail->Timeout=90;
	$mail->IsHTML(true);
  	//Indicamos cual es la dirección de destino del correo
  	$mail->AddAddress("dediaz@unes.edu.ve");
	$mail->AddCC("dediaz@unes.edu.ve");
  	$mail->Subject = "Registro de Aspirante"; 
	$cuerpo="hola"; // Cerramos la comilla simple. Con la comilla simple y el punto y coma se finaliza el cuerpo del mensaje html.  

//<p text-align='justify'> 

//					EL SIGUIENTE PASO A REALIZAR, ES DIRIGIRTE AL CENTRO DE FORMACI&Oacute;N QUE HAS ELEGIDO COMO SEDE A ESTUDIAR, CON LOS DOCUMENTOS SOLICITADOS....

//				</p>

	$mail->Body = $cuerpo;

  	//Definimos AltBody por si el destinatario del correo no admite email con formato html 
	$mail->AltBody = "hola alt";
	//la variable $exito tendra el valor true

	//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 

	//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 

	//del anterior, para ello se usa la funcion sleep	

	if(!$mail->Send()){
		echo "Error : " . $mail->ErrorInfo; 
	}else{
		echo "bien : "; 
	}
?>