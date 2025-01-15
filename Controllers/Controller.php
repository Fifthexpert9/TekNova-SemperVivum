<?php

namespace Controllers;

class Controller
{
    public static function view($view, $data = [])
    {
        extract($data);

        ob_start();
        require_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }
}