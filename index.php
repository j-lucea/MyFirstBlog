<?php

session_start();

require_once 'vendor/autoload.php';

require_once 'src/controllers/comment/add.php';
require_once 'src/controllers/comment/activate.php';
require_once 'src/controllers/comment/update.php';
require_once 'src/controllers/comment/admin.php';
require_once 'src/controllers/comment/delete.php';
require_once 'src/controllers/homepage.php';
require_once 'src/controllers/post/view.php';
require_once 'src/controllers/post/add.php';
require_once 'src/controllers/post/edit.php';
require_once 'src/controllers/post/delete.php';
require_once 'src/controllers/post/list.php';
require_once 'src/controllers/post/admin.php';
require_once 'src/controllers/contact.php';
require_once 'src/controllers/user/login.php';
require_once 'src/controllers/user/register.php';
require_once 'src/controllers/user/admin.php';
require_once 'src/controllers/user/delete.php';

use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Activate\ActivateComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\Comment\Admin\CommentAdmin;
use Application\Controllers\Comment\Delete\DeleteComment;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Post\View\ViewPost;
use Application\Controllers\Post\Add\AddPost;
use Application\Controllers\Post\Edit\EditPost;
use Application\Controllers\Post\Delete\DeletePost;
use Application\Controllers\Post\List\PostList;
use Application\Controllers\Post\Admin\PostAdmin;
use Application\Controllers\Contact\Contact;
use Application\Controllers\User\Login\Login;
use Application\Controllers\User\Register\Register;
use Application\Controllers\User\Admin\UserAdmin;
use Application\Controllers\User\Delete\DeleteUser;

/*$get['action'] = htmlspecialchars($_GET['action']);*/
$get = $_GET ?? '';

$post = $_POST ?? '';

$session = $_SESSION ?? '';

try {
    if ($get) {
        if ($get['action'] === 'login' && empty($session['id'])) {
            (new Login())->execute();
        } elseif ($get['action'] === 'logout') {
            session_destroy();
            header('Location: index.php?action=login');
        } elseif ($get['action'] === 'register') {
            (new Register())->execute();
        } elseif ($get['action'] === 'post') {
            if (isset($get['id']) && $get['id'] > 0) {
                (new ViewPost())->execute(htmlspecialchars($get['id']));
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($get['action'] === 'addComment') {
            if (isset($get['id']) && $get['id'] > 0 && !empty($session['id'])
                && !empty($post['comment'])) {
                (new AddComment())->execute(
                    htmlspecialchars($get['id']),
                    htmlspecialchars($session['id']),
                    htmlspecialchars($post['comment'])
                );
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($get['action'] === 'updateComment' && !empty($session['id'])) {
            if (isset($get['id']) && $get['id'] > 0) {
                $identifier = $get['id'];
                // It sets the input only when the HTTP method is POST
                // (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $post;
                }
                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } elseif ($get['action'] === 'deleteComment' && !empty($session['id']) && $session['role']==1) {
            (new DeleteComment())->execute();
        } elseif ($get['action'] === 'activateComment' && !empty($session['id']) && $session['role']==1) {
            (new ActivateComment())->execute();
        } elseif ($get['action'] === 'commentAdmin' && !empty($session['id']) && $session['role']==1) {
            (new CommentAdmin())->execute();
        } elseif ($get['action'] === 'postList') {
            (new PostList())->execute();
        } elseif ($get['action'] === 'postAdmin' && !empty($session['id']) && $session['role']==1) {
            (new PostAdmin())->execute();
        } elseif ($get['action'] === 'addPost' && !empty($session['id'])) {
            (new AddPost())->execute();
        } elseif ($get['action'] === 'editPost' && !empty($session['id']) && $session['role']==1) {
            (new EditPost())->execute();
        } elseif ($get['action'] === 'deletePost' && !empty($session['id']) && $session['role']==1) {
            (new DeletePost())->execute();
        } elseif ($get['action'] === 'userAdmin' && !empty($session['id']) && $session['role']==1) {
            (new UserAdmin())->execute();
        } elseif ($get['action'] === 'deleteUser' && !empty($session['id']) && $session['role']==1) {
            (new DeleteUser())->execute();
        } elseif ($get['action'] === 'contact') {
            (new Contact())->execute();
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        if (isset($post['mail']) && isset($post['password'])) {
            foreach ($users as $user) {
                if ($user['mail'] === $post['mail'] &&
                    $user['password'] === $post['password']
                ) {
                    $loggedUser = [
                        'email' => $user['mail'],
                    ];
                } else {
                    $errorMessage = sprintf(
                        'Les informations envoyées 
                    ne permettent pas de vous identifier : (%s/%s)',
                        $post['mail'],
                        $post['password']
                    );
                }
            }
        }
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
