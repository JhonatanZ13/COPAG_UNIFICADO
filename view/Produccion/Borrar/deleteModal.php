<form action="<?php echo getUrl("Produccion", "Produccion", "postDelete"); ?>" method="POST" enctype="multipart/form-data">
    <div class="modal-body col-md-8">
        
        <?php
            foreach ($ordenproduccion as $ordpro) {
        ?>
            <input type="hidden" name="Odp_id" value="<?php echo $ordpro['Odp_id']; ?> ">
            <label for="Opd_id">ID Orden de Produccion</label>
            <input type="text" disabled name="Odp_id" class="form-control" value="<?php echo $ordpro['Odp_id']; ?>">
        <?php } ?>
    </div>
    <br><br><br><br><br><br>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="¿Esta seguro que desea eliminar esta orden de producción?">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    </div>
</form>