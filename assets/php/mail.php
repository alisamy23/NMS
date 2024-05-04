<?php
use PHPMailer\PHPMailer\PHPMailer;

include 'PHPMAILER/src/PHPMailer.php';
include 'PHPMAILER/src/SMTP.php';

header("Access-Control-Allow-Origin: *");

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["con_name"]));
                $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["con_email"]), FILTER_SANITIZE_EMAIL);
        $subject = trim($_POST["con_subject"]);
        $message = trim($_POST["con_message"]);
 
        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }
 
        // Set the recipient email address.
        // $recipient = "sales@nmscement.com";
         $recipient = "alisamynada@gmail.com";

        // Set the email subject.
        //$subject = "Test Email for Template Demo - Mail From $name";
 
        // Build the email content.
// Build the email content with HTML formatting.
$email_content = "<h2>Name:</h2><p>$name</p>";
$email_content .= "<h2>Email:</h2><p>$email</p>";
$email_content .= "<h2>Subject:</h2><p>$subject</p>";
$email_content .= "<h2>Message:</h2><p>$message</p>";

// Set the message body.




        // Build the email headers.
        $email_headers = "From: $name <$email>";
 

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'alisamynada';
        $mail->Password = 'maknyjxvslrenosr';
        $mail->setFrom(  $email_headers, $email_headers);
        $mail->addAddress($recipient,  "NMS");
        $mail->Subject = $subject;
        $mail->msgHTML($message);
        $mail->AltBody = 'HTML messaging not supported';
        $mail->isHTML(true);

        $mail->Body = $email_content;
        // if($mail->send()){
        //     echo 'done';
        // }else{
        //     echo 'not done';
        // }

        if ($mail->send()) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
 
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
 
?>