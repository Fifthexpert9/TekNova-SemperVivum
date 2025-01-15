<?php

namespace Core;

use Controllers\UserController;
use Models\User;

Session::start();

/**
 * Takes care of user authentication.
 * @package Core
 */
class Auth
{
    const AUTH_SESSION_KEY = Session::SESSION_KEY . '_auth';
    const AUTH_USER_KEY = self::AUTH_SESSION_KEY . '_user';
    const AUTH_ROLE_KEY = self::AUTH_SESSION_KEY . '_role';

    /**
     * Check if user is logged in.
     * @return bool - `true` if user is logged in, `false` otherwise.
     */
    public static function isLoggedIn()
    {
        return Session::get(self::AUTH_USER_KEY) != null;
    }

    /**
     * Log the user in.
     * @param int|string $userId - The user's ID.
     * @param string $role - The user's role.
     * @return void
     */
    public static function login($userId, $role)
    {
        Session::set(self::AUTH_USER_KEY, $userId);
        Session::set(self::AUTH_ROLE_KEY, $role);
    }

    /**
     * Log the user out.
     * @return void
     */
    public static function logout()
    {
        Session::remove(self::AUTH_USER_KEY);
        Session::remove(self::AUTH_ROLE_KEY);
    }

    /**
     * Checks whether a user has a specific role.
     * @param string $role - The role to check for.
     * @return bool - `true` if the user has the role, `false` otherwise.
     */
    public static function hasRole($role)
    {
        return Session::get(self::AUTH_ROLE_KEY) == $role;
    }

    /**
     * Get the currently logged-in user from the database.
     * @return User|null - The user object if the user is logged in, `null` otherwise.
     */
    public static function getUser()
    {
        return UserController::findById(Session::get(self::AUTH_USER_KEY));
    }
}