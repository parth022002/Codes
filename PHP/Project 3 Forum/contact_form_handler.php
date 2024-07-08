<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload.php
require 'PHP/Project 3 Forum/PHPMailer/src/Exception.php';
require 'PHP/Project 3 Forum/PHPMailer/src/PHPMailer.php';
require 'PHP/Project 3 Forum/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth   = true;             // Enable SMTP authentication
        $mail->Username   = 'parthahuja9.pa@gmail.com'; // Your Gmail address
        $mail->Password   = '2002parth';      // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;              // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Sender and recipient
        $mail->setFrom($email, $name);       // Set sender's email and name dynamically from form input
        $mail->addAddress('info@yoursite.com'); // Add recipient's email address

        // Content
        $mail->isHTML(false); // Set email format to HTML
        $mail->Subject = $subject; // Subject of your email
        $mail->Body    = "You have received a new message from $name ($email):\n\n$message"; // Body content of your email

        // Send email
        $mail->send();
        echo "Thank you for contacting us, $name. Your message has been sent."; // Success message
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Error message
    }
}
?>
