<?php

namespace Controllers;

use Constants\App;
use Constants\Routes;
use Core\Database;
use Exception;
use Models\Product;
use Utils\FileUtils;
use Utils\WebUtils;

/**
 * Handles product-related requests
 * @package Controllers
 */
class ProductController extends Controller
{
    public static function productView()
    {
        $productId = intval($_GET['id']) ?? null;

        if (!$productId) {
            WebUtils::redirect(Routes::HOME);
        }

        $product = ProductController::getById($productId);
        if (!$product) {
            WebUtils::redirect(Routes::HOME);
        }

        // TODO: Get product by ID and related products based on product category
        // $relatedProducts = ProductController::getByCategory($product->getCategory(), 4);

        return self::view('product/product.view', [
            'product' => $product
        ]);
    }

    /**
     * Gets products from the database
     * @param int $limit - The number of products to get
     * @return Product[] - An array of Product objects
     */
    public static function get($limit = -1)
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

    /**
     * Gets a product by ID
     * @param $id - The ID of the product
     * @return ?Product - A Product object if found, null otherwise
     */
    public static function getById($id)
    {
        $sql = 'SELECT id, name, description, price_in_cents, image_path, created_at, updated_at ' .
            'FROM products ' .
            'WHERE id = :id';

        $row = Database::query($sql, ['id' => $id])->fetch();
        if (!$row) {
            return null;
        }

        return new Product(
            $row['id'],
            $row['name'],
            $row['description'],
            $row['price_in_cents'],
            $row['image_path'],
            $row['created_at'],
            $row['updated_at']
        );
    }

    /**
     * Gets products by category
     * @param $category - The category of the products
     * @param $limit - The number of products to get
     * @return array - An array of Product objects
     */
    public static function getByCategory($category, $limit = -1)
    {
        $sql = 'SELECT id, name, description, price_in_cents, image_path, created_at, updated_at ' .
            'FROM products ' .
            'WHERE category = :category' .
            ($limit > 0 ? ' LIMIT ' . $limit : '');

        $products = [];
        foreach (Database::query($sql, ['category' => $category]) as $row) {
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

    /**
     * Adds a product to the database
     * @param array $data - The product data
     * @return bool - True if the product was added, false otherwise
     */
    public static function create($data)
    {
        $imageName = null;

        if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageName = FileUtils::getFilename(
                FileUtils::moveUploadedFile($_FILES['image'], Product::BASE_PATH)
            );
        }

        $sql = 'INSERT INTO products (name, description, price_in_cents, image_path, created_at, updated_at) ' .
            'VALUES (:name, :description, :price_in_cents, :image_path, :created_at, :updated_at)';

        $stmt = Database::query($sql, [
            'name' => $data['name'],
            'description' => $data['description'],
            'price_in_cents' => $data['price'] * 100,
            'image_path' => $imageName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $stmt->rowCount() > 0;
    }

    /**
     * Updates a product from the database.
     * @param array $data - The product data.
     * @return bool
     */
    public static function update($data)
    {
        $product = self::getById($data['id']);

        if (!$product) {
            return false;
        }

        $imageName = $product->getImage() ? FileUtils::getFilename($product->getImage()) : null;

        if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImageName = FileUtils::getFilename(
                FileUtils::moveUploadedFile($_FILES['image'], Product::BASE_PATH)
            );

            if ($newImageName) {
                FileUtils::delete(Product::BASE_PATH . '/' . $imageName);
                $imageName = $newImageName;
            }
        }

        $sql = 'UPDATE products 
            SET name = :name, description = :description, price_in_cents = :price_in_cents,
            image_path = :image_path, updated_at = :updated_at 
            WHERE id = :id';

        $stmt = Database::query($sql, [
            'id' => $data['id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price_in_cents' => $data['price'] * 100,
            'image_path' => $imageName,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $stmt->rowCount() > 0;
    }

    /**
     * Deletes a product from the database.
     * @param int $id - The ID of the product.
     * @return bool - True if the product was deleted, false otherwise.
     */
    public static function delete($id)
    {
        $product = self::getById($id);

        if (!$product) {
            return false;
        }

        $sql = 'DELETE FROM products WHERE id = :id';
        $stmt = Database::query($sql, ['id' => $id]);

        if ($stmt->rowCount() <= 0) {
            return false;
        }

        $imageName = FileUtils::getFilename($product->getImage());
        FileUtils::delete(Product::BASE_PATH . '/' . $imageName);

        return true;
    }
}