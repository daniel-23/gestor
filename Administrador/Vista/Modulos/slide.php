<?php

if(!isset($_SESSION["validar"])){

	echo '<script type="text/javascript">
					window.location.href = "ingreso";
					</script>';exit();

}

include "Vista/Modulos/botonera.php";
include "Vista/Modulos/cabezote.php";

?>
<!--=====================================
SLIDE ADMINISTRABLE          
======================================-->

<div id="imgSlide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

<hr>

<p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen (tamaño recomendado: 1600px * 600px y peso recomendado: 2MB)</p>
	
	<ul id="columnasSlide">

	<?php

	$slide = new GestorSlide_controlador();
	$slide -> mostrarImagenVistaController();

	?>
		
	</ul>

	<button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

	<button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>

</div>

<!--===============================================-->

<div id="textoSlide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

<hr>
	
	<ul id="ordenarTextSlide">

	<?php

	$slide = new GestorSlide_controlador();
	$slide -> editorSlideController();

	?>

	</ul>
</div>

<!--===============================================-->


<!--====  Fin de SLIDE ADMINISTRABLE  ====-->

