<?php

namespace Application\Controllers\Post\View;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');
require_once('src/repository/postRepository.php');
require_once('src/repository/commentRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;
use Application\Repository\PostRepository\PostRepository;

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

        require('templates/post.php');
    }
}
