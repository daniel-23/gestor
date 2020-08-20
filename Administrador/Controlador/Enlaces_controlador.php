<?php

class Enlaces_controlador
{

	public function enlace_controlador(){

		if(isset($_GET["accion"])){

			$enlace = $_GET["accion"];

		}else{

			$enlace = "ingreso";

		}

		$modulo = Enlaces_modelo::enlace_modelo($enlace);

		
		return $modulo;

	}


}