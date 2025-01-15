<?php

namespace Controllers;

class UtilityController extends Controller
{
    public static function unauthorizedView()
    {
        return self::view('errors/unauthorized.view');
    }
}
