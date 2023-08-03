<?php

namespace Application\Repository\CommentRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\Comment;

class CommentRepository
{
    public DatabaseConnection $connection;

    public function getComments(string $post): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT c.id, c.content, c.status , DATE_FORMAT(c.created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, DATE_FORMAT(c.updated_at, '%d/%m/%Y à %Hh%imin%ss') AS french_update_date, u.first_name , c.post_id FROM p5_comment c JOIN p5_user u ON c.user_id = u.id WHERE post_id = ? ORDER BY c.created_at DESC"
        );
        $statement->execute([$post]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->identifier = $row['id'];
            $comment->content = $row['content'];
            $comment->status = $row['status'];
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->frenchUpdateDate = $row['french_update_date'];
            $comment->author = $row['first_name'];
            $comment->post = $row['post_id'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function getComment(string $identifier): ?Comment
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, content, status, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date, user_id, post_id FROM p5_comment WHERE id = ?"
        );
        $statement->execute([$identifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $comment = new Comment();
        $comment->identifier = $row['id'];
        $comment->content = $row['content'];
        $comment->status = $row['status'];
        $comment->author = $row['first_name'];
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->post = $row['post_id'];

        return $comment;
    }

    public function createComment(string $post, string $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO p5_comment(post_id, user_id, content, created_at) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post, $author, $comment]);

        return ($affectedLines > 0);
    }

    public function updateComment(string $identifier, string $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE p5_comment SET author = ?, comment = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$author, $comment, $identifier]);

        return ($affectedLines > 0);
    }
}
