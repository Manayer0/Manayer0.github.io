<?php

require 'vendor/autoload.php'; // Include the PHPMailer autoloader
require_once('Views/forgetPass.phtml');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established
    $conn = new mysqli("http://sql12.freesqldatabase.com", "sql12667795", "dFq3bx83Nm", "sql12667795");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $newPassword = $_POST["password"];

    // Validate and sanitize inputs

    // Check if the email exists in the database
    $checkEmailSql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailSql);

    if ($result->num_rows > 0) {
        // Update the user's password (in a real scenario, you would hash this password)
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateSql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
        
        if ($conn->query($updateSql) === TRUE) {
            // Send email with a notification about the password change
            sendPasswordChangeEmail($email);

            echo "Password reset successfully!";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Email not found in the database.";
    }

    $conn->close();
}

function sendResetPasswordEmail($email) {
    // Generate a unique link (you may want to add additional security measures)
    $resetLink = 'http://yourwebsite.com/forgetPass.php?email=' . urlencode($email);
function sendPasswordChangeEmail($email) {
    // Instantiate PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    // Your SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alowfi275@gmail.com';
    $mail->Password = '1DP6FJkUM8LtbKvq';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the sender
    $mail->setFrom($email);

    // Set the recipient
    $mail->addAddress('alowfi275@gmail.com');

    // Set email subject and body
    $mail->Subject = 'Password Change Notification';
    $mail->Body    = 'Your password has been successfully changed. If you did not request this change, please contact us immediately.';

    // Send the email
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
}
?>
