<?php

require_once "Administrador/Modelo/Conexion.php";

class MensajesModel{

	#REGISTRO MENSAJES
	#-----------------------------------------------------------

	public static function registroMensajesModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, email, mensaje, fecha) VALUES (:nombre, :email, :mensaje, :fecha)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}
		else{

			return "error";
		}

		$stmt->close();

	}

	#REGISTRO SUSCRIPTORES
	#-----------------------------------------------------------

	public static function registroSuscriptoresModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, email) VALUES (:nombre, :email)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}
		else{

			return "error";
		}

		$stmt->close();

	}

	#VALIDAR SUSCRIPTOR EXISTENTE
	#-------------------------------------
	public static function revisarSuscriptorModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
		
		$stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
		
		$stmt->execute();
		
		return $stmt->fetch();
		
		$stmt->close();

	}

}