$(document).ready(function () {
  $(document).on("change","#subirFirma",function(){
        
    const seleccionArchivos = document.querySelector("#subirFirma"),
    imagenPrevisualizacion = document.querySelector("#prevfirma");
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
    imagenPrevisualizacion.src = "";
    return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagenPrevisualizacion.src = objectURL;
});

  $("#tablaordenproduccion").DataTable({

    "order": [ 0, "desc" ],

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

      },
          

    },
  });

  $("#elegirCliente").on("change", function () {
    var url = $(this).attr("data-url");
    $("#elegirCliente option:selected").each(function () {
      var elegido = $(this).val();
      if (elegido > 0) {
        $.ajax({
          url: url,
          data: "Emp_id=" + elegido,
          type: "POST",
          success: function (datos) {
            $("#contenedorCliente").html(datos);
          },
        });
      }else if( elegido == 0){
        $(".datosCliente").val('');
      }
    });
  });

  // Agregar sustrato

  $("#agregarSustrato").click(function(){
    var copy = $(".copysustrato").html();
    $(".sustratoContainer").append(
      "<div class='col-md-6'>"+
        "<div class='col-md-1 float-right'>"+
          "<button type='button' class='btn btn-danger position-absolute eliminarSustrato' style='z-index: 1;' data-toggle='tooltip' data-placement='bottom' title='Eliminar'>x</button>"+
        "</div>"
        +copy+
      "</div>"
    );
  });

  // Eliminar sustrato

  $(document).on("click",".eliminarSustrato", function(){

    //Se quedaba el tooltip abierto, esto lo soluciona
    var tooltip = $(this).attr("aria-describedby");
    $("#"+tooltip).remove();
    //fin

    $(this).parent().parent().remove();
    $(this).tooltip(close);
  });

  /* 
    ============ Calcular tiraje total =================
  */

  $(document).on("keyup", ".tirajePedido, .porcentajeDesperdicio",function(){
    //Busca el div padre
    var obj = $(this).parent().parent().parent();

    //Convierte el valor del div en numero
    var tirajePedido = parseInt(obj.find(".tirajePedido").val());
    var desperdicio = obj.find(".porcentajeDesperdicio").val();
    if(desperdicio > 100){
      obj.find(".porcentajeDesperdicio").val(100);
      desperdicio = 100;
    }else if(desperdicio < 0){
      obj.find(".porcentajeDesperdicio").val(0);
      desperdicio = 0;
    }
    //Calculo procentaje
    var tirajeTotal = tirajePedido + ((desperdicio * tirajePedido) / 100);

    //Busco el div tiraje total en los elementos del div padre y agrego el valor.
    if(tirajeTotal > 0){
      obj.find(".tirajeTotal").val(tirajeTotal);
    }else{
      obj.find(".tirajeTotal").val("");
    }
  });

  $(document).on("change", ".tirajePedido, .porcentajeDesperdicio",function(){
    //Busca el div padre
    var obj = $(this).parent().parent().parent();

    //Convierte el valor del div en numero
    var tirajePedido = parseInt(obj.find(".tirajePedido").val());
    var desperdicio = obj.find(".porcentajeDesperdicio").val();
    if(desperdicio > 100){
      obj.find(".porcentajeDesperdicio").val(100);
      desperdicio = 100;
    }else if(desperdicio < 0){
      obj.find(".porcentajeDesperdicio").val(0);
      desperdicio = 0;
    }
    //Calculo procentaje
    var tirajeTotal = tirajePedido + ((desperdicio * tirajePedido) / 100);

    //Busco el div tiraje total en los elementos del div padre y agrego el valor.
    if(tirajeTotal > 0){
      obj.find(".tirajeTotal").val(tirajeTotal);
    }else{
      obj.find(".tirajeTotal").val("");
    }
  });

  //Agregar tinta

  $("#agregarInsumo").click(function(){
    var copy = $(".copyInsumo").html();
    $(".tintaContainer").append(
      "<div class='col-md-6 col-sm-6'>"+
          "<div class='col-md-1 float-right'>"+
            "<button type='button' class='btn btn-danger eliminarInsumo position-absolute' style='z-index: 1;' data-toggle='tooltip' data-placement='bottom' title='Eliminar'>x</button>"+
          "</div>"+
            copy+
      "</div>"
    );
  });

  //Eliminar tinta

  $(document).on("click",".eliminarInsumo", function(){
    $(this).parent().parent().remove();
  });


  //Agregar pliego

  $("#agregarPliego").click(function(){
    var copy = $(".copyPliego").html();
    $(".pliegoContainer").append(
      "<div class='col-md-6 col-sm-6'>"+
      "<div class='col-md-1 float-right' id='botonEliminarSustrato'>"+
        "<button type='button' class='btn btn-danger position-absolute eliminarPliego' style='z-index: 1;' data-toggle='tooltip' data-placement='bottom' title='Eliminar'>x</button>"+
      "</div>"+
      copy
      +"</div>"
    );
  });

  //Eliminar pliego

  $(document).on("click",".eliminarPliego", function(){
    $(this).parent().parent().remove();
  });



  /*
  ====================================================================================
  ======================= Activar y desactuvar terminados ============================
  */


  $('.checkActivar').on('ifChanged', function(event){

    var obj = $(this).parent().parent().parent().parent();

    if(event.target.checked){
      obj.find(".inputActivar").removeAttr("disabled");
      obj.find(".iradio_flat-green").removeClass("disabled");
    }else{
      obj.find(".inputActivar").attr("disabled","disabled");
      obj.find(".inputActivar").val("");
      obj.find(".iradio_flat-green").removeClass("checked");
    }
    
  });

  $(document).on("click","#modalEliminar", function(){
    var url = $(this).attr("data-url");
    var id = $(this).attr("data-id");
    swal({
      title: '¿Desea eliminar esta orden?',
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
          data: "Odp_id="+id,
          type: "POST",
          success: function(){
              swal({
                title: 'Se a eliminado correctamente',
                icon: 'success'
              });
            setTimeout('document.location.reload()', 500);
          }
      });
      }
    });
    
  });
