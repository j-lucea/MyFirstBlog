<?php

namespace Application\Controllers\Contact;

use Application\PHPMailer\PHPMailer\PHPMailer;
use Application\PHPMailer\PHPMailer\Exception;

require 'src/phpmailer/src/Exception.php';
require 'src/phpmailer/src/PHPMailer.php';
require 'src/phpmailer/src/SMTP.php';

class Contact
{
    public function execute()
    {
        if (isset($_POST['name']) && isset($_POST['email'])
            && isset($_POST['phone']) && isset($_POST['message'])) {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'dns106.ovh.net';               //Adresse IP ou DNS du serveur SMTP
            $mail->Port = 465;                          //Port TCP du serveur SMTP
            $mail->SMTPAuth = 1;                        //Utiliser l'identification

            if($mail->SMTPAuth){
                $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
                $mail->Username   =  'contact@jlucea.com';   //Adresse email à utiliser
                $mail->Password   =  'Nathan2018';         //Mot de passe de l'adresse email à utiliser
            }
        }

        require('templates/contact.php');
    }
}
