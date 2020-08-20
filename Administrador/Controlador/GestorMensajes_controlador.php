<?php

class MensajesController{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	public static function mostrarMensajesController(){

		$respuesta = MensajesModel::mostrarMensajesModel("mensajes");
		

		foreach ($respuesta as $row => $item){

			echo '<div class="well well-sm" id="'.$item["id"].'">
		
					<a href="mensajes-idBorrar-'.$item["id"].'"><span class="fa fa-times pull-right"></span></a>
					<p>'.date('d-m-Y H:i:s',strtotime($item["fecha"])).'</p>
					<h3>De: '.$item["nombre"].'</h3>
					<h5>Email: '.$item["email"].'</h5>
				  	<input type="text" class="form-control" value="'.$item["mensaje"].'" readonly>
				  	<br>
				  	<button class="btn btn-info btn-sm leerMensaje">Leer</button>

				  </div>';

		}

	}

	#BORRAR MENSAJES
	#------------------------------------------------------------

	public function borrarMensajesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = MensajesModel::borrarMensajesModel($datosController, "mensajes");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El mesaje se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "mensajes";
							  } 
					});


				</script>';

			}

		}

	}

	#RESPONDER MENSAJES
	#------------------------------------------------------------
	public function responderMensajesController(){

		if(isset($_POST['enviarEmail'])){


			$mensaje ='<html>
							<head>
								<title>Respuesta a su Mensaje</title>
							</head>

							<body>
								<h1>Hola '.$_POST['enviarNombre'].'</h1>
								<p>'.$_POST['enviarMensaje'].'</p>
								<hr>
								<p><b>Daniel Diaz.</b><br></p>

								<h3><a href="http://www.pagina.com" target="blank">www.pagina.com</a></h3>

								<a href="http://www.facebook.com" target="blank"><img src="https://s23.postimg.org/cb2i89a23/facebook.jpg"></a> 
								<a href="http://www.youtube.com" target="blank"><img src="https://s23.postimg.org/mcbxvbciz/youtube.jpg"></a> 
								<a href="http://www.twitter.com" target="blank"><img src="https://s23.postimg.org/tcvcacox7/twitter.jpg"></a> 
								<br>

								<img src="https://s23.postimg.org/dsnyjtesr/unnamed.jpg">
							</body>

					   </html>';

			   	$datosController = array("nombre"=> "Administrador CMS",
			   							 "asunto"=> "Administrador CMS",
										 "mensajeCorreo"=>$mensaje,
										 "fecha"=>date("Y-m-d H:i:s"),
										 "para"=>$_POST['enviarEmail']);
			   	
			   	$envio = EnvioCorreo::enviarCorreo($datosController);

		   if($envio){

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
								    window.location = "mensajes";
								  } 
						});


				</script>';

		   }

		}

	}

	#ENVIAR MENSAJES MASIVOS
	#------------------------------------------------------------
	public function mensajesMasivosController(){

		if(isset($_POST["tituloMasivo"])){

			$respuesta = MensajesModel::seleccionarEmailSuscriptores("suscriptores");



			foreach ($respuesta as $row => $item) {

				$mensaje ='<html>
							<head>
								<title>Respuesta a su Mensaje</title>
							</head>

							<body>
								<h1>Hola '.$item["nombre"].'</h1>
								<p>'.$_POST['mensajeMasivo'].'</p>
								<hr>
								<p><b>Daniel Diaz.</b><br>
								</p>

								<h3><a href="http://www.pagina.com" target="blank">www.pagina.com</a></h3>

								<a href="http://www.facebook.com" target="blank"><img src="https://s23.postimg.org/cb2i89a23/facebook.jpg"></a> 
								<a href="http://www.youtube.com" target="blank"><img src="https://s23.postimg.org/mcbxvbciz/youtube.jpg"></a> 
								<a href="http://www.twitter.com" target="blank"><img src="https://s23.postimg.org/tcvcacox7/twitter.jpg"></a> 
								<br>

								<img src="https://s23.postimg.org/dsnyjtesr/unnamed.jpg">
							</body>

					   </html>';

				$datosController = array("nombre"=> "Administrador CMS",
										 "asunto" => $_POST["tituloMasivo"],
										 "mensajeCorreo"=>$mensaje,
										 "fecha"=>date("Y-m-d H:i:s"),
										 "para"=>$item["email"]);
			   	$envio = EnvioCorreo::enviarCorreo($datosController);


			   if($envio){

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
									    window.location = "mensajes";
									  } 
							});


					</script>';

			   }

			}

		}

	}

	#MSJ SIN REVISAR
	#------------------------------------------------------------
	public function mensajesSinRevisarController()
	{
		$respuesta = MensajesModel::mensajesSinRevisarModel("mensajes");
		
		if ($respuesta[0] > 0) {
			echo '<span>'.$respuesta[0].'</span>';
		}
		
	}


	#MSJ REVISADOS
	#------------------------------------------------------------
	public function mensajesRevisadosController($datos)
	{
		$respuesta = MensajesModel::mensajesRevisadosModel($datos,"mensajes");

		echo $respuesta;
	}

}