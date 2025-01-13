<?php 


if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

// $name = strip_tags(htmlspecialchars($_POST['name']));
// $email = strip_tags(htmlspecialchars($_POST['email']));
// $m_subject = strip_tags(htmlspecialchars($_POST['subject']));
// $message = strip_tags(htmlspecialchars($_POST['message']));

$to = "aya.amin1117@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
// $header = "From: $email";
// $header .= "Reply-To: $email";	

$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";


if(!mail($to, $subject, $body, $header))
  http_response_code(500);

// Inside contact.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ... Your existing code ...

if (mail($to, $subject, $body, $header)) {
    echo "Mail sent successfully.";
} else {
    echo "Mail sending failed.";
}
