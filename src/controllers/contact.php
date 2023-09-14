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
        if (!empty(filter_input(INPUT_POST, 'name'))
            && !empty(filter_input(INPUT_POST, 'email'))
            && !empty(filter_input(INPUT_POST, 'subject'))
            && !empty(filter_input(INPUT_POST, 'message'))) {
            /*SMTP server settings*/
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'ssl0.ovh.net';
            $mail->Port = 465;
            $mail->SMTPAuth = 1;
            $mail->SMTPSecure = 'ssl';
            $mail->Username = 'contact@jlucea.com';
            $mail->Password = 'Nathan2018';
            $mail->CharSet = 'UTF-8';

            /*SMTP server connection*/
            $mail->smtpConnect();

            /*Email creation*/
            $mail->From = htmlspecialchars(filter_input(INPUT_POST, 'email'));
            $mail->FromName = htmlspecialchars(filter_input(INPUT_POST, 'name'));
            $mail->AddAddress('contact@jlucea.com');
            $mail->Subject = htmlspecialchars(filter_input(INPUT_POST, 'subject'));
            $mail->WordWrap = 50;
            $mail->AltBody = htmlspecialchars(filter_input(INPUT_POST, 'message'));
            $mail->IsHTML(false);
            $mail->MsgHTML(filter_input(INPUT_POST, 'message'));

            /*Sending Email*/
            if (!$mail->send()) {
                echo $mail->ErrorInfo;
            } else {
                header('Location: index.php');
            }
        } else {
            require 'templates/contact.php';
        }
    }
}
