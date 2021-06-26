<?php
$datos = $_POST['datos'];
foreach ($procesos as $pro) {
?>
    <div class="modal-content">
        <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php //echo $datos; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->

        <form id="AlertModalUpdateProceso" class="" action="<?php echo getUrl("Mantenimiento", "Procesos", "UpdateModal"); ?>" method="post" class="mx-5">

            <div class="modal-body">
                <div class="col-md-12 form-group">
                    <label>Nombre del Proceso</label>
                    <input type="hidden" name="Pro_id" value="<?php echo $pro['Pro_id'] ?>">
                    <input type="text" name="Pro_nombre" value="<?php echo $pro['Pro_nombre']; ?>" class="form-control" placeholder="Ej:Lubricar">
                </div>
                <div class="col-md-12 form-group">
                    <label>Descripcion del proceso</label>
                    <input type="text" name="Pro_descripcion" value="<?php echo $pro['Pro_descripcion']; ?>" class="form-control" placeholder="Ej:Lubricar">
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

                <input type="submit" class="btn btn-success float-right" value="Editar Proceso">
            </div>



        </form>
    </div>    
    <?php
}
    ?>