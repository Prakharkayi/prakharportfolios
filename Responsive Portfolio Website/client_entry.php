<?php
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
if(isset($_POST['save'])) {
  // Get the form data
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $subject = $_POST['Subject'];
  $message = $_POST['Message'];

  // Create a PHPMailer instance
  
  require 'C:\xampp\htdocs\PHPMailer-master\src\PHPMailer.php';
  require 'C:\xampp\htdocs\PHPMailer-master\src\SMTP.php';
  require 'C:\xampp\htdocs\PHPMailer-master\src\Exception.php';
  

  $mail = new PHPMailer();

  // SMTP Configuration
  $mail->isSMTP();
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->Host = 'smtp.gmail.com'; // SMTP server address
  $mail->SMTPAuth = true;
  $mail->Username = 'nikhilkayi@gmail.com'; // SMTP username
  $mail->Password = 'nikhilprincee'; // SMTP password
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // Sender and recipient settings
  $mail->setFrom('nikhilkayi@gmail.com', 'Princee katiyar');
  $mail->addAddress('nikhilkayi@gmail.com', 'Princee katiyar');
  $mail->addReplyTo($email, $name);

  // Email content
  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = "<h1>New Contact Form Submission</h1><p>Name: $name</p><p>Email: $email</p><p>Message: $message</p>";

  // Send the email
  if($mail->send()) {
    // Redirect the user to a thank-you page
    echo 'thank you';
  }else {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
  }
}

