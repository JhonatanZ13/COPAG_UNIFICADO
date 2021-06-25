<div class="clearfix"></div>
<div class="x_title">
    <h2>Gestion de Tareas</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <form id="FormConfirmacion" action="<?php echo getUrl("Mantenimiento", "Tareas", "InsertForm"); ?>" method="POST">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Datos principales</h2>
                <div class="clearfix"></div>
            </div>
            <div class="row justify-content-start" id="fechas">
                <div class="col-md-6 caja">
                    <label for="nombreTecnico">Nombre de la Tarea *</label>
                    <input class="form-control" type="text" name="Tar_nombre" placeholder="Ej: Lubricar">
                    <input type="hidden" name="Tar_id">
                    <input type="hidden" name="Pro_id">

                </div>
                <div class="col-md-6 caja">
                    <label for="nombreTecnico">Descripcion de la Tarea*</label>
                    <input class="form-control" type="text" maxlength="256" name="Tar_descripcion" placeholder="...">

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
                        <label class="control-label">Selecione Los procesos a los que pertenece la tarea</label>
                    </div>
                    <?php 
                       foreach ($Procesos as $pro) {    
                    ?>
                    <div class="col-md-2 "  >

                        <input type='checkbox' name='Procesos[]' value='<?=$pro['Pro_id']?>'>
                        <label for="checkbox1"><?=$pro['Pro_nombre']?></label>

                    </div>
                   <?php 
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

                        <label class="control-label">Selecione Las Herramientas para la tarea </label>
                    </div>
                    <?php 
                       foreach ($Herra as $Her) {    
                    
                       ?>
                    <div class="col-md-2 justify-content: space-around">
                        <input type='checkbox' name='Herramientas[]' value='<?=$Her['Her_id']?>'>
                        <label for="checkbox2"><?=$Her['Her_nombre']?></label>
                    </div>


                    <?php 
                       } 
                ?>



                </div>
            </div>

        </div>
        <div class="row justify-content-end">
            <a class="btn btn-danger" href="<?php echo getUrl("Mantenimiento", "Tareas", "consult"); ?>">Regresar</a>
            <input type="submit" class="btn btn-success float-right" value="Registrar Tarea">
        </div>
    </form>
</div>