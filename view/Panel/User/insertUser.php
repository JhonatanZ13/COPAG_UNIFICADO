<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Diligenciar debidamente los datos para poder Registrar un nuevo Usuario en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form action="<?php echo getUrl("PanelDeControl", "User", "postInsert") ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Primer Nombre <b style="color:red;">*</b></label>
                        <input type="text" id="Usu_primerNombre" class="form-control" name="Usu_primerNombre" required />
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Segundo Nombre</label>
                        <input type="text" id="Usu_segundoNombre" class="form-control" name="Usu_segundoNombre"/>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Primer Apellido <b style="color:red;">*</b></label>
                        <input type="text" id="Usu_primerApellido" class="form-control" name="Usu_primerApellido" required />
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Segundo Apellido</label>
                        <input type="text" id="Usu_segundoApellido" class="form-control" name="Usu_segundoApellido"/>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Tipo de Documento <b style="color:red;">*</b></label>
                        <select name="Stg_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($tipodocumento as $tdoc) {
                            ?>
                                <option value='<?= $tdoc['Stg_id'] ?>'><?= $tdoc['Stg_nombre'] ?></option>";

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Numero de Documento <b style="color:red;">*</b></label>
                        <input type="number" id="Usu_numeroDocumento" class="form-control" name="Usu_numeroDocumento" required />
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Numero de Telefono <b style="color:red;">*</b></label>
                        <input type="number" id="Usu_telefono" class="form-control" name="Usu_telefono" required />
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Genero <b style="color:red;">*</b></label>
                        <select name="Gen_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($genero as $gen) {
                            ?>
                                <option value='<?= $gen['Gen_id'] ?>'><?= $gen['Gen_descripcion'] ?></option>";

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Correo Electronico <b style="color:red;">*</b></label>
                        <input type="email" id="Usu_email" class="form-control" name="Usu_email" required />
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Rol de Usuario <b style="color:red;">*</b></label>
                        <select name="Rol_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($roles as $rol) {
                            ?>
                                <option value='<?= $rol['Rol_id'] ?>'><?= $rol['Rol_nombre'] ?></option>";

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                        <label for="fullname">Area del Usuario <b style="color:red;">*</b></label>
                        <select name="Area_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($areas as $area) {
                            ?>
                                <option value='<?= $area['Area_id']; ?>'><?= $area['Area_nombre']; ?></option>;

                            <?php } ?>
                        </select>
                    </div>

                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center mt-5">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            <a href="<?php echo getUrl("PanelDeControl", "User", "consultUsers") ?>">
                                <button class="btn btn-danger" type="button">Cancelar</button>
                            </a> 
                        </div>
                    </div>
                    
                </form>
            </div> 
        </div>
    </div>
</div>