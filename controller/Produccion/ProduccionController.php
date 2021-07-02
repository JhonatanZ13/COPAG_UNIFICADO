<?php
    include_once '../model/Produccion/ProduccionModel.php';

    class ProduccionController{
        

        //INICIO PRODUCCION

        public function getMain(){

            $obj = new ProduccionModel();
            //Consultar Ordenes de producción 
            $sql = "SELECT orden.Odp_id, orden.Odp_Estado, empresa.Emp_razonSocial, producto.Pba_descripcion, usuario.Usu_primerNombre, usuario.Usu_primerApellido, orden.Odp_fechaCreacion, orden.Odp_fechaEntrega, estado.Est_nombre
            FROM tblordenproduccion orden, tblempresa empresa, tblusuario usuario, tblproductobase producto, tblproductoterminado pterminado, tblestado estado
            WHERE empresa.Emp_id = orden.Emp_id 
            AND orden.Usu_id = usuario.Usu_id
            AND orden.Pte_id = pterminado.Pte_id
            AND pterminado.Pba_id = producto.Pba_id
            AND orden.Odp_Estado = estado.Est_id
            ORDER BY orden.Odp_id DESC";
            $ordenes = $obj->consult($sql);

            //Total creadas
            $sql = "SELECT COUNT(Odp_id) as cantidad FROM tblordenproduccion";
            $cantidadOrdenesCreadas = $obj->consult($sql);

            //Aprovadas
            $sql = "SELECT COUNT(Odp_id) as cantidad FROM tblordenproduccion WHERE Odp_Estado = 2";
            $cantidadOrdenesAprovadas = $obj->consult($sql);

            //Rechazadas
            $sql = "SELECT COUNT(Odp_id) as cantidad FROM tblordenproduccion WHERE Odp_Estado = 3";
            $cantidadOrdenesRechazadas = $obj->consult($sql);

            //Pendientes por aprovar
            $sql = "SELECT COUNT(Odp_id) as cantidad FROM tblordenproduccion WHERE Odp_Estado = 4";
            $cantidadOrdenesPendientes = $obj->consult($sql);

            include_once '../view/Produccion/Inicio/inicioProduccion.php';
        }

        //INICIO VISTA ADMIN

        public function getMainAdmin(){
            $obj = new ProduccionModel();
            //Consultar Ordenes de producción 
            $sql = "SELECT orden.Odp_id, empresa.Emp_razonSocial, producto.Pba_descripcion, usuario.Usu_primerNombre, usuario.Usu_segundoApellido, orden.Odp_fechaCreacion, orden.Odp_fechaEntrega, estado.Est_nombre
            FROM tblordenproduccion orden, tblempresa empresa, tblusuario usuario, tblproductobase producto, tblproductoterminado pterminado, tblestado estado
            WHERE empresa.Emp_id = orden.Emp_id 
            AND orden.Usu_id = usuario.Usu_id
            AND orden.Pte_id = pterminado.Pte_id
            AND pterminado.Pba_id = producto.Pba_id
            AND orden.Odp_Estado = estado.Est_id
            AND (orden.Odp_Estado = 3 || orden.Odp_Estado = 4)
            ORDER BY orden.Odp_id DESC";
            $ordenes = $obj->consult($sql);

            $sql = "SELECT Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido FROM tblusuario WHERE Usu_id = ".$_SESSION['idUser'];
            $nombreusu = $obj->consult($sql);
            $usu_name = "";
            foreach ($nombreusu as $res) {
                $usu_name = $usu_name.$res['Usu_primerNombre']." ";
                $usu_name = $usu_name.$res['Usu_segundoNombre']." ";
                $usu_name = $usu_name.$res['Usu_primerApellido']." ";
                $usu_name = $usu_name.$res['Usu_segundoApellido']." ";
            }
            $sql = "SELECT * FROM tblfirma WHERE usu_id = ".$_SESSION['idUser'];
            $datosfirma = $obj->consult($sql);
            

            include_once '../view/Produccion/Inicio/adminProduccion.php';
        }

        //INSERTAR FIRMA
        public function postInsertFirma(){
            $obj = new ProduccionModel();
            $fir_id = $obj->autoIncrement('tblfirma', 'fir_id');
            $usu_id = $_POST['usu_id'];
            $fir_cargo = $_POST['fir_cargo'];
            $fir_imagen =$_FILES['fir_imagen']['name'];
            $ruta="../web/images/Firma/".$fir_imagen;
            move_uploaded_file($_FILES['fir_imagen']['tmp_name'],$ruta);

            $sql = "DELETE FROM tblfirma WHERE usu_id = $usu_id";
            $borrar = $obj->delete($sql);

            $sql = "INSERT INTO tblfirma VALUES($fir_id, '$fir_cargo', '$ruta', $usu_id)";
            $ejecutar = $obj->insert($sql);
            redirect(getUrl("Produccion", "Produccion", "getMainAdmin"));
        }

        //APROBAR ORDEN DE PRODUCCION
        public function postAprobarOrdenP(){
            $obj = new ProduccionModel();
            $Odp_id = $_POST['Odp_id'];
            $Odp_usuFirma = $_SESSION['idUser'];

            $sql = "UPDATE tblordenproduccion SET Odp_Estado = 2, Odp_usuFirma = $Odp_usuFirma 
            WHERE Odp_id = $Odp_id";
            $ejecutar = $obj->update($sql);
            redirect(getUrl("Produccion", "Produccion", "getMainAdmin"));

        }

        //RECHAZAR ODERN
        public function postRechazarOrdenP(){
            $obj = new ProduccionModel();
            $Odp_id = $_POST['Odp_id'];
            $Odp_motivoR = $_POST['Odp_motivoR'];
            $Odp_usuFirma = $_SESSION['usu_id'];

            $sql = "UPDATE tblordenproduccion SET Odp_Estado = 3, Odp_motivorechazo = '$Odp_motivoR' , Odp_usuFirma = '' 
            WHERE Odp_id = $Odp_id";
            $ejecutar = $obj->update($sql);
            redirect(getUrl("Produccion", "Produccion", "getMainAdmin"));

        }

        public function formInsertOrden(){
            $obj = new ProduccionModel();
             //Nombre usuario que atiende
             $sql = "SELECT Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido FROM tblusuario WHERE Usu_id = ".$_SESSION['idUser'];
             $nombreusu = $obj->consult($sql);
             $usu_name = "";
             foreach ($nombreusu as $res) {
                 $usu_name = $usu_name.$res['Usu_primerNombre']." ";
                 $usu_name = $usu_name.$res['Usu_segundoNombre']." ";
                 $usu_name = $usu_name.$res['Usu_primerApellido']." ";
                 $usu_name = $usu_name.$res['Usu_segundoApellido']." ";
             }
 
            $Odp_id = $obj->autoIncrement('tblordenproduccion', 'Odp_id');
            //Tipo cliente
            $sql = "SELECT * FROM tbltipoempresa WHERE Tempr_id = 3 || Tempr_id = 4 || Tempr_id = 5";
            $tipocliente = $obj->consult($sql);
            //Cliente
            $sql = "SELECT Emp_id, Emp_razonSocial FROM tblempresa";
            $cliente = $obj->consult($sql);

            $sql = "SELECT * FROM tblproductobase";
            $productos = $obj->consult($sql);

            //Tipo diseno
            $sql = "SELECT * FROM tblsubtipogeneral WHERE Tge_id = 3";
            $tipodiseno = $obj->consult($sql);

            //Materia prima
            $sql =  "SELECT Arti_id, Arti_nombre FROM tblarticulo";
            $articulo = $obj->consult($sql);

            //Maquina
            $sql = "SELECT Maq_id, Maq_nombre FROM tblmaquina";
            $maquina = $obj->consult($sql);
            
            //Tipo rip
            $sql = "SELECT * FROM tblsubtipogeneral WHERE Tge_id = 5";
            $tiporip = $obj->consult($sql);

            include_once '../view/Produccion/Insertar/formInsertOrden.php';
        }

/**
 * 
 * 
 * *******funcion para Insertar orden de produccion**********
 * 
 * 
 */

        public function postInsertOrdProduccion(){

            $obj = new ProduccionModel();
            //Id Orden produccion
            $Odp_id = $_POST['Odp_id'];
            //tipo empresa cliente
            $Odp_tipoempresa = $_POST['Odp_tipoempresa'];
            //Empresa
            $Emp_id = $_POST['Emp_id'];

            $Pim_id = $obj->autoIncrement('tblpreimpreion','Pim_id');

            $Pte_id = $obj->autoIncrement('tblproductoterminado', 'Pte_id');
    /* ============ Producto terminado ===============*/

            $Pte_cantidad = isset($_POST['Pte_cantidad']) ? $_POST['Pte_cantidad'] : "";
            $Pte_numeroPaginas =  isset($_POST['Pte_numeroPaginas']) ? $_POST['Pte_numeroPaginas'] : "";
            $Pte_tamañoAbierto = isset($_POST['Pte_tamañoAbierto']) ? $_POST['Pte_tamañoAbierto'] : "";
            $Pte_tamañoCerrado = isset($_POST['Pte_tamañoCerrado']) ? $_POST['Pte_tamañoCerrado'] : "";
            $Pte_diseñador = isset($_POST['Pte_diseñador']) ? $_POST['Pte_diseñador'] : "";
            $Pba_id = isset($_POST['Pba_id']) ? $_POST['Pba_id'] : "";
            $sql = "INSERT INTO tblproductoterminado VALUES($Pte_id, '$Pte_cantidad', '$Pte_numeroPaginas', '$Pte_tamañoAbierto', '$Pte_tamañoCerrado', '$Pte_diseñador', $Pba_id)";
            $insertarPte = $obj->insert($sql);

    /* =============== Pre-Impresion ==================*/

            $Stg_id = isset($_POST['Stg_id']) ? $_POST['Stg_id'] : "";
            $Pim_encargado = isset($_POST['Pim_encargado']) ? $_POST['Pim_encargado'] : "";
            $Pim_observacion = isset($_POST['Pim_observacion']) ? $_POST['Pim_observacion'] : "";
            $sql = "INSERT INTO tblpreimpreion VALUES($Pim_id, $Stg_id, '$Pim_encargado', '$Pim_observacion')";
            $insertPim = $obj->insert($sql);

    /* ================= Sustratos ====================*/

            $Arti_id = isset($_POST['Arti_id']) ? $_POST['Arti_id'] : "";
            $Sus_cantidadSustrato = isset($_POST['Sus_cantidadSustrato']) ? $_POST['Sus_cantidadSustrato'] : "";
            $Sus_tamañoPliego = isset($_POST['Sus_tamañoPliego']) ? $_POST['Sus_tamañoPliego'] : "";
            $Sus_tamañoCorte = isset($_POST['Sus_tamañoCorte']) ? $_POST['Sus_tamañoCorte'] : "";
            $Sus_tirajePedido = isset($_POST['Sus_tirajePedido']) ? $_POST['Sus_tirajePedido'] : "";
            $Sus_porcentajeDesperdicio = isset($_POST['Sus_porcentajeDesperdicio']) ? $_POST['Sus_porcentajeDesperdicio'] : "";
            $Sus_tirajeTotal = isset($_POST['Sus_tirajeTotal']) ? $_POST['Sus_tirajeTotal'] : "";

            for($i = 0; $i < count($Arti_id); $i++){
                $Sus_id = $obj->autoIncrement('tblsustrato', 'Sus_id');
                $sql = "INSERT INTO tblsustrato VALUES($Sus_id, $Pim_id, '$Sus_tamañoPliego[$i]', $Sus_cantidadSustrato[$i], '$Sus_tamañoCorte[$i]', $Sus_tirajePedido[$i], $Sus_porcentajeDesperdicio[$i], $Sus_tirajeTotal[$i], $Arti_id[$i])";
                $insertSus = $obj->insert($sql);
            }


    /* ================= Impresion ====================*/
            $Imp_id = $obj->autoIncrement('tblimpresion', 'Imp_id');
            $Maq_id = isset($_POST['Maq_id']) ? $_POST['Maq_id'] : "NULL";
            if($Maq_id == ""){
                $Maq_id = "NULL";
            }
            $Imp_formatoCorte = isset($_POST['Imp_formatoCorte']) ? $_POST['Imp_formatoCorte'] : "";
            $Imp_encargado = isset($_POST['Imp_encargado']) ? $_POST['Imp_encargado'] : "";
            $Imp_observaciones = isset($_POST['Imp_observaciones']) ? $_POST['Imp_observaciones'] : "";

            $sql = "INSERT INTO tblimpresion VALUES($Imp_id, $Maq_id, '$Imp_formatoCorte', '$Imp_encargado', '$Imp_observaciones')";
            echo $sql;
            $insertImp = $obj->insert($sql);


    /* ================= Pliegos ====================*/
            $Stg_id_pli = isset($_POST['Stg_id_pli']) ? $_POST['Stg_id_pli'] : "";
            $Pli_rip = isset($_POST['Pli_rip']) ?$_POST['Pli_rip'] : "";
            $Pli_tintaespecial = isset($_POST['Pli_tintaespecial']) ? $_POST['Pli_tintaespecial'] : "";
            
            for($i = 0; $i < count($Stg_id_pli); $i++){
                $Pli_id = $obj->autoIncrement('tblpliego', 'Pli_id');
                $sql = "INSERT INTO tblpliego VALUES($Pli_id, $Pli_rip[$i], $Stg_id_pli[$i], '$Pli_tintaespecial[$i]', $Imp_id)";
                $insertPli = $obj->insert($sql);
            }



    /* ================= Orden de produccion ====================*/
            //Falta agregar el usuario

            $Odp_fechaEntrega = isset($_POST['Odp_fechaEntrega']) ? $_POST['Odp_fechaEntrega'] : "";
            $Odp_fechaInicio = isset($_POST['Odp_fechaInicio']) ? $_POST['Odp_fechaInicio'] : "";
            $Odp_fechafin = isset($_POST['Odp_fechafin']) ? $_POST['Odp_fechafin'] : "";
            $sql = "INSERT INTO tblordenproduccion VALUES($Odp_id, NOW(), $Odp_tipoempresa, $Emp_id, ".$_SESSION['idUser'].", $Pte_id, $Pim_id, $Imp_id, '$Odp_fechaEntrega', '$Odp_fechaInicio', '$Odp_fechafin', 4, 'NULL', 0)";
            $insertOdp = $obj->insert($sql);


    /* ================= terminados ====================*/
            if(isset($_POST['tipoterminado'])){
            $tipoterminado = $_POST['tipoterminado'];
            $tter_descripcion1 = "";
            $tter_descripcion2 = "";
            $idnumerado = 0;
            $idestam = 0;
            $idple = 0;
            $idembol = 0;
            $idfaja = 0;
            $iddesba = 0;
            $idperfo = 0;

            for($i = 0; $i < count($tipoterminado); $i++){
                
                $tter_id = $obj->autoIncrement('tbltipoterminado', 'tter_id');

                //Toma los ids de los terminados que tienen descripciones
                if($tipoterminado[$i] == 16){
                    $idnumerado = $tter_id;
                }
                if($tipoterminado[$i] == 17){
                    $idestam = $tter_id;
                }
                if($tipoterminado[$i] == 18){
                    $idple = $tter_id;
                }
                if($tipoterminado[$i] == 19){
                    $idembol = $tter_id;
                }
                if($tipoterminado[$i] == 20){
                    $idfaja = $tter_id;
                }
                if($tipoterminado[$i] == 21){
                    $iddesba = $tter_id;
                }
                if($tipoterminado[$i] == 22){
                    $idperfo = $tter_id;
                }
                $sql = "INSERT INTO tbltipoterminado VALUES($tter_id, $tipoterminado[$i], '$tter_descripcion1',  '$tter_descripcion2', $Odp_id)";
                $inserttter = $obj->insert($sql);
            }

            //Actuaiza los terminados que tienen opciones

            if(isset($_POST['numeradodesde']) && isset($_POST['numeradohasta'])){
                $descripcion1 = $_POST['numeradodesde'];
                $descripcion2 = $_POST['numeradohasta'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1', tter_descripcion2 = '$descripcion2' WHERE tter_id = $idnumerado";
                $ejecutar = $obj->update($sql);
            }
            if(isset($_POST['estamcolor']) && isset($_POST['estamtrafico'])){
                $descripcion1 = $_POST['estamcolor'];
                $descripcion2 = $_POST['estamtrafico'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1', tter_descripcion2 = '$descripcion2' WHERE tter_id = $idestam";
                $ejecutar = $obj->update($sql);
            }
            if(isset($_POST['plenumerocuerpos'])){
                $descripcion1 = $_POST['plenumerocuerpos'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idple";
                $ejecutar = $obj->update($sql);
            }
            if(isset($_POST['embolcantidad'])){
                $descripcion1 = $_POST['embolcantidad'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idembol";
                $ejecutar = $obj->update($sql);
            }
            if(isset($_POST['fajacantidad'])){
                $descripcion1 = $_POST['fajacantidad'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idfaja";
                $ejecutar = $obj->update($sql);
            }
            if(isset($_POST['desbcantidad'])){
                $descripcion1 = $_POST['desbcantidad'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $iddesba";
                $ejecutar = $obj->update($sql);
            }
            if(isset($_POST['perforado'])){
                $descripcion1 = $_POST['perforado'];
                $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idperfo";
                $ejecutar = $obj->update($sql);
            }
        }

            //FIN
            //Redirigue al incio de produccion
            $_SESSION['mensaje'] = "¡Se inserto correctamente una nueva orden de produccion!";
            $_SESSION['tipo'] = "success";
            redirect(getUrl("Produccion","Produccion","getMain"));
        }
                
        /*
            ====================================================================================================
            ================================ CONSULTAR ORDEN DE PRODUCCION =====================================
            ====================================================================================================
            
        */

        public function getConsult(){

            $obj = new ProduccionModel();
            $Odp_id = $_GET['Odp_id'];

    /**   Sentencias para llenar los select   */

            //Tipo cliente
            $sql = "SELECT * FROM tbltipoempresa";
            $tipocliente = $obj->consult($sql);
            //Cliente
            $sql = "SELECT * FROM tbltipoempresa WHERE Tempr_id = 3 || Tempr_id = 4 || Tempr_id = 5";
            $tipocliente = $obj->consult($sql);
            //Cliente
            $sql = "SELECT Emp_id, Emp_razonSocial FROM tblempresa";
            $cliente = $obj->consult($sql);

            $sql = "SELECT * FROM tblproductobase";
            $productos = $obj->consult($sql);

            //Tipo diseno
            $sql = "SELECT * FROM tblsubtipogeneral WHERE Tge_id = 3";
            $tipodiseno = $obj->consult($sql);

            //Materia prima
            $sql =  "SELECT Arti_id, Arti_nombre FROM tblarticulo";
            $articulo = $obj->consult($sql);

            //Maquina
            $sql = "SELECT Maq_id, Maq_nombre FROM tblmaquina";
            $maquina = $obj->consult($sql);
            
            //Tipo rip
            $sql = "SELECT * FROM tblsubtipogeneral WHERE Tge_id = 5";
            $tiporip = $obj->consult($sql);

    /**  Consultas de la orden de producion     */
            $Emp_id = "";
            $Usu_id = "";
            $Pte_id = "";
            $Pim_id = "";
            $Imp_id = "";

            //Consultar datos de la orden
            $sql = "SELECT * FROM tblordenproduccion WHERE Odp_id = $Odp_id";
            $Orden = $obj->consult($sql);
            foreach($Orden as $or){
                $Emp_id = $or['Emp_id'];
                $Usu_id = $or['Usu_id'];
                $Pte_id = $or['Pte_id'];
                $Pim_id = $or['Pim_id'];
                $Imp_id = $or['Imp_id'];
                $Odp_Estado = $or['Odp_Estado'];
                $Odp_motivorechazo = $or['Odp_motivorechazo'];
            }
            $sql = "SELECT Est_nombre FROM tblestado WHERE Est_id = $Odp_Estado";
            $ejecutar = $obj->consult($sql);

            foreach ($ejecutar as $res) {
                $nameestado = $res['Est_nombre'];
            }
            //Nombre usuario que atiende
            $sql = "SELECT Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido FROM tblusuario WHERE Usu_id = $Usu_id";
            $nombreusu = $obj->consult($sql);
            $usu_name = "";
            foreach ($nombreusu as $res) {
                $usu_name = $usu_name.$res['Usu_primerNombre']." ";
                $usu_name = $usu_name.$res['Usu_segundoNombre']." ";
                $usu_name = $usu_name.$res['Usu_primerApellido']." ";
                $usu_name = $usu_name.$res['Usu_segundoApellido']." ";
            }
           
            //Consultar datos del cliente
            $sql = "SELECT * FROM tblempresa WHERE Emp_id = $Emp_id";
            $consultempresa = $obj-> consult($sql);

            //Consultar producto terminado
            $sql = "SELECT * FROM tblproductoterminado WHERE Pte_id = $Pte_id";
            $consultpterminado = $obj-> consult($sql);

            //Consultar pre-impresion
            $sql = "SELECT * FROM tblpreimpreion WHERE Pim_id = $Pim_id";
            $consultpreimpre = $obj-> consult($sql);

            //Consultar sustratos
            $sql = "SELECT * FROM tblsustrato WHERE Pim_id = $Pim_id";
            $consultsustratos = $obj-> consult($sql);

            //Consultar nombre de articulo
            $sql = "SELECT * FROM tblarticulo";
            $articulo = $obj->consult($sql);
            //Consultar impresion
            $sql = "SELECT * FROM tblimpresion WHERE Imp_id = $Imp_id";
            $consultimpresion = $obj-> consult($sql);

            $sql = "SELECT * FROM `tblsubtipogeneral` WHERE Stg_id = 7 || Stg_id = 8";
            $tintas = $obj->consult($sql);

            //Consultar pliegos
            $sql = "SELECT * FROM tblpliego WHERE Imp_id = $Imp_id";
            $consultpliegos = $obj-> consult($sql);

            $sql = "SELECT * FROM tbltipoterminado WHERE Odp_id = $Odp_id";
            $tipoterminado = $obj->consult($sql);
        
                include_once '../view/Produccion/Consultar/formConsultOrden.php';
        }

        /*
            ====================================================================================================
            ================================= EDITAR ORDEN DE PRODUCCION =======================================
            ====================================================================================================
            
        */
        public function formUpdateOrden(){
            if ($_SESSION['rolUser'] != 'Aprendiz') {
            $obj = new ProduccionModel();
            $Odp_id = $_GET['Odp_id'];

    /**   Sentencias para llenar los select   */

            //Tipo cliente
            $sql = "SELECT * FROM tbltipoempresa";
            $tipocliente = $obj->consult($sql);
            //Cliente
            $sql = "SELECT * FROM tbltipoempresa WHERE Tempr_id = 3 || Tempr_id = 4 || Tempr_id = 5";
            $tipocliente = $obj->consult($sql);
            //Cliente
            $sql = "SELECT Emp_id, Emp_razonSocial FROM tblempresa";
            $cliente = $obj->consult($sql);

            $sql = "SELECT * FROM tblproductobase";
            $productos = $obj->consult($sql);

            //Tipo diseno
            $sql = "SELECT * FROM tblsubtipogeneral WHERE Tge_id = 3";
            $tipodiseno = $obj->consult($sql);

            //Materia prima
            $sql =  "SELECT Arti_id, Arti_nombre FROM tblarticulo";
            $articulo = $obj->consult($sql);

            //Maquina
            $sql = "SELECT Maq_id, Maq_nombre FROM tblmaquina";
            $maquina = $obj->consult($sql);
            
            //Tipo rip
            $sql = "SELECT * FROM tblsubtipogeneral WHERE Tge_id = 5";
            $tiporip = $obj->consult($sql);

    /**  Consultas de la orden de producion     */
            $Emp_id = "";
            $Usu_id = "";
            $Pte_id = "";
            $Pim_id = "";
            $Imp_id = "";

            //Consultar datos de la orden
            $sql = "SELECT * FROM tblordenproduccion WHERE Odp_id = $Odp_id";
            $Orden = $obj->consult($sql);
            foreach($Orden as $or){
                $Emp_id = $or['Emp_id'];
                $Usu_id = $or['Usu_id'];
                $Pte_id = $or['Pte_id'];
                $Pim_id = $or['Pim_id'];
                $Imp_id = $or['Imp_id'];
            }

             //Nombre usuario que atiende
             $sql = "SELECT Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido FROM tblusuario WHERE Usu_id = $Usu_id";
             $nombreusu = $obj->consult($sql);
             $usu_name = "";
             foreach ($nombreusu as $res) {
                 $usu_name = $usu_name.$res['Usu_primerNombre']." ";
                 $usu_name = $usu_name.$res['Usu_segundoNombre']." ";
                 $usu_name = $usu_name.$res['Usu_primerApellido']." ";
                 $usu_name = $usu_name.$res['Usu_segundoApellido']." ";
             }
 
            //Consultar datos del cliente
            $sql = "SELECT * FROM tblempresa WHERE Emp_id = $Emp_id";
            $consultempresa = $obj-> consult($sql);

            //Consultar producto terminado
            $sql = "SELECT * FROM tblproductoterminado WHERE Pte_id = $Pte_id";
            $consultpterminado = $obj-> consult($sql);

            //Consultar pre-impresion
            $sql = "SELECT * FROM tblpreimpreion WHERE Pim_id = $Pim_id";
            $consultpreimpre = $obj-> consult($sql);

            //Consultar sustratos
            $sql = "SELECT * FROM tblsustrato WHERE Pim_id = $Pim_id";
            $consultsustratos = $obj-> consult($sql);

            //Consultar nombre de articulo
            $sql = "SELECT * FROM tblarticulo";
            $articulo = $obj->consult($sql);
            //Consultar impresion
            $sql = "SELECT * FROM tblimpresion WHERE Imp_id = $Imp_id";
            $consultimpresion = $obj-> consult($sql);

            $sql = "SELECT * FROM `tblsubtipogeneral` WHERE Stg_id = 7 || Stg_id = 8";
            $tintas = $obj->consult($sql);

            //Consultar pliegos
            $sql = "SELECT * FROM tblpliego WHERE Imp_id = $Imp_id";
            $consultpliegos = $obj-> consult($sql);

            $sql = "SELECT * FROM tbltipoterminado WHERE Odp_id = $Odp_id";
            $tipoterminado = $obj->consult($sql);
            }
            include_once '../view/Produccion/Actualizar/formUpdateOrden.php';
        }
        
//      ACTUALIZAR ORDEN DE PRODUCCION ==============================================================================

        public function postUpdateOrdenProduccion(){

                $obj = new ProduccionModel();
                //Id Orden produccion
                $Odp_id = $_POST['Odp_id'];
                //tipo empresa cliente
                $Odp_tipoempresa = $_POST['Odp_tipoempresa'];
                //Empresa
                $Emp_id = $_POST['Emp_id'];
    
                $Pim_id = $_POST['Pim_id'];

                if(isset($_POST['Imp_id'])){
                $Imp_id = $_POST['Imp_id'];
                }else{
                    $Imp_id = "";
                }
                
                $Pte_id = $_POST['Pte_id'];
        /* ============ Producto terminado ===============*/
    
                $Pte_cantidad = isset($_POST['Pte_cantidad']) ? $_POST['Pte_cantidad'] : "";
                $Pte_numeroPaginas =  isset($_POST['Pte_numeroPaginas']) ? $_POST['Pte_numeroPaginas'] : "";
                $Pte_tamañoAbierto = isset($_POST['Pte_tamañoAbierto']) ? $_POST['Pte_tamañoAbierto'] : "";
                $Pte_tamañoCerrado = isset($_POST['Pte_tamañoCerrado']) ? $_POST['Pte_tamañoCerrado'] : "";
                $Pte_diseñador = isset($_POST['Pte_diseñador']) ? $_POST['Pte_diseñador'] : "";
                $Pba_id = isset($_POST['Pba_id']) ? $_POST['Pba_id'] : "";
                $sql = "UPDATE tblproductoterminado 
                                SET Pte_cantidad = $Pte_cantidad,  Pte_numeroPaginas = $Pte_numeroPaginas, 
                                Pte_tamañoAbierto = '$Pte_tamañoAbierto', Pte_tamañoCerrado = '$Pte_tamañoCerrado', 
                                Pte_diseñador = '$Pte_diseñador', Pba_id = $Pba_id
                                WHERE Pte_id = $Pte_id";
                $insertarPte = $obj->insert($sql);
    
        /* =============== Pre-Impresion ==================*/
    
                $Stg_id = isset($_POST['Stg_id']) ? $_POST['Stg_id'] : "";
                $Pim_encargado = isset($_POST['Pim_encargado']) ? $_POST['Pim_encargado'] : "";
                $Pim_observacion = isset($_POST['Pim_observacion']) ? $_POST['Pim_observacion'] : "";
                $sql = "UPDATE tblpreimpreion SET Stg_id = $Stg_id, Pim_encargado = '$Pim_encargado', Pim_observacion = '$Pim_observacion'
                            WHERE Pim_id = $Pim_id ";
                $insertPim = $obj->insert($sql);
    
        /* ================= Sustratos ====================*/
                $sql = "DELETE FROM tblsustrato WHERE Pim_id = $Pim_id";
                $borrarsustratos = $obj->delete($sql);

                $Arti_id = isset($_POST['Arti_id']) ? $_POST['Arti_id'] : "";
                $Sus_cantidadSustrato = isset($_POST['Sus_cantidadSustrato']) ? $_POST['Sus_cantidadSustrato'] : "";
                $Sus_tamañoPliego = isset($_POST['Sus_tamañoPliego']) ? $_POST['Sus_tamañoPliego'] : "";
                $Sus_tamañoCorte = isset($_POST['Sus_tamañoCorte']) ? $_POST['Sus_tamañoCorte'] : "";
                $Sus_tirajePedido = isset($_POST['Sus_tirajePedido']) ? $_POST['Sus_tirajePedido'] : "";
                $Sus_porcentajeDesperdicio = isset($_POST['Sus_porcentajeDesperdicio']) ? $_POST['Sus_porcentajeDesperdicio'] : "";
                $Sus_tirajeTotal = isset($_POST['Sus_tirajeTotal']) ? $_POST['Sus_tirajeTotal'] : "";

                if($Arti_id>0){
                    for($i = 0; $i < count($Arti_id); $i++){
                        $Sus_id = $obj->autoIncrement('tblsustrato', 'Sus_id');
                        $sql = "INSERT INTO tblsustrato VALUES($Sus_id, $Pim_id, '$Sus_tamañoPliego[$i]', $Sus_cantidadSustrato[$i], '$Sus_tamañoCorte[$i]', $Sus_tirajePedido[$i], $Sus_porcentajeDesperdicio[$i], $Sus_tirajeTotal[$i], $Arti_id[$i])";
                        $insertSus = $obj->insert($sql);
                    
                    }
                }
    
    
        /* ================= Impresion ====================*/


                $Imp_id = $_POST['Imp_id'];
                $Maq_id = isset($_POST['Maq_id']) ? $_POST['Maq_id'] : "";
                $Imp_formatoCorte = isset($_POST['Imp_formatoCorte']) ? $_POST['Imp_formatoCorte'] : "";
                $Imp_encargado = isset($_POST['Imp_encargado']) ? $_POST['Imp_encargado'] : "";
                $Imp_observaciones = isset($_POST['Imp_observaciones']) ? $_POST['Imp_observaciones'] : "";
    
                $sql = "UPDATE tblimpresion SET Maq_id = $Maq_id, Imp_formatoCorte = '$Imp_formatoCorte', 
                            Imp_encargado = '$Imp_encargado', Imp_observaciones = '$Imp_observaciones'
                            WHERE Imp_id = $Imp_id"; 
                
                $insertImp = $obj->insert($sql);
    
    
        /* ================= Pliegos ====================*/
                $sql = "DELETE FROM tblpliego WHERE Imp_id = $Imp_id";
                $borrarpliegos = $obj->delete($sql);

                if(isset($_POST['Stg_id_pli'])){

                $Stg_id_pli = isset($_POST['Stg_id_pli']) ? $_POST['Stg_id_pli'] : "";
                $Pli_rip = isset($_POST['Pli_rip']) ?$_POST['Pli_rip'] : "";
                $Pli_tintaespecial = isset($_POST['Pli_tintaespecial']) ? $_POST['Pli_tintaespecial'] : "";
                if($Stg_id_pli > 0){
                    for($i = 0; $i < count($Stg_id_pli); $i++){
                        $Pli_id = $obj->autoIncrement('tblpliego', 'Pli_id');
                        $sql = "INSERT INTO tblpliego VALUES($Pli_id, $Pli_rip[$i], $Stg_id_pli[$i], '$Pli_tintaespecial[$i]', $Imp_id)";
                        $insertPli = $obj->insert($sql);
                    
                    }
                }
            }
    
    
    
        /* ================= Orden de produccion ====================*/
    
                $Odp_fechaEntrega = isset($_POST['Odp_fechaEntrega']) ? $_POST['Odp_fechaEntrega'] : "";
                $Odp_fechaInicio = isset($_POST['Odp_fechaInicio']) ? $_POST['Odp_fechaInicio'] : "";
                $Odp_fechafin = isset($_POST['Odp_fechafin']) ? $_POST['Odp_fechafin'] : "";
                $sql = "UPDATE tblordenproduccion SET Odp_tipoempresa = $Odp_tipoempresa, Emp_id = $Emp_id, Pte_id = $Pte_id, Pim_id = $Pim_id, Imp_id = $Imp_id, 
                            Odp_fechaEntrega = '$Odp_fechaEntrega', Odp_fechaInicio = '$Odp_fechaInicio', Odp_fechafin = '$Odp_fechafin', Odp_Estado = 4, Odp_motivorechazo = 'NULL', Odp_usuFirma = 0
                            WHERE Odp_id = $Odp_id";
                
                $insertOdp = $obj->insert($sql);
    
    
        /* ================= terminados ====================*/
                $sql = "DELETE FROM tbltipoterminado WHERE Odp_id = $Odp_id";
                $borrarterminados = $obj->delete($sql);

                if(isset($_POST['tipoterminado'])){
                $tipoterminado = $_POST['tipoterminado'];
                $tter_descripcion1 = "";
                $tter_descripcion2 = "";
                $idnumerado = 0;
                $idestam = 0;
                $idple = 0;
                $idembol = 0;
                $idfaja = 0;
                $iddesba = 0;
                $idperfo = 0;
    
                for($i = 0; $i < count($tipoterminado); $i++){
                    
                    $tter_id = $obj->autoIncrement('tbltipoterminado', 'tter_id');
    
                    //Toma los ids de los terminados que tienen descripciones
                    if($tipoterminado[$i] == 16){
                        $idnumerado = $tter_id;
                    }
                    if($tipoterminado[$i] == 17){
                        $idestam = $tter_id;
                    }
                    if($tipoterminado[$i] == 18){
                        $idple = $tter_id;
                    }
                    if($tipoterminado[$i] == 19){
                        $idembol = $tter_id;
                    }
                    if($tipoterminado[$i] == 20){
                        $idfaja = $tter_id;
                    }
                    if($tipoterminado[$i] == 21){
                        $iddesba = $tter_id;
                    }
                    if($tipoterminado[$i] == 22){
                        $idperfo = $tter_id;
                    }
                    $sql = "INSERT INTO tbltipoterminado VALUES($tter_id, $tipoterminado[$i], '$tter_descripcion1',  '$tter_descripcion2', $Odp_id)";
                    $inserttter = $obj->insert($sql);
                }
    
                //Actuaiza los terminados que tienen opciones
    
                if(isset($_POST['numeradodesde']) && isset($_POST['numeradohasta'])){
                    $descripcion1 = $_POST['numeradodesde'];
                    $descripcion2 = $_POST['numeradohasta'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1', tter_descripcion2 = '$descripcion2' WHERE tter_id = $idnumerado";
                    $ejecutar = $obj->update($sql);
                }
                if(isset($_POST['estamcolor']) && isset($_POST['estamtrafico'])){
                    $descripcion1 = $_POST['estamcolor'];
                    $descripcion2 = $_POST['estamtrafico'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1', tter_descripcion2 = '$descripcion2' WHERE tter_id = $idestam";
                    $ejecutar = $obj->update($sql);
                }
                if(isset($_POST['plenumerocuerpos'])){
                    $descripcion1 = $_POST['plenumerocuerpos'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idple";
                    $ejecutar = $obj->update($sql);
                }
                if(isset($_POST['embolcantidad'])){
                    $descripcion1 = $_POST['embolcantidad'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idembol";
                    $ejecutar = $obj->update($sql);
                }
                if(isset($_POST['fajacantidad'])){
                    $descripcion1 = $_POST['fajacantidad'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idfaja";
                    $ejecutar = $obj->update($sql);
                }
                if(isset($_POST['desbcantidad'])){
                    $descripcion1 = $_POST['desbcantidad'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $iddesba";
                    $ejecutar = $obj->update($sql);
                }
                if(isset($_POST['perforado'])){
                    $descripcion1 = $_POST['perforado'];
                    $sql = "UPDATE tbltipoterminado SET tter_descripcion1 = '$descripcion1' WHERE tter_id = $idperfo";
                    $ejecutar = $obj->update($sql);
                }
            }
                
                    $_SESSION['mensaje'] = "Se actualizo correctamente la orden de produccion!";
                    $_SESSION['tipo'] = "success";
                    redirect(getUrl("Produccion","Produccion","getMain"));
                //FIN
                //Redirigue al incio de produccion
        }

        public function selectCliente(){
            $obj = new ProduccionModel();
            $id = $_POST['Emp_id'];
            //Tipo cliente
            $sql = "SELECT * FROM tblempresa WHERE Emp_id = $id";
            $clienteSelect = $obj->consult($sql);

            include_once '../view/Produccion/Insertar/clienteSelect.php';
        }

        //Fin modal

        //Funcion Eliminar

        public function postDelete(){
            
            if ($_SESSION['rolUser'] != 'Aprendiz') {
            
            $Odp_id = $_POST['Odp_id'];
            $obj = new ProduccionModel();
            $sql = "SELECT * FROM tblordenproduccion WHERE Odp_id=$Odp_id";
            $orden = $obj->consult($sql);

            //se eliminan los tipos de terminados relacionados a la orden de produccion elegida
            $sql = "DELETE FROM `tbltipoterminado` WHERE Odp_id=$Odp_id";
            $deletetipoterminado = $obj->consult($sql);

            //consulta para eliminar la Orden de produccion especifica.
            $sql = "DELETE FROM tblordenproduccion WHERE Odp_id=$Odp_id";
            $deletefinal = $obj->consult($sql);

            //aqui se capturan los Id de la orden de produccion especifica
            foreach($orden as $ord){
                $Pte_id = $ord['Pte_id'];
                $Pim_id = $ord['Pim_id'];
                $Imp_id = $ord['Imp_id'];
            }
            // fin de este foreach

            //sentencias para eliminar cada registro y finalmente la orden de produccion registrada
            $sql = "DELETE FROM tblproductoterminado WHERE Pte_id=$Pte_id";
            $deleteproter = $obj->consult($sql);

            $sql = "DELETE FROM tblsustrato WHERE Pim_id=$Pim_id";
            $deletesustrato = $obj->consult($sql);

            $sql = "DELETE FROM tblpliego WHERE Imp_id=$Imp_id";
            $deletepliego = $obj->consult($sql);

            $sql = "DELETE FROM tblpreimpreion WHERE Pim_id=$Pim_id";
            $deletepreimpre = $obj->consult($sql);

            $sql = "DELETE FROM tblimpresion WHERE Imp_id=$Imp_id";
            $tblimpresion = $obj->consult($sql);

            //fin de sentencias para eliminar los datos foraneos de cada orden especifica.


            if ($deletefinal) {
                redirect(getUrl("Produccion","Produccion","getMain"));
            }
        }else{
            echo "<div class='x_panel'>";
            echo "No tienes los permisos necesarios para acceder a esta vista :D <br>";
            echo "<a href='".getUrl("Produccion", "Produccion", "getMain")."'> <button class='btn btn-primary mt-3'> Volver </button> </a>";
            echo "</div>";
        }

        }


        //PDF
        public function getOrdenPdf(){

            $obj = new ProduccionModel();
            $Odp_id = $_GET['Odp_id'];

        /**  Consultas de la orden de producion     */
            $Emp_id = "";
            $Usu_id = "";
            $Pte_id = "";
            $Pim_id = "";
            $Imp_id = "";

            //Consultar datos de la orden
            $sql = "SELECT * FROM tblordenproduccion WHERE Odp_id = $Odp_id";
            $Orden = $obj->consult($sql);
            foreach($Orden as $or){
                $Emp_id = $or['Emp_id'];
                $Usu_id = $or['Usu_id'];
                $Pte_id = $or['Pte_id'];
                $Pim_id = $or['Pim_id'];
                $Imp_id = $or['Imp_id'];
                $Odp_fechaCreacion = $or['Odp_fechaCreacion'];
                $Odp_fechaEntrega = $or['Odp_fechaEntrega'];
                $Odp_fechaInicio = $or['Odp_fechaInicio'];
                $Odp_fechafin = $or['Odp_fechafin'];
                $Odp_tipoempresa = $or['Odp_tipoempresa'];
                $Odp_Estado = $or['Odp_Estado'];
                $Odp_usuFirma = $or['Odp_usuFirma'];
            }
            $fir_cargo = "Subdirector CDTI";
            if($Odp_Estado == 2){
                $sql = "SELECT * FROM tblfirma WHERE usu_id = $Odp_usuFirma";
                $datosfirma = $obj->consult($sql);

                foreach ($datosfirma as $res) {
                    $fir_imagen = $res['fir_imagen'];
                    $fir_cargo = $res['fir_cargo'];
                    $usu_id = $res['usu_id'];
                }
                $imagenfirma = '<img src="'.$fir_imagen.'" style="width: 100px; height: 25px;">';

                $sql = "SELECT Usu_primerNombre, Usu_segundoNombre, Usu_primerApellido, Usu_segundoApellido FROM tblusuario WHERE Usu_id = $usu_id";
                $nombreusu = $obj->consult($sql);
                $usu_name = "";
                foreach ($nombreusu as $res) {
                    $usu_name = $usu_name.$res['Usu_primerNombre']." ";
                    $usu_name = $usu_name.$res['Usu_segundoNombre']." ";
                    $usu_name = $usu_name.$res['Usu_primerApellido']." ";
                    $usu_name = $usu_name.$res['Usu_segundoApellido']." ";
                }
            }

            //Consultar estado
            $sql = "SELECT Est_nombre FROM `tblestado` WHERE Est_id = $Odp_Estado";
            $consultestado = $obj->consult($sql);
            foreach ($consultestado as $res) {
                $Odp_Estado = $res['Est_nombre'];
            }

            //Consultar tipo de empresa
            $sql = "SELECT Tempr_descripcion FROM `tbltipoempresa` WHERE Tempr_id = $Odp_tipoempresa";
            $consulttipoempre = $obj->consult($sql);
            foreach ($consulttipoempre as $res) {
                $Tempr_descripcion = $res['Tempr_descripcion'];
            }

            //Consultar datos del cliente
            $sql = "SELECT * FROM tblempresa WHERE Emp_id = $Emp_id";
            $consultempresa = $obj-> consult($sql);
            foreach ($consultempresa as $res) {
                $Emp_razonSocial = $res['Emp_razonSocial'];
                $Emp_NIT = $res['Emp_NIT'];
                $Emp_direccion = $res['Emp_direccion'];
                $Mun_id = $res['Mun_id'];
                $Emp_segundoNumeroContacto = $res['Emp_segundoNumeroContacto'];
                $Emp_nombreContacto = $res['Emp_nombreContacto'];
                $Emp_apellidoContacto = $res['Emp_apellidoContacto'];
            }

            //COnsultar nombre Ciudad
            $sql = "SELECT Mun_nombre FROM `tblmunicipio` WHERE Mun_id = $Mun_id";
            $consultmun = $obj->consult($sql);

            foreach ($consultmun as $res) {
                $Mun_nombre = $res['Mun_nombre'];
            }

            //Consultar producto terminado
            $sql = "SELECT * FROM tblproductoterminado WHERE Pte_id = $Pte_id";
            $consultpterminado = $obj-> consult($sql);
            foreach ($consultpterminado as $res) {
                $Pte_cantidad = $res['Pte_cantidad'];
                $Pte_numeroPaginas = $res['Pte_numeroPaginas'];
                $Pte_tamañoAbierto = $res['Pte_tamañoAbierto'];
                $Pte_tamañoCerrado = $res['Pte_tamañoCerrado'];
                $Pte_diseñador = $res['Pte_diseñador'];
                $Pba_id = $res['Pba_id'];
            }
            
            //Consultar nombre producto
            $sql = "SELECT Pba_descripcion FROM `tblproductobase` WHERE Pba_id  = $Pba_id";
            $consultpbase = $obj-> consult($sql);
            foreach ($consultpbase as $res) {
                $Pba_descripcion = $res['Pba_descripcion'];
            }

            //Consultar pre-impresion
            $sql = "SELECT * FROM tblpreimpreion WHERE Pim_id = $Pim_id";
            $consultpreimpre = $obj-> consult($sql);
            foreach ($consultpreimpre as $res) {
                $Pim_encargado = $res['Pim_encargado'];
                $Pim_observacion = $res['Pim_observacion'];
                $Tipo_diseño = $res['Stg_id'];
            }
            $sql = "SELECT Stg_nombre FROM tblsubtipogeneral WHERE Stg_id = $Tipo_diseño";
            $tipopliego = $obj->consult($sql);
            foreach ($tipopliego as $res) {
                $ntipopliego = $res['Stg_nombre'];
            }
            //Consultar sustratos
            $sql = "SELECT s.Sus_id, s.Pim_id, s.Sus_tamañoPliego, s.Sus_cantidadSustrato,
                    s.Sus_tamañoCorte, s.Sus_tirajePedido, s.Sus_porcentajeDesperdicio,
                    s.Sus_tirajeTotal, a.Arti_nombre
                    FROM tblarticulo as a, tblsustrato as s
                    WHERE s.Arti_id = a.Arti_id 
                    AND Pim_id = $Pim_id";
            $consultsustratos = $obj-> consult($sql);

            //Consultar impresion
            $sql = "SELECT * FROM tblimpresion WHERE Imp_id = $Imp_id";
            $consultimpresion = $obj-> consult($sql);

            foreach ($consultimpresion as $res) {
                $Maq_id = $res['Maq_id'];
                $Imp_formatoCorte = $res['Imp_formatoCorte'];
                $Imp_encargado = $res['Imp_encargado'];
                $Imp_observaciones = $res['Imp_observaciones'];

            }
            //Consultar nombre de la maquina
            if($Maq_id != 0){
            $sql = "SELECT Maq_nombre FROM tblmaquina WHERE Maq_id = $Maq_id";
            $nombremaq = $obj->consult($sql);
            foreach ($nombremaq as $res) {
                $Maq_nombre = $res['Maq_nombre'];
            }
            }else{
                $Maq_nombre = " ";
            }


            //Consultar pliegos
            $sql = "SELECT * FROM tblpliego WHERE Imp_id = $Imp_id";
            $consultpliegos = $obj-> consult($sql);
            foreach ($consultpliegos as $res) {
               $Pli_rip = $res['Pli_rip'];
               $Stg_id = $res['Stg_id'];
            }

            //Tintas
            $sql = "SELECT * FROM `tblsubtipogeneral`";
            $subtipo = $obj->consult($sql);

            $sql = "SELECT * FROM tbltipoterminado WHERE Odp_id = $Odp_id";
            $tipoterminado = $obj->consult($sql);

            $sql = "SELECT * FROM tblterminado";
            $terminados = $obj->consult($sql);


            //**************** PDF ********************/

            include_once 'vendor/autoload.php';
            include_once '../view/Produccion/OrdenPdf/formOrdenPdf.php';

            $css = file_get_contents('build/css/pdf.css');
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
            $mpdf->SetTitle("OrdenProduccion_".$Odp_id);
            $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($pagina1, \Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->AddPage();
            $mpdf->WriteHTML($pagina2, \Mpdf\HTMLParserMode::HTML_BODY);

            $mpdf->Output("OrdenProduccion_".$Odp_id.".pdf", "I");

        }


    }
?>

