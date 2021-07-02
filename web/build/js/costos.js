var v=true;
$("span.text-danger").hide();

function verificar(){

  var v1=0,v2=0,v3=0,v4=0,v5=0,v6=0;
  v1=validacion('Soc_area');
  v2=validacion('birthday');
  v3=validacion('selectRegio');
  v4=validacion('Soc_nom_je');
  v5=validacion('Soc_servidorp');
  v6=validacion('Soc_DNI_jefeOficina');
  v7=validacion('Soc_DNI_servidorPublico');
  v8=validacion('Soc_ficha');
  

  if (v1===false || v2===false || v3===false || v4===false || v5===false || v6===false || v7===false  || v8===false ) {
    $("#exito").hide();
    $("#error").show();
}else{
   $("#error").hide();
   $("#exito").show();
}

}

function validacion(campo){
  var a=0;
  
  if (campo==='Soc_area')
  {
      Soc_area = document.getElementById(campo).value;
      if( Soc_area == null || Soc_area.length == 0 || /^\s+$/.test(Soc_area) ) {
       
          $('#'+campo).attr("class", "form-control is-invalid");
          $('#'+campo).parent().children("span").text("campo vacio").show();
          return false;
         
      }
      else
      {  
              $('#'+campo).attr("class", "form-control is-valid");
              $('#'+campo).parent().children("span").text("").show();
              return true;
          }  
      
  }
  if (campo==='birthday'){
      birthday = document.getElementById(campo).value;
      if( birthday == null || birthday.length == 0 || /^\s+$/.test(birthday)  ) {
          
          $('#'+campo).attr("class", "date-picker form-control is-invalid");
          $('#'+campo).parent().children("span").text("campo vacio").show();
          return false;
          
      }
      else{
          $('#'+campo).attr("class", "date-picker form-control is-valid");
          $('#'+campo).parent().children("span").text("").show();
          return true;
          
      } 
  }

  
  if (campo==='birthday'){
    birthday = document.getElementById(campo).value;
    if( birthday == null || birthday.length == 0 || /^\s+$/.test(birthday)  ) {
        
        $('#'+campo).attr("class", "date-picker form-control is-invalid");
        $('#'+campo).parent().children("span").text("campo vacio").show();
        return false;
        
    }
    else{
        $('#'+campo).attr("class", "date-picker form-control is-valid");
        $('#'+campo).parent().children("span").text("").show();
        return true;
        
    } 
}

if (campo==='selectRegio'){
  indice = document.getElementById(campo).selectedIndex;
  if( indice == null || indice == 0 ) {
      $('#selectRegio').attr("class", "form-control is-invalid");
      $('#selectCentro').attr("class", "form-control is-invalid");
      return false;
  }
  else{
      $('#selectRegio').attr("class", "form-control is-valid");
      $('#selectCentro').attr("class", "form-control is-valid");
      return true;

  }
}

if (campo==='Soc_nom_je')
{
    Soc_nom_je = document.getElementById(campo).value;
    if( Soc_nom_je == null || Soc_nom_je.length == 0 || /^\s+$/.test(Soc_nom_je) ) { 
        $('#'+campo).attr("class", "date-picker form-control is-invalid");
        $('#'+campo).parent().children("span").text("campo vacio").show();
        return false;
       
    }
    else
    {  
            $('#'+campo).attr("class", "date-picker form-control is-valid");
            $('#'+campo).parent().children("span").text("").show();
            return true;
        }  
    
}


if (campo==='Soc_servidorp')
{
    Soc_servidorp = document.getElementById(campo).value;
    if( Soc_servidorp == null || Soc_servidorp.length == 0 || /^\s+$/.test(Soc_servidorp) ) { 
        $('#'+campo).attr("class", "date-picker form-control is-invalid");
        $('#'+campo).parent().children("span").text("campo vacio").show();
        return false;
       
    }
    else
    {  
            $('#'+campo).attr("class", "date-picker form-control is-valid");
            $('#'+campo).parent().children("span").text("").show();
            return true;
        }  
    
}

if (campo==='Soc_DNI_jefeOficina')
{
    Soc_DNI_jefeOficina = document.getElementById(campo).value;
    if( Soc_DNI_jefeOficina == null || Soc_DNI_jefeOficina.length == 0 || /^\s+$/.test(Soc_DNI_jefeOficina) ) { 
        $('#'+campo).attr("class", "date-picker form-control is-invalid");
        $('#'+campo).parent().children("span").text("campo vacio").show();
        return false;
       
    }
    else
    {  
            $('#'+campo).attr("class", "date-picker form-control is-valid");
            $('#'+campo).parent().children("span").text("").show();
            return true;
        }  
    
}

if (campo==='Soc_DNI_servidorPublico')
{
    Soc_DNI_servidorPublico = document.getElementById(campo).value;
    if( Soc_DNI_servidorPublico == null || Soc_DNI_servidorPublico.length == 0 || /^\s+$/.test(Soc_DNI_servidorPublico) ) { 
        $('#'+campo).attr("class", "date-picker form-control is-invalid");
        $('#'+campo).parent().children("span").text("campo vacio").show();
        return false;
       
    }
    else
    {  
            $('#'+campo).attr("class", "date-picker form-control is-valid");
            $('#'+campo).parent().children("span").text("").show();
            return true;
        }  
    
}

if (campo==='Soc_ficha')
{
    Soc_ficha = document.getElementById(campo).value;
    if( Soc_ficha == null || Soc_ficha.length == 0 || /^\s+$/.test(Soc_ficha) ) { 
        $('#'+campo).attr("class", "date-picker form-control is-invalid");
        $('#'+campo).parent().children("span").text("campo vacio").show();
        return false;
       
    }
    else
    {  
            $('#'+campo).attr("class", "date-picker form-control is-valid");
            $('#'+campo).parent().children("span").text("").show();
            return true;
        }  
    
}





}


//compras


$(document).ready(function(){


  var item = document.getElementById('item');            
  var agrega=
  "<button type='button' id='agrega' class='col-8 form-control btn-success'><i class='fa fa-plus-square-o pl-1' ></i></button>";

       function contadorD(){
          var $divs = $(".delete").toArray().length;
          return $divs;
       }
       function contadorItem(){
          var numItem = $(".item").toArray().length;
          //var numItem = document.getElementsByClassName("item").length;
         numItem=numItem+1;
          console.log(numItem);
          return numItem;
       }



  $(document).on('click','#agrega',function(){
  
          $("#agrega").remove();

          var clon = $("#clon").html();

          $("#contenedor").append(

          "<div class='form col-md-10 row ml-4'>"+clon
          + "<div class='col-2'><button type='button' class='delete ml-3 btn btn-danger btn-sm'><i class='fa fa-trash pl-1' ></i></button></div>"
          +agrega
          +"</div> "


          );

return false;


  });

  $(document).on("keyup",".validar",function(){	
          var campo=$(this).val();

          if (campo.length >= 1) {
           if (contadorD()==0 ) {
                  $("#agrega").remove();
                  $("#clon").append(
                          agrega
                          ); 
           }


                }


              

  });

  $(document).on('click','.delete',function(){ 
        var  finalEliminar=contadorD();

          $(this).parent().parent().remove();
          var cont=0;
          if (contadorD()==0 ) {
                  $("#agrega").remove();
                  $("#clon").append(
                          agrega
                          ); 
                          cont++;
          }

                if (cont==0 ) {
                  if (contadorD()!= finalEliminar) {
                          $("#agrega").remove();
                          $("#contenedor").append( 
                                  "<div class='form col-12 row ml-5'>"
                                  +agrega
                                  +"</div> "
                                  ); 


                        }
                } 




  });




});

