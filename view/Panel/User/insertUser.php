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
                <form id="formularioUsuario" action="<?php echo getUrl("PanelDeControl", "User", "postInsert") ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__primerNombreUsuario">
                        <label for="fullname">Primer Nombre <b style="color:red;">*</b></label>
                        <input type="text" id="Usu_primerNombre" class="form-control formulario__input" name="Usu_primerNombre"/>
                        <p class="formulario__input-error">El primer nombre social tiene que ser de 4 a 45 caracteres y solo puede contener numeros, letras y guion bajo.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__segundoNombreUsuario">
                        <label for="fullname">Segundo Nombre</label>
                        <input type="text" id="Usu_segundoNombre" class="form-control formulario__input" name="Usu_segundoNombre"/>
                        <p class="formulario__input-error">El segundo nombre social tiene que ser de 4 a 45 caracteres y solo puede contener numeros, letras y guion bajo.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__primerApellidoUsuario">
                        <label for="fullname">Primer Apellido <b style="color:red;">*</b></label>
                        <input type="text" id="Usu_primerApellido" class="form-control formulario__input" name="Usu_primerApellido"  />
                        <p class="formulario__input-error">El primer apellido social tiene que ser de 4 a 45 caracteres y solo puede contener numeros, letras y guion bajo.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__segundoApellidoUsuario">
                        <label for="fullname">Segundo Apellido</label>
                        <input type="text" id="Usu_segundoApellido" class="form-control formulario__input" name="Usu_segundoApellido"/>
                        <p class="formulario__input-error">El seegundo apellido social tiene que ser de 4 a 45 caracteres y solo puede contener numeros, letras y guion bajo.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__tipoDocumentoUsuario">
                        <label for="fullname">Tipo de Documento <b style="color:red;">*</b></label>
                        <select name="Stg_id" class="form-control formulario__input" >
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($tipodocumento as $tdoc) {
                            ?>
                                <option value='<?= $tdoc['Stg_id'] ?>'><?= $tdoc['Stg_nombre'] ?></option>;

                            <?php } ?>
                        </select>
                        <p class="formulario__input-error">Tiene que elegir un tipo de documento.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__numeroDocumentoUsuario">
                        <label for="fullname">Numero de Documento <b style="color:red;">*</b></label>
                        <input type="number" id="Usu_numeroDocumento" class="form-control formulario__input" name="Usu_numeroDocumento"  />
                        <p class="formulario__input-error">El Numero de documento debe tener de 8 a 12 digitos y no puede estar compuesto por puntos, ni comas.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__telefonoUsuario">
                        <label for="fullname">Numero de Telefono <b style="color:red;">*</b></label>
                        <input type="number" id="Usu_telefono" class="form-control formulario__input" name="Usu_telefono" />
                        <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__generoUsuario">
                        <label for="fullname">Genero <b style="color:red;">*</b></label>
                        <select name="Gen_id" class="form-control formulario__input" >
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($genero as $gen) {
                            ?>
                                <option value='<?= $gen['Gen_id'] ?>'><?= $gen['Gen_descripcion'] ?></option>;

                            <?php } ?>
                        </select>
                        <p class="formulario__input-error">Tiene que elegir un genero.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__emailUsuario">
                        <label for="fullname">Correo Electronico <b style="color:red;">*</b></label>
                        <input type="email" id="Usu_email" class="form-control formulario__input" name="Usu_email"/>
                        <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__rolUsuario">
                        <label for="fullname">Rol de Usuario <b style="color:red;">*</b></label>
                        <select name="Rol_id" class="form-control formulario__input" >
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($roles as $rol) {
                            ?>
                                <option value='<?= $rol['Rol_id'] ?>'><?= $rol['Rol_nombre'] ?></option>;

                            <?php } ?>
                        </select>
                        <p class="formulario__input-error">Tiene que elegir un rol.</p>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__areaUsuario">
                        <label for="fullname">Area del Usuario <b style="color:red;">*</b></label>
                        <select name="Area_id" class="form-control formulario__input" >
                            <option value="">Seleccione...</option>
                            <?php
                            foreach ($areas as $area) {
                            ?>
                                <option value='<?= $area['Area_id']; ?>'><?= $area['Area_nombre']; ?></option>;

                            <?php } ?>
                        </select>
                        <p class="formulario__input-error">Tiene que elegir un area.</p>
                    </div>

                    <div class="col-md-12 formulario__mensaj" id="formulario__mensaje">
                      <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
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