<?php

namespace Utils;

class WebUtils
{
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}