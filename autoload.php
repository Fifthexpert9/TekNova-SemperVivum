<?php
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $baseDir = __DIR__;
    $file = $baseDir . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        error_log("Autoloader: File not found for class $class. Expected path: $file");
    }
});
