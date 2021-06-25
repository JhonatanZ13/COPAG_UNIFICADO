<div class="jumbotron text-center">
    <h1>AGREGAR ARTÍCULOS</h1>
</div>
<form action="<?php echo getUrl("Entrada", "Entrada", "postentradaMasiva"); ?>" method="post">
    <!-- div cartas entrada artículos -->
    <div id="conten">
        <div class="shadow card bg-light text-success mb-3 pb-3">
            <div class="form-group col-sm-12 mt-3">
                <label for="tipo">Tipo articulo:</label>
                <select name="tipo" id="tipo" class="form-control" au data-url="<?= getUrl("Entrada", "Entrada", "SelectEntrada", false, "ajax") ?>">
                    <option value="0">Seleccione..</option>
                    <?php foreach ($tipos as $tp) {
                        echo "<option value='" . $tp["Tart_id"] . "'>" . $tp["Tart_descripcion"] . "</option>";
                    } ?>
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
                <input type="number" id="Arti_cantidad" name="Arti_cantidad[]" class="form-control" min="0" value="0">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button id="agregarDiv" type="button" class="btn btn-success justify-content-end">
            <i class="fa fa-chevron-circle-down"></i>
            MAS
        </button>
    </div>

    <div class="x_title"></div>
    <button type="submit" disabled name="enviar" id="send" class="btn btn-primary btn-lg btn-block">
        <i class="fa fa-plus-circle fa-lg mr-1"></i>
        AGREAGAR
    </button>
</form>