<div class="x_panel text-center">
    <h2 class="display-4">Agregar Articulos</h2>
</div>
<form action="<?php echo getUrl("Entrada", "Entrada", "postentradaMasiva"); ?>" method="post">
    <!-- div cartas entrada artículos -->
    <div id="conten">
        <div class="shadow card bg-light text-success mb-3 pb-3">
            <div class="form-group col-sm-12 mt-3">
                <label for="tipo">Tipo articulo:</label>
                <select name="tipo[]" id="tipo" class="form-control" au data-url="<?= getUrl("Entrada", "Entrada", "SelectEntrada", false, "ajax") ?>">
                    <option value="0">Seleccione..</option>
                    <option value="Materia Prima">Materia Prima </option>
                    <option value="Insumos">Insumos </option>
                    <option value="Maquina">Maquina </option>
                    <option value="Herramienta">Herramienta </option>
                </select>
            </div>

            <div class="form-group col-sm-12">
                <label for="Articulos">Nombre articulo:</label>
                <select name="Arti_id[]" id="Articulos" class="form-control">
                    <option value="0">Seleccione..</option>
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label for="Arti_cantidad">Cantidad</label>
                <input type="number" id="Arti_cantidad" name="Arti_cantidad[]" class="form-control" min="0" value="">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end x_panel">
        <button id="agregarDiv" type="button" class="btn btn-primary justify-content-end">
            <i class="fa fa-plus"></i>
        </button>
    </div>

    <div class="x_title"></div>
    
    <div class="x_panel" style="z-index: 100;">
        <button id="send" type="submit"  name="enviar"  class="btn btn-success btn-lg btn-block">
            AGREGAR
        </button>
    </div>
</form>