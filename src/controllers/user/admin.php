<?php

namespace Application\Controllers\User\Admin;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class UserAdmin
{
    public function execute(): void
    {
        $connection = new DatabaseConnection();
        $userRepository = new UserRepository();
        $userRepository->connection = $connection;
        $users = $userRepository->getUsers();
        require('templates/userAdmin.php');
    }
}
