<?php

class Enlaces_modelo
{
	
	public static function enlace_modelo($enlace)
	{

		if ($enlace == "ingreso" ||
			$enlace == "inicio" ||
			$enlace == "slide" ||
			$enlace == "articulos" ||
			$enlace == "galeria" ||
			$enlace == "videos" ||
			$enlace == "suscriptores" ||
			$enlace == "mensajes" ||
			$enlace == "perfil" ||
			$enlace == "salir") {

			$modulo = "Vista/Modulos/".$enlace.".php";

		}elseif ($enlace == "incorrectos" ||
				 $enlace == "bloqueado" || 
				 $enlace == "EBD" ||
				 $enlace == "seguridad") {
			$modulo = "Vista/Modulos/ingreso.php";
		}else{
			header("location: seguridad");exit;
		}

		return $modulo;
	}
}