<?php

namespace Application\Controllers\Comment\Add;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;
use Exception;

class AddComment
{
    /**
     * @throws Exception
     */
    public function execute(string $post, int $author, string $comment): void
    {
        if (!empty($author) && !empty($comment)) {
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->createComment(htmlspecialchars($post),
                htmlspecialchars($author), htmlspecialchars($comment));
            if (!$success) {
                throw new Exception('Impossible d\'ajouter 
                le commentaire !');
            }
        }
        header('Location: index.php?action=post&id=' . htmlspecialchars($post));
    }
}
