<?php

namespace Application\Controllers\User\Login;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\UserRepository\UserRepository;

require_once 'src/repository/userRepository.php';

class Login
{
    public function execute(): void
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
                $connection = new DatabaseConnection();
                $userRepository = new UserRepository();
                $userRepository->connection = $connection;
                $user = $userRepository->getUser(htmlspecialchars($_POST['login']));
            if ($user) {
                $verify = password_verify($_POST['password'], $user->password);
                if ($verify) {
                    $this->openSession($user);
                    if ($_SESSION['role']==1) {
                        header('Location: index.php?action=postAdmin');
                    } else {
                        header('Location: index.php');
                    }
                } else {
                    $errorMessage = 'Mot de passe incorrect';
                    require 'templates/login.php';
                }
            } else {
                $errorMessage = 'Les informations envoyées
                    ne permettent pas de vous identifier';
                require 'templates/login.php';
            }
        } else {
                require 'templates/login.php';
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
