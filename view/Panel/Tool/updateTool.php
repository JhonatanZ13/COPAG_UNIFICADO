<?php
foreach ($tools as $tool) {
?>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Diligenciar debidamente los datos para poder modificar la Herramienta <b><?= $tool['Her_nombre']; ?></b> en nuestro sistema COPAG</h2> <br><br>
                    <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="<?php echo getUrl("PanelDeControl", "Tool", "postUpdate") ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <input type="hidden" name="oldImage" value="<?php echo $tool['Her_foto']; ?>" />

                        <input type="hidden" name="Her_id" value="<?php echo $tool['Her_id']; ?>" />

                        <div class="col-md-6">
                            <div class=" form-group has-feedback">
                                <label for="fullname">Nombre Herramienta <b style="color:red;">*</b></label>
                                <input type="text" id="Her_nombre" class="form-control" name="Her_nombre" value="<?= $tool['Her_nombre']; ?>" />
                            </div>

                            <div class="  form-group has-feedback">
                                <label for="fullname">Tipo de Herramienta <b style="color:red;">*</b></label>
                                <select name="Stg_id" class="form-control">
                                    <?php
                                    foreach ($tipoherramienta as $her) {
                                        foreach ($tools as $tool) {
                                            if ($her['Stg_id'] == $tool['Stg_id']) {
                                    ?>
                                                <option value="<?= $her['Stg_id']; ?>" selected><?= $her['Stg_nombre']; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $her['Stg_id']; ?>"><?= $her['Stg_nombre']; ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class=" form-group has-feedback">
                                <label for="fullname">Descripcion <b style="color:red;">*</b><small>(Maximo 50 caracteres)</small>
                                </label>
                                <textarea style="max-height: 100px; min-height: 100px;" id="Her_descripcion" class="form-control" name="Her_descripcion"><?= $tool['Her_descripcion']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 form-group has-feedback">
                            <div>
                                <label for="fullname">Foto Herramienta</label><br>
                                <input type="file" id="seleccionArchivos" name="Her_foto" value="<?php echo $tool['Her_foto']; ?>" />
                            </div>
                            <br>
                            <div>
                                <img src="<?php echo $tool['Her_foto']; ?>" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                            </div>
                        </div>

                        <div class="row col-12 justify-content-end">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Actualizar</button>
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
}
?>