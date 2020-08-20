<?php
class Ingreso
{
	public function ingreso_controlador()
	{
		if (isset($_POST["btnIngresar"])) {
			/*$pass = new Passwd_controlador();
			$clave = $pass->HashPassword(trim($_POST["clave"]));
			echo '<pre>'; print_r($clave); echo '</pre>';exit();*/

			
			$token = $_POST["token_ingreso"];
			$token_valido = Seguridad::validarToken("formulario_ingreso", $token, 300);
			
			if ($token_valido || true) {
				$usuario = strtolower(strip_tags($_POST["usuario"]));
				$clave = $_POST["clave"];
				$datos_usuario = Ingreso_modelo::traer_usuario_modelo($usuario,"tb_usuarios");
				if (!$datos_usuario) {
					#header("location: incorrectos");
					echo '<script type="text/javascript">
					window.location.href = "incorrectos";
					</script>';exit();
				}
				

				
				if ($datos_usuario["intentos"] > 2) {
					echo '<script type="text/javascript">
					window.location.href = "bloqueado";
					</script>';exit();
				}

				$pass = new Passwd_controlador();
				if ( ! $pass->CheckPassword($clave,$datos_usuario["clave"])) {
					$intentos = ++ $datos_usuario["intentos"];
					$act_intentos = array("intentos" => $intentos, "id" => $datos_usuario["id"]);

					Ingreso_modelo::actualizar_intentos($act_intentos,"tb_usuarios");

					if ($intentos < 3) {
						echo '<script type="text/javascript">
						window.location.href = "incorrectos";
						</script>';exit();
						#header("location: incorrectos");exit;
					}else{
						echo '<script type="text/javascript">
						window.location.href = "bloqueado";
						</script>';exit();
						#header("location: bloqueado");exit;
					}
					
				}else{

					$intentos = 0;
					$act_intentos = array("intentos" => $intentos, "id" => $datos_usuario["id"]);

					Ingreso_modelo::actualizar_intentos($act_intentos,"tb_usuarios");

					$_SESSION["validar"] = true;
					$_SESSION["id"] = $datos_usuario["id"];
					$_SESSION["usuario"] = $datos_usuario["usuario"];
					$_SESSION["rol"] = $datos_usuario["rol"];
					$_SESSION["photo"] = $datos_usuario["foto"];
					$_SESSION["email"] = $datos_usuario["correo"];

					#header("location:inicio");
					echo '<script type="text/javascript">
					window.location.href = "inicio";
					</script>';exit();
				
				}

				
			}else{
				#header("location: seguridad");exit;
				echo '<script type="text/javascript">
					window.location.href = "seguridad";
					</script>';exit();
			}
			//$clave = Passwd_controlador::HashPassword(trim($_POST["clave"]));
			

		}
	}
}
?>