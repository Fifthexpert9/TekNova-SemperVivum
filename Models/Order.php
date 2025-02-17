<?php

namespace Models;

class Order
{
    private $id;
    private $userId;
    private $items;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        $id = null,
        $userId = null,
        $items = [],
        $createdAt = null,
        $updatedAt = null
    )
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->items = $items;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function addItem(OrderItem $item)
    {
        $this->items[] = $item;
    }

    public function getTotalInCents()
    {
        return array_reduce(
            $this->items,
            fn($total, $item) => $total + $item->getQuantity() * $item->getPriceAtPurchaseInCents(),
            0
        );
    }

    public function getTotal()
    {
        return number_format($this->getTotalInCents() / 100, 2);
    }

    public function printTotal($suffix = '€')
    {
        return $this->getTotal() . $suffix;
    }
}
