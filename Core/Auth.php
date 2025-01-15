<?php

namespace Core;

use Controllers\UserController;

Session::start();

class Auth
{
    const AUTH_SESSION_KEY = Session::SESSION_KEY . '_auth';
    const AUTH_USER_KEY = self::AUTH_SESSION_KEY . '_user';
    const AUTH_ROLE_KEY = self::AUTH_SESSION_KEY . '_role';

    public static function isLoggedIn()
    {
        return Session::get(self::AUTH_USER_KEY) != null;
    }

    public static function login($userId, $role)
    {
        Session::set(self::AUTH_USER_KEY, $userId);
        Session::set(self::AUTH_ROLE_KEY, $role);
    }

    public static function logout()
    {
        Session::remove(self::AUTH_USER_KEY);
        Session::remove(self::AUTH_ROLE_KEY);
    }

    public static function hasRole($role)
    {
        return Session::get(self::AUTH_ROLE_KEY) == $role;
    }

    public static function getUser()
    {
        return UserController::findById(Session::get(self::AUTH_USER_KEY));
    }
}