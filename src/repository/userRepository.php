<?php

namespace Application\Repository\UserRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\User\User;

class UserRepository
{
    public DatabaseConnection $connection;

    public function getUsers(string $user): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, last_name, first_name , login, password, mail, role, avatar, 
            DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
            DATE_FORMAT(updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date 
            FROM p5_user"
        );
        $statement->execute([$user]);

        $users = [];
        while (($row = $statement->fetch())) {
            $user = new User($row['id'], $row['last_name'], $row['first_name'], $row['login'],
                    $row['password'], $row['mail'], $row['role'], $row['avatar'],
                    $row['french_creation_date'], $row['french_update_date']);
            $users[] = $user;
        }
        return $users;
    }

    public function getUser(string $id): ?User
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, last_name, first_name , login, password, mail, role, avatar, 
            DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
            DATE_FORMAT(updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date 
            FROM p5_user WHERE login = ?"
        );
        $statement->execute([$id]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $user = new User($row['id'], $row['last_name'], $row['first_name'], $row['login'],
            $row['password'], $row['mail'], $row['role'], $row['avatar'],
            $row['french_creation_date'], $row['french_update_date']);
        return $user;
    }
}
