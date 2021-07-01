<?php
    if(($_SESSION['rolUser'] != 'Aprendiz')){
?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Diligenciar debidamente los datos para poder registrar una nueva Herramienta en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form id="formularioHerramienta" action="<?php echo getUrl("PanelDeControl", "Tool", "postInsert") ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6">
                        <div class=" form-group has-feedback" id="grupo__nombreHerramienta">
                            <label for="fullname">Nombre Herramienta <b style="color:red;">*</b></label>
                            <input type="text" id="Her_nombre" class="form-control formularioPanel__input" name="Her_nombre" />
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__tipoHerramienta">
                            <label for="fullname">Tipo de Herramienta <b style="color:red;">*</b></label>
                            <select name="Stg_id" class="form-control formularioPanel__input" >
                                <option value="">Seleccione...</option>
                                <?php
                                foreach ($tipoherramienta as $her) {
                                ?>
                                    <option value='<?= $her['Stg_id'] ?>'><?= $her['Stg_nombre'] ?></option>;

                                <?php } ?>
                            </select>
                            <p class="formularioPanel__input-error">Tiene que seleccionar un tipo de herramienta.</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__descripcionHerramienta">
                            <label for="fullname">Descripcion <b style="color:red;">*</b>&nbsp;<small>(Maximo 50 caracteres)</small>
                            </label>
                            <textarea style="max-height: 100px; min-height: 100px;" id="Her_descripcion" class="form-control formularioPanel__input" name="Her_descripcion"></textarea>
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) , punto (.), coma(,) y guion bajo (_).</p>
                        </div> 
                    </div>

                    <div class="col-md-6 form-group has-feedback" style="margin-bottom: 75px;" id="grupo__imagenHerramienta">
                        <div>
                            <label for="fullname">Foto Herramienta</label><br>
                            <input class="formularioPanel__input" type="file" id="seleccionArchivos" name="Her_foto" />
                            <p class="formularioPanel__input-error">El archivo tiene que ser un JPG o PNG.</p>
                        </div><br>
                        <img src="images/pictureDefault.png" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                    </div>

                    <div class="formularioPanel__mensaj" id="formularioPanel__mensaje">
                         <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>

                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            <a href="<?php echo getUrl("PanelDeControl", "Tool", "consultTools") ?>">
                                <button class="btn btn-danger" type="button">Cancelar</button>
                            </a> 
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php
    }else{
        include_once '../view/partials/page404.php';
    }
?>