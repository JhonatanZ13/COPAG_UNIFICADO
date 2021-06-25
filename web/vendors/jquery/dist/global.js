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
    $("#datatable-responsive").DataTable({

        responsive: true,
        language: {
            "decimal": "",
            "emptyTable": "No hay datos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(Filtro de MAX registros Totales)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Buscar _MENU_ registros",
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


    $(document).on("click", "#botonModal", function() {
        var url = $(this).attr('data-url');
        var datos = $(this).val();
        if (datos == "") {
            datos == 0;
        }

        $.ajax({
            url: url,
            data: "datos=" + datos,
            type: "POST",
            success: function(datos) {
                $("#contenedor").html(datos);

                $("#Modal").modal("show");
            }
        });
    });
    //empresa desactivada
    $(".selector").on('click', 'select', function() {
        var value = $('.selector select').val();
        console.log(value);


        if (value == 6) {
            $(this).closest('.contenedor_de_datos').find('.empresa_desactivada').show();
        } else {
            $(this).closest('.contenedor_de_datos').find('.empresa_desactivada').hide();
            document.getElementsByClassName("limpiarinput")[0].value = "";
            document.getElementsByClassName("empresa_elegida")[0].value = "";

        }
    });
    //tareas procesos
    $(".tareasbox").on('change', function() {
        var array = [];
        $("#procesoscontenedor").html("");
        $(".tareasbox:checked").each(function() {
            var id_tarea = $(this).val();
            array.push(id_tarea);

            // console.log(id_tarea);

        });
        console.log(array);
        var url = $(this).eq(0).attr("data-url");
        var jsonString = JSON.stringify(array);
        $.ajax({
            url: url,
            data: { data: jsonString },
            type: "POST",
            success: function(datos) {
                $("#procesoscontenedor").append(datos);
                //console.log(datos);

            }
        });

    });
    //tareas herramientas
    $(".tareasbox").on('change', function() {
        var array = [];
        $("#herramientascontenedor").html("");
        $(".tareasbox:checked").each(function() {
            var id_tarea = $(this).val();
            array.push(id_tarea);

            // console.log(id_tarea);

        });
        console.log(array);
        var url = $(this).eq(0).attr("data-url2");
        var jsonString = JSON.stringify(array);
        $.ajax({
            url: url,
            data: { data: jsonString },
            type: "POST",
            success: function(datos) {
                $("#herramientascontenedor").append(datos);
                //console.log(datos);

            }
        });

    });
    //fin

    //habilitar boton de estados en gestion maquina  


    $(document).on("click", "#habilitar", function() {

        var botoninhabilitar = $("#habilitar").val();
        swal({
            title: '¿Desea Hablitar los campos pdf y eliminar?',
            text: 'Se hablitara los campos.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: ' Aceptar',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }
            $("#botonpdf").show();
            $("#AlertDeleteReporte").show();

        });

    });
    $(document).on("click", "#inhabilitar", function() {

        var botoninhabilitar = $("#inhabilitar").val();
        swal({
            title: '¿Desea Inhabilitar los campos pdf y eliminar?',
            text: 'Si ya estan inhabilitados no inhabilitara',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: ' Aceptar',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }
            $("#botonpdf").hide();
            $("#AlertDeleteReporte").hide();

        });







        //alert(botoninhabilitar);
    });


    //alerta para preguntar si quiere habilitar

    // $(document).on("click","#habilitar",function(){

    //   swal("Good job!", "Acabas de Hablitar los campos", "success");

    // });
    // $(document).on("click","#inhabilitar",function(){

    //   swal("Good job!", "Acabas de inhabilitar los campos", "success");

    // });









    $(document).on("submit", "#AlertInsertOrden", function() {
        event.preventDefault();
        swal({
            title: '¿Desea Generar esta Orden de mantenimieto?',
            text: 'Se insertaran todos los datos que lleno.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Registrar Orden',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }

        });

    });

    //
    $(document).on("submit", "#AlertModalProceso", function() {
        event.preventDefault();
        swal({
            title: '¿Desea Insertar este proceso?',
            text: 'Se insertaran todos los datos que lleno.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Registrar Proceso',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }

        });

    });
    //
    $(document).on("submit", "#AlertModalUpdateProceso", function() {
        event.preventDefault();
        swal({
            title: '¿Desea Editar este proceso?',
            text: 'Se editaran todos los datos que lleno.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Editar Proceso',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }

        });

    });


    $(document).on("click", "#AlertDelete", function() {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");

        swal({
            title: '¿Desea eliminar El proceso?',
            text: 'Si el proceso está relacioando con una tarea no se eliminara.',

            type: 'warning',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Eliminar',
                    className: 'btn btn-danger'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    url: url,
                    data: "pro_id=" + id,
                    type: "POST",
                    success: function() {

                        setTimeout('document.location.reload()', 1000);
                    }
                });
            }
        });

    });

    $(document).on("click", "#AlertDeleteReporte", function() {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        swal({
            title: '¿Desea eliminar la Orden?',
            text: 'Si la elimina se perderan todos los datos.',
            type: 'warning',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Eliminar',
                    className: 'btn btn-danger'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    url: url,
                    data: "Odm_id=" + id,
                    type: "POST",
                    success: function() {

                        swal({

                            title: 'Se a eliminado correctamente',
                            icon: 'success'
                        });
                        setTimeout('document.location.reload()', 1000);
                    }
                });
            }
        });

    });



    $(document).on("click", "#ModalDelete", function() {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        swal({
            title: '¿Desea eliminar La tarea?',
            text: 'Si la elimina se perderan todos los datos.',
            type: 'warning',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Eliminar',
                    className: 'btn btn-danger'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    url: url,
                    data: "Tar_id=" + id,
                    type: "POST",
                    success: function() {
                        swal({
                            title: 'Se a eliminado correctamente',
                            icon: 'success'
                        });
                        setTimeout('document.location.reload()', 1000);
                    }
                });
            }
        });

    });

    $(document).on("submit", "#FormConfirmacion", function() {
        event.preventDefault();
        swal({
            title: '¿Desea insertar esta Tarea?',
            text: 'Se insertaran todos los datos que lleno.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Registrar Tarea',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }

        });

    });

    $(document).on("submit", "#FormConfirmacionUpdate", function() {
        event.preventDefault();
        swal({
            title: '¿Desea Editar esta Tarea?',
            text: 'Se Editaran todos los datos que modifique.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Editar Tarea',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-primary'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }
        });
    });


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
    /**Tablas en español*/
    $("#table").DataTable({
        language: {
            processing: "Procesando...",
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            info: "Mostrando  _START_ a _END_ de _TOTAL_ entradas",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            search: "Buscar:",
            infoThousands: ",",
            loadingRecords: "Cargando...",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });
    /*Tablas en español*/
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