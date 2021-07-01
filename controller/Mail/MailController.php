<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once '../model/Mail/MailModel.php';

class MailController
{

    public function getMail()
    {
        include_once '../view/Panel/login/recoverPass.php';
    }

    public function postMail()
    {
        $obj = new MailModel();
 
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $Usu_email = $_POST['Usu_email'];

        $token = str_shuffle("0123456789" . uniqid());

        $sql = "SELECT Usu_id, Usu_email FROM TblUsuario WHERE Usu_email='" . $Usu_email . "'";
        $consultMail = $obj->consult($sql);

        if (mysqli_num_rows($consultMail) > 0) {

            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output

                $mail->CharSet = 'UTF-8';

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'soportecopag@gmail.com';                 // SMTP username
                $mail->Password = 'Soportec0p4g';                           // SMTP password
                $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('soportecopag@gmail.com', 'Soporte COPAG');
                $mail->addAddress($Usu_email);     // Add a recipient
                //$mail->addAddress(".$Usu_email.");                    // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                $mail->addBCC('soportecopag@gmail.com');
                // $mail->addCC('bcc@example.com');

                //Attachments
                $mail->addAttachment('images/logo-pequeño.png');     // Add attachments
                $mail->addAttachment('Taller De Artes Graficas - COPAG');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Restablecimiento De Contraseña';
                $mail->Body    = "Ha solicitado cambiar contraseña, copie este codigo <b>$token</b> e ingreselo en el sistema o dele clic al siguiente enlace <strong>http://127.0.0.1/COPAG/web/ajax.php?modulo=Mail&controlador=Mail&funcion=getToken</strong>, para poder restablecer tu contraseña<br><b>Si no solicito ningun restablecimiento de su contraseña en el sistema COPAG, ignore este mensaje.</b>";
                //$mail->AltBody = '';

                $mail->send();

                $sql = "UPDATE TblUsuario SET Usu_token='$token' WHERE Usu_email='$Usu_email' ";
                $execution = $obj->update($sql);

                if ($execution) {
                    redirect(getUrl("Mail", "Mail", "getToken", false, "ajax"));
                }
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        } else {
            //aviso de mal correo
            echo '<script>alert("el correo que digito no existe");</script>';
            //echo '<script>swal("Good job!", "You clicked the button!", "success");</script>';
            redirect(getUrl("Mail", "Mail", "getMail", false, "ajax"));
        }
    }

    public function getToken()
    {
        include_once '../view/Panel/login/tokenPass.php';
    }

    public function postToken()
    {
        $obj = new MailModel();

        $Usu_token = $_POST['Usu_token'];
        $Usu_numeroDocumento = $_POST['Usu_numeroDocumento'];

        $sql = "SELECT Usu_token FROM TblUsuario WHERE Usu_token='$Usu_token' ";
        $consultToken = $obj->consult($sql);

        if (mysqli_num_rows($consultToken) > 0) {
            $sql = "UPDATE TblUsuario SET Usu_password='$Usu_numeroDocumento', Usu_token='0' WHERE Usu_numeroDocumento='".$Usu_numeroDocumento."' ";

            $execution = $obj->update($sql);

            if ($execution) {
                //aqui hiria una alerta para mostrar que ya se cambio 
                redirect(getUrl("Access", "Access", "login"));
            }
        }
    }
    
