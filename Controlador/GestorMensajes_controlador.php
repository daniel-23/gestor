<?php

class MensajesController{

	public function registroMensajesController(){

		if(isset($_POST["nombre"])){

			if(preg_match('/^[a-zA-Z\s]+$/', $_POST["nombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
			   preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9\s\.,]+$/', $_POST["mensaje"])){

			   	#ENVIAR EL CORREO ELECTRÓNICO
			   	#------------------------------------------------------
			   	#mail(Correo destino, asunto del mensaje, mensaje, cabecera del correo);
				
			   	$mensajeCorreo = "<h3>Nombre: ".$_POST["nombre"]."</h3>";
				$mensajeCorreo .="<h3>Email: ".$_POST["email"]."</h3>";
				$mensajeCorreo .="<p>Mensaje: ".$_POST["mensaje"]."</p>";

			   	$datosController = array("nombre"=>$_POST["nombre"],
										 "email"=>$_POST["email"],
										 "mensajeCorreo"=>$mensajeCorreo,
										 "mensaje" => $_POST["mensaje"],
										 "fecha"=>date("Y-m-d H:i:s"),
										 "para"=>"danielbatlet@gmail.com");
			   	
			   	
			   	$envio = EnvioCorreo::enviarCorreo($datosController);

			   	#ALMACENAR EN BASE DE DATOS EL SUSCRIPTOR
			   	#-------------------------------------------------------

			   	$datosSuscriptor = $_POST["email"];

			   	$revisarSuscriptor = MensajesModel::revisarSuscriptorModel($datosSuscriptor, "suscriptores");

			   	if(!$revisarSuscriptor){
			   		MensajesModel::registroSuscriptoresModel($datosController, "suscriptores");
			   	}
 
			   	#ALMACENAR EN BASE DE DATOS EL MENSAJE
			   	#-------------------------------------------------------  

			   $respuesta = MensajesModel::registroMensajesModel($datosController, "mensajes");
			   var_dump($respuesta);

			   if($envio == True && $respuesta == "ok"){

				echo'<script>
						
						swal({
							  title: "¡OK!",
							  text: "¡El mensaje ha sido enviado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "index.php";
								  } 
						});

					</script>';

				}


			}

			else{

				echo '<div class="alert alert-danger">¡No se puedo enviar el mensaje, no se permiten caracteres especiales!</div>';

			}


		}

	}
}