<?php

namespace Core;

use Constants\App;

/**
 * Handles all session related operations.
 * @package Core
 */
class Session
{
    const SESSION_KEY = App::APP_TITLE . '_session';

    /**
     * Starts the session if not already started.
     * @return void
     */
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    /**
     * Destroys the session.
     * @return void
     */
    public static function destroy()
    {
        session_destroy();
    }

    /**
     * Sets a session variable.
     * @param string $key - The key of the session variable.
     * @param mixed $value - The value of the session variable.
     * @return void
     */
    public static function set($key, $value)
    {
        $_SESSION[self::SESSION_KEY][$key] = $value;
    }

    /**
     * Gets a session variable based on the key.
     * @param string $key - The key of the session variable.
     * @return mixed|null - The value of the session variable if found, null otherwise.
     */
    public static function get($key)
    {
        return $_SESSION[self::SESSION_KEY][$key] ?? null;
    }

    /**
     * Removes a session variable based on the key.
     * @param string $key - The key of the session variable.
     * @return void
     */
    public static function remove(string $key)
    {
        unset($_SESSION[self::SESSION_KEY][$key]);
    }
}