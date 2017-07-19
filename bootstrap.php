<?php

function myAutoLoad($className) {
    $className = str_replace('\\', '/', $className);
    $ind = strpos($className, '/');
    if ($ind) {
        $className = substr($className, $ind + 1);
    }
    require_once $className . '.php';
}

spl_autoload_register('myAutoLoad');

require_once 'vendor/autoload.php';
