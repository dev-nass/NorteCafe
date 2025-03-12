<?php

function dump($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function base_path($path)
{
    return str_replace('\\', '/', BASE_PATH . $path);
}

/**
 * Changed from before because this can be also use for admin views
 * not just user
 */
function view($path, $attribute = [])
{

    extract($attribute);

    require base_path("resources/views/{$path}");
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
