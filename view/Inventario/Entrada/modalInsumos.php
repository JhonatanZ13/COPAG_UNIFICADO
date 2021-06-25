<form action="<?php echo getUrl("Entrada","Entrada","postInsumos"); ?>" method="post">
<!-- Titulo de la modadal -->
<h5 id="title">Insumos</h5>

<div class="modal-body">
  <!-- Cuerpo de la modal -->
  <div class="cointainer-fluid" id="contenedor">
    <div class="row">


      <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label>Tipo:</label><br>
        <input type="text" value="Insumos" class="form-control" readonly>
      </div>

      <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <label>Nombre articulo:</label>
        <select name="Arti_id" class="form-control">
          <option value="0">Seleccione..</option>
          <?php foreach ($articulos as $arti) {
              echo "<option value='" .
                  $arti["Arti_id"] .
                  "'>" .
                  $arti["Arti_nombre"] .
                  "</option>";
          } ?>
        </select>     
      </div>

      <div class="form-group col-lg-12 col-md-12 col-sm-12">  
        <label>Cantidad</label>
        <input type="number" name="Arti_cantidad" class="form-control" value="1">
      </div>
    </div>
      
      <!-- Bbotones cerar -->
    <div class="modal-footer" >
      <div class="float-right">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>

  </div>
</div>
</form>