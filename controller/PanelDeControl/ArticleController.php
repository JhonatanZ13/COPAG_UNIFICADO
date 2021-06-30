<?php
 
    include_once '../model/Cpanel/ArticleModel.php';

    class ArticleController{
        public function consultArticles(){
            $obj=new ArticleModel();

            $sql="SELECT Arti_id, Arti_nombre, Tart_descripcion, Arti_medida, Med_descripcion, Est_id, Est_nombre FROM tblarticulo natural join tbltipoarticulo natural join tblmedida natural join TblEstado";

            $articulos=$obj->consult($sql);

            include_once '../view/Panel/Article/consultArticles.php';
        }

        public function getInsert(){
            $obj=new ArticleModel();

            $tarti = "SELECT * FROM TblTipoArticulo";
            $tarticulos=$obj->consult($tarti);

            $tmed = "SELECT * FROM TblMedida";
            $tmedidas = $obj->consult($tmed);

            include_once '../view/Panel/Article/insertArticle.php';

        }

        public function postInsert(){
            $obj = new ArticleModel();

            $id=$obj->autoIncrement("tblarticulo","Arti_id");
            $Arti_nombre=$_POST['Arti_nombre'];
            $Tart_id =$_POST['Tart_id'];
            $Arti_medida=$_POST['Arti_medida'];
            $Med_id =$_POST['Med_id'];
            $Arti_imagen =$_FILES['Arti_imagen']['name'];
            $ruta="../web/images/Articulo/".$Arti_imagen;
            move_uploaded_file($_FILES['Arti_imagen']['tmp_name'],$ruta);
            $Arti_descripcion=$_POST['Arti_descripcion'];

            // esta condicion es para que coloque una imagen por defecto en caso de no tenerla en el momento
            if (empty($$Arti_imagen)) {
                $ruta="../web/images/articuloPredeterminado.jpg";
            }

            $sql="INSERT INTO tblarticulo VALUE($id,'".$Arti_nombre."','".$Tart_id."','".$Arti_medida."', '".$Med_id."','".$ruta."','".$Arti_descripcion."',1, 1)";

            $execution=$obj->insert($sql);

            if($execution){
                redirect(getUrl("PanelDeControl","Article","consultArticles"));
            }else {
                echo "Ups ocurrio un error";
            }


        }

        public function getUpdate(){
            $obj=new ArticleModel();

            $Arti_id=$_GET['Arti_id'];

            $sql="SELECT Arti_id, Arti_nombre, Tart_id,Tart_descripcion, Arti_imagen, Arti_descripcion, Arti_medida, Med_descripcion, tblarticulo.Med_id 
                  FROM tblarticulo natural join tbltipoarticulo natural join tblmedida
                  WHERE Arti_id=$Arti_id";

            $articulo=$obj->consult($sql);

            $tarti = "SELECT * FROM TblTipoArticulo";
            $tarticulos=$obj->consult($tarti);

            $tmed = "SELECT * FROM TblMedida";
            $tmedidas = $obj->consult($tmed);

            include_once '../view/Panel/Article/updateArticle.php';
        }

        public function postUpdate(){
            $obj=new ArticleModel();

            $Arti_nombre=$_POST['Arti_nombre'];
            $Tart_id =$_POST['Tart_id'];
            $Arti_medida=$_POST['Arti_medida'];
            $Arti_imagen =$_FILES['Arti_imagen']['name'];
            $ruta="../web/images/Articulo/".$Arti_imagen;
            move_uploaded_file($_FILES['Arti_imagen']['tmp_name'],$ruta);
            $Med_id =$_POST['Med_id'];
            $Arti_descripcion=$_POST['Arti_descripcion'];
            $Arti_id=$_POST['Arti_id'];
            $imagenVieja=$_POST['imagenVieja'];
 
            if($Arti_imagen){
                $sql="UPDATE tblarticulo SET Arti_nombre='$Arti_nombre', Tart_id='$Tart_id', Arti_medida='$Arti_medida',
                  Arti_imagen='$ruta', Med_id='$Med_id', Arti_descripcion='$Arti_descripcion'
                  WHERE Arti_id='$Arti_id'";
                unlink($imagenVieja);
            }else{
                $sql="UPDATE tblarticulo SET Arti_nombre='$Arti_nombre', Tart_id='$Tart_id', Arti_medida='$Arti_medida',
                  Med_id='$Med_id', Arti_descripcion='$Arti_descripcion'
                  WHERE Arti_id='$Arti_id'";
            }

            $execution=$obj->update($sql);

            if($execution){
                redirect(getUrl("PanelDeControl","Article","consultArticles"));
            }else {
                echo "Ups ocurrio un error";
            }      
        }

        public function postDelete(){
            $obj=new ArticleModel();

            $Arti_id=$_POST['Arti_id'];
            $Est_id=$_GET['Est_id'];

            if($Est_id==1){
                $sql="UPDATE tblarticulo SET Est_id=0 WHERE Arti_id='$Arti_id'";
            }else {
                $sql="UPDATE tblarticulo SET Est_id=1 WHERE Arti_id='$Arti_id'";
            }

            $ejecutar=$obj->insert($sql);

            if($ejecutar){
                redirect(getUrl("PanelDeControl","Article","consultArticles"));
            }else {
                echo "Ups ocurrio un error";
            }
        }

        public function viewArticle(){
            $obj=new ArticleModel();

            $Arti_id=$_GET['Arti_id'];

            $sql="SELECT Arti_id, Arti_nombre, Tart_id,Tart_descripcion, Arti_imagen, Arti_descripcion, Arti_medida, Med_descripcion, tblarticulo.Med_id 
                  FROM tblarticulo natural join tbltipoarticulo natural join tblmedida
                  WHERE Arti_id=$Arti_id";

            $articulo=$obj->consult($sql);

            $tarti = "SELECT * FROM TblTipoArticulo";
            $tarticulos=$obj->consult($tarti);

            $tmed = "SELECT * FROM TblMedida";
            $tmedidas = $obj->consult($tmed);
            
            include_once '../view/Panel/Article/viewArticle.php';
        }

    }

?>