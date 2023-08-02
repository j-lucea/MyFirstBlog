<?php

namespace Application\Controllers\Homepage;

require_once('src/lib/database.php');
require_once('src/repository/postRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\PostRepository\PostRepository;

class Homepage
{
    public function execute()
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getHomepagePosts();

        require('templates/homepage.php');
    }
}
