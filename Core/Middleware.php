<?php

namespace Core;

use Constants\Routes;
use Utils\PermissionUtils;
use Utils\WebUtils;

class Middleware
{
    public static function checkPermission($permission, $redirectRoute = Routes::UNAUTHORIZED)
    {
        if (!Auth::isLoggedIn() || !PermissionUtils::hasPermission($permission)) {
            WebUtils::redirect($redirectRoute);
        }
    }
}
