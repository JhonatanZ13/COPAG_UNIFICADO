<form action="<?php echo getUrl("costos","compras","postDelete"); ?>" method="post" class="m-auto" enctype="multipart/form-data">
    <div class="modal-body">
 
    <p>¿Desea eliminar la solicitud de compras<b>No° </b><?php echo $Soc_id; ?>?</p>
   <input type="hidden" name="Soc_id" value="<?php echo $Soc_id ?>">
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Si</button>
     
    </div>
</form>

