<?php

namespace Application\Controllers\Post\Delete;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\PostRepository\PostRepository;

class DeletePost
{
    public function execute(): void
    {
        if (isset($_SESSION['id']) && $_GET['id'] > 0) {
            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $postRepository->deletePost(htmlspecialchars($_GET['id']));
        }
        header('Location: index.php?action=postAdmin');
    }
}
