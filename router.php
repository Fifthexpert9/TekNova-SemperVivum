<?php

use Constants\Routes;
use Controllers\HomeController;
use Controllers\AuthController;
use Controllers\AdminController;
use Controllers\OrderController;
use Controllers\ProductController;
use Controllers\UtilityController;

// Removes the query string from the URL.
// http://localhost:8000/?page=2 => http://localhost:8000/
// Can still be accessed with $_GET['page'].
$url = strtok($_SERVER['REQUEST_URI'], '?');

// Removes trailing slashes from the URL.
$url = rtrim($url, '/');

switch ($url) {
    case parse_url(Routes::HOME, PHP_URL_PATH):
        echo HomeController::indexView();
        break;
    case parse_url(Routes::LOGIN, PHP_URL_PATH):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AuthController::login();
        } else {
            echo AuthController::loginView();
        }
        break;
    case parse_url(Routes::REGISTER, PHP_URL_PATH):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AuthController::register();
        } else {
            echo AuthController::registerView();
        }
        break;
    case parse_url(Routes::LOGOUT, PHP_URL_PATH):
        AuthController::logout();
        break;
    case parse_url(Routes::PRODUCT_VIEW, PHP_URL_PATH):
        echo ProductController::productView();
        break;
    case parse_url(Routes::ORDERS, PHP_URL_PATH):
        echo OrderController::index();
        break;
    case parse_url(Routes::ORDER_REPORT, PHP_URL_PATH):
        OrderController::orderReport();
        break;
    case parse_url(Routes::ADMIN_DASHBOARD, PHP_URL_PATH):
        echo AdminController::indexView();
        break;
    case parse_url(Routes::UNAUTHORIZED, PHP_URL_PATH):
        echo UtilityController::unauthorizedView();
        break;
    case parse_url(Routes::ADMIN_PRODUCTS, PHP_URL_PATH):
        echo AdminController::productsView();
        break;
    case parse_url(Routes::ADMIN_USERS, PHP_URL_PATH):
        echo AdminController::usersView();
        break;
    case parse_url(Routes::ADMIN_ADD_PRODUCT, PHP_URL_PATH):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AdminController::addProduct();
        } else {
            echo AdminController::addProductView();
        }
        break;
    case parse_url(Routes::ADMIN_EDIT_PRODUCT, PHP_URL_PATH):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AdminController::editProduct();
        } else {
            echo AdminController::editProductView();
        }
        break;
    case parse_url(Routes::ADMIN_DELETE_PRODUCT, PHP_URL_PATH):
        AdminController::deleteProduct();
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}

