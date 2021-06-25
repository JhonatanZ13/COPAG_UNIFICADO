<form action="<?php echo getUrl("Reportes", "Reportes", "RegistroActividad",false,"ajax")?>" method="POST">
  <h5 id="title">Reporte Registro de actividades</h5>


  <div class="modal-body">
    <!-- Cuerpo de la modal -->
    <div class="cointainer-fluid" id="contenedor">
      <div class="row">

        <!-- Hola soy el body aqui el contenido -->
          <div class="form-group">
            <label><b>Filtre los registros por fecha a continuacion: </b></label><br>
            <label for="fecha_inicial">Fecha inicial:</label>
            <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial"
              min="2020-01-01">
            <label for="fecha_final">Fecha final:</label>
            <input type="date" class="form-control" id="fecha_final" name="fecha_final"
            min="2020-01-01">
          </div>
        <!-- /body -->

        <!-- Botones cerar -->
      </div>

      <div class="modal-footer">
        <button type="buttom" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-success" value="Generar PDF">
      </div>
    </div>
    </div>
  </div>
</form>