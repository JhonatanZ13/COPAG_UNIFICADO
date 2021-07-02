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

    /* =====================================================
                    INICIO PANEL
    =====================================================*/

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

    // inicio de panel
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

    //readonly para inputs
    $('.readonly').attr('readonly', true);

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

    // modales de panel de control
    $(document).on("click", "#inhabilitarPanel", function() {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var funcion = $(this).val();
        var objeto = $(this).attr("data-objeto");
        if (funcion == "Habilitar") {
            var text = "Habilitado";
        } else {
            var text = "Inhabilitado";
        }
        swal({
            title: '¿Deseas ' + funcion + ' este ' + objeto + '?',
            text: '',
            type: 'warning',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Aceptar',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    url: url,
                    data: name + "=" + id,
                    type: "POST",
                    success: function() {
                        swal({
                            title: 'Se ha ' + text + ' correctamente',
                            icon: 'success'
                        });
                        setTimeout('document.location.reload()', 2000);
                    }
                });
            }
        });

    });

    // VALIDACIOM DE PERFIL campos desabilitados
    $(document).on('click', '.readAndDisable', function() {
        // la funcion attr() nos permite colocar o leer atributos del elemento
        var rolUser = $(this).attr('data-rol');


        if (rolUser == 'Aprendiz') {
            $('.na').attr('readonly', true);
            $('.na').attr('disable', true);
        }

    });

    /* =====================================================
                    FIN PANEL
    =====================================================*/


    /* =====================================================
                    INICIO MANTENIMIENTO
    =====================================================*/

    $(".selector").on('click', 'select', function() {
        var value = $('.selector select').val();
        // var valueText=$('.selector select').text();
        console.log(value);


        if (value == 20) {

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

    //habilitar boton de pdf y eliminar orden  
    $(document).on("click", "#habilitar", function() {

        var td = $(this).parent('td');
        swal({
            title: '¿Desea Habilitar El campo Editar estado?',
            text: 'Si la maquina sigue en mantenimiento no habilitar',
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
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {

                $(this).submit();

                td.find("#botonpdf").show();
                td.find("#AlertDeleteReporte").show();
                td.find("#habilitar").hide();
                td.find("#inhabilitar").show();
                td.find("#ReportePdf").show();
            }

        });

    });

    //inhabilitar boton de pdf y borrar orden
    $(document).on("click", "#inhabilitar", function() {

        var td = $(this).parent('td');
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
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }
            td.find("#botonpdf").hide();
            td.find("#AlertDeleteReporte").hide();
            td.find("#habilitar").show();
            td.find("#inhabilitar").hide();
            td.find("#ReportePdf").hide();
        });

    });

    //habilitar estado
    $(document).on("click", "#habilitarEstado", function() {

        var td = $(this).parent('td');

        swal({
            title: '¿Desea Habilitar El campo Editar estado?',
            text: 'Si la maquina sigue en mantenimiento no habilitar',
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
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {

                $(this).submit();

                td.find("#botonModal").show();
                td.find("#inhabilitarestado").show();
                td.find("#habilitarEstado").hide();
            }

        });

    });
    //inhabilitar estado
    $(document).on("click", "#inhabilitarestado", function() {

        var td = $(this).parent('td');

        swal({
            title: '¿Desea Inhabilitar el campo Editar?',
            text: 'Si La Maquina sigue en mantenimiento inhabilitar',
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
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }
            td.find("#botonModal").hide();
            td.find("#inhabilitarestado").hide();
            td.find("#habilitarEstado").show();
        });


    });

    $(document).on("submit", "#AlertUpdateEstado", function() {
        event.preventDefault();
        swal({
            title: '¿Desea editar el estado de la maquina?',
            text: 'Se editara el estado de la maquina .',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Editar Estado',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();

            }

        });

    });

    //ALERTA DE CONFIRMACION INSERCION EN LA TABLA ORDENMANTENIMIENTO
    $(document).on("submit", "#AlertInsertOrden", function() {

        if (validarCamposVaciosMantoOI() == true) {
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
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $(this).submit();

                }

            });

        }
    });

    ////ALERTA DE CONFIRMACION INSERCION EN LA TABLA PROCESO
    $(document).on("submit", "#AlertModalProceso", function() {

        if (validarCamposVaciosMantoPI() == true) {
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
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $(this).submit();

                }
                AlertModalProceso.reset();
            });
        } else {

        }

    });

    ////ALERTA DE CONFIRMACION EDICION EN LA TABLA PROCESO
    $(document).on("submit", "#AlertModalUpdateProceso", function() {
        if (campos.Pro_nombre == true && campos.Pro_descripcion == true) {
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
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $(this).submit();
                }

            });
        }
    });

    ////ALERTA DE CONFIRMACION ELIMINACION EN LA TABLA PROCESO
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
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    url: url,
                    data: "Pro_id=" + id,
                    type: "POST",
                    success: function() {

                        setTimeout('document.location.reload()', 1000);
                    }
                });
            }
        });

    });

    ////ALERTA DE CONFIRMACION ELIMINACION EN LA TABLA ORDENMANTO
    $(document).on("click", "#AlertDeleteReporte", function() {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        swal({
            title: '¿Desea eliminar la Orden? SOLO CUANDO SEA NECESARIO',
            text: 'Si la elimina se perderan Las Tareas y Procesos',
            type: 'warning',
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Eliminar',
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
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

    ////ALERTA DE CONFIRMACION ELIMINACION EN LA TABLA TAREA

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
                    className: 'btn btn-success'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
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

    //ALERTA DE CONFIRMACION INSERCION EN LA TABLA ORDENMANTENIMIENTO
    $(document).on("submit", "#AlertInsertOrden", function() {

        if (validarCamposVaciosMantoOI() == true) {
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
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $(this).submit();

                }

            });
        }
    });

    ////ALERTA DE CONFIRMACION EDITAR EN LA TABLA TAREA
    $(document).on("submit", "#FormConfirmacionUpdate", function() {
        if (validarCamposVaciosMantoTU() == true) {
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
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $(this).submit();
                }
            });
        }
    })


    /* =====================================================
                    FIN mantenimiento
    =====================================================*/
});