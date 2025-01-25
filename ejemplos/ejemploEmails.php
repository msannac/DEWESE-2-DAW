<?php

//Clave api smtp ffc59d96482bc90da24409f717a7cc45
//Clave secreta smtp 8a41eb093e373aa3c4dab0832ee51f52

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendVerificationEmail($email, $verificationCode) {

    //Creamos un objeto de tipo phpmailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mailjet.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ffc59d96482bc90da24409f717a7cc45';
        $mail->Password = '8a41eb093e373aa3c4dab0832ee51f52';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('pgalvanfp@gmail.com', 'Your Website');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Your verification code is: $verificationCode";


        var_dump($mail);
        $mail->send();
        //return true;
    } catch (Exception $e) {

        //Si ha fallado mostramos el error
        //Cuando el codigo esta verificado que funciona esto no deberia de estar
        //La forma correcta de controlar los errores es mandando los mensajes de 
        //error a un log
        echo " Algo ha fallado";
        var_dump($e);
        //return false;
    }
}
echo  'PRUEBA DE ENVIO DE EMAILS<BR/>';
sendVerificationEmail('vgalflo309@g.educaand.es',23);

?>