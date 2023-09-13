<?php

namespace Application\Controllers\Contact;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';

class Contact
{
    /**
     * @throws Exception
     */
    public function execute(): void
    {
        if (isset($_POST['name']) && isset($_POST['email'])
            && isset($_POST['subject']) && isset($_POST['message'])) {
            /*SMTP server settings*/
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'ssl0.ovh.net';
            $mail->Port = 465;
            $mail->SMTPAuth = 1;
            $mail->SMTPSecure = 'ssl';
            $mail->Username   =  'contact@jlucea.com';
            $mail->Password   =  'Nathan2018';
            $mail->CharSet = 'UTF-8';

            /*SMTP server connection*/
            $mail->smtpConnect();

            /*Email creation*/
            $mail->From       = htmlspecialchars($_POST['email']);
            $mail->FromName   = htmlspecialchars($_POST['name']);
            $mail->AddAddress('contact@jlucea.com');
            $mail->Subject    = htmlspecialchars($_POST['subject']);
            $mail->WordWrap   = 50;
            $mail->AltBody = htmlspecialchars($_POST['message']);
            $mail->IsHTML(false);
            $mail->MsgHTML($_POST['message']);

            /*Sending Email*/
            if (!$mail->send()) {
                echo $mail->ErrorInfo;
            } else {
                header('Location: index.php');
            }
        }
        require 'templates/contact.php';
    }
}
