<?php

namespace Controllers;

/**
 * Handles views that are not related to any specific controller.
 * @package Controllers
 */
class UtilityController extends Controller
{
    public static function unauthorizedView()
    {
        return self::view('errors/unauthorized.view');
    }
}
