<?php
    foreach($empresas as $emp){
?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Vista general de la empresa <b><?php echo $emp['Emp_razonSocial']?> </b>en nuestro sistema COPAG</h2><br><br>
				<p style="color:red;">Recuerde que los campos no se pueden modificar.</p>
                <div class="clearfix"></div>
            </div>
 
            <div class="x_content">
                <br />
                <form action="<?php echo getUrl("PanelDeControl","Empresa","postEdit"); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Razon social</label>
                        <input type="text" value="<?= $emp['Emp_razonSocial']?>" class="form-control" name="Emp_razonSocial" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">NIT</label>
                        <input type="text" class="form-control" value="<?= $emp['Emp_NIT']?>" name="Emp_NIT" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Email</label>
                        <input type="text" class="form-control" value="<?php echo $emp['Emp_email']?>" placeholder="Email" name="Emp_email" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Direccion</label>
                        <input type="text" class="form-control" value="<?php echo $emp['Emp_direccion']?>" placeholder="Direccion" name="Emp_direccion" readonly />
                   </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Departamento</label>                        <input class="form-control" type="text" value="<?php echo $emp['Dep_nombre']?>" readonly>
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Municipio</label>
                        <input class="form-control" type="text" value="<?php echo $emp['Mun_nombre']?>" readonly>
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Nombre Contacto</label>
                        <input type="text" class="form-control" value="<?php echo $emp['Emp_nombreContacto']?>" placeholder="Nombre Contacto" name="Emp_nombreContacto" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Apellido Contacto</label>
                        <input type="text" class="form-control" value="<?php echo $emp['Emp_apellidoContacto']?>" placeholder="Apellido Contacto" name="Emp_apellidoContacto" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Tipo de Documento</label>
                        <input class="form-control" type="text" value="<?php echo $emp['Stg_nombre']?>" readonly>
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Numero de Documento</label>
                        <input type="number" class="form-control" value="<?php echo $emp['Emp_numeroDocumento']?>" placeholder="Numero de Documento" name="Emp_numeroDocumento" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Numero de Contacto</label>
                        <input type="number" class="form-control" value="<?php echo $emp['Emp_primerNumeroContacto']?>" placeholder="Numero de Contacto" name="Emp_primerNumeroContacto" readonly />
                    </div>

                    <div class="col-md-6 form-group has-feedback">
                        <label for="fullname">Numero de Contacto 2 </label>
                        <input type="number" class="form-control" value="<?php echo $emp['Emp_segundoNumeroContacto']?>" placeholder="Numero de Contacto 2" name="Emp_segundoNumeroContacto" readonly/>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="fullname">Tipo de Empresa</label>
                        <input class="form-control" type="text" value="<?php echo $emp['Tempr_descripcion']?>" readonly>
                    </div>
                    
                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center">
                            <a href="<?php echo getUrl("PanelDeControl","Company","consultCompanies")?>"><button class="btn btn-danger" type="button">Regresar</button></a>
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