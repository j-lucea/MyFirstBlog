<?php

namespace Application\Controllers\Comment\Admin;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class CommentAdmin
{
    public function execute(): void
    {
        $connection = new DatabaseConnection();
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments();
        require('templates/commentAdmin.php');
    }
}
