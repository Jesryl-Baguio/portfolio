<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])) {
    $name = $_POST['form-name'];
    $email = $_POST['form-email'];
    $subject = $_POST['form-subject'];
    $message = $_POST['form-message'];
    $mail = new PHPMailer(true);

try {
    //Server settings
    
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
    $mail->Username   = 'jesrylbaguio@gmail.com';              //SMTP username
    $mail->Password   = 'uhaxnwqvzkvsphqf';                    //SMTP password
    $mail->SMTPSecure = 'tls';                                 //Enable implicit TLS encryption
    $mail->Port       = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = 

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('jesrylbaguio@gmail.com', 'Jesryl Baguio');     //Add a recipient                     

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;

    $mail->send();
    echo 'Message has been sent';
    //exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>