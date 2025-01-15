<?php

namespace Utils;

use Core\Auth;
use Core\Session;
use Enums\Permission;

Session::start();

/**
 * Handles permission checking for the current user.
 * @package Utils
 */
class PermissionUtils
{
    /**
     * Checks if the current user has the required permission.
     * @param $requiredPermission
     * @return bool - `true` if the user has the required permission, `false` otherwise.
     */
    public static function hasPermission($requiredPermission)
    {
        $userRole = Session::get(Auth::AUTH_ROLE_KEY);
        $permissions = Permission::getPermissionsForRole($userRole);

        return in_array($requiredPermission, $permissions);
    }
}
