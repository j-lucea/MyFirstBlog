<?php

namespace Application\Controllers\User;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/repository/userRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class User
{
    public function execute(string $login)
    {
        $connection = new DatabaseConnection();
        $userRepository = new UserRepository();
        $userRepository->connection = $connection;
        $user = $userRepository->getUser($login);
        if (
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = $user;
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas 
            de vous identifier : (%s/%s)');
        }
        require('templates/login.php');
    }
}
