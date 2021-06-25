<?php
$datos = $_POST['datos'];
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $datos; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form  id="AlertModalProceso" class="" action="<?php echo getUrl("Mantenimiento", "Procesos", "InsertModal"); ?>" method="post" class="mx-5">

        <div class="modal-body">
            <div class="col-md-12 form-group">
                <label>Nombre del proceso</label>
                <input type="text" name="Pro_nombre" class="form-control" placeholder="Ej: Mecanico">
            </div>
            <div class="col-md-12 form-group">
                <label>Descripcion del proceso</label>
                <input type="text" size="60" maxlength="256" name="Pro_descripcion" class="form-control" placeholder="Ej: Proceso Mecanico">

            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

            <input type="submit" class="btn btn-success float-right" value="Registrar Proceso">
        </div>


    </form>


</div>