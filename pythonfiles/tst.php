
<?php
$to_email = "bdftyousra@gmail.com";
$subject = "test php";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: infosup76@gmail.com";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}