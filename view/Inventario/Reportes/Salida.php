<form action="<?php echo getUrl("Entrada", "Entrada", "postMateriaPrima"); ?>" method="post">
  <!-- Titulo de la modadal -->
  <h5 id="title">Reporte Salida De Bodega</h5>


  <div class="modal-body">
    <!-- Cuerpo de la modal -->
    <div class="cointainer-fluid" id="contenedor">
      <div class="row">
        <!-- Hola soy el body aqui el contenido -->


        <!-- /body -->

        <!-- Botones cerar -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Generar PDF</button>
        </div>

      </div>
    </div>
</form>