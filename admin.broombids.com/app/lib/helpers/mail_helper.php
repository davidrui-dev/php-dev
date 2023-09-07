<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!function_exists('send_smtp_email')){
    function send_smtp_email($email, $subject, $message,$contact=false){
        include_once 'NewPhpMailer/Exception.php';
        include_once 'NewPhpMailer/PHPMailer.php';
        include_once 'NewPhpMailer/SMTP.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            //$mail->Host = 'smtp.gmail.com;smtp2.gmail.com';  // Specify main and backup SMTP servers
            $mail->Host = 'mail.legacygiveaway.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'support@legacygiveaway.com';                 // SMTP username
            $mail->Password = 'Chand@1931';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('support@legacygiveaway.com', 'Legacy Giveaway');
            /*$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');*/

            $mail->FromName = "Legacy Giveaway";
            if($contact){
                $mail->addAddress('support@legacygiveaway.com');
            }else{
                $mail->addAddress($email);                
            }

            $mail->IsHTML(true);         // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>