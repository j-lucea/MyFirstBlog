<?php

namespace Application\Controllers\Post\Add;

require_once('src/lib/database.php');
require_once('src/repository/postRepository.php');
require_once('src/repository/categoryRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CategoryRepository\CategoryRepository;
use Application\Repository\PostRepository\PostRepository;

class AddPost
{
    public function execute()
    {
        if (isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['content'])
            && isset($_POST['image']) && isset($_POST['category'])
            && isset($_SESSION['id'])) {
            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $posts = $postRepository->createPost($_POST['title'], $_POST['chapo'],
                $_POST['content'], $_POST['image'], $_POST['category'], $_SESSION['id']);
            header('Location: index.php?action=postAdmin');
        } else {
            /*$categoryRepository = new CategoryRepository();
            $categoryRepository->connection = new DatabaseConnection();
            $categories = $categoryRepository->getCategories();*/
            require('templates/addPost.php');
        }

    }
}
