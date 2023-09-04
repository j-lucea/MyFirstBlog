<?php

namespace Application\Controllers\Comment\Delete;

require_once('src/lib/database.php');
require_once('src/repository/commentRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class DeleteComment
{
    public function execute(): void
    {
        if (!empty($_SESSION['id']) && $_GET['id'] > 0) {
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $commentRepository->deleteComment(htmlspecialchars($_GET['id']));
        }
        header('Location: index.php?action=commentAdmin');
    }
}
