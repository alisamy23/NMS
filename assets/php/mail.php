<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// تضمين الملفات الضرورية لمكتبة PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// فحص إرسال POST فقط
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["con_name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["con_email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["con_subject"]);
    $message = trim($_POST["con_message"]);

    // التحقق من الحقول المطلوبة
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    // إعداد متغيرات خادم البريد الإلكتروني
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'Ali shalaby';
        $mail->Password = 'qwertyuiopasdfghjklzxcvbnm';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // إعداد المرسل والمستلم
        $mail->setFrom($email, $name);
        $mail->addAddress('alisamynada@gmail.com');

        // إعداد محتوى البريد الإلكتروني
        $mail->isHTML(false);
        $mail->Subject = 'Test Email for Template Demo - Mail From ' . $name;
        $mail->Body = "Name: $name\nEmail: $email\nSubject:\n$subject\nMessage:\n$message\n";

        // إرسال البريد الإلكتروني
        $mail->send();
        http_response_code(200);
        echo 'Thank you! Your message has been sent.';
    } catch (Exception $e) {
        http_response_code(500);
        echo 'Oops! Something went wrong and we couldn\'t send your message.';
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>





// header("Access-Control-Allow-Origin: *");
//     // Only process POST reqeusts.
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         // Get the form fields and remove whitespace.
//         $name = strip_tags(trim($_POST["con_name"]));
//                 $name = str_replace(array("\r","\n"),array(" "," "),$name);
//         $email = filter_var(trim($_POST["con_email"]), FILTER_SANITIZE_EMAIL);
//         $subject = trim($_POST["con_subject"]);
//         $message = trim($_POST["con_message"]);
 
//         // Check that data was sent to the mailer.
//         if ( empty($name) OR empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             // Set a 400 (bad request) response code and exit.
//             http_response_code(400);
//             echo "Please complete the form and try again.";
//             exit;
//         }
 
//         // Set the recipient email address.
//         $recipient = "alisamynada@gmail.com";
 
//         // Set the email subject.
//         $subject = "Test Email for Template Demo - Mail From $name";
 
//         // Build the email content.
//         $email_content = "Name: $name\n";
//         $email_content .= "Email: $email\n";
//         $email_content .= "Subject:\n$subject\n";
//         $email_content .= "Message:\n$message\n";
 
//         // Build the email headers.
//         $email_headers = "From: $name <$email>";
 
//         // Send the email.
//         if (mail($recipient, $subject, $email_content, $email_headers)) {
            
//             // Set a 200 (okay) response code.
//             http_response_code(200);
//             echo "Thank You! Your message has been sent.";
//         } else {
//             // Set a 500 (internal server error) response code.
//             http_response_code(500);
//             echo "Oops! Something went wrong and we couldn't send your message.";
//         }
 
//     } else {
//         // Not a POST request, set a 403 (forbidden) response code.
//         http_response_code(403);
//         echo "There was a problem with your submission, please try again.";
//     }
 
?>