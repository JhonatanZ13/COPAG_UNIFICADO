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
    checkbox2: false,
    checkbox3: false
}

const validarFormularioMantoOI = (e) => {
    var vacio = "";
    switch (e.target.name) {
        case "Odm_tecnico":
            if (expresionesMOI.sololetras.test(e.target.value)) {
                document.getElementById('tecnico').classList.remove('parsley-error');
                document.getElementById('tecnicoP').classList.remove('form_input-error-activo');
                camposMOI['Odm_tecnico'] = true;
            } else {
                document.getElementById('tecnico').classList.add('parsley-error');
                document.getElementById('tecnicoP').classList.add('form_input-error-activo');
                camposMOI['Odm_tecnico'] = false;
            }
            break;

        case "Odm_observaciones":
            if (expresionesMOI.novacio.test(e.target.value)) {
                document.getElementById('observacionI').classList.remove('parsley-error');
                document.getElementById('observacionIP').classList.remove('form_input-error-activo');
                camposMOI['Odm_observaciones'] = true;
            } else {
                document.getElementById('observacionI').classList.add('parsley-error');
                document.getElementById('observacionIP').classList.add('form_input-error-activo');
                camposMOI['Odm_observaciones'] = false;
            }
            break;
        case "Odm_observacionesFin":
            if (expresionesMOI.novacio.test(e.target.value)) {
                document.getElementById('observacionF').classList.remove('parsley-error');
                document.getElementById('observacionFP').classList.remove('form_input-error-activo');
                camposMOI['Odm_observacionesFin'] = true;
            } else {
                document.getElementById('observacionF').classList.add('parsley-error');
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
        case "Arti_id[]":
            if (e.target.value == "") {
                camposMOI['checkbox3'] = false;
            } else {
                camposMOI['checkbox3'] = true;
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
    var tecnico = $("#tecnico").val();
    var observacionI = $("#observacionI").val();
    var observacionF = $("#observacionF").val();
    var fechaI = $("#fechaI").val();
    var fechaF = $("#fechaF").val();
    var horaI = $("#horaI").val();
    var horaF = $("#horaF").val();

    if (fechaF < fechaI) {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function() {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);

        $("#fechaF").addClass("parsley-error");
        setTimeout(function() {
            $("#fechaF").removeClass("parsley-error");
        }, 10000);
        $('#fechaDFP').addClass('form_input-error-activo');
        setTimeout(function() {
            $('#fechaDFP').removeClass('form_input-error-activo');
        }, 10000);

        $("#fechaI").addClass("parsley-error");
        setTimeout(function() {
            $("#fechaI").removeClass("parsley-error");
        }, 10000);
        $('#fechaDIP').addClass('form_input-error-activo');
        setTimeout(function() {
            $('#fechaDIP').removeClass('form_input-error-activo');
        }, 10000);

        return false;
    }
    // andrecito hizo esto <3
    if (tecnico == "" || observacionI == "" || observacionF == "" || fechaI == "" || fechaF == "" || horaI == "" || horaF == "") {
        if (tecnico == "") {
            $("#tecnico").addClass("parsley-error");
            setTimeout(function() {
                $("#tecnico").removeClass("parsley-error");
            }, 10000);

            $('#tecnicoP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#tecnicoP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (observacionI == "") {
            $("#observacionI").addClass("parsley-error");
            setTimeout(function() {
                $("#observacionI").removeClass("parsley-error");
            }, 10000);
            $('#observacionIP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#observacionIP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (observacionF == "") {
            $("#observacionF").addClass("parsley-error");
            setTimeout(function() {
                $("#observacionF").removeClass("parsley-error");
            }, 10000);
            $('#observacionFP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#observacionFP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (fechaI == "") {
            $("#fechaI").addClass("parsley-error");
            setTimeout(function() {
                $("#fechaI").removeClass("parsley-error");
            }, 10000);
            $('#fechaIP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#fechaIP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (fechaF == "") {
            $("#fechaF").addClass("parsley-error");
            setTimeout(function() {
                $("#fechaF").removeClass("parsley-error");
            }, 10000);
            $('#fechaFP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#fechaFP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (horaI == "") {
            $("#horaI").addClass("parsley-error");
            setTimeout(function() {
                $("#horaI").removeClass("parsley-error");
            }, 10000);
            $('#horaIP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#horaIP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (horaF == "") {
            $("#horaF").addClass("parsley-error");
            setTimeout(function() {
                $("#horaF").removeClass("parsley-error");
            }, 10000);
            $('#horaFP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#horaFP').removeClass('form_input-error-activo');
            }, 10000);
        }

    }

    if (encargado == "" || maquina == "" || tipomantenimiento == "") {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function() {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);
        if (tipomantenimiento == "") {
            $("#tipomantenimiento").addClass("parsley-error");
            setTimeout(function() {
                $("#tipomantenimiento").removeClass("parsley-error");
            }, 10000);
            $('#tipomantenimientoP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#tipomantenimientoP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (encargado == "") {
            $("#encargado").addClass("parsley-error");
            setTimeout(function() {
                $("#encargado").removeClass("parsley-error");
            }, 10000);
            $('#encargadoP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#encargadoP').removeClass('form_input-error-activo');
            }, 10000);
        }
        if (maquina == "") {
            $("#maquina").addClass("parsley-error");
            setTimeout(function() {
                $("#maquina").removeClass("parsley-error");
            }, 10000);
            $('#maquinaP').addClass('form_input-error-activo');
            setTimeout(function() {
                $('#maquinaP').removeClass('form_input-error-activo');
            }, 10000);
        }
        return false;

    }
    if (tipomantenimiento == 20) {
        if (empresa == "") {
            document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
            setTimeout(function() {
                $("#mensaje_formulario").removeClass("mensaje_error-activo");
            }, 5000);
            $("#empresa").addClass("parsley-error");
            setTimeout(function() {
                $("#empresa").removeClass("parsley-error");
            }, 10000);
            return false;
        } else {
            return true;
        }
    } else if (tipomantenimiento != 20) {
        $("#empresa").prop('disabled', true);
    }


    if (camposMOI.Odm_tecnico && camposMOI.Odm_observaciones && camposMOI.Odm_observacionesFin && camposMOI.checkbox2 && camposMOI.checkbox3) {
        return true;
    } else {
        document.getElementById('mensaje_formulario').classList.add('mensaje_error-activo');
        setTimeout(function() {
            $("#mensaje_formulario").removeClass("mensaje_error-activo");
        }, 5000);
    }
    return false;
}