<?php

	$ingreso = new Ingreso();
	$ingreso -> ingreso_controlador();
	
?>
<!--=====================================
FORMULARIO DE INGRESO         
======================================-->
<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1>
		<input class="form-control formIngreso" type="hidden" name="token_ingreso" value="<?php echo Seguridad::generarToken("formulario_ingreso"); ?>" >
		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuario" id="usuario" maxlength="15">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="clave" id="clave">
		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar" name="btnIngresar">

		<?php 
			if (isset($_GET["accion"])) {
				$act = $_GET["accion"];
				switch ($act) {
					case 'incorrectos':
						echo '<div class="alert alert-danger" role="alert">
								Usuario y/o contraseña incorectos!
							</div>';
						break;
					
					case 'bloqueado':
						echo '<div class="alert alert-danger" role="alert">
								Usuario bloqueado!
							</div>';
						break;

					case 'EBD':
						echo '<div class="alert alert-danger" role="alert">
								Error al conectar con la Base de datos!
							</div>';
						break;

					case 'seguridad':
						echo '<div class="alert alert-danger" role="alert">
								Error de seguridad!
							</div>';
						break;
					default:
						# code...
						break;
				}
			}

		?>
		

		

	</form>

	

</div>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->