$(document).on("change", "#selectRegio", function() {
  var id = $(this).val();
  console.log(id);
  var url = $(this).attr("data-url");
  $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function(datos) {
          $("#selectCentro").html(datos);
      }
  })

})








//fin compras


//modal compras
$(document).ready(function () {

  $(document).on("click",".botonModal",function(){
		var url=$(this).attr("data-url");
		var datos=$(this).attr("data-id");

  swal({
    title:'¿Desea eliminar la solicitud de compras?',
    icon:'warning',
    buttons:{
      confirm:{
        text:"Eliminar",
        className:"btn btn-danger"
      },

      cancel:{
        text:"Cancelar",
        className:"btn btn-success",
        visible:true
      }
    },
    
  }).then((Delete)=>{
      if(Delete){

        $.ajax({
          url:url,
          data:"Soc_id="+datos,
          type:"POST",
          success:function(){
            swal("Se eliminado a exitosamente", "", "success");
          }
        });

        setTimeout('document.location.reload()',1000);

      }
  });

		
	});
// modal fin


$("#solicompras").submit(function (event) {
  var mensaje = "";
  var errores = 0;

  if (!validarRegCompras()) {
    mensaje = mensaje + "<br>*Por favor seleccione el regional.";
    errores++;
  }

  if (!validarCenCompras()) {
    mensaje = mensaje + "<br>*Por favor seleccione el centro.";
    errores++;
  }

  
  if (!validarArea()) {
    mensaje = mensaje + "<br>*Por favor escriba el area.";
    errores++;
  }

  if (!validarJefeO()) {
    mensaje = mensaje + "<br>*Por favor escriba el nombre del coridnador de area .";
    errores++;
  }



  if (!validarServidorp()) {
    mensaje = mensaje + "<br>*Por favor escriba el nombre del servidor publico .";
    errores++;
  }


  if (!validardocjefeO()) {
    mensaje = mensaje + "<br>*Por favor escriba el  documento del cordinador de area.";
    errores++;
  }

  

  
  if (!validardocServidorp()) {
    mensaje = mensaje + "<br>*Por favor escriba el  documento del servidor publico.";
    errores++;
  }

   
  if (!validardescripB()) {
    mensaje = mensaje + "<br>*Por favor seleccione la descripcion del bien.";
    errores++;
  }

   
  if (!validaruMedida()) {
    mensaje = mensaje + "<br>*Por favor seleccione unidad de medida.";
    errores++;
  }

    
  if (!validarCantidad()) {
    mensaje = mensaje + "<br>*Por favor escriba la cantidad.";
    errores++;
  }

    
  if (!validarObservacion()) {
    mensaje = mensaje + "<br>*Por favor escriba las observaciones.";
    errores++;
  }


 

  //Resultado final
  if (errores > 0) {
    alertCompras("danger", "Error!", mensaje);

    swal("Error!", "Por favor verifica los datos.", "error");
    event.preventDefault();
  } else {
     swal("Exito!", "Mensaje!", "success");
    return;
  }
});


function alertCompras(tipo, title, text) {
  var alerta =
    "<div class='alert alert-" +
    tipo +
    " alert-dismissible fade show' role='alert'>" +
    "<strong>" +
    title +
    "!</strong><br> " +
    text +
    "" +
    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
    "<span aria-hidden='true'>&times;</span>" +
    "</button>" +
    "</div>";

  $("#contentAlertCompras").html(alerta);
}

function validarRegCompras() {
  var value = $("#selectRegio").val();
  if (value == 0) {
    return false;
  } else {
    return true;
  } 

}

function validarCenCompras() {
  var value = $("#selectCentro").val();
  if (value == 0) {
    return false;
  } else {
    return true;
  } 

}

function validarArea() {
  var value = $("#Soc_area").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}


function validarJefeO() {
  var value = $("#Soc_nom_je").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}

function validardocjefeO() {
  var value = $("#Soc_DNI_jefeOficina").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}

function validarServidorp() {
  var value = $("#Soc_servidorp").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}

function validardocServidorp() {
  var value = $("#Soc_DNI_servidorPublico").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}


function validardescripB() {
  var value = $("#Pba_id").val();
  if (value == 0) {
    return false;
  } else {
    return true;
  } 

}

function validaruMedida() {
  var value = $("#Med_id").val();
  if (value == 0) {
    return false;
  } else {
    return true;
  } 

}

function validarCantidad() {
  var value = $("#com_Cantidad").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}

function validarObservacion() {
  var value = $("#com_Observaciones").val();
  value = value.trim();
  if (value == "") {
    return false;
  } else {
    return true;
  }
}



});





