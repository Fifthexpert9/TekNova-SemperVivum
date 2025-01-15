<?php

namespace Controllers;

/**
 * Represents the base controller. Child controllers should extend this class.
 * @package Controllers
 */
class Controller
{
    /**
     * Renders a view given the view name and data.
     * `data` represents the data that will be passed to the view (such as DB results).
     * @param string $view - The view name.
     * @param ?array $data - The data to pass to the view.
     * @return false|string - The rendered view if successful, false otherwise (if output buffering fails).
     */
    public static function view($view, $data = [])
    {
        extract($data);

        ob_start();
        require_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }
}