//
//
//actualizar orden Alerta
//
//
  /* $(document).on("submit","#formUpdateProduccion",function(){
    event.preventDefault();
    if(validarCamposVacios2() == true){
    swal({
      title: '¿Desea actualizar esta orden?',
      text: 'Se guardaran todos los cambios que realizo',
      type: 'info',
      icon: 'info',
      buttons: {
        confirm: {
          text: 'Actualizar',
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
  }
  }); */
//
//
//insertar orden Alerta
//
//
  /* $(document).on("submit","#formInsertProduccion",function(){
    event.preventDefault();
    if(validarCamposVacios() == true){
    swal({
      title: '¿Desea insertar esta orden?',
      text: 'Se insertaran todos los datos que lleno.',
      type: 'info',
      icon: 'info',
      buttons: {
        confirm: {
          text: 'Registrar orden',
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
  }
  }); */


  $("#alert").delay(1000).fadeOut();
  //$("#alert_reg").delay(4000).addClass("invisible");

});

//modal 
$(document).on("click","#modalAprobar", function(){
  var url = $(this).attr("data-url");
  var id = $(this).attr("data-id");
  swal({
    title: '¿Desea aprobar esta orden?',
    text: 'Se aprobara y se pondra su firma digital. \n Una vez aprobada no podra revertir esta accion a menos que edite la orden de produccion.',
    type: 'warning',
    icon: 'warning',
    buttons: {
      confirm: {
        text: 'Aprobar orden',
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
        data: "Odp_id="+id,
        type: "POST",
        success: function(){
            swal({
              title: 'Se aprobo la orden de produccion',
              icon: 'success'
            });
          setTimeout('document.location.reload()', 500);
        }
    });
    }
  });
  
});

$(document).on("click","#modalRechazar", function(){
  var url = $(this).attr("data-url");
  var id = $(this).attr("data-id");
  swal({
    title: '¿Desea rechazar esta orden?',
    text: 'Escriba el motivo del rechazo:',
    content: "input",
    type: 'warning',
    icon: 'warning',
    buttons: {
      confirm: {
        text: 'Sigiente',
        className: 'btn btn-success'
      },

      cancel: {
        visible: true,
        text: "Cancelar",
        className: 'btn btn-danger'
      }
    }
  }).then(function(value){
        var valor = value;
        swal({
          title: '¿Esta seguro de rechazar esta orden?',
          text: `Motivo del rechazo: ${value}`,
          type: 'warning',
          icon: 'warning',
          buttons: {
            confirm: {
              text: 'Confirmar rechazo',
              className: 'btn btn-success'
            },

            cancel: {
              visible: true,
              text: "Cancelar",
              className: 'btn btn-danger',
              closeModal: true
            }
          }
        }).then((Delete) => {
          if (Delete) {
            $.ajax({
              url: url,
              data: "Odp_id="+id+"&"+"Odp_motivoR="+valor,
              type: "POST",
              success: function(){
                  swal({
                    title: 'Se rechazo la orden de produccion',
                    icon: 'success'
                  });
                setTimeout('document.location.reload()', 500);
              }
            });
          }
        });
  }); 
});
