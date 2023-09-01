<?php


namespace Application\Controllers\User\Login;

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
                    $this->openSession($user);
                    if ($_SESSION['role']==1) {
                        header('Location: index.php?action=postAdmin');
                    } else {
                        header('Location: index.php');
                    }
                } else {
                    $errorMessage = sprintf('Les informations envoyées
                    ne permettent pas de vous identifier');
                }
        }   else {
                require('templates/login.php');
        }

    }
    private function openSession($user): void
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['firstName'] = $user->firstName;
        $_SESSION['lastName'] = $user->lastName;
        $_SESSION['mail'] = $user->mail;
        $_SESSION['login'] = $user->login;
        $_SESSION['password'] = $user->password;
        $_SESSION['mail'] = $user->mail;
        $_SESSION['role'] = $user->role;
        $_SESSION['avatar'] = $user->avatar;
        $_SESSION['frenchCreationDate'] = $user->frenchCreationDate;
        $_SESSION['frenchUpdateDate'] = $user->frenchUpdateDate;
    }
}
