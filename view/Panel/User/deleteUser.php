<?php
  foreach($usuarios as $user){
?>
    <form action="<?php echo getUrl("PanelDeControl","User","postDelete")?>" method="post">
        <div class="modal-body">
            <?php
                if($user['Est_id']==1){
                    echo "<h3>¿Deseas inhabilitar el usuario <b>".$user['Usu_primerNombre'].' '.$user['Usu_primerApellido']."?<b/></h3>";
                }else {
                    echo "<h3>¿Deseas habilitar el usuario <b>".$user['Usu_primerNombre'].' '.$user['Usu_primerApellido']."?<b/></h3>";
                }
            ?>   

            <input type="hidden" name="Usu_id" value="<?php echo $user['Usu_id']?>">
            <input type="hidden" name="Est_id" value="<?php echo $user['Est_id']?>">
        </div>

        <div class="modal-footer">
            <button class="btn btn-success" type="submit" value="Enviar" name="Enviar">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
<?php 
  }
?>     
