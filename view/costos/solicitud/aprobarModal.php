<form action="<?php echo getUrl("costos","solicitud","modalAprobarPost"); ?>" method="post" class="m-auto">
    <div class="modal-body">
    <p>¿Desea aprobar la solicitud de cotización <b>No° <?php echo $Ped_id; ?></b>?</p>
    <input value="<?php echo $Ped_id;?>" type="hidden" name="Ped_id">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

        <button type="submit" class="btn btn-primary">Si</button>
    </div>
</form>