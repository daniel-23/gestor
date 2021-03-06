<?php

require_once "../../Modelo/GestorSlide_modelo.php";
require_once "../../Controlador/GestorSlide_controlador.php";

#CLASE Y MÉTODOS
#-------------------------------------------------------------

class Ajax
{

	#SUBIR LA IMAGEN DEL SLIDE
	#----------------------------------------------------------

	public $nombreImagen;
	public $imagenTemporal;

	public function GestorSlide_controladorAjax(){
		

		$datos = array("nombreImagen"=>$this->nombreImagen,
			           "imagenTemporal"=>$this->imagenTemporal);


		$respuesta = GestorSlide_controlador::mostrarImagenController($datos);

		echo $respuesta;

	}

	#ELIMINAR ITEM SLIDE
	#----------------------------------------------------------
	public $idSlide;
	public $rutaSlide;

	public function eliminarSlideAjax(){

		$datos = array("idSlide" => $this->idSlide, 
			           "rutaSlide" => $this->rutaSlide);

		$respuesta = GestorSlide_controlador::eliminarSlideController($datos);

		echo $respuesta;

	}

	#ACTUALIZAR ITEM SLIDE
	#----------------------------------------------------------
	public $enviarId;
	public $enviarTitulo;
	public $enviarDescripcion;

	public function actualizarSlideAjax(){

		$datos = array("enviarId" => $this->enviarId, 
			           "enviarTitulo" => $this->enviarTitulo,
			           "enviarDescripcion" => $this->enviarDescripcion);

		$respuesta = GestorSlide_controlador::actualizarSlideController($datos);

		echo $respuesta;

	}

	#ACTUALIZAR ORDEN
	#---------------------------------------------
	
	public $actualizarOrdenSlide;
	public $actualizarOrdenItem;

	public function actualizarOrdenAjax(){

		$datos = array("ordenSlide" => $this->actualizarOrdenSlide,
			           "ordenItem" => $this->actualizarOrdenItem);

		$respuesta = GestorSlide_controlador::actualizarOrdenController($datos);

		echo $respuesta;

	}

}

#OBJETOS
#-----------------------------------------------------------
if(isset($_FILES["imagen"]["name"])){

	$a = new Ajax();
	$a -> nombreImagen = $_FILES["imagen"]["name"];
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> GestorSlide_controladorAjax();

}

if(isset($_POST["idSlide"])){

	$b = new Ajax();
	$b -> idSlide = $_POST["idSlide"];
	$b -> rutaSlide = $_POST["rutaSlide"];
	$b -> eliminarSlideAjax();	

}

if(isset($_POST["enviarId"])){

	$c = new Ajax();
	$c -> enviarId = $_POST["enviarId"];
	$c -> enviarTitulo = $_POST["enviarTitulo"];
	$c -> enviarDescripcion = $_POST["enviarDescripcion"];
	$c -> actualizarSlideAjax();	

}

if(isset($_POST["actualizarOrdenSlide"])){

	$d = new Ajax();
	$d -> actualizarOrdenSlide = $_POST["actualizarOrdenSlide"];
	$d -> actualizarOrdenItem = $_POST["actualizarOrdenItem"];
	$d -> actualizarOrdenAjax();

}
