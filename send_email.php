<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (
        isset($_POST["name"]) && 
        isset($_POST["email"]) && 
        isset($_POST["subject"]) && 
        isset($_POST["message"])
    ) {
        // Get form data and sanitize inputs
        $name = strip_tags(trim($_POST["name"]));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $subject = strip_tags(trim($_POST["subject"]));
        $message = strip_tags(trim($_POST["message"]));

        // Check if any fields are empty
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            echo "Please fill out all fields.";
            exit;
        }

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please provide a valid email address.";
            exit;
        }

        // Recipient email address
        $recipient = "Info@ojoorproperties.com";

        // Build email headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Build email content
        $email_content = "
        <html>
        <body>
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
        ";

        // Send the email
        if (mail($recipient, "Contact Form: $subject", $email_content, $headers)) {
            echo "Thank you! Your message has been sent.";
        } else {
            echo "Oops! Something went wrong, we couldn't send your message.";
        }
    } else {
        echo "Please fill out all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>