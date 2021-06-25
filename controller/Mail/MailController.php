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
            }else {
                
                echo '<script>alert("El token ya no tiene validez");</script>';
            }
        }
    }
}
