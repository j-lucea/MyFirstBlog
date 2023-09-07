<?php

namespace Application\Repository\CategoryRepository;

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Category\Category;

require_once 'src/model/category.php';

class CategoryRepository
{
    public DatabaseConnection $connection;

    public function getCategories(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, name FROM p5_category"
        );
        $statement->execute();
        $categories = [];
        while (($row = $statement->fetch())) {
            $category = new Category($row['id'], $row['name']);
            $categories[] = $category;
        }
        return $categories;
    }
    public function getCategory(int $id): Category
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, name FROM p5_category WHERE id = ?"
        );
        $statement->execute([$id]);
        $row = $statement->fetch();
        return new Category($row['id'], $row['name']);
    }
}
