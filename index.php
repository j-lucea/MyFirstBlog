<?php

session_start();

/*require __DIR__ . '/vendor/autoload.php';*/

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

/*$action = htmlspecialchars($_GET['action']);*/
if (isset($_GET['action'])) {
    $action = htmlspecialchars($_GET['action']);
} else {
    $action = '';
}

if (!empty($_SESSION) && !empty($_SESSION['id'])) {
    $sessionId = htmlspecialchars($_SESSION['id']);
    $sessionRole = htmlspecialchars($_SESSION['role']);
} else {
    $sessionId = '';
    $sessionRole = '';
}

try {
    if ($action !== '') {
        if ($action === 'login' && empty($sessionId)) {
            (new Login())->execute();
        } elseif ($action === 'logout') {
            session_destroy();
            header('Location: index.php?action=login');
        } elseif ($action === 'register') {
            (new Register())->execute();
        } elseif ($action === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new ViewPost())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($action === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && !empty($sessionId)
                && !empty($_POST['comment'])) {
                $identifier = $_GET['id'];
                $author = $sessionId;
                $comment = $_POST['comment'];
                (new AddComment())->execute($identifier, $author, $comment);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($action === 'updateComment' && !empty($sessionId)) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                // It sets the input only when the HTTP method is POST
                // (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }
                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } elseif ($action === 'deleteComment' && !empty($sessionId) && $sessionRole==1) {
            (new DeleteComment())->execute();
        } elseif ($action === 'activateComment' && !empty($sessionId) && $sessionRole==1) {
            (new ActivateComment())->execute();
        } elseif ($action === 'commentAdmin' && !empty($sessionId) && $sessionRole==1) {
            (new CommentAdmin())->execute();
        } elseif ($action === 'postList') {
            (new PostList())->execute();
        } elseif ($action === 'postAdmin' && !empty($sessionId) && $sessionRole==1) {
            (new PostAdmin())->execute();
        } elseif ($action === 'addPost' && !empty($sessionId)) {
            (new AddPost())->execute();
        } elseif ($action === 'editPost' && !empty($sessionId) && $sessionRole==1) {
            (new EditPost())->execute();
        } elseif ($action === 'deletePost' && !empty($sessionId) && $sessionRole==1) {
            (new DeletePost())->execute();
        } elseif ($action === 'userAdmin' && !empty($sessionId) && $sessionRole==1) {
            (new UserAdmin())->execute();
        } elseif ($action === 'deleteUser' && !empty($sessionId) && $sessionRole==1) {
            (new DeleteUser())->execute();
        } elseif ($action === 'contact') {
            (new Contact())->execute();
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            foreach ($users as $user) {
                if ($user['mail'] === $_POST['mail'] &&
                    $user['password'] === $_POST['password']
                ) {
                    $loggedUser = [
                        'email' => $user['mail'],
                    ];
                } else {
                    $errorMessage = sprintf(
                        'Les informations envoyées 
                    ne permettent pas de vous identifier : (%s/%s)',
                        $_POST['mail'],
                        $_POST['password']
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
