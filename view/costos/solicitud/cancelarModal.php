<form action="<?php echo getUrl("costos","solicitud","modalCancelarPost"); ?>" method="post" class="m-auto">
    <div class="modal-body">
    <p>¿Desea cancelar la solicitud de cotización <b>No° <?php echo $Ped_id; ?></b>?</p>
            <input value="<?php echo $Ped_id;?>" type="hidden" name="Ped_id">
        <textarea class="form-control" name="Ped_motivo" id="" cols="3" rows="3" placeholder="Escriba el motivo de cancelación..." required ></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <button type="submit" class="btn btn-danger">Si</button>
    </div>
</form>