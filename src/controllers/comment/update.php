<?php

namespace Application\Controllers\Comment\Update;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $id, ?array $input)
    {
        // It handles the form submission when there is an input.
        if ($input !== null) {
            $author = null;
            $content = null;
            if (!empty($input['author']) && !empty($input['comment'])) {
                $author = $input['author'];
                $content = $input['comment'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($id, $author, $content);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: 
                index.php?action=updateComment&id=' . $id);
            }
        }

        // Otherwise, it displays the form.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($id);
        if ($comment === null) {
            throw new \Exception("Le commentaire $id n'existe pas.");
        }

        require('templates/updateComment.php');
    }
}
