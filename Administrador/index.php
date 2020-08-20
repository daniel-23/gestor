<?php

require_once "Controlador/Seguridad_controlador.php";
require_once "Controlador/Plantilla_controlador.php";
require_once "Controlador/Enlaces_controlador.php";
require_once "Controlador/Ingreso_controlador.php";
require_once "Controlador/Passwd_controlador.php";
require_once "Controlador/GestorSlide_controlador.php";
require_once "Controlador/GestorArticulos_controlador.php";
require_once "Controlador/GestorGaleria_controlador.php";
require_once "Controlador/GestorVideos_controlador.php";
require_once "Controlador/GestorSuscriptores_controlador.php";
require_once "Controlador/GestorMensajes_controlador.php";
require_once "Controlador/GestorPerfiles_controlador.php";
require_once "Controlador/enviocorreo.php";

require_once "Modelo/Enlaces_modelo.php";
require_once "Modelo/Ingreso_modelo.php";
require_once "Modelo/GestorSlide_modelo.php";
require_once "Modelo/GestorArticulos_modelo.php";
require_once "Modelo/GestorGaleria_modelo.php";
require_once "Modelo/GestorVideos_modelo.php";
require_once "Modelo/GestorSuscriptores_modelo.php";
require_once "Modelo/GestorMensajes_modelo.php";
require_once "Modelo/GestorPerfiles_modelo.php";

abstract class Inicio
{
	
	public static function iniciar_sistema()
	{
		$sistema = new Plantilla_controlador();
		$sistema-> traer_plantilla_vista();
	}
}

Inicio::iniciar_sistema();