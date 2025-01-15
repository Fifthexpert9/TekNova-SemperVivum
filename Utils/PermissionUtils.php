<?php

namespace Utils;

use Core\Auth;
use Core\Session;
use Enums\Permission;

class PermissionUtils
{
    public static function hasPermission($requiredPermission)
    {
        $userRole = Session::get(Auth::AUTH_ROLE_KEY);
        $permissions = Permission::getPermissionsForRole($userRole);

        return in_array($requiredPermission, $permissions);
    }
}
