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
SUSCRIPTORES         
======================================-->

<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
 
 <div>

  <table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  
      <?php

      $suscriptores = new SuscriptoresController();
      $suscriptores -> mostrarSuscriptoresController();
      $suscriptores -> borrarSuscriptoresController();
      $suscriptores -> suscriptoresRevisadosController();

      ?>

    </tbody>
  </table>

  <!--a href="tcpdf/pdf/suscriptores.php" target="blank">
  <button class="btn btn-warning pull-right" style="margin:20px;">Imprimir Suscriptores</button>
  </a-->
  </div>

</div>

<!--====  Fin de SUSCRIPTORES  ====-->