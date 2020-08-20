<?php
require_once "../../Controlador/GestorMensajes_controlador.php";
require_once "../../Controlador/GestorSuscriptores_controlador.php";
require_once "../../Modelo/GestorMensajes_modelo.php";
require_once "../../Modelo/GestorSuscriptores_modelo.php";


class Ajax
{
	public $revisionMensajes;
	public $revisionSuscriptores;

	public function gestorRevisionMensajesAjax()
	{
		$datos = $this->revisionMensajes;

		$respuesta = MensajesController::mensajesRevisadosController($datos);

		echo $respuesta;
	}

	public function gestorRevisionSuscriptoresAjax()
	{
		$datos = $this->revisionSuscriptores;

		$respuesta = SuscriptoresController::suscriptoresRevisadosController($datos);

		echo $respuesta;
	}

	
}




if (isset($_POST["revisionMensajes"])) {
	$a = new Ajax();
	$a ->revisionMensajes = $_POST["revisionMensajes"];
	$a -> gestorRevisionMensajesAjax();
}


if (isset($_POST["revisionSuscriptores"])) {
	$b = new Ajax();
	$b ->revisionSuscriptores = $_POST["revisionSuscriptores"];
	$b -> gestorRevisionSuscriptoresAjax();
}