$(document).ready(function () {

//Solicitud inicio
  $("#solicitudC").submit(function (event) {
    var mensaje = "";
    var errores = 0;

    if (!validardestinatario()) {
      mensaje = mensaje + "<br>*Por favor seleccione el destinatario.";
      errores++;
    }else   if (!validarCliente()) {
      mensaje = mensaje + "<br>*Por favor seleccione un cliente.";
      errores++;
    }else {

    if($("#tablap .is-invalid").length>0){
      mensaje = mensaje + "<br>*Verifique que la tabla este llenada correctamente.";
      errores++;

    }

    if ($("#tablap tr").length - 2 == 0) {
      mensaje = mensaje + "<br>*Debe tener por lo menos un producto agregado.";
      errores++;
    }

    if (!validarCentro()) {
      mensaje = mensaje + "<br>*Por favor seleccione el centro de formación.";
      errores++;
    }
    if (!validarDep()) {
      mensaje = mensaje + "<br>*Por favor seleccione departamento.";
      errores++;
    }

    if (!validarMun()) {
      mensaje = mensaje + "<br>*Por favor seleccione el municipio.";
      errores++;
    }

    if (!validarObjecto()) {
      mensaje = mensaje + "<br>*Por favor ingrese el campo objecto.";
      errores++;
    }

    if (!validarPjDias()) {
      mensaje =
        mensaje +
        "<br>*Por favor ingrese el numero de dias de plazo de ejecucion.";
      errores++;
    }

    if (!validarPjMes()) {
      mensaje =
        mensaje +
        "<br>*Por favor ingrese el numero de meses de plazo de ejecucion.";
      errores++;
    }
    if (!validarLjc()) {
      mensaje =
        mensaje +
        "<br>*Por favor seleccione el municipio del lugar de ejecucion.";
      errores++;
    }

    if (!validarljcen()) {
      mensaje =
        mensaje + "<br>*Por favor seleccione el centro del lugar de ejecucion.";
      errores++;
    }
  }
    //Resultado final
    if (errores > 0) {
      alertSolicitud("danger", "Error!", mensaje);

      swal("Error!", "Por favor verifica los datos.", "error");
      event.preventDefault();
    } else {
      // swal("Exito!", "Mensaje!", "success");
      return;
    }
  });

  function alertSolicitud(tipo, title, text) {
    var alerta =
      "<div class='alert alert-" +
      tipo +
      " alert-dismissible fade show' role='alert'>" +
      "<strong>" +
      title +
      "!</strong><br> " +
      text +
      "" +
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
      "<span aria-hidden='true'>&times;</span>" +
      "</button>" +
      "</div>";

    $("#contentAlertSolicitud").html(alerta);
  }
  function validarljcen() {
    var value = $("#ljcenId").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }
  function validarLjc() {
    var value = $("#ljcId").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }

  function validarPjDias() {
    var value = $("#pjdId").val();
    value = value.trim();
    if (value == "") {
      return false;
    } else {
      return true;
    }
  }

  function validarPjMes() {
    var value = $("#pjmId").val();
    value = value.trim();
    if (value == "") {
      return false;
    } else {
      return true;
    }
  }

  function validardestinatario() {
    var value = $("#destinaId").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }

  function validarCliente() {
    var value = $("#empreS").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }

  function validarCentro() {
    var value = $("#centroS").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }
  function validarDep() {
    var value = $("#depId").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }
  function validarMun() {
    var value = $("#munId").val();
    if (value == 0) {
      return false;
    } else {
      return true;
    }
  }
  function validarObjecto() {
    var value = $("#objetoS").val();
    // var valorid = document.getElementById(id).value;
    value = value.trim();
    if (value == "") {
      return false;
    } else {
      return true;
    }
  }

  // function validarObjecto() {
  //   var value = $("#objetoS").val();
  //   // var valorid = document.getElementById(id).value;
  //   value = value.trim();
  //   if (value == "") {
  //     return false;
  //   } else {
  //     return true;
  //   }
  // }






  $(document).on("change", ".producto", function () {
    $(this).parent().value = "";
    // document.getElementById("productoS").value = "";

    var val = $(this).val();

    var xyz = $(this)
      .siblings("#items")
      .children()
      .filter(function () {
        return this.value == val;
      })
      .data("xyz");

    // console.log($(this).siblings('#items').children());
    var inputHidden = $(this).siblings("input");
    inputHidden.val(xyz);
  });


  $(document).on("change", "#depId", function () {
    var id = $(this).val();
    var url = $(this).attr("data-url");

    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        $("#munId").removeClass("is-valid");
        $("#munId").removeAttr("disabled");
        $("#munId").removeAttr("disabled");
        $("#munId").html(datos);
      },
    });
  });



  $(document).on("click", "#modalAprobarEnvio", function () {

    var url = $(this).attr("data-url");
    var id = $(this).attr("data-id");

    swal({
      title: "¿Desea aprobar el envio de la solicitud de cotización?",
      text: "Una vez aprobado el envio se generar el PDF y no podra editar la solicitud.",
      type: "warning",
      icon: "warning",
      buttons: {
        confirm: {
          text: "Aprobar envio",
          className: "btn btn-success",
        },cancel: {
          visible: true,
          text: "Cancelar",
          className: "btn btn-danger",
        },
      },
      // content: (
      //   <div>
      //   <h1>hola</h1></div>
      //   ),
    }).then((Delete) => {
      if (Delete) {
        $.ajax({
          url: url,
          data: "Ped_id=" + id,
          type: "POST",
          success: function () {
            var urlt =
              "ajax.php?modulo=costos&controlador=pdf&funcion=postSolicitudPdf&Ped_id=" +
              id;
            swal({
              title: "Se aprobo el envio",
              icon: "success",
            });
            //setTimeout('document.location.reload()', 2000);
            setTimeout('window.location.replace("' + urlt + '");', 2000);
          },
        });
      }
    });
  });

  // --------

//  $(document).on("click", "#modalcancelarS", function () {
//     var url = $(this).attr("data-url");
//     var id = $(this).attr("data-id");
//     alert(url);
//     swal({
//       title:"¿Desea rechazar la solicitud No° " + id + "?",
//       text: "Escriba el motivo del rechazo:",
//       content: "input",
//       type: "warning",
//       icon: "warning",
//       buttons: {
//         cancel: {
//           visible: true,
//           text: "Cancelar",
//           className: "btn btn-danger",
//         },
//         confirm: {
//           text: "Rechazar",
//           className: "btn btn-success",
//         },
//       },
//     }).then((Delete) => {
//       if (Delete) {
//         $.ajax({
//           url: url,
//           data: "Ped_id=" + id + "&" + "Ped_motivo=" + valor,
//             type: "POST",
//           success: function () {

//             swal({
//               title: "Se rechazo la solicitud de cotización",
//               icon: "success",
//             });
//             setTimeout("document.location.reload()", 2000);
//           },
//         });
//       }
//     });
//   });



  $(document).on("click", "#modalcancelarS", function () {
    var url = $(this).attr("data-url");
    var id = $(this).attr("data-id");



    swal({
      title: "¿Desea rechazar la solicitud No° " + id + "?",
      text: "Escriba el motivo del rechazo:",
      content: "input",
      inputPlaceholder: "Enter your email address",
      type: "warning",
      icon: "warning",
      buttons: {
        cancel: {
          visible: true,
          text: "Cancelar",
          className: "btn btn-danger",
        },
        confirm: {
          text: "Sigiente",
          className: "btn btn-success",
        },
      },
    }).then(function (valor) {
      swal({
        title: "¿Esta seguro de rechazar esta solicitud?",
        text: `Motivo del rechazo: ${valor}`,
        type: "warning",
        icon: "warning",
        buttons: {
          cancel: {
            visible: true,
            text: "Cancelar",
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "Confirmar rechazo",
            className: "btn btn-success",
          },
        },
      }).then((Delete) => {
        if (Delete) {
          $.ajax({
            url: url,
            data: "Ped_id=" + id + "&" + "Ped_motivo=" + valor,
            type: "POST",
            success: function () {
              swal({
                title: "Se rechazo la solicitud de cotización",
                icon: "success",
              });
              setTimeout("document.location.reload()", 2000);
            },
          });
        }
      });
    });
  });




  $(document).on("change", "#depId", function () {
    var id = $(this).val();
    var url = $(this).attr("data-url");

    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        $("#munId").removeClass("is-valid");
        $("#munId").removeAttr("disabled");
        $("#munId").removeAttr("disabled");
        $("#munId").html(datos);
      },
    });
  });

  //modal



  //Modal No 2. Creado por Johan
  $(document).on("click", ".botonModal2", function () {
    var url = $(this).attr("data-url");
    var id = $(this).val();
    var titulom = $(this).attr("title");

    if (id == "") {
      id = 0;
    }
    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        $("#contenedor").html(datos);
        $("#modal").modal("show");
        $("#titulo").text("");
        $("#titulo").append(titulom);
      },
    });
  });
  // modal fin

  //Modal solicitud
  $(document).on("click", ".botonModalSolicitud", function () {
    var url = $(this).attr("data-url");
    var id = $(this).val();
    var titulom = $(this).attr("titlemodal");

    if (id == "") {
      id = 0;
    }
    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        $("#contenedor").html(datos);
        $("#modal").modal("show");
        $("#titulo").text("");
        $("#titulo").append(titulom);
      },
    });
  });
  // modal fin


  conttr();

  function is_negative_number(number=0){

    if(number<0){
        return true;
    }else{
        return false;
    }
}


