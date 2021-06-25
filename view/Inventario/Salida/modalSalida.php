<form action="<?php echo getUrl("Salida", "Salida", "postSalida"); ?>" method="POST">
  <!-- Titulo de la modadal -->
   <h5 class="modal-title" id="title">Salida de Bodega</h5>

  <div class="modal-body">
    <!-- Cuerpo de la modal -->
    <div class="cointainer-fluid" id="contenedor">
      <div class="row">

        <div class="form-group col-lg-12 col-md-12 col-sm-12">
          <label>Nombre</label>
          <input type="hidden" name="Arti_id" value="<?php echo $id; ?>">
          <input class="form-control" name="Arti_nombre" value="<?php echo $nombre; ?>" readonly >
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12">
          <label>Cantidad</label>
          <input type="number" name="Arti_cantidad" class="form-control" value="1">
        </div>
      </div>

      <!-- Bbotones cerar -->
      <div class="row mt-4">
        <div class="float-right">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </div>

    </div>
  </div>
</form>