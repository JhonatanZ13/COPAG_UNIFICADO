<?php
if (($_SESSION['rolUser'] != 'Aprendiz')) {
?>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Diligenciar debidamente los datos para poder registrar una nueva Empresa en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que todos los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>
 
            <div class="x_content">
                <br />
                <form id="formularioEmpresa" action="<?php echo getUrl("PanelDeControl","Company","postInsert")?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6 form-group has-feedback" id="grupo__razonSocial">
                        <label for="fullname">Razon social <b style="color:red;">*</b></label>
                        <input type="text" id="fullname" class="form-control formularioPanel__input" placeholder="" name="Emp_razonSocial"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y guion bajo (_).</p>

                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__nit">
                        <label for="fullname">NIT <b style="color:red;">*</b></label>
                        <input type="text" class="form-control formularioPanel__input" placeholder="" name="Emp_NIT"/>
                        <p class="formularioPanel__input-error">Solo se permiten numeros(0-9), guion(-) y puede tener de 8 a 12 digitos.</p>
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__emailEmpresa">
                        <label for="fullname">Email <b style="color:red;">*</b><small>&nbsp;(E-mail de la empresa)</small></label>
                        <input type="text" class="form-control formularioPanel__input" placeholder="" name="Emp_email"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y punto (.).</p>                    
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__direccionEmpresa">
                        <label for="fullname">Direccion <b style="color:red;">*</b></label><small>&nbsp;(Direccion de la empresa)</small>
                        <input type="text" class="form-control formularioPanel__input" placeholder="" name="Emp_direccion"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9), numeral (#) y guion (-).</p>                    
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__departamentoEmpresa">
                        <label for="fullname">Departamento <b style="color:red;">*</b></label>
                        <select name="Dep_id" class="form-control formularioPanel__input" id="selectDepto" data-url="<?php echo
                        getUrl("PanelDeControl","Company","selectDinamico",false,"ajax")?>">
                            <option value="">Seleccionar...</option>
                                <?php 
                                    foreach ($departamentos as $dep) {     
                                ?>
                                    <option value='<?= $dep['Dep_id'] ?>'><?= $dep['Dep_nombre'] ?></option>;
                                    
                                <?php } ?>
                        </select>
                        <p class="formularioPanel__input-error">Tiene que elegir un Departamento.</p>
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__municipioEmpresa">
                        <label for="fullname">Municipio <b style="color:red;">*</b></label>
                        <select name="Mun_id" id="selectCiudad" class="form-control formularioPanel__input">
                        <p class="formularioPanel__input-error">Tiene que elegir un Municipio.</p>
                        </select>
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__nombreContacto">
                        <label for="fullname">Nombre Contacto <b style="color:red;">*</b></label>
                        <input type="text" class="form-control formularioPanel__input" placeholder="" name="Emp_nombreContacto"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z).</p>                    
                    </div>
                    
                    <div class="col-md-6 form-group has-feedback" id="grupo__apellidoContacto">
                        <label for="fullname">Apellido Contacto <b style="color:red;">*</b></label>
                        <input type="text" class="form-control formularioPanel__input" placeholder="" name="Emp_apellidoContacto"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z).</p>                     
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__tipoDocumentoContacto">
                        <label for="fullname">Tipo de Documento <b style="color:red;">*</b><small>&nbsp;(Tipo de documento del contacto)</small></label>
                        <select name="Stg_id" class="form-control formularioPanel__input">
                            <option value="">Seleccionar...</option>
                                <?php 
                                    foreach ($tipodocumento as $tipod) {     
                                ?>
                                    <option value='<?= $tipod['Stg_id'] ?>'><?= $tipod['Stg_nombre'] ?></option>;
                                    
                                <?php } ?>
                        </select>
                        <p class="formularioPanel__input-error">Tiene que elegir un tipo de documento.</p>
                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__numeroDocumentoContacto">
                        <label for="fullname">Numero de Documento <b style="color:red;">*</b></label>
                        <input type="number" class="form-control formularioPanel__input" placeholder="" name="Emp_numeroDocumento"/>
                        <p class="formularioPanel__input-error">Solo se permiten numeros(0-9) y puede tener de 8 a 12 digitos.</p>                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__primerNumeroContacto">
                        <label for="fullname">Numero de telefono de Contacto <b style="color:red;">*</b></label>
                        <input type="number" class="form-control formularioPanel__input" placeholder="" name="Emp_primerNumeroContacto"/>
                        <p class="formularioPanel__input-error">Solo se permiten numeros(0-9) y puede tener de 6 a 14 digitos.</p> 

                    </div>

                    <div class="col-md-6 form-group has-feedback" id="grupo__segundoNumeroContacto">
                        <label for="fullname">Numero de telefono 2 de Contacto <small>(opcional)</small></label>
                        <input type="number" class="form-control formularioPanel__input" placeholder="" name="Emp_segundoNumeroContacto"/>
                        <p class="formularioPanel__input-error">Solo se permiten numeros(0-9) y puede tener de 6 a 14 digitos.</p> 
                    </div>

                    <div class="col-md-6 col-sm-6 form-group" id="grupo__tipoEmpresa">
                        <label for="fullname">Tipo de Empresa <b style="color:red;">*</b></label>
                        <select name="Tempr_id" class="form-control formularioPanel__input">
                            <option value="">Seleccionar...</option>
                                <?php 
                                    foreach ($tempresa as $temp) {     
                                ?>
                                    <option value='<?= $temp['Tempr_id'] ?>'><?= $temp['Tempr_descripcion'] ?></option>;
                                    
                                <?php } ?>
                        </select>
                        <p class="formularioPanel__input-error">Tiene que elegir un Tipo de empresa.</p>
                    </div>

                    <div class="col-md-12 formularioPanel__mensaj" id="formularioPanel__mensaje">
                         <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>
                    
                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Registrar</button>
                            <a href="<?php echo getUrl("PanelDeControl","Company","consultCompanies")?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
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