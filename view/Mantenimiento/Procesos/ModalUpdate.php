<!--MODAL DE EDITAR  PROCESO---->
<?php
$datos = $_POST['datos'];
foreach ($procesos as $pro) {
?>
<div class="modal-content" id="AlertModalUpdateProceso">
   

    <form class="" action="<?php echo getUrl("Mantenimiento", "Procesos", "UpdateModal"); ?>" method="post"
        class="mx-5">

        <div class="modal-body">
            <div id="contenedor" class="col-md-12 form-group">
                <label>Nombre del Proceso</label>
                <input type="hidden" name="Pro_id" value="<?php echo $pro['Pro_id'] ?>">
                <input id="namepro" type="text" name="Pro_nombre" value="<?php echo $pro['Pro_nombre']; ?>"
                    class="form-control" placeholder="Ej:Lubricar">
                <p class="error">Debe digitar solo letras</p>
            </div>
            <div class="col-md-12 form-group" id="contenedordesc">
                <label>Descripcion del proceso</label>
                <input type="text" id="descpro" name="Pro_descripcion" value="<?php echo $pro['Pro_descripcion']; ?>"
                    class="form-control" placeholder="Ej:Lubricar">
                <p class="error">Debe digitar solo letras</p>
            </div>


        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success float-right" value="Editar Proceso">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>



    </form>
    <script>
    const modal2 = document.getElementById('AlertModalUpdateProceso');

    const inputs2 = document.querySelectorAll('#AlertModalUpdateProceso input');



    const expresionesparaprocesos2 = {
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    }
//campos
    const campos={
    Pro_nombre:true,   
    Pro_descripcion:true   
    }
    //esto valida cada campo con nombres
    const validarmodal2 = (e) => {
        switch (e.target.name) {
            case "Pro_nombre":
                if (expresionesparaprocesos2.nombre.test(e.target.value)) {

                    document.getElementById('namepro').classList.remove('procesomalo');
                    document.getElementById('namepro').classList.add('procesobueno');
                    document.querySelector('#contenedor .error').classList.remove("error-activo");
                    campos['Pro_nombre']=true;
                } else {
                    document.getElementById('namepro').classList.add('procesomalo');
                    document.getElementById('namepro').classList.remove('procesobueno');
                    document.querySelector('#contenedor .error').classList.add("error-activo");
                    campos['Pro_nombre']=false;

                }
                break;
            case "Pro_descripcion":
                if (expresionesparaprocesos2.nombre.test()) {
                    if (expresionesparaprocesos2.nombre.test(e.target.value)) {

                        document.getElementById('descpro').classList.remove('procesomalo');
                        document.getElementById('descpro').classList.add('procesobueno');
                        document.querySelector('#contenedordesc .error').classList.remove("error-activo");
                        campos['Pro_descripcion']=true;
                    } else {
                        document.getElementById('descpro').classList.add('procesomalo');
                        document.getElementById('descpro').classList.remove('procesobueno');
                        document.querySelector('#contenedordesc .error').classList.add("error-activo");
                        campos['Pro_descripcion']=false;

                    }
                }
                break;


        }
    }
    //ejecuta la funcion 
    inputs2.forEach((input) => {
        input.addEventListener('keyup', validarmodal2);
        input.addEventListener('blur', validarmodal2);


    });
    //que valide y no envie
    modal.addEventListener('submit',(e) =>{
    
    if (campos.Pro_nombre && campos.Pro_descripcion) {
        return true;
    }else {
        e.preventDefault();
        alert("no tiene completos los campos o tiene datos invalidos");
        return false;
    }
    });
    </script>
</div>

<?php
}
    ?>