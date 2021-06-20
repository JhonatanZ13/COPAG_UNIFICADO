<?php
    foreach($maquinas as $maq){
?>
<form action="<?php echo getUrl("PanelDeControl","Machine","postDelete");?>" method="post">
    <div class="modal-body">
        <?php
            if($maq['Est_id']==1){
                echo "<h3>¿Deseas Inactivar la Maquina <b>".$maq['Maq_nombre']."</b>?</h3>";
            } else {
                echo "<h3>¿Deseas Activar la Maquina <b>".$maq['Maq_nombre']."</b>?</h3>";
            }
        ?>

        <input type="hidden" name="Est_id" value=<?php echo $maq['Est_id'];?>>
        <input type="hidden" name="Maq_id" value="<?php echo $maq['Maq_id']; ?>">
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
</form>

<?php
    }
?> 