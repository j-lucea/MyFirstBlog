<?php

namespace Application\Controllers\User\Register;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class Register
{
    public function execute(): void
    {
        $image = 'uploads/default_image.jpg';
        if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['login'])
            && isset($_POST['password']) && isset($_POST['mail'])) {
            // Test if the file has been sent correctly and if there are no errors
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                // Test if the file is not too big
                if ($_FILES['avatar']['size'] <= 1000000) {
                    // Test if the extension is authorized
                    $fileInfo = pathinfo($_FILES['avatar']['name']);
                    $extension = $fileInfo['extension'];
                    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                    if (in_array($extension, $allowedExtensions)) {
                        // We can now accept the file
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

            $user = $userRepository->createUser(
                htmlspecialchars($_POST['lastName']),
                htmlspecialchars($_POST['firstName']),
                htmlspecialchars($_POST['login']),
                htmlspecialchars($hash),
                htmlspecialchars($_POST['mail']),
                $image
            );
            if ($user) {
                $successMessage = "Votre compte a bien été créé";
            } else {
                $errorMessage = "Votre création de compte a échoué ! Veuillez recommencer.";
            }
        }
        require 'templates/register.php';
    }
}
