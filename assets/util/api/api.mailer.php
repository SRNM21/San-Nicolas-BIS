<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;                           //! <- FOR DEBUGGING     
use PHPMailer\PHPMailer\Exception;
 
require './vendor/autoload.php';
 
$mail = new PHPMailer(true);
 
try 
{
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;           //! <- FOR DEBUGGING      
    $mail->isSMTP();                                      
    $mail->Host       = 'smtp.gmail.com';                 
    $mail->SMTPAuth   = true;                               
    $mail->Username   = $env['MAILER_USERNAME'];            
    $mail->Password   = $env['MAILER_PASSWORD'];          
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      
    $mail->Port       = 465;                                  

    //Recipients
    $mail->setFrom($env['MAILER_USERNAME'], 'Barangay San Nicolas');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                         
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $alt_body;

    return $mail->send() ? 1 : 0;
} 
catch (Exception $e) 
{
    return -1;
}
