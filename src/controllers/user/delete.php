<?php

namespace Application\Controllers\User\Delete;

require_once('src/lib/database.php');
require_once('src/repository/postRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class DeleteUser
{
    public function execute(): void
    {
        if (isset($_SESSION['id']) && $_GET['id'] > 0) {
            $userRepository = new UserRepository();
            $userRepository->connection = new DatabaseConnection();
            $userRepository->deleteUser(htmlspecialchars($_GET['id']));
        }
        header('Location: index.php?action=userAdmin');
    }
}
