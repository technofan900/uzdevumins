<?php

$routes = require base_path("routes.php");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

routeToController ($path, $routes); 

function routeToController ($path, $routes) {
    if (array_key_exists($path, $routes)) {
        require base_path($routes[$path]);
    } else {
        abort();
    }
}