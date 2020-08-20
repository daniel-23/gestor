<?php

require_once "Conexion.php";

class MensajesModel
{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	public static function mostrarMensajesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, email, mensaje, fecha FROM $tabla ORDER BY fecha DESC"); 

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#BORRAR MENSAJES
	#-----------------------------------------------------
	public function borrarMensajesModel($datosModel, $tabla){

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

	#ENVIAR EMAIL MASIVOS
	#-------------------------------------------------
	public function seleccionarEmailSuscriptores($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT nombre, email FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}


	#MSJ SIN REVISAR
	#------------------------------------------------------------
	public static function mensajesSinRevisarModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla WHERE revision = 0;");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}


	#MSJ REVISADOS
	#------------------------------------------------------------
	public function	mensajesRevisadosModel($datos, $tabla)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET revision = :revision WHERE revision = 0");

		$stmt->bindParam(":revision", $datos, PDO::PARAM_INT);


		if ($stmt -> execute()) {
			return True;
		}else{
			return False;
		}

		$stmt -> close();
	}

}