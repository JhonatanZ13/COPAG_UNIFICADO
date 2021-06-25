  <!-- Reportes de la bodega -->
  <h2>Reportes</small></h2>
  <div class="x_title">
  </div>
  <!-- reportes de bodega -->
  <div class="row mt-3 mr-3 mb-3 ml-3">

    <!-- Reporte Entrada bodega -->
    <div class="cartica botonModal col-sm mr-3 mb-3"  data-url="<?php echo getUrl("Reportes", "Reportes", "Entrada", false, "ajax"); ?>">
      <div class="text-center">
        <h3 class="text-success">Registros De Actividades</h3>
        <img class="img-fluid" src="../web/images/entrada.png">
      </div>
    </div>
    <!-- /Reporte Entrada bodega -->

    <!-- Reporte control de stock -->
    <div class="cartica botonModal col-sm mr-3 mb-3" data-url="<?php echo getUrl("Reportes", "Reportes", "Control", false, "ajax"); ?>">
      <div class="text-center">
        <h3 class="text-success">Control Stock</h3>
        <img class="img-fluid" src="../web/images/control.png">
      </div>
    </div>
    <!-- /Reporte control de stock -->
  </div>