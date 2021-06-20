<?php
  foreach($tools as $tool){
?>
    <form action="<?php echo getUrl("PanelDeControl","Tool","postDelete")?>" method="post">
        <div class="modal-body">
            <?php
                if($tool['Est_id']==1){
                    echo "<h3>¿Deseas inhabilitar la Herramienta <b>".$tool['Her_nombre']."?<b/></h3>";
                }else {
                    echo "<h3>¿Deseas habilitar la Herramienta <b>".$tool['Her_nombre']."?<b/></h3>";
                }
            ?>   

            <input type="hidden" name="Her_id" value="<?= $tool['Her_id']; ?>">
            <input type="hidden" name="Est_id" value="<?= $tool['Est_id']; ?>">
        </div>

        <div class="modal-footer">
            <button class="btn btn-success" type="submit" value="Enviar" name="Enviar">Aceptar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
<?php 
  }
?>     
