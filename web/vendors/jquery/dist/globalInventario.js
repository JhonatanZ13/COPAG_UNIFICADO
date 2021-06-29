// $(document).ready(function () {
//   $(document).on("click", ".menu", function () {
//     var estado = $("#logo").attr("data-estado");

//     if (estado == 1) {
//       $("#logo").attr("src", "images/logo-pequeño.png");
//       $("#logo").attr("width", "40px");
//       $("#logo").attr("style", "margin-left:5px");
//       $("#logo").attr("data-estado", "2");
//     } else {
//       $("#logo").attr("src", "images/logo.png");
//       $("#logo").attr("width", "140px");
//       $("#logo").attr("style", "margin-left:15px");
//       $("#logo").attr("data-estado", "1");
//     }
//   });

//   /**Modal */
//   $(document).on("click", ".botonModal", function () {
//     var url = $(this).attr("data-url");
//     var dato = $(this).attr("data-id");

//     if (dato == "") {
//       dato = 0;
//     }

//     $.ajax({
//       url: url,
//       data: "datos=" + dato,
//       type: "POST",
//       success: function (datos) {
//         $("#contenedor").html(datos);
//         $("#modal-title").html(title); //titulo de la modal Ok no tocar 🚫
//         $("#modal").modal("show");
//       },
//     });
//   });
//   /*Modal*/
//   /**Tablas en español*/
//   $("#table-inventario").DataTable({
//     responsive: true,
//     language: {
//       "decimal": "",
//       "emptyTable": "No hay datos",
//       "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
//       "infoEmpty": "Mostrando 0 a 0 de 0 registros",
//       "infoFiltered": "(Filtro de _MAX_ registros Totales)",
//       "infoPostFix": "",
//       "thousands": ",",
//       "lengthMenu": "Numero de filas _MENU_",
//       "loadingRecords": "Cargando...",
//       "processing": "Procesando...",
//       "search": "Buscar:",
//       "zeroRecords": "No se encontraron resultados",
//       "paginate": {

//         "first": "Primero",
//         "last": "Ultimo",
//         "next": "Proximo",
//         "previous": "Anterior"

//       },


//     },
//   });
//   /*Tablas en español*/
//   /*¨*Clonador del div entrada masiva */
//   function Clonador() {
//     contenido = $(".shadow:first-child")
//       .clone()
//       .prepend(
//         "<div class='my-1 mb-0'>" +
//           "<button type='button' id='eliminar' class='btn btn-danger float-right'>" +
//           "<i class='fa fa-times'></i>" +
//           "</button>" +
//           "</div>"
//       )
//       .css({ animation: "slideInDown", "animation-duration": "1s" })
//       .appendTo("#conten");
//     $("#send").prop("disabled", true);
//   }
//   $("#agregarDiv").click(Clonador);
//   /*¨Clonador del div entrada masiva*/
//   /*¨*Validar Campos */
//   $(document).on("change", function () {
//     seleccion = $("select");
//     entrada = $("input");

//     var campos = $("select").length + $("input").length;//3
//     var habilitarEnvio = 0;

//     $.each(seleccion, function (indice, valor) {
//       if ($(valor).val() > 0) {
//         habilitarEnvio++;
//       }
//     });
//     $.each(entrada, function (indice, valor) {
//       let inputValor=$(valor).val();

//       if (inputValor > 0) {
//         habilitarEnvio++;
//       }

//     });
//     if (habilitarEnvio == campos) {
//       $("#send").prop("disabled", false);
//     } else {
//       $("#send").prop("disabled", true);
//     }
//   });
//   /*¨*Validar Campos*/

//   /*¨*Eliminar el div agreagado */
//   $(document).on("click", "#eliminar", function () {
//     $(this).parent().parent().remove();
//   });
//   /*¨Eliminar el div agreagado*/

//   $("select").focusin(function () {
//     $(this).addClass("border border-info");
//   });

//   /**Envio el valor del selector tipo materia */
//   $(document).on("change", "#tipo", function () {
//     var cualquier = $(this).parent().parent();
//     var id = $(this).val();
//     var url = $(this).attr("data-url");
//     $.ajax({
//       url: url,
//       data: "id=" + id,
//       type: "POST",
//       success: function (datos) {
//         cualquier
//           .find("#Articulos")
//           .html("<option value='0'>Selecione...</option>" + datos);
//       },
//     });
//   });
//   /*Envio el valor del selector tipo materia*/
//   var cantidadGlobal =0;
//   $(document).on("change", "#Articulos", function () {
//     let cantidad;
//     var padre = $(this).parent().parent();
//     var vale = $(this).val();
//     var url = $(this).attr("data-url");

//     $.ajax({
//       url: url,
//       data: "vale=" + vale,
//       type: "POST",
//       success: function (datos) {
//           cantidadGlobal=datos;
//           cantidad=datos;
//           console.log(cantidad);

//           padre.find("#contieneInput")
//           .html('<label for="Arti_cantidad">Cantidad</label>'+
//           '<input type="number" id="Arti_cantidad" name="Arti_cantidad[]" class="form-control" min="0" max="'+cantidad+'">'+
//           '<input id="nomeven" type="hidden" value="'+cantidad+'">');
//       },
//     });
//   });

//   $(document).on("keyup","#Arti_cantidad",function () { 
//     let padre = $(this).parent().parent();
//     let can = padre.find("#nomeven").val();
//     let esteinput =parseInt($(this).val());
//     if (esteinput>cantidadGlobal) {
//       padre.find("#Arti_cantidad").val(cantidadGlobal);
//     }
//   });

//   /**mensaje agrego exitosamente */
//   $("#message").css({ animation: "slideInDown", "animation-duration": "1s" });
//   setTimeout(function () {
//     $("#message").fadeOut();
//   }, 3000);
//   /*Mensaje agrego exitosamente*/

//   /**Agregar una nueva car con pulsar el + */
//   $(document).keypress(function (eTecla) {
//     if (eTecla.which == 43) {
//       Clonador();
//     }
//   });
//   /*Agregar una nueva car con pulsar el +*/
// });