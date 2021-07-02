<!-- <div class="x_content">
    <div class="row">
        <div class="x_panel col-md-4 text-center">
            <img src="images/logo_sena.png" alt="LogoSena" width="90px"><br>
            <h4>Regional Valle del Cauca</h4>
            <h4>Centro de diseño tecnologico industrial</h4>
        </div>
        <div class="x_panel col-md-5 text-center">
            <h2>Orden de mantenimiento</h2>
            <h2>Unidad productiva artes graficas</h2> 
        </div>
        <div class="x_panel col-md-3 text-right">
            <b>Codigo de orden:</b><br>
            <b>Fecha:</b><br>
        </div>
    </div>
</div> -->

<?php
if (($_SESSION['rolUser'] != 'Aprendiz')) {
?>

<div class="clearfix"></div>
<div class="x_title">
    <h2>Orden de mantenimiento</h2>
    <div class="clearfix"></div>
</div>
<div class="#contenedor_arriba x_content">
    <form id="AlertInsertOrden" action="<?php echo getUrl("Mantenimiento", "orden", "postInsert"); ?>" method="POST" onsubmit="return validarCamposVaciosMantoOI();" enctype="multipart/form-data">
        <div class="contenedor_de_datos x_panel">
            <div class="x_title">
                <h2 class="xc_color">Datos principales</h2>
                <div class="clearfix"></div>
            </div>
            <div class="row justify-content-end" id="fechas">
                <div class="col-md-3 caja">
                    <label for="date">Fecha de Inicio</label>
                    <input style="margin-bottom: 5px;" class="form-control" type="date" id="fechaI" name="Odm_fechaInicio">
                    <p id="fechaIP" class="form_input-error"><span class="fa fa-times-circle"></span> Seleccione la fecha inicio.</p>
                    <p id="fechaDIP" class="form_input-error"><span class="fa fa-times-circle"></span> La fecha inicial no puede ser mayor a la final.</p>
                </div>
                <div class="col-md-3 caja">
                    <label for="date">Fecha de Fin</label>
                    <input style="margin-bottom: 5px;" class=" form-control" type="date" id="fechaF" name="Odm_fechaFin">
                    <p id="fechaFP" class="form_input-error"><span class="fa fa-times-circle"></span> Seleccione la fecha de fin.</p>
                    <p id="fechaDFP" class="form_input-error"><span class="fa fa-times-circle"></span> La fecha final no puede ser menor a la inicial.</p>
                </div>
            </div>
            <div class="row justify-content-start" id="nombres">
                <div class="col-md-6 caja">
                    <label>Nombre del encargado *</label>
                    <select style="margin-bottom: 5px;" id="encargado" name="Usu_id" class="form-control">
                        <option value="">Seleccionar encargado</option>
                        <?php
                        foreach ($Usuario as $usu) {
                        ?>

                            <option value='<?= $usu['Usu_id'] ?>'>
                                <?= $usu['Usu_primerNombre'] . '  ' . $usu['Usu_segundoNombre'] . '  ' . $usu['Usu_primerApellido'] . ' ' . $usu['Usu_segundoApellido'] . '' ?>
                            </option>;

                        <?php
                        }
                        ?>
                    </select>
                    <p id="encargadoP" class="form_input-error"><span class="fa fa-times-circle"></span> Selecciona un encargado.</p>
                </div>
                <div class=" selector col-md-4 caja">
                    <label>Tipo de mantenimiento</label>
                    <select style="margin-bottom: 5px;" id="tipomantenimiento" name="Stg_id" class="form-control">
                        <option value="">Seleccionar el mantenimiento</option>
                        <?php
                        foreach ($Manto as $Man) {
                        ?>
                            <option value='<?= $Man['Stg_id'] ?>'><?= $Man['Stg_nombre'] ?></option>;

                        <?php
                        }
                        ?>
                    </select>
                    <p id="tipomantenimientoP" class="form_input-error"><span class="fa fa-times-circle"></span> Selecciona un tipo de manenimiento.</p>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-md-6 caja">
                    <label for="smaquina">Maquina</label>
                    <select style="margin-bottom: 5px;" id="maquina" name="Maq_id" class="form-control">
                        <option selected value="">Seleccione la maquina</option>
                        <?php
                        foreach ($Maquina as $Maq) {
                        ?>
                            <option value='<?= $Maq['Maq_id'] ?>'><?= $Maq['Maq_nombre'] ?></option>;

                        <?php
                        }
                        ?>
                    </select>
                    <p id="maquinaP" class="form_input-error"><span class="fa fa-times-circle"></span> Selecciona una maquina.</p>
                </div>
                <div class="col-md-4 caja">
                    <label for="nombreTecnico">Nombre del tecnico *</label>
                    <input id="tecnico" class="form-control" style="margin-bottom: 5px;" type="text" name="Odm_tecnico" placeholder="..." aria-describedby="equipamento">
                    <p id="tecnicoP" class="form_input-error"><span class="fa fa-times-circle"></span> El nombre solo puede contener letras y no puede estar vacio.</p>
                    <small id="equipamento" class="form-text text-muted">* Recuerde verificar la debida equipacion del
                        tecnico</small>
                </div>
                <div class="empresa_desactivada col-md-6 caja" style="display:none;">
                    <label for="nombreTecnico">Nombre de la Empresa *</label>
                    <select style="margin-bottom: 5px;" id="empresa" name="Emp_id" class="empresa_elegida form-control">
                        <option selected value="">Seleccione la Empresa</option>
                        <?php
                        foreach ($Empresa as $Emp) {
                        ?>
                            <option value='<?= $Emp['Emp_id'] ?>'><?= $Emp['Emp_razonSocial'] ?></option>;

                        <?php
                        }
                        ?>

                    </select>
                    <p id="empresaP" class="form_input-error"><span class="fa fa-times-circle"></span> Selecciona una empresa.</p>

                </div>
                <div class="empresa_desactivada col-md-6 caja" style="display:none;">
                    <label>PDF*</label><br>
                    <input id="pdf" class="limpiarinput" type="file" name="Odm_pdf">
                </div>

            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Analisis</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12">
                <label class="control-label">Observacion incial *</label>
                <textarea id="observacionI" class="form-control" name="Odm_observaciones" rows="3" placeholder="Maquina en estado..." style=" margin-top: 0px; margin-bottom: 5px; height: 90px; resize: none;"></textarea>
                <div>
                    <p id="observacionIP" class="form_input-error"><span class="fa fa-times-circle"></span> La observacion no puede estar vacia.</p>
                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Procedimiento</h2>
                <div class="clearfix"></div>
            </div>
            <div class="row justify-content-end" id="horas">
                <div class="col-md-3 caja">
                    <label>Hora de inicio</label>
                    <input style="margin-bottom: 5px;" id="horaI" type="time" name="Odm_horainicio" class="form-control">
                    <p id="horaIP" class="form_input-error"><span class="fa fa-times-circle"></span> Seleccione la hora de inicio.</p>
                </div>
                <div class="col-md-3 caja">
                    <label>Hora de fin</label>
                    <input style="margin-bottom: 5px;" id="horaF" type="time" name="Odm_horaFin" class="form-control">
                    <p id="horaFP" class="form_input-error"><span class="fa fa-times-circle"></span> Seleccione la hora de fin.</p>
                </div>
            </div>
            <!--------tareas------------------->
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="xc_color">Tareas</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="checkbox">
                    <div class="col-md-12 ">
                        <label class="control-label">Selecione Las tareas que realizara</label>
                    </div>
                    <?php
                    foreach ($tareas as $tar) {
                    ?>
                        <div class="col-md-2 ">

                            <input id="tareas" data-url="<?php echo getUrl("Mantenimiento", "orden", "procesosdinamicos", false, "ajax") ?>" data-url2="<?php echo getUrl("Mantenimiento", "orden", "herramientasdinamicas", false, "ajax") ?>" class="tareasbox" type='checkbox' name='Tar_id[]' value='<?= $tar['Tar_id'] ?>'>
                            <label for="checkbox1"><?= $tar['Tar_nombre'] ?></label>

                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
            <!---PROCESOS-->

            <div class="x_panel procesos">
                <div class="x_title">
                    <h2 class="xc_color">Procesos</h2>
                    <div class="clearfix"></div>
                </div>
                <label class="control-label">Procesos selecionados</label>

                <div id="procesoscontenedor" style="">




                </div>



            </div>


            <!---herramientassssssssssssssssssssssssss---->
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="xc_color">Herramientas</h2>
                    <div class="clearfix"></div>
                </div>
                <label class="control-label">Herramientas selecionadas</label>

                <div id="herramientascontenedor">

                </div>

            </div>
            <!--ARTICULOSSSSSSSSSSSSSSSSSSSSSS-->
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="xc_color">Articulos</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="checkbox ">
                    <div class="col-md-12 ">
                        <label class="control-label">Selecione Los Articulos que Utilizara</label>
                    </div>
                    <?php
                    foreach ($Articulo as $arti) {
                    ?>
                        <div class="col-md-3 ">

                            <input id="articulos" type='checkbox' name='Arti_id[]' value='<?= $arti['Arti_id'] ?>'>
                            <label for="checkbox1"><?= $arti['Arti_nombre'] ?></label>

                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>

        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2 class="xc_color">Desarrollo</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12">
                <label class="control-label">Observacion final *</label>
                <textarea id="observacionF" class="form-control" name="Odm_observacionesFin" rows="3" placeholder="Se le elaboró..." style=" margin-top: 0px; margin-bottom: 5px; height: 90px; resize: none;"></textarea>
                <div>
                    <p id="observacionFP" class="form_input-error"><span class="fa fa-times-circle"></span> La observacion no puede estar vacia.</p>
                </div>
            </div>
        </div>
        <div class="mensaje_error" id="mensaje_formulario">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
        </div>
        <div class="row justify-content-end">

            <input type="submit" class="btn btn-success float-right" value="Registrar">
            <a class="btn btn-danger" href="<?php echo getUrl("Mantenimiento", "Orden", "consult"); ?>">Cancelar</a>
        </div>
    </form>

</div>

<?php
} else {
    include_once '../view/partials/page404.php';
}
?> 