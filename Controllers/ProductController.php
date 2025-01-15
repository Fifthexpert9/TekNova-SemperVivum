<?php

namespace Controllers;

use Core\Database;
use Models\Product;

class ProductController extends Controller
{
    /**
     * Gets products from the database
     * @param int $limit - The number of products to get
     * @return Product[] - An array of Product objects
     */
    public static function getProducts($limit = -1)
    {
        $sql = 'SELECT id, name, description, price_in_cents, image_path, created_at, updated_at ' .
            'FROM products' .
            ($limit > 0 ? ' LIMIT ' . $limit : '');

        $products = [];
        foreach (Database::query($sql) as $row) {
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price_in_cents'],
                $row['image_path'],
                $row['created_at'],
                $row['updated_at']
            );
        }

        return $products;
    }
}