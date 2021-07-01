<?php
if(($_SESSION['rolUser'] != 'Aprendiz')){
	foreach ($usuarios as $user) {
?>

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
                <h2>Diligenciar debidamente los datos para poder Modificar a <b><?= $user['Usu_primerNombre'].' '.$user['Usu_primerApellido'];?></b> en nuestro sistema COPAG</h2> <br><br>
                <p style="color:red;">Recuerde que los campos con * son obligatorios</p>
                <div class="clearfix"></div>
            </div>

			<div class="x_content">
				<br />
				<form id="actualizarUsuario" action="<?php echo getUrl("PanelDeControl", "User", "postUpdate"); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

					<div class="col-md-6 col-sm-6 form-group has-feedback" hidden>
						<input type="number" id="Usu_id" class="form-control formularioPanel__input" name="Usu_id" value="<?= $user['Usu_id'];?>" />
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__primerNombreUsuario">
						<label for="fullname">Primer Nombre <b style="color:red;">*</b></label>
						<input type="text" id="Usu_primerNombre" class="form-control formularioPanel__input" name="Usu_primerNombre" value="<?= $user['Usu_primerNombre'];?>"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z).</p>                    
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__segundoNombreUsuario">
						<label for="fullname">Segundo Nombre</label>
						<input type="text" id="Usu_segundoNombre" class="form-control formularioPanel__input" name="Usu_segundoNombre" value="<?= $user['Usu_segundoNombre'];?>" />
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z).</p>                    
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__primerApellidoUsuario">
						<label for="fullname">Primer Apellido <b style="color:red;">*</b></label>
						<input type="text" id="Usu_primerApellido" class="form-control formularioPanel__input" name="Usu_primerApellido" value="<?= $user['Usu_primerApellido'];?>"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z).</p>                    
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__segundoApellidoUsuario">
						<label for="fullname">Segundo Apellido</label>
						<input type="text" id="Usu_segundoApellido" class="form-control formularioPanel__input" name="Usu_segundoApellido" value="<?= $user['Usu_segundoApellido'];?>" />
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z).</p>                    
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__tipoDocumentoUsuario">
						<label for="fullname">Tipo de Documento <b style="color:red;">*</b></label>
						<select name="Stg_id" class="form-control formularioPanel__input" required>
							<?php
							foreach ($tipodocumento as $tdoc) {
								foreach ($usuarios as $user) {	
									if ($tdoc['Stg_id']==$user['Stg_id']) {
							?>
										<option value="<?= $tdoc['Stg_id'];?>" selected ><?= $tdoc['Stg_nombre'];?></option>
							<?php 
									}else {
									?>
										<option value="<?= $tdoc['Stg_id']; ?>" ><?= $tdoc['Stg_nombre']; ?></option>	
									<?php
									}
								}
							} 
							?>
						</select>
						<p class="formularioPanel__input-error">Tiene que elegir un tipo de documento.</p>
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__numeroDocumentoUsuario">
						<label for="fullname">Numero de Documento <b style="color:red;">*</b></label>
						<input type="number" id="Usu_numeroDocumento" class="form-control formularioPanel__input" name="Usu_numeroDocumento" value="<?= $user['Usu_numeroDocumento']; ?>"/>
                        <p class="formularioPanel__input-error">Solo se permiten numeros(0-9) y puede tener de 8 a 12 digitos.</p>              
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__telefonoUsuario">
						<label for="fullname">Numero de Telefono <b style="color:red;">*</b></label>
						<input type="number" id="Usu_telefono" class="form-control formularioPanel__input" name="Usu_telefono" value="<?= $user['Usu_telefono']; ?>"/>
                        <p class="formularioPanel__input-error">Solo se permiten numeros(0-9) y puede tener de 6 a 14 digitos.</p> 
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__generoUsuario">
						<label for="fullname">Genero <b style="color:red;">*</b></label>
						<select name="Gen_id" class="form-control formularioPanel__input" required>
							<?php
							foreach ($genero as $gen) {
								foreach ($usuarios as $user) {
									if ($gen['Gen_id']==$user['Gen_id']) {
							?>
										<option value="<?= $gen['Gen_id']; ?>" selected><?= $gen['Gen_descripcion']; ?></option>
							<?php
									}else {
							?>
										<option value="<?= $gen['Gen_id']; ?>"><?= $gen['Gen_descripcion']; ?></option>
							<?php
									}
								}
							} 
							?>
						</select>
						<p class="formularioPanel__input-error">Tiene que elegir un genero.</p>
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__emailUsuario">
						<label for="fullname">Correo Electronico <b style="color:red;">*</b></label>
						<input type="email" id="Usu_email" class="form-control formularioPanel__input" name="Usu_email" value="<?= $user['Usu_email']; ?>"/>
                        <p class="formularioPanel__input-error">Solo se permiten letras (a-z), números (0-9) y punto (.).</p>                    
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__rolUsuario">
						<label for="fullname">Rol de Usuario <b style="color:red;">*</b></label>
						<select name="Rol_id" class="form-control formularioPanel__input" required>
							<option value="">Seleccione...</option>
							<?php
							foreach ($roles as $rol) {
								foreach ($usuarios as $user) {
									if ($rol['Rol_id']==$user['rol_id']) {
							?>
										<option value="<?= $rol['Rol_id']; ?>" selected><?= $rol['Rol_nombre']; ?></option>
							<?php
									}else {
							?>
										<option value="<?= $rol['Rol_id']; ?>"><?= $rol['Rol_nombre'] ;?></option>
							<?php
									}
								}
							} 
							?>
						</select>
						<p class="formularioPanel__input-error">Tiene que elegir un rol.</p>
					</div>

					<div class="col-md-6 col-sm-6 form-group has-feedback" id="grupo__areaUsuario">
                        <label for="fullname">Area del Usuario <b style="color:red;">*</b></label>
                        <select name="Area_id" class="form-control formularioPanel__input" required>
                            <?php
                            foreach ($areas as $area) {
								foreach ($usuarios as $user) {
									if($area['Area_id']==$user['Area_id']){
                            ?>
                                	<option value='<?= $area['Area_id']; ?>' selected><?= $area['Area_nombre']; ?></option>
							
									
                            <?php 
									}else{
										if ($_SESSION['areaUser'] != 'Control') {
											if ($area['Area_id'] != 5) {
							?>

							<option value='<?= $area['Area_id']; ?>'><?= $area['Area_nombre']; ?></option>

							<?php 			}
										}else{
							?>
							
							<option value='<?= $area['Area_id']; ?>'><?= $area['Area_nombre']; ?></option>

							<?php		}
									}
								}
							} ?>
                        </select>
                        <p class="formularioPanel__input-error">Tiene que elegir un area.</p>
                    </div>

                    <div class="col-md-12 formularioPanel__mensaj" id="formularioPanel__mensaje">
                      <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>

					<br><br>
						<div class="row col-md-12 justify-content-end mt-5">
							<button type="submit" class="btn btn-success">Actualizar</button>
							<a href='<?php echo getUrl("PanelDeControl", "User", "consultUsers"); ?>'>
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