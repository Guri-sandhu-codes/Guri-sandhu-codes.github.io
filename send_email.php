<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $message = $_POST['contactMessage']) ;
    $subject = $_POST['contactSubject'];
    
use Symfony\Component\Mailer\Mailer; 
use Symfony\Component\Mailer\Transport\Smtp\SmtpTransport; 
use Symfony\Component\Mime\Email;

require_once './vendor/autoload.php';


$transport = (new Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport
('sandbox.smtp.mailtrap.io', 587))
                ->setUsername('fa17c29e7bf45a')
                ->setPassword('1668347593e11d');

$mailer = new Mailer($transport); 

$email = (new Email())
            ->from($email, $name)
            ->to('gurisandhu.codes@gmail.com')
            ->subject($subject)
            ->text($message)
            

$mailer->send($email);
