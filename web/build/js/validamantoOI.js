var formMOI = document.getElementById('AlertInsertOrden');
const formularioMOI = document.getElementById('AlertInsertOrden');
const inputMOI = document.querySelectorAll('#AlertInsertOrden input');
const textareaMOI = document.querySelectorAll('#AlertInsertOrden textarea');

const expresionesMOI = {
    sololetras: /^[^\s\d\W][A-Za-z\s]*$/,
    novacio: /^[^\s][\W\w\s]*$/,
}
const camposMOI = {
    Odm_tecnico: false,
    Odm_observaciones: false,
    Odm_observacionesFin: false,
    checkbox2: false
}

const validarFormularioMantoOI = (e) => {
    var vacio = "";
    switch (e.target.name) {
        case "Odm_tecnico":
            if (expresionesMOI.sololetras.test(e.target.value)) {
                document.getElementById('tecnico').classList.remove('selectVacio-error');
                document.getElementById('tecnicoP').classList.remove('form_input-error-activo');
                camposMOI['Odm_tecnico'] = true;
            } else {
                document.getElementById('tecnico').classList.add('selectVacio-error');
                document.getElementById('tecnicoP').classList.add('form_input-error-activo');
                camposMOI['Odm_tecnico'] = false;
            }
            break;

        case "Odm_observaciones":
            if (expresionesMOI.novacio.test(e.target.value)) {
                document.getElementById('observacionI').classList.remove('selectVacio-error');
                document.getElementById('observacionIP').classList.remove('form_input-error-activo');
                camposMOI['Odm_observaciones'] = true;
            } else {
                document.getElementById('observacionI').classList.add('selectVacio-error');
                document.getElementById('observacionIP').classList.add('form_input-error-activo');
                camposMOI['Odm_observaciones'] = false;
            }
            break;
        case "Odm_observacionesFin":
            if (expresionesMOI.novacio.test(e.target.value)) {
                document.getElementById('observacionF').classList.remove('selectVacio-error');
                document.getElementById('observacionFP').classList.remove('form_input-error-activo');
                camposMOI['Odm_observacionesFin'] = true;
            } else {
                document.getElementById('observacionF').classList.add('selectVacio-error');
                document.getElementById('observacionFP').classList.add('form_input-error-activo');
                camposMOI['Odm_observacionesFin'] = false;
            }
            break;
        case "Tar_id[]":
            if (e.target.value == "") {
                camposMOI['checkbox2'] = false;
            } else {
                camposMOI['checkbox2'] = true;
            }
            break;
    }
}

inputMOI.forEach((input) => {
    input.addEventListener('keyup', validarFormularioMantoOI);
    input.addEventListener('blur', validarFormularioMantoOI);

});
textareaMOI.forEach((textarea) => {
    textarea.addEventListener('keyup', validarFormularioMantoOI);
    textarea.addEventListener('blur', validarFormularioMantoOI);

});



function validarCamposVaciosMantoOI() {

    var encargado = $("#encargado").val();
    var maquina = $("#maquina").val();
    var tipomantenimiento = $("#tipomantenimiento").val();
    var empresa = $("#empresa").val();

    // andrecito hizo esto <3
    if (encargado == "" || maquina == "" || tipomantenimiento == "" || empresa == "") {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function () {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);
        if (tipomantenimiento == "") {
            $("#tipomantenimiento").addClass("selectVacio-error");
            setTimeout(function () {
                $("#tipomantenimiento").removeClass("selectVacio-error");
            }, 10000);

        }
        if (encargado == "") {
            $("#encargado").addClass("selectVacio-error");
            setTimeout(function () {
                $("#encargado").removeClass("selectVacio-error");
            }, 10000);

        }
        if (maquina == "") {
            $("#maquina").addClass("selectVacio-error");
            setTimeout(function () {
                $("#maquina").removeClass("selectVacio-error");
            }, 10000);

        }
        if (empresa == "") {
            $("#empresa").addClass("selectVacio-error");
            setTimeout(function () {
                $("#empresa").removeClass("selectVacio-error");
            }, 10000);

        }
        return false;
    }
    if (camposMOI.Odm_tecnico && camposMOI.Odm_observaciones && camposMOI.Odm_observacionesFin && camposMOI.checkbox2) {
        return true;
    } else {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function () {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);
        return false;
    }
}



