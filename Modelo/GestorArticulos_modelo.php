<?php

require_once "Administrador/Modelo/Conexion.php";

class ArticulosModels
{

	public static function seleccionarArticulosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, titulo, introduccion, ruta, contenido FROM $tabla ORDER BY orden ASC");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

}