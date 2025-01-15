<?php

namespace Utils;

class ValidationUtils
{
    public static function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}