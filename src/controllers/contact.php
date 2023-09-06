<?php

namespace Application\Controllers\Contact;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact
{
    /**
     * @throws Exception
     */
    public function execute(): void
    {
        if (isset($_POST['name']) && isset($_POST['email'])
            && isset($_POST['subject']) && isset($_POST['message'])) {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'ssl0.ovh.net';
            $mail->Port = 465;
            $mail->SMTPAuth = 1;

            $mail->SMTPSecure = 'ssl';
            $mail->Username   =  'contact@jlucea.com';
            $mail->Password   =  'Nathan2018';

            $mail->CharSet = 'UTF-8';
            $mail->smtpConnect();
            $mail->From       = htmlspecialchars($_POST['email']);
            $mail->FromName   = htmlspecialchars($_POST['name']);
            $mail->AddAddress('contact@jlucea.com');
            $mail->Subject    = htmlspecialchars($_POST['subject']);
            $mail->WordWrap   = 50;
            $mail->AltBody = htmlspecialchars($_POST['message']);
            $mail->IsHTML(false);
            $mail->MsgHTML($_POST['message']);
            if (!$mail->send()) {
                echo $mail->ErrorInfo;
            } else {
                echo "Message bien envoyé";
            }
        }
        require('templates/contact.php');
    }
}
