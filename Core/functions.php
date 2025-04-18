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

/**
 * Used for the adminside bar
*/
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === "/PHP%202025/Norte%20Cafe/public/index.php/{$value}";
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

function abort($code = 404) 
{
    http_response_code($code);

    require base_path("resources/views/{$code}.view.php");

    die();
}

/**
 * Used for checking if the shop is open or closed
*/
function isOrderingTime()
{
    $now = new DateTime('now', new DateTimeZone('Asia/Manila')); // Adjust timezone as needed
    $start = new DateTime('today 10:00:00', new DateTimeZone('Asia/Manila'));
    $end = new DateTime('today 20:45:00', new DateTimeZone('Asia/Manila')); // 9 PM = 21:00

    if($now >= $start && $now < $end) {
        return true;
    }

    return false;
}