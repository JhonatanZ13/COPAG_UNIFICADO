
  <!-- Titulo de la modadal -->
  <h5 id="title">Reporte Control De Stock</h5>

  <div class="modal-body">
    <!-- Cuerpo de la modal -->
    <div class="cointainer-fluid" id="contenedor">
      <div class="row">
        <!-- Hola soy el body aqui el contenido -->


        <!-- /body -->
        <!-- Botones cerar -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          <a href="<?php echo getUrl("Reportes", "Reportes", "postControl",false,"ajax"); ?>"> <button type="buttom" class="btn btn-success"><i class="fa fa-download"></i> Generar PDF</button></a>
        </div>

      </div>
    </div>

