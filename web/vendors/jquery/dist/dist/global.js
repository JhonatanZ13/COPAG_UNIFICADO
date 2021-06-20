$(document).ready(function(){
   
    $(document).on("click",".menu",function(){
        var estado=$("#logo").attr("data-estado");

        if (estado==1) {
            $("#logo").attr("src","images/logo-pequeño.png");
            $("#logo").attr("width","40px");
            $("#logo").attr("style","margin-left:5px");
            $("#logo").attr("data-estado","2");
        }else{
            $("#logo").attr("src","images/logo.png");
            $("#logo").attr("width","140px");
            $("#logo").attr("style","margin-left:15px");
            $("#logo").attr("data-estado","1");
        }
    });
    $("#table").DataTable();

    $(document).on("change","#selectDepto", function(){
        var id=$(this).val();
        var url=$(this).attr("data-url");
        $.ajax({
            url:url,
            data:"id="+id,
            type:"POST",
            success:function(datos){
                $("#selectCiudad").html(datos);
            }
        })
    })

    $(document).on("change","#imagen", function(){
        var img=$(this).val();
        var url=$(this).attr("data-url");
        $.ajax({
            url:url,
            data:"img="+img,
            type:"POST",
            success:function(datos){
                $("#chargeImage").html(datos);
            }
        })
    })

    $(document).on("click","#botonModal",function(){
        var url=$(this).attr('data-url');
        var titulo=$(this).val();
        var datos=$(this).attr('data-id');
        if (datos==""){
            datos==0;
        }

        $.ajax({
            url:url,
            data:"datos="+datos,
            type:"POST",
            success:function(datos){
                $("#contenedor").html(datos);
                $("#titulo").html(titulo);
                $("#modal").modal("show");
                
                
            }
        });
    });

    $(document).on("change","#seleccionArchivos",function(){
        
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

    
});

