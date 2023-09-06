<?php

namespace Application\Controllers\Post\View;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CategoryRepository\CategoryRepository;
use Application\Repository\CommentRepository\CommentRepository;
use Application\Repository\PostRepository\PostRepository;

require_once 'src/lib/database.php';
require_once 'src/repository/postRepository.php';
require_once 'src/repository/commentRepository.php';

class ViewPost
{
    public function execute(string $identifier): void
    {
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost(htmlspecialchars($identifier));

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getActivatedComments(htmlspecialchars($identifier));

        $categoryRepository = new CategoryRepository();
        $categoryRepository->connection = $connection;
        $category = $categoryRepository->getCategoryName(htmlspecialchars($post->category));

        require('templates/post.php');
    }
}
