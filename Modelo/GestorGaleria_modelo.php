<?php

require_once "Administrador/Modelo/Conexion.php";

class GaleriaModels
{

	public static function seleccionarGaleriaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM $tabla ORDER BY orden ASC");
	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
}