<?php
foreach ($maquina as $maq) {
?>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Vista general de la Maquina, <b><?php echo $maq['Maq_nombre'] ?></b> en nuestro sistema COPAG</h2><br><br>
                    <p style="color:red;">Recuerde que los campos no se pueden modificar.</p>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <br />
                    <form action="<?php echo getUrl("PanelDeControl", "Machine", "postUpdate") ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="fullname">Nombre Maquina</label>
                                <input type="text" class="form-control" value="<?php echo $maq['Maq_nombre'] ?>" readonly/>
                            </div>
                            
                            <div class="form-group has-feedback">
                            <label for="fullname">Tipo de maquina</label>
                            <input type="text" class="form-control" value="<?php echo $maq['Stg_nombre'] ?>" readonly>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="fullname">Serial</label>
                                <input type="text" class="form-control" value="<?php echo $maq['Maq_serial'] ?>" readonly/>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="fullname">Descripcion <small>(Maximo 50 caracteres)</small></label>
                                <textarea style="max-height: 100px; min-height: 100px;" class="form-control" readonly><?php echo $maq['Maq_descripcion'] ?></textarea>
                            </div>
                            
                        </div>

                        <?php if ($maq['Maq_fichaTecnica'] != "../web/images/Maquina/Ficha/") { ?>

                        <div class="col-md-6 form-group has-feedback">
                            <label for="fullname">Ficha Tecnica</label><br>

                                <a href="<?php echo getUrl("PanelDeControl", "Machine", "viewPdfFicha", array("Maq_fichaTecnica" => $maq['Maq_fichaTecnica']), "ajax") ?>" target="blank">
                                    <button type="button" class="btn btn-sm btn-info">
                                        <i class="fa fa-file-pdf-o"></i>&nbsp;Ver Ficha Tecnica
                                    </button>
                                </a>
                        </div>
                        
                        <?php } if ($maq['Maq_manual'] != "../web/images/Maquina/Manual/") { ?>

                        <div class="col-md-6 form-group has-feedback">
                            <label for="fullname">Manual Maquina</label><br>

                            <a href="<?php echo getUrl("PanelDeControl", "Machine", "viewPdfManual", array("Maq_manual" => $maq['Maq_manual']), "ajax") ?>" target="blank">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-pdf-o"></i>&nbsp;Ver Manual Maquina
                                </button>
                            </a>
                        </div>

                        <?php } ?>

                        <div class="col-md-6 form-group has-feedback">
                            <label for="fullname">Imagen</label><br>
                            <img src="<?php echo $maq['Maq_imagen']; ?>" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                        </div>

                        <div class="row col-12 justify-content-end">
                            <a href="<?php echo getUrl("PanelDeControl", "Machine", "consultMachines") ?>"><button class="btn btn-danger" type="button">Regresar</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>