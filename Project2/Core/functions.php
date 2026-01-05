<?php 

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Core\Responses::NOT_FOUND) {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize ($condition, $status = Core\Responses::FORBIDDEN){
    if (! $condition) {
        abort(core\Responses::FORBIDDEN);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}


function view($path, $attributes = [] ) {
    // foreach ($attributes as $key => $value) {
    //     $$key = $value;
    // }

    // foreach dara to pašu ko iebūvētā extract

    extract($attributes);
    require base_path("views/{$path}");
}

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}