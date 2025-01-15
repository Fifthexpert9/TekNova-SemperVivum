<?php

namespace Constants;

/**
 * Handles all the routes in the application.
 * When adding a new route, make sure to add it to the Routes class to ensure consistency throughout the application.
 * @package Constants
 */
class Routes
{
    const HOME = App::APP_URL;
    const LOGIN = App::APP_URL . '/login';
    const REGISTER = App::APP_URL . '/register';
    const LOGOUT = App::APP_URL . '/logout';
    const UNAUTHORIZED = App::APP_URL . '/unauthorized';

    // Admin
    const ADMIN_DASHBOARD = App::APP_URL . '/admin';
    const ADMIN_PRODUCTS = self::ADMIN_DASHBOARD . '/products';
    const ADMIN_ADD_PRODUCT = self::ADMIN_PRODUCTS . '/new';
    const ADMIN_EDIT_PRODUCT = self::ADMIN_PRODUCTS . '/edit';
    const ADMIN_SALES = self::ADMIN_DASHBOARD . '/sales';
    const ADMIN_USERS = self::ADMIN_DASHBOARD . '/users';
    const ADMIN_ORDERS = self::ADMIN_DASHBOARD . '/orders';
}