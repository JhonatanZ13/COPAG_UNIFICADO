<?php
if(($_SESSION['rolUser'] != 'Aprendiz')){
    foreach ($articulo as $arti){
?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
        <div class="x_title">
                <h2>Diligenciar debidamente los datos para poder Modificar <b><?php echo $arti['Arti_nombre']?></b>  en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form id="actualizarArticulo" action="<?php echo getUrl("PanelDeControl","Article","postUpdate")?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="Arti_id" value="<?php echo $arti['Arti_id']; ?>">
                    <input type="hidden" name="imagenVieja" value="<?php echo $arti['Arti_imagen']; ?>">

                    <div class="col-md-6">
                        <div class="form-group has-feedback" id="grupo__nombreArticulo">
                            <label for="fullname">Nombre del Articulo <b style="color:red;">*</b></label>
                            <input type="text" id="fullname" class="form-control formularioPanel__input" value="<?php echo $arti['Arti_nombre']?>" name="Arti_nombre" />
                            <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__tipoArticulo">
                        <label for="fullname">Tipo de Articulo <b style="color:red;">*</b></label>
                            <select name="Tart_id" class="form-control formularioPanel__input">
                                <option value=<?php echo $arti['Tart_id']?>><?php echo $arti['Tart_descripcion']?></option>
                                    <?php 
                                        foreach ($tarticulos as $tart) {
                                            if($tart['Tart_id']==$arti['Tart_id']){

                                            }else{     
                                    ?>
                                        <option value='<?= $tart['Tart_id'] ?>'><?= $tart['Tart_descripcion'] ?></option>;
                                        
                                    <?php }} ?>
                            </select>
                            <p class="formularioPanel__input-error">Tiene que seleccionar un tipo de articulo.</p>
                        </div>

                        <div class="form-group has-feedback" id="grupo__tipoMedida">
                            <label for="fullname">Medida <b style="color:red;">*</b></label>
                            
                            <div class="item form-group">
                                <input value=<?php echo $arti['Arti_medida']?> type="text" class="form-control formularioPanel__input" name="Arti_medida" />
                                <select name="Med_id" class="form-control formularioPanel__input">
                                    <option value=<?php echo $arti['Med_id']?>><?php echo $arti['Med_descripcion']?></option>
                                        <?php 
                                            foreach ($tmedidas as $medida) { 
                                                if($medida['Med_id']==$arti['Med_id']){

                                                }else{  
                                        ?>
                                            <option value='<?= $medida['Med_id'] ?>'><?= $medida['Med_descripcion'] ?></option>;
                                            
                                        <?php } }?>
                                </select>
                            </div>
                            <p class="formularioPanel__input-error">Tiene que seleccionar un tipo de medida, la medida solo puede ser numeros y 1 a 45 caracteres.</p>
                        </div>
                        <div class="form-group has-feedback" id="grupo__descripcionArticulo">
                            <label for="fullname">Descripcion <b style="color:red;">*</b></label>
                            <textarea style="max-height: 100px; min-height: 100px;" class="form-control formularioPanel__input" name="Arti_descripcion" ><?php echo $arti['Arti_descripcion']?></textarea>
                            <p class="formularioPanel__input-error">La descripcion tiene que ser de 4 a 45 caracteres y solo puede contener numeros, letras y guion bajo.</p>
                        </div>
                    </div>

                    <div class="col-md-6" style=" margin-bottom: 200px;">
                        <div class="form-group has-feedback" id="grupo__imagenArticulo">
                            <label for="fullname">Imagen</label><br>
                            <input class="formularioPanel__input" type="file" id="seleccionArchivos" placeholder="Imagen" name="Arti_imagen"/><br>
                            <p class="formularioPanel__input-error">El archivo tiene que ser un JPG o PNG.</p>
                        </div>
                        <img src="<?php echo $arti['Arti_imagen'];?>" id="imagenPrevisualizacion"  style="width: 200px; height: 200px;">
                    </div>
                    <div class="formularioPanel__mensaj" id="formularioPanel__mensaje">
                         <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>
                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?php echo getUrl("PanelDeControl","Article","consultArticles")?>">
                                <button class="btn btn-danger" type="button">Cancelar</button>
                            </a>
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