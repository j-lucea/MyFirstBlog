<?php

namespace Application\Model\Comment;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Comment
{
    public string $identifier;
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
    public string $post;
}

