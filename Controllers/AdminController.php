<?php

namespace Controllers;

use Constants\Routes;
use Core\Middleware;
use Enums\Permission;
use Models\Product;
use Utils\FileUtils;
use Utils\WebUtils;

/**
 * Handles all admin related requests.
 * IMPORTANT: check if the user has the required permissions before executing any action.
 * @package Controllers
 */
class AdminController extends Controller
{
    public static function indexView()
    {
        Middleware::checkPermission(Permission::VIEW_DASHBOARD);

        return self::view('admin/index.view');
    }

    public static function productsView()
    {
        Middleware::checkPermission(Permission::MANAGE_PRODUCTS);

        $products = ProductController::get();

        return self::view('admin/products.view', [
            'products' => $products
        ]);
    }

    public static function usersView()
    {
        Middleware::checkPermission(Permission::MANAGE_USERS);

        $users = UserController::get();

        return self::view('admin/users.view', [
            'users' => $users
        ]);
    }

    public static function addProductView()
    {
        Middleware::checkPermission(Permission::MANAGE_PRODUCTS);

        return self::view('admin/add-product.view');
    }

    public static function editProductView()
    {
        Middleware::checkPermission(Permission::MANAGE_PRODUCTS);

        return self::view('admin/edit-product.view');
    }

    /**
     * Handles the logic for adding a product to the application.
     * @return void
     */
    public static function addProduct()
    {
        Middleware::checkPermission(Permission::MANAGE_PRODUCTS);

        $imageName = null;

        if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageName = FileUtils::getFilename(
                FileUtils::moveUploadedFile($_FILES['image'], Product::BASE_PATH)
            );
        }

        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'image' => $imageName
        ];

        $success = ProductController::create($data);

        if (!$success) {
            echo 'Failed to add product';
            return;
        }

        WebUtils::redirect(Routes::ADMIN_PRODUCTS);
    }

    /**
     * Handles the logic for editing a product in the application.
     * @return void
     */
    public static function editProduct()
    {
        Middleware::checkPermission(Permission::MANAGE_PRODUCTS);

        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'image' => $_POST['image']
        ];

        $success = ProductController::update($data);

        // TODO: Replace with a proper error message.
        if (!$success) {
            echo 'Failed to edit product';
            return;
        }

        WebUtils::redirect(Routes::ADMIN_PRODUCTS);
    }

    public static function deleteProduct()
    {
        Middleware::checkPermission(Permission::MANAGE_PRODUCTS);

        $id = $_POST['id'];
        if (empty($id)) {
            echo 'Invalid product id';
            return;
        }

        $success = ProductController::delete($id);

        if (!$success) {
            echo 'Failed to delete product';
            return;
        }

        WebUtils::redirect(Routes::ADMIN_PRODUCTS);
    }
}