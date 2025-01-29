<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address
    $to = "adam@sendt-3d.com"; // Replace with your email address

    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($email, $subject, $email_content)) {
        // Email sent successfully
        echo "<p>Thank you for contacting us, $name! We will get back to you soon.</p>";
    } else {
        // Email failed to send
        echo "<p>Oops! Something went wrong. Please try again later.</p>";
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: contact.html");
    exit();
}
?>