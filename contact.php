<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate input data
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Set the recipient email address
        $to = 'your-email@example.com'; // Replace with your email address

        // Set the email subject
        $subject = 'New Contact Form Submission';

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers
        $headers = "From: $name <$email>";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            echo 'Your message has been sent successfully.';
        } else {
            echo 'There was an error sending your message. Please try again later.';
        }
    } else {
        echo 'Please fill in all fields.';
    }
} else {
    echo 'Invalid request method.';
}
?>
