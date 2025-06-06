<?php

require './libs/phpmailer/PHPMailer.php';
require './libs/phpmailer/OAuth.php';
require './libs/phpmailer/Exception.php';
require './libs/phpmailer/POP3.php';
require './libs/phpmailer/SMTP.php';

require_once 'Mensagem.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$mensagem = new Mensagem($_POST['destiny'], $_POST['title'], $_POST['message']);

if(!$mensagem->mensagemValida()){
    header('Location: index.php?erro=valid');
    die();
}

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testerphp474@gmail.com';                     //SMTP username
    $mail->Password   = 'dyfn yoce ddve obhf';                               //SMTP password
    $mail->SMTPSecure = `PHPMailer::ENCRYPTION_SMTPS`;
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('testerphp474@gmail.com', 'Remetente PHP');
    $mail->addAddress($mensagem->getDestiny(), 'Web Destinatario');     //Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->getTitle();
    $mail->Body    = $mensagem->getMessage();
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}