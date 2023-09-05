<?php

namespace Application\Controllers\User\Register;

require_once('src/lib/database.php');
require_once('src/repository/userRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class Register
{
    public function execute(): void
    {
        $image = '';
        if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['login'])
            && isset($_POST['password']) && isset($_POST['mail'])) {
            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0)
            {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['avatar']['size'] <= 1000000)
                {
                    // Testons si l'extension est autorisée
                    $fileInfo = pathinfo($_FILES['avatar']['name']);
                    $extension = $fileInfo['extension'];
                    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                    if (in_array($extension, $allowedExtensions))
                    {
                        // On peut valider le fichier et le stocker définitivement
                        $image = 'uploads/' . basename($_FILES['avatar']['name']);
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $image);
                        $successMessage = "L'envoi a bien été effectué !";
                    } else {
                        $errorMessage = "L'envoi a échoué !";
                    }
                }
            }
            $connection = new DatabaseConnection();
            $userRepository = new UserRepository();
            $userRepository->connection = $connection;
            $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user = $userRepository->createUser(htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['login']),
                htmlspecialchars($hash), htmlspecialchars($_POST['mail']), $image);
            if ($user) {
                $successMessage = "Votre compte a bien été créé";
            } else {
                $errorMessage = "Votre création de compte a échoué !";
            }
            /*header('Location: index.php');*/
            require('templates/register.php');
        } else {
            require('templates/register.php');
        }
    }
}
