<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email field is set
    if (isset($_POST["email"])) {
        // Get and sanitize email
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please provide a valid email address.";
            exit;
        }

        // Recipient email address
        $recipient = "Info@ojoorproperties.com";

        // Build email headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Build email content
        $email_content = "
        <html>
        <body>
            <h2>New Email Subscription</h2>
            <p><strong>Subscriber Email:</strong> $email</p>
        </body>
        </html>
        ";

        // Send the email
        if (mail($recipient, "New Email Subscription", $email_content, $headers)) {
            echo "<h1 >Thank you! You've been subscribed successfully. </h1>";
        } else {
            echo "Oops! Something went wrong, we couldn't process your subscription.";
        }
    } else {
        echo "Please provide an email address.";
    }
} else {
    echo "Invalid request method.";
}



?>
<h1>

    <a style="color: red;  cursor: pointer; "  onclick="goBack()">GO BACK</a>
</h1>
<script>
        // JavaScript to navigate back
        function goBack() {
            if (document.referrer) {
                // If there's a referring page, go back
                window.history.back();
            } else {
                // If no referring page, redirect to a default page (optional)
                window.location.href = '/';
            }
        }
    </script>
