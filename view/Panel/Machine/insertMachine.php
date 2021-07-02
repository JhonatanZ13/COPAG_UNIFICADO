<?php
if(($_SESSION['rolUser'] != 'Aprendiz')){
	foreach ($tmaquina as $maq) {
?>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
        <div class="x_title">
                <h2>Diligenciar debidamente los datos para poder registrar una nueva Maquina en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form id="formulariov" action="<?php echo getUrl("PanelDeControl","Machine","postInsert")?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6">
                        <div class="form-group has-feedback" id="grupo__nombreMaquina">
                            <label class="formulario__label">Nombre Maquina <b style="color:red;">*</b></label>
                            <input type="text" class="form-control formularioPanel__input" name="Maq_nombre">
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__tipoMaquina">
                            <label for="fullname">Tipo de maquina <b style="color:red;">*</b></label>
                            <select id="selectMaquina" name="Stg_id" class="form-control formularioPanel__input">
                                <option value="">Seleccione ...</option>
                                <?php
                                    foreach ($tmaquina as $tmaq) {
                                ?>
                                    <option value='<?= $tmaq['Stg_id'] ?>'><?= $tmaq['Stg_nombre'] ?></option>;
                                    }
                                <?php } ?>
                            </select>
                            <p class="formularioPanel__input-error">Tiene que seleccionar un tipo de maquina.</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__serial">
                            <label class="formulario__label">Serial <b style="color:red;">*</b></label>
                            <input type="text" class="form-control formularioPanel__input" name="Maq_serial" />
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__descripcion">
                            <label class="formulario__label">Descripcion <b style="color:red;">*</b></label>
                            <textarea class="form-control formularioPanel__input" name="Maq_descripcion" ></textarea>
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) , punto (.), coma(,) y guion bajo (_).</p>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback" id="grupo__ficha">
                            <label for="fullname">Ficha Tecnica</label><br>
                            <input class="formularioPanel__input" type="file" name="Maq_fichaTecnica"/>
                            <p class="formularioPanel__input-error">El archivo tiene que ser un PDF.</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__manual">
                            <label for="fullname">Manual Maquina</label><br>
                            <input class="formularioPanel__input" type="file" name="Maq_manual"/>
                            <p class="formularioPanel__input-error">El archivo tiene que ser un PDF.</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__imagenMaquina">
                            <label for="fullname">Imagen</label><br>
                             <input class="formularioPanel__input" type="file" id="seleccionArchivos" name="Maq_imagen"/><br>
                            <p class="formularioPanel__input-error">El archivo tiene que ser un JPG o PNG.</p>
                        </div>
                        
                        <img src="images/maquinaPredeterminada.jpg" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                        <p></p>
                    </div>

                    <div class="formularioPanel__mensaj" id="formularioPanel__mensaje">
                    	<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>

                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            <a href="<?php echo getUrl("PanelDeControl","Machine","consultMachines")?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php   }
    }else{
        include_once '../view/partials/page404.php';
    }
?>