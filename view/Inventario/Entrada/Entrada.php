<div class="x_title">
  <h2>Entrada de Bodega</small></h2>
  <div class="clearfix"></div>
</div>

<!-- cartas de Ingreso -->
<div class="row mt-3 mb-3 mr-3">

  <!-- carta para Entrada Masiva -->
  <div class="cartica border border-success col-lg col-md-5 col-sm-12 col-xs-12 ml-3 mb-3">
    <div class="text-center">
      <h3 class="text-success">Entrada masiva</h3>
      <img src="images/caja.png" class="img-fluid">

      <button type="button" class="btn m-0" title="Agregar a Articulos">
        <a href="<?php echo getUrl("Entrada", "Entrada", "entradaMasiva"); ?>"><i class="fa fa-plus-circle fa-4x text-success">
          </i></a>
      </button>
    </div>
  </div>
  <!-- /carta para Entrada Masiva -->

  <!-- carta para Materia prima -->
  <div class="cartica border border-success col-lg col-md-5 col-sm-12 col-xs-12 ml-3 mb-3">
    <div class="text-center">
      <h3 class="text-success">Materia Prima</h3>
      <img src="images/papel.png" class="img-fluid">

      <button type="button" class="btn m-0" title="Agregar a materia prima">
        <i class="fa fa-plus-circle fa-4x text-success botonModal" data-url="<?php echo getUrl("Entrada", "Entrada", "modalMateriaPrima", false, "ajax"); ?>">
        </i>
      </button>
    </div>
  </div>
  <!-- carta para Materia prima -->

  <!-- carta para Insumos -->
  <div class="cartica border border-success col-lg col-md-5 col-sm-12 col-xs-12 ml-3 mb-3">
    <div class="text-center">
      <h3 class="text-success">Insumos</h3>
      <img src="images/insumos.png" class="img-fluid">

      <button type="button" class="btn m-0" title="Agregar a insumos">
        <i class="fa fa-plus-circle fa-4x text-success botonModal" data-url="<?php echo getUrl("Entrada", "Entrada", "modalInsumos", false, "ajax"); ?>">
        </i>
      </button>
    </div>

  </div>
  <!-- carta para Insumos -->

  <!-- carta para Herramientas -->
  <div class="cartica border border-success col-lg col-md-5 col-sm-12 col-xs-12 ml-3 mb-3">
    <div class="text-center">
      <h3 class="text-success">Herramientas</h3>
      <img src="images/herramientas.png" class="img-fluid">

      <button type="button" class="btn m-0" title="Agregar a herramientas">
        <i class="fa fa-plus-circle fa-4x text-success botonModal" data-url="<?php echo getUrl("Entrada", "Entrada", "modalHerramientas", false, "ajax"); ?>">
        </i>
      </button>
    </div>
  </div>
  <!--/carta para Herramientas -->

</div>