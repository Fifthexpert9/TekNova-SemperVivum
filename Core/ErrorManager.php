<?php

namespace Core;

class ErrorManager
{
    private const ERROR_KEY = 'error';

    public static function setError(string $message): void
    {
        Session::start();
        Session::set(self::ERROR_KEY, $message);
    }

    public static function getError(): ?string
    {
        Session::start();
        $error = Session::get(self::ERROR_KEY);
        self::clearError();
        return $error;
    }

    private static function clearError(): void
    {
        Session::start();
        Session::set(self::ERROR_KEY, null);
    }
}
