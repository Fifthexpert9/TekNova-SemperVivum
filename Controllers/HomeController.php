<?php

namespace Controllers;

/**
 * Handles requests for the home (landing) page
 * @package Controllers
 */
class HomeController extends Controller
{
    public static function indexView()
    {
        // TODO: Modify this to get products from the database
        // $products = ProductController::getProducts();
        $products = [];
        return self::view('landing.view', ['products' => $products]);
    }
}