<?php

namespace Application\Repository\UserRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\User\User;

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
            $user = new User($row['id'], $row['last_name'], $row['first_name'], $row['login'],
                    $row['password'], $row['mail'], $row['role'], $row['avatar'],
                    $row['french_creation_date'], $row['french_update_date']);
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
        $user = new User($row['id'], $row['last_name'], $row['first_name'], $row['login'],
            $row['password'], $row['mail'], $row['role'], $row['avatar'],
            $row['french_creation_date'], $row['french_update_date']);
        return $user;
    }
    public function createUser(string $last_name, string $first_name, string $login,
                               string $password, string $mail, bool $role, string $avatar): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO p5_user(last_name, first_name, login, password, mail, 
                    role, created_at) 
                    VALUES(?, ?, ?, ?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$title, $chapo, $content, $image,
            $categoryId, $userId]);
        return ($affectedLines > 0);
    }
    public function editPost(string $id, string $title, string $chapo, string $content,
                             string $image, int $category, int $userId): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE p5_post SET title = ?, chapo = ?, content = ?, 
                   category_id = ?, updated_at = NOW() WHERE id = ?'
        );
        $affectedLines = $statement->execute([$title, $chapo, $content,
            $category, $id]);
        return ($affectedLines > 0);
    }
    public function deletePost(string $id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM p5_post WHERE id = ?'
        );
        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);
    }
}
