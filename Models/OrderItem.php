<?php

namespace Models;

class OrderItem
{
    private $id;
    private $orderId;
    private $product;
    private $quantity;
    private $priceAtPurchaseInCents;

    public function __construct($id, $orderId, Product $product, $quantity, $priceAtPurchase)
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->priceAtPurchaseInCents = $priceAtPurchase;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPriceAtPurchaseInCents()
    {
        return $this->priceAtPurchaseInCents;
    }

    public function getTotalPrice()
    {
        return $this->quantity * $this->priceAtPurchaseInCents;
    }

    public function printPriceAtPurchase($suffix = '€')
    {
        return number_format($this->priceAtPurchaseInCents / 100, 2) . $suffix;
    }

    public function printTotalPrice($suffix = '€')
    {
        return number_format($this->getTotalPrice() / 100, 2) . $suffix;
    }
}
