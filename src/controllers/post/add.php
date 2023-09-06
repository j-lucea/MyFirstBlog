<?php

namespace Application\Controllers\Post\Add;

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CategoryRepository\CategoryRepository;
use Application\Repository\PostRepository\PostRepository;

class AddPost
{
    public function execute(): void
    {
        if (isset($_POST['title']) && isset($_POST['chapo']) && isset($_POST['content'])
            && isset($_POST['image']) && isset($_POST['category'])
            && isset($_SESSION['id'])) {
            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $postRepository->createPost(
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['chapo']),
                htmlspecialchars($_POST['content']),
                htmlspecialchars($_POST['image']),
                htmlspecialchars($_POST['category']),
                htmlspecialchars($_SESSION['id'])
            );
            header('Location: index.php?action=postAdmin');
        } else {
            $categoryRepository = new CategoryRepository();
            $categoryRepository->connection = new DatabaseConnection();
            $categories = $categoryRepository->getCategories();

            require('templates/addPost.php');
        }
    }
}
