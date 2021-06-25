<!-- Visualizacion del inventario de artes graficas -->
<div class="x_title">
  <h2>Salida De Bodega</small></h2>
  <div class="float-right">
    <a href="<?php echo getUrl("Salida","Salida","getSalidaMasiva") ?>">
      <button type="button" class="btn btn-success">Salida masiva</button>
    </a>
  </div>
  <div class="nav navbar-right panel_toolbox"></div>
  <div class="clearfix"></div>
</div>
<div class="x_content">
  <div class="row">

    <!-- Tabla salida de bodega -->
    <div class="table-responsive">
      <table class="table table-responsive table-bordered table-hover" id="table">
        <thead>
          <tr class="even pointer">
            <th class="column-title">ID</th>
            <th class="column-title">Nombre</th>
            <th class="column-title">Tipo articulo</th>
            <th class="column-title">Medida</th>
            <th class="column-title">Tipo medida</th>
            <th class="column-title">Descripcion</th>
            <th class="column-title">Cantidad</th>
            <th class="column-title">Dar salida</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($salida as $sal) {
            echo "<tr>";
            echo "<td>" . $sal['Arti_id'] . "</td>";
            echo "<td>" . $sal['Arti_nombre'] . "</td>";
            echo "<td>" . $sal['Tart_descripcion'] . "</td>";
            echo "<td>" . $sal['Arti_medida'] . "</td>";
            echo "<td>" . $sal['Med_id'] . "</td>";
            echo "<td>" . $sal['Arti_descripcion'] . "</td>";
            echo "<td>" . $sal['Arti_cantidad'] . "</td>";
            echo "<td><center><i title='Disminuir' class='mt-2 fa fa-minus-circle fa-2x text-success botonModal' data-id='" . $sal['Arti_id'] . "' data-url=" . getUrl("Salida", "Salida", "modalSalida", false, "ajax") . "></i></center></td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- /tabla salida bodega -->
  </div>
</div>