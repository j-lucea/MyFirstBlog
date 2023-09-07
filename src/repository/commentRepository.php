<?php

namespace Application\Repository\CommentRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\Comment;

require_once 'src/model/comment.php';

class CommentRepository
{
    public DatabaseConnection $connection;

    public function getActivatedComments(string $post): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT c.id, c.content, c.status , 
        DATE_FORMAT(c.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
        DATE_FORMAT(c.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, 
        u.first_name AS author, c.post_id FROM p5_comment c JOIN p5_user u 
        ON c.user_id = u.id WHERE c.post_id = ? AND c.status = 1 ORDER BY c.created_at DESC"
        );
        $statement->execute([$post]);
        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment(
                $row['id'],
                $row['content'],
                $row['status'],
                $row['french_creation_date'],
                $row['french_update_date'],
                $row['author'],
                $row['post_id']
            );
            $comments[] = $comment;
        }
        return $comments;
    }

    public function getComments(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT c.id, c.content, c.status, 
        DATE_FORMAT(c.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
        DATE_FORMAT(c.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, 
        u.first_name AS author, c.post_id FROM p5_comment c JOIN p5_user u 
        ON c.user_id = u.id ORDER BY c.created_at DESC"
        );
        $statement->execute();
        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment(
                $row['id'],
                $row['content'],
                $row['status'],
                $row['french_creation_date'],
                $row['french_update_date'],
                $row['author'],
                $row['post_id']
            );
            $comments[] = $comment;
        }
        return $comments;
    }

    public function getComment(int $id): ?Comment
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT c.id, c.content, c.status , 
        DATE_FORMAT(c.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, 
        DATE_FORMAT(c.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, 
        u.first_name AS author, c.post_id FROM p5_comment c JOIN p5_user u 
        ON c.user_id = u.id WHERE c.id = ?"
        );
        $statement->execute([$id]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        return new Comment(
            $row['id'],
            $row['content'],
            $row['status'],
            $row['french_creation_date'],
            $row['french_update_date'],
            $row['author'],
            $row['post_id']
        );
    }

    public function createComment(int $post, int $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO p5_comment(post_id, user_id, content, created_at) 
                    VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post, $author, $comment]);
        return ($affectedLines > 0);
    }
    public function activateComment(string $id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE p5_comment SET status = 1 WHERE id = ?'
        );
        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);
    }
    public function updateComment(int $id, string $author, string $content): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE p5_comment SET user_id = ?, content = ?, updated_at = NOW() WHERE id = ?'
        );
        $affectedLines = $statement->execute([$author, $content, $id]);
        return ($affectedLines > 0);
    }
    public function deleteComment(int $id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM p5_comment WHERE id = ?'
        );
        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);
    }
}
