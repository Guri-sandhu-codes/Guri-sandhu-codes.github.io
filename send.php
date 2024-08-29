<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$errors = [];
$errorMessage = ' ';
$successMessage = ' ';
echo 'sending ...';
$rec = "x@gmail.com";
if (!empty($_POST))
{
  $name = $_POST['contactName'];
  $email = $_POST['contactEmail'];
  $message = $_POST['contactMessage'];

  if (empty($name)) {
      $errors[] = 'Name is empty';
  }

  if (empty($email)) {
      $errors[] = 'Email is empty';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Email is invalid';

  }

  if (empty($message)) {
      $errors[] = 'Message is empty';
  }

  if (!empty($errors)) {
      $allErrors = join ('<br/>', $errors);
      $errorMessage = "<p style='color: red; '>{$allErrors}</p>";
  } else {
      $fromEmail = 'anyname@example.com';
      $emailSubject = 'New email from your contact form';

      // Create a new PHPMailer instance
      $phpmailer = new PHPMailer(exceptions: true);
      try {
        $phpmailer = new PHPMailer();

        $phpmailer->isSMTP();
        
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        
        $phpmailer->SMTPAuth = true;
        
        $phpmailer->Port = 2525;
        
        $phpmailer->Username = 'fa17c29e7bf45a';
        
        $phpmailer->Password = '1668347593e11d';
           
            // Set the sender, recipient, subject, and body of the message 
            $phpmailer->setFrom($email);
            $phpmailer->addAddress($rec);
            $phpmailer->Subject = $emailSubject;
            $phpmailer->isHTML( isHtml: true);
            $phpmailer->Body = "<p>Name: {$name}</p><p>Email: {$email}</p><p>Message: {$message}</p>";
         
            // Send the message
            $phpmailer->send () ;
            $successMessage = "<p style='color: green; '>Thank you for contacting us :)</p>";
      } catch (Exception $e) {
            $errorMessage = "<p style='color: red; '>Oops, something went wrong. Please try again later</p>";
echo $errorMessage;
  }
}
}

?>