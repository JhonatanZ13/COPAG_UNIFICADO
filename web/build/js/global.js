$(document).ready(function() {

    $(document).on("click", ".menu", function() {
        var estado = $("#logo").attr("data-estado");

        if (estado == 1) {
            $("#logo").attr("src", "images/logo-pequeño.png");
            $("#logo").attr("width", "40px");
            $("#logo").attr("style", "margin-left:5px");
            $("#logo").attr("data-estado", "2");
        } else {
            $("#logo").attr("src", "images/logo.png");
            $("#logo").attr("width", "140px");
            $("#logo").attr("style", "margin-left:15px");
            $("#logo").attr("data-estado", "1");
        }
    });

    $(document).on("change", "#selectDepto", function() {
        var id = $(this).val();
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                $("#selectCiudad").html(datos);
            }
        })

    })

    $(document).on("change", "#imagen", function() {
        var img = $(this).val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            data: "img=" + img,
            type: "POST",
            success: function(datos) {
                $("#chargeImage").html(datos);
            }
        })
    })

    $(document).on("click", "#botonModal", function() {
        var url = $(this).attr('data-url');
        var titulo = $(this).val();
        var datos = $(this).attr('data-id');

        if (datos == "") {
            datos == 0;
        }

        $.ajax({
            url: url,
            data: "datos=" + datos,
            type: "POST",
            success: function(datos) {
                $("#contenedor").html(datos);
                $("#titulo").html(titulo);
                $("#modal").modal("show");
            }
        });
    });

    $(document).on("change", "#seleccionArchivos", function() {

        const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
            $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
        // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = $seleccionArchivos.files;
        // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }
        // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        const primerArchivo = archivos[0];
        // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(primerArchivo);
        // Y a la fuente de la imagen le ponemos el objectURL
        $imagenPrevisualizacion.src = objectURL;
    });

    $("#table").DataTable({

        responsive: true,
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de _MAX_ registros Totales)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Numero de filas _MENU_",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron resultados",
            "paginate": {

                "first": "Primero",
                "last": "Ultimo",
                "next": "Proximo",
                "previous": "Anterior"

            }

        },

    });

    $(document).on("click", "#showMore", function() {
        var status = $("#showMore").attr("data-status");

        if (status == 0) {
            $('.containerLogin').children().first().next().next().html('<p>Por favor digite el correo electronico con el que fue registrado en el sistema de informacion COPAG</p>');

            $("#showMore").attr("data-status", "1");
        } else if (status == 1) {

            $('.containerLogin').children().first().next().next().empty();

            $("#showMore").attr("data-status", "0");
        }

        if (status == 2) {
            $('.containerLogin').children().first().next().next().html('<p>Por favor digite el codigo que le fue enviado al correo electronico con el que fue registrado en el sistema de informacion COPAG</p>');

            $("#showMore").attr("data-status", "3");
        } else if (status == 3) {

            $('.containerLogin').children().first().next().next().empty();

            $("#showMore").attr("data-status", "2");
        }

    });

});


//este es una prueba para colocar todos los views en readonly

$(document).ready(function() {
    // la funcion attr() nos permite colocar o leer atributos del elemento
    $('.readonly').attr('readonly', true);
});

$(document).ready(function() {
    

    // inventario
    /**Modal */
    $(document).on("click", ".botonModal", function() {
        var url = $(this).attr("data-url");
        var dato = $(this).attr("data-id");

        if (dato == "") {
            dato = 0;
        }

        $.ajax({
            url: url,
            data: "datos=" + dato,
            type: "POST",
            success: function(datos) {
                $("#contenedor").html(datos);
                $("#modal-title").html(title); //titulo de la modal Ok no tocar 🚫
                $("#modal").modal("show");
            },
        });
    });
    /*Modal*/

    /*¨*Clonador del div entrada masiva */
    function Clonador() {
        contenido = $(".shadow:first-child")
            .clone()
            .prepend(
                "<div class='my-1 mb-0'>" +
                "<button type='button' id='eliminar' class='btn btn-danger float-right'>" +
                "<i class='fa fa-times'></i>" +
                "</button>" +
                "</div>"
            )
            .css({ animation: "slideInDown", "animation-duration": "1s" })
            .appendTo("#conten");
        $("#send").prop("disabled", true);
    }
    $("#agregarDiv").click(Clonador);
    /*¨Clonador del div entrada masiva*/
    /*¨*Validar Campos */
    $(document).on("change", function() {
        seleccion = $("select");
        entrada = $("input");

        var campos = $("select").length + $("input").length;
        var habilitarEnvio = 0;

        $.each(seleccion, function(indice, valor) {
            if ($(valor).val() > 0) {
                habilitarEnvio++;
            }
        });
        $.each(entrada, function(indice, valor) {
            if ($(valor).val() > 0) {
                habilitarEnvio++;
            }
        });
        if (habilitarEnvio == campos) {
            $("#send").prop("disabled", false);
        } else {
            $("#send").prop("disabled", true);
        }
    });
    /*¨*Validar Campos*/

    /*¨*Eliminar el div agreagado */
    $(document).on("click", "#eliminar", function() {
        $(this).parent().parent().remove();
    });
    /*¨Eliminar el div agreagado*/

    $("select").focusin(function() {
        $(this).addClass("border border-info");
    });

    /**Envio el valor del selector tipo materia */
    $(document).on("change", "#tipo", function() {
        var cualquier = $(this).parent().parent();
        var id = $(this).val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                cualquier
                    .find("#Articulos")
                    .html("<option value='0'>Selecione...</option>" + datos);
            },
        });
    });
    /*Envio el valor del selector tipo materia*/

    /**mensaje agrego exitosamente */
    $("#message").css({ animation: "slideInDown", "animation-duration": "1s" });
    setTimeout(function() {
        $("#message").fadeOut();
    }, 3000);
    /*Mensaje agrego exitosamente*/

    /**Agregar una nueva car con pulsar el + */
    $(document).keypress(function(eTecla) {
        if (eTecla.which == 43) {
            Clonador();
        }
    });
    /*Agregar una nueva car con pulsar el +*/


});