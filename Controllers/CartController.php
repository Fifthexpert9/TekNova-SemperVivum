<?php

namespace Controllers;

use Models\Cart;
use Utils\WebUtils;
use Constants\Routes;

class CartController extends Controller
{
    public static function addItem()
    {
        $productId = intval($_POST['product_id']);
        $quantity = intval($_POST['quantity']);

        Cart::addItem($productId, $quantity);
        WebUtils::redirect(Routes::CART);
    }

    public static function removeItem()
    {
        $productId = intval($_POST['product_id']);

        Cart::removeItem($productId);
        WebUtils::redirect(Routes::CART);
    }

    public static function viewCart()
    {
        $items = Cart::getItems();
        return self::view('cart/cart', ['items' => $items]);
    }
}