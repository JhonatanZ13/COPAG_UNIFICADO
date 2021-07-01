<?php
if(($_SESSION['rolUser'] != 'Aprendiz')){
    foreach ($maquina as $maq) {
?>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Diligenciar debidamente los datos para poder Modificar <b><?php echo $maq['Maq_nombre'] ?></b> en nuestro sistema COPAG</h2> <br><br>
                    <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br />
                    <form id="actualziarMaquina" action="<?php echo getUrl("PanelDeControl", "Machine", "postUpdate") ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <input type="hidden" name="Maq_id" value="<?php echo $maq['Maq_id'] ?>" />
                        <input type="hidden" name="imagenVieja" value="<?php echo $maq['Maq_imagen']; ?>" />
                        <input type="hidden" name="fichaVieja" value="<?php echo $maq['Maq_fichaTecnica']; ?>" />
                        <input type="hidden" name="manualViejo" value="<?php echo $maq['Maq_manual']; ?>" />

                        <div class="col-md-6">
                            <div class="form-group has-feedback" id="grupo__nombreMaquina">
                                <label for="fullname">Nombre Maquina <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control formularioPanel__input" value="<?php echo $maq['Maq_nombre'] ?>" name="Maq_nombre" />
                                <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>
                            </div>

                            <div class="form-group has-feedback" id="grupo__tipoMaquina">
                                <label for="fullname">Tipo de maquina <b style="color: red;">*</b> </label>
                                <select name="Stg_id" class="form-control formularioPanel__input" required>
                                    <option value="<?php echo $maq['Stg_id'] ?>"><?php echo $maq['Stg_nombre'] ?></option>
                                    <?php
                                    foreach ($tmaquina as $tmaq) {
                                        if ($maq['Stg_id'] != $tmaq['Stg_id']) {
                                    ?>
                                            <option value='<?= $tmaq['Stg_id'] ?>'><?= $tmaq['Stg_nombre'] ?></option>;

                                    <?php }
                                    } ?>
                                </select>
                                <p class="formularioPanel__input-error">Tiene que seleccionar un tipo de maquina.</p>
                            </div>

                            <div class="form-group has-feedback" id="grupo__serial">
                                <label for="fullname">Serial <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control formularioPanel__input" value="<?php echo $maq['Maq_serial'] ?>" placeholder="Serial" name="Maq_serial" />
                                <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>
                            </div>

                            <div class="form-group has-feedback" id="grupo__descripcion">
                                <label for="fullname">Descripcion <b style="color: red;">* </b><small>(Maximo 50 caracteres)</small> </label>
                                <textarea style="max-height: 100px; min-height: 100px;" class="form-control formularioPanel__input" name="Maq_descripcion"><?php echo $maq['Maq_descripcion'] ?></textarea>
                                <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) , punto (.), coma(,) y guion bajo (_).</p>
                            </div>

                        </div>
                        
                        <div class="col-md-6 form-group has-feedback" id="grupo__ficha">
                            <label for="fullname">Ficha Tecnica</label><br>
                            <input class="formularioPanel__input" type="file" name="Maq_fichaTecnica" />
                            <p class="formularioPanel__input-error">El archivo tiene que ser un PDF.</p>
                            <br><br>

                        <?php if ($maq['Maq_fichaTecnica'] != "../web/images/Maquina/Ficha/") { ?>

                            <a href="<?php echo getUrl("PanelDeControl", "Machine", "viewPdfFicha", array("Maq_fichaTecnica" => $maq['Maq_fichaTecnica']), "ajax") ?>" target="blank">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-pdf-o"></i>&nbsp;Ver Ficha Tecnica
                                </button>
                            </a>

                        <?php } ?>

                        </div>

                        <div class="col-md-6 form-group has-feedback" id="grupo__ficha">
                            <label for="fullname">Manual Maquina</label><br>
                            <input class="formularioPanel__input" type="file" name="Maq_manual" />
                            <p class="formularioPanel__input-error">El archivo tiene que ser un PDF.</p>
                            <br><br>
                        
                        <?php if ($maq['Maq_manual'] != "../web/images/Maquina/Manual/") { ?>

                            <a href="<?php echo getUrl("PanelDeControl", "Machine", "viewPdfManual", array("Maq_manual" => $maq['Maq_manual']), "ajax") ?>" target="blank">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-pdf-o"></i>&nbsp;Ver Manual Maquina
                                </button>
                            </a>

                        <?php } ?>

                        </div>
                        
                        <div class="col-md-6 form-group has-feedback" id="grupo__imagenMaquina">
                            <label for="fullname">Imagen</label><br>
                            <input class="formularioPanel__input" type="file" id="seleccionArchivos" placeholder="Imagen" name="Maq_imagen" /><br><br>
                            <p class="formularioPanel__input-error">El archivo tiene que ser un JPG o PNG.</p>
                            <img src="<?php echo $maq['Maq_imagen']; ?>" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                            <p class="formularioPanel__input-error">El archivo tiene que ser un PDF.</p>
                        </div>

                        <div class="formularioPanel__mensaj" id="formularioPanel__mensaje">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                        </div>

                        <div class="row col-12 justify-content-end">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?php echo getUrl("PanelDeControl", "Machine", "consultMachines") ?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php }
    }else{
        include_once '../view/partials/page404.php';
    }
?>