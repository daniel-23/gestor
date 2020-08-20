<?php

require_once "Conexion.php";

class Ingreso_modelo extends Conexion
{
	public static function traer_usuario_modelo($usuario, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario;");

		$stmt->bindParam(":usuario",$usuario, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}

	public static function actualizar_intentos($datos, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE id = :id;");

		$stmt->bindParam(":intentos",$datos["intentos"], PDO::PARAM_INT);
		$stmt->bindParam(":id",$datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {
			return true;
		}else{
			return false;
		}
		
		$stmt->close();

	}


	
}