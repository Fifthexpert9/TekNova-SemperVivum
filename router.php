<?php

use Constants\Routes;
use Controllers\HomeController;
use Controllers\AuthController;
use Controllers\AdminController;
use Controllers\UtilityController;

$url = strtok($_SERVER['REQUEST_URI'], '?');
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
    case parse_url(Routes::ADMIN_DASHBOARD, PHP_URL_PATH):
        echo AdminController::indexView();
        break;
    case parse_url(Routes::UNAUTHORIZED, PHP_URL_PATH):
        echo UtilityController::unauthorizedView();
        break;
    case parse_url(Routes::ADMIN_PRODUCTS, PHP_URL_PATH):
        echo AdminController::productsView();
        break;
    case parse_url(Routes::ADMIN_ADD_PRODUCT, PHP_URL_PATH):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            AdminController::addProduct();
        } else {
            echo AdminController::addProductView();
        }
        break;
    case parse_url(Routes::ADMIN_EDIT_PRODUCT, PHP_URL_PATH):
        echo AdminController::editProductView();
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}

