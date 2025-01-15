<?php

namespace Core;

Session::start();

/**
 * Handles error messages.
 * @package Core
 */
class ErrorManager
{
    private const ERROR_KEY = 'error';

    /**
     * Sets an error message.
     * @param string $message - The message to set.
     * @return void
     */
    public static function setError(string $message): void
    {
        Session::set(self::ERROR_KEY, $message);
    }

    /**
     * Gets the error message and clears it.
     * @return string|null - The error message.
     */
    public static function getError(): ?string
    {
        $error = Session::get(self::ERROR_KEY);
        self::clearError();

        return $error;
    }

    /**
     * Clears the error message.
     * @return void
     */
    private static function clearError(): void
    {
        Session::set(self::ERROR_KEY, null);
    }
}
