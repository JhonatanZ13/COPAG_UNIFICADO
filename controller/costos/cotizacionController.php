<?php

require_once '../model/Costos/CotizacionModel.php';

class CotizacionController {

    public function consult(){

        //Consultar no se puede hacer porque hace falta el nombre de donde lo vamos a llamar

        $obj=new CotizacionModel();

        $sql="SELECT
        ped.Ped_id,
        est.Est_nombre,
        CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
        emp.Emp_razonSocial,
        ped.Ped_fecha,
        dp.cantidad,
        dp.total
        FROM
        tblpedido AS ped,
        tblestado AS est,
        tblempresa AS emp,
        (SELECT b.Ped_id, COUNT(a.Dpe_id) AS cantidad, SUM(a.Dpe_valorTotal) AS total FROM `tbldetallepedido` AS a RIGHT JOIN tblpedido AS b ON a.Ped_id = b.Ped_id GROUP BY b.Ped_id) AS dp
        WHERE
        est.Est_id = ped.Est_id AND
        ped.Emp_id = emp.Emp_id AND
        dp.Ped_id = ped.Ped_id AND
        ( ped.Est_id = 6 OR ped.Est_id = 1)
        ORDER BY est.Est_nombre DESC
        ";

        $consultPedido = $obj->consult($sql);
        include_once '../view/costos/cotizacion/consultar.php';
    }

    public function insert(){
        $obj=new CotizacionModel();

        $Ped_id = $obj->autoIncrement('tblpedido','Ped_id');
        
        $sql = "INSERT INTO `tblpedido` 
        (`Ped_id`, `Ped_fecha`,  `Ped_objetivo`, `Est_id`) 
        VALUES 
        ($Ped_id, NOW(), '', '1')";


        $ejecutar= $obj->insert($sql);

        if($ejecutar){
            redirect(getUrl("costos","cotizacion","updateOrden",array('Ped_id'=>$Ped_id)));
        }else{
            echo "Ocurrio un error creando la nueva cotizacion.";
        }

    }

    public function updateOrden(){

        $obj=new CotizacionModel();

        //Aqui se pone la variable de sesion del usuario
        $Usu_id = $_SESSION['idUser'];

        $Ped_id = $_GET['Ped_id'];


        $sql="SELECT tblpedido.Est_id FROM tblpedido WHERE Ped_id=$Ped_id";
        $estado=$obj->consult($sql);
        $estado=mysqli_fetch_row($estado);
        $estado=$estado[0];
    
        if($estado==6){

            $sql="SELECT * FROM tblpedido WHERE Ped_id = $Ped_id";
            $pedido = $obj->consult($sql);

            foreach ($pedido as $pedi) {
                //Tipo de cliente
                if(!($pedi['Tempr_id'] == NULL || $pedi['Tempr_id'] == '') ){
                    $Tempr_id = $pedi['Tempr_id'];
                    $sql="SELECT Tempr_id, Tempr_descripcion FROM `tbltipoempresa` WHERE Tempr_id = $Tempr_id";
                    
                    $respuestaTipoCliente = $obj->consult($sql);
                }

                //Destinatario
                if(!($pedi['destinatario'] == NULL || $pedi['destinatario'] == '') ){

                    //Destinitario
                    $usu_destinatario = $pedi['destinatario'];
                    $sql="SELECT
                    Usu_id,
                    CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre
                    FROM
                    tblusuario AS usu
                    WHERE
                    Usu_id = $usu_destinatario";
                    $respuestaDestinitario = $obj->consult($sql);

                }

                //Cliente
                if(!($pedi['Emp_id'] == NULL || $pedi['Emp_id'] == '') ){
                    $Emp_id=$pedi['Emp_id'];
                    $sql="SELECT
                    emp.Emp_id, 
                    emp.Emp_razonSocial,
                    CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
                    emp.Emp_NIT,
                    emp.Emp_direccion,
                    mun.Mun_nombre,
                    emp.Emp_primerNumeroContacto 
                    FROM
                    tblempresa AS emp,
                    tblmunicipio AS mun
                    WHERE 
                    emp.Mun_id = mun.Mun_id AND
                    emp.Emp_id = $Emp_id";

                    $cliente = $obj->consult($sql);
                }

                //Responsable
                //Id Cotizacion
                if($pedi['Cot_id'] == NULL || $pedi['Cot_id'] == ''){
                    $sql = $this->insertResponsable("INSERT", $Usu_id);

                    $ejecutar = $obj->insert($sql);
                    $Cot_id = ($obj->autoIncrement("tblcotizacion","Cot_id")) -1 ;
                    $sql="UPDATE `tblpedido` SET `Cot_id` = $Cot_id WHERE `tblpedido`.`Ped_id` = $Ped_id";
                    $ejecutar= $obj->update($sql);
                }else{
                    $Cot_id = $pedi['Cot_id'];
                }

            }

            // FechaPedido -> Si o si
            // TipoCliente    SELECT * FROM `tbltiposolicitud`
            // Cliente --- Quitar
            // Nombre - Automaticamente por cliente_id
            // Nit/CC - Automaticamente por cliente_id
            // Direccion - Automaticamente por cliente_id
            // Ciudad - Automaticamente por cliente_id
            // Telefono - Automaticamente por cliente_id
            // Solicitado por 
            // Responsable - Nombre de usuario

                
    
            // $sql="SELECT
            // ped.Ped_fecha,
            // tiposolic.tiposolic_desc,
            // emp.Emp_razonSocial,
            // CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            // emp.Emp_NIT,
            // emp.Emp_direccion,
            // mun.Mun_nombre,
            // emp.Emp_primerNumeroContacto,        
            // CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre
            // FROM
            // tblpedido AS ped,
            // tbltiposolicitud AS tiposolic,
            // tblcotizacion AS coti,
            // tblusuario AS usu,
            // tblempresa AS emp,
            // tblmunicipio AS mun
            // WHERE
            // tiposolic.tiposolic_id = ped.tiposolic_id AND
            // coti.Usu_id = usu.Usu_id AND
            // ped.Cot_id = coti.Cot_id AND
            // emp.Emp_id = ped.Emp_id AND
            // emp.Mun_id = mun.Mun_id AND
            // ped.Ped_id = $Ped_id 
            // ";

            
            // $pedido = $obj->consult($sql);

            //Tipo Cliente
            $sql = "SELECT Tempr_id, Tempr_descripcion FROM `tbltipoempresa` WHERE Tempr_id = 3 OR Tempr_id = 4 OR Tempr_id = 5 ";
            $tipoCliente = $obj->consult($sql);

            //Cliente
            $sql = "SELECT
            emp.Emp_id, 
            emp.Emp_razonSocial,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_NIT,
            emp.Emp_direccion,
            mun.Mun_nombre,
            emp.Emp_primerNumeroContacto 
            FROM
            tblempresa AS emp,
            tblmunicipio AS mun
            WHERE 
            emp.Mun_id = mun.Mun_id";
            $clientes=$obj->consult($sql);


            //Responsable
            $sql="SELECT
            CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre
            FROM
            tblcotizacion AS coti,
            tblusuario AS usu
            WHERE
            usu.Usu_id = coti.Usu_id AND
            coti.Cot_id = $Cot_id";
            $responsable = $obj->consult($sql);

            //Destinitario
            $sql="SELECT
            Usu_id,
            CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre
            FROM
            tblusuario AS usu
            WHERE
            Rol_id = 1 OR Rol_id = 2";
            $destinitario = $obj->consult($sql);


            //Detalle Cotizacion
            $sql="SELECT 
            dp.Dpe_id,
            pb.Pba_descripcion, 
            dp.Dpe_cantidad, 
            dp.Dep_descripcion, 
            dp.Dpe_valorUnitario, 
            dp.Dpe_valorTotal 
            FROM 
            tbldetallepedido as dp, 
            tblproductobase as pb 
            WHERE 
            dp.Ped_id=$Ped_id AND 
            pb.Pba_id = dp.Pba_id";
            $detalleCotizacion = $obj->consult($sql);

            // dd($detalleCotizacion);
            include_once '../view/costos/cotizacion/insertar.php';
        }else{
            $_SESSION['error']["update"]="Solo se puede modificar una cotizacion pendiente por envio!";
            redirect(getUrl("costos","cotizacion","consult"));
        }
    }

