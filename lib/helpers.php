<?php
    session_start();
    
    function redirect($url){
        echo "<script type='text/javascript'>"
            ."window.location.href='$url'"
            ."</script>";
    }

    function dd($var){
        echo "<pre>";
        die(print_r($var));
        echo "</pre>";
    }

    function getUrl($modulo,$controlador,$funcion,$parametro=false,$pagina=false){
        if ($pagina==false) {
            $pagina="index";
        }

        $url="$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

        if ($parametro!=false) {
            foreach ($parametro as $key => $valor) {
                $url.="&$key=$valor";
            }
        }

        return $url;
    }

    function getUrl2($modulo,$controlador,$funcion,$parametro=false,$pagina=false){
        if ($pagina==false) {
            $pagina="index.php";
        }

        $url="$pagina?modulo=$modulo&controlador=$controlador&funcion=$funcion";

        if ($parametro!=false) {
            foreach ($parametro as $key => $valor) {
                $url.="&$key=$valor";
            }
        }

        return $url;
    }

    function resolve(){
        //modulo:Carpetas que estan dentro del controlador
        //controlador: un archivo controller que esta dentro del modulo
        //funcion: es un metodo o funcion que está dentro del archivo controlador
        @$modulo=ucwords($_GET['modulo']);
        @$controlador=ucwords($_GET['controlador']);
        @$funcion=$_GET['funcion'];

        if (is_dir("../controller/$modulo")) {
            
            if (file_exists("../controller/$modulo/".$controlador."Controller.php")) {
                
                include_once "../controller/$modulo/".$controlador."Controller.php";

                $nombreClase=$controlador."Controller";
                $objeto=new $nombreClase();
 
                if (method_exists($objeto,$funcion)) {
                    $objeto->$funcion();
                }else{
                    include_once '../view/partials/page404.php';
                    // echo "La funcion o metodo especificado no existe";
                }

            }else{
                include_once '../view/partials/page404.php';
                // echo "El controlador especificado no existe";
            }

        }else{
            include_once '../view/partials/page404.php';
            // echo "El modulo especificado no existe";
        }

    }

?>