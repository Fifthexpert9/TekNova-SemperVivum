<?php

namespace Controllers;

use Constants\Routes;
use Core\Middleware;
use Enums\Permission;
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

        return self::view('admin/products.view');
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

        // TODO: Remove redirect and implement the logic for adding a product.
        WebUtils::redirect(Routes::ADMIN_PRODUCTS);
    }
}