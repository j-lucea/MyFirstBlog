<?php


namespace Application\Controllers\Post\Admin;

require_once('src/lib/database.php');
require_once('src/repository/postRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\PostRepository\PostRepository;

class PostAdmin
{
    public function execute(): void
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/postAdmin.php');
    }
}
