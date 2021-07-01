<?php
foreach ($usuarios as $user) {
?>

	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>En esta seccion puedes editar tu perfil en el sistema COPAG</h2> <br><br>
					<p style="color:red;">Recuerde que todos los campos con * no se pueden modificar</p>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<h1 class="">Perfil</h1>
					<br />

					<?php 
					if(isset($_SESSION['mensaje'])){ ?>
					<div class="col-md-12">
						<div class="alert alert-<?=$_SESSION['tipo']?> alert-dismissible " role="alert" id="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<strong>
							<?php 
								echo $_SESSION['mensaje'];
								unset($_SESSION['mensaje']);
								unset($_SESSION['tipo']);
							?>
							</strong>
						</div>
					</div>
					<?php }?>

					<form action="<?php echo getUrl("PanelDeControl", "User", "postProfile"); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for=""><?= $_SESSION['rolUser']; ?></label><br>
							<?php
							if ($_SESSION['rolUser'] == 'Administrador') {
								$rolFoto = $manager;
							} elseif ($_SESSION['rolUser'] == 'Funcionario') {
								$rolFoto = $functionary;
							} elseif ($_SESSION['rolUser'] == 'Aprendiz') {
								$rolFoto = $learner;
							} ?>
							<img class="border border-info" src="<?= $rolFoto ?>" style="width: 200px; height: 250px;">
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback" hidden>
							<input type="text" id="Usu_id" class="form-control" name="Usu_id" value="<?= $user['Usu_id']; ?>" />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Primer Nombre</label>
							<input type="text" id="Usu_primerNombre" class="form-control" name="Usu_primerNombre" value="<?= $user['Usu_primerNombre']; ?>" />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Segundo Nombre</label>
							<input type="text" id="Usu_segundoNombre" class="form-control" name="Usu_segundoNombre" value="<?= $user['Usu_segundoNombre']; ?>" />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Primer Apellido</label>
							<input type="text" id="Usu_primerApellido" class="form-control" name="Usu_primerApellido" value="<?= $user['Usu_primerApellido']; ?>" />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Segundo Apellido</label>
							<input type="text" id="Usu_segundoApellido" class="form-control" name="Usu_segundoApellido" value="<?= $user['Usu_segundoApellido']; ?>" />
						</div>

						<div data-rol="<?= $_SESSION['rolUser'] ?>" class="readAndDisable col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Tipo de Documento <b style="color:red;">*</b></label>
							<input id="" class="na form-control" name="" value="<?= $user['Stg_nombre']; ?>" disabled readonly />
						</div>

						<div data-rol="<?= $_SESSION['rolUser'] ?>" class="readAndDisable col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Numero de Documento <b style="color:red;">*</b></label>
							<input type="number" id="Usu_numeroDocumento" class="na form-control" name="Usu_numeroDocumento" value="<?= $user['Usu_numeroDocumento']; ?>" disabled readonly />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Numero de Telefono</label>
							<input type="number" id="Usu_telefono" class="form-control" name="Usu_telefono" value="<?= $user['Usu_telefono']; ?>" />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Genero</label>
							<select name="Gen_id" class="form-control">
								<?php
								foreach ($genero as $gen) {
									foreach ($usuarios as $user) {
										if ($gen['Gen_id'] == $user['Gen_id']) {
								?>
											<option value="<?= $gen['Gen_id']; ?>" selected><?= $gen['Gen_descripcion']; ?></option>
										<?php
										} else {
										?>
											<option value="<?= $gen['Gen_id']; ?>"><?= $gen['Gen_descripcion']; ?></option>
								<?php
										}
									}
								}
								?>
							</select>
						</div>

						<div data-rol="<?= $_SESSION['rolUser'] ?>" class="readAndDisable col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Correo Electronico <b style="color:red;">*</b></label>
							<input type="email" id="Usu_email" class="na form-control" name="Usu_email" value="<?= $user['Usu_email']; ?>" disabled readonly />
						</div>

						<div class="col-md-6 col-sm-6 form-group has-feedback">
							<label for="fullname">Contraseña Anterior</label>
							<input type="" id="" class="form-control" name="Usu_passwordOld" />
						</div>

						<div id="validarPrueba">
							<div class="col-md-6 col-sm-6 form-group has-feedback">
								<label for="fullname">Contraseña Nueva</label>
								<input type="" id="Usu_passwordNew" class="form-control" name="Usu_passwordNew" />
							</div>

							<div class="col-md-6 col-sm-6 form-group has-feedback">
								<label for="fullname">Confirmar Contraseña </label>
								<input type="" id="Usu_password" class="form-control" name="Usu_password"/>
							</div>
						</div>

						<br><br>
						<div class=" row col-md-12 justify-content-end mt-5">
							<button type="submit" class="btn btn-success">Actualizar</button>
							<a href='<?php echo getUrl("PanelDeControl", "User", "getIndex", ); ?>'>
								<button class="btn btn-danger" type="button">Cancelar</button>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>