<?php

namespace Application\Repository\UserRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\User\User;

require_once 'src/model/user.php';

class UserRepository
{
    public DatabaseConnection $connection;

    public function getUsers(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, last_name, first_name , login, password, mail, role, avatar, 
            DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
            DATE_FORMAT(updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date 
            FROM p5_user"
        );
        $statement->execute();

        $users = [];
        while (($row = $statement->fetch())) {
            $user = new User(
                $row['id'],
                $row['last_name'],
                $row['first_name'],
                $row['login'],
                $row['password'],
                $row['mail'],
                $row['role'],
                $row['avatar'],
                $row['french_creation_date'],
                $row['french_update_date']
            );
            $users[] = $user;
        }
        return $users;
    }
    public function getUser(string $login): ?User
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, last_name, first_name , login, password, mail, role, avatar, 
            DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
            DATE_FORMAT(updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date 
            FROM p5_user WHERE login = ?"
        );
        $statement->execute([$login]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        return new User(
            $row['id'],
            $row['last_name'],
            $row['first_name'],
            $row['login'],
            $row['password'],
            $row['mail'],
            $row['role'],
            $row['avatar'],
            $row['french_creation_date'],
            $row['french_update_date']
        );
    }
    public function createUser(
        string $last_name,
        string $first_name,
        string $login,
        string $password,
        string $mail,
        string $avatar
    ): bool {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO p5_user(last_name, first_name, login, password, mail, 
                    role, avatar, created_at, updated_at) 
                    VALUES(?, ?, ?, ?, ?, 0, ?, NOW(), NOW())'
        );
        $affectedLines = $statement->execute([$last_name, $first_name, $login, $password,
            $mail, $avatar]);
        return ($affectedLines > 0);
    }
    public function deleteUser(string $id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM p5_user WHERE id = ?'
        );
        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);
    }
}
