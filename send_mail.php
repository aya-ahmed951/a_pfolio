<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $body = "<html><body>";
    $body .= "<p><strong>Message from: </strong>$name</p>";
    $body .= "<p><strong>Email: </strong>$email</p>";
    $body .= "<p><strong>Message: </strong><br>$message</p>";
    $body .= "</body></html>";

    // Recipient email
    $to = 'aya.amin1117@gmail.com';  // Replace with your recipient email
echo $body;
    // Send the email using PHP's mail() function
    if (mail($to, $subject, $body, $headers)) {
        echo 'Message has been sent';
    } else {
        echo 'Message could not be sent. Please try again.';
    }
}
?>