function valorPs(id){

  var urlt="ajax.php?modulo=costos&controlador=solicitud&funcion=consultaPd";
  var valoridAjax = document.getElementById(id).value;
  // valoridAjax=valoridAjax.trim;
  $.ajax({
    // async: false,
    type: "POST",
    url:urlt,
    data: {},
    success: function(data) {

      var json_obj = $.parseJSON(data); // lo convierte a Array
      var num=0;
    //  var cantidad=json_obj.length;
    //  alert(cantidad);
      for (var i = 0; i<18; i++) {
        if (json_obj[i]==valoridAjax){
          // alert(json_obj[i]);
         num=1;
           
        }
        
       }
       confirmacion(num,id);
    }
});


}

function confirmacion(num,id){
  var idm="#"+id;
    if(num==1){
     
     console.log("si"+id);
    }else if (num==0){
      // document.getElementById(id).value = "";
       console.log("no");
       
        $(idm).siblings(".alv").remove();
        $(idm).addClass("is-invalid");
        $(idm).parent().append("<p class='text-danger alv'>Ingrese un producto valido</p>");
        $(idm).removeClass("is-valid");
    }
}

  $(document).on("keyup", ".validar", function () {
    var id = $(this).attr("id");
    var name = $(this).attr("name");
    var valorid = document.getElementById(id).value;
    valorid = valorid.trim();

    if(id=="pjdId"){
    if(validarPjDias(valorid)){
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      $(this).siblings(".alv").remove();
    }
    else{
      $(this).siblings(".alv").remove();
      $(this).addClass("is-invalid");
      $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
      $(this).removeClass("is-valid");
    }
  }
  if(id=="pjmId"){
    if(validarPjMes(valorid)){
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
      $(this).siblings(".alv").remove();

    }else{
      $(this).siblings(".alv").remove();
      $(this).addClass("is-invalid");
      $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
      $(this).removeClass("is-valid");
    }
  }
  if(id=="objetoS"){
      if(validarObjecto(valorid)){
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
        $(this).siblings(".alv").remove();

      }else{
        $(this).siblings(".alv").remove();
        $(this).addClass("is-invalid");
        $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
        $(this).removeClass("is-valid");
      }
    }
    if (name == "cantidad[]") {
      if (valorid == "") {
        $(this).siblings(".alv").remove();
        $(this).addClass("is-invalid");
        $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
        $(this).removeClass("is-valid");
      } else if (valorid.length > 4) {


        // alert (valorid);
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");
        $(this).siblings(".alv").remove();
        $(this)
          .parent()
          .append(
            "<p class='text-danger alv'>Ingreasa un numero no superior a 1000</p>"
          );
      } else if(is_negative_number(valorid)){


        // alert (valorid);
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");
        $(this).siblings(".alv").remove();
        $(this)
          .parent()
          .append(
            "<p class='text-danger alv'>Ingreasa un numero que no sea negativo</p>"
          );

      }else{
        // if(){
        //   alert(valorid);
        // }
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
        $(this).siblings(".alv").remove();
      }
    } else if (name == "producto[]") {

      // var idn=id.substr (-1);
      // if(!isNaN(idn)){
      //   var idnum="productoS"+idn;
      // }else{
      //   var idnum="productoS";
      // }
      // var productoS = document.getElementById(idnum).value;

      // idps="#"+id;
      // valorPs(id);

      if (valorid == "") {

        $(this).siblings(".alv").remove();
        $(this).addClass("is-invalid");
        $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
        $(this).removeClass("is-valid");

      } else
        if(valorPs(id)){
    //    alert("hola");
    //   //   $(this).siblings(".alv").remove();
    //   //   $(this).addClass("is-invalid");
    //   //   $(this).parent().append("<p class='text-danger alv'>Ingrese un producto valido</p>");
    //   //   $(this).removeClass("is-valid");

   }else
      if (valorid.length >= 1) {
      // alert(id. substr (-1));
        if (novalido(valorid)) {
          $(this).removeClass("is-valid");
          $(this).siblings(".alv").remove();
          $(this)
            .parent()
            .append("<p class='text-danger alv'>Caracteres no validos</p>");
          $(this).addClass("is-invalid");
        } else {
          $(this).removeClass("is-invalid");
          $(this).addClass("is-valid");
          $(this).siblings(".alv").remove();
        }
      }
    } else if (name == "desc[]") {
      if (valorid == "") {
        $(this).siblings(".alv").remove();
        $(this).addClass("is-invalid");
        $(this).parent().append("<p class='text-danger alv'>Campo vacio</p>");
        $(this).removeClass("is-valid");
      } else if (valorid.length > 250) {
        $(this).siblings(".alv").remove();
        $(this).addClass("is-invalid");
        $(this)
          .parent()
          .append(
            "<p class='text-danger alv'>No se debe superar los 250 caracteres</p>"
          );
      } else {
        $(this).siblings(".alv").remove();
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
      }
    }

    var error = document.getElementsByClassName("is-invalid").length;

    if (
      $("#producto").hasClass("is-valid") &&
      $("#cantidad").hasClass("is-valid") &&
      $("#desc").hasClass("is-valid")
    ) {
      $("#adicionar").attr("disabled", false);
    } else {
      $("#adicionar").attr("disabled", true);
    }
  });

  $(".vSelect").click(function () {
    var id = $(this).attr("id");
    var valor = document.getElementById(id).value;
    if (valor == 0) {
      $(this).siblings(".alv").remove();
      $(this).removeClass("is-invalid");
      $(this).addClass("is-invalid");
      $(this)
        .parent()
        .append("<p class='text-danger alv'>Debe selecionar una opcion</p>");
    } else {
      $(this).siblings(".alv").remove();
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
    }
  });

  function novalido(campo) {
    var noValido = "$#%*/(){}+-&?¿!¡,'<>°|=.¨[]:;`~¬@";
    var cont = 0;

    for (let i = 0; i < campo.length; i++) {
      for (let k = 0; k < noValido.length; k++) {
        if (campo[i] == noValido[k]) {
          cont++;
        }
      }
    }
    if (cont > 0) {
      return true;
    }
  }

  $("#adicionar").attr("disabled", true);
  $(document).on("click", "#adicionar", function () {
    $(".validar").removeClass("is-valid");
    $("#adicionar").attr("disabled", true);
    var productoS = document.getElementById("productoS").value;
    var producto = document.getElementById("producto").value;
    var cantidad = document.getElementById("cantidad").value;
    var desc = document.getElementById("desc").value;
    desc = desc.trim();

    if(producto=="" || cantidad=="" || desc==""){
      e.preventDefault();
    }else{
    var Filas = $("#tablap tr").length - 1;
    var items = $("#items").html();
    $("#tablap").append(
      "<tr>" +
        "<td>" +
        "<p>" +
        "<label>Ingrese producto:</label> <br>" +
        '<input list="items" autocomplete="off" value="' +
        producto +
        '" id="producto' +
        Filas +
        '" name="producto[]"' +
        'class="form-control validar producto" type="text" placeholder="Producto...">' +
        ' <datalist id="items">' +
        items +
        "</datalist>" +
        '<input type="hidden" value="' +
        productoS +
        '"  name="productoS[]" id="productoS'+
        Filas+
        '"></input>' +
        "</p>" +
        "</td>" +
        "<td>" +
        "<p>" +
        "<label>Cantidad:</label> <br>" +
        '<input id="cantidad' +
        Filas +
        '" type="number" value="' +
        cantidad +
        '" class="form-control validar"  name="cantidad[]"' +
        'placeholder="cantidad...">' +
        "</p>" +
        "</td>" +
        "<td>" +
        "<p>" +
        "<label>Descripcion de producto</label> <br>" +
        '<textarea class="form-control validar" id="desc' +
        Filas +
        '" rows="2" cols="50"  name="desc[]"' +
        'placeholder="Descripcion producto..">' +
        desc +
        "</textarea>" +
        "</p>" +
        "</td>" +
        "<td>" +
        '<button type="button" name="remove" id="" class="btn btn-danger btn_remove btn btn-sm ml-2 mt-3"><i class="fa fa-trash"></i></button>' +
        "</td>" +
        "</tr>"
    );
    conttr();
    document.getElementById("cantidad").value = "";
    document.getElementById("desc").value = "";
    document.getElementById("producto").value = "";
    document.getElementById("productoS").value = "";
    document.getElementById("producto").focus();
  }
  });

  $(document).on("click", ".btn_remove", function () {
    //remueve una fila y hace el reconteo
    $(this).parent().parent().remove();
    conttr();
  });

  function conttr() {
    $("#itemc").text("");
    var nFilas = $("#tablap tr").length;
    $("#itemc").append(nFilas - 2);
  }

  //Cotizacion Inicio

  //Creando DataTables
  $("#datatable-responsive-costos-cotizacion-pendiente").DataTable();
  $("#datatable-responsive-costos-cotizacion-historial-todas").DataTable();
  $("#datatable-responsive-costos-cotizacion-historial-aprobadas").DataTable();
  $("#datatable-responsive-costos-cotizacion-historial-rechazadas").DataTable();



  //Insertar cotizacion - Cliente

  //Cargar Cliente
  $(document).on("change", "#selectCliente", function () {
    var id = $(this).val();
    var url = $(this).attr("data-url");
    // $('#contenedorCliente').remove();

    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        $("#contenedorCliente").html(datos);
      },
    });
  });

  //Guardar datos cotizacion
  $(document).on("click", "#updatePedido", function () {
    var Ped_id = $("#codigoPedido").val();
    var Emp_id = $("#selectCliente").val();
    var destinatario = $("#destinatario").val();
    var tiposolicitud_id = $("#tipoSolicitudP").val();
    var url = $(this).attr("data-url");

    // $('#contenedorCliente').remove();
    if (Emp_id == 0) {
      Emp_id = "NULL";
    }
    if (tiposolicitud_id == 0) {
      tiposolicitud_id = "NULL";
    }
    if (destinatario == 0) {
      destinatario = "NULL";
    }
    $.ajax({
      url: url,
      data:
        "Ped_id=" +
        Ped_id +
        "&Emp_id=" +
        Emp_id +
        "&Tempr_id=" +
        tiposolicitud_id+
        "&destinatario=" +
        destinatario,
      type: "POST",
      success: function (datos) {
        // alert("Datos Actualizados");
        // console.log(datos);
        validarPedicoCotizacionCliente();
        validarPedicoCotizacionDestinatario();
        swal("Exito!", "Datos Actualizados!", "success");
      },
    });
  });

  //Validar datos cotizacion
  $(document).on("change", "#destinatario", function () {vallidarDatosCotizacion();});
  $(document).on("change", "#tipoSolicitudP", function () {vallidarDatosCotizacion();});
  $(document).on("change", "#selectCliente", function () {vallidarDatosCotizacion();});

  vallidarDatosCotizacion();
  function vallidarDatosCotizacion() {
    var destinatario = $("#destinatario").val();
    var tipoSolicitudP = $("#tipoSolicitudP").val();
    var selectCliente = $("#selectCliente").val();

    if (destinatario != 0 && tipoSolicitudP != 0 && selectCliente != 0 ) {

      $("#updatePedido").prop("disabled", false);
    } else {

      $("#updatePedido").prop("disabled", true);
    }
  }

  //Detalle Cotizacion
  //Agregar Tinta Especial
  $(document).on("click", "#agregarTintaEspecial", function () {
    var cabecera0 = $("#cabeceraTintaEspecial0").html();
    var cabecera1 = $("#cabeceraTintaEspecial1").html();
    var cabecera2 = $("#cabeceraTintaEspecial2").html();

    var cuerpo = $("#copyTintaEspecial").html();
    $("#contenedorTintaEspecial").append(
      "<div class='x_panel'>" +
        "<div>" +
        cabecera0 +
        "</div>" +
        "<div class='row'>" +
        "<div class='col-md-12'>" +
        "<div class='col-md-5 form-group'>" +
        cabecera1 +
        "</div>" +
        "<div class='col-md-6 form-group'>" +
        cabecera2 +
        "</div>" +
        "<div class='col-md-1 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarTintaEspecial'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<div>" +
        cuerpo +
        "</div>" +
        "</div>"
    );

    validarCotizacionTintasEspeciales();
  });

  //Eliminar TintaEspecial
  $(document).on("click", ".eliminarTintaEspecial", function () {
    $(this).parent().parent().parent().parent().remove();
    calcularTotalTintas();
  });
  // Agregar Terminado
  $(document).on("click", "#agregarTerminado", function () {
    var cabecera1 = $("#copyTerminadoCabecera1").html();
    var cabecera2 = $("#copyTerminadoCabecera2").html();
    var cuerpo = $("#copyTerminado").html();
    $("#contenedorTerminado").append(
      "<div class='x_panel'>" +
        "<div class='col-md-12'>" +
        "<div class='row'>" +
        "<div class='col-md-6'>" +
        cabecera1 +
        "</div>" +
        "<div class='col-md-5'>" +
        cabecera2 +
        "</div>" +
        "<div class='col-md-1 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarTerminado'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-12' >" +
        cuerpo +
        "</div>" +
        "</div>"
    );
    validarCotizacionTerminado();
  });

  //Eliminar Terminado
  $(document).on("click", ".eliminarTerminado", function () {
    $(this).parent().parent().parent().parent().remove();
    calcularTotalTerminados();
  });

  //   agregar Material
  $(document).on("click", "#agregarMaterial", function () {
    var cabecera = $("#copyCabeceraMaterial").html();
    var cuerpo = $("#copyMaterial").html();

    $("#contenedorMaterial").append(
      "<div class='x_panel'>" +
        "<div class='row'>" +
        "<div class='col-md-11'>" +
        cabecera +
        "</div>" +
        "<div class='col-md-1 d-flex justify-content-end'>" +
        "<button type='button' class='btn btn-danger eliminarMaterial'><i class='fas fa-trash-alt'></i></button>" +
        "</div>" +
        "</div>" +
        "<div>" +
        cuerpo +
        "</div>" +
        "</div>" +
        "</div>"
    );
    validarCotizacionMateriales();
  });
  //   Eliminar material
  $(document).on("click", ".eliminarMaterial", function () {
    $(this).parent().parent().parent().remove();
    calcularTotalMaterial();
  });

  //   Funcion de auto calcular precio - Plancha por medio de clases
  $(document).on("change", ".calcularCantidad", function () {
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  });

  $(document).on("change", ".calcularCostoUnitario", function () {
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  });

  //Calular Tintas y total

  // Calcular tinta Basica
  $(document).on("change", "#cantidadTintaBasica", function () {
    var costo = $("#costoUnitarioTintaBasica").val();
    var cantidad = $("#cantidadTintaBasica").val();

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $("#subTotalTintaBasica").val(resultado);
      } else {
        $("#subTotalTintaBasica").val("");
      }
    } else {
      $("#subTotalTintaBasica").val("");
    }
    calcularTotalTintas();
  });

  $(document).on("change", "#costoUnitarioTintaBasica", function () {
    var costo = $("#costoUnitarioTintaBasica").val();
    var cantidad = $("#cantidadTintaBasica").val();

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $("#subTotalTintaBasica").val(resultado);
      } else {
        $("#subTotalTintaBasica").val("");
      }
    } else {
      $("#subTotalTintaBasica").val("");
    }
    calcularTotalTintas();
  });

  // Calular tinta especial

  $(document).on("change", ".cantidadTintaEspecial", function () {
    var costo = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var cantidad = $(this).val();

    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTintas();
  });

  $(document).on("change", ".costoUnitarioTintaEspecial", function () {
    var costo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();

    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTintas();
  });

  //Caluclar valor total Tintas

  function calcularTotalTintas() {
    var total = 0;
    var subTotalTintaBasica = $("#subTotalTintaBasica").val();

    if (!isNaN(parseFloat(subTotalTintaBasica))) {
      total += parseFloat(subTotalTintaBasica);
    }

    var subTotal = $(".subtotalTintaEspecial");

    for (i = 0; i < subTotal.length; i++) {
      if (!isNaN(parseFloat(subTotal.eq(i).val()))) {
        total += parseFloat(subTotal.eq(i).val());
      }
    }
    $("#totalTintas").val(total);
    calcularTotalCotizacion();
  }

  // Calcular Material
  $(document).on("change", ".cantidadMaterial", function () {
    var costo = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var cantidad = $(this).val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalMaterial();
  });

  $(document).on("change", ".costoUnitarioMaterial", function () {
    var costo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalMaterial();
  });

  //Caluclar valor total Material

  function calcularTotalMaterial() {
    var total = 0;
    var subTotal = $(".subtotalMaterial");

    for (i = 0; i < subTotal.length; i++) {
      if (!isNaN(parseFloat(subTotal.eq(i).val()))) {
        total += parseFloat(subTotal.eq(i).val());
      }
    }
    $("#totalMaterial").val(total);
    // $("#totalMaterial").prettynumber({delimiter:","});
    calcularTotalCotizacion();
  }

  // Calcular Terminados
  $(document).on("change", ".cantidadHoraTerminados", function () {
    // var costo = $(this).parent().parent().parent().parent().children().eq(0).children().eq(0).children().eq(1).children().eq(0).val();
    var costo = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var cantidad = $(this).val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    // console.log(subtotal);
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTerminados();
  });

  $(document).on("change", ".costoUnitarioTerminados", function () {
    var costo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .val();
    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        subtotal.val(resultado);
      } else {
        subtotal.val("");
      }
    } else {
      subtotal.val("");
    }
    calcularTotalTerminados();
  });

  //Caluclar valor total Terminados

  function calcularTotalTerminados() {
    var total = 0;
    var subTotal = $(".subtotalTerminados");

    for (i = 0; i < subTotal.length; i++) {
      if (!isNaN(parseFloat(subTotal.eq(i).val()))) {
        total += parseFloat(subTotal.eq(i).val());
      }
    }
    $("#totalTerminados").val(total);
    calcularTotalCotizacion();
  }

  // Calcular diseño
  $(document).on("change", "#totalDiseno", function () {
    calcularTotalCotizacion();
  });

  //Calcular Insumos - Procesos - Total
  function calcularTotalCotizacion() {
    var totalTintas = $("#totalTintas").val();
    var totalMaterial = $("#totalMaterial").val();
    var insumos = 0;

    if (isNaN(parseFloat(totalTintas))) {
      totalTintas = 0;
    }
    if (isNaN(parseFloat(totalMaterial))) {
      totalMaterial = 0;
    }


    insumos = parseFloat(totalTintas) + parseFloat(totalMaterial);
    $("#totalInsumos").val(insumos);


    var totalDiseno = $("#totalDiseno").val();
    var totalTerminados = $("#totalTerminados").val();
    var procesos = 0;

    if (isNaN(parseFloat(totalDiseno))) {
      totalDiseno = 0;
    }
    if (isNaN(parseFloat(totalTerminados))) {
      totalTerminados = 0;
    }
    procesos = parseFloat(totalDiseno) + parseFloat(totalTerminados);
    $("#totalProcesos").val(procesos);



    if (isNaN(parseFloat(procesos))) {
      procesos = 0;
    }
    if (isNaN(parseFloat(insumos))) {
      insumos = 0;
    }

    var totalCotizacion = parseFloat(procesos) + parseFloat(insumos);
    $("#totalCotizacion").val(totalCotizacion);

  }

  //Obtener unidad de medida
  //material
  $(document).on("change", ".selectMaterial", function () {
    var id = $(this).val();
    var url = $(this).attr("data-url");
    var inputUnidad = $(this)
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        inputUnidad.val(datos);
        // console.log(datos);
      },
    });
  });

  //Tintas

  function cargarTotalesCotizacion() {
    calcularTotalPlancha();
    calcularTotalTerminados();
    calcularTotalMaterial();
    calcularTotalTintas();
    calcularTotalCotizacion();
  }

  cargarTotalesCotizacion();

  //calcular Planchas
  function calcularTotalPlancha() {
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  }

  //Validacion pedido - Cotizacion -> Cliente existente

  validarPedicoCotizacionCliente();
  function validarPedicoCotizacionCliente() {

    var value = $("#selectCliente").val();

    if (value != 0) {
      $("#msgCliente").attr("class", "d-none");
      $("#enviarPedidoCotizacion").prop("disabled", false);
    } else {
      $("#msgCliente").attr("class", "d-block");
      $("#enviarPedidoCotizacion").prop("disabled", true);
    }
  }

  validarPedicoCotizacionDestinatario();
  function validarPedicoCotizacionDestinatario() {
    var destinatario = $("#destinatario").val();
    if (destinatario != 0) {
      $("#msgDestinatario").attr("class", "d-none");
      $("#enviarPedidoCotizacion").prop("disabled", false);
    } else {
      $("#msgDestinatario").attr("class", "d-block");
      $("#enviarPedidoCotizacion").prop("disabled", true);
    }
  }

  // Validar detalle pedido - tipoProducto

  $("#formInsertDetalleCotizacion").submit(function (event) {
    var mensaje = "";
    var errores = 0;

    if ($("#detalleCotizacionTipoProducto").val() === "0") {
      mensaje = mensaje + "<br>*Por favor seleccione un producto a cotizar.";
      // console.log($("#detalleCotizacionTipoProducto").val());
      errores++;
    }

    if ($("#detalleCotizacionCantidad").val() < 1) {
      mensaje =
        mensaje +
        "<br>*La cantidad del producto a cotizar debe ser mayor a 1 und.";
      // console.log(mensaje);
      errores++;
    }

    //Evaluando Planchas
    var textoPlanchas = validarEnvioDetalleCotizacionMaquinaPlancha();
    console.log(textoPlanchas);
    if (textoPlanchas != "OK") {
      mensaje += textoPlanchas;
      errores++;
    }

    //Evaluando Tintas Basicas

    //Evaluando Tintas especiales
    var textoTintasEspeciales = validarEnvioCotizacionTintasEspeciales();
    // console.log(textoTintasEspeciales);
    if (textoTintasEspeciales != "OK") {
      mensaje += textoTintasEspeciales;
      errores++;
    }

    //Evaluando Materiales
    var textoMateriales = validarEnvioCotizacionMateriales();
    // console.log(textoMateriales);
    if (textoMateriales != "OK") {
      mensaje += textoMateriales;
      errores++;
    }

    //Evaluando Terminados

    var textoTerminado = validarEnvioCotizacionTerminado();
    if (textoTerminado != "OK") {
      mensaje += textoTerminado;
      errores++;
    }

    //Resultado final
    if (errores > 0) {
      alertCotizacion("danger", "Error!", mensaje);
      // console.log(mensaje);

      swal("Error!", "Por favor verifica los datos.", "error");
      event.preventDefault();
    } else {
      // swal("Exito!", "Mensaje!", "success");
      return;
    }
  });

  function alertCotizacion(tipo, title, text) {
    var alerta =
      "<div class='alert alert-" +
      tipo +
      " alert-dismissible fade show' role='alert'>" +
      "<strong>" +
      title +
      "!</strong><br> " +
      text +
      "" +
      "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" +
      "<span aria-hidden='true'>&times;</span>" +
      "</button>" +
      "</div>";

    $("#contentAlertDetalleCotizacion").html(alerta);
    // $(".alert").first().hide().slideDown(500).delay(10000).slideUp(500, function () {
    //   $(this).remove();
    // });
    // $(".alert").first().hide().slideDown(500).delay(1000000000000000).slideUp(500, function () {
    //     $(this).remove();
    //   });
  }

  //Validar planchas

  $(document).on("change", "#detalleCotizacionMaquinaPlancha", function () {
    validarDetalleCotizacionMaquinaPlancha();
  });

  validarDetalleCotizacionMaquinaPlancha();

  function validarDetalleCotizacionMaquinaPlancha() {
    var value = $("#detalleCotizacionMaquinaPlancha").val();
    var cantidad = $("#detalleCotizacionMaquinaPlancha")
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var costoUnitario = $("#detalleCotizacionMaquinaPlancha")
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    // console.log(costoUnitario);
    if (value == 0) {
      //Limpiar campos
      cantidad.val("");
      costoUnitario.val("");
      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
      calcularTotalPlancha();
    } else {
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
  }

  function validarEnvioDetalleCotizacionMaquinaPlancha() {
    var value = $("#detalleCotizacionMaquinaPlancha").val();
    var cantidad = $("#detalleCotizacionMaquinaPlancha")
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var costoUnitario = $("#detalleCotizacionMaquinaPlancha")
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var resultado = "<br><strong>Planchas:</strong>";
    var error = 0;
    if (value != "0") {
      //Evaluar cada campo
      if (cantidad.val() < 1) {
        //Error Cantidad
        error++;
        resultado +=
          "<br>*La <strong>cantidad</strong> de planchas debe ser mayor a 1.";
      }
      if (costoUnitario.val() < 0) {
        //Error Cantidad
        error++;
        resultado +=
          "<br>*El <strong>costo unitario</strong> de planchas debe ser positivo.";
      }
    }
    if (error > 0) {
      return resultado;
    } else {
      resultado = "OK";
      return resultado;
    }
  }

  //Validar Tintas Basicas

  //Validar Tintas Especiales
  $(document).on("keyup", ".codigoColorTintaEspecial", function () {
    var codigo = $(this).val();
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var costoUnitario = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var subTotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);
    if (codigo == "") {
      //Limpiar campos
      cantidad.val("");
      costoUnitario.val("");
      subTotal.val("");
      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
      calcularTotalTintas();
    } else {
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
    // console.log(subTotal);
  });

  validarCotizacionTintasEspeciales();
  function validarCotizacionTintasEspeciales() {
    var tintasEspeciales = $(".codigoColorTintaEspecial");
    for (i = 0; i < tintasEspeciales.length; i++) {
      var codigo = tintasEspeciales.eq(i).val();
      var cantidad = tintasEspeciales
        .eq(i)
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var costoUnitario = tintasEspeciales
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(2)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var subTotal = tintasEspeciales
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(2)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0);
      if (codigo == "") {
        //Limpiar campos
        cantidad.val("");
        costoUnitario.val("");
        subTotal.val("");
        cantidad.prop("readonly", true);
        costoUnitario.prop("readonly", true);
      } else {
        cantidad.prop("readonly", false);
        costoUnitario.prop("readonly", false);
      }
    }
    calcularTotalTintas();
  }

  function validarEnvioCotizacionTintasEspeciales() {
    var tintasEspeciales = $(".codigoColorTintaEspecial");
    var errores = 0;
    var resultado = "<br><strong>Tintas Especiales:</strong>";
    for (i = 0; i < tintasEspeciales.length; i++) {
      var codigo = tintasEspeciales.eq(i).val();
      var cantidad = tintasEspeciales
        .eq(i)
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var costoUnitario = tintasEspeciales
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(2)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var subTotal = tintasEspeciales
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(2)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0);
      if (codigo != "") {
        //Limpiar campos
        if (cantidad.val() < 1) {
          errores++;
          resultado +=
            "<br>*La <strong>cantidad</strong> de tinta con codigo <strong>" +
            codigo +
            "</strong> debe ser mayor a 1.";
        }
        if (costoUnitario.val() < 0) {
          errores++;
          resultado +=
            "<br>*El <strong>costo unitario</strong> de la tinta con codigo <strong>" +
            codigo +
            "</strong> debe ser positivo.";
        }
      }
    }

    if (errores > 0) {
      return resultado;
    } else {
      resultado = "OK";
      return resultado;
    }
  }

  // Validaciones Detalle Cotizacion Bloque Material

  //material
  $(document).on("change", ".selectMaterial", function () {
    var material = $(this).val();
    var inputUnidad = $(this)
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var costoUnitario = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var subTotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    if (material == "0") {
      //Limpiar campos
      inputUnidad.val("");
      cantidad.val("");
      costoUnitario.val("");
      subTotal.val("");

      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
    } else {
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
    calcularTotalMaterial();

    // console.log(cantidad);
  });

  validarCotizacionMateriales();
  function validarCotizacionMateriales() {
    var selectMaterial = $(".selectMaterial");
    for (i = 0; i < selectMaterial.length; i++) {
      var material = selectMaterial.eq(i).val();
      var inputUnidad = selectMaterial
        .eq(i)
        .parent()
        .parent()
        .children()
        .eq(2)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var cantidad = selectMaterial
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var costoUnitario = selectMaterial
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var subTotal = selectMaterial
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(2)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);

      if (material == "0") {
        //Limpiar campos
        inputUnidad.val("");
        cantidad.val("");
        costoUnitario.val("");
        subTotal.val("");

        cantidad.prop("readonly", true);
        costoUnitario.prop("readonly", true);
      } else {
        cantidad.prop("readonly", false);
        costoUnitario.prop("readonly", false);
      }
    }
    calcularTotalMaterial();
  }

  function validarEnvioCotizacionMateriales() {
    var errores = 0;
    var resultado = "<br><strong>Materiales:</strong>";

    var selectMaterial = $(".selectMaterial");
    for (i = 0; i < selectMaterial.length; i++) {
      var material = selectMaterial.eq(i).val();
      var cantidad = selectMaterial
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var costoUnitario = selectMaterial
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      // var nombreMaterial = selectMaterial.eq(i).("option:selected").text();
      var nombre = selectMaterial.eq(i).children("option:selected").text();
      // console.log(nombre);

      if (material != "0") {
        //Limpiar campos

        //Limpiar campos
        if (cantidad.val() < 1) {
          errores++;
          resultado +=
            "<br>*La <strong>cantidad</strong> del Material <strong>" +
            nombre +
            "</strong> debe ser mayor a 1.";
        }
        if (costoUnitario.val() < 0) {
          errores++;
          resultado +=
            "<br>*El <strong>costo unitario</strong> del Material <strong>" +
            nombre +
            "</strong> debe ser positivo.";
        }
      }
    }

    if (errores > 0) {
      return resultado;
    } else {
      resultado = "OK";
      return resultado;
    }
  }

  //// Validaciones Detalle Cotizacion Bloque Terminados
  $(document).on("change", ".selectTerminado", function () {
    var terminado = $(this).val();
    var maquina = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    var costoUnitario = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0);

    var cantidad = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    var subtotal = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .children()
      .eq(1)
      .children()
      .eq(1)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);
    if (terminado == "0") {
      //Limpiar campos
      maquina.val("0");
      cantidad.val("");
      costoUnitario.val("");
      subtotal.val("");

      cantidad.prop("readonly", true);
      costoUnitario.prop("readonly", true);
    } else {
      cantidad.prop("readonly", false);
      costoUnitario.prop("readonly", false);
    }
    calcularTotalTerminados();
  });

  validarCotizacionTerminado();
  function validarCotizacionTerminado() {
    var selectTerminado = $(".selectTerminado");
    for (i = 0; i < selectTerminado.length; i++) {
      var terminado = selectTerminado.eq(i).val();
      var maquina = selectTerminado
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      var costoUnitario = selectTerminado
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0);

      var cantidad = selectTerminado
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);

      var subtotal = selectTerminado
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);
      // console.log("Este el terminado = "+terminado);

      if (terminado == "0") {
        //Limpiar campos
        maquina.val("0");
        cantidad.val("");
        costoUnitario.val("");
        subtotal.val("");

        cantidad.prop("readonly", true);
        costoUnitario.prop("readonly", true);
      } else {
        cantidad.prop("readonly", false);
        costoUnitario.prop("readonly", false);
      }
    }

    calcularTotalTerminados();
  }

  function validarEnvioCotizacionTerminado() {
    var errores = 0;
    var resultado = "<br><strong>Terminados:</strong>";
    var selectTerminado = $(".selectTerminado");
    for (i = 0; i < selectTerminado.length; i++) {
      var terminado = selectTerminado.eq(i).val();
      var costoUnitario = selectTerminado
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(1)
        .children()
        .eq(0);

      var cantidad = selectTerminado
        .eq(i)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .children()
        .eq(1)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(0)
        .children()
        .eq(1)
        .children()
        .eq(0);

      var nombre = selectTerminado.eq(i).children("option:selected").text();

      if (terminado != "0") {
        //Limpiar campos

        if (cantidad.val() < 1) {
          errores++;
          resultado +=
            "<br>*La <strong>cantidad</strong> del terminado <strong>" +
            nombre +
            "</strong> debe ser mayor a 1.";
        }
        if (costoUnitario.val() < 0) {
          errores++;
          resultado +=
            "<br>*El <strong>costo unitario</strong> del terminado <strong>" +
            nombre +
            "</strong> debe ser positivo.";
        }
      }
    }

    if (errores > 0) {
      return resultado;
    } else {
      resultado = "OK";
      return resultado;
    }
  }

  //Tabla de Reporte
  $(document).on("click", "#getReporte", function () {
    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    var estado = $("#estado").val();

    //"Ped_id="+Ped_id+"&Emp_id="+Emp_id+"&Tempr_id="+tiposolicitud_id,

    var url = $(this).attr("data-url");
    $.ajax({
      url: url,
      data:
        "fechaInicio=" +
        fechaInicio +
        "&fechaFin=" +
        fechaFin +
        "&estado=" +
        estado,
      type: "POST",
      success: function (datos) {
        console.log(datos);

        $("#filtroReporteCostos").html(datos);
        // $("#datatable-responsive-costos-cotizacion-pendiente").html(datos);
        $("#datatable-responsive-costos-cotizacion-pendiente").DataTable();
      },
    });
  });

  $(document).on("change", "#estado", function () {
    var estado = $("#estado").val();

    if ($("#estado").val() == "0") {
      $("#getReporte").attr("disabled", true);
      $("#getReporteExcel").attr("disabled", true);
    } else {
      $("#getReporte").attr("disabled", false);
      $("#getReporteExcel").attr("disabled", false);
    }
  });

  $(document).on("change", "#tipoReporte", function () {
    var tipoReporte = $(this).val();

    var url = $(this).attr("data-url");

    $.ajax({
      url: url,
      data: "tipoReporte=" + tipoReporte,
      type: "POST",
      success: function (datos) {
        // console.log(datos);
        $("#estado").html(datos);

        if ($("#estado").val() == "0") {
          $("#getReporte").attr("disabled", true);
          $("#getReporteExcel").attr("disabled", true);
        } else {
          $("#getReporte").attr("disabled", false);
          $("#getReporteExcel").attr("disabled", false);
        }
      },
    });
  });

  $(document).on("click", "#getReporteExcel", function () {
    // window.location = $(this).attr("data-url");

    var fechaInicio = $("#fechaInicio").val();
    var fechaFin = $("#fechaFin").val();
    var estado = $("#estado").val();

    var url = $(this).attr("data-url");

    $.ajax({
      url: url,
      data:
        "fechaInicio=" +
        fechaInicio +
        "&fechaFin=" +
        fechaFin +
        "&estado=" +
        estado,
      type: "POST",
      success: function (datos) {
        console.log("Ejecutado: " + datos);
        window.location = datos;
      },
    });
  });

  //Obtener unidad de medida
  //material
  $(document).on("change", ".selectMaterial", function () {
    var id = $(this).val();
    var url = $(this).attr("data-url");
    var inputUnidad = $(this)
      .parent()
      .parent()
      .children()
      .eq(2)
      .children()
      .eq(0)
      .children()
      .eq(1)
      .children()
      .eq(0);

    $.ajax({
      url: url,
      data: "id=" + id,
      type: "POST",
      success: function (datos) {
        inputUnidad.val(datos);
        // console.log(datos);
      },
    });
  });

  //Tintas

  function cargarTotalesCotizacion() {
    calcularTotalPlancha();
    calcularTotalTerminados();
    calcularTotalMaterial();
    calcularTotalTintas();
    calcularTotalCotizacion();
  }

  cargarTotalesCotizacion();

  //calcular Planchas
  function calcularTotalPlancha() {
    var costo = $(".calcularCantidad").val();
    var cantidad = $(".calcularCostoUnitario").val();
    if (costo !== "") {
      var resultado = costo * cantidad;
      if (resultado > 0) {
        $(".calcularResultado").val(resultado);
      } else {
        $(".calcularResultado").val("");
      }
    } else {
      $(".calcularResultado").val("");
    }
  }



  // Validar detalle pedido - tipoProducto
  // $('.alert').alert();
  $(".alert")
    .first()
    .hide()
    .slideDown(500)
    .delay(4000)
    .slideUp(500, function () {
      $(this).remove();
    });
  // detalleCotizacionTipoProducto
  // detalleCotizacionCantidad

  // swal("Hello world!");

  // swal("Good job!", "You clicked the button!", "error");
});
