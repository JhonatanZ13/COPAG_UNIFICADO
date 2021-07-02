<?php
$datos = $_POST['datos'];
foreach ($Tareas as $Tar) {
?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $datos; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="" action="<?php echo getUrl("Mantenimiento", "Tareas", "DeleteModal"); ?>" method="post" class="mx-5">

            <div class="modal-body">
                <div class="col-md-12 form-group">
                <input type="hidden" name="Tar_id" value="<?php echo $Tar['Tar_id'] ?>">
                <input type="hidden"  name="Tpr_id" value ="<?php echo $Tar['Tpr_id']?>">
               <label>Deseas eliminar todo de la tarea "<?=$Tar['Tar_nombre']?>"   </label>
            </div>
               
            
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>


        </form>
    </div>
<?php
}
?>