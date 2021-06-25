<?php
$datos = $_POST['datos'];
foreach ($procesos as $pro) {
?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $datos; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="" action="<?php echo getUrl("Mantenimiento", "Procesos", "DeleteModal"); ?>" method="post" class="mx-5">

            <div class="modal-body">
                <div class="col-md-12 form-group">
                    <label>¿Deseas eliminar el proceso '<?php echo $pro['Pro_nombre'] ?>'?</label>
                    <input type="hidden" name="pro_id" value="<?= $pro['Pro_id']; ?>">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>

                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>


        </form>
    <?php
}
    ?>