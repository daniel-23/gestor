<footer class="row" id="contactenos">

	<hr>
	
	<h1 class="text-center text-info"><b>CONTÁCTENOS</b></h1>

	<hr>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&height=600&hl=es&coord=4.3624881,-74.1837703&q=Bogota+(CMS)&ie=UTF8&t=&z=14&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/calcular-ruta.html">Mapa de Ruta</a></iframe>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

    		<h4 class="blockquote-reverse text-primary">
    			<ul>
	              <li><span class="glyphicon glyphicon-phone"></span>  (+58)(424) 175 39 32</li>
	              <li><span class="glyphicon glyphicon-map-marker"></span>  Calle 45F 32 - 45</li>
	              <li><span class="glyphicon glyphicon-envelope"></span>  logotipo@correo.com</li>    
	          	</ul>      
    		</h4>

			</div>

	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >

		<ol>
    		<li>
        		<a href="http://www.facebook.com" target="_blank">
          		<i class="fa fa-facebook" style="font-size:24px;"></i>  
       		 	</a>
   			</li>

    		<li>
        		<a href="http://www.youtube.com" target="_blank">  
          		<i class="fa fa-youtube" style="font-size:24px;"></i>  
       			</a>
    		</li>
    
    		<li>
        		<a href="http://www.vimeo.com" target="_blank">
          		<i class="fa fa-vimeo" style="font-size:24px;"></i>  
        		</a>
    		</li>
			</ol>

			<form method="post" onsubmit="return validarMensaje()">
			    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>

			    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

			    <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Contenido del Mensaje" class="form-control" required></textarea>

			 
			  	<input type="submit" class="btn btn-default" value="Enviar">
		</form>
		<?php

		$mensajes = new MensajesController();
		$mensajes -> registroMensajesController();

		?>
						

	</div>

</footer>
