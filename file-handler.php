//<?php
// $name = $_POST['name'];
// $visitor_email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];

// $email_from = 'info@sharadahighschool.com';

// $email_subject = 'New Form Submission';

// $email_body = "User Name: $name.\n".
//               "User Email: $visitor_email.\n".
//               "Subject: $subject.\n".
//              "User Message: $message.\n";

// $to = 'amruthnek@gmail.com';

// $headers = "From: $email_from \r\n";

// $headers .= "Reply-To: $visitor_email \r\n";

// mail($to,$email_subject,$email_body,$headers);

// header("Location: contact.html");
//?>


<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $email_from = 'info@sharadahighschool.com'; // Use a valid email address from your domain
    $email_subject = "New Contact Form Submission: $subject";

    $email_body = "User Name: $name\n".
                  "User Email: $visitor_email\n".
                  "Subject: $subject\n".
                  "User Message:\n$message\n";

    $to = 'amruthnek@gmail.com';

    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: contact.html?status=success");
        exit();
    } else {
        echo "Mail failed. Please check your mail server or configuration.";
    }
} else {
    echo "Invalid request method.";
}
?>
