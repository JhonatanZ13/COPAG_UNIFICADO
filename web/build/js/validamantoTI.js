var formMTI = document.getElementById('FormConfirmacion');
const formularioMTI = document.getElementById('FormConfirmacion');
const inputMTI = document.querySelectorAll('#FormConfirmacion input');

const expresionesMTI = {
    solonumeros: /^[0-9]*$/, // numeros
    solonumeros2: /^[\s0-9][^a-zA-z]*$/,
    corte: /^[^a-zA-Z\D][0-9]*[.]*[^\D][0-9]* x [0-9]*[.]*[^\D][0-9]*[^a-zA-Z-_]*cm$/,
    sololetras: /^[^\s\d\W][A-Za-z\s]*$/,
    tinta: /^#[a-zA-Z0-9]{6}$/
}

const camposMTI = {
    Tar_nombre: false,
    Tar_descripcion: false,
    checkbox: false,
    checkbox1: false
}

const validarFormularioMantoTI = (e) => {
    var vacio = "";
    switch (e.target.name) {
        case "Tar_nombre":
            if (expresionesMTI.sololetras.test(e.target.value)) {
                document.getElementById('tareaN').classList.remove('parsley-error');
                document.getElementById('tareaNP').classList.remove('form_input-error-activo');
                camposMTI['Tar_nombre'] = true;
            } else {
                document.getElementById('tareaN').classList.add('parsley-error');
                document.getElementById('tareaNP').classList.add('form_input-error-activo');
                camposMTI['Tar_nombre'] = false;
            }
            break;
        case "Tar_descripcion":
            if (expresionesMTI.sololetras.test(e.target.value)) {
                document.getElementById('tareaD').classList.remove('parsley-error');
                document.getElementById('tareaDP').classList.remove('form_input-error-activo');
                camposMTI['Tar_descripcion'] = true;
            } else {
                document.getElementById('tareaD').classList.add('parsley-error');
                document.getElementById('tareaDP').classList.add('form_input-error-activo');
                camposMTI['Tar_descripcion'] = false;
            }
            break;
        case "Procesos[]":
            if (e.target.value == "") {
                camposMTI['checkbox'] = false;
            } else {
                camposMTI['checkbox'] = true;
            }
            break;
        case "Herramientas[]":
            if (e.target.value == "") {
                camposMTI['checkbox1'] = false;
            } else {
                camposMTI['checkbox1'] = true;
            }
            break;
    }
}

inputMTI.forEach((input) => {
    input.addEventListener('keyup', validarFormularioMantoTI);
    input.addEventListener('blur', validarFormularioMantoTI);

});



function validarCamposVaciosMantoTI() {

    // if (document.getElementById("checkboxP").checked == true && document.getElementById("checkboxH").checked == true) {
    //     var condicion = "si";
    // } else {
    //     condicion = "no";
    // }

    if (camposMTI.Tar_nombre && camposMTI.Tar_descripcion && camposMTI.checkbox && camposMTI.checkbox1) {
        return true;
    } else {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function () {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);
        return false;
    }
}
