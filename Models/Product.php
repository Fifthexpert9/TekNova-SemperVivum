<?php

namespace Models;

use Constants\App;
use Core\Database;

class Product
{
    const BASE_PATH = 'uploads/products/';

    private $id;
    private $name;
    private $description;
    private $priceInCents;
    private $imagePath;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $id = null,
        $name = null,
        $description = null,
        $priceInCents = null,
        $imagePath = null,
        $createdAt = null,
        $updatedAt = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->priceInCents = $priceInCents;
        $this->imagePath = $imagePath;
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

    public function getPriceInCents()
    {
        return $this->priceInCents;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getPrice()
    {
        return number_format($this->priceInCents / 100, 2);
    }

    public function getImage()
    {
        return App::APP_URL . '/' . self::BASE_PATH . $this->imagePath;
    }

    public function printPrice($suffix = '€')
    {
        return $this->getPrice() . $suffix;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $data['description'] ?? null,
            $data['priceInCents'] ?? null,
            $data['imagePath'] ?? null,
            $data['createdAt'] ?? null,
            $data['updatedAt'] ?? null
        );
    }

    public function __toString()
    {
        $properties = [
            $this->id,
            $this->name,
            $this->description,
            $this->priceInCents,
            $this->imagePath
        ];

        return 'Product(' . implode(', ', $properties) . ')';
    }

    public static function find($productId) {
        // Assuming you have a database connection setup
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$productId]);
        $product = $stmt->fetchObject(self::class);
        return $product;
    }
}
