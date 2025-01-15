<?php

namespace Core;

use Constants\Routes;
use Utils\PermissionUtils;
use Utils\WebUtils;

/**
 * This class contains all the middleware functions that run before the controller action if needed.
 * @package Core
 */
class Middleware
{
    /**
     * Check if the user is logged in.
     * @param string $permission - The permission to check.
     * @param string $redirectRoute - The route to redirect to if the user is not logged in.
     * @return void
     */
    public static function checkPermission($permission, $redirectRoute = Routes::UNAUTHORIZED)
    {
        if (!Auth::isLoggedIn() || !PermissionUtils::hasPermission($permission)) {
            WebUtils::redirect($redirectRoute);
        }
    }
}
