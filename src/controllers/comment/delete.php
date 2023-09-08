<?php

namespace Application\Controllers\Comment\Delete;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class DeleteComment
{
    public function execute(string $id, ?array $input): void
    {
        if (!empty($_SESSION['id']) && $input['id'] > 0) {
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $commentRepository->deleteComment(htmlspecialchars($_GET['id']));
        }
        header('Location: index.php?action=commentAdmin');
    }
}
