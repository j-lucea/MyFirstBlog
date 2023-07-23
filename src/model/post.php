<?php

namespace Application\Model\Post;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Post
{
    public string $identifier;
    public string $title;
    public string $chapo;
    public string $content;
    public string $image;
    public string $frenchCreationDate;
    public string $frenchUpdateDate;
    public string $category;
    public string $author;
}