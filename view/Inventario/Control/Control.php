<!-- Visualizacion del inventario de artes graficas -->
<div class="x_title">
  <h2>Control De Stock</small></h2>
  <ul class="nav navbar-right panel_toolbox">
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">
  <div class="row">
    <!-- tabla de visualizacion de datos -->
      <div class="table-responsive">
        <table class="table table-responsive table-bordered table-hover" id="table">
          <thead>
            <tr class="even pointer">
              <th class="column-title">ID</th>
              <th class="column-title">Nombre</th>
              <th class="column-title">Tipo articulo</th>
              <!-- <th class="column-title">Medida</th>
              <th class="column-title">Tipo medida</th> -->
              <th class="column-title">Descripcion</th>
              <th class="column-title">Cantidad</th>
            </tr>
          </thead>

          <tbody>
            <?php
            foreach ($Control as $con) {
              echo "<tr>";
              echo "<td>" . $con['Arti_id'] . "</td>";
              echo "<td>" . $con['Arti_nombre'] . "</td>";
              echo "<td>" . $con['Tart_descripcion'] . "</td>";
              /* echo "<td>" . $con['Arti_medida'] . "</td>";
              echo "<td>" . $con['Med_descripcion'] . "</td>"; */
              echo "<td>" . $con['Arti_descripcion'] . "</td>";
              echo "<td>" . $con['Arti_cantidad'] . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    <!-- /tabla de visualizacion de datos -->
  </div>
</div>