<?php

session_start();

require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/postsList.php');
require_once('src/controllers/contact.php');
require_once('src/controllers/login.php');

use Application\Controllers\Comment\Add\AddComment;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Post\Post;
use Application\Controllers\PostsList\PostsList;
use Application\Controllers\Contact\Contact;
use Application\Controllers\Login\Login;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'login') {
            (new Login())->execute();
        } elseif ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'updateComment') {
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
        } elseif ($_GET['action'] === 'postsList') {
            (new PostsList())->execute();
        } elseif ($_GET['action'] === 'contact') {
            (new Contact())->execute();
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        if (isset($_POST['mail']) && isset($_POST['password'])) {
            foreach ($users as $user) {
                if (
                    $user['mail'] === $_POST['mail'] &&
                    $user['password'] === $_POST['password']
                ) {
                    $loggedUser = [
                        'email' => $user['mail'],
                    ];
                } else {
                    $errorMessage = sprintf('Les informations envoyées 
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
