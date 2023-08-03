<?php

namespace Application\Model\Comment;

class Comment
{
    public int $identifier;
    public string $content;
    public bool $status;
    public string $frenchCreationDate;
    public string $frenchUpdateDate;
    public string $author;
    public string $post;

    /**
     * @param int $identifier
     * @param string $content
     * @param bool $status
     * @param string $frenchCreationDate
     * @param string $frenchUpdateDate
     * @param string $author
     * @param string $post
     */
/*    public function __construct(int $identifier, string $content, bool $status, string $frenchCreationDate, string $frenchUpdateDate, string $author, string $post)
    {
        $this->identifier = $identifier;
        $this->content = $content;
        $this->status = $status;
        $this->frenchCreationDate = $frenchCreationDate;
        $this->frenchUpdateDate = $frenchUpdateDate;
        $this->author = $author;
        $this->post = $post;
    }*/

    public function getIdentifier(): int
    {
        return $this->identifier;
    }

    public function setIdentifier(int $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
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

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getPost(): string
    {
        return $this->post;
    }

    public function setPost(string $post): void
    {
        $this->post = $post;
    }
}

