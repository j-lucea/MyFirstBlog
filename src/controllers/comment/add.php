<?php

namespace Application\Controllers\Comment\Add;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class AddComment
{
    public function execute(string $post, int $author, string $comment)
    {
        if (!empty($author) && !empty($comment)) {
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->createComment($post, $author, $comment);
            if (!$success) {
                throw new \Exception('Impossible d\'ajouter 
                le commentaire !');
            }
        }
        header('Location: index.php?action=post&id=' . $post);
    }
}
