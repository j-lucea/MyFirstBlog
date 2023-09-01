<?php

namespace Application\Controllers\User\Register;

require_once('src/lib/database.php');
require_once('src/repository/userRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class Register
{
    public function execute()
    {
        if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['login'])
            && isset($_POST['password']) && isset($_POST['mail'])) {
            $connection = new DatabaseConnection();
            $userRepository = new UserRepository();
            $userRepository->connection = $connection;
            $user = $userRepository->createUser(htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['login']),
                htmlspecialchars($_POST['password']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['avatar']));
            header('Location: index.php');
        } else {
            require('templates/register.php');
        }
    }
}