    public function postAprobacionCotizacion()
    {
//echo '<script>alert("hola");</script>';
        $obj = new MailModel();
        $Ped_id=$_GET['Ped_id'];
        $sql="SELECT 
        usu.Usu_email,
        ped.Ped_ruta_pdf_cotizacion 
        FROM
        tblusuario AS usu,
        tblpedido AS ped
        WHERE
        ped.destinatario = usu.Usu_id AND
        ped.Ped_id = $Ped_id";


        $consultMail = $obj->consult($sql);

        if (mysqli_num_rows($consultMail) > 0) {
            $email="";
            $ruta="";
            foreach($consultMail AS $usu){

                $email = $usu['Usu_email'];
                $ruta = $usu['Ped_ruta_pdf_cotizacion'];
              

            }

            $asunto = "Aprobacion de cotizacion";
            $enlace="<a href=".getUrl2("costos","cotizacion","consultAprobacionOrden",array('Ped_id'=>$Ped_id),"192.168.1.58").">
                    Click aqui
                    </a>";
            $mensaje ="Se ha solicitado la aprobacion del pedido No.".$Ped_id.". <br>Por favor ingrese al siguiente enlace para acceder de manera rapida, recuerde tener sesion inicada. <br>Enlace: ".$enlace;
            
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output

                $mail->CharSet = 'UTF-8';

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'soportecopag@gmail.com';                 // SMTP username
                $mail->Password = 'Soportec0p4g';                           // SMTP password
                $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('soportecopag@gmail.com', 'Soporte COPAG');
                $mail->addAddress($email);     // Add a recipient
                //$mail->addAddress(".$Usu_email.");                    // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                $mail->addBCC('soportecopag@gmail.com');
                // $mail->addCC('bcc@example.com');

                //Attachments
                $mail->addAttachment($ruta);     // Add attachments
                // $mail->addAttachment('Taller De Artes Graficas - COPAG');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $mensaje;
                //$mail->AltBody = '';

                $mail->send();

                // $sql = "UPDATE TblUsuario SET Usu_token='$token' WHERE Usu_email='$Usu_email' ";
                // $execution = $obj->update($sql);

                // if ($execution) {
                //     // redirect(getUrl("Mail", "Mail", "getToken", false, "ajax"));
                    
                // }
                // redirect(getUrl("costos", "cotizacion", "cosult"));

                if($mail){
                    $_SESSION['success']["correoOk"]="Correo enviado!";     
                    redirect(getUrl("costos","cotizacion","solicitarAprobarCotizacion",array('Ped_id'=>$Ped_id)));

                }
                // redirect(getUrl("costos","cotizacion","solicitarAprobarCotizacion",array('Ped_id'=>$Ped_id)));
            } catch (Exception $e) {
                // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                $_SESSION['error']["correoError"]="Error de envio!";     
                redirect(getUrl("costos","cotizacion","solicitarAprobarCotizacion",array('Ped_id'=>$Ped_id)));
            }
        }else{
             redirect(getUrl("costos","cotizacion","solicitarAprobarCotizacion",array('Ped_id'=>$Ped_id)));
        }    
    }

    public function postAprobacionSolicitud()
    {
        $obj = new MailModel();
        $Ped_id=$_GET['Ped_id'];

        $sql="SELECT 
        usu.Usu_email,
        ped.Ped_ruta_pdf
        FROM
        tblusuario AS usu,
        tblpedido AS ped
        WHERE
        ped.destinatario = usu.Usu_id AND
        ped.Ped_id = $Ped_id";


        $consultMail = $obj->consult($sql);

        if (mysqli_num_rows($consultMail) > 0) {
            $email="";
            $ruta="";
            foreach($consultMail AS $usu){
                $email = $usu['Usu_email'];
                $ruta = $usu['Ped_ruta_pdf'];
                //  echo '<script>alert("'.$email.'");</script>';
                //  echo '<script>alert("'.$ruta.'");</script>';
            }

            $asunto = "Solicitud de cotizacion";
            //Modificar enlace que desea añadir
            $enlace="<a href=".getUrl2("costos","solicitud","aprobarSolicitudConsult",array('Ped_id'=>$Ped_id),"192.168.1.58").">
                    Click aqui
                    </a>";
            $mensaje ="Se ha solicitado la aprobacion del pedido No.".$Ped_id.". <br>Por favor ingrese al siguiente enlace para acceder de manera rapida, recuerde tener sesion inicada. <br>Enlace: ".$enlace;
            
            require 'PHPMailer/src/Exception.php';
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output

                $mail->CharSet = 'UTF-8';

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'soportecopag@gmail.com';                 // SMTP username
                $mail->Password = 'Soportec0p4g';                           // SMTP password
                $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('soportecopag@gmail.com', 'Soporte COPAG');
                $mail->addAddress($email);     // Add a recipient
                //$mail->addAddress(".$Usu_email.");                    // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                $mail->addBCC('soportecopag@gmail.com');
                // $mail->addCC('bcc@example.com');

                //Attachments
                $mail->addAttachment($ruta);     // Add attachments
                // $mail->addAttachment('Taller De Artes Graficas - COPAG');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $mensaje;
                //$mail->AltBody = '';

                $mail->send();

                // $sql = "UPDATE TblUsuario SET Usu_token='$token' WHERE Usu_email='$Usu_email' ";
                // $execution = $obj->update($sql);

                // if ($execution) {
                //     // redirect(getUrl("Mail", "Mail", "getToken", false, "ajax"));
                    
                // }
                // redirect(getUrl("costos", "cotizacion", "cosult"));

                //Modificar a la parte de consultar solicitud
                if($mail){
                    $_SESSION['success']["correoOk"]="Correo enviado!";     
                    redirect(getUrl("costos","solicitud","consult",array('Ped_id'=>$Ped_id)));

                }
            } catch (Exception $e) {
                // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                $_SESSION['error']["correoError"]="Error de envio!";   
                redirect(getUrl("costos","solicitud","consult",array('Ped_id'=>$Ped_id)));
            }
        }else{
            redirect(getUrl("costos","solicitud","consult",array('Ped_id'=>$Ped_id)));
          
        }
         
    }
}
