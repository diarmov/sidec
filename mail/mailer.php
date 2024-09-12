  
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../assets/vendor/autoload.php';

function sendMail($email, $estatus,$folio,$link)
{
    $mail = new PHPMailer(true);
    try {
        //$mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sistemas.sfp.zacatecas@gmail.com';
        $mail->Password   = 'qdddzyzwdlslytbj';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 25;
        //$mail->Host       = 'smtp-mail.outlook.com';
        //$mail->SMTPAuth   = true;
        //$mail->Username   = 'gerardogcordero@outlook.com';
        //$mail->SMTPSecure = 'tls';
        //$mail->Port       = 587;


        $mail->setFrom('sfp@zacatecas.gob.mx', '');
        $mail->addAddress($email, '');

        $mail->isHTML(true);
        $mail->AddEmbeddedImage('../../assets/img/logosfp_pdf.png', 'logo_header');

        switch ($estatus) {
            case 1:
                $mail->Subject = utf8_decode('SIDEC - Denuncia recibida');
                ob_start();
                include 'receivedTemplate.php';
                $body = ob_get_clean();
                break;

            case 2:
                $mail->Subject = utf8_decode('SIDEC - Denuncia clasificada');
                ob_start();
                include 'clasifiedTemplate.php';
                $body = ob_get_clean();
                break;
                
            case 3:
                $mail->Subject = utf8_decode('SIDEC - Nueva Denuncia Recibida');
                ob_start();
                include 'adminTemplate.php';
                $body = ob_get_clean();
                break;

            default:
                # code...
                break;
        }

        $mail->Body    = $body;
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
