var formMTU = document.getElementById('FormConfirmacionUpdate');
const formularioMTU = document.getElementById('FormConfirmacionUpdate');
const inputMTU = document.querySelectorAll('#FormConfirmacionUpdate input');

const expresionesMTU = {
    solonumeros: /^[0-9]*$/, // numeros
    solonumeros2: /^[\s0-9][^a-zA-z]*$/,
    corte: /^[^a-zA-Z\D][0-9]*[.]*[^\D][0-9]* x [0-9]*[.]*[^\D][0-9]*[^a-zA-Z-_]*cm$/,
    sololetras: /^[^\s\d\W][A-Za-z\s]*$/,
    tinta: /^#[a-zA-Z0-9]{6}$/
}

const camposMTU = {
    Tar_nombre: true,
    Tar_descripcion: true,
    checkbox: true,
    checkbox1: true
}

const validarFormularioMantoTU = (e) => {
    var vacio = "";
    switch (e.target.name) {
        case "Tar_nombre":
            if (expresionesMTU.sololetras.test(e.target.value)) {
                document.getElementById('tareaN').classList.remove('parsley-error');
                document.getElementById('tareaNP').classList.remove('form_input-error-activo');
                camposMTU['Tar_nombre'] = true;
            } else {
                document.getElementById('tareaN').classList.add('parsley-error');
                document.getElementById('tareaNP').classList.add('form_input-error-activo');
                camposMTU['Tar_nombre'] = false;
            }
            break;
        case "Tar_descripcion":
            if (expresionesMTU.sololetras.test(e.target.value)) {
                document.getElementById('tareaD').classList.remove('parsley-error');
                document.getElementById('tareaDP').classList.remove('form_input-error-activo');
                camposMTU['Tar_descripcion'] = true;
            } else {
                document.getElementById('tareaD').classList.add('parsley-error');
                document.getElementById('tareaDP').classList.add('form_input-error-activo');
                camposMTU['Tar_descripcion'] = false;
            }
            break;
        case "Procesos[]":
            if (e.target.value == "") {
                camposMTU['checkbox'] = false;
            } else {
                camposMTU['checkbox'] = true;
            }
            break;
        case "Herramientas[]":
            if (e.target.value == "") {
                camposMTU['checkbox1'] = false;
            } else {
                camposMTU['checkbox1'] = true;
            }
            break;
    }
}

inputMTU.forEach((input) => {
    input.addEventListener('keyup', validarFormularioMantoTU);
    input.addEventListener('blur', validarFormularioMantoTU);

});



function validarCamposVaciosMantoTU() {

    if (camposMTU.Tar_nombre && camposMTU.Tar_descripcion && camposMTU.checkbox && camposMTU.checkbox1) {
        return true;
    } else {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function () {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);
        return false;
    }
}
