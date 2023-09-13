<?php

namespace Application\Controllers\Comment\Activate;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;

class ActivateComment
{
    public function execute(): void
    {
        if (!empty($_SESSION['id']) && !empty(filter_input(INPUT_GET, 'id'))
            && filter_input(INPUT_GET, 'id') > 0) {
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $commentRepository->activateComment(htmlspecialchars(filter_input(INPUT_GET, 'id')));
        }
        header('Location: index.php?action=commentAdmin');
    }
}
