<?php

class GestorPerfiles{

	#GUARDAR PERFIL
	#------------------------------------------------------------
	public function guardarPerfilController(){

		$ruta = "";

		if(isset($_POST["nuevoUsuario"])){
			


			if(isset($_FILES["nuevaImagen"]["tmp_name"])){

				$imagen = $_FILES["nuevaImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				$ruta = "Vista/Imagenes/perfiles/perfil".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>10, "y"=>10, "width"=>110, "height"=>110]);

				imagejpeg($destino, $ruta);

			}

			if($ruta == ""){

				$ruta = "Vista/Imagenes/photo.jpg";	

			}

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"])){


				//$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$pass = new Passwd_controlador();
				$encriptar = $pass->HashPassword(trim($_POST["nuevoPassword"]));

				$datosController = array("usuario"=>$_POST["nuevoUsuario"],
										 "password"=>$encriptar,
										 "email"=>$_POST["nuevoEmail"],
										 "rol"=>$_POST["nuevoRol"],
										 "foto"=> $ruta);

				$respuesta = GestorPerfilesModel::guardarPerfilModel($datosController, "tb_usuarios");

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El usuario ha sido creado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "perfil";
								  } 
						});


					</script>';

				}

			}

			else{

				echo '<div class="alert alert-warning"><b>¡ERROR!</b> No ingrese caracteres especiales</div>';
			}

		}

	}

	#VISUALIZAR LOS PERFILES
	#------------------------------------------------------------

	public function verPerfilesController(){

		$respuesta = GestorPerfilesModel::verPerfilesModel("tb_usuarios");

		foreach($respuesta as $row => $item){

			$rol = $item["rol"] == 0 ? "Administrador" : "Editor";

        	if ($item["id"] != $_SESSION["id"]) {
        		echo '<tr>
			        	<td>'.$item["usuario"].'</td>
			        	<td>'.$rol.'</td>
			        	<td>'.$item["correo"].'</td>
			        	<td><a href="#perfil'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
			            <a href="perfil-idBorrar-'.$item["id"].'"><span class="btn btn-danger fa fa-times"></span></a></td>
			      	  </tr>

			        	<div id="perfil'.$item["id"].'" class="modal fade">

					       	<div class="modal-dialog modal-content">

								<div class="modal-header" style="border:1px solid #eee">

									<button type="button" class="close" data-dismiss="modal">X</button>

									<h3 class="modal-title">Editar Perfil</h3>

								</div>

								<div class="modal-body" style="border:1px solid #eee">
								
									<form style="padding:0px 10px" method="post" enctype="multipart/form-data">

									      <input name="idPerfil" type="hidden" value="'.$item["id"].'">
									    
									     <div class="form-group">
									       
									      <input name="editarUsuario" type="text" class="form-control" value="'.$item["usuario"].'" required>

									     </div>

									      <div class="form-group">

									          <input name="editarPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>

									      </div>

									      <div class="form-group">

									         <input name="editarEmail" type="email" value="'.$item["correo"].'" class="form-control" required>

									      </div>

									      <div class="form-group">
									        <select name="editarRol" class="form-control" required>
									            <option value="">Seleccione el Rol</option>
									            <option value="0"'; echo $item['rol'] == 0 ? " selected" : ''; echo '>Administrador</option>
									            <option value="1"'; echo $item['rol'] == 1 ? " selected" : ''; echo '>Editor</option>
									        </select>

									      </div>

									       <div class="form-group text-center">

									       		<div style="display:block;">

											     	<img src="'.$item["foto"].'" width="20%" class="img-circle">

			       								 	<input type="hidden" value="'.$item["foto"].'" name="editarPhoto">

										   		</div>	    

								    		<input type="file" class="btn btn-default" name="editarImagen" style="display:inline-block; margin:10px 0">

									          <p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>

									       </div>

									        <div class="form-group text-center">

									    		<input type="submit" id="guardarPerfil" value="Actualizar Perfil" class="btn btn-primary">

									    	</div>

									</form>

								</div>

								<div class="modal-footer" style="border:1px solid #eee">
									
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

								</div>
					        
					       	</div>

				       </div>';

        	}
				
		}

	}

	#EDITAR PERFIL
	#------------------------------------------------------------

	public function editarPerfilController(){

		$ruta = "";

		if(isset($_POST["editarUsuario"])){

			if( isset($_FILES["editarImagen"]["tmp_name"]) && $_FILES["editarImagen"]["tmp_name"] != ""){	

				$imagen = $_FILES["editarImagen"]["tmp_name"];
				$aleatorio = mt_rand(100, 999);

				$ruta = "Vista/Imagenes/perfiles/perfil".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($imagen);

				$destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>100, "height"=>100]);

				imagejpeg($destino, $ruta);

			}

			if($ruta == ""){

				$ruta = $_POST["editarPhoto"];
			}

			if($ruta != $_POST["editarPhoto"] && file_exists($_POST["editarPhoto"])){


				unlink($_POST["editarPhoto"]);
			
			}

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"])){



				//$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$pass = new Passwd_controlador();
				$encriptar = $pass->HashPassword(trim($_POST["editarPassword"]));

				$datosController = array("id"=>$_POST["idPerfil"],
										 "usuario"=>$_POST["editarUsuario"],
						                 "password"=>$encriptar,
						                 "email"=>$_POST["editarEmail"],
						                 "rol"=>$_POST["editarRol"],
					 	                 "foto"=>$ruta);

				$respuesta = GestorPerfilesModel::editarPerfilModel($datosController, "tb_usuarios");
				if($respuesta == "ok"){

					if(isset($_POST["actualizarSesion"])){
						//session_start();
						$_SESSION["id"] = $_POST["idPerfil"];
						$_SESSION["usuario"] = $_POST["editarUsuario"];
						//$_SESSION["password"] = $encriptar;
						$_SESSION["email"] = $_POST["editarEmail"];
						$_SESSION["photo"] = $ruta;
						$_SESSION["rol"] = $_POST["editarRol"];



					}

					echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El usuario ha sido editado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "perfil";
								  } 
						});


					</script>';
				}

			}

			else{

				echo '<div class="alert alert-warning"><b>¡ERROR!</b> No ingrese caracteres especiales</div>';
			}

		}

	}

	#BORRAR PERFIL
	#------------------------------------------------------------

	public function borrarPerfilController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$rutaimg = GestorPerfilesModel::obtenerimgmodelo($datosController, "tb_usuarios");

			if (file_exists($rutaimg)) {
				unlink($rutaimg);
			}			
			
			

			$respuesta = GestorPerfilesModel::borrarPerfilModel($datosController, "tb_usuarios");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El usuario se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "perfil";
							  } 
					});


				</script>';

			}

		}


	}


}