<!-- Titulo de la modadal -->
<div class="modal-body">
  <!-- Cuerpo de la modal -->
  <div class="cointainer-fluid" id="contenedor">
    <div class="row">
      <!-- Hola soy el body aqui el contenido -->
      <h5 class="ml-3">A continuacion podra generar el PDF del control de stock</h5>
      <!-- /body -->

      <!-- Botones cerar -->
      <div class="modal-footer col-md-12">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <a target="_blank" href="<?php echo getUrl("Reportes", "Reportes", "postControl", false, "ajax"); ?>"> <button type="buttom" class="btn btn-success"><i class="fa fa-download"></i> Generar PDF</button></a>
      </div>

    </div>
  </div>
</div>