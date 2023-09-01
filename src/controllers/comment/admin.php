<?php

namespace Application\Controllers\Comment\Admin;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/repository/commentRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class CommentAdmin
{
    public function execute()
    {
        $connection = new DatabaseConnection();
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments();
        require('templates/commentAdmin.php');
    }
}
