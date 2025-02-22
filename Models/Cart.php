<?php

namespace Models;

class Cart
{
    public static function addItem($productId, $quantity)
    {
        $_SESSION['cart'][$productId] = $quantity;
    }

    public static function removeItem($productId)
    {
        unset($_SESSION['cart'][$productId]);
    }

    public static function getItems()
    {
        return $_SESSION['cart'] ?? [];
    }

    public static function clear()
    {
        $_SESSION['cart'] = [];
    }
}