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
}