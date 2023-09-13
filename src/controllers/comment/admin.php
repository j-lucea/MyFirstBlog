<?php

namespace Application\Controllers\Comment\Admin;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

/*require_once 'src/lib/database.php';*/
require_once 'src/repository/commentRepository.php';

class CommentAdmin
{
    public function execute(): void
    {
        $connection = new DatabaseConnection();
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments();
        require 'templates/commentAdmin.php';
    }
}
