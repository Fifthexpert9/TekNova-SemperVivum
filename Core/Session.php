<?php

namespace Core;

use Constants\App;

class Session
{
    const SESSION_KEY = App::APP_TITLE . '_session';

    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function set($key, $value)
    {
        $_SESSION[self::SESSION_KEY][$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[self::SESSION_KEY][$key] ?? null;
    }

    public static function remove(string $key)
    {
        unset($_SESSION[self::SESSION_KEY][$key]);
    }
}