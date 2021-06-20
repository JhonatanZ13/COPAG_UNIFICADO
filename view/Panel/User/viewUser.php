<?php
	foreach ($usuarios as $user) {
?>

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Vista general del usuario <b><?= $user['Usu_primerNombre'].' '.$user['Usu_primerApellido'];?></b> en nuestro sistema COPAG</h2> <br><br>
				<p style="color:red;">Recuerde que los campos no se pueden modificar.</p>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<br />
				<form action="<?php echo getUrl("PanelDeControl", "User", "postUpdate"); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Primer Nombre</label>
						<input type="text" id="Usu_primerNombre" class="form-control" name="Usu_primerNombre" value="<?= $user['Usu_primerNombre'];?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Segundo Nombre</label>
						<input type="text" id="Usu_segundoNombre" class="form-control" name="Usu_segundoNombre" value="<?= $user['Usu_segundoNombre'];?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Primer Apellido</label>
						<input type="text" id="Usu_primerApellido" class="form-control" name="Usu_primerApellido" value="<?= $user['Usu_primerApellido'];?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Segundo Apellido</label>
						<input type="text" id="Usu_segundoApellido" class="form-control" name="Usu_segundoApellido" value="<?= $user['Usu_segundoApellido'];?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Tipo de Documento</label>
						<input type="" id="" class="form-control" name="" value="<?= $user['Stg_nombre']; ?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Numero de Documento</label>
						<input type="number" id="Usu_numeroDocumento" class="form-control" name="Usu_numeroDocumento" value="<?= $user['Usu_numeroDocumento']; ?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Numero de Telefono</label>
						<input type="number" id="Usu_telefono" class="form-control" name="Usu_telefono" value="<?= $user['Usu_telefono']; ?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Genero</label>
						<input type="text" class="form-control" value="<?= $user['Gen_descripcion']; ?>" readonly>
					</div>
					
					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Correo Electronico</label>
						<input type="email" id="Usu_email" class="form-control" name="Usu_email" value="<?= $user['Usu_email']; ?>" readonly />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Rol de Usuario</label>
						<input type="text" class="form-control" value="<?= $user['Rol_nombre'] ;?>" readonly>
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback">
						<label for="fullname">Area del Usuario</label>
						<input type="text" class="form-control" value="<?= $user['Area_nombre'] ;?>" readonly>
					</div>
					
					<div class="row col-12 justify-content-end">
						<br><br>
						<div class="form-group text-center mt-5">
							<a href='<?php echo getUrl("PanelDeControl", "User", "consultUsers"); ?>'>
                                <button class="btn btn-danger" type="button">Regresar</button>
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