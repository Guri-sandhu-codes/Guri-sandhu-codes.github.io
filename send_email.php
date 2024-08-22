<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $name = isset($_POST['contactName']) ? strip_tags(trim($_POST['contactName'])) : '';
    $email = isset($_POST['contactEmail']) ? trim($_POST['contactEmail']) : '';
    $message = isset($_POST['contactMessage']) ? strip_tags(trim($_POST['contactMessage'])) : '';
    $subject = $_POST['contactSubject']
    
// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require_once './vendor/autoload.php';
// create a new object
$mail = new PHPMailer();
// configure an SMTP
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = 'fa17c29e7bf45a';
$mail->Password = '1668347593e11d';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom($email, $name);
$mail->addAddress('gurisandhucodes@gmail.com', 'Me');
$mail->Subject =  $subject;

$mail->AltBody = $message;

// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


