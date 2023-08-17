<?php

namespace Application\Model\Post;

class Post
{
    public int $id;
    public string $title;
    public string $chapo;
    public string $content;
    public string $image;
    public string $frenchCreationDate;
    public string $frenchUpdateDate;
    public string $category;
    public string $author;

    /**
     * @param int $id
     * @param string $title
     * @param string $chapo
     * @param string $content
     * @param string $image
     * @param string $frenchCreationDate
     * @param string $frenchUpdateDate
     * @param string $category
     * @param string $author
     */
    public function __construct(int $id, string $title, string $chapo,
                                string $content, string $image,
                                string $frenchCreationDate, string $frenchUpdateDate,
                                string $category, string $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->chapo = $chapo;
        $this->content = $content;
        $this->image = $image;
        $this->frenchCreationDate = $frenchCreationDate;
        $this->frenchUpdateDate = $frenchUpdateDate;
        $this->category = $category;
        $this->author = $author;
    }

    public function getid(): int
    {
        return $this->id;
    }

    public function setid(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function setChapo(string $chapo): void
    {
        $this->chapo = $chapo;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getFrenchCreationDate(): string
    {
        return $this->frenchCreationDate;
    }

    public function setFrenchCreationDate(string $frenchCreationDate): void
    {
        $this->frenchCreationDate = $frenchCreationDate;
    }

    public function getFrenchUpdateDate(): string
    {
        return $this->frenchUpdateDate;
    }

    public function setFrenchUpdateDate(string $frenchUpdateDate): void
    {
        $this->frenchUpdateDate = $frenchUpdateDate;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

}
