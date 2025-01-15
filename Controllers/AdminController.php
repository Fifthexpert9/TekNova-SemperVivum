<?php

namespace Controllers;

use Constants\Routes;
use Core\Middleware;
use Enums\Permission;
use Utils\WebUtils;

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

    public static function addProduct()
    {
        WebUtils::redirect(Routes::ADMIN_PRODUCTS);
    }
}