<?php

namespace Models;

class Category
{
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $id = null,
        $name = null,
        $description = null,
        $createdAt = null,
        $updatedAt = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
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
            $data['name'] ?? null,
            $data['description'] ?? null,
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null
        );
    }

    public function __toString()
    {
        $properties = [
            $this->id,
            $this->name,
            $this->description,
            $this->createdAt,
            $this->updatedAt
        ];

        return 'Category(' . implode(', ', $properties) . ')';
    }
}
