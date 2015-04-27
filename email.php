<?php

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once "vendor/autoload.php";


$oMail = new PHPMailer();



//From email address and name
$oMail->From = "email@gmail.com";
$oMail->FromName = "Hello world";

//Enable SMTP debugging.
$oMail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$oMail->isSMTP();
//Set SMTP host name
$oMail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$oMail->SMTPAuth = true;
//Provide username and password
$oMail->Username = "email@gmail.com";
$oMail->Password = "password";
//If SMTP requires TLS encryption then set it
$oMail->SMTPSecure = "tls";
//Set TCP port to connect to
$oMail->Port = 587;


//To address and name
$oMail->addAddress("email@gmail.com", "Recepient Name");

//Address to which recipient will reply
$oMail->addReplyTo("email@gmail.com", "Reply");

//CC and BCC
$oMail->addCC("cc@example.com");
$oMail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$oMail->isHTML(true);

$oMail->Subject = "Subject Text";
$oMail->Body = "<i>Mail body in HTML</i>";
$oMail->AltBody = "This is the plain text version of the email content";

if(!$oMail->send())
{
    echo "Mailer Error: " . $oMail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}
