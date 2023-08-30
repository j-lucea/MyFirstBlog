<?php

namespace Application\Controllers\Post\Edit;

require_once('src/lib/database.php');
require_once('src/repository/postRepository.php');
require_once('src/repository/categoryRepository.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\PostRepository\PostRepository;
use Application\Repository\CategoryRepository\CategoryRepository;

class EditPost
{
    public function execute()
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        if (isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['content'])
            && isset($_POST['image']) && isset($_POST['category'])
            && isset($_SESSION['id'])) {
            $posts = $postRepository->editPost($_GET['id'], $_POST['title'],
                $_POST['chapo'], $_POST['content'], $_POST['image'],
                $_POST['category'], $_SESSION['id']);
            header('Location: index.php?action=postAdmin');
        } else {
            /*$categoryRepository = new CategoryRepository();
            $categoryRepository->connection = new DatabaseConnection();
            $categories = $categoryRepository->getCategories();*/
            $post = $postRepository->getPost($_GET['id']);
            require('templates/editPost.php');
        }


        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($_GET['id']);

        /*$categoryRepository = new CategoryRepository();
        $categoryRepository->connection = new DatabaseConnection();
        $categories = $categoryRepository->getCategories();*/

        require('templates/editPost.php');
    }
}
