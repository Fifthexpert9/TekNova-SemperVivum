<?php

namespace Models;

use Constants\App;
use Core\Database;

class Plant {
    public static function all() {
        // Implementa la lógica para obtener todas las plantas de la base de datos
        $db = new Database();
        return $db->query("SELECT * FROM products")->fetchAll();
    }
}