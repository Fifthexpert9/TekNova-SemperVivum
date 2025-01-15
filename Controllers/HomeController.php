<?php

namespace Controllers;

class HomeController extends Controller
{
    public static function indexView()
    {
        // TODO: Cambiar cuando se cree (DDL) la base de datos
        // $products = ProductController::getProducts();
        $products = [];
        return self::view('landing.view', ['products' => $products]);
    }
}