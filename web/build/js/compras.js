$(document).ready(function(){
   

    var item = document.getElementById('item');            
    var agrega=
    "<button type='button' id='agrega' class='col-12 form-control btn-success'><i class='fa fa-plus-square-o pl-1' ></i></button>";
    
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
            // item.innerHTML = contadorItem();

            $("#agrega").remove();
          
            var clon = $("#clon").html();
            
            $("#contenedor").append(
                    
            "<div class='form col-12 row ml-5'>"+clon
            + "<div class='col-2'><button type='button' class='delete ml-3 btn btn-danger btn-sm'><i class='fa fa-trash pl-1' ></i></button></div>"
            +agrega
            +"</div> "
            

            );

            
        
            
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

