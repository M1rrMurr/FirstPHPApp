<?php

function isUrl($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($code = 404)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

function authorize($condition)
{
    if (!$condition) {
        abort(403);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])

{
    extract($attributes);
    require basePath('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");

    exit();
}
