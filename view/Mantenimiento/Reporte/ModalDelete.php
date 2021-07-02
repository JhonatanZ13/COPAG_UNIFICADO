<?php
$datos = $_POST['datos'];
foreach ($orden as $odm) {
?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $datos; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="" action="<?php echo getUrl("Mantenimiento", "Reporte", "DeleteModal"); ?>" method="POST" class="mx-5">

            <div class="modal-body">
                <div class="col-md-12 form-group">
                    <label>¿Deseas eliminar este reporte ?</label>
                    <input type="hidden" name="Odm_id" value="<?= $odm['Odm_id']; ?>">
                </div>
                <?php
                foreach ($ordendetalle as $odmde){

                  ?>  
                  <input type="hidden" name="Odmde_id" value="<?= $odmde['Odmde_id']; ?>">

                  <?php
                } 
              ?>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    <?php
}
    ?>