    public function insertDetalleCotizacion(){
        $obj=new CotizacionModel();

        $Ped_id=$_GET['Ped_id'];

        //Select Producto Base
        $sql = "SELECT * FROM tblproductobase";
        $productoBase = $obj->consult($sql);

        //Maquina
        $sql="SELECT Maq_id, Maq_nombre FROM `tblmaquina` WHERE Est_id = 1 ";
        $maquina = $obj->consult($sql);

        //Tinta Tipo de articulo = 2 -> Tinta
        $sql="SELECT Arti_id, Arti_nombre FROM `tblarticulo` WHERE Tart_id = 3 AND Est_id = 1";
        $tinta = $obj->consult($sql);

        //Material Tipo de articulo = 1 -> Material
        $sql="SELECT Arti_id, Arti_nombre FROM `tblarticulo` WHERE (Tart_id = 1 OR Tart_id = 4 OR Tart_id = 2 ) AND Est_id = 1";
        $material = $obj->consult($sql);

        //Material Tipo de articulo = 1 -> Material
        $sql="SELECT Ter_id, Ter_descripcion FROM `tblterminado`";
        $terminado = $obj->consult($sql);
        
        include_once '../view/costos/cotizacion/insertarDetalleCotizacion.php';

    }

    public function getConsultClientes(){
        $obj=new CotizacionModel();
        $Emp_id=$_POST['id'];

        if($Emp_id != 0){

            $sql="SELECT
            emp.Emp_id, 
            emp.Emp_razonSocial,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_NIT,
            emp.Emp_direccion,
            mun.Mun_nombre,
            emp.Emp_primerNumeroContacto 
            FROM
            tblempresa AS emp,
            tblmunicipio AS mun
            WHERE 
            emp.Mun_id = mun.Mun_id AND
            emp.Emp_id = $Emp_id";
            $cliente = $obj->consult($sql);
            foreach ($cliente as $clien) {
                $text="
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Nombre:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese nombre' readonly='readonly'
                                value='".$clien['Emp_nombre']."'>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>NIT/CC:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese NIT O CC'
                                readonly='readonly' value='".$clien['Emp_razonSocial']."'>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Direccion:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese Direccion'
                                readonly='readonly' value='".$clien['Emp_direccion']."'>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Ciudad:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese Ciudad' readonly='readonly'
                                value='".$clien['Mun_nombre']."'>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Telefono:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese Telefono'
                                readonly='readonly' value='".$clien['Emp_primerNumeroContacto']."'>
                        </div>
                    </div>
                </div>
                ";
            }
        }else{
            $text="
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Nombre:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese nombre' readonly='readonly'
                                value=''>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>NIT/CC:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese NIT O CC'
                                readonly='readonly' value=''>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Direccion:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese Direccion'
                                readonly='readonly' value=''>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Ciudad:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese Ciudad' readonly='readonly'
                                value=''>
                        </div>
                    </div>
                </div>
                <div class='col-md-12'>
                    <div class='form-group row'>
                        <label class='control-label col-md-2 col-sm-2 '>Telefono:</label>
                        <div class='col-md-8 col-sm-8 '>
                            <input type='text' class='form-control' placeholder='Ingrese Telefono'
                                readonly='readonly' value=''>
                        </div>
                    </div>
                </div>
                ";
        }

        echo $text;



    }

    public function postUpdateCotizacion(){
        $obj=new CotizacionModel();

        $Ped_id=$_POST['Ped_id'];
        $Emp_id=$_POST['Emp_id'];
        $Tempr_id=$_POST['Tempr_id'];
        $destinatario=$_POST['destinatario'];

        $sql="UPDATE `tblpedido` 
        SET  
        `Emp_id` = $Emp_id,
        `destinatario` = $destinatario, 
        `Tempr_id` = $Tempr_id 
        WHERE 
        `tblpedido`.`Ped_id` = $Ped_id";
        $ejecutar = $obj->update($sql);

        $sql = "UPDATE `tblcotizacion` 
        SET
        Cot_fecha = NOW()  
        WHERE 
        `tblcotizacion`.`Cot_id` = (SELECT Cot_id FROM tblpedido WHERE `Ped_id` = $Ped_id)
        ";
        $ejecutar = $obj->update($sql);

        if($ejecutar){
            echo "OK.";
        }else{
            echo "Error.";
        }

    }

