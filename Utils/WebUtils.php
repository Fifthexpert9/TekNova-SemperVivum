<?php

namespace Utils;

/**
 * Contains utility methods for web operations.
 * @package Utils
 */
class WebUtils
{
    /**
     * Redirects the user to the specified URL.
     * @param string $url - The URL to redirect to.
     * @return void
     */
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}