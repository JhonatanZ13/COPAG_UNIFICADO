<form action="<?php echo getUrl("Reportes", "Reportes", "RegistroActividad",false,"ajax")?>" method="POST" target="_blank">

  <div class="modal-body">
    <!-- Cuerpo de la modal -->
    <div class="cointainer-fluid" id="contenedor">
      <div class="row">

        <!-- Hola soy el body aqui el contenido -->
          <div class="form-group">
            <h5><b>Filtre los registros por fecha a continuación: </b></h5><br>
            <label for="fecha_inicial"><b>Fecha inicial:</b></label>
            <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial"
              min="2020-01-01">
            <br><label for="fecha_final"><b>Fecha final:</b></label>
            <input type="date" class="form-control" id="fecha_final" name="fecha_final"
            min="2020-01-01">
          </div>
        <!-- /body -->

        <!-- Botones cerar -->
      </div>

      <div class="modal-footer">
        <button type="buttom" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Generar PDF</button>
      </div>
    </div>
    </div>
  </div>
</form>