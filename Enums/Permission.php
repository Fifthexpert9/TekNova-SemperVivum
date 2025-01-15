<?php

namespace Enums;

/**
 * Holds all the permissions that can be assigned to a role.
 * @package Enums
 */
class Permission
{
    const BUY_PRODUCT = 'buy_product';
    const VIEW_DASHBOARD = 'view_dashboard';
    const MANAGE_USERS = 'manage_users';
    const MANAGE_PRODUCTS = 'manage_products';

    /**
     * Gets the permissions for a given role.
     * @param string $role - The role to get the permissions for.
     * @return array|string[] - The permissions for the given role.
     */
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
