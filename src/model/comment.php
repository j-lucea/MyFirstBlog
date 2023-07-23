<?php

namespace Application\Model\Comment;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Comment
{
    public string $identifier;
    public string $content;
    public bool $status;
    public string $frenchCreationDate;
    public string $frenchUpdateDate;
    public string $author;
    public string $post;
}

