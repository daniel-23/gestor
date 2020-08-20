<?php

class Galeria
{

	public function seleccionarGaleriaController(){

		$respuesta = GaleriaModels::seleccionarGaleriaModel("galeria");

		foreach ($respuesta as $row => $item){

			echo '<li>
					<a rel="grupo" href="Administrador/'.substr($item["ruta"], 6).'">
					<img src="Administrador/'.substr($item["ruta"], 6).'">
					</a>
				</li>';

		}

	}

}