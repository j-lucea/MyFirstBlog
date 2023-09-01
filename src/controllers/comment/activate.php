<?php

namespace Application\Controllers\Comment\Activate;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/repository/commentRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class ActivateComment
{
    public function execute()
    {
        if (!empty($_SESSION['id']) && $_GET['id'] > 0) {
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $commentRepository->activateComment(htmlspecialchars($_GET['id']));
        }
        header('Location: index.php?action=commentAdmin');
    }
}