<?php
if (($_SESSION['rolUser'] != 'Aprendiz')) {
?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Diligenciar debidamente los datos para poder registrar un nuevo Articulo en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form id="formularioArticulo" action="<?php echo getUrl("PanelDeControl","Article","postInsert")?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6">
                        <div class="form-group has-feedback" id="grupo__nombreArticulo">
                            <label for="fullname">Nombre del Articulo <b style="color:red;">*</b></label>
                            <input type="text" id="fullname" class="form-control formularioPanel__input" name="Arti_nombre" />
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo o guion (_ , -).</p>

                        </div>

                        <div class="form-group has-feedback" id="grupo__tipoArticulo">
                            <label for="fullname">Tipo de Articulo <b style="color:red;">*</b></label>
                            <select name="Tart_id" class="form-control formularioPanel__input" >
                                <option value="">Seleccione...</option>
                                    <?php 
                                        foreach ($tarticulos as $tart) {     
                                    ?>
                                        <option value='<?= $tart['Tart_id'] ?>'><?= $tart['Tart_descripcion'] ?></option>
                                        
                                    <?php } ?>
                            </select>
                            <p class="formularioPanel__input-error">Tiene que seleccionar un tipo de articulo.</p>

                        </div>

                        <div class="form-group has-feedback" id="grupo__tipoMedida">
                            <label for="fullname">Medida <b style="color:red;">*</b></label>
                            <div class="item form-group">
                                <input type="text" class="form-control formularioPanel__input" name="Arti_medida"  />
                                <select name="Med_id" class="form-control formularioPanel__input" >
                                    <option value="">Seleccione...</option>
                                        <?php 
                                            foreach ($tmedidas as $medida) {     
                                        ?>
                                            <option value='<?= $medida['Med_id'] ?>'><?= $medida['Med_descripcion'] ?></option>;
                                            }

                                        <?php } ?>
                                </select>
                            </div>
                            <p class="formularioPanel__input-error">Solo se permiten numeros (0-9) y Tiene que seleccionar un tipo de medida.</p>

                        </div>

                        <div class="form-group has-feedback" id="grupo__descripcionArticulo">
                            <label for="fullname">Descripcion <b style="color:red;">*</b><br/><small>(Maximo 50 caracteres)</small></label>
                            <textarea style="max-height: 100px; min-height: 100px;" class="form-control formularioPanel__input" name="Arti_descripcion" ></textarea>
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) , punto (.), coma(,) y guion bajo (_).</p>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-bottom: 200px;">
                        <div class="form-group has-feedback" id="grupo__imagenArticulo">
                            <label for="fullname">Imagen</label><br>
                            <input class="formularioPanel__input" type="file" id="seleccionArchivos" name="Arti_imagen"/><br>
                            <p class="formularioPanel__input-error">El archivo tiene que ser un JPG o PNG.</p>
                        </div>
                        
                        <img src="images/articuloPredeterminado.jpg" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                    </div>
                    <div class="formularioPanel__mensaj" id="formularioPanel__mensaje">
                         <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>
                    <div class="row col-12 justify-content-end">

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            <a href="<?php echo getUrl("PanelDeControl","Article","consultArticles")?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
} else {
    include_once '../view/partials/page404.php';
}
?> 