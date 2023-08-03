<?php

namespace Application\Model\User;

class User {
    public int $id;
    public string $lastName;
    public string $firstName;
    public string $login;
    public string $password;
    public string $mail;
    public string $role;
    public string $frenchCreationDate;

    /**
     * @param int $id
     * @param string $lastName
     * @param string $firstName
     * @param string $login
     * @param string $password
     * @param string $mail
     * @param string $role
     * @param string $frenchCreationDate
     */
    public function __construct(int $id, string $lastName, string $firstName, string $login, string $password, string $mail, string $role, string $frenchCreationDate)
    {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->login = $login;
        $this->password = $password;
        $this->mail = $mail;
        $this->role = $role;
        $this->frenchCreationDate = $frenchCreationDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getFrenchCreationDate(): string
    {
        return $this->frenchCreationDate;
    }

    public function setFrenchCreationDate(string $frenchCreationDate): void
    {
        $this->frenchCreationDate = $frenchCreationDate;
    }

}