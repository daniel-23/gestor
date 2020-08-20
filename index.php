<?php
require_once "Controlador/Plantilla_controlador.php";
require_once "Controlador/GestorSlide_controlador.php";
require_once "Controlador/GestorArticulos_controlador.php";
require_once "Controlador/GestorGaleria_controlador.php";
require_once "Controlador/GestorVideos_controlador.php";
require_once "Controlador/GestorMensajes_controlador.php";
require_once "Administrador/Controlador/enviocorreo.php";

require_once "Modelo/GestorSlide_modelo.php";
require_once "Modelo/GestorArticulos_modelo.php";
require_once "Modelo/GestorGaleria_modelo.php";
require_once "Modelo/GestorVideos_modelo.php";
require_once "Modelo/GestorMensajes_modelo.php";

abstract class Inicio
{
	
	public static function iniciar_sistema()
	{
		$sistema = new Plantilla_controlador();
		$sistema-> traer_plantilla_vista();
	}
}
Inicio::iniciar_sistema();