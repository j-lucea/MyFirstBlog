<?php

namespace Application\Repository\PostRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\Post;

class PostRepository
{
    public DatabaseConnection $connection;

    public function getPost(string $id): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT p.id, p.title, p.chapo, p.content, p.image, 
        DATE_FORMAT(p.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
        DATE_FORMAT(p.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, 
        p.category_id, u.first_name AS author FROM p5_post p JOIN p5_user u 
        ON p.user_id = u.id WHERE p.id = ?"
        );
        $statement->execute([$id]);
        $row = $statement->fetch();
        $post = new Post($row['id'],$row['title'], $row['chapo'], $row['content'],
                $row['image'], $row['french_creation_date'], $row['french_update_date'],
                $row['category_id'], $row['author']);
        return $post;
    }

    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT p.id, p.title, p.chapo, p.content, p.image, 
        DATE_FORMAT(p.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
        DATE_FORMAT(p.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, 
        p.category_id, u.first_name AS author FROM p5_post p JOIN p5_user u 
        ON p.user_id = u.id ORDER BY p.created_at DESC"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post($row['id'],$row['title'], $row['chapo'], $row['content'],
                $row['image'], $row['french_creation_date'], $row['french_update_date'],
                $row['category_id'], $row['author']);
            $posts[] = $post;
        }
        return $posts;
    }
    public function getHomepagePosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT p.id, p.title, p.chapo, p.content, p.image, 
        DATE_FORMAT(p.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
        DATE_FORMAT(p.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, 
        p.category_id, u.first_name AS author FROM p5_post p JOIN p5_user u 
        ON p.user_id = u.id ORDER BY p.created_at DESC LIMIT 0, 3"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post($row['id'],$row['title'], $row['chapo'], $row['content'],
                $row['image'], $row['french_creation_date'], $row['french_update_date'],
                $row['category_id'], $row['author']);
            $posts[] = $post;
        }
        return $posts;
    }
    public function createPost(string $title, string $chapo, string $content,
                               string $image, int $categoryId, int $userId): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO p5_post(title, chapo, content, image, category_id, 
                    user_id, created_at, updated_at) 
                    VALUES(?, ?, ?, ?, ?, ?, NOW(), NOW())'
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