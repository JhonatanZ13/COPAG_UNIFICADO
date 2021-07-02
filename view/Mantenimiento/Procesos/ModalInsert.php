<!--MODAL DE INSERTAR PROCESO--->
<?php
$datos = $_POST['datos'];
?>

<form id="AlertModalProceso" class="AlertModalProceso"
    action="<?php echo getUrl("Mantenimiento", "Procesos", "InsertModal"); ?>" method="post" class="mx-5">

    <div class="modal-body">
        <div id="contenedor" class="col-md-12 form-group">
            <label>Nombre del proceso</label>
            <input id="namepro" type="text" name="Pro_nombre" class="form-control" placeholder="Ej: Mecanico">
            <p class="error">Debe digitar solo letras</p>
        </div>
        <div class="col-md-12 form-group" id="contenedordesc">
            <label>Descripcion del proceso</label>
            <input id="descpro" type="text" size="60" maxlength="256" name="Pro_descripcion" class="form-control"
                placeholder="Ej: Proceso Mecanico">
            <p class="error">Debe digitar solo letras</p>
        </div>


    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-success float-right" value="Registrar Proceso">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>


</form>

<script>
const modal = document.getElementById('AlertModalProceso');

const inputs = document.querySelectorAll('#AlertModalProceso input');



const expresionesparaprocesos = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
}
//campos a validar
const campos = {
    Pro_nombre: false,
    Pro_descripcion: false
}
//esto valida cada campo con nombres
const validarmodal = (e) => {
    switch (e.target.name) {
        case "Pro_nombre":
            if (expresionesparaprocesos.nombre.test(e.target.value)) {

                document.getElementById('namepro').classList.remove('procesomalo');
                document.getElementById('namepro').classList.add('procesobueno');
                document.querySelector('#contenedor .error').classList.remove("error-activo");
                campos['Pro_nombre'] = true;
            } else {
                document.getElementById('namepro').classList.add('procesomalo');
                document.getElementById('namepro').classList.remove('procesobueno');
                document.querySelector('#contenedor .error').classList.add("error-activo");
                campos['Pro_nombre'] = false;
            }
            break;
        case "Pro_descripcion":
            if (expresionesparaprocesos.nombre.test()) {
                if (expresionesparaprocesos.nombre.test(e.target.value)) {

                    document.getElementById('descpro').classList.remove('procesomalo');
                    document.getElementById('descpro').classList.add('procesobueno');
                    document.querySelector('#contenedordesc .error').classList.remove("error-activo");
                    campos['Pro_descripcion'] = true;
                } else {
                    document.getElementById('descpro').classList.add('procesomalo');
                    document.getElementById('descpro').classList.remove('procesobueno');
                    document.querySelector('#contenedordesc .error').classList.add("error-activo");
                    campos['Pro_descripcion'] = false;
                }
            }
            break;


    }
}
//ejecuta la funcion 
inputs.forEach((input) => {
    input.addEventListener('keyup', validarmodal);
    input.addEventListener('blur', validarmodal);


});
//que valide y no envie
modal.addEventListener('submit', (e) => {

    if (campos.Pro_nombre && campos.Pro_descripcion) {
        return true;
    } else {
        e.preventDefault();
        alert("no tiene completos los campos o tiene datos invalidos");
        return false;
    }
});
</script>
</div>