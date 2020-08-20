<?php
if (is_session_started() === FALSE) {
	session_start();
}
function is_session_started()
{
	if ( php_sapi_name() !== 'cli' ) {
		if ( version_compare(phpversion(), '5.4.0', '>=') ) {
			return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
		} else {
			return session_id() === '' ? FALSE : TRUE;
		}
	}
	return FALSE;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plantilla</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="Vista/Imagenes/icono.jpg">
	<link rel="stylesheet" href="Vista/css/bootstrap.min.css">
	<link rel="stylesheet" href="Vista/css/font-awesome.min.css">
	<link rel="stylesheet" href="Vista/css/style.css">
	<link rel="stylesheet" href="Vista/css/fonts.css">
    <link rel="stylesheet" href="Vista/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="Vista/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="Vista/css/sweetalert.css">
	<link rel="stylesheet" href="Vista/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="Vista/css/jquery-ui.min.css">
	<script src="Vista/js/jquery-2.2.0.min.js"></script>
	<script src="Vista/js/bootstrap.min.js"></script>
	<script src="Vista/js/jquery.fancybox.js"></script>
	<script src="Vista/js/jquery.dataTables.min.js"></script>
	<script src="Vista/js/dataTables.bootstrap.min.js"></script>
	<script src="Vista/js/dataTables.responsive.min.js"></script>
	<script src="Vista/js/responsive.bootstrap.min.js"></script>
	<script src="Vista/js/jquery-ui.min.js"></script>
	<script src="Vista/js/sweetalert.min.js"></script>
</head>
<body>

	<div class="container-fluid">

		<section class="row">
		<!--=====================================
		COLUMNA CONTENIDO        
		======================================-->	

			<?php 
				$modulo = new Enlaces_controlador();
				include_once $modulo -> enlace_controlador();
			?>
		<!--====  Fin de COLUMNA CONTENIDO  ====-->
		</section>
	
	</div>

	<script src="Vista/js/script.js"></script>
	<script src="Vista/js/validarIngreso.js"></script>
	<script src="Vista/js/gestorSlide.js"></script>
	<script src="Vista/js/gestorArticulos.js"></script>
	<script src="Vista/js/gestorGaleria.js"></script>
	<script src="Vista/js/gestorVideos.js"></script>
	<script src="Vista/js/gestorMensajes.js"></script>
	<script src="Vista/js/gestorPerfiles.js"></script>

</body>
</html>