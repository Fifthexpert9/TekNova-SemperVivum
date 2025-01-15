<?php

namespace Enums;

class Permission
{
    const BUY_PRODUCT = 'buy_product';
    const VIEW_DASHBOARD = 'view_dashboard';
    const MANAGE_USERS = 'manage_users';
    const MANAGE_PRODUCTS = 'manage_products';

    public static function getPermissionsForRole($role)
    {
        switch ($role) {
            case UserRole::ADMIN:
                return [
                    self::VIEW_DASHBOARD,
                    self::MANAGE_USERS,
                    self::MANAGE_PRODUCTS,
                ];
            case UserRole::USER:
                return [
                    self::BUY_PRODUCT,
                ];
            default:
                return [];
        }
    }
}
