<div class="clearfix"></div>
<div class="x_title">
    <h2>Gestion de Tareas</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <form name="FormConfirmacion" id="FormConfirmacion" action="<?php echo getUrl("Mantenimiento", "Tareas", "InsertForm"); ?>" method="POST" onsubmit="return validarCamposVaciosMantoTI();">
        <div class=" x_panel">
            <div class="x_title">
                <h2 class="xc_color">Datos principales</h2>
                <div class="clearfix"></div>
            </div>

            <div class="form-group" id="grupoTarean">
                <label for="Tar_nombre">Nombre de la Tarea</label>
                <div>
                    <input class="form-control" type="text" name="Tar_nombre" id="tareaN" placeholder="Lubricar">
                    <p id="tareaNP" class="form_input-error"><span class="fa fa-times-circle"></span> * El nombre solo puede contener letras.</p>
                </div>
            </div>

            <div class="form-group" id="grupoTaread">
                <label for="Tar_descripción">Descripcion de la tarea</label>
                <div>
                    <input class="form-control" type="text" name="Tar_descripcion" id="tareaD" placeholder="Lubricar">
                    <p id="tareaDP" class="form_input-error"><span class="fa fa-times-circle"></span> * La descripcion solo puede contener letras.</p>
                </div>
            </div>

        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Procesos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12 checkbox-inline x_panel ">
                <div class="checkbox">
                    <div class="col-md-12 ">
                        <label class="control-label">Selecione Los procesos a los que pertenece la tarea</label>
                    </div>
                    <?php
                    foreach ($Procesos as $pro) {
                    ?>
                        <div class="col-md-3 ">

                            <input type='checkbox' id="checkboxP" name='Procesos[]' value='<?= $pro['Pro_id'] ?>'>
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
                    ?>
                        <div class="col-md-3 justify-content: space-around">
                            <input type='checkbox' id="checkboxH" name='Herramientas[]' value='<?= $Her['Her_id'] ?>'>
                            <label for="checkbox2"><?= $Her['Her_nombre'] ?></label>
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
            <input type="submit" class="btn btn-success float-right" value="Registrar Tarea">
        </div>
    </form>
</div>