    public function postInsertDetalleCotizacion(){
        // dd($_POST);
        $obj=new CotizacionModel();

        //Recibir el ID del pedido
            $Ped_id=$_POST['Ped_id'];

            $Dpe_id = $obj->autoIncrement("tbldetallepedido","Dpe_id"); //Dpe_id
            // $Dpe_id ;

        // Producto
            $descripcion=$_POST['descripcion']; //Dpe_descripcion

            $tipoProducto=$_POST['tipoProducto']; //Pba_id  id del producto
            $cantidadProducto=$_POST['cantidadProducto']; //Dpe_cantidad

            $paginasProducto=$_POST['paginasProducto']; // paginasProducto
            $tamanoAbierto=$_POST['tamanoAbierto']; // tamanoAbierto
            $tamanoCerrado=$_POST['tamanoCerrado']; // tamanoCerrado

            if($paginasProducto==NULL){
                $paginasProducto="NULL";
            }
            if($tamanoAbierto==NULL){
                $tamanoAbierto="NULL";
            }
            if($tamanoCerrado==NULL){
                $tamanoCerrado="NULL";
            }

            $costoDiseno=$_POST['costoDiseno']; //Dpe_valorDiseño
            if($costoDiseno == null){
                $costoDiseno = "NULL";
            }

            $encargadoDiseno=$_POST['encargadoDiseno']; // encargadoDiseno

        
        //Plancha

            $maquinaPlancha=$_POST['maquinaPlancha']; // Maq_id
            $cantidadPlancha=$_POST['cantidadPlancha']; // Dpe_cantidadPlancha
            $costoUnitarioPlancha=$_POST['costoUnitarioPlancha']; // Dpe_valorUnidadPlancha
            $valorTotalPlancha=$_POST['valorTotalPlancha']; // Dpe_totalPlancha

            if($cantidadPlancha == null){
                $cantidadPlancha = "NULL";
            }
            if($costoUnitarioPlancha == null){
                $costoUnitarioPlancha = "NULL";
            }
            if($valorTotalPlancha == null){
                $valorTotalPlancha = "NULL";
            }
            if($maquinaPlancha == 0){
                $maquinaPlancha = "NULL";
                $valorTotalPlancha = "NULL";
                $costoUnitarioPlancha = "NULL";
                $cantidadPlancha = "NULL";
            }




        //Tintas
            $Dpti_id = $obj->autoIncrement("tbldetallepedidotinta","Dpti_id"); //Dpe_id

            $colorTintaBasica=$_POST['colorTintaBasica']; // Dpti_colorTinta
            if($colorTintaBasica=="No aplica"){
                $cantidadTintaBasica="NULL"; //Dpti_cantidadTinta
                $unidadCantidadTintaBasica="NULL"; //Dpti_unidadCantidad
                $costoUnitarioTintaBasica="NULL";  //Dpti_costoUnitario
                $subtotalTintaBasica="NULL"; //Dpti_subTotal
                //Dpti_tipoTinta -> BASICA
            }else{
                $cantidadTintaBasica=$_POST['cantidadTintaBasica']; //Dpti_cantidadTinta

                if($cantidadTintaBasica==NULL){
                    $cantidadTintaBasica = 0;
                }

                $unidadCantidadTintaBasica=$_POST['unidadCantidadTintaBasica']; //Dpti_unidadCantidad
                $costoUnitarioTintaBasica=$_POST['costoUnitarioTintaBasica'];  //Dpti_costoUnitario
                if($costoUnitarioTintaBasica==NULL){
                    $costoUnitarioTintaBasica = 0;
                }
                
                $subtotalTintaBasica=$_POST['subtotalTintaBasica']; //Dpti_subTotal
                if($subtotalTintaBasica==NULL){
                    $subtotalTintaBasica = 0;
                }

                //Dpti_tipoTinta -> BASICA
            }

            // $Arti_idEspecial = $_POST['articuloTintaEspecial']; //Array Arti_id
            $colorTintaEspecial=$_POST['colorTintaEspecial']; //Array Dpti_colorTinta
            $cantidadTintaEspecial=$_POST['cantidadTintaEspecial']; //Array Dpti_cantidadTinta
            $unidadCantidadTintaEspecial=$_POST['unidadCantidadTintaEspecial']; //Array Dpti_unidadCantidad
            $costoUnitarioTintaEspecial=$_POST['costoUnitarioTintaEspecial']; //Array Dpti_costoUnitario
            $subtotalTintaEspecial=$_POST['subtotalTintaEspecial']; //Array Dpti_subTotal
            //Dpti_tipoTinta -> ESPECIAL

        $valorTotalTintas=$_POST['valorTotalTintas']; //Pendiente
        
        //Material
            $Dpm_id = $obj->autoIncrement("tbldetallepedidomateriaprima","Dpm_id"); //Dpm_id 
            $material=$_POST['material']; //Array Arti_id
            // $tamanoMaterial=$_POST['tamanoMaterial']; //Array Dpm_tamanoMaterial
            // $unidadTamanoMaterial=$_POST['unidadTamanoMaterial']; //Array Dpm_unidadTamanoMaterial
            // $gramajeMaterial=$_POST['gramajeMaterial']; //Array Dpm_gramajeMaterial
            // $unidadGramajeMaterial=$_POST['unidadGramajeMaterial']; //Array Dpm_unidadGramajeMaterial
            $cantidadMaterial=$_POST['cantidadMaterial']; //Array Dpm_cantidad
            $costoUnitarioMaterial=$_POST['costoUnitarioMaterial']; //Array Dpm_precioUnitario
            $subtotalMaterial=$_POST['subtotalMaterial']; //Array Dpm_valorTotal

        $valorTotalMaterial=$_POST['valorTotalMaterial']; //Pendiente


        // Terminados
            $Dpt_id = $obj->autoIncrement("tbldetallepedidoterminado","Dpt_id"); //Dpt_id 

            $terminado=$_POST['terminado']; //Array Ter_id
            $maquinaTerminado=$_POST['maquinaTerminado']; //Array Maq_id
            if($maquinaTerminado == NULL || $maquinaTerminado == '0' ){
                $maquinaTerminado = "NULL";
            }
            $cantidadHorasTerminado=$_POST['cantidadHorasTerminado']; //Array Dpt_cantidadHorasTerminado
            $costoUnitarioTerminado=$_POST['costoUnitarioTerminado']; //Array Dpt_costoUnitarioTerminado
            $subtotalTerminado=$_POST['subtotalTerminado']; //Array Dpt_subtotalTerminado
        
        $valorTomadoTerminado=$_POST['valorTomadoTerminado'];

        // Totales
        $insumos=$_POST['insumos']; // Dpe_insumos
        if($insumos == NULL){
            $insumos = 0;
        }

        $procesos=$_POST['procesos']; // Dpe_procesos
        if($procesos == NULL){
            $procesos = 0;
        }

        $total=$_POST['total']; // Dpe_valorTotal
        if($total == NULL){
            $total = 0;
        }

        // echo "total ".$total;
        // echo "cantidad ".$cantidadProducto;
        if(($total > 0 ) && ($cantidadProducto > 0) ){
            $valorUnitario = $total/$cantidadProducto; //Dpe_valorUnitario
        }else{
            $valorUnitario = 0; //Dpe_valorUnitario
        }

        //Detalle pedido
        $sqlDetallePedido="
        INSERT INTO tbldetallepedido (Dpe_id, Dep_descripcion, Dpe_cantidadPlancha, Dpe_valorUnidadPlancha, Dpe_totalPlancha, Dpe_cantidad, Dpe_tamanoCerrado, Dpe_tamanoAbierto, Dpe_paginasProducto,    
        Dpe_valorUnitario, 
        Dpe_valorTotal, 
        Dpe_insumos, 
        Dpe_procesos, 
        Dpe_valorDiseño, 
        Dpe_encargadoDiseno, 
        Ped_id, Pba_id, Maq_id) 
        VALUES (".$Dpe_id.",'".$descripcion."', ".$cantidadPlancha.", ".$costoUnitarioPlancha.", ".$valorTotalPlancha.", ".$cantidadProducto.", '".$tamanoCerrado."', '".$tamanoAbierto."', '".$paginasProducto."', ".$valorUnitario.", ".$total.", ".$insumos.", ".$procesos.", ".$costoDiseno.", '".$encargadoDiseno."', ".$Ped_id.", ".$tipoProducto.", ".$maquinaPlancha.");
        ";

        $contador = 0;
        // echo $sqlDetallePedido."<br>";

        $ejecutar=$obj->insert($sqlDetallePedido);
        if(!$ejecutar){
            $contador++;
            echo "Ups :(, ocurrio un error. Insertar Detalle Pedido. <br>";
        }

        // echo $sqlDetallePedido."<br>";
        
        $sqlDetalleTintaBasica="
        INSERT INTO tbldetallepedidotinta (Dpti_id, Dpe_id, Dpti_colorTinta, Dpti_cantidadTinta, Dpti_unidadCantidad, Dpti_costoUnitario, Dpti_subTotal, Dpti_tipoTinta)
        VALUES ($Dpti_id, 
        $Dpe_id, 
        '".$colorTintaBasica."', 
        $cantidadTintaBasica, 
        '".$unidadCantidadTintaBasica."', 
        $costoUnitarioTintaBasica, 
        $subtotalTintaBasica,
        'BASICA');
        ";
        
        // echo $sqlDetalleTintaBasica."<br>";
        
        $ejecutar=$obj->insert($sqlDetalleTintaBasica);
        if(!$ejecutar){
            $contador++;
            echo "Ups :(, ocurrio un error. Insertar Tinta Basica. <br>";
        }
        // echo $sqlDetalleTintaBasica."<br>";

        //Array
        for($i = 0; $i<count($colorTintaEspecial);$i++){
            if($colorTintaEspecial[$i] != ''){
                $Dpti_id ++;
                $sqlDetalleTintaEspecial="
                INSERT INTO `tbldetallepedidotinta` (`Dpti_id`, `Dpe_id`, `Dpti_colorTinta`, `Dpti_cantidadTinta`, `Dpti_unidadCantidad`, `Dpti_costoUnitario`, `Dpti_subTotal`, `Dpti_tipoTinta`)
                VALUES ($Dpti_id,  
                $Dpe_id, 
                '".$colorTintaEspecial[$i]."', 
                $cantidadTintaEspecial[$i], 
                '".$unidadCantidadTintaEspecial[$i]."', 
                $costoUnitarioTintaEspecial[$i], 
                $subtotalTintaEspecial[$i],'ESPECIAL');
                ";
                // echo $sqlDetalleTintaEspecial."<br>";

                // echo $sqlDetalleTintaEspecial."<br>";

                $ejecutar=$obj->insert($sqlDetalleTintaEspecial);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Insertar detalle tinta especial. <br>";
                }
            }
            
        }

