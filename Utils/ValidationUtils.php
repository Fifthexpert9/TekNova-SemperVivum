<?php

namespace Utils;

/**
 * Takes care of validation-related tasks.
 * @package Utils
 */
class ValidationUtils
{
    /**
     * Validates an email address.
     * @param string $email - The email address to validate.
     * @return mixed - The validated email address or false if the email address is invalid.
     */
    public static function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}