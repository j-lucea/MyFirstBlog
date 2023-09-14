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
    public function execute(?array $input): void
    {
        if ($input !== null) {
            if (!empty($input['name']) && !empty($input['email'])
                && !empty($input['subject']) && !empty($input['message'])) {
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
                $mail->From = htmlspecialchars($input['email']);
                $mail->FromName = htmlspecialchars($input['name']);
                $mail->AddAddress('contact@jlucea.com');
                $mail->Subject = htmlspecialchars($input['subject']);
                $mail->WordWrap = 50;
                $mail->AltBody = htmlspecialchars($input['message']);
                $mail->IsHTML(false);
                $mail->MsgHTML($input['message']);

                /*Sending Email*/
                if (!$mail->send()) {
                    echo $mail->ErrorInfo;
                } else {
                    header('Location: index.php');
                }
            } else {
                throw new Exception('Les données du formulaire sont invalides.');
            }
        }
        require 'templates/contact.php';
    }
}
