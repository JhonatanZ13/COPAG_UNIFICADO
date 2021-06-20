<?php
    foreach($empresa as $emp){
?>
<form action="<?php echo getUrl("PanelDeControl","Company","postDelete");?>" method="post">
    <div class="modal-body">
        <?php
            if($emp['Est_id']==1){
                echo "<h3>¿Deseas Inactivar la empresa <b>".$emp['Emp_razonSocial']."</b>?</h3>";
            } else {
                echo "<h3>¿Deseas Activar la empresa <b>".$emp['Emp_razonSocial']."</b>?</h3>";
            }
        ?>

        <input type="hidden" name="Est_id" value=<?php echo $emp['Est_id'];?>>
        <input type="hidden" name="Emp_id" value="<?php echo $emp['Emp_id']; ?>">
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
</form>

<?php
    }
?>