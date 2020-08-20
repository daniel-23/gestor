<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FrontEnd</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="Vista/images/icono.jpg">

	<link rel="stylesheet" href="Vista/css/bootstrap.min.css">
	<link rel="stylesheet" href="Vista/css/font-awesome.min.css">
	<link rel="stylesheet" href="Vista/css/style.css">
	<link rel="stylesheet" href="Vista/css/fonts.css">
	<link rel="stylesheet" href="Vista/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="Administrador/Vista/css/sweetalert.css">

	<script src="Vista/js/jquery-2.2.0.min.js"></script>
	<script src="Vista/js/bootstrap.min.js"></script>
	<script src="Vista/js/jquery.fancybox.js"></script>
	<script src="Vista/js/animatescroll.js"></script>
	<script src="Vista/js/jquery.scrollUp.js"></script>
	<script src="Administrador/Vista/js/sweetalert.min.js"></script>


</head>

<body>

	<div class="container-fluid">

		<?php

			if (isset($_GET["accion"]) && $_GET["accion"] == "EBD") {

				include "Modulos/404.php";
				
			}else{

			/*<!--=====================================
			CABEZOTE
			======================================-->*/
			
			include "Modulos/cabezote.php";
			
			/*<!--====  Fin de CABEZOTE  ====-->*/

			/*<!--=====================================
			SLIDE
			======================================-->*/
			
			include "Modulos/slide.php";

			/*<!--====  Fin de SLIDE  ====-->*/

			/*<!--=====================================
			TOP
			======================================-->*/

			include "Modulos/top.php";
			
			/*<!--====  Fin de TOP  ====-->*/

			/*<!--=====================================
			GALERIA
			======================================-->*/

			include "Modulos/galeria.php";

			/*<!--====  Fin de GALERIA  ====-->*/

			/*<!--=====================================
			ARTÍCULOS
			======================================-->*/

			include "Modulos/articulos.php";

			/*<!--====  Fin de ARTÍCULOS  ====-->*/

			/*<!--=====================================
			VIDEOS
			======================================-->*/

			include "Modulos/videos.php";

			/*<!--====  Fin de VIDEOS  ====-->*/

			/*<!--=====================================
				CONTÁCTENOS         
			======================================-->*/

			include "Modulos/contactenos.php";
			
			/*<!--====  Fin de CONTÁCTENOS ====-->*/

			/*<!--=====================================
				ARTÍCULO MODAL         
			======================================-->*/

			include "Modulos/articuloModal.php";

	    	/*<!--====  Fin de ARTICULO MODAL ====-->*/
		}

		?>

		
	</div>




<script src="Vista/js/script.js"></script>

</body>
</html>