<?php


namespace Application\Controllers\Post\Admin;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\PostRepository\PostRepository;

class PostAdmin
{
    public function execute(): void
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require 'templates/postAdmin.php';
    }
}
