<?php

namespace Application\Model\Comment;

class Comment
{
    public string $identifier;
    public string $content;
    public bool $status;
    public string $frenchCreationDate;
    public string $frenchUpdateDate;
    public string $author;
    public string $post;

    /**
     * @param string $identifier
     * @param string $content
     * @param bool $status
     * @param string $frenchCreationDate
     * @param string $frenchUpdateDate
     * @param string $author
     * @param string $post
     */
/*    public function __construct()
    {
    }
    public function __construct(string $identifier, string $content, bool $status, string $frenchCreationDate, string $frenchUpdateDate, string $author, string $post)
    {
        $this->identifier = $identifier;
        $this->content = $content;
        $this->status = $status;
        $this->frenchCreationDate = $frenchCreationDate;
        $this->frenchUpdateDate = $frenchUpdateDate;
        $this->author = $author;
        $this->post = $post;
    }*/

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getFrenchCreationDate(): string
    {
        return $this->frenchCreationDate;
    }

    /**
     * @param string $frenchCreationDate
     */
    public function setFrenchCreationDate(string $frenchCreationDate): void
    {
        $this->frenchCreationDate = $frenchCreationDate;
    }

    /**
     * @return string
     */
    public function getFrenchUpdateDate(): string
    {
        return $this->frenchUpdateDate;
    }

    /**
     * @param string $frenchUpdateDate
     */
    public function setFrenchUpdateDate(string $frenchUpdateDate): void
    {
        $this->frenchUpdateDate = $frenchUpdateDate;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getPost(): string
    {
        return $this->post;
    }

    /**
     * @param string $post
     */
    public function setPost(string $post): void
    {
        $this->post = $post;
    }
}

