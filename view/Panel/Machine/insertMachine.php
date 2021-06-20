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
                <form action="<?php echo getUrl("PanelDeControl","Machine","postInsert")?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="fullname">Nombre Maquina <b style="color:red;">*</b></label>
                            <input type="text" class="form-control" name="Maq_nombre" required />
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Tipo de maquina <b style="color:red;">*</b></label>
                            <select name="Stg_id" class="form-control" required>
                                <option value="">Seleccione ...</option>
                                <?php 
                                    foreach ($tmaquina as $tmaq) {     
                                ?>
                                    <option value='<?= $tmaq['Stg_id'] ?>'><?= $tmaq['Stg_nombre'] ?></option>";
                                    }
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Serial <b style="color:red;">*</b></label>
                            <input type="text" class="form-control" name="Maq_serial" required />
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Descripcion <b style="color:red;">*</b></label>
                            <textarea class="form-control" name="Maq_descripcion" ></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="fullname">Ficha Tecnica</label><br>
                            <input type="file" name="Maq_fichaTecnica"/>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Manual Maquina</label><br>
                            <input type="file" name="Maq_manual"/>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Imagen</label><br>
                            <input type="file" id="seleccionArchivos" name="Maq_imagen"/><br>
                        </div>
                        
                        <img src="images/pictureDefault.png" id="imagenPrevisualizacion" style="width: 200px; height: 200px;">
                        
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