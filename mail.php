<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'happydestination.smile@gmail.com';
    $subject = 'New Contact Form Submission';

    $body = "
    <html>
    <head>
        <style>
            .email-container {
                font-family: Arial, sans-serif;
                background-color: #f7f7f7;
                padding: 20px;
                border: 1px solid #ddd;
                margin: 20px;
            }
            .email-header {
                background-color: #007bff;
                color: #fff;
                padding: 10px;
                text-align: center;
            }
            .email-content {
                background-color: #fff;
                padding: 20px;
                margin: 10px 0;
            }
            .email-footer {
                background-color: #f1f1f1;
                color: #666;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='email-header'>
                <h2>Contact Form Submission</h2>
            </div>
            <div class='email-content'>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </div>
            <div class='email-footer'>
                <p>Happy Destination</p>
            </div>
        </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: <$email>" . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
