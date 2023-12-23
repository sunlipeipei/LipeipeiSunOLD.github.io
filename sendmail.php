<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Validate input data
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        // Handle the error appropriately
        echo "Please complete the form and try again.";
        exit;
    }

    // Recipient email (where you want to receive the messages)
    $to = "sunlipeipei@gmail.com"; 

    // Email subject & body
    $subject = "New message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank You! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, we couldn't send your message.";
    }
}
?>
