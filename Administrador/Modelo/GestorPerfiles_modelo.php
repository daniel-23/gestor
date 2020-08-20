<?php

require_once "Conexion.php";

class GestorPerfilesModel{

	#GUARDAR PERFIL
	#------------------------------------------------------------
	public static function guardarPerfilModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, clave, correo, foto, rol) VALUES (:usuario, :password, :email, :foto, :rol)");

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosModel["rol"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#VISUALIZAR PERFILES
	#------------------------------------------------------
	public static function verPerfilesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, clave,  correo, rol, foto FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#ACTUALIZAR PERFIL
	#---------------------------------------------------
	public static function editarPerfilModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, clave = :password, correo = :email, rol = :rol, foto = :foto WHERE id = :id");	

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":rol", $datosModel["rol"], PDO::PARAM_INT);
		$stmt -> bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#BORRAR PERFIL
	#-----------------------------------------------------
	public static function borrarPerfilModel($datosModel, $tabla){

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

	#obtenerimgmodelo 
	#---------------------------------------------------

	public static function obtenerimgmodelo($id, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT ruta FROM $tabla WHERE id = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt->fetch();

		$stmt->close();

	}


}