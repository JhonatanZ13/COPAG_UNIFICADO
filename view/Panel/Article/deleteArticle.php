<?php
  foreach($articulo as $art){
?>
    <form action="<?php echo getUrl("PanelDeControl","Article","postDelete")?>" method="post">
        <div class="modal-body">
            <?php
                if($art['Est_id']==1){
                    echo "<h3>¿Deseas inhabilitar el Articulo <b>".$art['Arti_nombre']."?<b/></h3>";
                }else {
                    echo "<h3>¿Deseas habilitar el Articulo <b>".$art['Arti_nombre']."?<b/></h3>";
                }
            ?>   

            <input type="hidden" name="Arti_id" value="<?php echo $art['Arti_id']?>">
            <input type="hidden" name="Est_id" value="<?php echo $art['Est_id']?>">
        </div>

        <div class="modal-footer">
            <button class="btn btn-success" type="submit" value="Enviar" name="Enviar">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
<?php 
  }
?>     
