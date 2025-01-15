<?php

namespace Models;

use DateTime;
use Enums\UserRole;

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $role;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $id = null,
        $firstName = null,
        $lastName = null,
        $email = null,
        $password = null,
        $role = null,
        $createdAt = null,
        $updatedAt = null
    )
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            $data['first_name'] ?? null,
            $data['last_name'] ?? null,
            $data['email'] ?? null,
            $data['password'] ?? null,
            $data['role'] ?? UserRole::USER,
            $data['created_at'] ?? new DateTime(),
            $data['updated_at'] ?? new DateTime()
        );
    }

    public function __toString()
    {
        $properties = [
            $this->id,
            $this->firstName,
            $this->lastName,
            $this->role,
            $this->createdAt,
            $this->updatedAt
        ];

        return 'User(' . implode(', ', $properties) . ')';
    }
}
