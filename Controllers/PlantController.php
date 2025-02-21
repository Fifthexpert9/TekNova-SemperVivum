<?php

namespace Controllers;

use Constants\Routes;
use Controllers\UserController;
use Core\Auth;
use Core\ErrorManager;

use Core\Session;
use Exception;
use InvalidArgumentException;
use Utils\ValidationUtils;
use Utils\WebUtils;

use Models\Plant;

class PlantController {
    public static function plantsView()
    {
        require_once 'views/plants/gallery.php';
    }
}