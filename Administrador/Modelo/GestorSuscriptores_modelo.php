<?php

require_once "Conexion.php";

class SuscriptoresModel
{

	#MOSTRAR Suscriptores EN LA VISTA
	#------------------------------------------------------------
	public static function mostrarSuscriptoresModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#BORRAR Suscriptores
	#-----------------------------------------------------
	public static function borrarSuscriptoresModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#SELECCIONAR SUSCRIPTORES SIN REVISAR
	#------------------------------------------------------------
	public static function suscriptoresSinRevisarModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(id) AS cantidad FROM $tabla WHERE revision = 0;");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}

	#Suscriptores REVISADOS
	#------------------------------------------------------------
	public static function	suscriptoresRevisadosModel($tabla)
	{

		$rev = 1;

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET revision = :revision WHERE revision = 0");

		$stmt->bindParam(":revision", $rev, PDO::PARAM_INT);


		if ($stmt -> execute()) {
			return True;
		}else{
			return False;
		}

		$stmt -> close();
	}

}


