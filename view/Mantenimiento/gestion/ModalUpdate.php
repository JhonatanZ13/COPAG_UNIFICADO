<?php
$datos = $_POST['datos'];
foreach ($maquina as $maq) {
?>
    <div class="modal-content">
    <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php //echo $datos; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->
        <form id="AlertUpdateEstado" action="<?php echo getUrl("Mantenimiento", "gestion", "ModalUpdateEstado", false, "ajax"); ?>" method="post">
            <div class="col-md-12 form-group">
                <label>Nombre de la maquina</label>
                <input type="hidden" name="Maq_id" value="<?php echo $maq['Maq_id'] ?>" class="form-control">
                <input type="text" readonly name="Maq_nombre" value="<?php echo $maq['Maq_nombre']; ?>" class="form-control">

            </div>
            <div class="col-md-12 form-group">
                <label>Actualizar Estado</label>
                <select name="Est_id" class="form-control">
                    <option value="0">Seleccione el Estado de la maquina</option>

                    <?php foreach ($estado as $est) { ?>

                        <option value='<?= $est['Est_id'] ?>'><?= $est['Est_nombre'] ?></option>

                    <?php } ?>

                </select><br>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-success float-right" value="Editar Estado">
                <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
            </div>

        </form>
        <div>

        <?php
    }
        ?>