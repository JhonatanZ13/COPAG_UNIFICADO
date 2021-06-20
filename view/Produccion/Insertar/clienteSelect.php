<?php
    foreach ($clienteSelect as $res) {
?>

<!----- ID de la empresa cliente ------>
<input type="hidden" name="Emp_id" value="<?= $res['Emp_id'] ?>">

<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">Nombre cliente</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Emp_razonSocial'] ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">NIT</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Emp_NIT'] ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">Direccion</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Emp_direccion'] ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">Ciudad</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Mun_id'] ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">Telefono</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Emp_segundoNumeroContacto'] ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">Solicitado por</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Emp_nombreContacto'] ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-3 col-sm-3 ">Responsable</label>
    <div class="col-md-9 col-sm-9 ">
        <input type="text" class="form-control datosCliente" disabled="disabled" value="<?= $res['Emp_nombreContacto'] ?>">
    </div>
</div>

<?php } ?>