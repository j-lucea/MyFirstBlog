<?php

namespace Application\Controllers\Comment\Update;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Repository\CommentRepository\CommentRepository;
use Exception;

class UpdateComment
{
    /**
     * @throws Exception
     */
    public function execute(string $id, ?array $input): void
    {
        // It handles the form submission when there is an input.
        if ($input !== null) {
            if (!empty($input['content']) && !empty($_SESSION['id'])) {
                $author = $_SESSION['id'];
                $content = $input['content'];
            } else {
                throw new Exception('Les données du formulaire sont invalides.');
            }

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment(htmlspecialchars($id), htmlspecialchars($author), htmlspecialchars($content));
            if (!$success) {
                throw new Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: index.php?action=post&id='.htmlspecialchars($input['postId']));
            }
        } else {

            // Otherwise, it displays the form.
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $comment = $commentRepository->getComment(htmlspecialchars($id));
            if ($comment === null) {
                throw new Exception("Le commentaire $id n'existe pas.");
            }

            require('templates/updateComment.php');
        }
    }
}
