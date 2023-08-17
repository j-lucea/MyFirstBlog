<?php


namespace Application\Controllers\Login;

require_once('src/lib/database.php');
require_once('src/model/user.php');
require_once('src/repository/userRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

class Login
{
    public function execute()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
                $connection = new DatabaseConnection();
                $userRepository = new UserRepository();
                $userRepository->connection = $connection;
                $user = $userRepository->getUser(htmlspecialchars($_POST['login']));
                if (
                    $user && $user->password === $_POST['password']
                ) {

                    $loggedUser = $user;
                    $_SESSION['loggedUser'] = $user;
                    header('Location: index.php');
                } else {
                    $errorMessage = sprintf('Les informations envoyées
                    ne permettent pas de vous identifier');
                }
        }
        require('templates/login.php');
    }
}