        for($i = 0; $i<count($cantidadMaterial);$i++){
            if($material[$i]!=0){
                $sqlMaterial ="
                INSERT INTO `tbldetallepedidomateriaprima` (`Dpm_id`, `Dpm_cantidad`, `Dpm_precioUnitario`, `Dpm_valorTotal`, `Dpe_id`, `Arti_id`) 
                VALUES ($Dpm_id, 
                $cantidadMaterial[$i], 
                $costoUnitarioMaterial[$i], 
                $subtotalMaterial[$i], 
                $Dpe_id, 
                $material[$i]);
                ";
                // echo $sqlMaterial."<br>";
                $Dpm_id ++;

                // echo $sqlMaterial."<br>";

                $ejecutar=$obj->insert($sqlMaterial);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Insertar detalle material. <br>";
                }
            }
        }

        for($i = 0; $i<count($cantidadHorasTerminado);$i++){
            if($terminado[$i] !=0){
                
                if($maquinaTerminado[$i]=="0"){
                    $maquinaTerminado[$i]="NULL";
                }
                if($costoUnitarioTerminado[$i]==NULL){
                    $costoUnitarioTerminado[$i]="0";
                }
                if($subtotalTerminado[$i]==NULL){
                    $subtotalTerminado[$i]="0";
                }
                
                $sqlTerminado ="
                INSERT INTO `tbldetallepedidoterminado` (`Dpt_id`, `Dpt_cantidadHorasTerminado`, `Dpt_costoUnitarioTerminado`, `Dpt_subtotalTerminado`, `Ter_id`, `Dpe_id`, `Maq_id`) 
                VALUES ($Dpt_id, 
                $cantidadHorasTerminado[$i], 
                $costoUnitarioTerminado[$i], 
                $subtotalTerminado[$i], 
                $terminado[$i], 
                $Dpe_id, 
                $maquinaTerminado[$i]);
                ";
                // echo $sqlTerminado."<br>";
                $Dpt_id ++;

                // echo $sqlTerminado."<br>";

                $ejecutar=$obj->insert($sqlTerminado);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Insertar detalle terminado. <br>";
                }
            }
        }

        if($contador == 0){
            
            redirect(getUrl("costos","cotizacion","updateOrden",array('Ped_id'=>$Ped_id)));
            // echo getUrl("costos","cotizacion","updateOrden",array('Ped_id'=>$Ped_id));
        }else{
            echo "Ocurrio un error.";
        }

    }

    public function postUpdateDetalleCotizacion(){
        // dd($_POST);
        $obj=new CotizacionModel();

        //Recibir el ID del detalle del pedido
        $Dpe_id =$_POST['Dpe_id'];//Dpe_id


        //Recibir el ID del pedido
            $sql="SELECT Ped_id FROM tbldetallepedido WHERE Dpe_id = $Dpe_id";
            $resultado=$obj->consult($sql);
            foreach ($resultado as $r) {
                $Ped_id=$r['Ped_id'];
            }

        // Producto
            $descripcion=$_POST['descripcion']; //Dpe_descripcion

            $tipoProducto=$_POST['tipoProducto']; //Pba_id  id del producto
            $cantidadProducto=$_POST['cantidadProducto']; //Dpe_cantidad

            $paginasProducto=$_POST['paginasProducto']; // paginasProducto
            $tamanoAbierto=$_POST['tamanoAbierto']; // tamanoAbierto
            $tamanoCerrado=$_POST['tamanoCerrado']; // tamanoCerrado

            $costoDiseno=$_POST['costoDiseno']; //Dpe_valorDiseño
            if($costoDiseno == null){
                $costoDiseno = "NULL";
            }

            $encargadoDiseno=$_POST['encargadoDiseno']; // encargadoDiseno

        
        //Plancha
        
            $maquinaPlancha=$_POST['maquinaPlancha']; // Maq_id
            $cantidadPlancha=$_POST['cantidadPlancha']; // Dpe_cantidadPlancha
            $costoUnitarioPlancha=$_POST['costoUnitarioPlancha']; // Dpe_valorUnidadPlancha
            $valorTotalPlancha=$_POST['valorTotalPlancha']; // Dpe_totalPlancha

            if($cantidadPlancha == null){
                $cantidadPlancha = "NULL";
            }
            if($costoUnitarioPlancha == null){
                $costoUnitarioPlancha = "NULL";
            }
            if($valorTotalPlancha == null){
                $valorTotalPlancha = "NULL";
            }
            if($maquinaPlancha == 0){
                $maquinaPlancha = "NULL";
                $valorTotalPlancha = "NULL";
                $costoUnitarioPlancha = "NULL";
                $cantidadPlancha = "NULL";
            }
            




        // Totales
            $insumos=$_POST['insumos']; // Dpe_insumos
            if($insumos == NULL){
                $insumos = 0;
            }

            $procesos=$_POST['procesos']; // Dpe_procesos
            if($procesos == NULL){
                $procesos = 0;
            }

            $total=$_POST['total']; // Dpe_valorTotal
            if($total == NULL){
                $total = 0;
            }

            // echo "total ".$total;
            // echo "cantidad ".$cantidadProducto;
            if(($total > 0 ) && ($cantidadProducto > 0) ){
                $valorUnitario = $total/$cantidadProducto; //Dpe_valorUnitario
            }else{
                $valorUnitario = 0; //Dpe_valorUnitario
            }
            

        //Detalle Pedido
        $sqlDetallePedido="UPDATE tbldetallepedido 
        SET
        Dep_descripcion =  '".$descripcion."',
        Dpe_cantidadPlancha =  ".$cantidadPlancha.",
        Dpe_valorUnidadPlancha =  ".$costoUnitarioPlancha.",
        Dpe_totalPlancha =  ".$valorTotalPlancha.",
        Dpe_cantidad =  ".$cantidadProducto.",
        Dpe_tamanoCerrado =  '".$tamanoCerrado."',
        Dpe_tamanoAbierto =  '".$tamanoAbierto."',
        Dpe_paginasProducto = '".$paginasProducto."',
        Dpe_valorUnitario =  ".$valorUnitario.",
        Dpe_valorTotal =  ".$total.",
        Dpe_insumos =  ".$insumos.",
        Dpe_procesos =  ".$procesos.",
        Dpe_valorDiseño =  ".$costoDiseno.",
        Dpe_encargadoDiseno = '".$encargadoDiseno."', 
        Pba_id =  ".$tipoProducto.",
        Maq_id =  ".$maquinaPlancha."
        WHERE
        Dpe_id = ".$Dpe_id."
        ";

        // echo $sqlDetallePedido."<br>";


        $contador = 0;
        $ejecutar=$obj->insert($sqlDetallePedido);

        if(!$ejecutar){
            $contador++;
            echo "Ups :(, ocurrio un error. Actualizando Detalle Pedido.";
        }

        // echo $sqlDetallePedido."<br>";
        

        //Tintas

        //Tintas

        $colorTintaBasica=$_POST['colorTintaBasica']; // Dpti_colorTinta
        if($colorTintaBasica=="No aplica"){
            $cantidadTintaBasica="NULL"; //Dpti_cantidadTinta
            $unidadCantidadTintaBasica="NULL"; //Dpti_unidadCantidad
            $costoUnitarioTintaBasica="NULL";  //Dpti_costoUnitario
            $subtotalTintaBasica="NULL"; //Dpti_subTotal
            //Dpti_tipoTinta -> BASICA
        }else{

            $cantidadTintaBasica=$_POST['cantidadTintaBasica']; //Dpti_cantidadTinta

            if($cantidadTintaBasica==NULL){
                $cantidadTintaBasica = 0;
            }

            $unidadCantidadTintaBasica=$_POST['unidadCantidadTintaBasica']; //Dpti_unidadCantidad
            $costoUnitarioTintaBasica=$_POST['costoUnitarioTintaBasica'];  //Dpti_costoUnitario
            if($costoUnitarioTintaBasica==NULL){
                $costoUnitarioTintaBasica = 0;
            }
            
            $subtotalTintaBasica=$_POST['subtotalTintaBasica']; //Dpti_subTotal
            if($subtotalTintaBasica==NULL){
                $subtotalTintaBasica = 0;
            }
            //Dpti_tipoTinta -> BASICA

        }

        if(isset($_POST['Dpti_id'])){
            $Dpti_id = $_POST['Dpti_id']; //Dpti_id
            $sqlDetalleTintaBasica="UPDATE tbldetallepedidotinta SET
            Dpe_id =  $Dpe_id, 
            Dpti_colorTinta =  '".$colorTintaBasica."', 
            Dpti_cantidadTinta =  $cantidadTintaBasica, 
            Dpti_unidadCantidad =  '".$unidadCantidadTintaBasica."', 
            Dpti_costoUnitario =  $costoUnitarioTintaBasica, 
            Dpti_subTotal =  $subtotalTintaBasica
            WHERE
            Dpti_id =  $Dpti_id
            ";

        }else{
            $Dpti_id = $obj->autoIncrement("tbldetallepedidotinta","Dpti_id"); //Dpe_id

            $sqlDetalleTintaBasica="
            INSERT INTO tbldetallepedidotinta (Dpti_id, Dpe_id, Dpti_colorTinta, Dpti_cantidadTinta, Dpti_unidadCantidad, Dpti_costoUnitario, Dpti_subTotal, Dpti_tipoTinta)
            VALUES ($Dpti_id, 
            $Dpe_id, 
            '".$colorTintaBasica."', 
            $cantidadTintaBasica, 
            '".$unidadCantidadTintaBasica."', 
            $costoUnitarioTintaBasica, 
            $subtotalTintaBasica,
            'BASICA');
            ";
        }
        
        $ejecutar=$obj->insert($sqlDetalleTintaBasica);
        if(!$ejecutar){
            $contador++;
            echo $sqlDetalleTintaBasica."<br>";
            echo "Ups :(, ocurrio un error. Insertar Tinta Basica.";
        }




        // $Dpti_idEspecial = $_POST['Dpti_idEspecial']; //Array Dpti_idEspecial

        // $Arti_idEspecial = $_POST['articuloTintaEspecial']; //Array Arti_id --> Se elimino

        $colorTintaEspecial=$_POST['colorTintaEspecial']; //Array Dpti_colorTinta
        $cantidadTintaEspecial=$_POST['cantidadTintaEspecial']; //Array Dpti_cantidadTinta
        $unidadCantidadTintaEspecial=$_POST['unidadCantidadTintaEspecial']; //Array Dpti_unidadCantidad
        $costoUnitarioTintaEspecial=$_POST['costoUnitarioTintaEspecial']; //Array Dpti_costoUnitario
        $subtotalTintaEspecial=$_POST['subtotalTintaEspecial']; //Array Dpti_subTotal
        //Dpti_tipoTinta -> ESPECIAL

        $valorTotalTintas=$_POST['valorTotalTintas']; //Pendiente
    
        
        // echo $sqlDetalleTintaBasica."<br>";

        //Array
        $Dpti_id = $obj->autoIncrement("tbldetallepedidotinta","Dpti_id");
        for($i = 0; $i<count($colorTintaEspecial);$i++){
            if($i == 0){
                $sqlDeleteDetalleTintaEspecial="DELETE
                FROM tbldetallepedidotinta
                WHERE 
                Dpti_tipoTinta = 'ESPECIAL' AND
                Dpe_id = $Dpe_id
                ";

                $ejecutar=$obj->delete($sqlDeleteDetalleTintaEspecial);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Eliminando detalle tinta especial.";
                }
            }

            if($colorTintaEspecial[$i] != ''){
                $sqlDetalleTintaEspecial="
                INSERT INTO `tbldetallepedidotinta` (`Dpti_id`, `Dpe_id`, `Dpti_colorTinta`, `Dpti_cantidadTinta`, `Dpti_unidadCantidad`, `Dpti_costoUnitario`, `Dpti_subTotal`, `Dpti_tipoTinta`)
                VALUES ($Dpti_id, 
                $Dpe_id, 
                '".$colorTintaEspecial[$i]."', 
                $cantidadTintaEspecial[$i], 
                '".$unidadCantidadTintaEspecial[$i]."', 
                $costoUnitarioTintaEspecial[$i], 
                $subtotalTintaEspecial[$i],'ESPECIAL');
                ";
                $Dpti_id++;

                echo $sqlDetalleTintaEspecial."<br>";

                $ejecutar=$obj->insert($sqlDetalleTintaEspecial);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Insertar detalle tinta especial.";
                }
            }
        }




        //Material
        //Material - Obtener datos

            $Dpm_id = $obj->autoIncrement("tbldetallepedidomateriaprima","Dpm_id"); //Dpm_id 
            $material=$_POST['material']; //Array Arti_id

            // $tamanoMaterial=$_POST['tamanoMaterial']; //Array Dpm_tamanoMaterial -> Eliminado
            // $unidadTamanoMaterial=$_POST['unidadTamanoMaterial']; //Array Dpm_unidadTamanoMaterial  -> Eliminado
            // $gramajeMaterial=$_POST['gramajeMaterial']; //Array Dpm_gramajeMaterial  -> Eliminado
            // $unidadGramajeMaterial=$_POST['unidadGramajeMaterial']; //Array Dpm_unidadGramajeMaterial  -> Eliminado
            
            $cantidadMaterial=$_POST['cantidadMaterial']; //Array Dpm_cantidad
            $costoUnitarioMaterial=$_POST['costoUnitarioMaterial']; //Array Dpm_precioUnitario
            $subtotalMaterial=$_POST['subtotalMaterial']; //Array Dpm_valorTotal

            $valorTotalMaterial=$_POST['valorTotalMaterial']; //Pendiente   

            for($i = 0; $i<count($cantidadMaterial);$i++){

                if($i == 0){
                    $sqlDeleteMaterial="DELETE
                    FROM tbldetallepedidomateriaprima
                    WHERE 
                    $Dpe_id = Dpe_id
                    ";

                    $ejecutar=$obj->delete($sqlDeleteMaterial);
                    if(!$ejecutar){
                        $contador++;
                        echo "Ups :(, ocurrio un error. Eliminando detalle Material.";
                    }
                }

                if($material[$i]!=0){
                    $sqlMaterial ="
                    INSERT INTO `tbldetallepedidomateriaprima` (`Dpm_id`, `Dpm_cantidad`, `Dpm_precioUnitario`, `Dpm_valorTotal`, `Dpe_id`, `Arti_id`) 
                    VALUES ($Dpm_id,  
                    $cantidadMaterial[$i], 
                    $costoUnitarioMaterial[$i], 
                    $subtotalMaterial[$i], 
                    $Dpe_id, 
                    $material[$i]);
                    ";
                    echo $sqlMaterial."<br>";
                    $Dpm_id ++;

                    $ejecutar=$obj->insert($sqlMaterial);
                    if(!$ejecutar){
                        $contador++;
                        echo "Ups :(, ocurrio un error. Insertar detalle material.";
                    }
                }
            }




        //Terminados
        // Terminados - Traer los datos
        
        $Dpt_id = $obj->autoIncrement("tbldetallepedidoterminado","Dpt_id"); //Dpt_id 

        $terminado=$_POST['terminado']; //Array Ter_id
        $maquinaTerminado=$_POST['maquinaTerminado']; //Array Maq_id
        $cantidadHorasTerminado=$_POST['cantidadHorasTerminado']; //Array Dpt_cantidadHorasTerminado
        $costoUnitarioTerminado=$_POST['costoUnitarioTerminado']; //Array Dpt_costoUnitarioTerminado
        $subtotalTerminado=$_POST['subtotalTerminado']; //Array Dpt_subtotalTerminado
        
        $valorTomadoTerminado=$_POST['valorTomadoTerminado'];

        for($i = 0; $i<count($cantidadHorasTerminado);$i++){

            if($i == 0){
                $sqlDeleteTerminado="DELETE
                FROM tbldetallepedidoterminado
                WHERE 
                $Dpe_id = Dpe_id
                ";

                $ejecutar=$obj->delete($sqlDeleteTerminado);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Eliminando detalle Terminado.";
                }
            }

            

            if($terminado[$i] !=0){

                if($maquinaTerminado[$i]=="0"){
                    $maquinaTerminado[$i]="NULL";
                }
                if($costoUnitarioTerminado[$i]==NULL){
                    $costoUnitarioTerminado[$i]="0";
                }
                if($subtotalTerminado[$i]==NULL){
                    $subtotalTerminado[$i]="0";
                }

                $sqlTerminado ="
                INSERT INTO `tbldetallepedidoterminado` (`Dpt_id`, `Dpt_cantidadHorasTerminado`, `Dpt_costoUnitarioTerminado`, `Dpt_subtotalTerminado`, `Ter_id`, `Dpe_id`, `Maq_id`) 
                VALUES ($Dpt_id, 
                $cantidadHorasTerminado[$i], 
                $costoUnitarioTerminado[$i], 
                $subtotalTerminado[$i], 
                $terminado[$i], 
                $Dpe_id, 
                $maquinaTerminado[$i]);
                ";
                echo $sqlTerminado."<br>";
                $Dpt_id ++;
    
                $ejecutar=$obj->insert($sqlTerminado);
                if(!$ejecutar){
                    $contador++;
                    echo "Ups :(, ocurrio un error. Insertar detalle terminado.";
                }
            }
            
        }
        




        if($contador == 0){
            redirect(getUrl("costos","cotizacion","updateOrden",array('Ped_id'=>$Ped_id)));
            // echo getUrl("costos","cotizacion","updateOrden",array('Ped_id'=>$Ped_id));
        }else{
            echo "Ocurrio un error.";
        }

    }

    // getConsultDetalleCotizacion
    public function consultDetalleCotizacion(){
        $obj=new CotizacionModel();

        $Dpe_id=$_GET['Dpe_id'];

        //Recibir el ID del pedido
            $sql="SELECT Ped_id FROM tbldetallepedido WHERE Dpe_id = $Dpe_id";
            $resultado=$obj->consult($sql);
            foreach ($resultado as $r) {
                $Ped_id=$r['Ped_id'];
            }

        $sql="SELECT
        dp.Dep_descripcion,
        dp.Pba_id,
        dp.Dpe_cantidad,
        dp.Dpe_paginasProducto,
        dp.Dpe_tamanoAbierto,
        dp.Dpe_tamanoCerrado,
        dp.Dpe_valorDiseño,
        dp.Dpe_encargadoDiseno,
        dp.Maq_id,
        dp.Dpe_cantidadPlancha,
        dp.Dpe_valorUnidadPlancha,
        dp.Dpe_totalPlancha,
        dp.Dpe_insumos,
        dp.Dpe_procesos,
        dp.Dpe_valorTotal
        FROM
        tbldetallepedido AS dp
        WHERE
        dp.Dpe_id=$Dpe_id
        ";

        $capturarDetalleCotizacion = $obj->consult($sql);

        //Tinta capturar valor
        $sql="SELECT
        dpti.Dpti_id,
        dpti.Dpti_colorTinta,
        dpti.Dpti_unidadCantidad,
        dpti.Dpti_cantidadTinta,
        dpti.Dpti_costoUnitario,
        dpti.Dpti_subTotal,
        dpti.Dpti_tipoTinta,
        dpti.Dpe_id
        FROM
        tbldetallepedidotinta AS dpti
        WHERE
        dpti.Dpe_id=$Dpe_id 
        ";
        $capturarDetalleTinta = $obj->consult($sql);

        //Material capturar valor
        $sql="SELECT
        dpm.Arti_id,
        dpm.Dpm_cantidad,
        med.Med_descripcion,
        dpm.Dpm_precioUnitario,
        dpm.Dpm_valorTotal
        FROM
        tbldetallepedidomateriaprima AS dpm,
        tblarticulo AS arti,
        tblmedida AS med
        WHERE
        dpm.Arti_id = arti.Arti_id AND
        arti.Med_id = med.Med_id AND
        dpm.Dpe_id=$Dpe_id
        ";
        $capturarDetalleMaterial = $obj->consult($sql);


        //Terminados capturar valor
        $sql="SELECT
        Ter_id,
        Maq_id,
        Dpt_cantidadHorasTerminado,
        Dpt_costoUnitarioTerminado,
        Dpt_subtotalTerminado
        FROM
        tbldetallepedidoterminado
        WHERE
        Dpe_id=$Dpe_id
        ";
        $capturaDetalleTerminado = $obj->consult($sql);

        //Select Producto Base
        $sql = "SELECT * FROM tblproductobase";
        $productoBase = $obj->consult($sql);

        //Maquina
        $sql="SELECT Maq_id, Maq_nombre FROM `tblmaquina` WHERE Est_id = 1";
        $maquina = $obj->consult($sql);

        //Tinta Tipo de articulo = 2 -> Tinta
        // $sql="SELECT Arti_id, Arti_nombre FROM `tblarticulo` WHERE Tart_id = 3";
        // $tinta = $obj->consult($sql);

        //Material Tipo de articulo = 1 -> Material
        $sql="SELECT Arti_id, Arti_nombre FROM `tblarticulo` WHERE Tart_id = 1";
        $material = $obj->consult($sql);

        //Material Tipo de articulo = 1 -> Material
        $sql="SELECT Ter_id, Ter_descripcion FROM `tblterminado`";
        $terminado = $obj->consult($sql);
        
        include_once '../view/costos/cotizacion/updateDetalleCotizacion.php';

    }




    // postDeleteDetelleCotizacion


    public function postDeleteDetelleCotizacion(){
        $obj=new CotizacionModel();

        $Dpe_id=$_GET['Dpe_id'];
        $Ped_id = $_GET['Ped_id'];
        $contador=0;

        //Tintas
        
        $sql="DELETE
        FROM
        tbldetallepedidotinta
        WHERE
        Dpe_id=$Dpe_id
        ";
        $ejecutarTinta = $obj->delete($sql);
        if(!$ejecutarTinta){
            $contador++;
            echo "Ups :(, ocurrio un error. Eliminando detalle tinta.";
        }

        //Terminados

        //Terminados capturar valor
        $sql="DELETE
        FROM
        tbldetallepedidoterminado
        WHERE
        Dpe_id=$Dpe_id
        ";
        $ejecutarTerminado = $obj->delete($sql);
        if(!$ejecutarTerminado){
            $contador++;
            echo "Ups :(, ocurrio un error. Eliminando detalle terminado.";
        }

        //Maquina
        
        $sql="DELETE
        FROM
        tbldetallepedidomateriaprima
        WHERE
        Dpe_id=$Dpe_id
        ";
        $ejecutarMaterial = $obj->delete($sql);
        if(!$ejecutarMaterial){
            $contador++;
            echo "Ups :(, ocurrio un error. Eliminando detalle materia.";
        }
        
        //Eliminar detalle cotizacion
        $sql = "DELETE
        FROM
        tbldetallepedido
        WHERE
        Dpe_id=$Dpe_id
        ";

        $ejecutarDetallePedido = $obj->delete($sql);
        if(!$ejecutarDetallePedido){
            $contador++;
            echo "Ups :(, ocurrio un error. Eliminando detalle pedido.";
        }
        
        if($contador == 0){
            redirect(getUrl("costos","cotizacion","updateOrden",array('Ped_id'=>$Ped_id)));
        }else{
            echo "Ocurrio un error eliminando detalle cotizacion.";
        }

    }
    

    // postDeletePedido
    public function rechazarCotizacion(){
        $obj=new CotizacionModel();

        $Ped_id = $_POST['Ped_id'];
        $Ped_motivo = $_POST['motivoRechazo'];

        //pedido
        $sql="UPDATE `tblpedido` 
        SET `Est_id` = '10',
        Ped_motivo = '".$Ped_motivo."'
        WHERE
        `Ped_id` = $Ped_id
        ";

        $ejecutarPedido = $obj->update($sql);
        if($ejecutarPedido){
            $_SESSION['success']["update"]="Cotización rechazada con exito!";
            redirect(getUrl("costos","cotizacion","consult"));
        }else{
            $_SESSION['error']["update"]="No se pudo rechazar la cotización!";
            redirect(getUrl("costos","cotizacion","consult"));
           
        }
    }


    //Aprobar Pedido
    public function aprobarCotizacion(){
        $obj=new CotizacionModel();

        $Ped_id = $_POST['Ped_id'];

        //pedido
        $sql="UPDATE `tblpedido` 
        SET `Est_id` = '9' 
        WHERE
        `Ped_id` = $Ped_id
        ";

        $ejecutarPedido = $obj->update($sql);
        if($ejecutarPedido){
            $_SESSION['success']["update"]="Cotización Aprobada!";
            redirect(getUrl("costos","cotizacion","consult"));
        }else{
            $_SESSION['success']["update"]="La cotización no se pudo aprobar!";
            redirect(getUrl("costos","cotizacion","consult"));
         
        }
    }

    public function solicitarAprobarCotizacion(){
        $obj=new CotizacionModel();

        $Ped_id = $_GET['Ped_id'];


        //enviar mensaje por correo


        //pedido
        $sql="UPDATE `tblpedido` 
        SET `Est_id` = '8' 
        WHERE
        `Ped_id` = $Ped_id
        ";

        $ejecutarPedido = $obj->update($sql);
        if($ejecutarPedido){
            // redirect(getUrl("costos","cotizacion","consult"));
            redirect(getUrl("costos","cotizacion","consult"));
        }else{
            echo "Ups :(, ocurrio un error. cambiando de estado pedido.";
        }
    }

    public function mensajeCorreo(){

    }

    public function rechazarModal(){
        $id = $_POST['id'];
        $obj=new CotizacionModel();
        //Validar si la cotizacion esta vacia o  cuenta con almenos un producto
        //Detalle Cotizacion
        $sql="SELECT dp.Dpe_id,pb.Pba_descripcion, dp.Dpe_cantidad, dp.Dep_descripcion, dp.Dpe_valorUnitario, dp.Dpe_valorTotal FROM tbldetallepedido as dp, tblproductobase as pb WHERE dp.Ped_id=$id AND pb.Pba_id = dp.Pba_id";
        $detalleCotizacion = $obj->consult($sql);

        include_once '../view/costos/cotizacion/rechazarModal.php';
    }


    public function aprobarCotizacionModal(){
        $id = $_POST['id'];
        $obj=new CotizacionModel();

        //Validar si la cotizacion esta vacia o  cuenta con almenos un producto
        //Detalle Cotizacion
        $sql="SELECT dp.Dpe_id,pb.Pba_descripcion, dp.Dpe_cantidad, dp.Dep_descripcion, dp.Dpe_valorUnitario, dp.Dpe_valorTotal FROM tbldetallepedido as dp, tblproductobase as pb WHERE dp.Ped_id=$id AND pb.Pba_id = dp.Pba_id";
        $detalleCotizacion = $obj->consult($sql);

        include_once '../view/costos/cotizacion/aprobarCotizacionModal.php';
    }
    public function solicitarAprobarCotizacionModal(){
        $id = $_POST['id'];
        $obj=new CotizacionModel();

        //Validar si la cotizacion esta vacia o  cuenta con almenos un producto
        //Detalle Cotizacion
        $sql="SELECT 
        dp.Dpe_id,pb.Pba_descripcion, 
        dp.Dpe_cantidad, 
        dp.Dep_descripcion, 
        dp.Dpe_valorUnitario, 
        dp.Dpe_valorTotal 
        FROM 
        tbldetallepedido as dp, 
        tblproductobase as pb 
        WHERE 
        dp.Ped_id=$id AND 
        pb.Pba_id = dp.Pba_id";
        $detalleCotizacion = $obj->consult($sql);

        include_once '../view/costos/cotizacion/solicitarAprobarCotizacionModal.php';
    }

    public function getConsultarUnidadMedida(){
        $arti_id = $_POST['id'];
        $obj=new CotizacionModel();

        //pedido
        $sql="SELECT
        med.Med_descripcion
        FROM
        tblarticulo AS arti,
        tblmedida AS med
        WHERE
        arti.Med_id = med.Med_id AND
        arti.Arti_id = $arti_id
        ";

        $resultado = $obj->consult($sql);
        if($resultado){
            foreach($resultado as $res){
                echo $res['Med_descripcion'];
            }
        }else{
            echo "Ups :(, ocurrio un error. cambiando de estado pedido.";
        }
    }








    public function insertResponsable($accion, $Usu_id, $Cot_id=false){
        if($accion == "INSERT"){

            $sql="INSERT INTO 
            `tblcotizacion` (`Cot_id`, `Cot_fecha`, `Usu_id`) VALUES 
            (NULL, NOW(), $Usu_id)";

        }if ($accion == "UPDATE" && $Cot_id != false){

            $sql="UPDATE 
            `tblcotizacion` SET `Cot_fecha` = NOW(), Usu_id = $Usu_id
            WHERE `tblcotizacion`.`Cot_id` = $Cot_id";

        }

        return $sql;

    }

    public function consultarCotizacionAprobacion(){

        //Solo tiene acceso el administrador y funcionario
        // funcion validar rol diferente a aprendiz

        if($this->esDiferenteAprendiz()){

            $obj=new CotizacionModel();
            $sql="SELECT
            ped.Ped_id,
            est.Est_nombre,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_razonSocial,
            ped.Ped_fecha
            FROM
            tblpedido AS ped,
            tblestado AS est,
            tblempresa AS emp
            WHERE
            est.Est_id = ped.Est_id AND
            ped.Emp_id = emp.Emp_id AND
            ( ped.Est_id = 8 )
            ORDER BY est.Est_nombre DESC
            ";

            $consultPedido = $obj->consult($sql);
            include_once '../view/costos/cotizacion/consultarAprobacionCotizacion.php';
        
        }else{
            // No tiene Acceso
            include_once '../view/partials/page404.php';
        }


    }


    

    public function consultAprobacionOrden(){
        $obj=new CotizacionModel();
        
        if($this->esDiferenteAprendiz()){
            //Aqui se pone la variable de sesion del usuario
            $Usu_id = $_SESSION['idUser'];
            $Ped_id = $_GET['Ped_id'];

            $sql="SELECT * FROM tblpedido WHERE Ped_id = $Ped_id";
            $pedido = $obj->consult($sql);

            foreach ($pedido as $pedi) {
                //Tipo de cliente
                if(!($pedi['Tempr_id'] == NULL || $pedi['Tempr_id'] == '') ){
                    $Tempr_id = $pedi['Tempr_id'];
                    $sql="SELECT Tempr_id, Tempr_descripcion FROM `tbltipoempresa` WHERE Tempr_id = $Tempr_id";
                    
                    $respuestaTipoCliente = $obj->consult($sql);
                }

                //Destinatario
                if(!($pedi['destinatario'] == NULL || $pedi['destinatario'] == '') ){

                    //Destinitario
                    $usu_destinatario = $pedi['destinatario'];
                    $sql="SELECT
                    Usu_id,
                    CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre
                    FROM
                    tblusuario AS usu
                    WHERE
                    Usu_id = $usu_destinatario";
                    $respuestaDestinitario = $obj->consult($sql);

                }

                //Cliente
                if(!($pedi['Emp_id'] == NULL || $pedi['Emp_id'] == '') ){
                    $Emp_id=$pedi['Emp_id'];
                    $sql="SELECT
                    emp.Emp_id, 
                    emp.Emp_razonSocial,
                    CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
                    emp.Emp_NIT,
                    emp.Emp_direccion,
                    mun.Mun_nombre,
                    emp.Emp_primerNumeroContacto 
                    FROM
                    tblempresa AS emp,
                    tblmunicipio AS mun
                    WHERE 
                    emp.Mun_id = mun.Mun_id AND
                    emp.Emp_id = $Emp_id";

                    $cliente = $obj->consult($sql);
                }

                //Responsable
                //Id Cotizacion
                if($pedi['Cot_id'] == NULL || $pedi['Cot_id'] == ''){
                    $sql = $this->insertResponsable("INSERT", $Usu_id);

                    $ejecutar = $obj->insert($sql);
                    $Cot_id = ($obj->autoIncrement("tblcotizacion","Cot_id")) -1 ;
                    $sql="UPDATE `tblpedido` SET `Cot_id` = $Cot_id WHERE `tblpedido`.`Ped_id` = $Ped_id";
                    $ejecutar= $obj->update($sql);
                }else{
                    $Cot_id = $pedi['Cot_id'];
                }

                $fechaPedido = $pedi['Ped_fecha'];

            }

            //Tipo Cliente
            $sql = "SELECT Tempr_id, Tempr_descripcion FROM `tbltipoempresa` WHERE Tempr_id = 3 OR Tempr_id = 4 OR Tempr_id = 5 ";
            $tipoCliente = $obj->consult($sql);

            //Cliente
            $sql = "SELECT
            emp.Emp_id, 
            emp.Emp_razonSocial,
            CONCAT(emp.Emp_nombreContacto,' ',emp.Emp_apellidoContacto) AS Emp_nombre,
            emp.Emp_NIT,
            emp.Emp_direccion,
            mun.Mun_nombre,
            emp.Emp_primerNumeroContacto 
            FROM
            tblempresa AS emp,
            tblmunicipio AS mun
            WHERE 
            emp.Mun_id = mun.Mun_id";
            $clientes=$obj->consult($sql);

            //Responsable
            $sql="SELECT
            CONCAT(usu.Usu_primerNombre,' ',usu.Usu_segundoNombre,' ',usu.Usu_primerApellido,' ',usu.Usu_segundoApellido) AS Usu_nombre
            FROM
            tblcotizacion AS coti,
            tblusuario AS usu
            WHERE
            usu.Usu_id = coti.Usu_id AND
            coti.Cot_id = $Cot_id";
            $responsable = $obj->consult($sql);

            //Detalle Cotizacion
            $sql="SELECT dp.Dpe_id,pb.Pba_descripcion, dp.Dpe_cantidad, dp.Dep_descripcion, dp.Dpe_valorUnitario, dp.Dpe_valorTotal FROM tbldetallepedido as dp, tblproductobase as pb WHERE dp.Ped_id=$Ped_id AND pb.Pba_id = dp.Pba_id";
            $detalleCotizacion = $obj->consult($sql);

            // dd($detalleCotizacion);
            include_once '../view/costos/cotizacion/consultAprobacionPedido.php';
        }else{
            // No tiene Acceso
            include_once '../view/partials/page404.php';
        }
    }


    

    
    public function consultAprobacionDetalleCotizacion(){
        $obj=new CotizacionModel();
        if($this->esDiferenteAprendiz()){
            $Dpe_id=$_GET['Dpe_id'];
            //Recibir el ID del pedido
                $sql="SELECT Ped_id FROM tbldetallepedido WHERE Dpe_id = $Dpe_id";
                $resultado=$obj->consult($sql);
                foreach ($resultado as $r) {
                    $Ped_id=$r['Ped_id'];
                }

            $sql="SELECT
            dp.Dep_descripcion,
            dp.Pba_id,
            dp.Dpe_cantidad,
            dp.Dpe_paginasProducto,
            dp.Dpe_tamanoAbierto,
            dp.Dpe_tamanoCerrado,
            dp.Dpe_valorDiseño,
            dp.Dpe_encargadoDiseno,
            dp.Maq_id,
            dp.Dpe_cantidadPlancha,
            dp.Dpe_valorUnidadPlancha,
            dp.Dpe_totalPlancha,
            dp.Dpe_insumos,
            dp.Dpe_procesos,
            dp.Dpe_valorTotal
            FROM
            tbldetallepedido AS dp
            WHERE
            dp.Dpe_id=$Dpe_id
            ";

            $capturarDetalleCotizacion = $obj->consult($sql);

            //Tinta capturar valor
            $sql="SELECT
            dpti.Dpti_id,
            dpti.Dpti_colorTinta,
            dpti.Dpti_unidadCantidad,
            dpti.Dpti_cantidadTinta,
            dpti.Dpti_costoUnitario,
            dpti.Dpti_subTotal,
            dpti.Dpti_tipoTinta,
            dpti.Dpe_id
            FROM
            tbldetallepedidotinta AS dpti
            WHERE
            dpti.Dpe_id=$Dpe_id 
            ";
            $capturarDetalleTinta = $obj->consult($sql);

            //Material capturar valor
            $sql="SELECT
            dpm.Arti_id,
            dpm.Dpm_cantidad,
            med.Med_descripcion,
            dpm.Dpm_precioUnitario,
            dpm.Dpm_valorTotal
            FROM
            tbldetallepedidomateriaprima AS dpm,
            tblarticulo AS arti,
            tblmedida AS med
            WHERE
            dpm.Arti_id = arti.Arti_id AND
            arti.Med_id = med.Med_id AND
            dpm.Dpe_id=$Dpe_id
            ";
            $capturarDetalleMaterial = $obj->consult($sql);


            //Terminados capturar valor
            $sql="SELECT
            Ter_id,
            Maq_id,
            Dpt_cantidadHorasTerminado,
            Dpt_costoUnitarioTerminado,
            Dpt_subtotalTerminado
            FROM
            tbldetallepedidoterminado
            WHERE
            Dpe_id=$Dpe_id
            ";
            $capturaDetalleTerminado = $obj->consult($sql);

            //Select Producto Base
            $sql = "SELECT * FROM tblproductobase";
            $productoBase = $obj->consult($sql);

            //Maquina
            $sql="SELECT Maq_id, Maq_nombre FROM `tblmaquina` WHERE Est_id = 1";
            $maquina = $obj->consult($sql);

            //Tinta Tipo de articulo = 2 -> Tinta
            // $sql="SELECT Arti_id, Arti_nombre FROM `tblarticulo` WHERE Tart_id = 3";
            // $tinta = $obj->consult($sql);

            //Material Tipo de articulo = 1 -> Material
            $sql="SELECT Arti_id, Arti_nombre FROM `tblarticulo` WHERE Tart_id = 1";
            $material = $obj->consult($sql);

            //Material Tipo de articulo = 1 -> Material
            $sql="SELECT Ter_id, Ter_descripcion FROM `tblterminado`";
            $terminado = $obj->consult($sql);
            
            include_once '../view/costos/cotizacion/consultAprobacionDetalleCotizacion.php';
        }else{
            // No tiene Acceso
            include_once '../view/partials/page404.php';
        }
    }


    public function esDiferenteAprendiz(){
        //La funcion retorna Verdadero o falso segunsus
        $respuesta=false;
        if(isset($_SESSION['rolUser'])){
            if($_SESSION['rolUser'] != 'Aprendiz'){
                $respuesta=true;
            }else{
                $respuesta=false;
            }
        }else{
            $respuesta=false;
        }

        return $respuesta;
    }


}



?>