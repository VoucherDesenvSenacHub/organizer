<?php
require_once __DIR__ . '/config/database.php';

spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/model/' . $class . '.php',
        __DIR__ . '/model/' . $class . 'Model.php'
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});