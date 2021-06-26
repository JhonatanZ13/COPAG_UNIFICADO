<?php

foreach ($Tareas as $Tar) {

?>

<div class="clearfix"></div>
<div class="x_title">
    <h2>Consultar Tareas</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <form action="<?php echo getUrl("Mantenimiento", "Tareas", "UpdateForm"); ?>" method="POST">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Datos principales</h2>
                <div class="clearfix"></div>
            </div>
            <div class="row justify-content-start" id="fechas">
                <div class="col-md-6 caja">
                    <label for="nombreTecnico">Nombre de la Tarea *</label>
                    <input readonly type="text" name="Tar_nombre" value="<?php echo $Tar['Tar_nombre']; ?>" class="form-control">
                    <input type="hidden" name="Tar_id" value="<?php echo $Tar['Tar_id'];?>">


                </div>
                <div class="col-md-6 caja">
                    <label for="nombreTecnico">Descripcion de la Tarea *</label>
                    <p><input readonly type="text" name="Tar_descripcion" value="<?php echo $Tar['Tar_descripcion']; ?>"
                            class="form-control"></p>

                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Procesos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12 checkbox-inline x_panel ">
                <div class="checkbox ">
                    <div class="col-md-12 ">
                        <label class="control-label">Estos son los procesos a los que pertenece la tarea </label>
                    </div>
                    <?php 
                       foreach ($Procesos as $pro) {    
                         foreach ($Tareaproceso as $tp){

                            if($pro['Pro_id']==$tp['Pro_id']){      
                    ?>
                    <div class="col-md-3">
                        <input disabled="" type='checkbox' name='Procesos[]' value='<?=$pro['Pro_id']?>' <?php echo "checked";?>>
                        <label for="checkbox1"><?=$pro['Pro_nombre']?></label>
                    </div>
                   

                    <?php

                       } 
                    }
                } 
                     ?>

                </div>
            </div>


        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Herramientas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12 checkbox-inline x_panel">
                <div class="checkbox">
                    <div class="col-md-12 ">

                        <label class="control-label">Estas son las Herramientas para las tareas </label>
                    </div>
                    <?php 
                       foreach ($Herra as $Her) {    
                        foreach ($Tareaherramienta as $th){

                            if($Her['Her_id']==$th['Her_id']){
                    
                       ?>
                    <div class="col-md-3 justify-content: space-around">
                        <input disabled="" type='checkbox' name='Herramientas[]' value='<?=$Her['Her_id']?>'<?php echo "checked";?>>
                        <label for="checkbox2"><?=$Her['Her_nombre']?></label>
                    </div>


                    <?php 
                       } 
                    }
                }
                ?>



                </div>
            </div>

        </div>
        <div class="row justify-content-end">
            <a class="btn btn-danger" href="<?php echo getUrl("Mantenimiento", "Tareas", "consult"); ?>">Regresar</a>
            
        </div>
    </form>
</div>
<?php
}
?>