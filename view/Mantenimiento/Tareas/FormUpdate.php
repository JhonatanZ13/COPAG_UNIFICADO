<?php

foreach ($Tareas as $Tar) {

?>

    <div class="clearfix"></div>
    <div class="x_title">
        <h2>Editar Tareas</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form id="FormConfirmacionUpdate" action="<?php echo getUrl("Mantenimiento", "Tareas", "UpdateForm"); ?>" method="POST" onsubmit="return validarCamposVaciosMantoTU();">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="xc_color">Datos principales</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="row justify-content-start" id="fechas">
                    <div class="col-md-6 caja">
                        <label for="nombreTecnico">Nombre de la Tarea *</label>
                        <input id="tareaN" type="text" name="Tar_nombre" value="<?php echo $Tar['Tar_nombre']; ?>" class="form-control">
                        <input type="hidden" name="Tar_id" value="<?php echo $Tar['Tar_id']; ?>">
                        <p id="tareaNP" class="form_input-error"><span class="fa fa-times-circle"></span> El nombre solo puede contener letras.</p>


                    </div>
                    <div class="col-md-6 caja">
                        <label for="nombreTecnico">Descripcion de la Tarea *</label>
                        <p><input id="tareaD" type="text" name="Tar_descripcion" value="<?php echo $Tar['Tar_descripcion']; ?>" class="form-control"></p>
                        <p id="tareaDP" class="form_input-error"><span class="fa fa-times-circle"></span> El nombre solo puede contener letras.</p>
                    </div>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="xc_color">Procesos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 checkbox-inline x_panel ">
                    <div class="checkbox  ">
                        <div class="col-md-12 ">
                            <label class="control-label ">Selecione Los procesos a los que pertenece la tarea</label>
                        </div>
                        <?php
                        foreach ($Procesos as $pro) {
                            $checked = "";
                            foreach ($Tareaproceso as $tp) {
                                if ($pro['Pro_id'] == $tp['Pro_id']) {
                                    $checked = "checked";
                                }
                            }
                        ?>
                            <div class="col-md-3">
                                <input type='checkbox' name='Procesos[]' value='<?= $pro['Pro_id'] ?>' <?php echo $checked; ?>>
                                <label for="checkbox1"><?= $pro['Pro_nombre'] ?></label>
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
                            $checked = "";
                            foreach ($Tareaherramienta as $th) {
                                if ($Her['Her_id'] == $th['Her_id']) {
                                    $checked = "checked";
                                }
                            }
                        ?>
                            <div class="col-md-3">
                                <input type='checkbox' name='Herramientas[]' value='<?= $Her['Her_id'] ?>' <?php echo $checked; ?>>
                                <label for="checkbox1"><?= $Her['Her_nombre'] ?></label>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>

            </div>
            <div class="mensaje_error" id="mensaje_formulario">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>
            <div class="row justify-content-end">
                <a class="btn btn-danger" href="<?php echo getUrl("Mantenimiento", "Tareas", "consult"); ?>">Regresar</a>
                <input type="submit" class="btn btn-success float-right" value="Editar Tarea">
            </div>
        </form>
    </div>
<?php
}
?>