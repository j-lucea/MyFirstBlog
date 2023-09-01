<?php

namespace Application\Controllers\User\Admin;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/repository/userRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class UserAdmin
{
    public function execute()
    {
        $connection = new DatabaseConnection();
        $userRepository = new UserRepository();
        $userRepository->connection = $connection;
        $users = $userRepository->getUsers();
        require('templates/userAdmin.php');
    }
}
