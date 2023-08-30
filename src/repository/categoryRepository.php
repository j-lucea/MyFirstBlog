<?php

namespace Application\Repository\CategoryRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Category\Category;

class CategoryRepository
{
    public DatabaseConnection $connection;
    public function getCategories(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, name FROM p5_category"
        );
        $categories = [];
        while (($row = $statement->fetch())) {
            $category = new Category($row['id'],$row['name']);
            $categories[] = $category;
        }
        return $categories;
    }
}