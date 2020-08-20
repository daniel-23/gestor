<?php

class Conexion{

	
	public static function conectar(){

		try {

			$host = "127.0.0.1";
			$usuario = "root";
			$password = "root";
			$database = "gestor";

			$link = new PDO("mysql:host=$host;dbname=$database", $usuario, $password);
			#$link = new PDO("pgsql:host = $host ; dbname = $database",$usuario,$password);
			return $link;
		}catch (PDOException $e) {
			echo "<pre>";
			#$e->getErrors();
			echo $e->getMessage();
			echo "</pre>";
			#header("location:EBD");
			exit;
			
		}
	}
}