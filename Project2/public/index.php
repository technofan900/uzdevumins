<?php

const BASE_PATH = __DIR__ . '/../'; // Pamata ceļa konstantes izveide

require BASE_PATH . 'Core/functions.php'; // Pielietojot izveidoto konstanti piekļūstam function.php
// require base_path('Database.php');
// require base_path('Responses.php');

// spl_autoload_register pie lapas atveršanas apskata kādas klases vajadzīgas un tad tikai viņam piekļūst ja viņas ir nepieciešamas.
spl_autoload_register(function ($class) {
    echo "class: $class<br>";
    require base_path("{$class}.php");
});

require base_path('Core/router.php');





