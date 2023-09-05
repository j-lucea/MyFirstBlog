<?php


namespace Application\Controllers\Post\List;

require_once('src/lib/database.php');
require_once('src/repository/postRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\PostRepository\PostRepository;

class PostList
{
    public function execute(): void
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/postList.php');
    }
}