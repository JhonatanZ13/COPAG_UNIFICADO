<div class="jumbotron text-center mb-0">
    <h1>RESTAR ARTÍCULOS</h1>
</div>
<form action="<?php echo getUrl("Salida", "Salida", "postSalidaMasiva"); ?>" method="post">
    <!-- el siguiente div es el que le quiero agrega al agreagar -->
    <div id="conten">

        <div class="shadow card bg-light text-success mb-3 mt-3 pb-3">
            <div class="form-group col-sm-12">
                <label for="tipo">Nombre articulo:</label>
                <select name="tipo" id="tipo" class="form-control" autofocus data-url="<?= getUrl("Salida", "Salida", "SelectEntrada", false, "ajax") ?>">
                    <option value="0">Seleccione..</option>
                    <?php foreach ($tipos as $tp) {
                        echo "<option value='" . $tp["Tart_id"] . "'>" . $tp["Tart_descripcion"] . "</option>";
                    } ?>
                </select> 
            </div>

            <div class="form-group col-sm-12">
                <label for="Articulos">Nombre articulo:</label>
                <select name="Arti_id[]" id="Articulos" class="form-control" data-url="<?= getUrl("Salida", "Salida", "cantidad", false, "ajax") ?>">
                    <option value="0">Seleccione..</option>
                </select>
            </div>
            <div id="contieneInput" class="form-group col-sm-12">
                    
            </div>
            <div id="noHay"class="alert alert-danger d-none" role="alert">
                <strong>ups!</strong> no hay suficiente stock de ese articulo para tal cantidad
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end x_panel">
        <button id="agregarDiv" type="button" class="btn btn-primary justify-content-end">
        <i class="fa fa-plus"></i>
        </button>
    </div>

    <div class="x_title"></div>
    <div class="x_panel">
        <button type="submit" disabled name="enviar" id="send" class="btn btn-success btn-lg btn-block">
            DAR SALIDA
        </button>
    </div>
</form>